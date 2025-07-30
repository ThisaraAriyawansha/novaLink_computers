
<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Udarata Computers | Best Computers for you</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="Udarata Computers - Best Computers for you">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />

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
        <br>

        <div class="h-[10dvh]"></div>
        <!-- breadcrumb-area start -->
        <div class="breadcrumb-area relative">
            <div class="bg-black/50 absolute left-0 w-full h-full"></div>
            <div class="container relative">
                <div class="row align-items-center justify-content-center">
                    <div class="col-12 text-center">
                        <h2 class="breadcrumb-title text-white font-black">{{ $blog['title'] }}</h2>
                        <!-- breadcrumb-list start -->
                        <ul class="breadcrumb-list">
                            <li class="breadcrumb-item"><a class="text-white" href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="{{ route('blog') }}">Blog</a></li>
                            <li class="breadcrumb-item active text-white">{{ Str::limit($blog['title'], 20) }}</li>
                        </ul>
                        <!-- breadcrumb-list end -->
                    </div>
                </div>
            </div>
        </div>
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
                                        <span><a class="blog-author" href="{{ route('blog') }}"><i class="fa fa-user" aria-hidden="true"></i> Admin</a></span>
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