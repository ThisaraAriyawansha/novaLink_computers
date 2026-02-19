@include('layouts.shop_header')
<style>
*, *::before, *::after { box-sizing: border-box; }

.wrap { max-width:1100px; margin:0 auto; padding:20px 14px 50px; }

/* ── Alert ── */
.alert-success {
    background:#f0fdf4; border:1px solid #bbf7d0; color:#166534;
    padding:11px 16px; border-radius:8px; margin-bottom:16px;
    font-size:13px; display:flex; align-items:center; gap:8px;
}

/* ── Back link ── */
.back-link {
    display:inline-flex; align-items:center; gap:6px;
    color:#666; text-decoration:none; font-size:13px;
    margin-bottom:16px; transition:color 0.15s;
}
.back-link:hover { color:#000; }

/* ── Card ── */
.card {
    background:white; border:1px solid #e0e0e0;
    border-radius:10px; margin-bottom:14px; overflow:hidden;
}
.card-header {
    padding:13px 16px; border-bottom:1px solid #ececec;
    background:#fafafa; display:flex; align-items:center;
    justify-content:space-between; flex-wrap:wrap; gap:8px;
}
.card-title {
    font-size:14px; font-weight:700; color:#111;
    display:flex; align-items:center; gap:7px;
}
.card-body { padding:16px; }

/* ── Info grid ── */
.info-grid {
    display:grid; grid-template-columns:repeat(3,1fr);
    gap:14px 20px;
}
.info-row { display:flex; flex-direction:column; gap:3px; }
.info-label { font-size:10px; font-weight:600; color:#aaa; text-transform:uppercase; letter-spacing:.5px; }
.info-val { font-size:13px; color:#222; word-break:break-word; }
.col-full { grid-column:1/-1; }

/* ── Pay badge ── */
.pay-badge { padding:3px 10px; border-radius:12px; font-size:11px; font-weight:600; display:inline-block; white-space:nowrap; }

/* ── Status badge ── */
.s-badge { display:inline-flex; align-items:center; gap:4px; padding:3px 10px; border-radius:20px; font-size:11px; font-weight:700; white-space:nowrap; }
.s-pending    { background:#fff3e0; color:#e65100; }
.s-processing { background:#e3f2fd; color:#1565c0; }
.s-shipped    { background:#f3e5f5; color:#6a1b9a; }
.s-delivered  { background:#e8f5e9; color:#2e7d32; }
.s-cancelled  { background:#ffebee; color:#c62828; }

/* ── Order line — DESKTOP: 3 col grid ── */
.order-line {
    display:grid;
    grid-template-columns:64px 1fr 120px;
    gap:14px; align-items:start;
    padding:16px; border-bottom:1px solid #f0f0f0;
}
.order-line:last-of-type { border-bottom:none; }

.line-img {
    width:64px; height:54px; object-fit:cover;
    border-radius:7px; border:1px solid #eee; display:block;
}
.line-img-placeholder {
    width:64px; height:54px; background:#f5f5f5;
    border-radius:7px; display:flex; align-items:center;
    justify-content:center; color:#ccc; font-size:20px;
}

.line-body { min-width:0; }
.line-name { font-size:14px; font-weight:700; color:#111; margin-bottom:3px; }
.line-sub  { font-size:12px; color:#999; margin-bottom:10px; line-height:1.5; }

.line-right { text-align:right; }
.line-price-big { font-size:15px; font-weight:700; color:#111; }
.line-price-each { font-size:11px; color:#aaa; margin-top:2px; }

/* ── Progress steps ── */
.steps { display:flex; margin:2px 0 14px; overflow-x:auto; padding-bottom:2px; -webkit-overflow-scrolling:touch; }
.step { flex:1; min-width:52px; text-align:center; position:relative; }
.step-line {
    position:absolute; top:9px; left:50%; right:-50%;
    height:2px; z-index:0;
}
.step:last-child .step-line { display:none; }
.step-dot {
    width:18px; height:18px; border-radius:50%;
    margin:0 auto 4px; display:flex; align-items:center;
    justify-content:center; font-size:7px; color:white;
    position:relative; z-index:1;
}
.step-label { font-size:9px; line-height:1.3; color:#ccc; }
.step-label.active { color:#111; font-weight:700; }
.step-label.done   { color:#888; }

/* ── Status update box ── */
.status-box {
    background:#f7f7f5; border:1px solid #e8e8e6;
    border-radius:8px; padding:11px 13px;
}
.status-box-label {
    font-size:10px; font-weight:600; color:#aaa;
    text-transform:uppercase; letter-spacing:.5px; margin-bottom:8px;
}
.status-form { display:flex; gap:8px; align-items:center; }
.status-select {
    flex:1; min-width:0;
    border:1.5px solid #ddd; border-radius:7px;
    padding:7px 10px; font-size:13px; font-weight:600;
    cursor:pointer; background:white; font-family:inherit;
    outline:none; transition:border-color 0.15s;
}
.status-select:focus { border-color:#000; }
.status-btn {
    background:#111; color:#fff; border:none;
    border-radius:7px; padding:8px 16px;
    font-size:13px; font-weight:600;
    cursor:pointer; white-space:nowrap;
    font-family:inherit; transition:background 0.15s; flex-shrink:0;
}
.status-btn:hover { background:#333; }

/* ── Revenue footer ── */
.revenue-row {
    display:flex; justify-content:space-between; align-items:center;
    padding:13px 16px; border-top:2px solid #f0f0f0;
    font-size:14px; font-weight:700; color:#111;
}

/* ══════════════════════════════
   TABLET  ≤ 768px
══════════════════════════════ */
@media (max-width:768px) {
    .info-grid { grid-template-columns:1fr 1fr; }
}

/* ══════════════════════════════
   MOBILE  ≤ 560px
══════════════════════════════ */
@media (max-width:560px) {
    .wrap { padding:12px 10px 40px; }
    .card-body { padding:13px; }

    /* info grid single col */
    .info-grid { grid-template-columns:1fr; gap:11px; }
    .col-full  { grid-column:1; }

    /* order line: image + info stacked, price below */
    .order-line {
        grid-template-columns:56px 1fr;
        grid-template-rows:auto auto;
        gap:10px;
        padding:13px;
    }

    /* price block spans full width under image+info */
    .line-right {
        grid-column:1/-1;
        text-align:left;
        display:flex; align-items:center; justify-content:space-between;
        flex-wrap:wrap; gap:8px;
        padding-top:10px;
        border-top:1px dashed #eeeeee;
    }

    /* status form stacks */
    .status-form { flex-direction:column; gap:7px; }
    .status-select { width:100%; }
    .status-btn    { width:100%; justify-content:center; padding:10px; }

    /* steps scroll */
    .step { min-width:48px; }

    /* revenue row */
    .revenue-row { flex-direction:column; align-items:flex-start; gap:3px; padding:12px 13px; }
    .revenue-row span:last-child { font-size:16px; }

    /* card header wrap nicely */
    .card-header { padding:11px 13px; }
    .order-line:last-of-type { border-bottom:none; }
}
</style>

<div class="main-content">
<div class="wrap">

    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('shop.orders.index') }}" class="back-link">
        <i class="fas fa-arrow-left"></i> Back to Orders
    </a>

    {{-- ── Customer & Payment Info ── --}}
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <i class="fas fa-receipt" style="opacity:.45;"></i>
                Order #{{ $payment->id }}
            </div>
            @php
                $pStatus     = strtolower($payment->paymentStatus->status_name ?? '');
                $isPaid      = str_contains($pStatus,'paid') || str_contains($pStatus,'complet') || str_contains($pStatus,'success');
                $isCancelled = str_contains($pStatus,'cancel');
            @endphp
            <span class="pay-badge" style="background:{{ $isPaid ? '#e8f5e9' : ($isCancelled ? '#ffebee' : '#fff3e0') }};color:{{ $isPaid ? '#2e7d32' : ($isCancelled ? '#c62828' : '#e65100') }};">
                {{ $payment->paymentStatus->status_name ?? 'Pending' }}
            </span>
        </div>

        <div class="card-body">
            <div class="info-grid">
                <div class="info-row">
                    <span class="info-label">Customer</span>
                    <span class="info-val">{{ $payment->customer->fname ?? '' }} {{ $payment->customer->lname ?? '' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Email</span>
                    <span class="info-val">{{ $payment->customer->email ?? '—' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Phone</span>
                    <span class="info-val">{{ $payment->customer->phone ?? '—' }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Order Date</span>
                    <span class="info-val">{{ $payment->created_at->format('M j, Y g:i A') }}</span>
                </div>
                <div class="info-row col-full">
                    <span class="info-label">Delivery Address</span>
                    <span class="info-val">
                        {{ $payment->address1 }}{{ $payment->address2 ? ', '.$payment->address2 : '' }},
                        {{ $payment->city }} {{ $payment->postal_code }}
                    </span>
                </div>
                @if($payment->note)
                <div class="info-row col-full">
                    <span class="info-label">Note</span>
                    <span class="info-val">{{ $payment->note }}</span>
                </div>
                @endif
            </div>
        </div>
    </div>

    {{-- ── Products ── --}}
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <i class="fas fa-box" style="opacity:.45;"></i>
                Your Products in This Order
            </div>
            <span style="font-size:12px;color:#aaa;">{{ $shopOrders->count() }} item{{ $shopOrders->count()>1?'s':'' }}</span>
        </div>

        @foreach($shopOrders as $order)
        @php
            $statusKey   = $order->shop_order_status ?? 'pending';
            $statusInfo  = \App\Models\Order::STATUSES[$statusKey] ?? ['label'=>'Pending'];
            $allStatuses = \App\Models\Order::STATUSES;
            $stepKeys    = array_keys($allStatuses);
            $currentIdx  = array_search($statusKey, $stepKeys);
        @endphp

        <div class="order-line">

            {{-- Image --}}
            @if($order->product && $order->product->image)
                <img src="{{ asset($order->product->image) }}" class="line-img" alt="">
            @else
                <div class="line-img-placeholder"><i class="fas fa-box"></i></div>
            @endif

            {{-- Body --}}
            <div class="line-body">
                <div class="line-name">{{ $order->product->name ?? 'N/A' }}</div>
                <div class="line-sub">
                    {{ $order->product->brand ?? '' }}
                    @if($order->product->type ?? null) &bull; {{ $order->product->type }} @endif
                    &bull; Qty: <strong>{{ $order->qty }}</strong>
                    &bull; Line #{{ $order->id }}
                </div>

                {{-- Progress tracker --}}
                <div class="steps">
                    @foreach($allStatuses as $sk => $si)
                    @php
                        $sIdx   = array_search($sk, $stepKeys);
                        $done   = $sIdx < $currentIdx;
                        $active = $sk === $statusKey;
                    @endphp
                    <div class="step">
                        <div class="step-line" style="background:{{ ($done || $active) ? '#111' : '#e0e0e0' }};"></div>
                        <div class="step-dot" style="background:{{ $active ? '#111' : ($done ? '#888' : '#e0e0e0') }};">
                            @if($done || $active)<i class="fas fa-check" style="font-size:7px;"></i>@endif
                        </div>
                        <div class="step-label {{ $active ? 'active' : ($done ? 'done' : '') }}">{{ $si['label'] }}</div>
                    </div>
                    @endforeach
                </div>

                {{-- Update form --}}
                <div class="status-box">
                    <div class="status-box-label">Update Status</div>
                    <form method="POST" action="{{ route('shop.orders.updateStatus', $order->id) }}" class="status-form">
                        @csrf @method('PATCH')
                        <select name="status" class="status-select">
                            @foreach($allStatuses as $sk => $si)
                                <option value="{{ $sk }}" {{ $statusKey === $sk ? 'selected' : '' }}>{{ $si['label'] }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="status-btn">
                            <i class="fas fa-save" style="margin-right:5px;"></i>Save
                        </button>
                    </form>
                </div>
            </div>

            {{-- Price & badge --}}
            <div class="line-right">
                <div class="line-price-big">Rs. {{ number_format(($order->product->discounted_price ?? $order->product->retail_price ?? 0) * $order->qty, 2) }}</div>
                <div class="line-price-each">@ Rs. {{ number_format($order->product->discounted_price ?? $order->product->retail_price ?? 0, 2) }} each</div>
                <div style="margin-top:8px;">
                    <span class="s-badge s-{{ $statusKey }}">
                        <i class="fas fa-circle" style="font-size:6px;"></i>
                        {{ $statusInfo['label'] }}
                    </span>
                </div>
            </div>

        </div>
        @endforeach

        @php $shopRevenue = $shopOrders->sum(fn($o) => ($o->product->discounted_price ?? $o->product->retail_price ?? 0) * $o->qty); @endphp
        <div class="revenue-row">
            <span>Your Revenue from This Order</span>
            <span>Rs. {{ number_format($shopRevenue, 2) }}</span>
        </div>
    </div>

</div>
@include('layouts.shop_footer')
</div>