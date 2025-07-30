<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class CartController extends Controller
{
    //
    public function cartShow()
    {
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
                'dis_price' => $product->discounted_price . ' LKR',
                'ret_price' => $product->retail_price . ' LKR',
                'features' => $product->features->pluck('feature')->toArray(),
                'warranty' => $product->warranty,
                'in_stock' => $product->in_stock,
                'image' => asset($product->image),
            ];
        });
        return view('cart', ['products' => $products]);
    }

    public function wishlistShow()
    {
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
                'dis_price' => $product->discounted_price . ' LKR',
                'ret_price' => $product->retail_price . ' LKR',
                'features' => $product->features->pluck('feature')->toArray(),
                'warranty' => $product->warranty,
                'in_stock' => $product->in_stock,
                'image' => asset($product->image),
            ];
        });
        return view('wishlist', ['products' => $products]);
    }
}

