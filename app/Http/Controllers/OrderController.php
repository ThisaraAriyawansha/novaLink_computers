<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Payment;


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
        // Fetch the payment with its related orders, customer, and payment status
        $payment = Payment::with(['customer', 'paymentStatus', 'orders.product'])
            ->findOrFail($id);

        // Pass the payment data to the view
        return view('admin.orderDetails', compact('payment'));
    }

    
}
