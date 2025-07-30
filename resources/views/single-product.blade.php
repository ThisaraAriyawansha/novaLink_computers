
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
<body>
    <div class="main-wrapper">
    @include('layouts.nav-2')

        <div class="h-[10dvh]"></div>


        <!-- Product Details Area Start -->
        <div class="product-details-area pt-100px pb-100px ">
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
                    </div>
                    <!-- prod data -->
                    <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-details-content quickview-content ml-25px">
                            <h2 class="text-black"><?php echo $product['name'] ?></h2>
                            <div class="pricing-meta">
                                <ul class="d-flex">
                                    <li class="new-price text-black"><?php echo $product['dis_price'] ?></li>
                                </ul>
                            </div>

                            <div class="pro-details-categories-info pro-details-same-style d-flex m-0 mt-3 border-t pt-3 border-white">
                                <ul>
                                    @if (!empty($product['features']))
                                        @foreach ($product['features'] as $feature)
                                            @php
                                                // Split feature into name and value
                                                $featureParts = explode(':', $feature);
                                                $featureName = trim($featureParts[0]);
                                                $featureValue = isset($featureParts[1]) ? trim($featureParts[1]) : '';
                                            @endphp
                                            <li class="text-black">
                                                <strong>{{ $featureName }}:</strong> {{ $featureValue }}
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>


                            <div class="pro-details-quality">

                                <div class="pro-details-cart">
                                <button class="add-cart" onClick="addToCart(<?= $product['id']; ?>)" title="Add To Cart" data-bs-toggle="modal" data-bs-target="#exampleModal-Cart">Add To Cart</button>

                                </div>
                                <div class="pro-details-compare-wishlist pro-details-wishlist ">
                                <a href="{{ route('wishlist')}}"><i class="pe-7s-like"></i></a>
                                </div>

                            </div>
                        </div>
                        <!-- product details description area start -->
                        <div class="description-review-wrapper max-[992px]:m-0">
                        <div class="description-review-topbar nav " >
                        <button class="text-black active" data-bs-toggle="tab" data-bs-target="#des-details2">Information</button>
                                <button class="text-black" data-bs-toggle="tab" data-bs-target="#des-details1">Description</button>
                                <button class="text-black" data-bs-toggle="tab" data-bs-target="#des-details3">Reviews</button>
                            </div>
                            <div class="tab-content description-review-bottom ">
                                <div id="des-details2" class="tab-pane active">
                                    <div class="product-anotherinfo-wrapper text-start">
                                        <ul>
                                            <li class="text-black"><span class="text-black"><strong>Brand:</strong> <?php echo $product['brand'] ?></li>
                                            <li class="text-black"><span class="text-black"><strong>Product Type:</strong> <?php echo $product['type'] ?></li>
                                            <li class="text-black"><span class="text-black"><strong>Warranty:</strong> <?php echo $product['warranty'] ?></li>
                                            <li class="text-black"><span class="text-black"><strong>Availability:</strong>
                                                    <?php echo $product['in_stock'] ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="des-details1" class="tab-pane">
                                    <div class="product-description-wrapper">
                                        <p class="text-black text-justify">
                                            <?php echo $product['desc'] ?>
                                        </p>
                                    </div>
                                </div>
                                <div id="des-details3" class="tab-pane">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="review-wrapper">
                                                <!-- Reviews will be appended here -->
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="ratting-form-wrapper pt-0">
                                                <!-- Inside your form -->
                                                <input type="hidden" id="product-id" value="<?php echo $product['id']; ?>">
                                                <h3 class="text-black">Add a Review</h3>
                                                <div class="ratting-form">
                                                    <form id="review-form">
                                                        @csrf
                                                        <input type="hidden" id="product-id" value="1"> <!-- Replace with dynamic product ID -->
                                                        <div class="star-box">
                                                            <span class="text-black">Your rating:</span>
                                                            <div class="rating-product">
                                                                <select id="rating" name="rating">
                                                                    <option value="1">1 Star</option>
                                                                    <option value="2">2 Stars</option>
                                                                    <option value="3">3 Stars</option>
                                                                    <option value="4">4 Stars</option>
                                                                    <option value="5">5 Stars</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="rating-form-style">
                                                                    <input id="name" name="name" placeholder="Name" type="text" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="rating-form-style">
                                                                    <input id="email" name="email" placeholder="Email" type="email" required />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="rating-form-style form-submit">
                                                                    <textarea id="message" name="message" placeholder="Message" required></textarea>
                                                                    <button class="btn btn-primary btn-hover-color-primary" type="submit">Submit</button>
                                                                </div>
                                                            </div>
                                                        </div>
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
        <div class="product-area related-product single-prod-bg border-t-2 pt-[30px]">
            <div class="container">
                <!-- Section Title & Tab Start -->
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center m-0">
                            <h2 class="title text-black">Related Products</h2>
                            <p class="text-black">There are many related products available</p>
                        </div>
                    </div>
                </div>
                <!-- Section Title & Tab End -->
                <div class="row">
                    <div class="col">
                        <div class="new-product-slider swiper-container slider-nav-style-1">
                            <div class="swiper-wrapper">
                                <?php
                                foreach ($products as $product) {
                                    echo "<div class='swiper-slide'>
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
                                                    <span class='category text-black'><a href='#' class=' text-black'>{$product['type']}</a></span>
                                                    <h5 class='title'>
                                                        <a href='singleProduct?product-id={$product['id']}' class='line-clamp-1 text-black px-3'>
                                                            {$product['name']}
                                                        </a>
                                                    </h5>
                                                    <span class='price'>
                                                        <span class='new text-black'>{$product['dis_price']}</span>
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
                                                            data-product-distription='{$product['description'] }'
                                                            data-product-price='{$product['dis_price']}'>
                                                        <i class='pe-7s-look'></i>
                                                    </button>

                                                </div>
                                            </div>
                                        </div>";
                                }
                                ?>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-buttons">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
                        <div class="single-review">
                            <div class="review-img">
                                <div class="initials-avatar" style="background-color: ${bgColor}">${firstLetter}</div>
                            </div>
                            <div class="review-content">
                                <div class="review-top-wrap">
                                    <div class="review-left">
                                        <div class="review-name">
                                            <h4 class="text-black">${review.name}</h4>
                                        </div>
                                        <div class="rating-product">
                                            ${stars}
                                        </div>
                                    </div>
                                </div>
                                <div class="review-bottom">
                                    <p class="text-black text-justify">${review.message}</p>
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
