
<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <title>NovaLink Computers | Best Computers for you</title>
    <meta name="description" content="NovaLink Computers offer the best computers available at the market">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/n_logo_remove_new.png" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Favicon -->
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
                background: url('assets/images/fwebp-Photoroom-Picsart-AiImageEnhancer.png') no-repeat center center;
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
            <h1 class="text-3xl md:text-5xl font-bold text-white" style="font-family: 'Orbitron', sans-serif; font-size: 2.2rem;">NovaLink Computers</h1>
            <p class="text-lg md:text-xl mt-2" style="font-family: 'Orbitron', sans-serif; font-size: 1.1rem;">Empowering Innovation with Advanced Technology</p>
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


            <!-- Fashion Area Start -->
        <div class="product-area py-[200px] dark-blue-bg relative" 
            style="background:url(assets/images/3292900-gaming-laptops-banner.avif) no-repeat; background-position:center; background-size:cover; background-attachment: fixed;">
            
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black opacity-60 z-0"></div>

            <div class="container h-100 relative z-10">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 text-center">
                        <h2 class="text-2xl lg:text-5xl font-light text-white mb-2" 
                            style="font-family: 'Orbitron', sans-serif;">
                            Welcome to NovaLink – Your Gateway to Elite Tech Gear
                        </h2>
                    </div>
                </div>
            </div>
        </div>




            <!-- Product Area Start -->

            <section class="py-12 px-4 max-w-7xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-2xl font-light text-black mb-2" style="font-family: 'Orbitron', sans-serif;">Featured Products</h2>
                    <div class="w-20 h-px bg-black mx-auto"></div>
                </div>

                <div id="product-carousel" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach ($products->take(8) as $product)
                        <div class="group" 
                            data-product-id="{{ $product['id'] }}" 
                            data-product-name="{{ $product['name'] }}" 
                            data-product-image="{{ $product['image'] }}" 
                            data-product-type="{{ $product['type'] }}" 
                            data-product-desc="{{ $product['desc'] }}" 
                            data-product-price="{{ $product['dis_price'] }}">
                            <div class="relative bg-white border border-gray-200 overflow-hidden mb-3">
                                <img src="{{ $product['image'] }}" 
                                    alt="{{ $product['name'] }}" 
                                    class="w-full h-64 object-cover">
                            </div>
                            
                            <div class="space-y-2 min-h-[120px]">
                                <h3 class="text-base font-light text-black truncate">{{ $product['name'] }}</h3>
                                <p class="text-xs text-gray-600 font-light">{{ \Illuminate\Support\Str::limit($product['desc'], 50, '...') }}</p>
                                <div class="flex items-center space-x-2">
                                    <span class="text-base text-black">{{ $product['dis_price'] }}</span>
                                    @if (isset($product['ret_price']) && $product['dis_price'] !== $product['ret_price'])
                                        <span class="text-xs text-gray-400 line-through">{{ $product['ret_price'] }}</span>
                                    @endif
                                </div>
                                <div class="flex space-x-2">
                                    <button class="add-to-cart-btn w-1/2 border border-black text-black py-2 text-xs font-light hover:bg-black hover:text-white transition-all duration-200" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart" onClick="addToCart({{ $product['id'] }});">
                                        Add to Cart
                                    </button>
                                    <a href="/singleProduct?product-id={{ $product['id'] }}" class="w-1/2 border border-black text-black py-2 text-xs font-light hover:bg-black hover:text-white transition-all duration-200 text-center">
                                        View Product
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <script>
                    // Store all products in a JavaScript array
                    const allProducts = @json($products);
                    const carousel = document.getElementById('product-carousel');
                    let currentIndex = 0;
                    const productsPerPage = 8;
                    const transitionDuration = 500; // 0.5s for fade transition

                    function truncateDescription(text, limit = 40) {
                        if (text.length <= limit) return text;
                        return text.substring(0, limit - 3) + '...';
                    }

                    function renderProducts(startIndex) {
                        const productsToShow = allProducts.slice(startIndex, startIndex + productsPerPage);
                        carousel.style.opacity = 0; // Start fade out

                        setTimeout(() => {
                            carousel.innerHTML = ''; // Clear current products
                            productsToShow.forEach(product => {
                                const productCard = `
                                    <div class="group" 
                                        data-product-id="${product.id}" 
                                        data-product-name="${product.name}" 
                                        data-product-image="${product.image}" 
                                        data-product-type="${product.type}" 
                                        data-product-desc="${product.desc}" 
                                        data-product-price="${product.dis_price}">
                                        <div class="relative bg-white border border-gray-200 overflow-hidden mb-3">
                                            <img src="${product.image}" alt="${product.name}" class="w-full h-64 object-cover">
                                        </div>
                                        <div class="space-y-2 min-h-[120px]">
                                            <h3 class="text-base font-light text-black truncate">${product.name}</h3>
                                            <p class="text-xs text-gray-600 font-light">${truncateDescription(product.desc)}</p>
                                            <div class="flex items-center space-x-2">
                                                <span class="text-base text-black">${product.dis_price} LKR</span>
                                                ${product.ret_price && product.dis_price !== product.ret_price 
                                                    ? `<span class="text-xs text-gray-400 line-through">${product.ret_price} LKR</span>` 
                                                    : ''}
                                            </div>
                                            <div class="flex space-x-2">
                                                <button class="add-to-cart-btn w-1/2 border border-black text-black py-2 text-xs font-light hover:bg-black hover:text-white transition-all duration-200" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart" onClick="addToCart(${product.id});">
                                                    Add to Cart
                                                </button>
                                                <button 
                                                    onclick="window.location.href='/singleProduct?product-id=${product.id}'"
                                                    class="w-1/2 border border-black text-black py-2 text-xs font-light hover:bg-black hover:text-white transition-all duration-200 text-center">
                                                    View Product
                                                </button>

                                            </div>
                                        </div>
                                    </div>
                                `;
                                carousel.insertAdjacentHTML('beforeend', productCard);
                            });
                            carousel.style.opacity = 1; // Fade in
                        }, transitionDuration);
                    }

                    function rotateProducts() {
                        currentIndex = (currentIndex + productsPerPage) % allProducts.length;
                        renderProducts(currentIndex);
                    }

                    // Initial render
                    renderProducts(currentIndex);

                    // Rotate every 3 seconds
                    setInterval(rotateProducts, 5000);

                    // Add fade transition CSS
                    const style = document.createElement('style');
                    style.innerHTML = `
                        #product-carousel {
                            transition: opacity ${transitionDuration}ms ease-in-out;
                        }
                    `;
                    document.head.appendChild(style);
                </script>
            </section>
            

            <!-- Feature product area start -->
            <div class="feature-product-area py-[50px] bg-black relative" 
                style="background: url('assets/images/gaming.jpg') no-repeat center center / cover; background-attachment: fixed;">
                
                <!-- Dark Overlay -->
                <div class="absolute top-0 left-0 w-full h-full bg-black/70 z-[1]"></div>

                <div class="container relative z-[2]">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title text-center">
                                <h2 class="title text-white" style="font-family: 'Orbitron', sans-serif;">Special Offers</h2>
                                <p class="text-white" style="font-family: 'Orbitron', sans-serif;">Check out our latest high-performance PC combos</p>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4">
                        <!-- Package 1 -->
                        <div class="col-lg-6 d-flex">
                            <div class="feature-right-content  p-4 rounded w-100 flex flex-col md:flex-row gap-4">
                                <div class="image-side w-full md:w-1/2">
                                    <img src="assets/images/feature-image/desktop-wallpaper-3d-mobile-broken-motherboard.jpg" 
                                        alt="" 
                                        class="w-full h-full object-cover rounded">
                                </div>
                                <div class="content-side w-full md:w-1/2 flex flex-col justify-between">
                                    <div class="prize-content mb-3">
                                        <h5 class="title text-white"><a class="text-white" href="#">GAMING BEAST COMBO</a></h5>
                                        <span class="price text-white">
                                            <span class="old text-white">160,000 LKR</span>
                                            <span class="new text-white">155,000 LKR</span>
                                        </span>
                                    </div>
                                    <ul class="product-feature text-white list-disc pl-5">
                                        <li>AMD Ryzen 7 7800X3D Processor</li>
                                        <li>MSI B650 TOMAHAWK WiFi Motherboard</li>
                                        <li>Corsair Vengeance 32GB DDR5 RAM</li>
                                        <li>Samsung 980 PRO 500GB NVMe SSD</li>
                                        <li>Corsair RM750 80+ Gold Power Supply</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Package 2 -->
                        <div class="col-lg-6 d-flex">
                            <div class="feature-right-content  p-4 rounded w-100 flex flex-col md:flex-row gap-4">
                                <div class="image-side w-full md:w-1/2">
                                    <img src="assets/images/feature-image/republic-of-gamers-motherboard-red-background-logo-4k-sd-1280x2120.jpg" 
                                        alt="" 
                                        class="w-full h-full object-cover rounded">
                                </div>
                                <div class="content-side w-full md:w-1/2 flex flex-col justify-between">
                                    <div class="prize-content mb-3">
                                        <h5 class="title text-white"><a class="text-white" href="#">INTEL ULTIMATE COMBO</a></h5>
                                        <span class="price text-white">
                                            <span class="old text-white">175,000 LKR</span>
                                            <span class="new text-white">169,000 LKR</span>
                                        </span>
                                    </div>
                                    <ul class="product-feature text-white list-disc pl-5">
                                        <li>Intel Core i7 13700KF Processor</li>
                                        <li>ASUS ROG Strix Z790-F Gaming WiFi</li>
                                        <li>G.SKILL Trident Z5 RGB 32GB DDR5 RAM</li>
                                        <li>Kingston Fury Renegade 1TB NVMe SSD</li>
                                        <li>Seasonic Focus GX-750 80+ Gold PSU</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @include('categorysection')

            @include('bannersection')

             


            
            <!-- Testimonial area start -->
            <div class="blog-section py-16 bg-white">
                <div class="container mx-auto px-4">
                    <!-- Section Title -->
                    <div class="text-center mb-12">
                        <h2 class="text-3xl font-semibold text-black mb-2 flex items-center justify-center" style="font-family: 'Orbitron', sans-serif;">
                            <i class="fas fa-lightbulb mr-2"></i> Latest Insights
                        </h2>
                        <p class="text-black" style="font-family: 'Orbitron', sans-serif;">Explore our newest articles and updates</p>
                    </div>

                    <!-- Blog Posts Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        @foreach ($blogs as $blog)
                            <div class="blog-card bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition-shadow duration-300">
                                <div class="blog-image-container">
                                    <a href="{{ route('blog.show')}}">
                                        <img src="{{ $blog['image'] }}" alt="{{ $blog['title'] }}" class="w-full h-96 object-cover">
                                    </a>
                                </div>
                                <div class="p-6">
                                    <div class="flex items-center text-sm text-black mb-3">
                                        <span class="flex items-center mr-4">
                                            <i class="fas fa-calendar-alt w-4 h-4 mr-1 text-black"></i>
                                            {{ $blog['date'] }}
                                        </span>

                                    </div>
                                    <h3 class="text-xl font-semibold text-black mb-2 hover:text-blue-600 transition-colors flex items-center">
                                        <a class="text-black" href="{{ route('blog.show')}}" style="font-family: 'Orbitron', sans-serif; font-size: 20px;">{{ $blog['title'] }}</a>
                                    </h3>
                                    <p class="text-black mb-4" >{{ $blog['description'] }}</p>
                                    <a href="{{ route('blog.show')}}" class="inline-flex items-center text-black hover:text-blue-800 font-medium transition-colors" style="font-family: 'Orbitron', sans-serif; font-size: 14px;">
                                        Read more
                                        <i class="fas fa-arrow-right w-4 h-4 ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        
                        @if($blogs->isEmpty())
                            <div class="col-span-full text-center py-12">
                                <p class="text-black">No articles available at this time.</p>
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