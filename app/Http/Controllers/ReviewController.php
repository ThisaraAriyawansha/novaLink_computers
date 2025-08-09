<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'rating' => 'required|integer|between:1,5',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $review = Review::create([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'email' => $request->email,
            'rating' => $request->rating,
            'message' => $request->message,
            'status' => 2, // Set default status here
        ]);
        
        return response()->json([
            'success' => true,
            'review' => $review,
        ], 201);
    }

    public function index(Request $request, $product_id)
    {
        $reviews = Review::where('product_id', $product_id)
                         ->where('status', 2)
                         ->latest()
                         ->get();
    
        return response()->json([
            'success' => true,
            'reviews' => $reviews,
        ]);
    }
    

    public function manageReview(Request $request)
    {
        $query = Review::with('product') // Eager load product
                      ->orderBy('created_at', 'desc'); // Show newest first
    
        if ($request->has('search') && !empty($request->search)) {
            $query->whereHas('product', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }
    
        $reviews = $query->paginate(15);
    
        return view('admin.manageReview', compact('reviews'));
    }

    public function toggleReviewStatus($id)
    {
        $review = Review::findOrFail($id);
        $review->status = $review->status == 2 ? 1 : 2; // Toggle status
        $review->save();

        return redirect()->back()->with('success', 'Review status updated successfully.');
    }

}