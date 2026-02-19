@include('layouts.shop_header')
<style>
.wrap { max-width:1200px; margin:0 auto; padding:24px 16px 50px; }
.page-title { font-size:20px; font-weight:700; color:#111; margin-bottom:20px; display:flex; align-items:center; gap:10px; }
.bit-table { width:100%; border-collapse:collapse; background:white; border-radius:12px; overflow:hidden; box-shadow:0 2px 10px rgba(0,0,0,0.07); }
.bit-table th { background:#f8faff; padding:12px 16px; text-align:left; font-size:12px; font-weight:700; color:#555; border-bottom:1px solid #e8eef8; text-transform:uppercase; letter-spacing:.4px; }
.bit-table td { padding:12px 16px; border-bottom:1px solid #f0f4fb; font-size:13.5px; color:#333; vertical-align:middle; }
.bit-table tr:hover td { background:#fafbff; }
.p-badge { display:inline-block; padding:3px 10px; border-radius:12px; font-size:12px; font-weight:600; }
.p-paid    { background:#e8f5e9; color:#2e7d32; }
.p-pending { background:#fff3e0; color:#e65100; }
.p-cancel  { background:#ffebee; color:#c62828; }
.prod-img  { width:48px; height:40px; object-fit:cover; border-radius:6px; }
.prod-placeholder { width:48px; height:40px; background:#f0f0f0; border-radius:6px; display:flex; align-items:center; justify-content:center; color:#ccc; font-size:16px; }
.ps-select { border:1.5px solid #e0e0e0; border-radius:7px; padding:4px 8px; font-size:12px; font-weight:600; cursor:pointer; background:white; }
.ps-btn { background:#1a3a6b; color:#fff; border:none; border-radius:7px; padding:5px 11px; font-size:12px; font-weight:600; cursor:pointer; white-space:nowrap; }
.ps-btn:hover { background:#14306a; }
</style>

<div class="main-content">
<div class="wrap">

    @if(session('success'))
        <div style="background:#f0fdf4;border:1px solid #bbf7d0;color:#166534;padding:11px 16px;border-radius:8px;margin-bottom:16px;font-size:13px;">
            <i class="fas fa-check-circle" style="margin-right:6px;"></i>{{ session('success') }}
        </div>
    @endif

    <div class="page-title">
        <i class="fas fa-gavel"></i>Bid Orders for My Products
        @if($bitOrders->total())
            <span style="font-size:13px;color:#999;font-weight:400;">{{ $bitOrders->total() }} order(s)</span>
        @endif
    </div>

    @if($bitOrders->isEmpty())
        <div style="text-align:center;padding:60px 20px;color:#888;background:white;border-radius:12px;box-shadow:0 2px 8px rgba(0,0,0,0.06);">
            <i class="fas fa-gavel" style="font-size:48px;margin-bottom:14px;display:block;color:#ccc;"></i>
            No bid orders yet for your products.
        </div>
    @else
        <div style="background:white;border-radius:12px;box-shadow:0 2px 10px rgba(0,0,0,0.07);overflow:hidden;">
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
                    $badgeClass = str_contains($ps,'paid')||str_contains($ps,'complet')||str_contains($ps,'success')
                        ? 'p-paid'
                        : (str_contains($ps,'cancel') ? 'p-cancel' : 'p-pending');
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
                                    <div style="font-size:11px;color:#888;">{{ $bitOrder->product->type ?? '' }}</div>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="font-size:13px;font-weight:600;">{{ $bitOrder->customer->fname ?? 'N/A' }} {{ $bitOrder->customer->lname ?? '' }}</div>
                    </td>
                    <td style="font-weight:700;color:#111;">Rs. {{ number_format($bitOrder->price, 2) }}</td>
                    <td style="font-size:12px;color:#666;max-width:180px;">
                        {{ $bitOrder->address_line1 }}
                        @if($bitOrder->address_line2), {{ $bitOrder->address_line2 }}@endif
                        <br>{{ $bitOrder->city }}, {{ $bitOrder->postal_code }}
                    </td>
                    <td>
                        <div style="display:flex;flex-direction:column;gap:6px;">
                            <span class="p-badge {{ $badgeClass }}">
                                {{ $bitOrder->paymentStatus->status_name ?? 'Pending' }}
                            </span>
                            <form method="POST" action="{{ route('shop.bit-orders.updatePaymentStatus', $bitOrder->id) }}" style="display:flex;gap:5px;align-items:center;">
                                @csrf @method('PATCH')
                                <select name="payment_status_id" class="ps-select">
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}" {{ $bitOrder->payment_status_id == $status->id ? 'selected' : '' }}>
                                            {{ $status->status_name }}
                                        </option>
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

        {{-- Pagination --}}
        <div style="display:flex;justify-content:space-between;align-items:center;padding:14px 0;flex-wrap:wrap;gap:10px;">
            <span style="font-size:13px;color:#666;">Showing {{ $bitOrders->firstItem() }}–{{ $bitOrders->lastItem() }} of {{ $bitOrders->total() }}</span>
            <div style="display:flex;gap:6px;">
                @if(!$bitOrders->onFirstPage())
                    <a href="{{ $bitOrders->previousPageUrl() }}" style="padding:6px 12px;border:1px solid #ddd;border-radius:6px;text-decoration:none;color:#333;font-size:13px;">Prev</a>
                @endif
                @foreach($bitOrders->getUrlRange(1, $bitOrders->lastPage()) as $page => $url)
                    <a href="{{ $url }}" style="padding:6px 12px;border:1px solid {{ $page==$bitOrders->currentPage() ? '#111' : '#ddd' }};border-radius:6px;text-decoration:none;color:{{ $page==$bitOrders->currentPage() ? '#fff' : '#333' }};background:{{ $page==$bitOrders->currentPage() ? '#111' : 'white' }};font-size:13px;">{{ $page }}</a>
                @endforeach
                @if($bitOrders->hasMorePages())
                    <a href="{{ $bitOrders->nextPageUrl() }}" style="padding:6px 12px;border:1px solid #ddd;border-radius:6px;text-decoration:none;color:#333;font-size:13px;">Next</a>
                @endif
            </div>
        </div>
    @endif

</div>
@include('layouts.shop_footer')
</div>
