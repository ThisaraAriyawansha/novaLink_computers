<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Helpers\ProductHelper;
use App\Models\ProductFeature;

class ProductController extends Controller
{
    public function category(Request $request)
    {
        // Fetch products from the database with features
        $products = Product::with(['features'])->where('status_id', 1);

        // Apply filter for product type
        $filter = $request->query('filter', 'ALL');
        if ($filter !== 'ALL') {
            $products = $products->where('type', $filter);
        }

        // Apply brand filter if provided
        $brand = $request->query('brand', 'all');
        if ($brand !== 'all') {
            $products = $products->where('brand', $brand);
        }

        // Fetch product features for the selected type or brand
        $productQuery = Product::where('status_id', 1);
        if ($filter !== 'ALL') {
            $productQuery->where('type', $filter);
        }
        if ($brand !== 'all') {
            $productQuery->where('brand', $brand);
        }
        $productIds = $productQuery->pluck('id');

        // Get unique product features for the filtered products
        $productFeatures = ProductFeature::whereIn('product_id', $productIds)
            ->select('feature_name', 'feature_value')
            ->distinct()
            ->get()
            ->groupBy('feature_name')
            ->map(function ($group) {
                return $group->pluck('feature_value')->unique()->values()->toArray();
            });

        // Apply search filter if provided
        $searchQuery = $request->query('search', '');
        if (!empty($searchQuery)) {
            $products = $products->where('name', 'like', '%' . $searchQuery . '%');
        }

        // Apply price range filter
        $priceMin = $request->query('price_min');
        $priceMax = $request->query('price_max');
        if ($priceMin !== null && $priceMax !== null) {
            $products = $products->whereBetween('discounted_price', [$priceMin, $priceMax]);
        }

        // Apply warranty filter if provided
        $warranty = $request->query('warranty', 'all');
        if ($warranty !== 'all') {
            $products = $products->where('warranty', $warranty);
        }

        // Apply stock status filter if provided
        $stockStatus = $request->query('stock', 'ALL');
        if ($stockStatus !== 'ALL') {
            $products = $products->where('in_stock', $stockStatus);
        }

        // Apply product features filter
        $features = $request->query('features', []);
        if (!empty($features)) {
            foreach ($features as $featureName => $featureValues) {
                if (!empty($featureValues)) {
                    $products = $products->whereHas('features', function ($query) use ($featureName, $featureValues) {
                        $query->where('feature_name', $featureName)
                              ->whereIn('feature_value', $featureValues);
                    });
                }
            }
        }

        // Sort products based on the request
        $sort = $request->query('sort', 'name_asc');
        switch ($sort) {
            case 'name_asc':
                $products = $products->orderBy('name', 'asc');
                break;
            case 'name_desc':
                $products = $products->orderBy('name', 'desc');
                break;
            case 'price_asc':
                $products = $products->orderBy('retail_price', 'asc');
                break;
            case 'price_desc':
                $products = $products->orderBy('retail_price', 'desc');
                break;
        }

        // Apply pagination (12 items per page)
        $products = $products->paginate(15);

        // Modify products to change 'discounted_price' to 'dis_price'
        $products->setCollection(
            $products->getCollection()->map(function ($product) {
                $product->dis_price = $product->discounted_price;
                return $product;
            })
        );

        // Return the view with the products, applied filters, and product features
        return view('product-category', compact('products', 'filter', 'brand', 'warranty', 'productFeatures'));
    }
    
    


    



        public function getMaxPrice()
        {
            $maxPrice = Product::max('discounted_price');
            return response()->json(['maxPrice' => $maxPrice]);
        }

        public function getProductQuantity($productId)
        {
            $product = Product::find($productId);
            return response()->json(['qty' => $product->qty]);
        }
}
