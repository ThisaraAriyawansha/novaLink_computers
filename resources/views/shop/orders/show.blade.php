@include('layouts.shop_header')
<style>
.wrap { max-width:800px; margin:30px auto; padding:0 20px 50px; }
.card { background:white; border-radius:12px; padding:28px; box-shadow:0 2px 10px rgba(0,0,0,0.07); margin-bottom:20px; }
.card-title { font-size:15px; font-weight:700; color:#1a3a6b; margin-bottom:16px; padding-bottom:10px; border-bottom:1px solid #e8eef8; }
.info-row { display:flex; gap:8px; margin-bottom:8px; font-size:14px; }
.info-label { font-weight:600; color:#555; min-width:130px; }
.info-val { color:#333; }
.order-line { display:flex; justify-content:space-between; align-items:center; padding:12px 0; border-bottom:1px solid #f0f4fb; }
.order-line:last-child { border-bottom:none; }
.badge-paid { background:#e8f5e9; color:#2e7d32; padding:3px 10px; border-radius:12px; font-size:12px; font-weight:600; }
.badge-pending { background:#fff3e0; color:#e65100; padding:3px 10px; border-radius:12px; font-size:12px; font-weight:600; }
.total-row { display:flex; justify-content:space-between; padding-top:14px; border-top:2px solid #e8eef8; font-size:15px; font-weight:700; }
</style>

<div class="main-content">
<div class="wrap">
    <div style="margin-bottom:18px;">
        <a href="{{ route('shop.orders.index') }}" style="color:#1a3a6b;text-decoration:none;font-size:14px;">
            <i class="fas fa-arrow-left" style="margin-right:6px;"></i>Back to Orders
        </a>
    </div>

    <div class="card">
        <div class="card-title"><i class="fas fa-info-circle" style="margin-right:8px;"></i>Order #{{ $payment->id }} — Customer Details</div>
        <div class="info-row"><span class="info-label">Customer Name:</span><span class="info-val">{{ $payment->customer->fname ?? '' }} {{ $payment->customer->lname ?? '' }}</span></div>
        <div class="info-row"><span class="info-label">Email:</span><span class="info-val">{{ $payment->customer->email ?? '-' }}</span></div>
        <div class="info-row"><span class="info-label">Phone:</span><span class="info-val">{{ $payment->customer->phone ?? '-' }}</span></div>
        <div class="info-row"><span class="info-label">Delivery Address:</span><span class="info-val">
            {{ $payment->address1 }}{{ $payment->address2 ? ', '.$payment->address2 : '' }},
            {{ $payment->city }} {{ $payment->postal_code }}
        </span></div>
        <div class="info-row"><span class="info-label">Order Date:</span><span class="info-val">{{ $payment->created_at->format('M j, Y g:i A') }}</span></div>
        <div class="info-row">
            <span class="info-label">Payment Status:</span>
            <span class="info-val">
                @php $status = strtolower($payment->paymentStatus->status_name ?? ''); @endphp
                <span class="{{ str_contains($status,'paid')||str_contains($status,'complet')||str_contains($status,'success') ? 'badge-paid' : 'badge-pending' }}">
                    {{ $payment->paymentStatus->status_name ?? 'Pending' }}
                </span>
            </span>
        </div>
        @if($payment->note)
        <div class="info-row"><span class="info-label">Note:</span><span class="info-val">{{ $payment->note }}</span></div>
        @endif
    </div>

    <div class="card">
        <div class="card-title"><i class="fas fa-box" style="margin-right:8px;"></i>Your Products in This Order</div>
        @foreach($shopOrders as $order)
        <div class="order-line">
            <div style="display:flex;align-items:center;gap:12px;">
                @if($order->product && $order->product->image)
                    <img src="{{ asset($order->product->image) }}" style="width:55px;height:45px;object-fit:cover;border-radius:6px;" alt="">
                @endif
                <div>
                    <div style="font-weight:600;font-size:14px;">{{ $order->product->name ?? 'N/A' }}</div>
                    <div style="font-size:12px;color:#888;">{{ $order->product->type ?? '' }} | Qty: {{ $order->qty }}</div>
                </div>
            </div>
            <div style="text-align:right;">
                <div style="font-weight:600;">Rs. {{ number_format(($order->product->discounted_price ?? $order->product->retail_price ?? 0) * $order->qty, 2) }}</div>
                <div style="font-size:12px;color:#888;">@ Rs. {{ number_format($order->product->discounted_price ?? $order->product->retail_price ?? 0, 2) }} each</div>
            </div>
        </div>
        @endforeach

        @php
            $shopRevenue = $shopOrders->sum(fn($o) => ($o->product->discounted_price ?? $o->product->retail_price ?? 0) * $o->qty);
        @endphp
        <div class="total-row">
            <span>Your Revenue from This Order</span>
            <span style="color:#1a3a6b;">Rs. {{ number_format($shopRevenue, 2) }}</span>
        </div>
    </div>
</div>
@include('layouts.shop_footer')
</div>
