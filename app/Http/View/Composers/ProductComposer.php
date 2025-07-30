<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\Product;

class ProductComposer
{
    public function compose(View $view)
    {
        // Fetch active products with relationships
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
                    'features' => $product->features->pluck('feature')->toArray(), // Adjust to 'feature' column name
                    'warranty' => $product->warranty,
                    'in_stock' => $product->in_stock,
                    'image' => asset($product->image),
                ];
            });
    
        // Share products with all views
        $view->with('products', $products);
    }
    
    
    
}
