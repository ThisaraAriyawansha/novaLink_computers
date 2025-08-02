<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Blog;



class HomeController extends Controller
{
    public function homeShow()
    {
        // Fetch products along with their features and map them to a more convenient format
        $products = Product::with(['features'])
            ->where('status_id', 1)
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'type' => $product->type,
                    'tags' => $product->tags,
                    'desc' => $product->description,
                    'dis_price' => $product->discounted_price ,
                    'ret_price' => $product->retail_price ,
                    'features' => $product->features->pluck('feature')->toArray(),
                    'warranty' => $product->warranty,
                    'in_stock' => $product->in_stock,
                    'image' => asset($product->image),
                    'deal_start' => $product->deal_start,
                    'deal_end' => $product->deal_end,
                ];
            });
    
        // Fetch the latest 2 blogs
        $blogs = Blog::latest()->take(2)->get()->map(function ($blog) {
            return [
                'id' => $blog->id,
                'image' => asset($blog->image),
                'date' => $blog->date->format('d, M Y'), // Format date as "27, Jan 2025"
                'title' => $blog->title,
                'description' => $blog->description,
                'tag' => $blog->tag,
            ];
        });
    
        // Pass products and blogs data to the 'index' view
        return view('index', ['products' => $products, 'blogs' => $blogs]);
    }
    

public function getChatbotProducts()
{
    $products = Product::with(['features'])
        ->where('status_id', 1)
        ->orderBy('created_at', 'desc')
        ->get()
        ->map(function ($product) {
            return [
                'id' => $product->id ?? 0,
                'name' => $product->name ?? 'Unknown Product',
                'type' => $product->type ?? 'Unknown Type',
                'tags' => $product->tags ? array_map('trim', explode(',', $product->tags)) : [],
                'desc' => $product->description ?? '',
                'dis_price' => isset($product->discounted_price) ? number_format($product->discounted_price, 0) . ' LKR' : '0 LKR',
                'ret_price' => isset($product->retail_price) ? number_format($product->retail_price, 0) . ' LKR' : '0 LKR',
                'features' => $product->features->pluck('feature')->filter()->toArray(),
                'warranty' => $product->warranty ?? 'No warranty',
                'in_stock' => (bool)($product->in_stock ?? false),
                'image' => $product->image ? asset($product->image) : '/api/placeholder/300/200',
                'deal_start' => $product->deal_start ?? null,
                'deal_end' => $product->deal_end ?? null,
                'created_at' => $product->created_at,

            ];
        });

    return response()->json($products);
}
}
