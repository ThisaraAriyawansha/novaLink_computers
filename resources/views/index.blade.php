
<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreX Computers | Best Computers for you</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="CoreX Computers offer the best computers available at the market">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/X_logo.jpg" />
    <!-- CSS
    ============================================ -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/font.awesome.css" />
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/venobox.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <!--custom cursor
    <div class="cursor">
        <div class="cursor__ball cursor__ball--big">
            <svg height="30" width="30">
                <circle cx="15" cy="15" r="12" stroke-width="0"></circle>
            </svg>
        </div>
        <div class="cursor__ball cursor__ball--small">
            <svg height="10" width="10">
                <circle cx="5" cy="5" r="4" stroke-width="0"></circle>
            </svg>
        </div>
    </div>
    -->
    <div class="main-wrapper">

        @include('layouts.nav-2')

        <!--sample video-->
        <div class="relative lg:h-[100dvh] w-full">
            <!-- Loading Indicator -->
            <div id="loadingIndicator" class="absolute inset-0 flex items-center justify-center bg-dark-blue-bg">
                <div class="animate-spin rounded-full h-10 w-10 border-t-2 border-b-2 border-white"></div>
            </div>

            <!-- Video Element -->
            <video
                id="videoPlayer"
                autoplay
                loop
                muted
                playsinline
                class="h-full w-full object-cover dark-blue-bg"
                style="background: url('assets/videos/video-thumb.png') no-repeat; background-size: cover;">
                <source src="assets/videos/18 - RAISE YOUR GAME. CARRY YOUR SQUAD.  _ ROG.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>

        <!-- All content -->
        <div class="w-full">
            <!-- Hero/Intro Slider Start -->
            <div class="section h-[90dvh]">

                <div class="hero-slider swiper-container slider-nav-style-1 slider-dot-style-1 h-full cursor-pointer">
                    <!-- Hero slider Active -->

                    <div class="swiper-wrapper h-[85dvh] bg-black">
                        <!-- Single slider item -->
                        <div class="hero-slide-item swiper-slide  h-[85dvh]" data-bg-image="assets/images/hero/bg/hero-bg-1.webp">
                            <div class="container  h-[85dvh]">
                                <div class="row  h-[85dvh]">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 align-self-center sm-center-view">
                                        <div class="hero-slide-content slider-animated-1">
                                            <span class="category">Welcome To CoreX Computers</span>
                                            <h2 class="title-1 max-[575px]:text-center">Computers <br> Accessories & <br> Gaming Products </h2>
                                            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'ALL']) }}" class="btn btn-primary text-capitalize">Shop All Devices</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-flex justify-content-center position-relative align-items-end">
                                        <div class="show-case">
                                            <div class="hero-slide-image">
                                                <img src="assets/images/hero/inner-img/hero-1-1.png" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single slider item -->
                        <div class="hero-slide-item swiper-slide  bg-[#0c1a5f]" data-bg-image="assets/images/hero/bg/hero-bg-2.jpg">
                            <div class="container h-100">
                                <div class="row h-100">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 align-self-center sm-center-view">
                                        <div class="hero-slide-content slider-animated-1">
                                            <span class="category">Welcome To CoreX Computers</span>
                                            <h2 class="title-1">Computers <br> Accessories & <br> Gaming Products </h2>
                                            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'ALL']) }}" class="btn btn-primary text-capitalize">Shop All Devices</a>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 d-flex justify-content-center position-relative align-items-end">
                                        <div class="show-case">
                                            <div class="hero-slide-image">
                                                <img src="assets/images/hero/inner-img/hero-1-3.png" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Add Pagination -->
                    <div class="swiper-pagination swiper-pagination-white"></div>
                    <!-- Add Arrows -->
                    <div class="swiper-buttons">
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div>
            </div>
            <!-- Banner Area Start -->
            <div class="banner-area style-one pt-100px pb-100px">
                <div class="container">
                    <div class="grid lg:grid-cols-2 gap-6">
                    <div class="h-full relative">
                            <div class="bg-black/50 absolute left-0 top-0 w-full h-full"></div>
                            <div class="single-banner nth-child-1">
                                <img src="assets/images/banner/3.webp" alt="" class="h-full">
                                <div class="banner-content nth-child-1">
                                    <h3 class="title text-white">REDRAGON JUNO G818 <br> WIRELESS GAMEPAD</h3>
                                    <span class="category text-white">10,400 LKR</span>
                                    <a href="{{ route('singleProduct', ['product-id' => 9]) }}" class="shop-link"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="single-banner nth-child-2 mb-30px mb-lm-30px mt-lm-30px ">
                                <img src="assets/images/banner/4.webp" alt="" class="relative">
                                <div class="bg-black/50 absolute left-0 top-0 w-full h-full"></div>
                                <div class="banner-content nth-child-2">
                                    <h3 class="title text-white">G SKILL TRIDENT Z NEO <br> RGB 16GB (8X2) 3200MHZ MEMORY</h3>
                                    <span class="category text-white">18,000 LKR</span>
                                    <a href="{{ route('singleProduct', ['product-id' => 10]) }}" class="shop-link"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                            <div class="single-banner nth-child-2">
                                <img src="assets/images/banner/5.webp" alt="" class="relative">
                                <div class="bg-black/50 absolute left-0 top-0 w-full h-full"></div>
                                <div class="banner-content nth-child-3">

                                    <h3 class="title text-white">iPhone 16 Pro Max</h3>
                                    <span class="category text-white">520,000 LKR</span>
                                    <a href="{{ route('singleProduct', ['product-id' => 8]) }}" class="shop-link">
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </a>                        
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container pb-100px">
            @foreach ($products as $product)
                    @if ($product['tags'] === 'DEAL OF THE DAYS')
                    @if ($product['tags'] === 'DEAL OF THE DAYS' && \Carbon\Carbon::parse($product['deal_end'])->isFuture())

                        <div class="flex flex-col md:flex-row shadow-lg rounded-xl overflow-hidden bg-white md:h-[500px]">
                            <!-- Product Image Section -->
                            <div class="md:w-3/5 relative group">
                                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-full object-contain">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end">
                                    <h1 class="text-xl md:text-3xl font-bold text-white p-6">{{ strtoupper($product['name']) }}</h1>
                                </div>
                                <!-- Overlay on hover -->
                                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <button class="bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white px-6 py-3 rounded-full border border-white/30 transition-all duration-300">
                                        View Gallery
                                    </button>
                                </div>
                            </div>

                            <!-- Bid Information Section -->
                            <div class="md:w-2/5 p-6 flex flex-col justify-between">
                                <div>
                                    <div class="flex justify-between items-center mb-6">
                                        <h2 class="text-xl font-bold text-gray-800">Live Auction</h2>
                                        <span class="text-sm text-gray-500">ID: #{{ $product['auction_id'] ?? 'A7845291' }}</span>
                                    </div>

                                    <div class="space-y-6">
                                        <!-- Timer -->
                                        <div class="bg-gray-50 rounded-lg p-2">
                                            <p class="text-sm text-gray-500 mb-1">Time Remaining</p>
                                            <div class="flex gap-2 timer-container" data-end="{{ $product['deal_end'] }}">
                                                <div class="hours bg-gradient-to-r from-pink-600 to-purple-600 text-white px-3 py-2 rounded font-mono text-xl">0H</div>
                                                <div class="minutes bg-gradient-to-r from-pink-600 to-purple-600 text-white px-3 py-2 rounded font-mono text-xl">0M</div>
                                                <div class="seconds bg-gradient-to-r from-pink-600 to-purple-600 text-white px-3 py-2 rounded font-mono text-xl">0S</div>
                                            </div>
                                        </div>

                                        <!-- Current Price -->
                                        <div>
                                            <p class="text-sm text-gray-500">Current Bid</p>
                                            <div class="flex items-end gap-2">
                                                <span class="text-3xl font-bold text-gray-900">Rs {{$product['dis_price'] }}</span>
                                            </div>
                                        </div>

                                        <!-- Bidding History -->

                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="mt-8 space-y-3">
                                    <a class="w-full bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white py-3 px-6 rounded-lg font-semibold flex items-center justify-center gap-2 transition-all duration-300 rounded" href="biddings?product-id={{ $product['id'] }}">
                                        Place Bid
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @break <!-- Stop after the first matching product -->
                        @endif
                    @endif
                @endforeach
                <hr>
                <div class="row">
                    @foreach ($products as $product)
                        @if ($product['tags'] === 'DEAL OF THE DAYS')
                        @if ($product['tags'] === 'DEAL OF THE DAYS' && \Carbon\Carbon::parse($product['deal_end'])->isFuture())
                            <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px bg-transparent">
                                <!-- Single Product -->
                                <div class="product">
                                    <span class="badges">
                                        <span class="sale">New</span>
                                    </span>
                                    <div class="thumb">
                                    <a href="biddings?product-id=<?= $product['id'] ?>" class="image">
                                    <img src="{{ $product['image'] }}" class="aspect-square object-contain object-center" alt="Product" />
                                            <img class="hover-image" src="{{ $product['image'] }}" alt="Product" />
                                        </a>
                                    </div>
                                    <div class="content bg-transparent pb-2">
                                        <span class="category text-black">
                                            <a href="#" class="text-black">{{ $product['type'] }}</a>
                                        </span>
                                        <h5 class="title">
                                            <a href="biddings?product-id=<?= $product['id'] ?>" class="line-clamp-1 text-center px-3 text-black">
                                                {{ $product['name'] }}
                                            </a>
                                        </h5>
                                        <span class="price">
                                            <span class="new text-black">{{ $product['ret_price'] }}</span>
                                        </span>
                                    </div>
                                    <div class="flex flex-col items-center pb-4">
                                        <p class="text-xl text-green-600">{{ $product['dis_price'] }}</p>
                                        <div class="timer-container" data-end="{{ $product['deal_end'] }}">
                                            <p class="text-sm text-gray-500 mb-1 text-center">Bidding Ends in</p>
                                            <div class="flex gap-2 justify-center">
                                                <div class="hours bg-gradient-to-r from-pink-600 to-purple-600 text-white px-3 py-2 rounded font-mono text-xl">0H</div>
                                                <div class="minutes bg-gradient-to-r from-pink-600 to-purple-600 text-white px-3 py-2 rounded font-mono text-xl">0M</div>
                                                <div class="seconds bg-gradient-to-r from-pink-600 to-purple-600 text-white px-3 py-2 rounded font-mono text-xl">0S</div>
                                            </div>
                                        </div>
                                        <p class="text-sm">Bidders</p>
                                        <a href="biddings?product-id=<?= $product['id'] ?>" class="light-blue-bg text-white text-center w-full">BID NOW!</a>
                                    </div>
                                    <div class="actions items-center">
                                        <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart" onclick="addToCart({{ $product['id'] }});">
                                            <i class="pe-7s-cart"></i>
                                        </button>
                                        <button class="action wishlist" title="Wishlist" data-bs-toggle="modal" data-bs-target="#exampleModal-Wishlist" onclick="addToWishlist({{ $product['id'] }});">
                                            <i class="pe-7s-like"></i>
                                        </button>
                                        <button class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal" 
                                                data-product-id="{{ $product['id'] }}" 
                                                data-product-name="{{ $product['name'] }}" 
                                                data-product-image="{{ $product['image'] }}" 
                                                data-product-type="{{ $product['type'] }}" 
                                                data-product-desc="{{ $product['desc'] }}" 
                                                data-product-price="{{ $product['dis_price'] }}">
                                            <i class="pe-7s-look"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endif
                    @endforeach
                </div>
            </div>



            <!-- Product Area Start -->
            <div class="product-area py-[50px] dark-blue-bg relative" style="background:url(assets/images/banner/gaming_4.jpg)no-repeat;background-position:center;background-size:cover;background-attachment: fixed;">
                <div class="bg-black/50 absolute left-0 top-0 w-full h-full"></div>
                <div class="container relative">
                    <!-- Section Title & Tab Start -->
                    <div class="row">
                        <div class="col-12">
                            <!-- Tab Start -->
                            <div class="tab-slider d-md-flex justify-content-md-between align-items-md-center">
                                <ul class="product-tab-nav nav justify-content-start align-items-center max-md:flex-col gap-6">
                                    <li class="nav-item">
                                        <button class="btn btn-primary active" data-bs-toggle="tab" data-bs-target="#newarrivals">New Arrivals</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="btn btn-primary" data-bs-toggle="tab" data-bs-target="#toprated">Top Rated</button>
                                    </li>
                                    <li class="nav-item">
                                        <button class="btn btn-primary" data-bs-toggle="tab" data-bs-target="#featured">Featured</button>
                                    </li>
                                </ul>
                            </div>
                            <!-- Tab End -->
                        </div>
                    </div>
                    <!-- Section Title & Tab End -->
                    <div class="row">
                        <div class="col">
                            <div class="tab-content mt-60px">
                                <!-- 1st tab start -->
                                <div class="tab-pane fade show active" id="newarrivals">
                                    <div class="row mb-n-30px">
                                        <?php
                                        foreach ($products as $product) {
                                            if ($product['tags'] == "New Arrivals") {
                                                echo "<div class='col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px bg-transparent'>
                                            <!-- Single Prodect -->
                                            <div class='product'>
                                                <span class='badges'>
                                                    <span class='sale'>Sale</span>
                                                    <span class='new'>New</span>
                                                </span>
                                                <div class='thumb'>
                                                    <a href='singleProduct?product-id={$product['id']}' class='image'>
                                                        <img src='{$product['image']}' class='aspect-square object-contain object-center' alt='Product' />
                                                        <img class='hover-image' src='{$product['image']}' alt='Product' />
                                                    </a>
                                                </div>
                                                <div class='content bg-transparent'>
                                                    <span class='category text-white'><a href='#' class=' text-white'>{$product['type']}</a></span>
                                                    <h5 class='title'>
                                                        <a href='singleProduct?product-id={$product['id']}' class='line-clamp-1 text-center px-3 text-white'>
                                                            {$product['name']}
                                                        </a>  
                                                    </h5>
                                                    <span class='price'>
                                                        <span class='new'>{$product['dis_price']}</span>
                                                    </span>
                                                </div>
                                                <div class='actions items-center'>
                                                    <button title='Add To Cart' class='action add-to-cart' data-bs-toggle='modal' data-bs-target='#exampleModal-Cart' onClick='addToCart({$product['id']});'>
                                                        <i class='pe-7s-shopbag'></i>
                                                    </button>
                                                   <button class='action wishlist' title='Wishlist' data-bs-toggle='modal' data-bs-target='#exampleModal-Wishlist' onClick='addToWishlist({$product['id']});'>
                                                        <i class='pe-7s-like'></i>
                                                    </button>
                                                    <button class='action quickview' data-link-action='quickview' title='Quick view' data-bs-toggle='modal' data-bs-target='#exampleModal' 
                                                            data-product-id='{$product['id']}' 
                                                            data-product-name='{$product['name']}' 
                                                            data-product-image='{$product['image']}' 
                                                            data-product-type='{$product['type']}' 
                                                            data-product-desc='{$product['desc']}' 
                                                            data-product-price='{$product['dis_price']}'>
                                                        <i class='pe-7s-look'></i>
                                                    </button>  
                                                  </div>
                                            </div>
                                        </div>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- 2nd tab start -->
                                <div class="tab-pane fade" id="toprated">
                                    <div class="row">
                                        <?php
                                        foreach ($products as $product) {
                                            if ($product['tags'] == "Top Rated") {
                                                echo "<div class='col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px bg-transparent'>
                                            <!-- Single Prodect -->
                                            <div class='product'>
                                                <span class='badges'>
                                                    <span class='sale'>Sale</span>
                                                </span>
                                                <div class='thumb'>
                                                    <a href='singleProduct?product-id={$product['id']}' class='image'>
                                                        <img src='{$product['image']}' class='aspect-square object-contain object-center' alt='Product' />
                                                        <img class='hover-image' src='{$product['image']}' alt='Product' />
                                                    </a>
                                                </div>
                                                <div class='content bg-transparent'>
                                                    <span class='category '><a href='#' class=' text-white'>{$product['type']}</a></span>
                                                    <h5 class='title'>
                                                        <a href='singleProduct?product-id={$product['id']}' class='line-clamp-1 text-center px-3 text-white'>
                                                            {$product['name']}
                                                        </a>
                                                    </h5>
                                                    <span class='price'>
                                                        <span class='new'>{$product['dis_price']}</span>
                                                    </span>
                                                </div>
                                                <div class='actions items-center'>
                                                    <button title='Add To Cart' class='action add-to-cart' data-bs-toggle='modal' data-bs-target='#exampleModal-Cart' onClick='addToCart({$product['id']});'>
                                                        <i class='pe-7s-shopbag'></i>
                                                    </button>
                                                    <button class='action wishlist' title='Wishlist' data-bs-toggle='modal' data-bs-target='#exampleModal-Wishlist' onClick='addToWishlist({$product['id']});'>
                                                        <i class='pe-7s-like'></i>
                                                    </button>
                                                    <button class='action quickview' data-link-action='quickview' title='Quick view' data-bs-toggle='modal' data-bs-target='#exampleModal' 
                                                            data-product-id='{$product['id']}' 
                                                            data-product-name='{$product['name']}' 
                                                            data-product-image='{$product['image']}' 
                                                            data-product-type='{$product['type']}' 
                                                             data-product-desc='{$product['desc']}' 
                                                            data-product-price='{$product['dis_price']}'>
                                                        <i class='pe-7s-look'></i>
                                                    </button>  
                                             </div>
                                            </div>
                                        </div>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- 3rd tab start -->
                                <div class="tab-pane fade" id="featured">
                                    <div class="row">
                                        <?php
                                        foreach ($products as $product) {
                                            if ($product['tags'] == "Featured") {
                                                echo "<div class='col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px bg-transparent'>
                                            <!-- Single Prodect -->
                                            <div class='product'>
                                                <span class='badges'>
                                                    <span class='sale'>Sale</span>
                                                </span>
                                                <div class='thumb'>
                                                    <a href='singleProduct?product-id={$product['id']}' class='image'>
                                                        <img src='{$product['image']}' class='aspect-square object-contain object-center' alt='Product' />
                                                        <img class='hover-image' src='{$product['image']}' alt='Product' />
                                                    </a>
                                                </div>
                                                <div class='content bg-transparent'>
                                                    <span class='category '><a href='#' class=' text-white'>{$product['type']}</a></span>
                                                    <h5 class='title'>
                                                        <a href='singleProduct?product-id={$product['id']}' class='line-clamp-1 text-center px-3 text-white'>
                                                            {$product['name']}
                                                        </a>
                                                    </h5>
                                                    <span class='price'>
                                                        <span class='new'>{$product['dis_price']}</span>
                                                    </span>
                                                </div>
                                                <div class='actions items-center'>
                                                    <button title='Add To Cart' class='action add-to-cart' data-bs-toggle='modal' data-bs-target='#exampleModal-Cart' onClick='addToCart({$product['id']});'>
                                                        <i class='pe-7s-shopbag'></i>
                                                    </button>
                                                    <button class='action wishlist' title='Wishlist' data-bs-toggle='modal' data-bs-target='#exampleModal-Wishlist' onClick='addToWishlist({$product['id']});'>
                                                        <i class='pe-7s-like'></i>
                                                    </button>
                                                    <button class='action quickview' data-link-action='quickview' title='Quick view' data-bs-toggle='modal' data-bs-target='#exampleModal' 
                                                            data-product-id='{$product['id']}' 
                                                            data-product-name='{$product['name']}' 
                                                            data-product-image='{$product['image']}' 
                                                            data-product-type='{$product['type']}' 
                                                            data-product-desc='{$product['desc']}' 
                                                            data-product-price='{$product['dis_price']}'>
                                                        <i class='pe-7s-look'></i>
                                                    </button>  
                                                </div>
                                            </div>
                                        </div>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fashion Area Start -->
            <div class="fashion-area" data-bg-image="assets/images/fashion/fashion-bg.webp">
                <div class="container h-100">
                    <div class="row justify-content-center align-items-center h-100">
                        <div class="col-12 text-center">
                            <h2 class="title"> <span>Level Up</span> Your Laptop </h2>
                            <a href="#" class="btn btn-primary text-capitalize m-auto">See Upgrades</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Feature product area start -->
            <div class="feature-product-area py-[50px] dark-blue-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title text-center">
                                <h2 class="title text-white">Special Offers</h2>
                                <p class="text-white">There are many special offers available</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 max-[992px]:mb-[30px]">
                            <div class="single-feature-content h-full">
                                <div class="feature-image max-[992px]:pb-[10px]">
                                    <img src="assets/images/feature-image/e2509820e3d308e6c97cb663f1c2357bb.jpg" alt="" class="h-full">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="feature-right-content">
                                <div class="image-side">
                                    <img src="assets/images/feature-image/desktop-wallpaper-3d-mobile-broken-motherboard.jpg" alt="" class="h-full">
                                    <button title="Add To Cart" class="action add-to-cart " ><i
                                            class="pe-7s-shopbag"></i></button>
                                </div>
                                <div class="content-side">
                                    <div class="prize-content">
                                        <h5 class="title text-white"><a class=" text-white" href="single-product.php">POWERFUL PC COMBO</a></h5>
                                        <span class="price text-white">
                                            <span class="old text-white">143,000 LKR</span>
                                            <span class="new text-white">139,000 LKR</span>
                                        </span>
                                    </div>
                                    <div class="product-feature text-white">
                                        <ul class="">
                                            <li class=" text-white">AMD RYZEN 5 7600x PROCESSOR</li>
                                            <li class=" text-white">PRO A620M-E MOTHERBOARD</li>
                                            <li class=" text-white">VENGEANCE 16GB DDR5 RAM</li>
                                            <li class=" text-white">LEXAR NM620 256GB NVMe</li>
                                            <li class=" text-white">CX SERIES CX550 550W 80 PLUS POWERSUPPLY</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="feature-right-content mt-30px" style="margin-bottom:5px">
                                <div class="image-side">
                                    <img src="assets/images/feature-image/republic-of-gamers-motherboard-red-background-logo-4k-sd-1280x2120.jpg" alt="" class="h-full">
                                    <button title="Add To Cart" class="action add-to-cart " ><i
                                            class="pe-7s-shopbag"></i></button>
                                </div>
                                <div class="content-side">
                                    <div class="prize-content">
                                        <h5 class="title"><a class=" text-white" href="single-product.php">POWERFUL PC COMBO</a></h5>
                                        <span class="price text-white">
                                            <span class="old">153,000 LKR</span>
                                            <span class="new">149,500 LKR</span>
                                        </span>
                                    </div>
                                    <div class="product-feature">
                                        <ul>
                                            <li class=" text-white">INTEL i5 12490F PROCESSOR</li>
                                            <li class=" text-white">B760 BOMBER WIFI MOTHERBOARD</li>
                                            <li class=" text-white">TRIDENT Z5 RGB RAM</li>
                                            <li class=" text-white">LEXAR NM620 256GB NVMe</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Testimonial area start -->
            <div class="main-blog-area py-[50px] light-blue-bg">
                <div class="container">
                    <!-- section title start -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-title text-center mb-30px0px">
                                <h2 class="title text-white">Latest Blogs</h2>
                                <p class="text-white">Discover our latest articles and updates</p>
                            </div>
                        </div>
                    </div>
                    <!-- section title start -->
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-lg-6 col-sm-6 mb-xs-30px">
                                <div class="single-blog">
                                    <div class="blog-image">
                                        <a href="{{ route('blog.show') . '?blog-id=' . $blog['id'] }}"><img src="{{ $blog['image'] }}" class="img-responsive w-100" alt="{{ $blog['title'] }}"></a>
                                    </div>
                                    <div class="lg:pl-3 max-lg:pt-3 flex flex-col gap-2 justify-center">
                                        <div class="blog-athor-date line-height-1">
                                            <span class="blog-date text-white"><i class="fa fa-calendar text-white" aria-hidden="true"></i> {{ $blog['date'] }}</span>
                                            <span><a class="blog-author text-white" href="#"><i class="fa fa-user text-white" aria-hidden="true"></i> Admin</a></span>
                                        </div>
                                        <h5 class="blog-heading mt-2"><a class="blog-heading-link text-white" href="{{ route('blog.show') . '?blog-id=' . $blog['id'] }}">{{ $blog['title'] }}</a></h5>
                                        <h5 class="blog-heading"><a class="blog-heading-link text-white text-sm" href="{{ route('blog.show') . '?blog-id=' . $blog['id'] }}">{{ $blog['description'] }}</a></h5>
                                        <a href="{{ route('blog.show') . '?blog-id=' . $blog['id'] }}" class="btn btn-primary blog-btn">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if($blogs->isEmpty())
                            <div class="col-12 text-center">
                                <p class="text-white">No blogs available at the moment.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Blog area start from here -->
        
            <!-- footer -->

             @include('layouts.footer2')

        </div>
        <!-- modals -->
        @include('layouts.modals')

        <!-- Global Vendor, plugins JS -->
        <!-- JS Files
    ============================================ -->
        <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
        <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
        <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
        <script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
        <script src="assets/js/plugins/jquery.countdown.min.js"></script>
        <script src="assets/js/plugins/swiper-bundle.min.js"></script>
        <script src="assets/js/plugins/scrollUp.js"></script>
        <script src="assets/js/plugins/venobox.min.js"></script>
        <script src="assets/js/plugins/jquery-ui.min.js"></script>
        <script src="assets/js/plugins/mailchimp-ajax.js"></script>

        <!--Main JS (Common Activation Codes)-->
        <script src="assets/js/main.js"></script>
        <!--video-->
        <script>
            const video = document.getElementById('videoPlayer');
            const loadingIndicator = document.getElementById('loadingIndicator');

            // Show loading indicator until the video starts playing
            video.addEventListener('canplay', () => {
                loadingIndicator.style.display = 'none';
            });

            // Show the loading indicator again if the video buffers
            video.addEventListener('waiting', () => {
                loadingIndicator.style.display = 'flex';
            });

            video.addEventListener('playing', () => {
                loadingIndicator.style.display = 'none';
            });
        </script>
        <!--
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.20.3/TweenMax.min.js"></script>
        <script>
            const $bigBall = document.querySelector('.cursor__ball--big');
            const $smallBall = document.querySelector('.cursor__ball--small');
            const $hoverables = document.querySelectorAll('.hoverable');

            // Listeners
            document.body.addEventListener('mousemove', onMouseMove);
            $hoverables.forEach(hoverable => {
                hoverable.addEventListener('mouseenter', onMouseHover);
                hoverable.addEventListener('mouseleave', onMouseHoverOut);
            });

            // Move the cursor
            function onMouseMove(e) {
                // Use clientX/Y instead of pageX/Y to get viewport-relative coordinates
                TweenMax.to($bigBall, 0.4, {
                    x: e.clientX - 15,
                    y: e.clientY - 15
                });

                TweenMax.to($smallBall, 0.1, {
                    x: e.clientX - 5,
                    y: e.clientY - 7
                });
            }

            // Hover an element
            function onMouseHover() {
                TweenMax.to($bigBall, 0.3, {
                    scale: 4
                });
            }

            function onMouseHoverOut() {
                TweenMax.to($bigBall, 0.3, {
                    scale: 1
                });
            }
        </script>
        -->
</body>

</html>


<script>
document.addEventListener('DOMContentLoaded', function () {
    // Select the thumbsWrapper and swiperWrapper elements
    const swiperWrapper = document.querySelector('.gallery-top .swiper-wrapper');
    const thumbsWrapper = document.querySelector('.gallery-thumbs .swiper-wrapper');
    
    // Select all quick view buttons
    const quickViewButtons = document.querySelectorAll('.action.quickview');

    // Function to truncate text
    function truncateText(text, maxLength) {
        if (text.length > maxLength) {
            return text.substring(0, maxLength) + '...';
        }
        return text;
    }

    quickViewButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Extract product details from data attributes
            const productId = button.getAttribute('data-product-id');
            const productName = button.getAttribute('data-product-name');
            const productImage = button.getAttribute('data-product-image');
            const productType = button.getAttribute('data-product-type');
            const productDescription = button.getAttribute('data-product-desc');
            const productPrice = button.getAttribute('data-product-price');

            // Update the modal content
            const modal = document.getElementById('exampleModal');
            // Truncate product name (e.g., 50 characters)
            const maxNameLength = 50;
            const truncatedName = truncateText(productName, maxNameLength);
            modal.querySelector('.product-details-content h2').innerText = truncatedName;
            modal.querySelector('.new-price').innerText = productPrice;
            modal.querySelector('.pro-details-rating-wrap .reviews').href = `#${productId}`;
            modal.querySelector('.pro-details-quality .add-cart').setAttribute('data-product-id', productId);
            modal.querySelector('.pro-details-compare-wishlist a').href = `wishlist.php?product-id=${productId}`;

            // Initially, load the main product image in the modal
            swiperWrapper.innerHTML = `<div class="swiper-slide">
                                          <img class="img-responsive m-auto" src="${productImage}" alt="${truncatedName}">
                                       </div>`;
            thumbsWrapper.innerHTML = ''; // Reset the thumbnail slider

            // Fetch additional images via AJAX
            fetch(`/api/product-images/${productId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`Failed to fetch images for product ${productId}: ${response.statusText}`);
                    }
                    return response.json();
                })
                .then(images => {
                    console.log(images);

                    if (images && images.length > 0) {
                        images.forEach(image => {
                            thumbsWrapper.innerHTML += `<div class="swiper-slide">
                                                        <img class="img-responsive m-auto" src="${image.image_path}" alt="${truncatedName}">
                                                    </div>`;
                        });

                        if (swiper) {
                            swiper.update();
                            swiper.thumbs.swiper.update();
                        }
                    } else {
                        console.warn('No additional images found for this product.');
                    }
                })
                .catch(error => {
                    console.error('Error fetching product images:', error);
                    swiperWrapper.innerHTML = `<div class="swiper-slide">Error loading images.</div>`;
                });

            // Update the product description with a length limit (e.g., 150 characters)
            const maxDescriptionLength = 150;
            const truncatedDescription = truncateText(productDescription, maxDescriptionLength);
            modal.querySelector('.product-details-content p').innerHTML = truncatedDescription;

            // Reinitialize Swiper if necessary
            if (swiper) {
                swiper.update();
            }

            // Add event listener to thumbnails for changing the main image
            thumbsWrapper.addEventListener('click', function (e) {
                const clickedThumb = e.target.closest('.swiper-slide img');
                if (clickedThumb) {
                    const thumbImagePath = clickedThumb.getAttribute('src');
                    swiperWrapper.innerHTML = `<div class="swiper-slide">
                                                  <img class="img-responsive m-auto" src="${thumbImagePath}" alt="${truncatedName}">
                                               </div>`;
                    if (swiper) {
                        swiper.update();
                    }
                }
            });
        });
    });
});



let swiper;

function initSwiper() {
    // Initialize main gallery swiper
    swiper = new Swiper('.gallery-top', {
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        allowTouchMove: true, // Disable click/drag functionality
        thumbs: {
            swiper: new Swiper('.gallery-thumbs', {
                spaceBetween: 10,
                slidesPerView: 3,  // Show 3 thumbnail images at a time
                freeMode: true,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
            }),
        },
    });
}

document.addEventListener('DOMContentLoaded', function () {
    initSwiper();
});

</script>



<!-- JavaScript for Countdown Timer -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const timers = document.querySelectorAll('.timer-container');

        timers.forEach(timer => {
            const endTime = new Date(timer.getAttribute('data-end')).getTime();

            function updateTimer() {
                const now = new Date().getTime();
                const distance = endTime - now;

                if (distance < 0) {
                    timer.querySelector('.hours').textContent = '0H';
                    timer.querySelector('.minutes').textContent = '0M';
                    timer.querySelector('.seconds').textContent = '0S';
                    return;
                }

                const hours = Math.floor(distance / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                timer.querySelector('.hours').textContent = `${hours}H`;
                timer.querySelector('.minutes').textContent = `${minutes}M`;
                timer.querySelector('.seconds').textContent = `${seconds}S`;
            }

            updateTimer();
            setInterval(updateTimer, 1000);
        });
    });
</script>