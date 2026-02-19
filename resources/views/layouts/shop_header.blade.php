<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Portal - NovaLink Computers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="/n_logo_remove_new.png" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstraps.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/fonts.css')}}">
    <link rel="stylesheet" href="{{ asset('icon/style.css')}}">
    <style>
        .shop-nav-link {
            display:flex; align-items:center; padding:9px 13px;
            border-radius:5px; color:#bbb; text-decoration:none;
            font-size:13.5px; transition:all 0.2s; white-space:nowrap; gap:6px;
        }
        .shop-nav-link:hover { color:#fff; background:#2a2a2a; }
        .shop-dropdown { position:relative; display:inline-block; }
        .shop-dropdown-menu {
            position:absolute; left:0; top:100%; margin-top:4px; min-width:180px;
            background:#1a1a1a; border:1px solid #333; border-radius:8px;
            box-shadow:0 8px 24px rgba(0,0,0,0.5); opacity:0; visibility:hidden;
            transform:translateY(-6px); transition:all 0.2s; z-index:999;
        }
        .shop-dropdown:hover .shop-dropdown-menu { opacity:1; visibility:visible; transform:translateY(0); }
        .shop-dropdown-menu a {
            display:flex; align-items:center; padding:10px 15px; color:#bbb;
            text-decoration:none; font-size:13px; transition:all 0.15s; gap:9px;
        }
        .shop-dropdown-menu a:hover { color:#fff; background:#2a2a2a; }
        .shop-dropdown-menu a:first-child { border-radius:8px 8px 0 0; }
        .shop-dropdown-menu a:last-child { border-radius:0 0 8px 8px; }
        .shop-dropdown-menu .dd-divider { border-top:1px solid #333; margin:3px 0; }
        .shop-trigger-btn {
            display:flex; align-items:center; gap:6px; padding:9px 13px;
            border-radius:5px; color:#bbb; background:none; border:none;
            cursor:pointer; font-size:13.5px; font-family:inherit; transition:all 0.2s;
        }
        .shop-trigger-btn:hover { color:#fff; background:#2a2a2a; }
        #shop-mobile-menu {
            position:fixed; left:-290px; top:0; width:270px; height:100%;
            background:#111; z-index:1600; transition:left 0.3s; overflow-y:auto;
            border-right:1px solid #222;
        }
        .mob-link {
            display:flex; align-items:center; gap:12px; padding:12px 20px;
            color:#bbb; text-decoration:none; border-bottom:1px solid #1e1e1e;
            font-size:14px; transition:color 0.15s;
        }
        .mob-link:hover { color:#fff; background:#1e1e1e; }
        .mob-section { padding:10px 20px 4px; font-size:11px; color:#444;
            text-transform:uppercase; letter-spacing:1px; font-weight:700; }
        /* page bg override */
        body { background:#f4f4f4 !important; }
        .shop-page-wrap { max-width:1200px; margin:0 auto; padding:28px 20px 50px; }
        .shop-card { background:#fff; border-radius:10px; box-shadow:0 1px 6px rgba(0,0,0,0.08); }
        .shop-section-title {
            font-size:17px; font-weight:700; color:#111; margin-bottom:22px;
            padding-bottom:12px; border-bottom:2px solid #f0f0f0;
        }
        .shop-form-label { display:block; font-weight:600; font-size:13px; color:#444; margin-bottom:6px; }
        .shop-form-ctrl {
            width:100%; padding:9px 13px; border:1.5px solid #ddd; border-radius:7px;
            font-size:14px; outline:none; transition:border-color 0.2s; box-sizing:border-box;
        }
        .shop-form-ctrl:focus { border-color:#111; }
        .shop-btn-black { background:#111; color:#fff; padding:10px 22px; border:none; border-radius:7px; font-size:14px; font-weight:600; cursor:pointer; transition:background 0.2s; }
        .shop-btn-black:hover { background:#333; }
        .shop-btn-outline { background:#fff; color:#333; padding:9px 18px; border:1.5px solid #ccc; border-radius:7px; font-size:14px; font-weight:600; cursor:pointer; text-decoration:none; display:inline-block; }
        .shop-btn-outline:hover { background:#f5f5f5; }
        .shop-badge-active { background:#f0fdf4; color:#166534; padding:3px 10px; border-radius:20px; font-size:12px; font-weight:600; }
        .shop-badge-inactive { background:#fef2f2; color:#991b1b; padding:3px 10px; border-radius:20px; font-size:12px; font-weight:600; }
        .shop-table { width:100%; border-collapse:collapse; }
        .shop-table th { background:#fafafa; padding:11px 14px; text-align:left; font-size:12px; font-weight:700; color:#555; border-bottom:1px solid #eee; text-transform:uppercase; letter-spacing:.4px; }
        .shop-table td { padding:11px 14px; border-bottom:1px solid #f5f5f5; font-size:13.5px; color:#333; vertical-align:middle; }
        .shop-table tr:hover td { background:#fafafa; }
        .shop-action-btn { display:inline-flex; align-items:center; gap:5px; padding:5px 12px; border-radius:5px; font-size:12px; border:none; cursor:pointer; transition:all 0.15s; text-decoration:none; }
        .shop-btn-edit { background:#f5f5f5; color:#333; }
        .shop-btn-edit:hover { background:#e5e5e5; }
        .shop-btn-danger { background:#fef2f2; color:#991b1b; }
        .shop-btn-danger:hover { background:#fee2e2; }
        .shop-empty { text-align:center; padding:50px 20px; color:#aaa; }
        .shop-empty i { font-size:42px; display:block; margin-bottom:12px; }
        .shop-grid-2 { display:grid; grid-template-columns:1fr 1fr; gap:14px; }
        .shop-grid-3 { display:grid; grid-template-columns:1fr 1fr 1fr; gap:14px; }
        @media(max-width:640px) { .shop-grid-2,.shop-grid-3 { grid-template-columns:1fr; } }
        .shop-form-group { margin-bottom:16px; }
    </style>
</head>
<body>

<nav style="background:#111;border-bottom:1px solid #222;position:fixed;width:100%;top:0;z-index:1000;box-shadow:0 2px 8px rgba(0,0,0,0.3);">
    <div style="max-width:1300px;margin:0 auto;padding:0 20px;">
        <div style="display:flex;justify-content:space-between;align-items:center;height:62px;">

            <div style="display:flex;align-items:center;gap:10px;">
                <button id="shop-mob-btn" onclick="toggleShopMob()" style="display:none;color:#bbb;background:none;border:none;cursor:pointer;font-size:19px;margin-right:2px;padding:6px;">
                    <i class="fas fa-bars"></i>
                </button>
                <img src="/N_white.png" alt="" style="width:44px;height:44px;object-fit:contain;">
                <span style="color:#fff;font-weight:700;font-size:17px;font-family:'Orbitron',sans-serif;">NovaLink</span>
                <span style="color:#444;font-size:11px;border-left:1px solid #333;padding-left:10px;margin-left:2px;">SHOP PORTAL</span>
            </div>

            <div id="shop-desk-nav" style="display:flex;align-items:center;gap:1px;">
                <a href="{{ route('shop.dashboard') }}" class="shop-nav-link"><i class="fas fa-tachometer-alt"></i>Dashboard</a>
                <a href="{{ route('shop.setup') }}" class="shop-nav-link"><i class="fas fa-store"></i>My Shop</a>

                <div class="shop-dropdown">
                    <button class="shop-trigger-btn">
                        <i class="fas fa-box"></i>Products<i class="fas fa-chevron-down" style="font-size:10px;margin-left:3px;"></i>
                    </button>
                    <div class="shop-dropdown-menu">
                        <a href="{{ route('shop.products.create') }}"><i class="fas fa-plus-circle"></i>Add Product</a>
                        <a href="{{ route('shop.products.index') }}"><i class="fas fa-list"></i>My Products</a>
                        <div class="dd-divider"></div>
                        <a href="{{ route('shop.products.images') }}"><i class="fas fa-images"></i>Product Images</a>
                        <a href="{{ route('shop.products.features') }}"><i class="fas fa-tags"></i>Product Features</a>
                    </div>
                </div>

                <a href="{{ route('shop.reviews.index') }}" class="shop-nav-link"><i class="fas fa-star"></i>Reviews</a>
                <a href="{{ route('shop.orders.index') }}" class="shop-nav-link"><i class="fas fa-shopping-cart"></i>Orders</a>
                <a href="{{ route('shop.profile.edit') }}" class="shop-nav-link"><i class="fas fa-user-cog"></i>Profile</a>

                <div style="width:1px;height:26px;background:#333;margin:0 5px;"></div>
                <span style="color:#555;font-size:12px;display:flex;align-items:center;gap:5px;"><i class="fas fa-user-circle"></i>{{ Auth::user()->name }}</span>
                <a href="{{ route('logoutAdmin') }}" class="shop-nav-link" style="color:#e57373;margin-left:2px;"><i class="fas fa-sign-out-alt"></i>Log Out</a>
            </div>
        </div>
    </div>
</nav>

<div id="shop-mob-overlay" onclick="closeShopMob()" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.55);z-index:1500;"></div>
<div id="shop-mobile-menu">
    <div style="display:flex;justify-content:space-between;align-items:center;padding:15px 18px;border-bottom:1px solid #1e1e1e;">
        <span style="color:#fff;font-weight:700;font-family:'Orbitron',sans-serif;font-size:15px;">Shop Portal</span>
        <button onclick="closeShopMob()" style="color:#bbb;background:none;border:none;cursor:pointer;font-size:17px;"><i class="fas fa-times"></i></button>
    </div>
    <div>
        <a href="{{ route('shop.dashboard') }}" class="mob-link"><i class="fas fa-tachometer-alt" style="width:18px;"></i>Dashboard</a>
        <a href="{{ route('shop.setup') }}" class="mob-link"><i class="fas fa-store" style="width:18px;"></i>My Shop</a>
        <div class="mob-section">Products</div>
        <a href="{{ route('shop.products.create') }}" class="mob-link" style="padding-left:34px;"><i class="fas fa-plus-circle" style="width:18px;"></i>Add Product</a>
        <a href="{{ route('shop.products.index') }}" class="mob-link" style="padding-left:34px;"><i class="fas fa-list" style="width:18px;"></i>My Products</a>
        <a href="{{ route('shop.products.images') }}" class="mob-link" style="padding-left:34px;"><i class="fas fa-images" style="width:18px;"></i>Product Images</a>
        <a href="{{ route('shop.products.features') }}" class="mob-link" style="padding-left:34px;"><i class="fas fa-tags" style="width:18px;"></i>Product Features</a>
        <a href="{{ route('shop.reviews.index') }}" class="mob-link"><i class="fas fa-star" style="width:18px;"></i>Reviews</a>
        <a href="{{ route('shop.orders.index') }}" class="mob-link"><i class="fas fa-shopping-cart" style="width:18px;"></i>Orders</a>
        <a href="{{ route('shop.profile.edit') }}" class="mob-link"><i class="fas fa-user-cog" style="width:18px;"></i>Profile</a>
        <a href="{{ route('logoutAdmin') }}" class="mob-link" style="color:#e57373;"><i class="fas fa-sign-out-alt" style="width:18px;"></i>Log Out</a>
    </div>
</div>

<div style="height:62px;"></div>

<script>
function toggleShopMob(){document.getElementById('shop-mobile-menu').style.left='0';document.getElementById('shop-mob-overlay').style.display='block';}
function closeShopMob(){document.getElementById('shop-mobile-menu').style.left='-290px';document.getElementById('shop-mob-overlay').style.display='none';}
function resizeShopNav(){var m=document.getElementById('shop-mob-btn'),d=document.getElementById('shop-desk-nav');if(window.innerWidth<920){m.style.display='block';d.style.display='none';}else{m.style.display='none';d.style.display='flex';}}
window.addEventListener('resize',resizeShopNav);resizeShopNav();
</script>
