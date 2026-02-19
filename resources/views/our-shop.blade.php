<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <title>NovaLink Computers | Our Shop</title>
    <meta name="description" content="Browse all NovaLink partner shops">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/n_logo_remove_new.png" />
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="assets/js/tailwind-cdn.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/font.awesome.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .shop-card {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 12px;
            overflow: hidden;
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
        }
        .shop-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 25px -5px rgba(0,0,0,.1), 0 10px 10px -5px rgba(0,0,0,.04);
        }
        .shop-cover {
            height: 160px;
            object-fit: cover;
            width: 100%;
            background: #f3f4f6;
        }
        .shop-logo {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            border: 3px solid #fff;
            object-fit: cover;
            margin-top: -32px;
            margin-left: 16px;
            position: relative;
            z-index: 1;
            background: #e5e7eb;
        }
        .shop-body {
            padding: 0 1rem 1.25rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .shop-name {
            font-size: 1rem;
            font-weight: 600;
            color: #111827;
            margin: 0.5rem 0 0.25rem;
            font-family: 'Orbitron', sans-serif;
        }
        .shop-meta {
            font-size: 0.78rem;
            color: #6b7280;
            font-family: 'Inter', sans-serif;
            margin-bottom: 0.5rem;
        }
        .shop-desc {
            font-size: 0.82rem;
            color: #374151;
            font-family: 'Inter', sans-serif;
            line-height: 1.5;
            flex: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .shop-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 1rem;
        }
        .badge-count {
            font-size: 0.7rem;
            background: #f3f4f6;
            color: #374151;
            padding: 2px 8px;
            border-radius: 99px;
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        @include('layouts.nav-2')

        <!-- Hero Banner -->
        <div class="relative w-full py-[220px] bg-cover bg-center bg-no-repeat"
            style="background:url(assets/images/banner/10-bundle-1.jpg) no-repeat center/cover fixed;">
            <div class="absolute inset-0 bg-black opacity-65 z-0"></div>
            <div class="relative z-10 text-center px-4">
                <h2 class="text-2xl lg:text-4xl font-light text-white mb-2" style="font-family: 'Orbitron', sans-serif;">
                    Our Partner Shops
                </h2>
                <p class="text-white text-sm" style="font-family: 'Orbitron', sans-serif;">
                    Discover trusted shops and their exclusive products
                </p>
            </div>
        </div>

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
                <li style="display:flex;align-items:center;margin:0 6px;" aria-current="page">
                    <svg style="width:16px;height:16px;color:#9ca3af;fill:none;stroke:currentColor;stroke-width:2;" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                    <span style="margin-left:8px;font-size:14px;font-weight:600;color:#374151;padding:6px 10px;border-radius:6px;font-family:'Orbitron',sans-serif;">Our Shop</span>
                </li>
            </ol>
        </nav>

        <!-- Shop Grid -->
        <div class="container py-10">
            @if($shops->isEmpty())
                <div class="text-center py-20">
                    <p class="text-gray-500 text-lg" style="font-family:'Inter',sans-serif;">No active shops available at the moment.</p>
                </div>
            @else
                <div class="row mb-4">
                    <div class="col-12">
                        <p class="text-sm text-gray-500" style="font-family:'Inter',sans-serif;">
                            {{ $shops->count() }} shop{{ $shops->count() !== 1 ? 's' : '' }} found
                        </p>
                    </div>
                </div>
                <div class="row">
                    @foreach($shops as $shop)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-4">
                            <div class="shop-card h-100">
                                <!-- Cover Image -->
                                @if($shop->cover_image)
                                    <img src="{{ asset($shop->cover_image) }}" alt="{{ $shop->shop_name }}" class="shop-cover">
                                @else
                                    <div class="shop-cover" style="background: linear-gradient(135deg,#1a1a2e,#16213e);"></div>
                                @endif

                                <!-- Logo -->
                                @if($shop->logo)
                                    <img src="{{ asset($shop->logo) }}" alt="{{ $shop->shop_name }} logo" class="shop-logo">
                                @else
                                    <div class="shop-logo d-flex align-items-center justify-content-center bg-black text-white fw-bold" style="font-family:'Orbitron',sans-serif;font-size:1.1rem;">
                                        {{ strtoupper(substr($shop->shop_name, 0, 1)) }}
                                    </div>
                                @endif

                                <div class="shop-body">
                                    <div class="shop-name">{{ $shop->shop_name }}</div>

                                    <div class="shop-meta">
                                        @if($shop->location)
                                            <span>📍 {{ $shop->location }}</span>
                                        @endif
                                        @if($shop->contact_phone)
                                            &nbsp;·&nbsp; <span>📞 {{ $shop->contact_phone }}</span>
                                        @endif
                                    </div>

                                    @if($shop->description)
                                        <p class="shop-desc">{{ $shop->description }}</p>
                                    @endif

                                    <div class="shop-footer">
                                        <span class="badge-count">{{ $shop->products_count }} product{{ $shop->products_count !== 1 ? 's' : '' }}</span>
                                        <a href="{{ route('ourShop', ['shop-id' => $shop->id]) }}"
                                           class="bg-black text-white text-xs font-medium px-3 py-1.5 rounded-sm hover:bg-gray-800 transition-all"
                                           style="font-family:'Orbitron',sans-serif;text-decoration:none;">
                                            Visit Shop
                                        </a>
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

    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
