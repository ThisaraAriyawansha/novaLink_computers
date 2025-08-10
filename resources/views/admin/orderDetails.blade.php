@include('layouts.header')

<style>
    :root {
        --primary: #000000ff;
        --primary-light: #000000ff;
        --gray-100: #f3f4f6;
        --gray-200: #e5e7eb;
        --gray-300: #d1d5db;
        --gray-600: #4b5563;
        --gray-700: #374151;
        --gray-900: #111827;
        --white: #ffffff;
        --shadow-sm: 0 1px 2px 0 rgba(0,0,0,0.05);
        --shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -1px rgba(0,0,0,0.06);
        --shadow-md: 0 10px 15px -3px rgba(0,0,0,0.1), 0 4px 6px -2px rgba(0,0,0,0.05);
        --radius-sm: 0.25rem;
        --radius: 0.375rem;
        --radius-md: 0.5rem;
    }

    /* Base Styles with Larger Fonts */


    .main-content {
        background-color: var(--gray-100);
        min-height: 100vh;
        padding: 1rem;
    }

    .wg-box {
        background: var(--white);
        border-radius: var(--radius-md);
        box-shadow: var(--shadow);
        padding: 2.5rem; /* Increased padding */
        margin: 1rem auto;
        max-width: 1200px;
    }

    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2.5rem; /* Increased spacing */
        flex-wrap: wrap;
        gap: 1.5rem;
    }

    .admin-header h3 {
        font-size: 2rem; /* Larger heading */
        font-weight: 600;
        color: var(--gray-900);
        font-family: 'Inter', sans-serif;
        margin: 0;
        font-family: 'Orbitron', sans-serif;
    }

    .last-updated {
        background: var(--white);
        padding: 0.75rem 1.25rem;
        border-radius: var(--radius-sm);
        border: 1px solid var(--gray-200);
        font-size: 1.1rem; /* Larger font */
        color: var(--gray-600);
        box-shadow: var(--shadow-sm);
    }

    /* Section Styles */
    .section-title {
        font-size: 1.75rem; /* Larger section titles */
        font-weight: 600;
        color: var(--gray-900);
        margin-bottom: 1.5rem;
        position: relative;
        padding-bottom: 0.75rem;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 4rem; /* Wider underline */
        height: 3px; /* Thicker underline */
        background-color: var(--primary);
    }

    /* Payment Details */
    .payment-details {
        margin-bottom: 3rem; /* More spacing */
    }

    .detail-list {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); /* Wider cards */
        gap: 1.5rem; /* More gap between items */
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .detail-item {
        background: var(--gray-100);
        padding: 1.5rem; /* More padding */
        border-radius: var(--radius-sm);
        border-left: 4px solid var(--primary); /* Thicker accent border */
    }

    .detail-label {
        font-size: 1.1rem; /* Larger label */
        color: var(--gray-600);
        font-weight: 500;
        display: block;
        margin-bottom: 0.5rem; /* More spacing */
    }

    .detail-value {
        font-size: 1.3rem; /* Significantly larger values */
        color: var(--gray-900);
        font-weight: 600;
    }

    /* Order Table */
    .order-table {
        width: 100%;
        border-collapse: collapse;
        background: var(--white);
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: var(--shadow-sm);
        font-size: 1.1rem; /* Larger table font */
    }

    .order-table thead {
        background-color: var(--primary);
    }

    .order-table th {
        padding: 1.25rem; /* More padding */
        text-align: left;
        color: var(--white);
        font-weight: 500;
        text-transform: uppercase;
        font-size: 1rem; /* Larger header */
        letter-spacing: 0.05em;
    }

    .order-table td {
        padding: 1.25rem; /* More padding */
        border-bottom: 1px solid var(--gray-200);
        color: var(--gray-700);
    }

    .order-table tr:last-child td {
        border-bottom: none;
    }

    .order-table tr:hover {
        background-color: var(--gray-50);
    }

    /* Status Badge */
    .status-badge {
        display: inline-block;
        padding: 0.5rem 1rem; /* Larger badge */
        border-radius: 9999px;
        font-size: 1rem; /* Larger font */
        font-weight: 600;
        text-transform: uppercase;
    }

    .status-paid {
        background-color: #dcfce7;
        color: #166534;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        body {
            font-size: 16px; /* Slightly smaller on mobile */
        }

        .wg-box {
            padding: 1.75rem;
            margin: 0.75rem;
        }

        .admin-header h3 {
            font-size: 1.75rem;
        }

        .section-title {
            font-size: 1.5rem;
        }

        .detail-list {
            grid-template-columns: 1fr;
            gap: 1.25rem;
        }

        .detail-value {
            font-size: 1.2rem;
        }

        .order-table th, 
        .order-table td {
            padding: 1rem;
            font-size: 1rem;
        }
    }

    @media (max-width: 480px) {
        .admin-header h3 {
            font-size: 1.5rem;
        }

        .section-title {
            font-size: 1.3rem;
        }

        .detail-item {
            padding: 1.25rem;
        }

        .detail-value {
            font-size: 1.1rem;
        }
    }
</style>

<div class="main-content">
    <div class="main-content-inner">
        <div class="wg-box">
            <div class="admin-header">
                <h3>Order Details</h3>
                <div class="last-updated">
                    Last updated: {{ now()->format('M j, Y g:i A') }}
                </div>
            </div>

            <!-- Payment Details -->
            <div class="payment-details">
                <h3 class="section-title">Payment Information</h3>
                <ul class="detail-list">
                    <li class="detail-item">
                        <span class="detail-label">Customer</span>
                        <span class="detail-value">{{ $payment->customer->fname }} {{ $payment->customer->lname }}</span>
                    </li>
                    <li class="detail-item">
                        <span class="detail-label">Total Amount</span>
                        <span class="detail-value">Rs.{{ number_format($payment->total, 2) }}</span>
                    </li>
                    <li class="detail-item">
                        <span class="detail-label">Note</span>
                        <span class="detail-value">{{ $payment->note ?? 'N/A' }}</span>
                    </li>
                    <li class="detail-item">
                        <span class="detail-label">Address</span>
                        <span class="detail-value">
                            {{ $payment->address1 }}<br>
                            {{ $payment->address2 }}<br>
                            {{ $payment->city }}, {{ $payment->postal_code }}
                        </span>
                    </li>
                    <li class="detail-item">
                        <span class="detail-label">Payment Status</span>
                        <span class="detail-value status-badge status-paid">{{ $payment->paymentStatus->status_name }}</span>
                    </li>
                </ul>
            </div>

            <!-- Order Details -->
            <div class="order-details">
                <h3 class="section-title">Ordered Products</h3>
                <table class="order-table">
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
    </div>
</div>

@include('layouts.footer')