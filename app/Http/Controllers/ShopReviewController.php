<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Review;
use App\Models\Product;

class ShopReviewController extends Controller
{
    /** List all reviews for this shop's products */
    public function index(Request $request)
    {
        $myProductIds = Product::where('user_id', Auth::id())->pluck('id');

        $query = Review::with('product')->whereIn('product_id', $myProductIds);

        if ($request->filled('rating')) {
            $query->where('rating', $request->rating);
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $reviews = $query->orderByDesc('created_at')->paginate(15)->appends($request->only(['rating', 'status']));

        return view('shop.reviews.index', compact('reviews'));
    }

    /** Toggle review visibility (status 1 = visible, 2 = hidden) */
    public function toggle($id)
    {
        $review = Review::findOrFail($id);
        // Ownership check — make sure the review belongs to this shop's product
        Product::where('user_id', Auth::id())->findOrFail($review->product_id);

        $review->status = $review->status == 2 ? 1 : 2;
        $review->save();

        return back()->with('success', 'Review status updated.');
    }
}
