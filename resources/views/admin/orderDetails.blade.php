@include('layouts.header')

<style>
    /* Modern Styles */
    .main-content {
        padding: 20px;
        background-color: #f9fafb;
    }

    .title-box {
        margin-bottom: 20px;
    }

    .title-box .body-text {
        font-size: 24px;
        font-weight: 600;
        color:rgb(75, 88, 112);
    }

    .wg-table {
        background: transparent;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin-bottom: 20px;
    }

    .payment-details, .order-details {
        margin-bottom: 30px;
    }

    .payment-details h3, .order-details h3 {
        font-size: 20px;
        font-weight: 600;
        color: #2d3748;
        margin-bottom: 15px;
    }

    .payment-details ul {
        list-style: none;
        padding: 0;
    }

    .payment-details ul li {
        font-size: 16px;
        color: #4a5568;
        margin-bottom: 10px;
    }

    .payment-details ul li strong {
        font-weight: 600;
        color: #2d3748;
    }

    .order-details table {
        width: 100%;
        border-collapse: collapse;
    }

    .order-details table thead {
        background-color: transparent;
    }

    .order-details table th, .order-details table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #e2e8f0;
    }

    .order-details table th {
        font-weight: 600;
        color: #2d3748;
    }

    .order-details table td {
        color: #4a5568;
    }

    .btn-primary {
        background-color: #4299e1;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #3182ce;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .payment-details ul li, .order-details table th, .order-details table td {
            font-size: 14px;
        }

        .title-box .body-text {
            font-size: 20px;
        }

        .btn-primary {
            width: 100%;
            text-align: center;
        }
        
    }

/* Apply black border to all table elements */
.order-details table {
    width: 100%;
    border-collapse: collapse;
    border: 1px solid black; /* Outer border */
}

.order-details table th, 
.order-details table td {
    padding: 12px;
    text-align: left;
    border: 1px solid black; /* Inner cell borders */
    font-size: 18px; /* Adjusted for desktop */
}

/* Increase table font size on desktop */
@media (min-width: 1024px) {
    .order-details table th, 
    .order-details table td {
        font-size: 18px;
    }
}

/* Responsive Design */
@media (max-width: 768px) {
    .payment-details ul li, 
    .order-details table th, 
    .order-details table td {
        font-size: 10px; /* Reduced font size for mobile */
    }

    .title-box .body-text {
        font-size: 20px;
    }

    .btn-primary {
        width: 100%;
        text-align: center;
    }
}


    
</style>

<div class="main-content">
    
    <div class="main-content-inner">
    <div class="wg-box">

        <div class="title-box">
            <div class="body-text">Order Details</div>
        </div>

        <div class="wg-table">
            
            <!-- Payment Details -->
            <div class="payment-details">
                <h3>Payment Information</h3>
                <ul>
                    <li><strong>Customer:</strong> {{ $payment->customer->fname }} {{ $payment->customer->lname }}</li>
                    <li><strong>Total Amount:</strong> Rs.{{ number_format($payment->total, 2) }}</li>
                    <li><strong>Note:</strong> {{ $payment->note }}</li>
                    <li><strong>Address Line 1:</strong> {{ $payment->address1 }}</li>
                    <li><strong>Address Line 2:</strong> {{ $payment->address2 }}</li>
                    <li><strong>City:</strong> {{ $payment->city }}</li>
                    <li><strong>Postal Code:</strong> {{ $payment->postal_code }}</li>

                    <li><strong>Payment Status:</strong> {{ $payment->paymentStatus->status_name }}</li>
                </ul>
            </div>

            <!-- Order Details -->
            <div class="order-details">
                <h3>Ordered Products</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payment->orders as $order)
                            <tr>
                                <td>{{ $order->product->name }}</td>
                                <td>{{ $order->qty }}</td>
                                <td>Rs.{{ number_format($order->product->discounted_price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="divider"></div>
        </div>


    </div>
    @include('layouts.footer')
</div>

