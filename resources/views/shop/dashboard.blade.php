@include('layouts.shop_header')
<style>
/* ── Layout ── */
.shop-dash { max-width:1200px; margin:0 auto; padding:24px 16px 50px; }

/* ── Hero ── */
.shop-hero { position:relative; border-radius:14px; overflow:hidden; margin-bottom:24px; min-height:180px; background:#1a3a6b; }
.shop-hero .cover { position:absolute; inset:0; width:100%; height:100%; object-fit:cover; opacity:0.45; }
.shop-hero-info { position:absolute; bottom:0; left:0; right:0; padding:20px 22px; background:linear-gradient(transparent,rgba(0,0,0,0.72)); display:flex; align-items:flex-end; gap:14px; flex-wrap:wrap; }
.shop-logo-wrap { width:68px; height:68px; border-radius:10px; overflow:hidden; border:3px solid white; background:#fff; flex-shrink:0; }
.shop-logo-wrap img { width:100%; height:100%; object-fit:cover; }
.shop-logo-placeholder { width:100%; height:100%; display:flex; align-items:center; justify-content:center; background:#1a3a6b; color:white; font-size:26px; }
.shop-hero-text { flex:1; min-width:0; }
.shop-hero-text h2 { color:white; margin:0 0 3px; font-size:20px; font-weight:700; word-break:break-word; }
.shop-hero-actions { display:flex; align-items:center; gap:10px; flex-wrap:wrap; }

/* ── Stats ── */
.stats-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:14px; margin-bottom:24px; }
.stat-card { background:white; border-radius:12px; padding:18px 16px; box-shadow:0 2px 10px rgba(0,0,0,0.07); display:flex; align-items:center; gap:14px; }
.stat-icon { width:48px; height:48px; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:20px; flex-shrink:0; }
.stat-label { font-size:11px; color:#888; margin-bottom:3px; text-transform:uppercase; letter-spacing:.5px; }
.stat-value { font-size:20px; font-weight:700; color:#1a1a1a; line-height:1.2; }

/* ── Deal cards ── */
.deal-grid { display:grid; grid-template-columns:repeat(auto-fill,minmax(200px,1fr)); gap:14px; }
.deal-card { background:white; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,0.07); overflow:hidden; border:2px solid #fde68a; }
.deal-card-img { width:100%; height:120px; object-fit:cover; }
.deal-card-placeholder { width:100%; height:120px; background:#f5f5f5; display:flex; align-items:center; justify-content:center; color:#bbb; font-size:28px; }
.deal-card-body { padding:11px 13px; }
.deal-card-name { font-size:13px; font-weight:700; color:#111; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; margin-bottom:5px; }

/* ── Quick links ── */
.quick-links { display:grid; grid-template-columns:repeat(auto-fill,minmax(180px,1fr)); gap:14px; }
.quick-link-card { background:white; border-radius:12px; padding:18px 16px; text-decoration:none; color:#333; box-shadow:0 2px 8px rgba(0,0,0,0.07); display:flex; align-items:center; gap:12px; transition:all 0.2s; border:2px solid transparent; }
.quick-link-card:hover { border-color:#1a3a6b; transform:translateY(-3px); box-shadow:0 6px 20px rgba(0,0,0,0.12); }
.no-shop-banner { background:#fff3cd; border:1px solid #ffc107; border-radius:10px; padding:18px 20px; margin-bottom:20px; display:flex; align-items:center; gap:12px; flex-wrap:wrap; }

/* ── Responsive: Tablet ── */
@media (max-width: 768px) {
    .shop-dash { padding:16px 12px 40px; }
    .stats-grid { grid-template-columns:repeat(3,1fr); gap:10px; }
    .stat-card { padding:14px 10px; gap:10px; flex-direction:column; align-items:flex-start; }
    .stat-icon { width:38px; height:38px; font-size:16px; }
    .stat-value { font-size:17px; }
    .shop-hero { min-height:160px; }
    .shop-hero-info { padding:14px 16px; gap:10px; }
    .shop-hero-text h2 { font-size:16px; }
    .deal-grid { grid-template-columns:repeat(2,1fr); gap:10px; }
    .quick-links { grid-template-columns:repeat(2,1fr); gap:10px; }
    .quick-link-card { padding:13px 12px; }
}

/* ── Responsive: Mobile ── */
@media (max-width: 480px) {
    .shop-dash { padding:12px 10px 36px; }
    .stats-grid { grid-template-columns:repeat(3,1fr); gap:6px; }
    .stat-card { padding:10px 8px; gap:6px; flex-direction:column; align-items:center; text-align:center; }
    .stat-icon { width:32px; height:32px; font-size:13px; }
    .stat-value { font-size:14px; }
    .stat-label { font-size:9px; letter-spacing:0; }
    .shop-hero { min-height:140px; }
    .shop-hero-info { flex-direction:column; align-items:flex-start; gap:8px; padding:12px 14px; }
    .shop-logo-wrap { width:52px; height:52px; }
    .shop-hero-text h2 { font-size:14px; }
    .shop-hero-actions { width:100%; }
    .deal-grid { grid-template-columns:repeat(2,1fr); gap:8px; }
    .deal-card-img,.deal-card-placeholder { height:95px; }
    .quick-links { grid-template-columns:repeat(2,1fr); gap:8px; }
    .quick-link-card { padding:11px 10px; gap:8px; }
    .quick-link-card > div:first-child { width:34px !important; height:34px !important; font-size:14px !important; }
}
</style>

<div class="main-content">
<div class="shop-dash">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Shop not set up yet --}}
    @if(!$shop)
    <div class="no-shop-banner">
        <i class="fas fa-store" style="font-size:28px;color:#ffc107;"></i>
        <div>
            <strong>Your shop profile is not set up yet.</strong><br>
            <a href="{{ route('shop.setup') }}" style="color:#1a3a6b;font-weight:600;">Set up your shop now</a> to start adding products.
        </div>
    </div>
    @else
    <!-- Shop Hero -->
    <div class="shop-hero">
        @if($shop->cover_image)
            <img src="{{ asset($shop->cover_image) }}" class="cover" alt="Cover">
        @endif
        <div class="shop-hero-info">
            <div class="shop-logo-wrap">
                @if($shop->logo)
                    <img src="{{ asset($shop->logo) }}" alt="Logo">
                @else
                    <div class="shop-logo-placeholder"><i class="fas fa-store"></i></div>
                @endif
            </div>
            <div class="shop-hero-text">
                <h2>{{ $shop->shop_name }}</h2>
                @if($shop->location)
                    <span style="color:#cdd8e8;font-size:12px;"><i class="fas fa-map-marker-alt" style="margin-right:4px;"></i>{{ $shop->location }}</span>
                @endif
            </div>
            <div class="shop-hero-actions">
                <a href="{{ route('shop.setup') }}" style="background:rgba(255,255,255,0.15);color:white;padding:7px 14px;border-radius:6px;text-decoration:none;font-size:13px;border:1px solid rgba(255,255,255,0.3);white-space:nowrap;">
                    <i class="fas fa-edit" style="margin-right:4px;"></i>Edit Shop
                </a>
                <span style="font-size:12px;color:{{ $shop->is_active ? '#81c784' : '#e57373' }};white-space:nowrap;">
                    <i class="fas fa-circle" style="font-size:8px;"></i>
                    {{ $shop->is_active ? 'Active' : 'Inactive' }}
                </span>
            </div>
        </div>
    </div>
    @endif

    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon" style="background:#e3f2fd;color:#1565c0;">
                <i class="fas fa-box"></i>
            </div>
            <div>
                <div class="stat-label">My Products</div>
                <div class="stat-value">{{ number_format($productCount) }}</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#e8f5e9;color:#2e7d32;">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div>
                <div class="stat-label">Orders Received</div>
                <div class="stat-value">{{ number_format($orderCount) }}</div>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background:#fff3e0;color:#e65100;">
                <i class="fas fa-rupee-sign"></i>
            </div>
            <div>
                <div class="stat-label">Total Revenue</div>
                <div class="stat-value">Rs. {{ number_format($totalRevenue, 2) }}</div>
            </div>
        </div>
    </div>

    {{-- ── Deal of the Day ── --}}
    @if($dealProducts->count())
    <div style="margin-bottom:24px;">
        <h4 style="margin-bottom:12px;color:#333;font-size:15px;font-weight:600;">
            <i class="fas fa-fire" style="color:#f59e0b;margin-right:7px;"></i>My Deal of the Day
            <span style="font-size:12px;color:#999;font-weight:400;margin-left:6px;">{{ $dealProducts->count() }} active</span>
        </h4>
        <div class="deal-grid">
            @foreach($dealProducts as $dp)
            <div class="deal-card">
                @if($dp->image)
                    <img src="{{ asset($dp->image) }}" class="deal-card-img" alt="{{ $dp->name }}">
                @else
                    <div class="deal-card-placeholder"><i class="fas fa-box"></i></div>
                @endif
                <div class="deal-card-body">
                    <div class="deal-card-name">{{ $dp->name }}</div>
                    <div style="display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:4px;">
                        <div>
                            <span style="font-size:13px;font-weight:700;color:#111;">Rs.{{ number_format($dp->discounted_price, 0) }}</span>
                            @if($dp->retail_price > $dp->discounted_price)
                                <span style="font-size:10px;color:#999;text-decoration:line-through;margin-left:3px;">{{ number_format($dp->retail_price, 0) }}</span>
                            @endif
                        </div>
                        <span style="background:#fef3c7;color:#92400e;padding:2px 6px;border-radius:10px;font-size:10px;font-weight:700;"><i class="fas fa-fire" style="font-size:9px;"></i> DEAL</span>
                    </div>
                    @if($dp->deal_end)
                        <div style="font-size:10px;color:#888;margin-top:4px;"><i class="fas fa-clock" style="margin-right:2px;"></i>Ends {{ \Carbon\Carbon::parse($dp->deal_end)->format('M j, Y') }}</div>
                    @endif
                    <a href="{{ route('shop.products.edit', $dp->id) }}" style="display:block;margin-top:8px;text-align:center;font-size:12px;background:#111;color:#fff;padding:5px 0;border-radius:6px;text-decoration:none;">
                        <i class="fas fa-pencil-alt" style="margin-right:3px;"></i>Edit Deal
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <!-- Quick Links -->
    <h4 style="margin-bottom:12px;color:#333;font-size:15px;font-weight:600;">Quick Actions</h4>
    <div class="quick-links">
        <a href="{{ route('shop.setup') }}" class="quick-link-card">
            <div style="width:40px;height:40px;min-width:40px;background:#e3f2fd;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#1565c0;font-size:17px;"><i class="fas fa-store"></i></div>
            <div><div style="font-weight:600;font-size:13px;">Shop Setup</div><div style="font-size:11px;color:#888;">Edit name, logo & contact</div></div>
        </a>
        <a href="{{ route('shop.products.create') }}" class="quick-link-card">
            <div style="width:40px;height:40px;min-width:40px;background:#e8f5e9;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#2e7d32;font-size:17px;"><i class="fas fa-plus-circle"></i></div>
            <div><div style="font-weight:600;font-size:13px;">Add Product</div><div style="font-size:11px;color:#888;">List a new product</div></div>
        </a>
        <a href="{{ route('shop.products.index') }}" class="quick-link-card">
            <div style="width:40px;height:40px;min-width:40px;background:#fff3e0;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#e65100;font-size:17px;"><i class="fas fa-th-list"></i></div>
            <div><div style="font-weight:600;font-size:13px;">My Products</div><div style="font-size:11px;color:#888;">Manage your listings</div></div>
        </a>
        <a href="{{ route('shop.orders.index') }}" class="quick-link-card">
            <div style="width:40px;height:40px;min-width:40px;background:#fce4ec;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#c62828;font-size:17px;"><i class="fas fa-receipt"></i></div>
            <div><div style="font-weight:600;font-size:13px;">Orders</div><div style="font-size:11px;color:#888;">View received orders</div></div>
        </a>
        <a href="{{ route('shop.reviews.index') }}" class="quick-link-card">
            <div style="width:40px;height:40px;min-width:40px;background:#f3e8ff;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#7c3aed;font-size:17px;"><i class="fas fa-star"></i></div>
            <div><div style="font-weight:600;font-size:13px;">Reviews</div><div style="font-size:11px;color:#888;">Manage reviews</div></div>
        </a>
        <a href="{{ route('shop.profile.edit') }}" class="quick-link-card">
            <div style="width:40px;height:40px;min-width:40px;background:#f0fdf4;border-radius:8px;display:flex;align-items:center;justify-content:center;color:#166534;font-size:17px;"><i class="fas fa-user-cog"></i></div>
            <div><div style="font-weight:600;font-size:13px;">My Profile</div><div style="font-size:11px;color:#888;">Account & password</div></div>
        </a>
    </div>

</div>
@include('layouts.shop_footer')
</div>
