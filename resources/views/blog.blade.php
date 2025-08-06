
<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />

    <title>NovaLink Computers | Blog</title>
    <meta name="description" content="NovaLink Computers offer the best computers available at the market">
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
</head>

<body>
    <div class="main-wrapper">
        @include('layouts.nav-2')

        <div class="product-area py-[250px] dark-blue-bg relative" 
            style="background:url(assets/images/banner/10-bundle-1.jpg) no-repeat; background-position:center; background-size:cover; background-attachment: fixed; border-bottom-left-radius: 0px; border-bottom-right-radius: 0px;">
            
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black opacity-70 z-0" style="border-bottom-left-radius: 0px; border-bottom-right-radius: 0px;"></div>

            <div class="container h-100 relative z-10">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 text-center">
                        <h2 class="text-xl lg:text-4xl font-light text-white mb-2" 
                            style="font-family: 'Orbitron', sans-serif;">
                            Explore Tech Insights & Updates
                        </h2>
                        <p class="text-white text-sm" style="font-family: 'Orbitron', sans-serif;">Stay informed with NovaLink's latest blog articles, tips, and news in the world of technology.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- breadcrumb-area start -->

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

                <li style="display: flex; align-items: center; margin: 0 6px;" aria-current="page">
                    <svg style="width: 16px; height: 16px; color: #9ca3af; fill: none; stroke: currentColor; stroke-width: 2;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span style="margin-left: 8px; font-size: 14px; font-weight: 600; color: #374151; padding: 6px 10px; border-radius: 6px; font-family: 'Orbitron', sans-serif;">Blog</span>
                </li>
            </ol>
        </nav>


        <!-- breadcrumb-area end -->
        <!-- Blog Area Start -->
        <div class="blog-grid pb-100px pt-100px main-blog-page single-blog-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 offset-lg-2">
                        <div class="blog-posts">
                            <div class="single-blog-post blog-grid-post">
                                <div class="blog-image single-blog">
                                    <img class="img-fluid h-auto border-radius-10px" src="{{ $blog['image'] }}" alt="{{ $blog['title'] }}" />
                                </div>
                                <div class="blog-post-content-inner mt-30px">
                                    <div class="blog-athor-date">
                                        <span class="blog-date"><i class="fa fa-calendar" aria-hidden="true"></i> {{ $blog['date'] }}</span>
                                    </div>
                                    <h4 class="blog-title">{{ $blog['title'] }}</h4>
                                    <p data-aos="fade-up" class="text-justify">
                                        {{ $blog['description'] }}
                                    </p>
                                </div>
                            </div>
                            <div class="blog-single-tags-share d-md-flex justify-content-between">
                                <div class="blog-single-tags d-flex" data-aos="fade-up" data-aos-delay="200">
                                    <span class="title">Tags:</span>
                                    <ul class="tag-list">
                                        @foreach ($blog['tag'] as $tag)
                                            <li><a href="#">{{ $tag }}</a>{{ $loop->last ? '' : ',' }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog Area End -->
        <!-- footer -->
        @include('layouts.footer2')
    </div>
    <!-- Global Vendor, plugins JS -->
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
    <!-- Main JS -->
    <script src="assets/js/main.js"></script>
</body>

</html>