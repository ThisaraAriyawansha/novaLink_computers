@include('layouts.shop_header')
<style>
*, *::before, *::after { box-sizing: border-box; }

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

/* ── Payment badges ── */
.p-badge { display:inline-block; padding:3px 10px; border-radius:12px; font-size:11px; font-weight:600; white-space:nowrap; }
.p-paid    { background:#e8f5e9; color:#2e7d32; }
.p-pending { background:#fff3e0; color:#e65100; }
.p-cancel  { background:#ffebee; color:#c62828; }

/* ── Status select & btn ── */
.ps-select {
    border:1.5px solid #ddd; border-radius:7px;
    padding:6px 10px; font-size:12px; font-weight:600;
    cursor:pointer; background:white; font-family:inherit;
    outline:none; transition:border-color 0.15s; flex:1; min-width:0;
}
.ps-select:focus { border-color:#000; }

.ps-btn {
    background:#111; color:#fff; border:none;
    border-radius:7px; padding:7px 13px;
    font-size:12px; font-weight:600; cursor:pointer;
    white-space:nowrap; font-family:inherit;
    transition:background 0.15s; flex-shrink:0;
}
.ps-btn:hover { background:#333; }

/* ── Product image ── */
.prod-img {
    width:50px; height:42px; object-fit:cover;
    border-radius:6px; border:1px solid #eee; flex-shrink:0;
}
.prod-placeholder {
    width:50px; height:42px; background:#f5f5f5;
    border-radius:6px; display:flex; align-items:center;
    justify-content:center; color:#ccc; font-size:16px; flex-shrink:0;
}

/* ── Table card ── */
.table-card {
    background:white; border:1px solid #e0e0e0;
    border-radius:10px; overflow:hidden; margin-bottom:14px;
}

/* ── Desktop table ── */
.table-responsive { overflow-x:auto; -webkit-overflow-scrolling:touch; }

.bit-table { width:100%; border-collapse:collapse; min-width:680px; border:none; }

.bit-table th {
    background:#f5f5f5; padding:11px 14px;
    text-align:left; font-size:12px; font-weight:600;
    color:#000; border-bottom:2px solid #ddd; white-space:nowrap;
}
.bit-table td {
    padding:11px 14px; border-bottom:1px solid #f0f0f0;
    font-size:13px; color:#333; vertical-align:middle;
}
.bit-table tr:last-child td { border-bottom:none; }
.bit-table tr:hover td { background:#fafafa; }

/* ── Mobile card list ── */
.mobile-list { display:none; }

.mob-card {
    padding:14px; border-bottom:1px solid #f0f0f0;
}
.mob-card:last-child { border-bottom:none; }

.mob-top {
    display:flex; gap:11px; align-items:flex-start; margin-bottom:10px;
}

.mob-info { flex:1; min-width:0; }

.mob-id {
    font-size:11px; font-weight:700; color:#aaa;
    text-transform:uppercase; letter-spacing:.5px; margin-bottom:2px;
}
.mob-name { font-size:14px; font-weight:700; color:#111; margin-bottom:2px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
.mob-type { font-size:11px; color:#999; margin-bottom:6px; }

.mob-meta {
    display:grid; grid-template-columns:1fr 1fr; gap:8px 14px;
    margin-bottom:10px;
}
.mob-meta-item { display:flex; flex-direction:column; gap:2px; }
.mob-meta-label { font-size:10px; font-weight:600; color:#aaa; text-transform:uppercase; letter-spacing:.4px; }
.mob-meta-val { font-size:13px; color:#222; font-weight:500; }

.mob-address {
    font-size:12px; color:#666; margin-bottom:10px;
    padding:8px 10px; background:#fafafa; border-radius:6px;
    border:1px solid #f0f0f0; line-height:1.5;
}

.mob-status-row {
    display:flex; align-items:center; gap:8px; margin-bottom:8px; flex-wrap:wrap;
}

.mob-form { display:flex; gap:7px; align-items:center; }
.mob-form .ps-select { flex:1; }

/* ── Empty state ── */
.empty-state {
    text-align:center; padding:60px 20px; color:#888;
}
.empty-state i { font-size:44px; color:#ccc; display:block; margin-bottom:14px; }

/* ── Pagination ── */
.pagination-wrap {
    display:flex; justify-content:space-between; align-items:center;
    flex-wrap:wrap; gap:10px; padding:12px 0;
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

/* ── Mobile ≤ 640px ── */
@media (max-width:640px) {
    .wrap { padding:14px 10px 40px; }
    .page-title { font-size:16px; }
    .table-responsive { display:none; }
    .mobile-list { display:block; }
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
        <i class="fas fa-gavel"></i> Bid Orders for My Products
        @if($bitOrders->total())
            <span style="font-size:13px;color:#999;font-weight:400;">{{ $bitOrders->total() }} order(s)</span>
        @endif
    </div>

    @if($bitOrders->isEmpty())
        <div class="table-card">
            <div class="empty-state">
                <i class="fas fa-gavel"></i>
                No bid orders yet for your products.
            </div>
        </div>
    @else

    <div class="table-card">

        {{-- ── Desktop Table ── --}}
        <div class="table-responsive">
            <table class="bit-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Customer</th>
                        <th>Bid Price</th>
                        <th>Delivery Address</th>
                        <th>Payment Status</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bitOrders as $bitOrder)
                    @php
                        $ps = strtolower($bitOrder->paymentStatus->status_name ?? '');
                        $badgeClass = str_contains($ps,'paid')||str_contains($ps,'complet')||str_contains($ps,'success') ? 'p-paid' : (str_contains($ps,'cancel') ? 'p-cancel' : 'p-pending');
                    @endphp
                    <tr>
                        <td style="font-weight:700;color:#111;">#{{ $bitOrder->id }}</td>
                        <td>
                            <div style="display:flex;align-items:center;gap:10px;">
                                @if($bitOrder->product && $bitOrder->product->image)
                                    <img src="{{ asset($bitOrder->product->image) }}" class="prod-img" alt="">
                                @else
                                    <div class="prod-placeholder"><i class="fas fa-box"></i></div>
                                @endif
                                <div>
                                    <div style="font-weight:600;font-size:13px;">{{ $bitOrder->product_name }}</div>
                                    @if($bitOrder->product)
                                        <div style="font-size:11px;color:#999;">{{ $bitOrder->product->type ?? '' }}</div>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td style="font-weight:600;">{{ $bitOrder->customer->fname ?? 'N/A' }} {{ $bitOrder->customer->lname ?? '' }}</td>
                        <td style="font-weight:700;color:#111;">Rs. {{ number_format($bitOrder->price, 2) }}</td>
                        <td style="font-size:12px;color:#666;max-width:180px;">
                            {{ $bitOrder->address_line1 }}
                            @if($bitOrder->address_line2), {{ $bitOrder->address_line2 }}@endif<br>
                            {{ $bitOrder->city }}, {{ $bitOrder->postal_code }}
                        </td>
                        <td>
                            <div style="display:flex;flex-direction:column;gap:7px;">
                                <span class="p-badge {{ $badgeClass }}">{{ $bitOrder->paymentStatus->status_name ?? 'Pending' }}</span>
                                <form method="POST" action="{{ route('shop.bit-orders.updatePaymentStatus', $bitOrder->id) }}" style="display:flex;gap:6px;align-items:center;">
                                    @csrf @method('PATCH')
                                    <select name="payment_status_id" class="ps-select">
                                        @foreach($statuses as $status)
                                            <option value="{{ $status->id }}" {{ $bitOrder->payment_status_id == $status->id ? 'selected' : '' }}>{{ $status->status_name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="ps-btn"><i class="fas fa-check"></i></button>
                                </form>
                            </div>
                        </td>
                        <td style="font-size:12px;color:#888;white-space:nowrap;">
                            {{ $bitOrder->created_at->format('M j, Y') }}<br>
                            <span style="font-size:11px;">{{ $bitOrder->created_at->format('g:i A') }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- ── Mobile Card List ── --}}
        <div class="mobile-list">
            @foreach($bitOrders as $bitOrder)
            @php
                $ps = strtolower($bitOrder->paymentStatus->status_name ?? '');
                $badgeClass = str_contains($ps,'paid')||str_contains($ps,'complet')||str_contains($ps,'success') ? 'p-paid' : (str_contains($ps,'cancel') ? 'p-cancel' : 'p-pending');
            @endphp
            <div class="mob-card">
                <div class="mob-top">
                    @if($bitOrder->product && $bitOrder->product->image)
                        <img src="{{ asset($bitOrder->product->image) }}" class="prod-img" alt="">
                    @else
                        <div class="prod-placeholder"><i class="fas fa-box"></i></div>
                    @endif
                    <div class="mob-info">
                        <div class="mob-id">Order #{{ $bitOrder->id }}</div>
                        <div class="mob-name">{{ $bitOrder->product_name }}</div>
                        @if($bitOrder->product)
                            <div class="mob-type">{{ $bitOrder->product->type ?? '' }}</div>
                        @endif
                    </div>
                </div>

                <div class="mob-meta">
                    <div class="mob-meta-item">
                        <span class="mob-meta-label">Customer</span>
                        <span class="mob-meta-val">{{ $bitOrder->customer->fname ?? 'N/A' }} {{ $bitOrder->customer->lname ?? '' }}</span>
                    </div>
                    <div class="mob-meta-item">
                        <span class="mob-meta-label">Bid Price</span>
                        <span class="mob-meta-val">Rs. {{ number_format($bitOrder->price, 2) }}</span>
                    </div>
                    <div class="mob-meta-item">
                        <span class="mob-meta-label">Date</span>
                        <span class="mob-meta-val">{{ $bitOrder->created_at->format('M j, Y') }}</span>
                    </div>
                    <div class="mob-meta-item">
                        <span class="mob-meta-label">Time</span>
                        <span class="mob-meta-val">{{ $bitOrder->created_at->format('g:i A') }}</span>
                    </div>
                </div>

                <div class="mob-address">
                    <i class="fas fa-map-marker-alt" style="margin-right:5px;color:#bbb;font-size:11px;"></i>
                    {{ $bitOrder->address_line1 }}{{ $bitOrder->address_line2 ? ', '.$bitOrder->address_line2 : '' }},
                    {{ $bitOrder->city }}, {{ $bitOrder->postal_code }}
                </div>

                <div class="mob-status-row">
                    <span style="font-size:11px;font-weight:600;color:#aaa;text-transform:uppercase;letter-spacing:.4px;">Payment:</span>
                    <span class="p-badge {{ $badgeClass }}">{{ $bitOrder->paymentStatus->status_name ?? 'Pending' }}</span>
                </div>

                <form method="POST" action="{{ route('shop.bit-orders.updatePaymentStatus', $bitOrder->id) }}" class="mob-form">
                    @csrf @method('PATCH')
                    <select name="payment_status_id" class="ps-select">
                        @foreach($statuses as $status)
                            <option value="{{ $status->id }}" {{ $bitOrder->payment_status_id == $status->id ? 'selected' : '' }}>{{ $status->status_name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="ps-btn"><i class="fas fa-check" style="margin-right:4px;"></i>Update</button>
                </form>
            </div>
            @endforeach
        </div>

    </div>

    {{-- Pagination --}}
    <div class="pagination-wrap">
        <span class="pagination-info">Showing {{ $bitOrders->firstItem() }}–{{ $bitOrders->lastItem() }} of {{ $bitOrders->total() }}</span>
        <div class="pagination-links">
            @if(!$bitOrders->onFirstPage())
                <a href="{{ $bitOrders->previousPageUrl() }}" class="pg-link">‹ Prev</a>
            @endif
            @foreach($bitOrders->getUrlRange(1, $bitOrders->lastPage()) as $page => $url)
                <a href="{{ $url }}" class="pg-link {{ $page == $bitOrders->currentPage() ? 'active' : '' }}">{{ $page }}</a>
            @endforeach
            @if($bitOrders->hasMorePages())
                <a href="{{ $bitOrders->nextPageUrl() }}" class="pg-link">Next ›</a>
            @endif
        </div>
    </div>

    @endif

</div>
</div>
