<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Transaction;
use Illuminate\Support\Facades\DB;
use App\Models\CartItem;

use App\Jobs\SendOrderConfirmationEmail;

use Stripe\Stripe;
use Stripe\PaymentIntent;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Support\Facades\Bus;



class CheckoutController extends Controller
{
    public function index(){
        return view('checkout');
    }

    public function getauth(){
        $user = Auth::guard('web')->user();
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated'
            ], 401);
        }
        return $user;
    }

    public function checkout(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:3',
            'company' => 'nullable|string|min:3',
            'phone' => 'nullable|string|min:10',
            'address1' => 'required|string|min:5',
            'address2' => 'nullable|string|min:5',
            'city' => 'required|string',
            'state_or_province' => 'nullable|string',
            'postal_code' => 'required|string',
            'country_code' => 'required|string|size:2',
            'payment_method' => 'required|in:cod,stripe'
        ]);

        $auth_id = Auth::id();

        try {
            DB::beginTransaction();

            // 1. Create shipping address
            $address = Address::create([
                'user_id' => $auth_id,
                'type' => 'shipping',
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'company' => $request->company,
                'phone' => $request->phone,
                'address1' => $request->address1,
                'address2' => $request->address2,
                'city' => $request->city,
                'state_or_province' => $request->state_or_province,
                'postal_code' => $request->postal_code,
                'country_code' => $request->country_code,
            ]);

            // 2. Create order
            $order = Order::create([
                'user_id' => $auth_id,
                'shipping_address_id' => $address->id,
                'billing_address_id' => $address->id,
                'payment_method' => $request->payment_method,
                'order_comment' => $request->order_comment,
                'subtotal' => str_replace(',', '', $request->subtotal),
                'shipping_cost' => str_replace(',', '', $request->shipping_cost),
                'tax' => str_replace(',', '', $request->tax),
                'total' => str_replace(',', '', $request->total),
            ]);

            // 3. Add products to order
            if (
                $request->input('product_id') &&
                $request->input('product_name') &&
                $request->input('price') &&
                $request->input('quantity') &&
                $request->input('product_total')
            ) {
                $product_id = $request->input('product_id');
                $product_name = $request->input('product_name');
                $product_price = $request->input('price');
                $product_quantity = $request->input('quantity');
                $product_total = $request->input('product_total');

                foreach ($product_id as $key => $pro_id) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'product_id' => $pro_id,
                        'product_name' => $product_name[$key],
                        'price' => $product_price[$key],
                        'quantity' => $product_quantity[$key],
                        'total' => $product_total[$key],
                    ]);

                     // ↓↓↓ Decrease product quantity from inventory ↓↓↓
                    $product = Product::find($pro_id);
                    if ($product) {
                        if ($product->quantity >= $product_quantity[$key]) {
                            $product->quantity -= $product_quantity[$key];
                            $product->save();
                        } else {
                            DB::rollBack();
                            return redirect()->back()->with('error', "Insufficient stock for product: {$product->name}");
                        }
                    }
                }

                // Clear user's cart
                CartItem::where('user_id', $auth_id)->delete();
            }

            // 4. Handle Stripe Payment
            if ($request->payment_method === 'stripe') {
                Stripe::setApiKey(env('STRIPE_SECRET'));

                $totalAmount = (int)(str_replace(',', '', $request->total) * 100); // cents

                try {
                    $paymentIntent = PaymentIntent::create([
                        'amount' => $totalAmount,
                        'currency' => 'usd',
                        'payment_method' => $request->payment_method_id,
                        'automatic_payment_methods' => [
                            'enabled' => true,
                            'allow_redirects' => 'never',
                        ],
                        'confirm' => true,
                    ]);
                    if ($paymentIntent->status !== 'succeeded') {
                        DB::rollBack();
                        return redirect()->back()->with('error', 'Stripe payment failed.');
                    }

                    $charge = $paymentIntent->charges->data[0] ?? null;
                    $cardLast4 = $charge['payment_method_details']['card']['last4'] ?? null;
                    $cardBrand = $charge['payment_method_details']['card']['brand'] ?? null;

                    // Save Stripe payment info
                    Payment::create([
                        'order_id' => $order->id,
                        'method' => 'stripe',
                        'status' => 'paid',
                        'transaction_id' => $paymentIntent->id,
                        'card_last4' => $cardLast4,
                        'card_brand' => $cardBrand,
                        'paid_at' => now(),
                    ]);
                } catch (\Exception $e) {
                    DB::rollBack();
                    return redirect()->back()->with('error', 'Stripe error: ' . $e->getMessage());
                }
            }

            // 5. Handle COD
            if ($request->payment_method === 'cod') {
                Payment::create([
                    'order_id' => $order->id,
                    'method' => 'cod',
                    'status' => 'pending',
                    'transaction_id' => null,
                    'card_last4' => null,
                    'card_brand' => null,
                    'paid_at' => null,
                ]);
            }

            DB::commit();
            dispatch(new SendOrderConfirmationEmail($order));
            return redirect()->route('indexxxx')->with('order_success', 'Order placed successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    function deletecart(CartItem $cart){
        $deleted=$cart->delete();
        $user=$this->getauth();
        $cartItems = CartItem::with('product')->where('user_id', $user->id)->get();
        $cart = $cartItems->map(fn($item) => [   
            'quantity' => $item->quantity,
            'total_price' => $item->product->price * $item->quantity,
        ]);
        
         return response()->json([
            'cart_count' => $cartItems->sum('quantity'),
            'cart_total' => $cart->sum('total_price'),
            'message' => 'Item Deleted From Cart!',       
            "success"=>true
        ]);
    }
}
