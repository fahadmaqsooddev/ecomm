<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'revrating'  => 'required|integer|min:1|max:5',
            'revtitle'   => 'required|string|max:255',
            'revtext'    => 'required|string',
        ], [
            'product_id.required' => 'Product is required.',
            'product_id.exists'   => 'Selected product does not exist.',
            'revrating.required'  => 'Rating is required.',
            'revrating.integer'   => 'Rating must be a number.',
            'revrating.min'       => 'Rating must be at least 1.',
            'revrating.max'       => 'Rating cannot exceed 5.',
            'revtitle.required'   => 'Review Subject is required.',
            'revtext.required'    => 'Comments are required.',
        ]);

        $user = Auth::user();
        $product_id = $request->product_id;

        // Check if user purchased this product
        $hasPurchased = Order::where('user_id', $user->id)
            ->whereHas('items', function ($query) use ($product_id) {
                $query->where('product_id', $product_id);
            })
            ->exists();

        if (!$hasPurchased) {
            return redirect()->back()->with('error', 'Only customers who purchased this item can review it.');
        }

        // Save the review
        Review::create([
            'user_id'    => $user->id,
            'product_id' => $product_id,
            'rating'     => $request->revrating,
            'subject'    => $request->revtitle,
            'comments'   => $request->revtext,
        ]);

        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
       
}
