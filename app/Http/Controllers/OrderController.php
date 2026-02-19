<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\PaymentStatus;


class OrderController extends Controller
{
    public function orderSuccess()
    {
        // Fetch products along with their features and map them to a more convenient format
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
    
        return view('orderSucess', ['products' => $products]);
    }    



    public function viewOrder(Request $request)
    {
        $query = Payment::with(['customer', 'paymentStatus']);
    
        if ($request->has('search') && !empty($request->search)) {
            $query->whereHas('customer', function ($q) use ($request) {
                $q->where('fname', 'like', '%' . $request->search . '%');
            });
        }
    
        $payments = $query->paginate(10)->appends(['search' => $request->search]); 
    
        return view('admin.viewOrder', compact('payments'));
    }
    
    

    public function viewOrderDetails($id)
    {
        $payment = Payment::with(['customer', 'paymentStatus', 'orders.product'])
            ->findOrFail($id);

        $statuses = PaymentStatus::all();

        return view('admin.orderDetails', compact('payment', 'statuses'));
    }

    public function updatePaymentStatus(Request $request, $id)
    {
        $request->validate([
            'payment_status_id' => 'required|exists:payment_statuses,id',
        ]);

        $payment = Payment::findOrFail($id);
        $payment->payment_status_id = $request->payment_status_id;
        $payment->save();

        return back()->with('success', 'Payment status updated successfully.');
    }


}
