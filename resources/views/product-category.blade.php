
<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <title>NovaLink Computers | Best Computers for you</title>
    <meta name="description" content="NovaLink Computers offer the best computers available at the market">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/N_back.jpg" />    <!-- Favicon -->
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

    <style>
    input[type=range] {
        -webkit-appearance: none;
        width: 100%;
        height: 8px;
        background: #000;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    
    input[type=range]::-webkit-slider-thumb {
        -webkit-appearance: none;
        width: 20px;
        height: 20px;
        background: #fff;
        border-radius: 50%;
        cursor: pointer;
    }
</style>
</head>

<body>
    <div class="main-wrapper">
    @include('layouts.nav-2')

        <!-- breadcrumb-area start -->
        <div id="breadcrumb-carousel" class="relative carousel slide " data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#breadcrumb-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#breadcrumb-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#breadcrumb-carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner absolute md:h-[406px] max-md:h-[50dvh]">
                <div class="carousel-item active h-full">
                    <img src="assets/images/banner/gaming_1.jpg" class="d-block w-100 h-full object-cover" alt="...">
                </div>
                <div class="carousel-item h-full">
                    <img src="assets/images/breadcrumb/banner.jpg" class="d-block w-100 h-full object-cover" alt="...">
                </div>
                <div class="carousel-item h-full">
                    <img src="assets/images/banner/gaming_5.jpg" class="d-block w-100 h-full object-cover" alt="...">
                </div>
            </div>
            <div class="bg-black/50 absolute left-0 top-0 w-full h-full"></div>
            <div class="absolute top-[40%] left-0 w-full z-10 mt-0 pt-0">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center relative">
                        <h1 class="text-white font-bold uppercase">
                        <?php
                            // Check if the 'search' parameter is set in the URL and if it equals "gaming"
                            if (isset($_GET['search']) && $_GET['search'] === 'gaming') {
                                echo "GAMING";
                            } elseif (isset($searchQuery)) {
                                // If a search query is present but not "gaming", show the search query
                                $string = (strlen($searchQuery) > 13) ? substr($searchQuery, 0, 30) . '...' : $searchQuery;
                                echo $string;
                            } elseif ($filter != "ALL") {
                                // Handle filter case
                                $string = (strlen($filter) > 13) ? substr($filter, 0, 30) . '...' : $filter;
                                echo $string;
                            } else {
                                // Default text if neither search nor filter is set
                                echo "Product Page";
                            }
                            ?>


                        </h1>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list hidden">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item active text-white">Shop</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Shop Page Start  -->
        <div class="shop-category-area relative" >
            <div class="flex p-6 gap-6 max-lg:flex-col relative z-10">


                <!--filter controls-->
            <form class="bg-gray-100 p-2 rounded-md lg:w-1/5" method="GET" action="{{ route('product.category') }}">
                <!-- Preserve existing filter and sort parameters -->
                <input type="hidden" name="filter" value="<?php echo htmlspecialchars($_GET['filter'] ?? 'ALL'); ?>">
                <input type="hidden" name="sort" value="<?php echo htmlspecialchars($_GET['sort'] ?? ''); ?>">
                <input type="hidden" name="brand" value="<?php echo htmlspecialchars($_GET['brand'] ?? ''); ?>">

                <!-- Toggle Button -->
                <button type="button" onclick="document.getElementById('expandable').classList.toggle('h-8'); document.getElementById('expandable').classList.toggle('h-fit');" class="lg:hidden absolute right-4 top-2 p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                    </svg>
                </button>

                <div id="expandable" class="h-fit transition-[height] duration-300 ease-in-out overflow-hidden">
                    <h3 class="text-base font-medium mb-2 text-black" style="font-family: 'Orbitron', sans-serif;">Filters</h3>

                    <!-- Price Range Filter -->
                    <div class="mb-3">
                        <h5 class="text-sm font-medium mb-1 text-black" style="font-family: 'Orbitron', sans-serif;">Price Range</h5>
                        <div class="flex flex-col space-y-1">
                            <span class="text-xs text-black" style="font-family: 'Orbitron', sans-serif;">Min: Rs. <span id="minPrice" style="font-family: 'Orbitron', sans-serif;"><?php echo htmlspecialchars($_GET['price_min'] ?? '0'); ?></span></span>
                            <input type="range" name="price_min" min="0" max="2000000" step="1000" value="<?php echo htmlspecialchars($_GET['price_min'] ?? '0'); ?>" class="w-full" oninput="document.getElementById('minPrice').textContent = this.value">
                            <span class="text-xs text-black" style="font-family: 'Orbitron', sans-serif;">Max: Rs. <span id="maxPrice" style="font-family: 'Orbitron', sans-serif;"><?php echo htmlspecialchars($_GET['price_max'] ?? '2000000'); ?></span></span>
                            <input type="range" name="price_max" min="0" max="2000000" step="1000" value="<?php echo htmlspecialchars($_GET['price_max'] ?? '2000000'); ?>" class="w-full" style="background-color: #000000;" oninput="document.getElementById('maxPrice').textContent = this.value">
                        </div>
                    </div>

                    <!-- Warranty Filter -->
                    <div class="mb-3">
                        <h5 class="text-sm font-medium mb-1 text-black" style="font-family: 'Orbitron', sans-serif;">Warranty</h5>
                        <div class="">
                            @foreach(['all' => 'All', '1 year Warranty' => '1 Year', '2 year Warranty' => '2 Year', '3 year Warranty' => '3 Year', '1 months warranty' => '1 Month', '3 months warranty' => '3 Month', '6 months warranty' => '6 Month'] as $value => $label)
                                <label class="flex items-center space-x-1">
                                    <input type="radio" name="warranty" value="{{ $value }}" {{ ($warranty ?? 'all') === $value ? 'checked' : '' }} style="width: 12px; height: 12px; accent-color: #000000; cursor: pointer;">
                                    <span class="text-xs text-black" style="font-family: 'Orbitron', sans-serif;">{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Stock Status Filter -->
                    <div class="mb-3">
                        <h5 class="text-sm font-medium mb-1 text-black" style="font-family: 'Orbitron', sans-serif;">Stock Status</h5>
                        <div class="space-y-1">
                            @foreach(['ALL' => 'All', 'In Stock' => 'In Stock', 'Out of Stock' => 'Out of Stock', 'Used' => 'Used'] as $value => $label)
                                <label class="flex items-center space-x-1">
                                    <input type="radio" name="stock" value="{{ $value }}" {{ ($stock ?? 'ALL') === $value ? 'checked' : '' }} style="width: 12px; height: 12px; accent-color: #000000; cursor: pointer;">
                                    <span class="text-xs text-black" style="font-family: 'Orbitron', sans-serif;">{{ $label }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Dynamic Product Features Filter -->
                    @if(isset($productFeatures) && $productFeatures->isNotEmpty())
                        @foreach($productFeatures as $featureName => $values)
                            <div class="mb-3">
                                <h5 class="text-sm font-medium mb-1 text-black" style="font-family: 'Orbitron', sans-serif;">{{ ucwords(str_replace('_', ' ', $featureName)) }}</h5>
                                <div class="space-y-1 flex flex-col">
                                    @foreach($values as $value)
                                        <label class="flex items-center space-x-1">
                                            <input type="checkbox" name="features[{{ $featureName }}][]" value="{{ $value }}" {{ in_array($value, request()->input("features.$featureName", [])) ? 'checked' : '' }} style="width: 12px; height: 12px; accent-color: black;">
                                            <span class="text-xs text-black" style="font-family: 'Orbitron', sans-serif;">{{ $value }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <!-- Apply Filters Button -->
                    <button type="submit" class="w-full py-1 px-3 rounded-md text-xs" style="background-color: #000000; color: #ffffff; font-family: 'Orbitron', sans-serif;">
                        Apply
                    </button>
                </div>
            </form>




                <!--product cards-->
                <div class="row <?= $filter !== "ALL" ? "lg:w-4/5" : "lg:w-4/5" ?>">
                    <div class="col-md-12">
                        <!-- Shop Top Area Start -->
                        <div class="shop-top-bar flex max-md:flex-col max-md:justify-center gap-3">
                            <p class="compare-product max-md:w-full"> <span><?php echo count($products) ?></span> Product Found</p>
                            <form action="" onsubmit="event.preventDefault(); searchProduct(this.search.value);" style="position: relative;">
                                <input type="text" name="search" style="width: fit-content; border-radius: 4px; border: 2px solid #e1e1e1;" placeholder="Search for product">
                                <button type="submit" style="position: absolute; top: 0%; right: 0%; height: 100%; padding: 0px 8px; margin: 0px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>
                            </form>
                            <div class="flex gap-3 max-md:flex-col items-center">
                                <!-- Right Side Start -->
                                <div class="select-shoing-wrap flex items-center bg-white">
                                    <div class="shot-product">
                                        <p class="text-nowrap">Sort By:</p>
                                    </div>
                                    <!-- Single Wedge End -->
                                    <div class="header-bottom-set dropdown" style="padding-right: 15px;">
                                        <button class="dropdown-toggle header-action-btn" data-bs-toggle="dropdown">
                                            <?php
                                            switch ($_GET['sort']) {
                                                case "name_asc":
                                                    echo "Name, A to Z";
                                                    break;
                                                case "name_desc":
                                                    echo "Name, Z to A";
                                                    break;
                                                case "price_asc":
                                                    echo "Price, low to high";
                                                    break;
                                                case "price_desc":
                                                    echo "Price, high to low";
                                                    break;
                                            }
                                            ?> <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            <li><a class="dropdown-item" href="<?php echo "?filter=", $filter, "&sort=name_asc" ?>">Name, A to Z</a></li>
                                            <li><a class="dropdown-item" href="<?php echo "?filter=", $filter, "&sort=name_desc" ?>">Name, Z to A</a></li>
                                            <li><a class="dropdown-item" href="<?php echo "?filter=", $filter, "&sort=price_asc" ?>">Price, low to high</a></li>
                                            <li><a class="dropdown-item" href="<?php echo "?filter=", $filter, "&sort=price_desc" ?>">Price, high to low</a></li>
                                        </ul>
                                    </div>
                                    <!-- Single Wedge Start -->
                                </div>
                                <!-- list view / grid view buttons -->
                                <div class="shop-tab nav items-center justify-center gap-3">
                                    <button class="active" data-bs-target="#shop-grid" data-bs-toggle="tab">
                                        <i class="fa fa-th" aria-hidden="true"></i>
                                    </button>
                                    <button data-bs-target="#shop-list" data-bs-toggle="tab" style="margin: 0px;">
                                        <i class="fa fa-list" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- Right Side End -->
                        </div>
                        <!-- Shop Bottom Area Start -->
                        <div class="shop-bottom-area">
                            <!-- Tab Content Area Start -->
                            <div class="row">
                                <div class="col">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="shop-grid">
                                            <div class="row mb-n-30px">
                                                @foreach ($products as $product)
                                                    <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px bg-transparent">
                                                        <!-- Single Product -->
                                                        <div class="product bg-white">
                                                            <span class="badges">
                                                                <span class="sale">Sale</span>
                                                                @if ($product['tags'][0] == "New Arrivals")
                                                                    <span class="new">New</span>
                                                                @endif
                                                            </span>

                                                                    <span class='badges'>
                                                                        @if(isset($product['tags'][0]) && $product['tags'] == "New Arrivals")
                                                                            <span class='new w-fit border-1 border-black text-white'>New</span>
                                                                        @endif
                                                                    </span>

                                                            <div class="thumb">
                                                                <a href="{{ route('singleProduct', ['product-id' => $product['id']]) }}" class="image">
                                                                    <img src="{{ $product['image'] }}" class="aspect-square object-contain object-center" alt="Product" />
                                                                    <img class="hover-image" src="{{ $product['image'] }}" alt="Product" />
                                                                </a>
                                                            </div>
                                                            <div class="content bg-transparent">
                                                                <div class='flex w-full justify-end px-2 mb-3'>
                                                                <span class='font-bold w-fit p-1 rounded-md text-xs bg-white text-black border-1 border-black'>
                                                                    <a href="#" class="text-black">{{ $product['in_stock'] }}</a>
                                                                </span>

                                                                </div>
                                                                <span class="category">
                                                                    <a href="#" class="text-black">{{ $product['type'] }}</a>
                                                                </span>
                                                                <h5 class="title">
                                                                    <a href="{{ route('singleProduct', ['product-id' => $product['id']]) }}" class="text-black line-clamp-1 text-center px-3">
                                                                        {{ $product['name'] }}
                                                                    </a>
                                                                </h5>
                                                                <span class="price">
                                                                    <span class="new text-black">{{ $product['discounted_price'] }} LKR</span>
                                                                </span>
                                                            </div>
                                                            <div class="actions items-center">
                                                                <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart" onClick="addToCartProduct({{ $product['id'] }});">
                                                                    <i class="pe-7s-shopbag"></i>
                                                                </button>
                                                                <button class="action wishlist" title="Wishlist" data-bs-toggle="modal" data-bs-target="#exampleModal-Wishlist" onClick="addToWishlistProduct({{ $product['id'] }});">
                                                                    <i class="pe-7s-like"></i>
                                                                </button>
                                                                <button class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"
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
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="tab-pane fade mb-n-30px" id="shop-list">
                                            @foreach ($products as $product)
                                                <div class="shop-list-wrapper mb-30px">
                                                    <div class="row">
                                                        <div class="col-md-5 col-lg-5 col-xl-4 mb-lm-30px">
                                                            <div class="product">
                                                                <div class="thumb">
                                                                    <a href="{{ route('singleProduct', ['product-id' => $product['id']]) }}" class="image">
                                                                        <img src="{{ $product['image'] }}" alt="Product" />
                                                                        <img class="hover-image" src="{{ $product['image'] }}" alt="Product" />
                                                                    </a>
                                                                    <span class="badges">
                                                                        <span class="sale">Sale</span>
                                                                        @if(isset($product['tags'][0]) && $product['tags'] == "New Arrivals")
                                                                            <span class='new w-fit border-1 border-black text-white'>New</span>
                                                                        @endif
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7 col-lg-7 col-xl-8">
                                                            <div class="content-desc-wrap">
                                                                <div class="content text-black"> <!-- Added text-white here -->
                                                                    <span class="category"><a href="#" class="text-black">{{ $product['type'] }}</a></span> <!-- Add text-white to category link -->
                                                                    <h5 class="title"><a href="{{ route('singleProduct', ['product-id' => $product['id']]) }}" class="text-black">{{ $product['name'] }}</a></h5> <!-- Add text-white to title -->
                                                                    <p class="text-justify">{{ $product['description'] }}</p> <!-- Text will inherit white -->
                                                                </div>
                                                                <div class="box-inner">
                                                                    <span class="price">
                                                                        <span class="new text-black">{{ $product['discounted_price'] }} LKR</span> <!-- Add text-white to price -->
                                                                    </span>
                                                                    <div class="actions">
                                                                        <button title="Add To Cart" class="action add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart" onClick="addToCartProduct({{ $product['id'] }});">
                                                                            <i class="pe-7s-shopbag"></i>
                                                                        </button>
                                                                        <button class="action wishlist" title="Wishlist" data-bs-toggle="modal" data-bs-target="#exampleModal-Wishlist" onClick="addToWishlistProduct({{ $product['id'] }});">
                                                                            <i class="pe-7s-like"></i>
                                                                        </button>
                                                                        <button class="action quickview" data-link-action="quickview" title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"
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

                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Tab Content Area End -->
                            <!--  Pagination Area Start -->
                            <div class="text-center lg:text-end" data-aos="fade-up" data-aos-delay="200" style="font-family: 'Orbitron', sans-serif; font-size: 0.75rem;">
                                {{ $products->appends(request()->query())->links() }}
                            </div>




                            <!--  Pagination Area End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
    <!--product filtering logic-->
    <script>
    // Initialize the range sliders with any existing URL parameters
    window.onload = function() {
        const urlParams = new URLSearchParams(window.location.search);
        const minPrice = urlParams.get('price_min');
        const maxPrice = urlParams.get('price_max');
        const warranty = urlParams.get('warranty');
        const stock = urlParams.get('stock');

        // Fetch the max price dynamically from the server
        fetch('/get-max-price')
            .then(response => response.json())
            .then(data => {
                const maxPriceFromDB = data.maxPrice || 2000000; // default max price if not found
                // Update the max price on the range input and display
                document.querySelector('input[name="price_max"]').max = maxPriceFromDB;
                document.getElementById('maxPrice').textContent = maxPriceFromDB;
            })
            .catch(error => console.error('Error fetching max price:', error));

        if (minPrice) {
            document.querySelector('input[name="price_min"]').value = minPrice;
            document.getElementById('minPrice').textContent = minPrice;
        }
        if (maxPrice) {
            document.querySelector('input[name="price_max"]').value = maxPrice;
            document.getElementById('maxPrice').textContent = maxPrice;
        }
        if (warranty) {
            document.querySelector(`input[name="warranty"][value="${warranty}"]`).checked = true;
        }
        if (stock) {
            document.querySelector(`input[name="stock"][value="${stock}"]`).checked = true;
        }
    }
</script>
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

function addToCartProduct(prodID) {
    // Fetch product details from API
    fetch(`/api/product/${prodID}`)
        .then(response => response.json())
        .then(product => {
            // Fetch product quantity from API before adding to cart
            fetch(`/product-quantity/${prodID}`)
                .then(response => response.json())
                .then(data => {
                    const availableQty = data.qty;

                    if (availableQty <= 0) {
                        alert('This product is out of stock.');
                        return;
                    }

                    // Check if product already exists in cart
                    const existingCartItem = cart.find(item => item.id == prodID);

                    if (existingCartItem) {
                        // If product exists, check available stock before incrementing quantity
                        if (existingCartItem.quantity < availableQty) {
                            existingCartItem.quantity += 1;
                        } else {
                            alert('Only ' + availableQty + ' items available in stock.');
                            return;
                        }
                    } else {
                        // If product doesn't exist, add it with quantity 1
                        cart.push({
                            id: product.id,
                            name: product.name,
                            price: product.discounted_price,
                            image: product.image,
                            quantity: 1
                        });
                    }

                    // Update cart count in UI
                    updateCartCount();

                    // Show success message
                    updateCartModal(product);

                    // Save cart to localStorage
                    saveCartToStorage();

                    // Log cart for debugging
                    console.log('Current cart:', cart);

                    // Update cart modal
                    displayCartItems();
                })
                .catch(error => console.error('Error fetching product quantity:', error));
        })
        .catch(error => console.error('Error fetching product details:', error));
}



function addToWishlistProduct(prodID) {
    // Fetch product details from API
    fetch(`/api/product/${prodID}`)
        .then(response => {
            // Log the raw response for debugging
            console.log('Raw response:', response);

            // Check if the response is OK (status code 200-299)
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            // Parse the response as JSON
            return response.json();
        })
        .then(product => {
            console.log('Product details:', product);

            // Check if product already exists in wishlist
            const existingWishlistItem = wishlist.find(item => item.id === prodID);

            if (!existingWishlistItem) {
                // Add to wishlist if it doesn't exist (no quantity needed for wishlist)
                wishlist.push({
                    id: product.id,
                    name: product.name,
                    price: product.discounted_price,
                    image: product.image
                });

                // Update wishlist count in UI
                updateWishlistCount();

                // Show success message or update UI as needed
                updateWishlistModal(product);

                // Save wishlist to localStorage
                saveWishlistToStorage();

                // Log wishlist for debugging
                console.log('Current wishlist:', wishlist);

                // Update wishlist modal
                displayWishlistItems();
            } else {
                console.log('Product already exists in wishlist');
            }
        })
        .catch(error => {
            console.error('Error fetching product details:', error);
            alert('Failed to fetch product details. Please try again.');
        });
}
</script>
