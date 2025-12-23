<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Log;
use App\Events\CartUpdated; 
use DB;
use App\Models\DeliveryCharge;
class CartController extends Controller
{

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


    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'operation' => 'required|in:increase,decrease'
        ]);

        $user = $this->getauth();
        $operation=$request->operation;
        $cartItem = CartItem::firstOrCreate(
            ['product_id' => $request->product_id, 'user_id' => $user->id],
            ['quantity' => 0]
        );

        if($operation === 'increase'){
            $cartItem->increment('quantity', $request->quantity);
        }else{
            $cartItem->decrement('quantity', $request->quantity);
        }
        
        $cartItem->refresh(); // Reload to get updated data

        $product = $cartItem->product;

        $updatedItem = [
            'id' => $cartItem->id,
            'product_id' => $cartItem->product_id,
            'product_name' => $product->name,
            'product_price' => $product->price,
            'quantity' => $cartItem->quantity,
            'total_price' => $product->price * $cartItem->quantity,
            'product_image' => asset('admin/dist/img/product/' . $product->image),
        ];
        $cartItems = CartItem::where('user_id', $user->id)->get();
        $cartCount = $cartItems->sum('quantity');
        $cartTotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $delivery_charges = DeliveryCharge::first();
        $shipping_charges = $delivery_charges->shipping_charges ?? 0;
        $tax_rate = $delivery_charges->tax ?? 0; // 5 means 5%


        $tax = ($cartTotal * $tax_rate) / 100; // Apply 5% tax
        $total = $cartTotal + $shipping_charges + $tax;

        return response()->json([
            'message' => 'Product added to cart successfully!',
            'cart' => $updatedItem,
            'cart_count' => $cartCount,
            'cart_total' => $cartTotal,
            'tax' => $tax,
            'total' => $total
        ]);
    }


    public function cartdetails()
    {
        $user = auth()->user();
        $cartData = $this->getUserCartData($user->id);
        return response()->json([
            'success' => true,
            'cart' => $cartData['items'],
            'cart_count' => $cartData['count'],
            'cart_subtotal' => $cartData['subtotal'],
            'shipping_charges' => $cartData['shipping_charges'],
            'tax' => $cartData['tax'],
            'cart_total' => $cartData['total'],
        ]);
    }

    public function getUserCartData($userId)
    {
        $cartItems = CartItem::with('product')->where('user_id', $userId)->get();

        $cart = $cartItems->map(function ($item) {
            return [
                'id' => $item->id,
                'product_id' => $item->product_id,
                'product_name' => $item->product->name,
                'product_price' => $item->product->price,
                'quantity' => $item->quantity,
                'total_price' => $item->product->price * $item->quantity,
                'product_image' => asset('admin/dist/img/product/' . $item->product->image),
            ];
        });

        $delivery_charges = DeliveryCharge::first();
        $shipping_charges = $delivery_charges->shipping_charges ?? 0;
        $tax_rate = $delivery_charges->tax ?? 0; // 5 means 5%

        $cartCount = $cartItems->sum('quantity');
        $subtotal = $cart->sum('total_price');
        $tax = ($subtotal * $tax_rate) / 100; // Apply 5% tax
        $total = $subtotal + $shipping_charges + $tax;

        return [
            'items' => $cart,
            'count' => $cartCount,
            'subtotal' => $subtotal,
            'shipping_charges' => $shipping_charges,
            'tax' => $tax,
            'total' => $total
        ];
    }



    public function cartitemsdetails()
    {

        $user = $this->getauth();

        // Get all cart items with product info
        $carts = CartItem::with('product')->where('user_id', $user->id)->get();

        $subtotal = $carts->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        $delivery_charges = DeliveryCharge::first();
        $shipping_charges = $delivery_charges->shipping_charges ?? 0;
        $tax_rate = $delivery_charges->tax ?? 0;
        $tax = ($subtotal * $tax_rate) / 100;
        $totals = $subtotal + $shipping_charges + $tax;
        $cartCount = $carts->sum('quantity');
        return view('cart', compact('carts', 'cartCount', 'subtotal', 'shipping_charges', 'tax', 'totals'));
    }


    public function updateQuantity(Request $request)
    {
        $user = $this->getauth();
        $item = Product::find($request->product_id);

        if (!$item) {
            return response()->json(['success' => false, 'message' => 'Item not found.']);
        }

        $cartitem_record = CartItem::where('user_id', $user->id)
            ->where('product_id', $request->product_id)
            ->first();

        if ($cartitem_record) {
            if ($request->action === 'increase') {
                $cartitem_record->increment('quantity');
            } elseif ($request->action === 'decrease' && $cartitem_record->quantity > 1) {
                $cartitem_record->decrement('quantity');
            }

            $cartitem_record->save();

            $cartItems = CartItem::where('user_id', $user->id)->get();

            $subtotal = DB::table('cart_items')
                ->join('products', 'products.id', '=', 'cart_items.product_id')
                ->where('cart_items.user_id', $user->id)
                ->select(DB::raw('SUM(cart_items.quantity * products.price) as total'))
                ->value('total');

            $delivery_charges = DeliveryCharge::first();
            $shipping_charges = $delivery_charges->shipping_charges ?? 0;
            $tax_rate = $delivery_charges->tax ?? 0;
            $tax = ($subtotal * $tax_rate) / 100;
            $total = $subtotal + $shipping_charges + $tax;

            $cartitem_record['cartitem_total'] = $cartitem_record['quantity'] * $item->price;

            return response()->json([
                'cart' => $cartitem_record,
                'cart_count' => $cartItems->sum('quantity'),
                'cart_subtotal' => $subtotal,
                'shipping_charges' => $shipping_charges,
                'tax' => $tax,
                'cart_total' => $total,
                'success' => true
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Cart item not found.']);
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

    public function getCheckoutData(){
        return view('components.cart-summary');
    }
}
