@include('layouts.shop_header')
<style>
.wrap { max-width:1200px; margin:0 auto; padding:24px 16px 50px; }
.page-title { font-size:20px; font-weight:700; color:#111; margin-bottom:20px; display:flex; align-items:center; gap:10px; }

/* Status badge */
.s-badge { display:inline-flex; align-items:center; gap:5px; padding:3px 11px; border-radius:20px; font-size:12px; font-weight:700; white-space:nowrap; }
.s-pending    { background:#fff3e0; color:#e65100; }
.s-processing { background:#e3f2fd; color:#1565c0; }
.s-shipped    { background:#f3e5f5; color:#6a1b9a; }
.s-delivered  { background:#e8f5e9; color:#2e7d32; }
.s-cancelled  { background:#ffebee; color:#c62828; }

/* Orders list */
.order-card { background:white; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.07); margin-bottom:14px; overflow:hidden; border:1px solid #f0f0f0; }
.order-card-head { display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:10px; padding:14px 20px; border-bottom:1px solid #f5f5f5; background:#fafafa; }
.order-card-body { padding:0; }

/* Line item row */
.line-row { display:flex; align-items:center; gap:14px; padding:14px 20px; border-bottom:1px solid #f5f5f5; flex-wrap:wrap; }
.line-row:last-child { border-bottom:none; }
.line-img { width:56px; height:48px; object-fit:cover; border-radius:6px; flex-shrink:0; }
.line-img-placeholder { width:56px; height:48px; background:#f0f0f0; border-radius:6px; flex-shrink:0; display:flex; align-items:center; justify-content:center; color:#ccc; font-size:18px; }
.line-info { flex:1; min-width:0; }
.line-name { font-size:14px; font-weight:600; color:#111; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
.line-meta { font-size:12px; color:#888; margin-top:2px; }
.line-price { font-size:14px; font-weight:700; color:#111; white-space:nowrap; margin-left:auto; text-align:right; }
.line-actions { display:flex; align-items:center; gap:8px; flex-shrink:0; }

/* Status dropdown */
.status-select { border:1.5px solid #e0e0e0; border-radius:7px; padding:5px 10px; font-size:12px; font-weight:600; cursor:pointer; background:white; }
.update-btn { background:#111; color:#fff; border:none; border-radius:7px; padding:6px 14px; font-size:12px; font-weight:600; cursor:pointer; white-space:nowrap; }
.update-btn:hover { background:#333; }

/* Responsive */
@media(max-width:640px){
    .order-card-head { flex-direction:column; align-items:flex-start; }
    .line-row { flex-wrap:wrap; gap:10px; }
    .line-price { width:100%; text-align:left; margin-left:0; }
    .line-actions { width:100%; }
    .status-select { flex:1; }
}
</style>

<div class="main-content">
<div class="wrap">

    @if(session('success'))
        <div style="background:#f0fdf4;border:1px solid #bbf7d0;color:#166534;padding:11px 16px;border-radius:8px;margin-bottom:16px;font-size:13px;">
            <i class="fas fa-check-circle" style="margin-right:6px;"></i>{{ session('success') }}
        </div>
    @endif

    <div class="page-title">
        <i class="fas fa-receipt"></i>Orders for My Products
        @if(!$payments->isEmpty())
            <span style="font-size:13px;color:#999;font-weight:400;">{{ $payments->total() }} order(s)</span>
        @endif
    </div>

    @if($payments->isEmpty())
        <div style="text-align:center;padding:60px 20px;color:#888;background:white;border-radius:12px;">
            <i class="fas fa-shopping-cart" style="font-size:48px;margin-bottom:14px;display:block;color:#ccc;"></i>
            No orders yet. When customers purchase your products, orders will appear here.
        </div>
    @else
        @foreach($payments as $payment)
        @php
            $shopLines = $payment->orders->filter(fn($o) => $myProductIds->contains($o->product_id));
            if($shopLines->isEmpty()) continue;
            $shopRevenue = $shopLines->sum(fn($o) => ($o->product->discounted_price ?? $o->product->retail_price ?? 0) * $o->qty);
            $pStatus = strtolower($payment->paymentStatus->status_name ?? '');
        @endphp
        <div class="order-card">
            {{-- Card Header --}}
            <div class="order-card-head">
                <div style="display:flex;align-items:center;gap:16px;flex-wrap:wrap;">
                    <span style="font-size:15px;font-weight:700;color:#111;">#{{ $payment->id }}</span>
                    <span style="font-size:13px;color:#666;">
                        <i class="fas fa-user" style="margin-right:4px;"></i>
                        {{ $payment->customer->fname ?? '' }} {{ $payment->customer->lname ?? '' }}
                    </span>
                    <span style="font-size:12px;color:#999;">
                        <i class="fas fa-calendar" style="margin-right:4px;"></i>
                        {{ $payment->created_at->format('M j, Y g:i A') }}
                    </span>
                    {{-- Overall payment status (read-only — set by system/admin) --}}
                    <span style="background:{{ str_contains($pStatus,'paid')||str_contains($pStatus,'complet')||str_contains($pStatus,'success') ? '#e8f5e9' : (str_contains($pStatus,'cancel') ? '#ffebee' : '#fff3e0') }};
                               color:{{ str_contains($pStatus,'paid')||str_contains($pStatus,'complet')||str_contains($pStatus,'success') ? '#2e7d32' : (str_contains($pStatus,'cancel') ? '#c62828' : '#e65100') }};
                               padding:3px 10px;border-radius:12px;font-size:11px;font-weight:600;">
                        Payment: {{ $payment->paymentStatus->status_name ?? 'Pending' }}
                    </span>
                </div>
                <div style="font-size:14px;font-weight:700;color:#111;">
                    Revenue: Rs. {{ number_format($shopRevenue, 2) }}
                </div>
            </div>

            {{-- Per-product line items --}}
            <div class="order-card-body">
                @foreach($shopLines as $order)
                @php $statusKey = $order->shop_order_status ?? 'pending'; @endphp
                <div class="line-row">
                    {{-- Product image --}}
                    @if($order->product && $order->product->image)
                        <img src="{{ asset($order->product->image) }}" class="line-img" alt="">
                    @else
                        <div class="line-img-placeholder"><i class="fas fa-box"></i></div>
                    @endif

                    {{-- Product info --}}
                    <div class="line-info">
                        <div class="line-name">{{ $order->product->name ?? 'N/A' }}</div>
                        <div class="line-meta">
                            {{ $order->product->type ?? '' }} &bull; Qty: {{ $order->qty }}
                            &bull; Order Line #{{ $order->id }}
                        </div>
                    </div>

                    {{-- Current status badge --}}
                    <span class="s-badge s-{{ $statusKey }}">
                        <i class="fas fa-circle" style="font-size:7px;"></i>
                        {{ \App\Models\Order::STATUSES[$statusKey]['label'] ?? ucfirst($statusKey) }}
                    </span>

                    {{-- Price --}}
                    <div class="line-price">
                        Rs. {{ number_format(($order->product->discounted_price ?? $order->product->retail_price ?? 0) * $order->qty, 2) }}
                    </div>

                    {{-- Status update form --}}
                    <div class="line-actions">
                        <form method="POST" action="{{ route('shop.orders.updateStatus', $order->id) }}" style="display:flex;gap:6px;align-items:center;">
                            @csrf @method('PATCH')
                            <select name="status" class="status-select">
                                @foreach(\App\Models\Order::STATUSES as $key => $info)
                                    <option value="{{ $key }}" {{ $statusKey === $key ? 'selected' : '' }}>
                                        {{ $info['label'] }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="update-btn">
                                <i class="fas fa-check" style="margin-right:4px;"></i>Update
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach

        {{-- Pagination --}}
        <div style="display:flex;justify-content:space-between;align-items:center;padding:14px 0;flex-wrap:wrap;gap:10px;">
            <span style="font-size:13px;color:#666;">Showing {{ $payments->firstItem() }}–{{ $payments->lastItem() }} of {{ $payments->total() }}</span>
            <div style="display:flex;gap:6px;">
                @if(!$payments->onFirstPage())
                    <a href="{{ $payments->previousPageUrl() }}" style="padding:6px 12px;border:1px solid #ddd;border-radius:6px;text-decoration:none;color:#333;font-size:13px;">Prev</a>
                @endif
                @foreach($payments->getUrlRange(1, $payments->lastPage()) as $page => $url)
                    <a href="{{ $url }}" style="padding:6px 12px;border:1px solid {{ $page==$payments->currentPage() ? '#111' : '#ddd' }};border-radius:6px;text-decoration:none;color:{{ $page==$payments->currentPage() ? '#fff' : '#333' }};background:{{ $page==$payments->currentPage() ? '#111' : 'white' }};font-size:13px;">{{ $page }}</a>
                @endforeach
                @if($payments->hasMorePages())
                    <a href="{{ $payments->nextPageUrl() }}" style="padding:6px 12px;border:1px solid #ddd;border-radius:6px;text-decoration:none;color:#333;font-size:13px;">Next</a>
                @endif
            </div>
        </div>
    @endif

</div>
@include('layouts.shop_footer')
</div>
