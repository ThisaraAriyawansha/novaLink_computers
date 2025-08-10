<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductImage;
use App\Models\Customer;
use App\Models\Payment;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function indexadmin()
    {
        try {
            // Basic counts
            $productCount = Product::count();
            $productFeatureCount = ProductFeature::count();
            $productImageCount = ProductImage::count();
            $customerCount = Customer::count();
            $paymentCount = Payment::count();

            // Revenue analytics - handle cases where payment_status_id might not exist
            $totalRevenue = Payment::sum('total') ?? 0;
            $todayRevenue = Payment::whereDate('created_at', today())->sum('total') ?? 0;
            $monthlyRevenue = Payment::whereMonth('created_at', now()->month)
                ->whereYear('created_at', now()->year)
                ->sum('total') ?? 0;

            // Monthly revenue chart data (last 12 months)
            $monthlyRevenueData = [];
            for ($i = 11; $i >= 0; $i--) {
                $month = Carbon::now()->subMonths($i);
                $revenue = Payment::whereMonth('created_at', $month->month)
                    ->whereYear('created_at', $month->year)
                    ->sum('total') ?? 0;
                
                $monthlyRevenueData[] = [
                    'month' => $month->format('M Y'),
                    'revenue' => (float) $revenue
                ];
            }

            // Daily orders for last 7 days
            $dailyOrdersData = [];
            for ($i = 6; $i >= 0; $i--) {
                $date = Carbon::now()->subDays($i);
                $orders = Payment::whereDate('created_at', $date->toDateString())->count();
                
                $dailyOrdersData[] = [
                    'date' => $date->format('M j'),
                    'orders' => $orders
                ];
            }

            // Top selling products - simplified query
            $topProducts = collect();
            if (DB::getSchemaBuilder()->hasTable('orders')) {
                try {
                    $topProducts = DB::table('orders')
                        ->join('products', 'orders.product_id', '=', 'products.id')
                        ->select('products.name', DB::raw('SUM(orders.qty) as total_sold'))
                        ->groupBy('products.id', 'products.name')
                        ->orderByDesc('total_sold')
                        ->limit(5)
                        ->get();
                } catch (\Exception $e) {
                    $topProducts = collect();
                }
            }

            // Recent orders - handle potential missing relationships
            $recentOrders = collect();
            try {
                $recentOrders = Payment::with(['customer'])
                    ->orderBy('created_at', 'desc')
                    ->limit(5)
                    ->get();
            } catch (\Exception $e) {
                $recentOrders = Payment::orderBy('created_at', 'desc')->limit(5)->get();
            }

            // Payment status distribution - handle potential missing table
            $paymentStatusData = collect([
                (object)['status' => 'Completed', 'count' => $paymentCount],
                (object)['status' => 'Pending', 'count' => 0],
                (object)['status' => 'Failed', 'count' => 0]
            ]);

            if (DB::getSchemaBuilder()->hasTable('payment_statuses')) {
                try {
                    $paymentStatusData = DB::table('payments')
                        ->join('payment_statuses', 'payments.payment_status_id', '=', 'payment_statuses.id')
                        ->select('payment_statuses.name as status', DB::raw('COUNT(*) as count'))
                        ->groupBy('payment_statuses.id', 'payment_statuses.name')
                        ->get();
                } catch (\Exception $e) {
                    // Keep default data
                }
            }

            // Customer growth (last 6 months)
            $customerGrowthData = [];
            for ($i = 5; $i >= 0; $i--) {
                $month = Carbon::now()->subMonths($i);
                $customers = Customer::whereMonth('created_at', $month->month)
                    ->whereYear('created_at', $month->year)
                    ->count();
                
                $customerGrowthData[] = [
                    'month' => $month->format('M Y'),
                    'customers' => $customers
                ];
            }

            // Recent customers
            $recentCustomers = Customer::orderBy('created_at', 'desc')
                ->limit(5)
                ->get();

            return view('admin.dashboard', compact(
                'productCount', 
                'productFeatureCount', 
                'productImageCount', 
                'customerCount', 
                'paymentCount',
                'totalRevenue',
                'todayRevenue',
                'monthlyRevenue',
                'monthlyRevenueData',
                'dailyOrdersData',
                'topProducts',
                'recentOrders',
                'paymentStatusData',
                'customerGrowthData',
                'recentCustomers'
            ));

        } catch (\Exception $e) {
            // If there's any error, provide basic dashboard with minimal data
            return view('admin.dashboard', [
                'productCount' => Product::count(),
                'productFeatureCount' => ProductFeature::count(),
                'productImageCount' => ProductImage::count(),
                'customerCount' => Customer::count(),
                'paymentCount' => Payment::count(),
                'totalRevenue' => 0,
                'todayRevenue' => 0,
                'monthlyRevenue' => 0,
                'monthlyRevenueData' => [],
                'dailyOrdersData' => [],
                'topProducts' => collect(),
                'recentOrders' => collect(),
                'paymentStatusData' => collect(),
                'customerGrowthData' => [],
                'recentCustomers' => collect()
            ]);
        }
    }
}