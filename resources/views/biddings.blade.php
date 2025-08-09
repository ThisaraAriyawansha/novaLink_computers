
<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <!-- Favicon -->
    <title>NovaLink Computers | Best Computers for you</title>
    <meta name="description" content="NovaLink Computers offer the best computers available at the market">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/n_logo_remove_new.png" />    <!-- Favicon -->

    <!-- CSS
    ============================================ -->
    <script src="assets/js/tailwind-cdn.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/font.awesome.css" />
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/venobox.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>

<style>
    .initials-avatar {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: #007bff; /* Bootstrap primary color; can be randomized */
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    font-weight: bold;
    text-transform: uppercase;
    margin-right: 15px;
}
</style>

<style>



        .product-container {
    max-width: 1000px;
    margin: 0 auto;
    background: rgba(255, 255, 255, 0.98);
    border-radius: 16px;
    overflow: hidden;
    animation: slideUp 0.6s ease-out;
}

@keyframes slideUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

.product-header {
    padding: 12px;
    color: white;
    position: relative;
    overflow: hidden;
}

.product-header::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -50%;
    width: 100%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, transparent 70%);
    animation: rotate 25s linear infinite;
}

@keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
}

.product-title {
    font-size: 1.3rem;
    font-weight: 200;
    margin-bottom: 0.2rem;
    position: relative;
    z-index: 2;
}

.product-price {
    font-size: 1.3rem;
    font-weight: 100;
    color: #ffd700;
    margin-bottom: 1.5rem;
    position: relative;
    z-index: 2;
}

.product-content {
    padding: 0;
}

.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1px;
    background: #f1f3f5;
    margin-bottom: 1.5rem;
}

.feature-item {
    background: white;
    padding: 16px;
    display: flex;
    align-items: center;
    transition: all 0.2s ease;
    position: relative;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}

.feature-item::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 3px;
    height: 100%;
    background: linear-gradient(135deg, #2c2c3e 0%, #3f3f5e 100%);
    transform: scaleY(0);
    transition: transform 0.2s ease;
}

.feature-item:hover::before {
    transform: scaleY(1);
}

.feature-item:hover {
    transform: translateX(4px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}

.feature-label {
    font-weight: 500;
    color: #374151;
    margin-right: 0.8rem;
    min-width: 80px;
    font-size: 0.9rem;
}

.feature-value {
    color: #6b7280;
    flex-grow: 1;
    font-size: 0.9rem;
}

.action-buttons {
    padding: 24px;
    background: #f9fafb;
    display: flex;
    gap: 0.8rem;
    flex-wrap: wrap;
    align-items: center;
}

.btn-primaryy {
    background: linear-gradient(135deg, #2c2c3e 0%, #3f3f5e 100%);
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    font-size: 0.9rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
    position: relative;
    overflow: hidden;
}

.btn-primaryy::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.4s ease;
}

.btn-primaryy:hover::before {
    left: 100%;
}

.btn-primaryy:hover {
    transform: translateY(-1px);
}

.btn-secondary {
    background: white;
    color: #000000ff;
    border: 1px solid #000000ff;
    padding: 8px 16px;
    border-radius: 8px;
    font-size: 0.9rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s ease;
}

.btn-secondary:hover {
    background: #75777dff;
    color: white;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(102, 126, 234, 0.2);
}

.wishlist-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: white;
    border: 1px solid #e5e7eb;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s ease;
    margin-left: auto;
}

.wishlist-btn:hover {
    background: #fef2f2;
    border-color: #f87171;
    color: #f87171;
    transform: scale(1.05);
}

.tabs-section {
    background: white;
}

.tabs-nav {
    display: flex;
    border-bottom: 1px solid #e5e7eb;
    background: #f9fafb;
}

.tab-btn {
    flex: 1;
    padding: 12px;
    background: none;
    border: none;
    font-size: 0.9rem;
    font-weight: 500;
    color: #6b7280;
    cursor: pointer;
    transition: all 0.2s ease;
    position: relative;
}

.tab-btn.active {
    color: #667eea;
    background: white;
}

.tab-btn.active::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    width: 40px;
    height: 2px;
    background: linear-gradient(135deg, #2c2c3e 0%, #3f3f5e 100%);
    border-radius: 1px;
}

.tab-btn:hover:not(.active) {
    color: #374151;
    background: #f3f4f6;
}

.tab-content {
    padding: 24px;
    min-height: 200px;
}

.tab-panel {
    display: none;
    animation: fadeIn 0.4s ease-in-out;
}

.tab-panel.active {
    display: block;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 1.5rem;
}

.info-item {
    padding: 1rem;
    background: #f9fafb;
    border-radius: 8px;
    border-left: 3px solid #000000ff;
}

.info-label {
    font-weight: 500;
    color: #374151;
    margin-bottom: 0.4rem;
    font-size: 0.9rem;
}

.info-value {
    color: #6b7280;
    font-size: 0.9rem;
}

.description-text {
    font-size: 0.9rem;
    line-height: 1.6;
    color: #374151;
    text-align: justify;
}

.review-form {
    background: #f9fafb;
    padding: 1.5rem;
    border-radius: 12px;
    margin-top: 1.5rem;
}

.form-group {
    margin-bottom: 1rem;
}

.form-label {
    display: block;
    margin-bottom: 0.4rem;
    font-weight: 500;
    color: #374151;
    font-size: 0.9rem;
}

.form-input, .form-textarea, .form-select {
    width: 100%;
    padding: 8px 12px;
    border: 1px solid #e5e7eb;
    border-radius: 6px;
    font-size: 0.9rem;
    transition: border-color 0.2s ease;
}

.form-input:focus, .form-textarea:focus, .form-select:focus {
    outline: none;
    border-color: #667eea;
    box-shadow: 0 0 0 2px rgba(102, 126, 234, 0.1);
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0.8rem;
}

@media (max-width: 768px) {
    .product-title {
        font-size: 1.5rem;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
    }
    
    .action-buttons {
        flex-direction: column;
        align-items: stretch;
    }
    
    .wishlist-btn {
        margin: 0;
        align-self: center;
    }
    
    .form-row {
        grid-template-columns: 1fr;
    }
}
    </style>

<body>
    <div class="main-wrapper">
    @include('layouts.nav-2')

        <div class="h-[10dvh]"></div>

        <nav style="display: flex; align-items: center; padding: 16px 24px;    max-width: 1200px; margin: 10px auto;" aria-label="Breadcrumb">
            <ol style="display: inline-flex; align-items: center; margin: 0; padding: 0; list-style: none; flex-wrap: wrap;">
                <li style="display: inline-flex; align-items: center;">
                    <a href="/home" style="display: inline-flex; align-items: center; font-size: 14px; font-family: 'Orbitron', sans-serif; font-weight: 500; color: #4b5563; text-decoration: none; transition: color 0.3s ease, transform 0.2s ease; padding: 6px 10px; border-radius: 6px;">
                        <svg style="width: 18px; height: 18px; margin-right: 8px; fill: none; stroke: #6b7280; stroke-width: 2;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Home
                    </a>
                </li>
                <li style="display: flex; align-items: center; margin: 0 6px;">
                    <svg style="width: 16px; height: 16px; color: #9ca3af; fill: none; stroke: currentColor; stroke-width: 2;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <a href="/products" style="margin-left: 8px; font-size: 14px; font-weight: 500; color: #4b5563; text-decoration: none; transition: color 0.3s ease, transform 0.2s ease; padding: 6px 10px; border-radius: 6px; font-family: 'Orbitron', sans-serif;">Products</a>
                </li>
                <li style="display: flex; align-items: center; margin: 0 6px;" aria-current="page">
                    <svg style="width: 16px; height: 16px; color: #9ca3af; fill: none; stroke: currentColor; stroke-width: 2;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span style="margin-left: 8px; font-size: 14px; font-weight: 600; color: #374151; padding: 6px 10px; border-radius: 6px; font-family: 'Orbitron', sans-serif;"><?php echo htmlspecialchars($product['name']); ?></span>
                </li>
            </ol>
        </nav>


        <!-- Product Details Area Start -->
        <div class="product-details-area pb-100px ">
            <div class="container">
                <div class="row">
                <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">

                        <!-- Swiper -->
                        <!-- Main Slider -->
<div class="swiper-container zoom-top">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <img class="img-responsive m-auto" src="<?php echo $product['image'] ?>" alt="">
            <a class="venobox full-preview" data-gall="myGallery" href="<?php echo $product['image'] ?>">
                <i class="fa fa-arrows-alt" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</div>

<!-- Thumbnail Slider -->
<div class="swiper-container mt-20px zoom-thumbs slider-nav-style-1 small-nav">
    <div class="swiper-wrapper" id="small-slider-wrapper">
        <!-- Images will be dynamically inserted here -->
    </div>
    <div class="swiper-buttons">
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get('product-id');

    if (productId) {
        fetch(`/api/product-images/singlepage/${productId}`)
            .then(response => {
                if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
                return response.json();
            })
            .then(images => {
                if (!images || images.length === 0) {
                    console.warn('No images found for product ID:', productId);
                    return;
                }

                const sliderWrapper = document.getElementById('small-slider-wrapper');
                sliderWrapper.innerHTML = '';

                images.forEach(image => {
                    if (!image.image_path) {
                        console.error('Missing image_path:', image);
                        return;
                    }
                    const slideDiv = document.createElement('div');
                    slideDiv.className = 'swiper-slide';
                    slideDiv.innerHTML = `<img class="img-responsive m-auto" src="${image.image_path}" alt="Product Image">`;
                    sliderWrapper.appendChild(slideDiv);
                });

                // Initialize Swiper
                const thumbsSwiper = new Swiper('.zoom-thumbs', {
                    slidesPerView: 4,
                    spaceBetween: 10,
                    watchSlidesProgress: true,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    breakpoints: {
                        768: {
                            slidesPerView: 5,
                        },
                    },
                });

                const mainSwiper = new Swiper('.zoom-top', {
                    slidesPerView: 1,
                    spaceBetween: 0,
                    thumbs: {
                        swiper: thumbsSwiper,
                    },
                });
            })
            .catch(error => {
                console.error('Error fetching product images:', error);
            });
    } else {
        console.error('No product ID found in URL');
    }
});
</script>

<style>
.zoom-thumbs .swiper-slide img {
    width: 80px;
    height: 80px;
    object-fit: cover;
}
.zoom-thumbs .swiper-slide {
    text-align: center;
}
.zoom-thumbs {
    max-width: 100%;
}
</style>


<div class="container mx-auto px-3 py-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4">
    
        <!-- Reviews Section -->
        <div class="bg-white text-black rounded-lg p-4 w-full">
            <h3 class="text-lg font-semibold mb-3" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;">Reviews</h3>
            <div class="review-wrapper space-y-3">
                <!-- Reviews will be appended here -->
            </div>
        </div>

    </div>
</div>
                    </div>
                    <!-- prod data -->
                    <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                        
                    <div class="product-container">
                            <!-- Product Header -->
                            <div class="product-header ">
                                <h1 class="product-title" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: black;">Product Features :</h1>
                            </div>

                            <!-- Product Content -->
                            <div class="product-content">
                                <!-- Features Grid -->


                                <div class="features-grid">
                                    @if (!empty($product['features']))
                                        @foreach ($product['features'] as $feature)
                                            @php
                                                [$featureName, $featureValue] = explode(':', $feature, 2);
                                            @endphp
                                            <div class="feature-item">
                                                <span class="feature-label" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: black;" >{{ trim($featureName) }}:</span>
                                                <span class="feature-value" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: black;">{{ trim($featureValue) }}</span>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                            <div class="flex flex-col pt-0 gap-1">
                                <hr>
                                <p class="m-0" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: black;">Bid End Date: {{ \Carbon\Carbon::parse($product['deal_end'])->format('Y-m-d h:i:s A') }}</p>
                                <p class="m-0" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: black;">Time Remaining:</p>
                                <div>
                                    <p class="text-xl flex items-center gap-2 max-md:flex-wrap m-0 timer-container"
                                    data-end="{{ \Carbon\Carbon::parse($product['deal_end'])->toIso8601String() }}">

                                        <i class='pe-7s-timer text-red-600'></i>

                                        <span style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: #ff0404ff;" class="days"></span>
                                        <span style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: #ff0404ff;" class="hours"></span>
                                        <span style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: #ff0404ff;" class="minutes"></span>
                                        <span style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: #ff0404ff;" class="seconds"></span>
                                    </p>
                                </div>


                                <hr>
                                <div class="auction-container">
                                <form method="POST" action="{{ route('place.bid') }}">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product['id'] }}">

                                        <!-- Display Success Message -->
                                        @if (session('success'))
                                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        <!-- Display Error Message -->
                                        @if (session('error'))
                                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                                                {{ session('error') }}
                                            </div>
                                        @endif

                                        <span class="m-0 flex justify-between font-semibold" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: black;">
                                            Current Bid:
                                            <p class="m-0 bid-count" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: black;">{{ count($bids) }} Bids</p>
                                        </span>

                                        <ul class="" >
                                            @foreach($bids as $bid)
                                                <li style="ffont-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: black;">Rs. {{ number_format($bid->bid_amount, 2) }}</li>
                                            @endforeach
                                        </ul>

                                        <hr>

                                        <!-- Input + Button Row -->
                                        <div class="flex items-center gap-3 mt-3">
                                            <input type="number" step="0.01" name="bid_amount" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: black;"
                                                class="border p-2 w-full max-w-[75%] rounded"
                                                placeholder="Enter bid amount" required>
                                            <button class="btn-primaryy" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: white;">
                                                Place Bid
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div><br/>

                                <!-- Action Buttons -->
                                <div class="action-buttons">
                                    <button class="btn-primaryy" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: white;" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart" onClick="addToCart({{ $product['id'] }});">
                                        Add to Cart
                                    </button>
                                    <button class="btn-secondary" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: black;" onclick="window.location='{{ route('cart') }}'">
                                        Buy Now
                                    </button>

                                    <button class="wishlist-btn" data-bs-toggle="modal" data-bs-target="#exampleModal-Wishlist" onclick="addToWishlist({{ $product['id'] }});">
                                        ♡
                                    </button>
                                </div>

                                <!-- Tabs Section -->
                                <div class="tabs-section">
                                    <div class="tabs-nav">
                                        <button class="tab-btn active" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: black;"  onclick="showTab('information')">Information</button>
                                        <button class="tab-btn" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: black;" onclick="showTab('description')">Description</button>
                                        <button class="tab-btn" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: black;" onclick="showTab('reviews')">Reviews</button>
                                    </div>

                                    <div class="tab-content">
                                        <!-- Information Tab -->
                                        <div id="information" class="tab-panel active">
                                                <div class="product-header ">
                                                    <h1 class="product-title" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: black;"><?php echo htmlspecialchars($product['name']); ?></h1>
                                                    <div class="product-price" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: black;">Rs. <?php echo $product['dis_price'] ?></div>
                                                </div>
                                            <div class="info-grid">
                                                <div class="info-item">
                                                    <div class="info-label" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;">Brand</div>
                                                    <div class="info-value" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;"><?php echo $product['brand'] ?></div>
                                                </div>
                                                <div class="info-item">
                                                    <div class="info-label" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;">Product Type</div>
                                                    <div class="info-value" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;"><?php echo $product['type'] ?></div>
                                                </div>
                                                <div class="info-item">
                                                    <div class="info-label" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;">Warranty</div>
                                                    <div class="info-value" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;"><?php echo $product['warranty'] ?></div>
                                                </div>
                                                <div class="info-item">
                                                    <div class="info-label" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;">Availability</div>
                                                    <div class="info-value" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;"><?php echo $product['in_stock'] ?></div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Description Tab -->
                                        <div id="description" class="tab-panel">
                                            <p class="description-text" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;">
                                                <?php echo $product['desc'] ?>
                                            </p>
                                        </div>

                                        <!-- Reviews Tab -->
                                        <div id="reviews" class="tab-panel">

                                            <div class="review-form">
                                            <input type="hidden" id="product-id" value="<?php echo $product['id']; ?>">
                                                <h3 style="margin-bottom: 1.5rem; color: #374151; font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;">Add a Review</h3>
                                                <form id="review-form">
                                                     @csrf

                                                    <div class="form-group">
                                                        <label class="form-label" style="font-family: 'Orbitron', sans-serif;">Your Rating:</label>
                                                        <select class="form-select" id="rating" name="rating" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;" required>
                                                            <option value="" >Select Rating</option>
                                                            <option value="5" >⭐⭐⭐⭐⭐</option>
                                                            <option value="4" >⭐⭐⭐⭐</option>
                                                            <option value="3">⭐⭐⭐</option>
                                                            <option value="2">⭐⭐</option>
                                                            <option value="1">⭐</option>
                                                        </select>
                                                    </div>
                                                    
                                                    <div class="form-row">
                                                        <div class="form-group">
                                                            <label class="form-label" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;">Name:</label>
                                                            <input type="text" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;" class="form-input" id="name" name="name" placeholder="Your name" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;">Email:</label>
                                                            <input type="email" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;" class="form-input" id="email" name="email" placeholder="your@email.com" required>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                        <label class="form-label">Review:</label>
                                                        <textarea class="form-textarea" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;" id="message" name="message" rows="4" placeholder="Share your experience..." required></textarea>
                                                    </div>
                                                    
                                                    <button type="submit" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;" class="btn-primary bg-black text-white">Submit Review</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- Product Area Start -->
        
        <!-- Footer Area Start -->
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

    <!-- Minify Version -->
    <!-- <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/plugins.min.js"></script>
    <script src="assets/js/main.min.js"></script> -->

    <!--Main JS (Common Activation Codes)-->
    <script src="assets/js/main.js"></script>
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
        if (text && text.length > maxLength) {
            return text.substring(0, maxLength) + '...';
        }
        return text || '';
    }

    quickViewButtons.forEach(button => {
        button.addEventListener('click', function () {
            // Extract product details from data attributes
            const productId = button.getAttribute('data-product-id');
            const productName = button.getAttribute('data-product-name');
            const productImage = button.getAttribute('data-product-image');
            const productType = button.getAttribute('data-product-type');
            const productDescription = button.getAttribute('data-product-distription');
            const productPrice = button.getAttribute('data-product-price');

            // Truncate product name and description
            const maxNameLength = 50;
            const maxDescriptionLength = 150;
            const truncatedName = truncateText(productName, maxNameLength);
            const truncatedDescription = truncateText(productDescription, maxDescriptionLength);

            // Update the modal content
            const modal = document.getElementById('exampleModal');
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

            // Update the product description
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


<script>
document.addEventListener('DOMContentLoaded', async function () {
    // Get the product ID from the URL query string
    const urlParams = new URLSearchParams(window.location.search);
    const productId = urlParams.get('product-id'); // Retrieve product-id from the query string

    if (productId) {
        console.log("Product ID:", productId);  // Debugging: Log product ID

        // Corrected API URL format
        const apiUrl = `/api/product-images/singlepage/${productId}`;

        try {
            const response = await fetch(apiUrl);
            const data = await response.json(); // Assuming the API returns an array of image objects

            if (Array.isArray(data) && data.length > 0) {
                addAdditionalImages(data); // Pass the correct data format (an array of image objects)
            } else {
                console.error("No images found for this product.");
            }
        } catch (error) {
            console.error("Error fetching product images:", error);
        }
    } else {
        console.error("Product ID not found in the URL.");
    }
});

// Function to add additional images dynamically
function addAdditionalImages(images) {
    const swiperWrapper = document.querySelector('.swiper-container.zoom-top .swiper-wrapper');

    // Iterate over the images array
    images.forEach(image => {
        const imageSrc = image.image_path; // Assuming 'image_path' holds the image URL

        // Check if image path exists
        if (imageSrc) {
            const newSlide = document.createElement('div');
            newSlide.className = 'swiper-slide hidden';
            newSlide.innerHTML = `
                <img class="img-responsive m-auto" src="${imageSrc}" alt="Product Image">
                <a class="venobox full-preview" data-gall="myGallery" href="${imageSrc}">
                    <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                </a>
            `;
            swiperWrapper.appendChild(newSlide);
        }
    });

    // Reinitialize Swiper
    initializeSwiper();
}

// Function to initialize or reinitialize Swiper
function initializeSwiper() {
    if (window.swiperTopZoom) {
        window.swiperTopZoom.destroy(true, true);
    }

    window.swiperTopZoom = new Swiper('.swiper-container.zoom-top', {
        loop: false,
        spaceBetween: 10,
        slidesPerView: 1,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: window.swiperThumbsZoom || null
        }
    });

    if (typeof $.fn.venobox === 'function') {
        $('.venobox').venobox();
    }
}
</script>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const timers = document.querySelectorAll('.timer-container');

    timers.forEach(timer => {
        const endTime = new Date(timer.getAttribute('data-end')).getTime();

        function updateTimer() {
            const now = new Date().getTime();
            const distance = endTime - now;

            if (distance < 0) {
                timer.querySelector('.days').textContent = '0 Days';
                timer.querySelector('.hours').textContent = '0 Hours';
                timer.querySelector('.minutes').textContent = '0 Minutes';
                timer.querySelector('.seconds').textContent = '0 Seconds';
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            timer.querySelector('.days').textContent = `${days} Days`;
            timer.querySelector('.hours').textContent = `${hours} Hours`;
            timer.querySelector('.minutes').textContent = `${minutes} Minutes`;
            timer.querySelector('.seconds').textContent = `${seconds} Seconds`;
        }

        updateTimer();
        setInterval(updateTimer, 1000);
    });
});
</script>


<script>
   $(document).ready(function () {
    const productId = $('#product-id').val(); // Assume a hidden input with product_id

    // Fetch reviews on page load
    fetchReviews(productId);

    // Handle form submission
    $('#review-form').on('submit', function (e) {
        e.preventDefault();

        const formData = {
            product_id: productId,
            name: $('#name').val(),
            email: $('#email').val(),
            rating: $('#rating').val(),
            message: $('#message').val(),
            _token: $('input[name="_token"]').val(),
        };

        $.ajax({
            url: '/reviews',
            method: 'POST',
            data: formData,
            success: function (response) {
                if (response.success) {
                    $('#review-form')[0].reset();
                    fetchReviews(productId); // Refresh reviews
                }
            },
            error: function (xhr) {
                const errors = xhr.responseJSON.errors;
                let errorMessage = 'Please fix the following errors:\n';
                for (let key in errors) {
                    errorMessage += `- ${errors[key][0]}\n`;
                }
                alert(errorMessage);
            },
        });
    });

    // Function to fetch and display reviews
    // Function to fetch and display reviews
function fetchReviews(productId) {
    $.ajax({
        url: `/reviews/${productId}`,
        method: 'GET',
        success: function (response) {
            if (response.success) {
                const reviews = response.reviews;
                const reviewContainer = $('.review-wrapper');
                reviewContainer.empty(); // Clear existing reviews

                reviews.forEach(review => {
                    const stars = '<i class="fa fa-star"></i>'.repeat(review.rating);
                    // Get first letter of the name
                    const firstLetter = review.name.charAt(0).toUpperCase();
                    // Generate random background color based on name
                    const colors = ['#007bff', '#28a745', '#dc3545', '#ffc107', '#17a2b8'];
                    const colorIndex = review.name.length % colors.length; // Simple hash
                    const bgColor = colors[colorIndex];

                    const reviewHtml = `
                        <div class="single-review bg-white rounded-md shadow-sm p-2 flex gap-2 hover:shadow-md transition-shadow duration-200 max-w-lg mx-auto">
                            <div class="review-img flex-shrink-0">
                                <div class="initials-avatar text-white font-medium text-sm rounded-full flex items-center justify-center w-8 h-8" style="background-color: ${bgColor};">
                                    ${firstLetter}
                                </div>
                            </div>
                            <div class="review-content flex-1">
                                <div class="review-top-wrap flex justify-between items-center flex-wrap gap-1">
                                        <h4 class="text-gray-800 font-small m-0" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; font-size: 14px;">${review.name}</h4>
                                    <div class="rating-product flex items-center gap-0.5">
                                        ${stars}
                                    </div>
                                </div>
                                <div class="review-bottom mt-1">
                                    <p class="text-gray-600 text-[0.65rem] text-justify m-0" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;">${review.message}</p>
                                </div>
                            </div>
                        </div>
                    `;
                    reviewContainer.append(reviewHtml);
                });
            }
        },
        error: function () {
            alert('Failed to load reviews.');
        },
    });
}
});
</script>


<script>
        function showTab(tabName) {
            // Hide all tab panels
            const panels = document.querySelectorAll('.tab-panel');
            panels.forEach(panel => panel.classList.remove('active'));
            
            // Remove active class from all tab buttons
            const buttons = document.querySelectorAll('.tab-btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            
            // Show selected tab panel
            document.getElementById(tabName).classList.add('active');
            
            // Add active class to clicked button
            event.target.classList.add('active');
        }





        // Add scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.addEventListener('DOMContentLoaded', () => {
            const animateElements = document.querySelectorAll('.feature-item, .info-item');
            animateElements.forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(el);
            });
        });
    </script>