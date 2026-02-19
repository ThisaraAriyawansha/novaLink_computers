@include('layouts.header')
<style>
.wg-box { margin:30px 20px; }
.page-header { display:flex; justify-content:space-between; align-items:center; margin-bottom:22px; flex-wrap:wrap; gap:12px; }
.page-title { font-size:18px; font-weight:700; font-family:'Orbitron',sans-serif; }
.shops-table { width:100%; border-collapse:collapse; background:white; border-radius:12px; overflow:hidden; box-shadow:0 2px 10px rgba(0,0,0,0.07); }
.shops-table th { background:#f8faff; padding:12px 16px; text-align:left; font-size:13px; font-weight:600; color:#555; border-bottom:1px solid #e8eef8; }
.shops-table td { padding:12px 16px; border-bottom:1px solid #f0f4fb; font-size:14px; color:#333; vertical-align:middle; }
.shops-table tr:hover td { background:#fafbff; }
.shop-logo { width:50px; height:40px; object-fit:cover; border-radius:6px; }
.logo-placeholder { width:50px; height:40px; background:#e3f2fd; border-radius:6px; display:flex; align-items:center; justify-content:center; color:#1565c0; font-size:18px; }
.badge-active { background:#e8f5e9; color:#2e7d32; padding:3px 10px; border-radius:12px; font-size:12px; font-weight:600; }
.badge-inactive { background:#ffebee; color:#c62828; padding:3px 10px; border-radius:12px; font-size:12px; font-weight:600; }
.toggle-btn { padding:6px 14px; border:none; border-radius:6px; font-size:13px; cursor:pointer; background:#e3f2fd; color:#1565c0; }
.toggle-btn:hover { background:#bbdefb; }
.last-updated { background:var(--white); padding:0.5rem 1rem; border-radius:0.5rem; border:1px solid var(--gray-200); font-size:1.3rem; color:var(--gray-600); }
.pagination-wrap { display:flex; justify-content:space-between; align-items:center; padding:14px 20px; border-top:1px solid #f0f4fb; flex-wrap:wrap; gap:10px; }
</style>

<div class="main-content">
<div class="main-content-inner">
<div class="main-content-wrap">
<div class="wg-box">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="page-header">
        <div class="page-title">Manage Shops & Shop Owners</div>
        <div style="display:flex;align-items:center;gap:12px;">
            <div class="last-updated">Last updated: {{ now()->format('M j, Y g:i A') }}</div>
            <a href="{{ route('admin.shops.create') }}" style="background:#1a1a1a;color:white;padding:9px 18px;border-radius:7px;text-decoration:none;font-size:14px;font-weight:600;display:inline-flex;align-items:center;gap:7px;">
                <i class="fas fa-user-plus"></i> Add Shop Owner
            </a>
        </div>
    </div>

    <div style="background:white;border-radius:12px;box-shadow:0 2px 10px rgba(0,0,0,0.07);overflow:hidden;">
        @if($shops->isEmpty())
            <div style="text-align:center;padding:60px 20px;color:#888;">
                <i class="fas fa-store" style="font-size:48px;color:#ccc;display:block;margin-bottom:14px;"></i>
                No shop owners registered yet.
            </div>
        @else
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
                            <div style="font-size:12px;color:#888;max-width:200px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;">{{ $shop->description }}</div>
                        @endif
                    </td>
                    <td>
                        <div>{{ $shop->owner->name }}</div>
                        <div style="font-size:12px;color:#888;">{{ $shop->owner->email }}</div>
                    </td>
                    <td>
                        <div style="font-size:13px;">{{ $shop->contact_phone ?? '-' }}</div>
                        <div style="font-size:12px;color:#888;">{{ $shop->contact_email ?? '' }}</div>
                    </td>
                    <td style="font-size:13px;color:#666;">{{ $shop->location ?? '-' }}</td>
                    <td>
                        @php $productCount = \App\Models\Product::where('user_id', $shop->user_id)->count(); @endphp
                        <span style="font-weight:600;">{{ $productCount }}</span>
                    </td>
                    <td>
                        <span class="{{ $shop->is_active ? 'badge-active' : 'badge-inactive' }}">
                            {{ $shop->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('admin.shops.toggle', $shop->id) }}" style="display:inline;">
                            @csrf @method('PATCH')
                            <button type="submit" class="toggle-btn">
                                <i class="fas fa-toggle-{{ $shop->is_active ? 'on' : 'off' }}" style="margin-right:5px;"></i>
                                {{ $shop->is_active ? 'Deactivate' : 'Activate' }}
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination-wrap">
            <span style="font-size:13px;color:#666;">Showing {{ $shops->firstItem() }} to {{ $shops->lastItem() }} of {{ $shops->total() }} shops</span>
            <div style="display:flex;gap:6px;">
                @if(!$shops->onFirstPage())
                    <a href="{{ $shops->previousPageUrl() }}" style="padding:6px 12px;border:1px solid #ddd;border-radius:6px;text-decoration:none;color:#333;font-size:13px;">Prev</a>
                @endif
                @foreach($shops->getUrlRange(1, $shops->lastPage()) as $page => $url)
                    <a href="{{ $url }}" style="padding:6px 12px;border:1px solid {{ $page == $shops->currentPage() ? '#1a1a1a' : '#ddd' }};border-radius:6px;text-decoration:none;color:{{ $page == $shops->currentPage() ? '#fff' : '#333' }};background:{{ $page == $shops->currentPage() ? '#1a1a1a' : 'white' }};font-size:13px;">{{ $page }}</a>
                @endforeach
                @if($shops->hasMorePages())
                    <a href="{{ $shops->nextPageUrl() }}" style="padding:6px 12px;border:1px solid #ddd;border-radius:6px;text-decoration:none;color:#333;font-size:13px;">Next</a>
                @endif
            </div>
        </div>
        @endif
    </div>

</div>
</div>
</div>
@include('layouts.footer')
</div>
