@include('layouts.shop_header')
<style>
.wrap  { max-width:860px; margin:0 auto; padding:24px 16px 50px; }
.card  { background:white; border-radius:12px; padding:24px; box-shadow:0 2px 10px rgba(0,0,0,0.07); margin-bottom:18px; }
.card-title { font-size:15px; font-weight:700; color:#111; margin-bottom:16px; padding-bottom:10px; border-bottom:1px solid #f0f0f0; display:flex; align-items:center; gap:8px; }
.info-grid { display:grid; grid-template-columns:1fr 1fr; gap:10px 24px; }
.info-row  { display:flex; flex-direction:column; gap:2px; }
.info-label { font-size:11px; font-weight:700; color:#888; text-transform:uppercase; letter-spacing:.5px; }
.info-val  { font-size:14px; color:#222; }

/* Line item */
.order-line { display:flex; align-items:flex-start; gap:14px; padding:16px 0; border-bottom:1px solid #f5f5f5; flex-wrap:wrap; }
.order-line:last-child { border-bottom:none; }
.line-img { width:70px; height:58px; object-fit:cover; border-radius:8px; flex-shrink:0; }
.line-img-placeholder { width:70px; height:58px; background:#f0f0f0; border-radius:8px; flex-shrink:0; display:flex; align-items:center; justify-content:center; color:#ccc; font-size:22px; }
.line-body { flex:1; min-width:0; }
.line-name { font-size:14px; font-weight:700; color:#111; margin-bottom:3px; }
.line-sub  { font-size:12px; color:#888; }
.line-right { text-align:right; min-width:120px; }

/* Status badges */
.s-badge { display:inline-flex; align-items:center; gap:5px; padding:3px 11px; border-radius:20px; font-size:12px; font-weight:700; }
.s-pending    { background:#fff3e0; color:#e65100; }
.s-processing { background:#e3f2fd; color:#1565c0; }
.s-shipped    { background:#f3e5f5; color:#6a1b9a; }
.s-delivered  { background:#e8f5e9; color:#2e7d32; }
.s-cancelled  { background:#ffebee; color:#c62828; }

/* Status update box */
.status-box { background:#f8f8f8; border:1px solid #eee; border-radius:10px; padding:14px 16px; margin-top:12px; }
.status-box-title { font-size:12px; font-weight:700; color:#666; text-transform:uppercase; letter-spacing:.5px; margin-bottom:10px; }
.status-form { display:flex; gap:8px; align-items:center; flex-wrap:wrap; }
.status-select { border:1.5px solid #ddd; border-radius:7px; padding:7px 12px; font-size:13px; font-weight:600; cursor:pointer; background:white; flex:1; min-width:140px; }
.status-btn { background:#111; color:#fff; border:none; border-radius:7px; padding:8px 18px; font-size:13px; font-weight:600; cursor:pointer; white-space:nowrap; }
.status-btn:hover { background:#333; }

/* Timeline for status progression */
.status-steps { display:flex; gap:0; margin-top:10px; }
.status-step { flex:1; text-align:center; position:relative; }
.status-step-dot { width:20px; height:20px; border-radius:50%; margin:0 auto 4px; display:flex; align-items:center; justify-content:center; font-size:9px; color:white; }
.status-step-line { position:absolute; top:10px; left:50%; right:-50%; height:2px; z-index:0; }
.status-step:last-child .status-step-line { display:none; }
.status-step-label { font-size:10px; color:#888; margin-top:2px; }

/* Responsive */
@media(max-width:600px){
    .info-grid { grid-template-columns:1fr; }
    .order-line { flex-direction:column; gap:10px; }
    .line-right { text-align:left; min-width:0; width:100%; }
    .status-form { flex-direction:column; }
    .status-select, .status-btn { width:100%; }
}
</style>

<div class="main-content">
<div class="wrap">

    @if(session('success'))
        <div style="background:#f0fdf4;border:1px solid #bbf7d0;color:#166534;padding:11px 16px;border-radius:8px;margin-bottom:16px;font-size:13px;">
            <i class="fas fa-check-circle" style="margin-right:6px;"></i>{{ session('success') }}
        </div>
    @endif

    <div style="margin-bottom:18px;">
        <a href="{{ route('shop.orders.index') }}" style="color:#555;text-decoration:none;font-size:14px;">
            <i class="fas fa-arrow-left" style="margin-right:6px;"></i>Back to Orders
        </a>
    </div>

    {{-- Customer & Payment Info --}}
    <div class="card">
        <div class="card-title">
            <i class="fas fa-info-circle"></i>
            Order #{{ $payment->id }} — Customer Details
        </div>
        <div class="info-grid">
            <div class="info-row">
                <span class="info-label">Customer</span>
                <span class="info-val">{{ $payment->customer->fname ?? '' }} {{ $payment->customer->lname ?? '' }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Email</span>
                <span class="info-val">{{ $payment->customer->email ?? '-' }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Phone</span>
                <span class="info-val">{{ $payment->customer->phone ?? '-' }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Order Date</span>
                <span class="info-val">{{ $payment->created_at->format('M j, Y g:i A') }}</span>
            </div>
            <div class="info-row" style="grid-column:1/-1;">
                <span class="info-label">Delivery Address</span>
                <span class="info-val">
                    {{ $payment->address1 }}{{ $payment->address2 ? ', '.$payment->address2 : '' }},
                    {{ $payment->city }} {{ $payment->postal_code }}
                </span>
            </div>
            <div class="info-row">
                <span class="info-label">Payment Status</span>
                @php $pStatus = strtolower($payment->paymentStatus->status_name ?? ''); @endphp
                <span class="info-val">
                    <span style="background:{{ str_contains($pStatus,'paid')||str_contains($pStatus,'complet')||str_contains($pStatus,'success') ? '#e8f5e9' : (str_contains($pStatus,'cancel') ? '#ffebee' : '#fff3e0') }};
                                 color:{{ str_contains($pStatus,'paid')||str_contains($pStatus,'complet')||str_contains($pStatus,'success') ? '#2e7d32' : (str_contains($pStatus,'cancel') ? '#c62828' : '#e65100') }};
                                 padding:3px 10px;border-radius:12px;font-size:12px;font-weight:600;display:inline-block;">
                        {{ $payment->paymentStatus->status_name ?? 'Pending' }}
                    </span>
                    <span style="font-size:11px;color:#aaa;margin-left:6px;">(managed by system)</span>
                </span>
            </div>
            @if($payment->note)
            <div class="info-row">
                <span class="info-label">Note</span>
                <span class="info-val">{{ $payment->note }}</span>
            </div>
            @endif
        </div>
    </div>

    {{-- Your products — with per-line status control --}}
    <div class="card">
        <div class="card-title">
            <i class="fas fa-box"></i>Your Products in This Order
            <span style="font-size:12px;color:#999;font-weight:400;margin-left:4px;">({{ $shopOrders->count() }} item{{ $shopOrders->count()>1?'s':'' }})</span>
        </div>

        @foreach($shopOrders as $order)
        @php
            $statusKey   = $order->shop_order_status ?? 'pending';
            $statusInfo  = \App\Models\Order::STATUSES[$statusKey] ?? ['label'=>'Pending','color'=>'#e65100','bg'=>'#fff3e0'];
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

            {{-- Info --}}
            <div class="line-body">
                <div class="line-name">{{ $order->product->name ?? 'N/A' }}</div>
                <div class="line-sub">
                    {{ $order->product->brand ?? '' }}
                    &bull; {{ $order->product->type ?? '' }}
                    &bull; Qty: <strong>{{ $order->qty }}</strong>
                    &bull; Order Line #{{ $order->id }}
                </div>

                {{-- Status progress steps --}}
                <div class="status-steps" style="margin-top:10px;">
                    @foreach($allStatuses as $sk => $si)
                    @php
                        $sIdx = array_search($sk, $stepKeys);
                        $done = $sIdx < $currentIdx;
                        $active = $sk === $statusKey;
                    @endphp
                    <div class="status-step">
                        <div class="status-step-line" style="background:{{ ($done || $active) ? $si['color'] : '#e0e0e0' }};"></div>
                        <div class="status-step-dot" style="background:{{ $active ? $si['color'] : ($done ? '#9e9e9e' : '#e0e0e0') }};z-index:1;position:relative;">
                            @if($active)<i class="fas fa-check" style="font-size:8px;"></i>@elseif($done)<i class="fas fa-check" style="font-size:8px;"></i>@endif
                        </div>
                        <div class="status-step-label" style="color:{{ $active ? $si['color'] : ($done ? '#777' : '#bbb') }};font-weight:{{ $active ? '700' : '400' }};">
                            {{ $si['label'] }}
                        </div>
                    </div>
                    @endforeach
                </div>

                {{-- Status update form --}}
                <div class="status-box">
                    <div class="status-box-title">Update Fulfillment Status</div>
                    <form method="POST" action="{{ route('shop.orders.updateStatus', $order->id) }}" class="status-form">
                        @csrf @method('PATCH')
                        <select name="status" class="status-select">
                            @foreach($allStatuses as $sk => $si)
                                <option value="{{ $sk }}" {{ $statusKey === $sk ? 'selected' : '' }}>{{ $si['label'] }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="status-btn">
                            <i class="fas fa-save" style="margin-right:5px;"></i>Save Status
                        </button>
                    </form>
                </div>
            </div>

            {{-- Price --}}
            <div class="line-right">
                <div style="font-size:16px;font-weight:700;color:#111;">
                    Rs. {{ number_format(($order->product->discounted_price ?? $order->product->retail_price ?? 0) * $order->qty, 2) }}
                </div>
                <div style="font-size:12px;color:#888;margin-top:2px;">
                    @ Rs. {{ number_format($order->product->discounted_price ?? $order->product->retail_price ?? 0, 2) }} each
                </div>
                <div style="margin-top:8px;">
                    <span class="s-badge s-{{ $statusKey }}">
                        <i class="fas fa-circle" style="font-size:7px;"></i>
                        {{ $statusInfo['label'] }}
                    </span>
                </div>
            </div>
        </div>
        @endforeach

        @php
            $shopRevenue = $shopOrders->sum(fn($o) => ($o->product->discounted_price ?? $o->product->retail_price ?? 0) * $o->qty);
        @endphp
        <div style="display:flex;justify-content:space-between;padding-top:16px;border-top:2px solid #f0f0f0;font-size:15px;font-weight:700;">
            <span>Your Revenue from This Order</span>
            <span style="color:#111;">Rs. {{ number_format($shopRevenue, 2) }}</span>
        </div>
    </div>

</div>
@include('layouts.shop_footer')
</div>
