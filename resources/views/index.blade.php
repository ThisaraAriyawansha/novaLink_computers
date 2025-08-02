
<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaLink Computers | Best Computers for you</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="NovaLink Computers offer the best computers available at the market">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/N_back.jpg" />
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
    <!-- Import Orbitron font -->
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&display=swap" rel="stylesheet">


    <style>
        /* Keyframes for animations */
        @keyframes slideInLeft {
            0% { transform: translateX(-100px); opacity: 0; }
            100% { transform: translateX(0); opacity: 1; }
        }

        @keyframes zoomIn {
            0% { transform: scale(1.2); opacity: 0.8; }
            100% { transform: scale(1); opacity: 1; }
        }

        @keyframes fadeInUp {
            0% { transform: translateY(20px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }

                    /* Styles */
            .background-container {
                background: url('assets/images/mix_copy.jpg') no-repeat center center;
                position: relative;
                width: 100%;
                height: 100dvh;
                background-size: cover;
                background-attachment: fixed; /* Fixed background for desktop */
                background-color: #0a0a2e; /* Fallback color */
            }

            /* Overlay with gradient for better text visibility */
            .background-container::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: linear-gradient(to right, rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.1)); /* Darker on left, transparent on right */
                z-index: 1;
            }
        .text-container {
            position: relative;
            z-index: 2; /* Ensure text is above overlay */
            animation: slideInLeft 1s ease-out forwards, fadeInUp 1.2s ease-out forwards;
        }

        /* Interactive elements */
        .button, a {
            animation: pulse 2s infinite ease-in-out;
            transition: transform 0.3s ease;
        }

        .button:hover, a:hover {
            animation: none;
            transform: scale(1.1);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .background-container {
                background-attachment: scroll; /* Prevent fixed background issues on mobile */
            }
        }
    </style>
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

    <div class="relative lg:h-[100dvh] w-full bg-dark-blue-bg background-container">
        <!-- Text Overlay -->
        <div class="absolute left-0 top-0 h-full flex flex-col justify-center pl-8 md:pl-16 text-white z-10 text-container">
            <h1 class="text-3xl md:text-5xl font-bold text-white" style="font-family: 'Orbitron', sans-serif;">NovaLink Computers</h1>
            <p class="text-lg md:text-xl mt-2" style="font-family: 'Orbitron', sans-serif;">Empowering Innovation with Advanced Technology</p>
        </div>
    </div>



         @include('mainSlider')

        <!-- All content -->
        <div class="w-full">
            <!-- Hero/Intro Slider Start -->
                    <!--sample video-->
                <div class="relative lg:h-[80dvh] w-full mb-">
                    <!-- Loading Indicator -->
                    <div id="loadingIndicator" class="absolute inset-0 flex items-center justify-center bg-dark-blue-bg">
                        <div class="relative w-12 h-12">
                            <div class="absolute inset-0 border-4 border-transparent border-t-white border-r-white rounded-full animate-spin"></div>
                            <div class="absolute inset-0 border-4 border-transparent border-b-white border-l-white rounded-full animate-spin-reverse"></div>
                        </div>
                    </div>

                    <style>
                        @keyframes spin-reverse {
                            to { transform: rotate(-360deg); }
                        }
                        .animate-spin-reverse {
                            animation: spin-reverse 5s linear infinite;
                        }
                    </style>
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

            <!-- Banner Area Start -->
            

            <div class="container mx-auto px-4 py-12">   
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center p-4 mb-4" style="font-family: 'Orbitron', sans-serif;">Deal of the Day - Place Your Bids!</h2>                 
                    <!-- Product Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach ($products as $product)
                            @if ($product['tags'] === 'DEAL OF THE DAYS' && \Carbon\Carbon::parse($product['deal_end'])->isFuture())
                                <div class="bg-white rounded-2xl shadow-sm overflow-hidden transition-all duration-300 hover:shadow-md">
                                    <!-- Product Image -->
                                    <div class="relative">
                                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-[200px] object-contain bg-gray-50 p-4">
                                        <span class="absolute top-3 left-3 bg-gray-900 text-white text-xs font-medium px-2 py-1 rounded">New</span>
                                    </div>
                                    <!-- Product Info -->
                                    <div class="p-4">
                                        <p class="text-sm text-gray-600 mb-1">{{ $product['type'] }}</p>
                                        <h5 class="text-base font-semibold text-gray-900 line-clamp-1 mb-2">{{ $product['name'] }}</h5>
                                        <p class="text-lg font-bold text-gray-900 mb-2">Rs {{ $product['dis_price'] }}</p>
                                        <div class="timer-container" data-end="{{ $product['deal_end'] }}">
                                            <p class="text-xs text-gray-600 mb-1">Bidding Ends in</p>
                                            <div class="flex gap-2">
                                                <div class="hours bg-black text-white px-2 py-1 rounded font-mono text-sm">0H</div>
                                                <div class="minutes bg-black text-white px-2 py-1 rounded font-mono text-sm">0M</div>
                                                <div class="seconds bg-black text-white px-2 py-1 rounded font-mono text-sm">0S</div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Actions -->
                                    <div class="p-4 pt-0 flex justify-between items-center">
                                        <a href="biddings?product-id={{ $product['id'] }}" class="bg-black text-white text-sm font-medium px-4 py-2 rounded-md hover:bg-gray-800 transition-all duration-300">
                                            Bid Now
                                        </a>
                                        <div class="flex gap-2">
                                            <button class="text-gray-600 hover:text-gray-900" title="Add to Cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart" onclick="addToCart({{ $product['id'] }});">
                                                <i class="pe-7s-cart"></i>
                                            </button>
                                            <button class="text-gray-600 hover:text-gray-900" title="Wishlist" data-bs-toggle="modal" data-bs-target="#exampleModal-Wishlist" onclick="addToWishlist({{ $product['id'] }});">
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