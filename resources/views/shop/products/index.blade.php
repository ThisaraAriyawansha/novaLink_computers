@include('layouts.shop_header')

<style>
*, *::before, *::after { box-sizing: border-box; }

/* ── Wrapper ── */
.wrap {
    max-width: 1200px;
    margin: 20px auto;
    padding: 0 14px 50px;
}

/* ── Alert ── */
.alert-success {
    background: #f0f0f0;
    border: 1px solid #bbb;
    color: #111;
    padding: 12px 16px;
    border-radius: 8px;
    margin-bottom: 18px;
    font-size: 13px;
    display: flex;
    align-items: center;
    gap: 8px;
}

/* ── Page header ── */
.page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
    gap: 10px;
    flex-wrap: wrap;
}

.page-title {
    font-size: 18px;
    font-weight: 700;
    color: #000;
    display: flex;
    align-items: center;
    gap: 8px;
}

.btn-primary {
    background: #000;
    color: #fff;
    padding: 9px 18px;
    border-radius: 7px;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    white-space: nowrap;
    transition: background 0.15s;
}
.btn-primary:hover { background: #333; color: #fff; }

/* ── Search form ── */
.search-form {
    display: flex;
    gap: 8px;
    margin-bottom: 16px;
    flex-wrap: wrap;
}

.search-input {
    padding: 9px 12px;
    border: 1.5px solid #ccc;
    border-radius: 7px;
    font-size: 13px;
    outline: none;
    background: #fff;
    color: #111;
    flex: 1;
    min-width: 140px;
    transition: border-color 0.15s;
    font-family: inherit;
}
.search-input:focus { border-color: #000; }

select.search-input { flex: 0 0 160px; cursor: pointer; }

.search-btn {
    padding: 9px 16px;
    background: #000;
    color: #fff;
    border: none;
    border-radius: 7px;
    font-size: 13px;
    cursor: pointer;
    font-family: inherit;
    white-space: nowrap;
    transition: background 0.15s;
}
.search-btn:hover { background: #333; }

.clear-btn {
    padding: 9px 16px;
    background: #f0f0f0;
    color: #444;
    border: 1px solid #ccc;
    border-radius: 7px;
    font-size: 13px;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    white-space: nowrap;
    transition: background 0.15s;
}
.clear-btn:hover { background: #e0e0e0; color: #111; }

/* ── Table card ── */
.table-card {
    background: #fff;
    border-radius: 10px;
    border: 1px solid #e0e0e0;
    overflow: hidden;
}

.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

/* ── Desktop Table ── */
.product-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 680px;
    border: none;
}

.product-table th {
    background: #f5f5f5;
    padding: 11px 14px;
    text-align: left;
    font-size: 12px;
    font-weight: 600;
    color: #000;
    border-bottom: 2px solid #ddd;
    white-space: nowrap;
}

.product-table td {
    padding: 11px 14px;
    border-bottom: 1px solid #f0f0f0;
    font-size: 13px;
    color: #333;
    vertical-align: middle;
}

.product-table tr:last-child td { border-bottom: none; }
.product-table tr:hover td { background: #fafafa; }

.product-img {
    width: 52px;
    height: 42px;
    object-fit: cover;
    border-radius: 6px;
    border: 1px solid #eee;
    display: block;
}

.badge {
    display: inline-block;
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    text-align: center;
}
.badge-active   { background: #f0f0f0; color: #000; border: 1px solid #999; }
.badge-inactive { background: #f9f9f9; color: #999; border: 1px solid #ddd; }

.action-wrapper { display: flex; gap: 6px; flex-wrap: wrap; }

.action-btn {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 500;
    text-decoration: none;
    border: none;
    cursor: pointer;
    white-space: nowrap;
    transition: background 0.15s;
    font-family: inherit;
}

.btn-edit   { background: #e8e8e8; color: #000; }
.btn-edit:hover { background: #d0d0d0; }
.btn-status { background: #f5f5f5; color: #444; border: 1px solid #ccc; }
.btn-status:hover { background: #e5e5e5; }

/* ── Mobile card list (hidden on desktop) ── */
.mobile-list { display: none; }

.mobile-card {
    border-bottom: 1px solid #f0f0f0;
    padding: 14px;
}
.mobile-card:last-child { border-bottom: none; }

.mc-top {
    display: flex;
    gap: 12px;
    align-items: flex-start;
    margin-bottom: 10px;
}

.mc-img {
    width: 58px;
    height: 48px;
    object-fit: cover;
    border-radius: 7px;
    border: 1px solid #eee;
    flex-shrink: 0;
}

.mc-info { flex: 1; min-width: 0; }

.mc-name {
    font-size: 14px;
    font-weight: 700;
    color: #000;
    margin-bottom: 3px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.mc-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 6px 14px;
    margin-bottom: 4px;
}

.mc-meta-item {
    font-size: 12px;
    color: #666;
}

.mc-meta-item strong { color: #111; }

.mc-actions {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
}

.mc-actions .action-btn {
    flex: 1;
    justify-content: center;
    padding: 9px 12px;
    font-size: 13px;
}

/* ── Empty state ── */
.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #777;
}
.empty-state i { font-size: 44px; color: #bbb; display: block; margin-bottom: 14px; }
.empty-state a { color: #000; font-weight: 600; text-decoration: underline; }

/* ── Pagination ── */
.pagination-wrap {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 13px 16px;
    border-top: 1px solid #f0f0f0;
    flex-wrap: wrap;
    gap: 10px;
}

.pagination-info { font-size: 12px; color: #888; }

.pagination-links { display: flex; gap: 4px; flex-wrap: wrap; }

.pagination-link {
    padding: 6px 11px;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-decoration: none;
    color: #333;
    font-size: 12px;
    background: #fff;
    transition: all 0.15s;
}
.pagination-link.active { background: #000; color: #fff; border-color: #000; }
.pagination-link:hover:not(.active) { background: #f0f0f0; }

/* ── Mobile breakpoint ── */
@media (max-width: 640px) {
    .wrap { padding: 0 10px 40px; }

    /* hide desktop table, show mobile cards */
    .table-responsive { display: none; }
    .mobile-list { display: block; }

    /* search row: text input full width, select + btns in a row */
    .search-form { gap: 7px; }
    .search-input[type="text"] { flex: 1 1 100%; }
    select.search-input { flex: 1; min-width: 0; }
    .search-btn, .clear-btn { flex: 0 0 auto; }

    .page-title { font-size: 16px; }
    .btn-primary { font-size: 13px; padding: 8px 14px; }

    .pagination-wrap { justify-content: center; }
    .pagination-info { width: 100%; text-align: center; }
}
</style>

<div class="main-content">
<div class="wrap">

    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="page-header">
        <div class="page-title"><i class="fas fa-box"></i>My Products</div>
        <a href="{{ route('shop.products.create') }}" class="btn-primary"><i class="fas fa-plus"></i>Add Product</a>
    </div>

    <form method="GET" action="{{ route('shop.products.index') }}" class="search-form">
        <input type="text" name="search" value="{{ request('search') }}" class="search-input" placeholder="Search product name…">
        <select name="type" class="search-input" style="cursor:pointer;">
            <option value="">All Categories</option>
            @foreach($productTypes as $t)
                <option value="{{ $t }}" {{ request('type') === $t ? 'selected' : '' }}>{{ $t }}</option>
            @endforeach
        </select>
        <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
        @if(request('search') || request('type'))
            <a href="{{ route('shop.products.index') }}" class="clear-btn">Clear</a>
        @endif
    </form>

    <div class="table-card">
        @if($products->isEmpty())
            <div class="empty-state">
                <i class="fas fa-box-open"></i>
                No products yet. <a href="{{ route('shop.products.create') }}">Add your first product</a>
            </div>
        @else

        {{-- ── Desktop Table ── --}}
        <div class="table-responsive">
            <table class="product-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Brand</th>
                        <th>Price (Rs.)</th>
                        <th>Qty</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $item)
                    <tr>
                        <td><img src="{{ asset($item->image ?? 'ProductImages/placeholder.jpg') }}" class="product-img" alt="{{ $item->name }}"></td>
                        <td><strong>{{ $item->name }}</strong></td>
                        <td style="color:#777;font-size:12px;">{{ $item->type }}</td>
                        <td>{{ $item->brand }}</td>
                        <td style="font-weight:600;">{{ number_format($item->discounted_price, 2) }}</td>
                        <td>{{ $item->qty }}</td>
                        <td>
                            <span class="badge {{ $item->status_id == 1 ? 'badge-active' : 'badge-inactive' }}">
                                {{ $item->status_id == 1 ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <div class="action-wrapper">
                                <a href="{{ route('shop.products.edit', $item->id) }}" class="action-btn btn-edit">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form method="POST" action="{{ route('shop.products.toggleStatus', $item->id) }}" style="display:inline;">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="action-btn btn-status">
                                        <i class="fas fa-toggle-{{ $item->status_id == 1 ? 'on' : 'off' }}"></i>
                                        {{ $item->status_id == 1 ? 'Deactivate' : 'Activate' }}
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- ── Mobile Card List ── --}}
        <div class="mobile-list">
            @foreach($products as $item)
            <div class="mobile-card">
                <div class="mc-top">
                    <img src="{{ asset($item->image ?? 'ProductImages/placeholder.jpg') }}" class="mc-img" alt="{{ $item->name }}">
                    <div class="mc-info">
                        <div class="mc-name">{{ $item->name }}</div>
                        <div class="mc-meta">
                            <span class="mc-meta-item"><strong>Rs. {{ number_format($item->discounted_price, 2) }}</strong></span>
                            <span class="mc-meta-item">Qty: {{ $item->qty }}</span>
                            <span class="mc-meta-item">{{ $item->type }}</span>
                        </div>
                        <span class="badge {{ $item->status_id == 1 ? 'badge-active' : 'badge-inactive' }}">
                            {{ $item->status_id == 1 ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>
                <div class="mc-actions">
                    <a href="{{ route('shop.products.edit', $item->id) }}" class="action-btn btn-edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form method="POST" action="{{ route('shop.products.toggleStatus', $item->id) }}" style="flex:1;">
                        @csrf @method('PATCH')
                        <button type="submit" class="action-btn btn-status" style="width:100%;justify-content:center;">
                            <i class="fas fa-toggle-{{ $item->status_id == 1 ? 'on' : 'off' }}"></i>
                            {{ $item->status_id == 1 ? 'Deactivate' : 'Activate' }}
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="pagination-wrap">
            <span class="pagination-info">Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }} products</span>
            <div class="pagination-links">
                @if(!$products->onFirstPage())
                    <a href="{{ $products->previousPageUrl() }}" class="pagination-link">‹ Prev</a>
                @endif
                @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                    <a href="{{ $url }}" class="pagination-link {{ $page == $products->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                @endforeach
                @if($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}" class="pagination-link">Next ›</a>
                @endif
            </div>
        </div>

        @endif
    </div>
</div>

</div>