<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;
class WishListController extends Controller
{
    public function wishlist(Request $request)
    {
        $user = Auth::guard('web')->user();

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'operation' => 'required|in:add,remove',
        ]);

        $productId = $request->product_id;
        $operation = $request->operation;

        $existing = Wishlist::where('user_id', $user->id)
                            ->where('product_id', $productId)
                            ->first();

        if ($operation === 'add') {
            if ($existing) {
                return response()->json(['message' => 'Already added to wishlist.'], 200);
            }

            Wishlist::create([
                'user_id' => $user->id,
                'product_id' => $productId,
            ]);

            return response()->json(['message' => 'Added to wishlist successfully.'], 201);
        }

        if ($operation === 'remove') {
            if ($existing) {
                $existing->delete();
                return response()->json(['message' => 'Removed from wishlist.'], 200);
            }

            return response()->json(['message' => 'Item not found in wishlist.'], 404);
        }

        return response()->json(['message' => 'Invalid operation.'], 400);
    }


        /**
     * Get all wishlist items for the current user
     */
    public function getWishlist()
    {
        $user = Auth::guard('web')->user();

        $wishlists = WishList::with('product') // Ensure relationship exists
            ->where('user_id', $user->id)
            ->get();

        return view('wishlist',compact('wishlists'));
    }

}
