<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductFeature;
use App\Models\ProductImage;
use App\Models\Customer;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function indexadmin()
    {
        // Fetch counts for Products, Product Features, Product Images, Customers, and Payments
        $productCount = Product::count();
        $productFeatureCount = ProductFeature::count();
        $productImageCount = ProductImage::count();
        $customerCount = Customer::count();
        $paymentCount = Payment::count();
    
        // Pass the counts to the view
        return view('admin.dashboard', compact('productCount', 'productFeatureCount', 'productImageCount', 'customerCount', 'paymentCount'));
    }
    
}
