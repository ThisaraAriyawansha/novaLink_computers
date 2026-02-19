<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Validation\Rule;

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

    /**
     * Update the shop_order_status for a specific order line.
     * Only the shop owner who owns that product may update it.
     */
    public function updateStatus(Request $request, $orderId)
    {
        $request->validate([
            'status' => ['required', Rule::in(array_keys(Order::STATUSES))],
        ]);

        $myProductIds = Product::where('user_id', Auth::id())->pluck('id');

        // Load the order line and verify it belongs to this shop's product
        $order = Order::whereIn('product_id', $myProductIds)->findOrFail($orderId);

        $order->shop_order_status = $request->status;
        $order->save();

        if ($request->wantsJson()) {
            return response()->json(['success' => true, 'status' => $request->status]);
        }

        return back()->with('success', 'Order item status updated to "' . Order::STATUSES[$request->status]['label'] . '".');
    }
}
