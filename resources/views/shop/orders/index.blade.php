@include('layouts.shop_header')
<style>
.wrap { max-width:1200px; margin:30px auto; padding:0 20px 50px; }
.page-title { font-size:20px; font-weight:700; color:#1a3a6b; margin-bottom:22px; }
.orders-table { width:100%; border-collapse:collapse; background:white; border-radius:12px; overflow:hidden; box-shadow:0 2px 10px rgba(0,0,0,0.07); }
.orders-table th { background:#f8faff; padding:12px 16px; text-align:left; font-size:13px; font-weight:600; color:#555; border-bottom:1px solid #e8eef8; }
.orders-table td { padding:12px 16px; border-bottom:1px solid #f0f4fb; font-size:14px; color:#333; vertical-align:middle; }
.orders-table tr:hover td { background:#f8faff; }
.badge { display:inline-block; padding:3px 10px; border-radius:12px; font-size:12px; font-weight:600; }
.badge-paid { background:#e8f5e9; color:#2e7d32; }
.badge-pending { background:#fff3e0; color:#e65100; }
.badge-cancelled { background:#ffebee; color:#c62828; }
.view-btn { background:#e3f2fd; color:#1565c0; border:none; padding:6px 14px; border-radius:6px; font-size:13px; cursor:pointer; text-decoration:none; display:inline-block; }
.view-btn:hover { background:#bbdefb; }
.empty-state { text-align:center; padding:60px 20px; color:#888; background:white; border-radius:12px; }
.empty-state i { font-size:48px; margin-bottom:14px; display:block; color:#ccc; }
.pagination-wrap { display:flex; justify-content:space-between; align-items:center; padding:14px 20px; background:white; margin-top:-1px; border-radius:0 0 12px 12px; border-top:1px solid #f0f4fb; flex-wrap:wrap; gap:10px; }
</style>

<div class="main-content">
<div class="wrap">
    <div class="page-title"><i class="fas fa-receipt" style="margin-right:8px;"></i>Orders for My Products</div>

    @if($payments->isEmpty())
        <div class="empty-state">
            <i class="fas fa-shopping-cart"></i>
            No orders yet. When customers purchase your products, orders will appear here.
        </div>
    @else
    <table class="orders-table">
        <thead>
            <tr>
                <th>Order #</th>
                <th>Customer</th>
                <th>My Items</th>
                <th>Date</th>
                <th>Payment Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payments as $payment)
            @php
                $shopLines = $payment->orders->filter(fn($o) => $myProductIds->contains($o->product_id));
                $itemsRevenue = $shopLines->sum(fn($o) => ($o->product->discounted_price ?? $o->product->retail_price ?? 0) * $o->qty);
            @endphp
            <tr>
                <td><strong>#{{ $payment->id }}</strong></td>
                <td>
                    <div>{{ $payment->customer->fname ?? '' }} {{ $payment->customer->lname ?? '' }}</div>
                    <div style="font-size:12px;color:#888;">{{ $payment->customer->email ?? '-' }}</div>
                </td>
                <td>
                    @foreach($shopLines as $order)
                        <div style="font-size:13px;">{{ $order->product->name ?? 'N/A' }} × {{ $order->qty }}</div>
                    @endforeach
                    <div style="font-size:12px;color:#888;margin-top:2px;">Revenue: Rs. {{ number_format($itemsRevenue, 2) }}</div>
                </td>
                <td style="font-size:13px;color:#666;">{{ $payment->created_at->format('M j, Y') }}</td>
                <td>
                    @php $status = strtolower($payment->paymentStatus->status_name ?? 'pending'); @endphp
                    <span class="badge badge-{{ str_contains($status, 'paid') || str_contains($status, 'complet') || str_contains($status, 'success') ? 'paid' : (str_contains($status, 'cancel') ? 'cancelled' : 'pending') }}">
                        {{ $payment->paymentStatus->status_name ?? 'Pending' }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('shop.orders.show', $payment->id) }}" class="view-btn">
                        <i class="fas fa-eye" style="margin-right:5px;"></i>View
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination-wrap">
        <span style="font-size:13px;color:#666;">Showing {{ $payments->firstItem() }} to {{ $payments->lastItem() }} of {{ $payments->total() }} orders</span>
        <div style="display:flex;gap:6px;">
            @if(!$payments->onFirstPage())
                <a href="{{ $payments->previousPageUrl() }}" style="padding:6px 12px;border:1px solid #ddd;border-radius:6px;text-decoration:none;color:#333;font-size:13px;">Prev</a>
            @endif
            @foreach($payments->getUrlRange(1, $payments->lastPage()) as $page => $url)
                <a href="{{ $url }}" style="padding:6px 12px;border:1px solid {{ $page == $payments->currentPage() ? '#1a3a6b' : '#ddd' }};border-radius:6px;text-decoration:none;color:{{ $page == $payments->currentPage() ? '#fff' : '#333' }};background:{{ $page == $payments->currentPage() ? '#1a3a6b' : 'white' }};font-size:13px;">{{ $page }}</a>
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
