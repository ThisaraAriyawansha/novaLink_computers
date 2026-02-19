<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BitOrder;
use App\Models\Product;
use App\Models\PaymentStatus;

class ShopBitOrderController extends Controller
{
    public function index()
    {
        $myProductIds = Product::where('user_id', Auth::id())->pluck('id');

        $bitOrders = BitOrder::with(['product', 'customer', 'paymentStatus'])
            ->whereIn('product_id', $myProductIds)
            ->orderByDesc('created_at')
            ->paginate(15);

        $statuses = PaymentStatus::all();

        return view('shop.orders.bit-orders', compact('bitOrders', 'statuses'));
    }

    public function updatePaymentStatus(Request $request, $id)
    {
        $request->validate([
            'payment_status_id' => 'required|exists:payment_statuses,id',
        ]);

        $myProductIds = Product::where('user_id', Auth::id())->pluck('id');

        // Ensure this bit order belongs to the shop owner's product
        $bitOrder = BitOrder::whereIn('product_id', $myProductIds)->findOrFail($id);

        $bitOrder->payment_status_id = $request->payment_status_id;
        $bitOrder->save();

        return back()->with('success', 'Payment status updated successfully.');
    }
}
