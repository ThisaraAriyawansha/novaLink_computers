@include('layouts.header')
<style>
*, *::before, *::after { box-sizing: border-box; }

.wg-box { margin:20px 16px 50px; }

/* ── Page header ── */
.page-header {
    display:flex; justify-content:space-between; align-items:center;
    margin-bottom:18px; flex-wrap:wrap; gap:12px;
}
.page-title {
    font-size:17px; font-weight:700;
    font-family:'Orbitron', sans-serif; color:#111;
}
.header-right { display:flex; align-items:center; gap:10px; flex-wrap:wrap; }

.last-updated {
    font-size:12px; color:#888;
    background:white; border:1px solid #e0e0e0;
    padding:6px 12px; border-radius:7px; white-space:nowrap;
}

.btn-add {
    background:#111; color:white;
    padding:8px 16px; border-radius:7px;
    text-decoration:none; font-size:13px; font-weight:600;
    display:inline-flex; align-items:center; gap:6px;
    white-space:nowrap; transition:background 0.15s;
}
.btn-add:hover { background:#333; color:white; }

/* ── Table card ── */
.table-card {
    background:white; border:1px solid #e0e0e0;
    border-radius:10px; overflow:hidden;
}

/* ── Desktop table ── */
.table-responsive { overflow-x:auto; -webkit-overflow-scrolling:touch;  }

.shops-table { width:100%; border-collapse:collapse; min-width:700px; border:none; }

.shops-table th {
    background:#f5f5f5; padding:11px 14px;
    text-align:left; font-size:12px; font-weight:600;
    color:#111; border-bottom:2px solid #ddd; white-space:nowrap;
    border:none;
}
.shops-table td {
    padding:11px 14px; border-bottom:1px solid #f0f0f0;
    font-size:13px; color:#333; vertical-align:middle;
    border:none;
}
.shops-table tr:last-child td { border-bottom:none; }
.shops-table tr:hover td { background:#fafafa; }

.shop-logo { width:48px; height:40px; object-fit:cover; border-radius:6px; border:1px solid #eee; display:block; }
.logo-placeholder {
    width:48px; height:40px; background:#f5f5f5;
    border-radius:6px; display:flex; align-items:center;
    justify-content:center; color:#ccc; font-size:16px;
}

.badge-active   { background:#e8f5e9; color:#2e7d32; padding:3px 10px; border-radius:12px; font-size:11px; font-weight:600; }
.badge-inactive { background:#ffebee; color:#c62828; padding:3px 10px; border-radius:12px; font-size:11px; font-weight:600; }

.toggle-btn {
    padding:6px 13px; border:1.5px solid #ddd;
    border-radius:6px; font-size:12px; font-weight:600;
    cursor:pointer; background:white; color:#333;
    font-family:inherit; transition:all 0.15s; white-space:nowrap;
}
.toggle-btn:hover { border-color:#111; color:#111; background:#f5f5f5; }

/* ── Mobile card list ── */
.mobile-list { display:none; }

.mob-card {
    padding:14px; border-bottom:1px solid #f0f0f0;
}
.mob-card:last-child { border-bottom:none; }

.mob-top {
    display:flex; gap:12px; align-items:flex-start; margin-bottom:10px;
}
.mob-logo { width:52px; height:44px; object-fit:cover; border-radius:7px; border:1px solid #eee; flex-shrink:0; }
.mob-logo-placeholder {
    width:52px; height:44px; background:#f5f5f5; border-radius:7px;
    display:flex; align-items:center; justify-content:center;
    color:#ccc; font-size:18px; flex-shrink:0;
}
.mob-info { flex:1; min-width:0; }
.mob-shopname { font-size:14px; font-weight:700; color:#111; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; margin-bottom:2px; }
.mob-desc { font-size:11px; color:#aaa; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; margin-bottom:4px; }

.mob-meta {
    display:grid; grid-template-columns:1fr 1fr; gap:8px 14px; margin-bottom:10px;
}
.mob-meta-item { display:flex; flex-direction:column; gap:2px; }
.mob-meta-label { font-size:10px; font-weight:600; color:#aaa; text-transform:uppercase; letter-spacing:.4px; }
.mob-meta-val { font-size:13px; color:#222; }
.mob-meta-val small { font-size:11px; color:#999; display:block; }

.mob-footer {
    display:flex; align-items:center; justify-content:space-between;
    gap:10px; flex-wrap:wrap;
}

/* ── Empty state ── */
.empty-state {
    text-align:center; padding:60px 20px; color:#888;
}
.empty-state i { font-size:44px; color:#ccc; display:block; margin-bottom:14px; }

/* ── Pagination ── */
.pagination-wrap {
    display:flex; justify-content:space-between; align-items:center;
    padding:12px 16px; border-top:1px solid #f0f0f0;
    flex-wrap:wrap; gap:10px;
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
    .wg-box { margin:14px 10px 40px; }
    .page-title { font-size:15px; }
    .last-updated { display:none; }
    .table-responsive { display:none; }
    .mobile-list { display:block; }
    .pagination-wrap { justify-content:center; }
    .pagination-info { width:100%; text-align:center; }
}
</style>

<div class="main-content">
<div class="main-content-inner">
<div class="main-content-wrap">
<div class="wg-box">

    @if(session('success'))
        <div style="background:#f0fdf4;border:1px solid #bbf7d0;color:#166534;padding:11px 16px;border-radius:8px;margin-bottom:16px;font-size:13px;display:flex;align-items:center;gap:8px;">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="page-header">
        <div class="page-title">Manage Shops & Shop Owners</div>
        <div class="header-right">
            <div class="last-updated"><i class="fas fa-clock" style="margin-right:5px;opacity:.5;"></i>{{ now()->format('M j, Y g:i A') }}</div>
            <a href="{{ route('admin.shops.create') }}" class="btn-add">
                <i class="fas fa-user-plus"></i> Add Shop Owner
            </a>
        </div>
    </div>

    <div class="table-card">
        @if($shops->isEmpty())
            <div class="empty-state">
                <i class="fas fa-store"></i>
                No shop owners registered yet.
            </div>
        @else

        {{-- ── Desktop Table ── --}}
        <div class="table-responsive">
            <table class="shops-table">
                <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Shop Name</th>
                        <th>Owner</th>
                        <th>Contact</th>
                        <th>Location</th>
                        <th>Products</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shops as $shop)
                    @php $productCount = \App\Models\Product::where('user_id', $shop->user_id)->count(); @endphp
                    <tr>
                        <td>
                            @if($shop->logo)
                                <img src="{{ asset($shop->logo) }}" class="shop-logo" alt="">
                            @else
                                <div class="logo-placeholder"><i class="fas fa-store"></i></div>
                            @endif
                        </td>
                        <td>
                            <strong>{{ $shop->shop_name }}</strong>
                            @if($shop->description)
                                <div style="font-size:11px;color:#999;max-width:180px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $shop->description }}</div>
                            @endif
                        </td>
                        <td>
                            <div style="font-weight:600;">{{ $shop->owner->name }}</div>
                            <div style="font-size:11px;color:#999;">{{ $shop->owner->email }}</div>
                        </td>
                        <td>
                            <div>{{ $shop->contact_phone ?? '—' }}</div>
                            <div style="font-size:11px;color:#999;">{{ $shop->contact_email ?? '' }}</div>
                        </td>
                        <td style="color:#666;font-size:12px;">{{ $shop->location ?? '—' }}</td>
                        <td style="font-weight:700;color:#111;">{{ $productCount }}</td>
                        <td>
                            <span class="{{ $shop->is_active ? 'badge-active' : 'badge-inactive' }}">
                                {{ $shop->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('admin.shops.toggle', $shop->id) }}">
                                @csrf @method('PATCH')
                                <button type="submit" class="toggle-btn">
                                    <i class="fas fa-toggle-{{ $shop->is_active ? 'on' : 'off' }}" style="margin-right:4px;"></i>
                                    {{ $shop->is_active ? 'Deactivate' : 'Activate' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- ── Mobile Card List ── --}}
        <div class="mobile-list">
            @foreach($shops as $shop)
            @php $productCount = \App\Models\Product::where('user_id', $shop->user_id)->count(); @endphp
            <div class="mob-card">
                <div class="mob-top">
                    @if($shop->logo)
                        <img src="{{ asset($shop->logo) }}" class="mob-logo" alt="">
                    @else
                        <div class="mob-logo-placeholder"><i class="fas fa-store"></i></div>
                    @endif
                    <div class="mob-info">
                        <div class="mob-shopname">{{ $shop->shop_name }}</div>
                        @if($shop->description)
                            <div class="mob-desc">{{ $shop->description }}</div>
                        @endif
                        <span class="{{ $shop->is_active ? 'badge-active' : 'badge-inactive' }}">
                            {{ $shop->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </div>
                </div>

                <div class="mob-meta">
                    <div class="mob-meta-item">
                        <span class="mob-meta-label">Owner</span>
                        <span class="mob-meta-val">
                            {{ $shop->owner->name }}
                            <small>{{ $shop->owner->email }}</small>
                        </span>
                    </div>
                    <div class="mob-meta-item">
                        <span class="mob-meta-label">Products</span>
                        <span class="mob-meta-val">{{ $productCount }}</span>
                    </div>
                    <div class="mob-meta-item">
                        <span class="mob-meta-label">Phone</span>
                        <span class="mob-meta-val">{{ $shop->contact_phone ?? '—' }}</span>
                    </div>
                    <div class="mob-meta-item">
                        <span class="mob-meta-label">Location</span>
                        <span class="mob-meta-val">{{ $shop->location ?? '—' }}</span>
                    </div>
                </div>

                <form method="POST" action="{{ route('admin.shops.toggle', $shop->id) }}">
                    @csrf @method('PATCH')
                    <button type="submit" class="toggle-btn" style="width:100%;justify-content:center;">
                        <i class="fas fa-toggle-{{ $shop->is_active ? 'on' : 'off' }}" style="margin-right:5px;"></i>
                        {{ $shop->is_active ? 'Deactivate' : 'Activate' }}
                    </button>
                </form>
            </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="pagination-wrap">
            <span class="pagination-info">Showing {{ $shops->firstItem() }}–{{ $shops->lastItem() }} of {{ $shops->total() }} shops</span>
            <div class="pagination-links">
                @if(!$shops->onFirstPage())
                    <a href="{{ $shops->previousPageUrl() }}" class="pg-link">‹ Prev</a>
                @endif
                @foreach($shops->getUrlRange(1, $shops->lastPage()) as $page => $url)
                    <a href="{{ $url }}" class="pg-link {{ $page == $shops->currentPage() ? 'active' : '' }}">{{ $page }}</a>
                @endforeach
                @if($shops->hasMorePages())
                    <a href="{{ $shops->nextPageUrl() }}" class="pg-link">Next ›</a>
                @endif
            </div>
        </div>

        @endif
    </div>

</div>
</div>
</div>
</div>