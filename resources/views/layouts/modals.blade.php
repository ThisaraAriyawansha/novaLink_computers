<!-- Modal -->
<div class="modal modal-2 fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> <i class="pe-7s-close"></i></button>
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                        <!-- Swiper -->
                        <div class="swiper-container gallery-top">
                            <div class="swiper-wrapper">
                                <!-- Slides will be dynamically inserted here -->
                            </div>
                        </div>
                        <div class="swiper-container gallery-thumbs mt-20px slider-nav-style-1 small-nav">
                            <div class="swiper-wrapper">
                                <!-- Thumbnail slides will be dynamically inserted here -->
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-buttons hidden">
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                        <div class="product-details-content quickview-content">
                            <h2>New Laptops</h2>
                            <div class="pricing-meta">
                                <ul class="d-flex">
                                    <li class="new-price">From 125,000 LKR</li>
                                </ul>
                            </div>
                            <div class="pro-details-rating-wrap hidden">
                                <div class="rating-product">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <span class="read-review"><a class="reviews" href="#"></a></span>
                            </div>
                            <p class="mt-30px text-justify">At Udarata Computers, we bring you an extensive range of laptops designed to meet every need and budget. Whether you’re a gamer seeking high-performance machines, a professional looking for reliable work laptops, or a student in need of a lightweight device for studies, we have the perfect laptop for you.</p>
                            <div class="pro-details-quality">

                                <div class="pro-details-cart hidden">
                                    <button class="add-cart"> Add To
                                        Cart</button>
                                </div>
                                <div class="pro-details-compare-wishlist pro-details-wishlist hidden">
                                    <a href="wishlist.php"><i class="pe-7s-like"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Cart -->
<div class="modal customize-class fade" id="exampleModal-Cart" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                <div class="tt-modal-messages">
                    <i class="pe-7s-check"></i> Added to cart successfully!
                </div>
                <div class="tt-modal-product">
                    <div class="tt-img flex justify-center items-center">
                        <img src="assets/images/product-image/1.webp" alt="Laptop">
                    </div>
                    <h2 class="tt-title"><a href="#">Laptop</a></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal wishlist -->
<div class="modal customize-class fade" id="exampleModal-Wishlist" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                <div class="tt-modal-messages">
                    <i class="pe-7s-check"></i> Added to Wishlist successfully!
                </div>
                <div class="tt-modal-product">
                    <div class="tt-img flex justify-center items-center">
                        <img src="assets/images/product-image/1.webp" alt="Laptop" class="w-full">
                    </div>
                    <h2 class="tt-title"><a href="#">Laptop</a></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal compare -->
<div class="modal customize-class fade" id="exampleModal-Compare" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                <div class="tt-modal-messages">
                    <i class="pe-7s-check"></i> Added to compare successfully!
                </div>
                <div class="tt-modal-product">
                    <div class="tt-img flex justify-center items-center">
                        <img src="assets/images/product-image/1.webp" alt="Laptop">
                    </div>
                    <h2 class="tt-title"><a href="#">Laptop</a></h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Cart -->
<div class="modal customize-class fade" id="exampleModal-Chipset" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="pe-7s-close"></i></button>
                <div class="tt-modal-messages">
                    Select a Chipset
                </div>
                <div class="tt-modal-product">
                    <div class="flex gap-2 justify-center items-center mt-3">
                        <button id="amdBtn" class="light-blue-bg text-gray-100 py-1 px-4 " data-chipset="AMD" onclick="filterByChipset('AMD')">AMD</button>
                        <button id="intelBtn" class="light-blue-bg text-gray-100 py-1 px-4 " data-chipset="INTEL" onclick="filterByChipset('INTEL')">Intel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>