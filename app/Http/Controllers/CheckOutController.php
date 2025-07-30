<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail; 
use App\Mail\OrderConfirmation;


class CheckOutController extends Controller
{
    public function CheckOutShow(Request $request)
    {
        // Existing checkout show logic
        $cartData = json_decode($request->input('cartData'), true) ?? [];
        $totalAmount = 0;
        $cartProducts = [];
        
        foreach ($cartData as $item) {
            $product = Product::with(['features'])
                ->where('id', $item['id'])
                ->first();

            if ($product) {
                $productTotal = $product->discounted_price * $item['quantity'];
                $totalAmount += $productTotal;

                $cartProducts[] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->discounted_price,
                    'quantity' => $item['quantity'],
                    'image' => asset($product->image),
                    'totalPrice' => $productTotal,
                ];
            }
        }

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

        return view('checkout', [
            'products' => $products,
            'cartProducts' => $cartProducts,
            'totalAmount' => $totalAmount . ' LKR',
        ]);
    }

/*

    public function processCheckout(Request $request)
{
    // Validate the request
    $validated = $request->validate([
        'fname' => 'required|string|max:255',
        'lname' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required',
        'message' => 'nullable|string',
        'cartData' => 'required',
    ]);

    try {
        DB::beginTransaction();

        // Handle customer data
        $customerId = session('customer_id', null);
        if (!$customerId) {
            // Create new customer if not logged in
            $customer = Customer::create([
                'fname' => $validated['fname'],
                'lname' => $validated['lname'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'username' => $validated['email'],
                'password' => bcrypt('12345678'), // Set password to '12345678'
            ]);
            $customerId = $customer->id;
        } else {
            $customer = Customer::find($customerId);
        }

        // Create payment record first
        $payment = Payment::create([
            'customer_id' => $customerId,
            'total' => 0, // Will update this after calculating total
            'note' => $validated['message'],
            'payment_status_id' => 1, // Pending status
        ]);

        // Process cart items
        $cartData = json_decode($request->input('cartData'), true);
        $totalAmount = 0;
        $orderDetails = [];

        // Create orders and calculate total
        foreach ($cartData as $item) {
            $product = Product::find($item['id']);
            
            if (!$product) {
                throw new \Exception("Product not found: {$item['id']}");
            }

            // Check if enough quantity is available
            if ($product->qty < $item['quantity']) {
                throw new \Exception("Insufficient quantity for product: {$product->name}");
            }

            $itemTotal = $product->discounted_price * $item['quantity'];
            $totalAmount += $itemTotal;

            // Create order
            Order::create([
                'product_id' => $item['id'],
                'qty' => $item['quantity'],
                'payment_id' => $payment->id,
            ]);

            // Update product quantity
            $product->update([
                'qty' => $product->qty - $item['quantity']
            ]);

            // If qty is below threshold, update in_stock status to "Out of Stock"
            if ($product->qty <= 0) {
                $product->update([
                    'in_stock' => 'Out of Stock'
                ]);
            }

            // Prepare order details for email
            $orderDetails[] = [
                'product_name' => $product->name,
                'quantity' => $item['quantity'],
                'price' => $product->discounted_price,
            ];
        }

        // Update payment with final total
        $payment->update([
            'total' => $totalAmount
        ]);

        DB::commit();

        // Initialize payment gateway
        $merchant_id = '1228636';
        $merchant_secret = 'MjAxNzczMDg1NTIzOTE5ODQxMzcyNjAyNzI1MTc1MTA4OTk=';

        $paymentData = [
            "merchant_id" => $merchant_id,
            "return_url" => route('payment.return'), // Route for handling return URL
            "cancel_url" => route('payment.cancel'), // Route for handling cancel URL
            "notify_url" => route('payment.notify'), // Route for handling notify URL
            "order_id" => $payment->id,
            "items" => "Order Items",
            "currency" => "LKR",
            "amount" => $totalAmount,
            "first_name" => $customer->fname,
            "last_name" => $customer->lname,
            "email" => $customer->email,
            "phone" => $customer->phone,
            "address" => "No.1, Galle Road, Colombo",
            "city" => "Colombo",
            "country" => "Sri Lanka",
        ];

        // Generate the hash signature
        $paymentData['hash'] = strtoupper(md5(
            $merchant_id . $paymentData['order_id'] . $paymentData['amount'] . $paymentData['currency'] . strtoupper(md5($merchant_secret))
        ));

        // Return JSON response with payment data
        return response()->json([
            'success' => true,
            'message' => 'Payment initialized successfully',
            'paymentData' => $paymentData,
        ]);

    } catch (\Exception $e) {
        DB::rollBack();
        \Log::error('Checkout Error: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Failed to process order: ' . $e->getMessage()
        ], 500);
    }
}


public function handleNotify(Request $request)
{
    // Verify the payment
    $merchant_secret = 'MjAxNzczMDg1NTIzOTE5ODQxMzcyNjAyNzI1MTc1MTA4OTk='; // Replace with your Merchant Secret
    $generatedHash = strtoupper(md5(
        $request->merchant_id .
        $request->order_id .
        $request->payhere_amount .
        $request->payhere_currency .
        $request->status_code .
        strtoupper(md5($merchant_secret))
    ));

    if ($generatedHash === $request->md5sig && $request->status_code == 2) {
        // Payment is successful
        $payment = Payment::find($request->order_id);
        $payment->update([
            'payment_status_id' => 2, // Update to successful status
        ]);

        // Send email to customer
        $customer = $payment->customer;
        $orderDetails = $payment->orders->map(function ($order) {
            return [
                'product_name' => $order->product->name,
                'quantity' => $order->qty,
                'price' => $order->product->discounted_price,
            ];
        });

        Mail::to($customer->email)->send(new OrderConfirmation($orderDetails, $customer, $payment->total));

        return response('Payment successful', 200);
    } else {
        // Payment failed or invalid
        return response('Payment verification failed', 400);
    }
}

public function handleReturn(Request $request)
{
    $payment = Payment::find($request->order_id);
    return view('orderSucess', compact('payment'));
}

public function handleCancel(Request $request)
{
    $payment = Payment::find($request->order_id);
    return view('payment.response', compact('payment'));
}

// CheckOutController.php
public function showPaymentForm(Request $request)
{
    $paymentData = json_decode(urldecode($request->query('data')), true);
    return view('payment.form', compact('paymentData'));
}
 * This is a multi-line comment.
 * It can span multiple lines.
 * You can describe a block of code or provide detailed explanations here.
 */

 public function processCheckout(Request $request)
 {
     // Validate the request
     $validated = $request->validate([
         'fname' => 'required|string|max:255',
         'lname' => 'required|string|max:255',
         'phone' => 'required|string|max:20',
         'email' => 'required|email', // Ensure a valid email is provided
         'message' => 'nullable|string', // Allow message to be nullable
         'cartData' => 'required', // Cart data must be provided
         'address1' => 'required|string|max:255',
         'address2' => 'nullable|string|max:255',
         'city' => 'required|string|max:255',
         'postal_code' => 'required|string|max:20',
     ]);
 
     try {
         DB::beginTransaction();
 
         // Handle customer data
         $customerId = session('customer_id', null);
         if (!$customerId) {
             // Create new customer if not logged in
             $customer = Customer::create([
                 'fname' => $validated['fname'],
                 'lname' => $validated['lname'],
                 'phone' => $validated['phone'],
                 'email' => $validated['email'],
                 'username' => $validated['email'],
                 'password' => bcrypt('12345678'), // Set password to '12345678'
             ]);
             $customerId = $customer->id;
         } else {
             $customer = Customer::find($customerId);
         }
 
         // Create payment record
         $payment = Payment::create([
             'customer_id' => $customerId,
             'total' => 0, // Will update this after calculating total
             'note' => $validated['message'] ?? null, // If message is empty, save null
             'payment_status_id' => 1, // Pending status
             'address1' => $validated['address1'],
             'address2' => $validated['address2'] ?? null,
             'city' => $validated['city'],
             'postal_code' => $validated['postal_code'],
         ]);
 
         // Decode cart data
         $cartData = json_decode($request->input('cartData'), true);
         $totalAmount = 0;
         $orderDetails = [];
 
         // Create orders and calculate total
         foreach ($cartData as $item) {
             $product = Product::find($item['id']);
             
             if (!$product) {
                 throw new \Exception("Product not found: {$item['id']}");
             }
 
             // Check if enough quantity is available
             if ($product->qty < $item['quantity']) {
                 throw new \Exception("Insufficient quantity for product: {$product->name}");
             }
 
             $itemTotal = $product->discounted_price * $item['quantity'];
             $totalAmount += $itemTotal;
 
             // Create order
             Order::create([
                 'product_id' => $item['id'],
                 'qty' => $item['quantity'],
                 'payment_id' => $payment->id,
             ]);
 
             // Update product quantity and stock status
             $product->update([
                 'qty' => $product->qty - $item['quantity'],
             ]);
 
             // If qty is below threshold, update in_stock status to "Out of Stock"
             if ($product->qty <= 0) {
                 $product->update([
                     'in_stock' => 'Out of Stock'
                 ]);
             }
 
             // Prepare order details for email
             $orderDetails[] = [
                 'product_name' => $product->name,
                 'quantity' => $item['quantity'],
                 'price' => $product->discounted_price,
             ];
         }
 
         // Update payment with final total
         $payment->update([
             'total' => $totalAmount
         ]);
 
         DB::commit();
 
         // Send email to customer
         Mail::to($customer->email)->send(new OrderConfirmation($orderDetails, $customer, $totalAmount));
 
         return response()->json([
             'success' => true,
             'message' => 'Order placed successfully',
             'payment_id' => $payment->id
         ]);
 
     } catch (\Exception $e) {
         DB::rollBack();
         \Log::error('Checkout Error: ' . $e->getMessage());
         return response()->json([
             'success' => false,
             'message' => 'Failed to process order. Please try again. ' . $e->getMessage()
         ], 500);
     }
 }
 
 


}