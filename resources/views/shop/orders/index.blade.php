@include('layouts.shop_header')

<style>

.wrap { max-width:1200px; margin:0 auto; padding:20px 14px 50px; }

/* ── Alert ── */
.alert-success {
    background:#f0fdf4; border:1px solid #bbf7d0; color:#166534;
    padding:11px 16px; border-radius:8px; margin-bottom:16px;
    font-size:13px; display:flex; align-items:center; gap:8px;
}

/* ── Page title ── */
.page-title {
    font-size:18px; font-weight:700; color:#111;
    margin-bottom:18px; display:flex; align-items:center; gap:10px; flex-wrap:wrap;
}

/* ── Status badges ── */
.s-badge { display:inline-flex; align-items:center; gap:4px; padding:3px 10px; border-radius:20px; font-size:11px; font-weight:700; white-space:nowrap; }
.s-pending    { background:#fff3e0; color:#e65100; }
.s-processing { background:#e3f2fd; color:#1565c0; }
.s-shipped    { background:#f3e5f5; color:#6a1b9a; }
.s-delivered  { background:#e8f5e9; color:#2e7d32; }
.s-cancelled  { background:#ffebee; color:#c62828; }

/* ── Order card ── */
.order-card {
    background:white; border-radius:10px;
    border:1px solid #e0e0e0;
    margin-bottom:14px;
    overflow:visible;
}
.order-card-body { overflow:visible; }

.order-card-head {
    display:flex; align-items:center; justify-content:space-between;
    flex-wrap:wrap; gap:10px;
    padding:13px 16px; border-bottom:1px solid #f0f0f0; background:#fafafa;
}

.head-left { display:flex; align-items:center; gap:12px; flex-wrap:wrap; }

.order-id { font-size:15px; font-weight:700; color:#111; }

.head-meta { font-size:12px; color:#777; display:flex; align-items:center; gap:5px; }

.pay-badge {
    padding:3px 10px; border-radius:12px; font-size:11px; font-weight:600;
}

.head-right { display:flex; align-items:center; gap:10px; flex-wrap:wrap; }

.revenue-text { font-size:13px; font-weight:700; color:#111; white-space:nowrap; }

.view-btn {
    display:inline-flex; align-items:center;
    padding:7px 14px; background:#fff; color:#000;
    text-decoration:none; border:1.5px solid #000;
    border-radius:6px; font-size:12px; font-weight:600;
    white-space:nowrap; transition:all 0.15s;
}
.view-btn:hover { background:#000; color:#fff; }

/* ── Line items (desktop) ── */
.line-row {
    display:flex; align-items:center; gap:12px;
    padding:13px 16px; border-bottom:1px solid #f5f5f5;
    min-width:0; flex-wrap:wrap;
}
.line-row:last-child { border-bottom:none; border-radius:0 0 10px 10px; }
.ml-card:last-child { border-bottom:none; border-radius:0 0 10px 10px; }

.line-img {
    width:54px; height:46px; object-fit:cover;
    border-radius:6px; flex-shrink:0; border:1px solid #eee;
}
.line-img-placeholder {
    width:54px; height:46px; background:#f5f5f5;
    border-radius:6px; flex-shrink:0;
    display:flex; align-items:center; justify-content:center;
    color:#ccc; font-size:18px;
}

.line-info { flex:1; min-width:0; }
.line-name { font-size:13px; font-weight:600; color:#111; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
.line-meta-text { font-size:11px; color:#999; margin-top:2px; }

.line-price { font-size:13px; font-weight:700; color:#111; white-space:nowrap; flex-shrink:0; }

.line-actions { display:flex; align-items:center; gap:6px; flex-shrink:0; margin-left:auto; overflow:visible; }

.status-select {
    border:1.5px solid #ddd; border-radius:7px;
    padding:6px 10px; font-size:12px; font-weight:600;
    cursor:pointer; background:white; font-family:inherit;
    outline:none; transition:border-color 0.15s;
    max-width:140px;
}
.status-select:focus { border-color:#000; }

.update-btn {
    background:#111; color:#fff; border:none;
    border-radius:7px; padding:7px 16px;
    font-size:12px; font-weight:600;
    cursor:pointer; white-space:nowrap;
    font-family:inherit; transition:background 0.15s;
    flex-shrink:0; display:inline-flex; align-items:center;
    visibility:visible; opacity:1;
}
.update-btn:hover { background:#333; }

/* ── Mobile line items ── */
.mobile-line { display:none; }

.ml-card {
    padding:13px 14px;
    border-bottom:1px solid #f5f5f5;
}
.ml-card:last-child { border-bottom:none; }

.ml-top { display:flex; gap:11px; margin-bottom:10px; }

.ml-img {
    width:56px; height:48px; object-fit:cover;
    border-radius:7px; flex-shrink:0; border:1px solid #eee;
}
.ml-img-placeholder {
    width:56px; height:48px; background:#f5f5f5;
    border-radius:7px; flex-shrink:0;
    display:flex; align-items:center; justify-content:center;
    color:#ccc; font-size:18px;
}

.ml-info { flex:1; min-width:0; }
.ml-name { font-size:13px; font-weight:700; color:#111; margin-bottom:3px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
.ml-meta { font-size:11px; color:#999; margin-bottom:6px; }
.ml-price { font-size:13px; font-weight:700; color:#111; }

.ml-form {
    display:flex; gap:7px; align-items:center; flex-wrap:wrap;
}
.ml-form .status-select { flex:1; min-width:0; }
.ml-form .update-btn { flex-shrink:0; }

/* ── Empty state ── */
.empty-state {
    text-align:center; padding:60px 20px; color:#888;
    background:white; border-radius:10px; border:1px solid #e0e0e0;
}
.empty-state i { font-size:44px; color:#ccc; display:block; margin-bottom:14px; }

/* ── Pagination ── */
.pagination-wrap {
    display:flex; justify-content:space-between; align-items:center;
    padding:12px 0; flex-wrap:wrap; gap:10px;
}
.pagination-info { font-size:12px; color:#888; }
.pagination-links { display:flex; gap:5px; flex-wrap:wrap; }
.pg-link {
    padding:6px 12px; border:1px solid #ddd; border-radius:6px;
    text-decoration:none; color:#333; font-size:12px; background:white;
    transition:all 0.15s;
}
.pg-link.active { background:#111; color:#fff; border-color:#111; }
.pg-link:hover:not(.active) { background:#f0f0f0; }

/* ── Mobile ── */
@media (max-width:640px) {
    .wrap { padding:14px 10px 40px; }
    .page-title { font-size:16px; }

    /* order card head stacks */
    .order-card-head { flex-direction:column; align-items:flex-start; gap:8px; padding:12px 13px; }
    .head-left { gap:8px; }
    .head-right { width:100%; justify-content:space-between; }

    /* hide desktop lines, show mobile lines */
    .line-row { display:none; }
    .mobile-line { display:block; }

    .pagination-wrap { justify-content:center; }
    .pagination-info { width:100%; text-align:center; }
}
</style>

<div class="main-content">
<div class="wrap">

    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="page-title">
        <i class="fas fa-receipt"></i> Orders for My Products
        @if(!$payments->isEmpty())
            <span style="font-size:13px;color:#999;font-weight:400;">{{ $payments->total() }} order(s)</span>
        @endif
    </div>

    @if($payments->isEmpty())
        <div class="empty-state">
            <i class="fas fa-shopping-cart"></i>
            No orders yet. When customers purchase your products, orders will appear here.
        </div>
    @else
        @foreach($payments as $payment)
        @php
            $shopLines = $payment->orders->filter(fn($o) => $myProductIds->contains($o->product_id));
            if($shopLines->isEmpty()) continue;
            $shopRevenue = $shopLines->sum(fn($o) => ($o->product->discounted_price ?? $o->product->retail_price ?? 0) * $o->qty);
            $pStatus = strtolower($payment->paymentStatus->status_name ?? '');
            $isPaid = str_contains($pStatus,'paid') || str_contains($pStatus,'complet') || str_contains($pStatus,'success');
            $isCancelled = str_contains($pStatus,'cancel');
        @endphp

        <div class="order-card">

            {{-- Header --}}
            <div class="order-card-head">
                <div class="head-left">
                    <span class="order-id">#{{ $payment->id }}</span>
                    <span class="head-meta"><i class="fas fa-user"></i> {{ $payment->customer->fname ?? '' }} {{ $payment->customer->lname ?? '' }}</span>
                    <span class="head-meta"><i class="fas fa-calendar"></i> {{ $payment->created_at->format('M j, Y g:i A') }}</span>
                    <span class="pay-badge" style="background:{{ $isPaid ? '#e8f5e9' : ($isCancelled ? '#ffebee' : '#fff3e0') }};color:{{ $isPaid ? '#2e7d32' : ($isCancelled ? '#c62828' : '#e65100') }};">
                        Payment: {{ $payment->paymentStatus->status_name ?? 'Pending' }}
                    </span>
                </div>
                <div class="head-right">
                    <span class="revenue-text">Rs. {{ number_format($shopRevenue, 2) }}</span>
                    <a href="{{ route('shop.orders.show', $payment->id) }}" class="view-btn">
                        <i class="fas fa-eye" style="margin-right:5px;"></i>View Order
                    </a>
                </div>
            </div>

            {{-- Line items: Desktop --}}
            <div class="order-card-body">
                @foreach($shopLines as $order)
                @php $statusKey = $order->shop_order_status ?? 'pending'; @endphp

                {{-- Desktop row --}}
                <div class="line-row">
                    @if($order->product && $order->product->image)
                        <img src="{{ asset($order->product->image) }}" class="line-img" alt="">
                    @else
                        <div class="line-img-placeholder"><i class="fas fa-box"></i></div>
                    @endif

                    <div class="line-info">
                        <div class="line-name">{{ $order->product->name ?? 'N/A' }}</div>
                        <div class="line-meta-text">{{ $order->product->type ?? '' }} &bull; Qty: {{ $order->qty }} &bull; #{{ $order->id }}</div>
                    </div>

                    <span class="s-badge s-{{ $statusKey }}">
                        <i class="fas fa-circle" style="font-size:7px;"></i>
                        {{ \App\Models\Order::STATUSES[$statusKey]['label'] ?? ucfirst($statusKey) }}
                    </span>

                    <div class="line-price">Rs. {{ number_format(($order->product->discounted_price ?? $order->product->retail_price ?? 0) * $order->qty, 2) }}</div>

                    <div class="line-actions">
                        <form method="POST" action="{{ route('shop.orders.updateStatus', $order->id) }}" style="display:flex;gap:6px;align-items:center;flex-wrap:nowrap;overflow:visible;">
                            @csrf @method('PATCH')
                            <select name="status" class="status-select">
                                @foreach(\App\Models\Order::STATUSES as $key => $info)
                                    <option value="{{ $key }}" {{ $statusKey === $key ? 'selected' : '' }}>{{ $info['label'] }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="update-btn">Update</button>
                        </form>
                    </div>
                </div>

                {{-- Mobile card --}}
                <div class="mobile-line">
                    <div class="ml-card">
                        <div class="ml-top">
                            @if($order->product && $order->product->image)
                                <img src="{{ asset($order->product->image) }}" class="ml-img" alt="">
                            @else
                                <div class="ml-img-placeholder"><i class="fas fa-box"></i></div>
                            @endif
                            <div class="ml-info">
                                <div class="ml-name">{{ $order->product->name ?? 'N/A' }}</div>
                                <div class="ml-meta">{{ $order->product->type ?? '' }} &bull; Qty: {{ $order->qty }} &bull; Line #{{ $order->id }}</div>
                                <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;">
                                    <span class="s-badge s-{{ $statusKey }}">
                                        <i class="fas fa-circle" style="font-size:7px;"></i>
                                        {{ \App\Models\Order::STATUSES[$statusKey]['label'] ?? ucfirst($statusKey) }}
                                    </span>
                                    <span class="ml-price">Rs. {{ number_format(($order->product->discounted_price ?? $order->product->retail_price ?? 0) * $order->qty, 2) }}</span>
                                </div>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('shop.orders.updateStatus', $order->id) }}" class="ml-form">
                            @csrf @method('PATCH')
                            <select name="status" class="status-select">
                                @foreach(\App\Models\Order::STATUSES as $key => $info)
                                    <option value="{{ $key }}" {{ $statusKey === $key ? 'selected' : '' }}>{{ $info['label'] }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="update-btn"><i class="fas fa-check" style="margin-right:3px;"></i>Update</button>
                        </form>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
        @endforeach

        {{-- Pagination --}}
        <div class="pagination-wrap">
            <span class="pagination-info">Showing {{ $payments->firstItem() }}–{{ $payments->lastItem() }} of {{ $payments->total() }}</span>
            <div class="pagination-links">
                @if(!$payments->onFirstPage())
                    <a href="{{ $payments->previousPageUrl() }}" class="pg-link">‹ Prev</a>
                @endif
                @foreach($payments->getUrlRange(1, $payments->lastPage()) as $page => $url)
                    <a href="{{ $url }}" class="pg-link {{ $page == $payments->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                @endforeach
                @if($payments->hasMorePages())
                    <a href="{{ $payments->nextPageUrl() }}" class="pg-link">Next ›</a>
                @endif
            </div>
        </div>
    @endif

</div>
@include('layouts.shop_footer')
</div>