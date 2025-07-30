<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Bid;



class LiveBitController extends Controller
{

    public function biddings(Request $request)
    {
        // Get the product ID from the URL
        $productId = $request->query('product-id');

        if (!$productId) {
            return view('single-product', ['error' => 'No product ID provided!']);
        }

        // Fetch product details from the database with features
        $product = Product::with('features')->where('id', $productId)->where('status_id', 1)->first();

        if (!$product) {
            return view('single-product', ['error' => 'Product not found!']);
        }

        $bids = Bid::where('product_id', $productId)
        ->where('status', 1)
        ->orderByDesc('created_at')
        ->get();

        // Transform the product data
        $productData = [
            'id' => $product->id,
            'name' => $product->name,
            'type' => $product->type,
            'brand'=>$product->brand,
            'tags' => $product->tags,
            'desc' => $product->description,
            'dis_price' => $product->discounted_price . ' LKR',
            'ret_price' => $product->retail_price . ' LKR',
            'features' => $product->features->map(function ($feature) {
                return $feature->feature_name . ': ' . $feature->feature_value;
            })->toArray(),
            'warranty' => $product->warranty,
            'in_stock' => $product->in_stock,
            'image' => asset($product->image),
            'deal_start' => $product->deal_start,
            'deal_end' => $product->deal_end,
        ];

        // Fetch all products for the slider
        $products = Product::where('status_id', 1)->get()->map(function ($prod) {
            return [
                'id' => $prod->id,
                'name' => $prod->name,
                'type' => $prod->type,
                'description' => $prod->description,
                'dis_price' => $prod->discounted_price . ' LKR',
                'image' => asset($prod->image),
            ];
        });

        // Return view with product data
        return view('biddings', [
            'product' => $productData,
            'products' => $products,
            'bids' => $bids
        ]);   
     }


        public function placeBid(Request $request)
        {
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'bid_amount' => 'required|numeric|min:1',
            ]);
    
            $customerId = session('customer_id', null);
    
            if (!$customerId) {
                return redirect()->back()->with('error', 'Please log in to place a bid.');
            }
    
            Bid::create([
                'product_id' => $request->product_id,
                'bid_amount' => $request->bid_amount,
                'customer_id' => $customerId,
                'status' => 1, // Assuming you have a status field
            ]);
    
            return redirect()->back()->with('success', 'Your bid was placed!');
        }

}
