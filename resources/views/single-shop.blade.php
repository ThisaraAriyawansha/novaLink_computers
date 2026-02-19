<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <title>NovaLink Computers | {{ $shop->shop_name }}</title>
    <meta name="description" content="{{ $shop->description ?? $shop->shop_name }}">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/n_logo_remove_new.png" />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="assets/js/tailwind-cdn.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/font.awesome.css" />
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/venobox.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        /* ── 5-column grid (same as product-category) ── */
        .col-xl-5th {
            flex: 0 0 auto;
            width: 20%;
        }
        @media (max-width: 1199.98px) {
            .col-xl-5th { width: 25%; }
        }

        /* ── Shop profile header ── */
        .shop-hero {
            position: relative;
            height: 260px;
            overflow: hidden;
            background: #111;
        }
        .shop-hero-cover {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: .55;
        }
        .shop-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0,0,0,.75) 0%, transparent 60%);
        }
        .shop-hero-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 1.5rem 2rem;
            display: flex;
            align-items: flex-end;
            gap: 1.25rem;
        }
        .shop-logo-wrap {
            flex-shrink: 0;
        }
        .shop-logo-wrap img,
        .shop-logo-initial {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 3px solid #fff;
            object-fit: cover;
        }
        .shop-logo-initial {
            background: #1e293b;
            color: #fff;
            font-size: 1.8rem;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Orbitron', sans-serif;
        }
        .shop-hero-text h1 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #fff;
            margin: 0 0 .3rem;
            font-family: 'Orbitron', sans-serif;
        }
        .shop-hero-text .meta {
            font-size: .8rem;
            color: rgba(255,255,255,.8);
            font-family: 'Inter', sans-serif;
        }

        /* ── Stats bar ── */
        .shop-stats {
            background: #f9fafb;
            border-bottom: 1px solid #e5e7eb;
            padding: .75rem 2rem;
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
        }
        .stat-item {
            font-size: .82rem;
            color: #374151;
            font-family: 'Inter', sans-serif;
        }
        .stat-item span {
            font-weight: 600;
            color: #111;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        @include('layouts.nav-2')

        <div class="h-[10dvh]"></div>

        <!-- Breadcrumb -->
        <nav style="display:flex;align-items:center;padding:16px 24px;max-width:1200px;margin:10px auto;" aria-label="Breadcrumb">
            <ol style="display:inline-flex;align-items:center;margin:0;padding:0;list-style:none;flex-wrap:wrap;">
                <li style="display:inline-flex;align-items:center;">
                    <a href="/home" style="display:inline-flex;align-items:center;font-size:14px;font-family:'Orbitron',sans-serif;font-weight:500;color:#4b5563;text-decoration:none;padding:6px 10px;border-radius:6px;">
                        <svg style="width:18px;height:18px;margin-right:8px;fill:none;stroke:#6b7280;stroke-width:2;" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Home
                    </a>
                </li>
                <li style="display:flex;align-items:center;margin:0 6px;">
                    <svg style="width:16px;height:16px;color:#9ca3af;fill:none;stroke:currentColor;stroke-width:2;" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                    <a href="{{ route('ourShop') }}" style="margin-left:8px;font-size:14px;font-weight:500;color:#4b5563;text-decoration:none;padding:6px 10px;border-radius:6px;font-family:'Orbitron',sans-serif;">Our Shop</a>
                </li>
                <li style="display:flex;align-items:center;margin:0 6px;" aria-current="page">
                    <svg style="width:16px;height:16px;color:#9ca3af;fill:none;stroke:currentColor;stroke-width:2;" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                    <span style="margin-left:8px;font-size:14px;font-weight:600;color:#374151;padding:6px 10px;border-radius:6px;font-family:'Orbitron',sans-serif;">{{ $shop->shop_name }}</span>
                </li>
            </ol>
        </nav>

        <!-- Shop Hero -->
        <div class="shop-hero">
            @if($shop->cover_image)
                <img src="{{ asset($shop->cover_image) }}" alt="{{ $shop->shop_name }}" class="shop-hero-cover">
            @else
                <div class="shop-hero-cover" style="background:linear-gradient(135deg,#0f172a,#1e3a5f);"></div>
            @endif
            <div class="shop-hero-overlay"></div>
            <div class="shop-hero-info">
                <div class="shop-logo-wrap">
                    @if($shop->logo)
                        <img src="{{ asset($shop->logo) }}" alt="{{ $shop->shop_name }}">
                    @else
                        <div class="shop-logo-initial">{{ strtoupper(substr($shop->shop_name, 0, 1)) }}</div>
                    @endif
                </div>
                <div class="shop-hero-text">
                    <h1>{{ $shop->shop_name }}</h1>
                    <div class="meta">
                        @if($shop->location) 📍 {{ $shop->location }} @endif
                        @if($shop->contact_phone) &nbsp;·&nbsp; 📞 {{ $shop->contact_phone }} @endif
                        @if($shop->contact_email) &nbsp;·&nbsp; ✉ {{ $shop->contact_email }} @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Stats bar -->
        <div class="shop-stats">
            <div class="stat-item"><span>{{ $shopProducts->count() }}</span> Products</div>
            @if($shop->description)
                <div class="stat-item" style="flex:1;min-width:0;">
                    <span style="font-weight:400;color:#6b7280;">{{ Str::limit($shop->description, 120) }}</span>
                </div>
            @endif
        </div>

        <!-- Products Grid -->
        <div class="container py-8">
            @if($shopProducts->isEmpty())
                <div class="text-center py-20">
                    <p class="text-gray-500 text-lg" style="font-family:'Inter',sans-serif;">This shop has no products yet.</p>
                    <a href="{{ route('ourShop') }}" class="mt-4 inline-block bg-black text-white px-4 py-2 rounded text-sm" style="font-family:'Orbitron',sans-serif;">← Back to Shops</a>
                </div>
            @else
                <div class="row mb-n-20px">
                    @foreach($shopProducts as $product)
                        <div class="col-xl-5th col-lg-4 col-md-6 col-sm-6 mb-4 bg-transparent">
                            <!-- Single Product — same card style as product-category -->
                            <div class="product bg-white p-2 rounded-md shadow-sm hover:shadow-md transition-shadow">

                                <span class='badges'>
                                    @php
                                        $retail_price_clean    = preg_replace('/[^0-9.]/', '', $product['retail_price']);
                                        $discount_price_clean  = preg_replace('/[^0-9.]/', '', $product['discounted_price']);
                                        $retail_price_numeric  = (float) $retail_price_clean;
                                        $discount_price_numeric = (float) $discount_price_clean;
                                        $discount = $retail_price_numeric - $discount_price_numeric;
                                    @endphp
                                    @if($discount > 0)
                                        <span class='discount-badge text-[10px] border border-black text-black bg-white px-1 py-0.5 leading-none' style="font-family:'Inter',sans-serif;">
                                            Save {{ number_format($discount) }} LKR
                                        </span>
                                    @endif
                                </span>

                                <div class="thumb">
                                    <a href="{{ route('singleProduct', ['product-id' => $product['id']]) }}" class="image block">
                                        <img src="{{ $product['image'] }}" class="w-full aspect-square object-contain object-center" alt="{{ $product['name'] }}" />
                                    </a>
                                </div>

                                <div class="content bg-transparent px-1 py-2">
                                    <span class="category block text-xs text-gray-600 mb-0.5" style="font-family:'Inter',sans-serif;">
                                        {{ $product['type'] }}
                                    </span>
                                    <h5 class="title mb-1">
                                        <a href="{{ route('singleProduct', ['product-id' => $product['id']]) }}" class="text-black line-clamp-1 text-xs text-center font-medium" style="font-family:'Inter',sans-serif;">
                                            {{ $product['name'] }}
                                        </a>
                                    </h5>
                                    <div class="price flex flex-col gap-0.5 justify-start">
                                        <span class="new text-sm font-medium text-black" style="font-family:'Poppins',sans-serif;">
                                            Rs. {{ $product['discounted_price'] }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Actions -->
                                <div class="px-2 pb-1 pt-0 flex justify-between items-center">
                                    <a href="javascript:void(0);"
                                       class="bg-black text-white text-xs font-medium px-3 py-1.5 rounded-sm hover:bg-gray-800 transition-all"
                                       style="font-family:'Orbitron',sans-serif;"
                                       data-bs-toggle="modal"
                                       data-bs-target="#exampleModal-Cart"
                                       onclick="addToCartProduct({{ $product['id'] }});">
                                        Buy Now
                                    </a>
                                    <div class="flex gap-1.5">
                                        <button class="text-gray-500 hover:text-black text-sm" title="Add to Cart"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal-Cart"
                                            onclick="addToCartProduct({{ $product['id'] }});">
                                            <i class="pe-7s-cart"></i>
                                        </button>
                                        <button class="text-gray-500 hover:text-black text-sm" title="Wishlist"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal-Wishlist"
                                            onclick="addToWishlistProduct({{ $product['id'] }});">
                                            <i class="pe-7s-like"></i>
                                        </button>
                                        <button class="action quickview text-gray-500 hover:text-black text-sm"
                                            data-link-action="quickview" title="Quick view"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                                            data-product-id="{{ $product['id'] }}"
                                            data-product-name="{{ $product['name'] }}"
                                            data-product-image="{{ $product['image'] }}"
                                            data-product-type="{{ $product['type'] }}"
                                            data-product-distription="{{ $product['description'] }}"
                                            data-product-price="{{ $product['discounted_price'] }}">
                                            <i class="pe-7s-look"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        @include('layouts.footer2')
    </div>

    <!-- modals -->
    @include('layouts.modals')

    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/scrollUp.js"></script>
    <script src="assets/js/plugins/venobox.min.js"></script>
    <script src="assets/js/main.js"></script>

    <script>
    function addToCartProduct(prodID) {
        fetch(`/api/product/${prodID}`)
            .then(r => r.json())
            .then(product => {
                fetch(`/product-quantity/${prodID}`)
                    .then(r => r.json())
                    .then(data => {
                        if (data.qty <= 0) { alert('This product is out of stock.'); return; }
                        const existing = cart.find(i => i.id == prodID);
                        if (existing) {
                            if (existing.quantity < data.qty) existing.quantity++;
                            else { alert('Only ' + data.qty + ' items available.'); return; }
                        } else {
                            cart.push({ id: product.id, name: product.name, price: product.discounted_price, image: product.image, quantity: 1 });
                        }
                        updateCartCount(); updateCartModal(product); saveCartToStorage(); displayCartItems();
                    });
            });
    }

    function addToWishlistProduct(prodID) {
        fetch(`/api/product/${prodID}`)
            .then(r => r.json())
            .then(product => {
                if (!wishlist.find(i => i.id === prodID)) {
                    wishlist.push({ id: product.id, name: product.name, price: product.discounted_price, image: product.image });
                    updateWishlistCount(); updateWishlistModal(product); saveWishlistToStorage(); displayWishlistItems();
                }
            });
    }
    </script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const quickViewButtons = document.querySelectorAll('.action.quickview');
        const swiperWrapper  = document.querySelector('.gallery-top .swiper-wrapper');
        const thumbsWrapper  = document.querySelector('.gallery-thumbs .swiper-wrapper');

        function truncate(text, max) { return text && text.length > max ? text.substring(0, max) + '...' : text || ''; }

        quickViewButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                const modal = document.getElementById('exampleModal');
                modal.querySelector('.product-details-content h2').innerText = truncate(btn.dataset.productName, 50);
                modal.querySelector('.new-price').innerText = btn.dataset.productPrice;
                modal.querySelector('.pro-details-quality .add-cart').setAttribute('data-product-id', btn.dataset.productId);
                if (swiperWrapper) swiperWrapper.innerHTML = `<div class="swiper-slide"><img class="img-responsive m-auto" src="${btn.dataset.productImage}" alt=""></div>`;
                if (thumbsWrapper) thumbsWrapper.innerHTML = '';
                modal.querySelector('.product-details-content p').innerHTML = truncate(btn.dataset.productDistription, 150);
            });
        });
    });
    </script>
</body>
</html>