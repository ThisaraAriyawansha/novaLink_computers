<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Blog;


class PageController extends Controller
{
    public function aboutusShow()
        {
            // Fetch products with features where status_id = 1
            $products = Product::with(['features'])
                ->where('status_id', 1)
                ->get()
                ->map(function ($product) {
                    return [
                        'id'         => $product->id,
                        'name'       => $product->name,
                        'type'       => $product->type,
                        'tags'       => $product->tags,
                        'desc'       => $product->description,
                        'dis_price'  => $product->discounted_price . ' LKR',
                        'ret_price'  => $product->retail_price . ' LKR',
                        'features'   => $product->features->pluck('feature')->toArray(),
                        'warranty'   => $product->warranty,
                        'in_stock'   => $product->in_stock,
                        'image'      => asset($product->image),
                    ];
                });

            // Fetch the latest 2 blogs
            $blogs = Blog::latest()
                ->take(2)
                ->get()
                ->map(function ($blog) {
                    return [
                        'id'          => $blog->id,
                        'image'       => asset($blog->image),
                        'date'        => $blog->date->format('d, M Y'), // e.g., "21, Apr 2025"
                        'title'       => $blog->title,
                        'description' => $blog->description,
                        'tag'         => $blog->tag,
                    ];
                });

            // Return the 'about' view with products and blogs
            return view('about', [
                'products' => $products,
                'blogs'    => $blogs,
            ]);
        }


    public function contact()
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
        return view('contact', ['products' => $products]);
    }
    

    public function blogShow()
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
        return view('blog', ['products' => $products]);
    }


    public function blogSingleShow()
    {
        // Get the blog-id from the query parameter
        $blogId = request()->query('blog-id');

        // Fetch the blog post by ID or throw 404 if not found
        $blog = Blog::findOrFail($blogId);

        // Fetch products (consistent with homeShow and blogShow)
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

        // Format blog data
        $blogData = [
            'id' => $blog->id,
            'image' => asset($blog->image),
            'date' => $blog->date->format('d, M Y'),
            'title' => $blog->title,
            'description' => $blog->description,
            'tag' => $blog->tag ? explode(',', $blog->tag) : [],
        ];

        // Pass blog and products data to the 'blog-single' view
        return view('blog', ['blog' => $blogData, 'products' => $products]);
    }
    
    public function singleProduct(Request $request)
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
        return view('single-product', ['product' => $productData, 'products' => $products]);
    }
    
}

