@include('layouts.shop_header')
<style>
.wrap { max-width:1200px; margin:30px auto; padding:0 20px 40px; }
.page-header { display:flex; justify-content:space-between; align-items:center; margin-bottom:22px; flex-wrap:wrap; gap:12px; }
.page-title { font-size:20px; font-weight:700; color:#1a3a6b; }
.btn-primary { background:#1a3a6b; color:white; padding:9px 20px; border-radius:7px; text-decoration:none; font-size:14px; font-weight:600; display:inline-flex; align-items:center; gap:7px; transition:background 0.2s; }
.btn-primary:hover { background:#14306a; color:white; }
.search-form { display:flex; gap:10px; flex-wrap:wrap; margin-bottom:20px; }
.search-input { flex:1; min-width:180px; padding:9px 14px; border:1.5px solid #ddd; border-radius:7px; font-size:14px; outline:none; }
.search-input:focus { border-color:#1a3a6b; }
.search-button { padding:9px 18px; background:#1a3a6b; color:white; border:none; border-radius:7px; font-size:14px; cursor:pointer; }
.table-card { background:white; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.07); overflow:hidden; }
.product-table { width:100%; border-collapse:collapse; }
.product-table th { background:#f8faff; padding:12px 16px; text-align:left; font-size:13px; font-weight:600; color:#555; border-bottom:1px solid #e8eef8; }
.product-table td { padding:12px 16px; border-bottom:1px solid #f0f4fb; font-size:14px; color:#333; vertical-align:middle; }
.product-table tr:hover td { background:#f8faff; }
.product-img { width:60px; height:50px; object-fit:cover; border-radius:6px; }
.badge { display:inline-block; padding:3px 10px; border-radius:12px; font-size:12px; font-weight:600; }
.badge-active { background:#e8f5e9; color:#2e7d32; }
.badge-inactive { background:#ffebee; color:#c62828; }
.action-btn { display:inline-flex; align-items:center; gap:5px; padding:6px 12px; border-radius:6px; font-size:13px; text-decoration:none; border:none; cursor:pointer; transition:all 0.2s; }
.btn-edit { background:#e3f2fd; color:#1565c0; }
.btn-edit:hover { background:#bbdefb; }
.btn-status { background:#fff3e0; color:#e65100; }
.btn-status:hover { background:#ffe0b2; }
.empty-state { text-align:center; padding:60px 20px; color:#888; }
.empty-state i { font-size:48px; margin-bottom:14px; display:block; color:#ccc; }
.pagination-wrap { display:flex; justify-content:space-between; align-items:center; padding:14px 20px; background:white; border-radius:0 0 12px 12px; border-top:1px solid #f0f4fb; flex-wrap:wrap; gap:10px; }
</style>

<div class="main-content">
<div class="wrap">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="page-header">
        <div class="page-title"><i class="fas fa-box" style="margin-right:8px;"></i>My Products</div>
        <a href="{{ route('shop.products.create') }}" class="btn-primary"><i class="fas fa-plus"></i>Add Product</a>
    </div>

    <form method="GET" action="{{ route('shop.products.index') }}" class="search-form">
        <input type="text" name="search" value="{{ request('search') }}" class="search-input" placeholder="Search product name…">
        <select name="type" class="search-input" style="flex:0 0 190px; cursor:pointer;">
            <option value="">All Categories</option>
            @foreach($productTypes as $t)
                <option value="{{ $t }}" {{ request('type') === $t ? 'selected' : '' }}>{{ $t }}</option>
            @endforeach
        </select>
        <button type="submit" class="search-button">Search</button>
        @if(request('search') || request('type'))
            <a href="{{ route('shop.products.index') }}" class="search-button" style="background:#666;text-decoration:none;display:inline-flex;align-items:center;">Clear</a>
        @endif
    </form>

    <div class="table-card">
        @if($products->isEmpty())
            <div class="empty-state">
                <i class="fas fa-box-open"></i>
                No products yet. <a href="{{ route('shop.products.create') }}" style="color:#1a3a6b;font-weight:600;">Add your first product</a>
            </div>
        @else
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
                    <td><span style="font-size:12px;color:#666;">{{ $item->type }}</span></td>
                    <td>{{ $item->brand }}</td>
                    <td>{{ number_format($item->discounted_price, 2) }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>
                        <span class="badge {{ $item->status_id == 1 ? 'badge-active' : 'badge-inactive' }}">
                            {{ $item->status_id == 1 ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <div style="display:flex;gap:6px;flex-wrap:wrap;">
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
        <div class="pagination-wrap">
            <span style="font-size:13px;color:#666;">Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} products</span>
            <div style="display:flex;gap:6px;">
                @if(!$products->onFirstPage())
                    <a href="{{ $products->previousPageUrl() }}" style="padding:6px 12px;border:1px solid #ddd;border-radius:6px;text-decoration:none;color:#333;font-size:13px;">Prev</a>
                @endif
                @foreach($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                    <a href="{{ $url }}" style="padding:6px 12px;border:1px solid {{ $page == $products->currentPage() ? '#1a3a6b' : '#ddd' }};border-radius:6px;text-decoration:none;color:{{ $page == $products->currentPage() ? '#fff' : '#333' }};background:{{ $page == $products->currentPage() ? '#1a3a6b' : 'white' }};font-size:13px;">{{ $page }}</a>
                @endforeach
                @if($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}" style="padding:6px 12px;border:1px solid #ddd;border-radius:6px;text-decoration:none;color:#333;font-size:13px;">Next</a>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>
@include('layouts.shop_footer')
</div>
