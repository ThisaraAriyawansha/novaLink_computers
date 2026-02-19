<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;

class ShopOrderController extends Controller
{
    /** List orders that contain the shop owner's products */
    public function index()
    {
        $myProductIds = Product::where('user_id', Auth::id())->pluck('id');

        // Get payment IDs that include at least one of the shop's products
        $paymentIds = Order::whereIn('product_id', $myProductIds)
            ->distinct()
            ->pluck('payment_id');

        $payments = Payment::with(['orders.product', 'customer', 'paymentStatus'])
            ->whereIn('id', $paymentIds)
            ->orderByDesc('created_at')
            ->paginate(15);

        return view('shop.orders.index', compact('payments', 'myProductIds'));
    }

    /** Show detail of one order (payment) filtered to shop's products */
    public function show($id)
    {
        $myProductIds = Product::where('user_id', Auth::id())->pluck('id');

        $payment = Payment::with(['orders.product', 'customer', 'paymentStatus'])
            ->findOrFail($id);

        // Filter orders in this payment to only the shop's products
        $shopOrders = $payment->orders->filter(fn($o) => $myProductIds->contains($o->product_id));

        // Verify this payment actually belongs to the shop
        abort_if($shopOrders->isEmpty(), 403);

        return view('shop.orders.show', compact('payment', 'shopOrders'));
    }
}
