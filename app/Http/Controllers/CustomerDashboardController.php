<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Bid;
use App\Models\Customer;
use App\Models\BitOrder;
use App\Models\Payment;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Session;

class CustomerDashboardController extends Controller
{
    public function index()
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
    
        $customerId = session('customer_id', null);
        $bids = Bid::with('product')
            ->where('customer_id', $customerId)
            ->get();
    
        // Retrieve customer from session
        $customer = Customer::find(Session::get('customer_id'));
    
        // Fetch customer's payments and related orders
        $payments = Payment::with(['orders.product'])
            ->where('customer_id', $customerId)
            ->get();
    
        // Pass the data to the 'dashboard' view
        return view('dashboard', [
            'products' => $products,
            'bids' => $bids,
            'customer' => $customer,
            'payments' => $payments, // Add payments to the view
        ]);
    }


    public function bitPay(Request $request)
    {
        $productId = $request->query('product_id');
        $productName = $request->query('product_name');
        $highestBid = $request->query('highest_bid');
    
        if (!$productId || !$productName || !$highestBid) {
            return redirect()->back()->with('error', 'Invalid product or bid information.');
        }
    
        $product = Product::with(['features'])
            ->where('id', $productId)
            ->where('status_id', 1)
            ->first();
    
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
    
        $productData = [
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
    
        return view('bitPay', [
            'products' => $productData,
            'highest_bid' => $highestBid,
        ]);
    }


    public function placeOrder(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address1' => 'required|string|max:255',
            'address2' => 'nullable|string|max:255',
            'city' => 'required|string|max:100',
            'postal_code' => 'required|string|max:20',
            'message' => 'nullable|string',
            'product_id' => 'required|exists:products,id',
            'product_name' => 'required|string|max:255',
            'highest_bid' => 'required|numeric|min:0',
        ]);

        // Retrieve customer from session
        $customerId = Session::get('customer_id');
        if (!$customerId) {
            return redirect()->back()->with('error', 'You must be logged in to place an order.');
        }

        // Create the order
        BitOrder::create([
            'customer_id' => $customerId,
            'address_line1' => $validated['address1'],
            'address_line2' => $validated['address2'],
            'city' => $validated['city'],
            'postal_code' => $validated['postal_code'],
            'additional_information' => $validated['message'],
            'product_id' => $validated['product_id'],
            'product_name' => $validated['product_name'],
            'price' => $validated['highest_bid'],
            'payment_status_id' => 1, // Default to Pending
        ]);

        $product = Product::find($validated['product_id']);
        if ($product && $product->qty > 0) {
            $product->qty -= 1;
            $product->save();
        }

            // Update status of all bids for this product to 2
        Bid::where('product_id', $validated['product_id'])
        ->update(['status' => 2]);


        // Redirect with success message
        return redirect()->Back()->with('success', 'Order placed successfully!');
    }

    public function updateAccount(Request $request)
    {
        $customerId = Session::get('customer_id');
        $customer = Customer::findOrFail($customerId);

        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:customers,email,' . $customer->id,
            'current_password' => 'nullable|string',
            'new_password' => 'nullable|string|min:8|confirmed',
        ]);

        $customer->fname = $request->fname;
        $customer->lname = $request->lname;
        $customer->email = $request->email;

        if ($request->filled('current_password') && $request->filled('new_password')) {
            if (!Hash::check($request->current_password, $customer->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }
            $customer->password = Hash::make($request->new_password);
        }

        $customer->save();

        return redirect()->back()->with('success', 'Account details updated successfully.');
    }
}
