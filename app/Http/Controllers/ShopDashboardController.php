<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;
use App\Models\Shop;

class ShopDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $shop = $user->shop;

        // Own products count
        $productCount = Product::where('user_id', $user->id)->count();

        // Orders that contain the shop owner's products
        $myProductIds = Product::where('user_id', $user->id)->pluck('id');
        $orderCount   = Order::whereIn('product_id', $myProductIds)->distinct('payment_id')->count('payment_id');

        // Total revenue from shop's products
        $orders = Order::with(['payment', 'product'])
            ->whereIn('product_id', $myProductIds)
            ->get();

        $totalRevenue = 0;
        foreach ($orders as $order) {
            if ($order->product) {
                $totalRevenue += ($order->product->discounted_price ?? $order->product->retail_price) * $order->qty;
            }
        }

        // Deal of the Day products belonging to this shop owner
        $dealProducts = Product::where('user_id', $user->id)
            ->where('tags', 'DEAL OF THE DAYS')
            ->where(function ($q) {
                $today = now()->toDateString();
                $q->whereNull('deal_end')
                  ->orWhere('deal_end', '>=', $today);
            })
            ->orderBy('deal_start')
            ->get();

        return view('shop.dashboard', compact('shop', 'productCount', 'orderCount', 'totalRevenue', 'user', 'dealProducts'));
    }
}
