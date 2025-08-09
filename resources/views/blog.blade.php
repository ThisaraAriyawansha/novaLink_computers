<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />

    <title>NovaLink Computers | Blog</title>
    <meta name="description" content="NovaLink Computers offer the best computers available at the market">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/n_logo_remove_new.png" />
    <!-- CSS -->
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


    <style>

        :root {
            --primary-color: #0f172a;
            --secondary-color: #334155;
            --accent-color: #4b4b4bff;
            --text-primary: #1e293b;
            --text-secondary: #64748b;
            --text-muted: #94a3b8;
            --surface: #ffffff;
            --surface-secondary: #f8fafc;
            --border-color: #e2e8f0;
            --border-light: #f1f5f9;
            --shadow-subtle: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-medium: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-large: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --gradient-bg: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }



        .main-wrapper {
            min-height: 100vh;
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            height: 60vh;
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--gradient-bg);
            overflow: hidden;
        }

        .hero-content {
            text-align: center;
            z-index: 2;
            position: relative;
            padding: 0 2rem;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 600;
            color: white;
            margin-bottom: 1rem;
            letter-spacing: -0.02em;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 400;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        .hero-pattern {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0.1;
            background-image: 
                radial-gradient(circle at 25% 25%, white 2px, transparent 2px),
                radial-gradient(circle at 75% 75%, white 2px, transparent 2px);
            background-size: 50px 50px;
            background-position: 0 0, 25px 25px;
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            .hero-subtitle {
                font-size: 1.1rem;
            }
        }

        /* Breadcrumb */
        .breadcrumb-container {
            background-color: var(--surface-secondary);
            padding: 1.5rem 0;
            border-bottom: 1px solid var(--border-light);
        }

        .breadcrumb-nav {
            display: flex;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .breadcrumb-list {
            display: flex;
            align-items: center;
            list-style: none;
            gap: 0.5rem;
        }

        .breadcrumb-item a {
            display: flex;
            align-items: center;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.5rem 0.75rem;
            border-radius: 0.5rem;
            transition: all 0.2s ease;
        }

        .breadcrumb-item a:hover {
            color: var(--accent-color);
            background-color: white;
        }

        .breadcrumb-separator {
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        .breadcrumb-current {
            color: var(--text-primary);
            font-weight: 600;
            font-size: 0.875rem;
        }

        /* Blog Section */
        .blog-section {
            padding: 4rem 0;
            background-color: var(--surface);
        }

        .blog-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .blog-posts {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        @media (min-width: 768px) {
            .blog-posts {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1200px) {
            .blog-posts {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        .blog-post {
            background: white;
            border: 1px solid var(--border-color);
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-subtle);
            height: fit-content;
        }

        .blog-post:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-large);
        }

        .blog-image {
            position: relative;
            height: 300px;
            overflow: hidden;
        }

        .blog-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .blog-post:hover .blog-image img {
            transform: scale(1.05);
        }

        .blog-content {
            padding: 1.5rem;
        }

        .blog-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
            font-size: 0.875rem;
            color: var(--text-muted);
        }

        .blog-date {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
        }

        .blog-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 0.75rem;
            line-height: 1.3;
        }

        .blog-title a {
            color: inherit;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .blog-title a:hover {
            color: var(--accent-color);
        }

        .blog-excerpt {
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 1.25rem;
            font-size: 0.9rem;
        }

        .read-more-link {
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .read-more-link:hover {
            color: var(--primary-color);
            text-decoration: underline;
        }

        .blog-tags {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-top: 1.25rem;
            padding-top: 1.25rem;
            border-top: 1px solid var(--border-light);
        }

        .tags-label {
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-secondary);
        }

        .tag-list {
            display: flex;
            gap: 0.5rem;
            list-style: none;
            flex-wrap: wrap;
        }

        .tag-item a {
            display: inline-block;
            background-color: var(--surface-secondary);
            color: var(--text-secondary);
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
            border: 1px solid var(--border-color);
        }

        .tag-item a:hover {
            background-color: var(--accent-color);
            color: white;
            border-color: var(--accent-color);
        }

        .no-posts {
            text-align: center;
            padding: 4rem 2rem;
            color: var(--text-secondary);
            font-size: 1.1rem;
        }

        .no-posts-icon {
            font-size: 3rem;
            color: var(--text-muted);
            margin-bottom: 1rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .blog-container {
                padding: 0 1rem;
            }
            
            .blog-posts {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .blog-content {
                padding: 1.25rem;
            }
            
            .blog-title {
                font-size: 1.1rem;
            }
            
            .blog-image {
                height: 180px;
            }
            
            .breadcrumb-nav {
                padding: 0 1rem;
            }
            
            .blog-tags {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.75rem;
            }
        }

        @media (max-width: 480px) {
            .blog-container {
                padding: 0 1rem;
            }
            
            .blog-posts {
                gap: 1rem;
            }
            
            .blog-content {
                padding: 1rem;
            }
        }

        /* Animation Classes */
        .fade-up {
            opacity: 0;
            transform: translateY(20px);
            animation: fadeUp 0.6s ease forwards;
        }

        @keyframes fadeUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Staggered Animation Delays */
        .blog-post:nth-child(1) { animation-delay: 0.1s; }
        .blog-post:nth-child(2) { animation-delay: 0.2s; }
        .blog-post:nth-child(3) { animation-delay: 0.3s; }
        .blog-post:nth-child(4) { animation-delay: 0.4s; }
    </style>
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
        <nav style="display: flex; align-items: center; padding: 16px 24px; max-width: 1200px; margin: 10px auto;" aria-label="Breadcrumb">
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
        <!-- blog.blade.php -->
        <!-- blog.blade.php -->
        <div class="blog-section">
            <div class="blog-container">
                <div class="blog-posts">
                    @forelse ($blogs as $blog)
                        <article class="blog-post fade-up">
                            <div class="blog-image">
                                <img src="{{ $blog['image'] }}" alt="{{ $blog['title'] }}" />
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <div class="blog-date">
                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                        {{ $blog['date'] }}
                                    </div>
                                </div>
                                <h2 class="blog-title">
                                    <a href="#" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;">{{ $blog['title'] }}</a>
                                </h2>
                                <p class="blog-description" >
                                    {{ $blog['description'] }}
                                </p>
                                <div class="blog-tags">
                                    <span class="tags-label">Tags:</span>
                                    <ul class="tag-list">
                                        @foreach ($blog['tag'] as $tag)
                                            <li class="tag-item"><a href="#">{{ $tag }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </article>
                    @empty
                        <div class="no-posts fade-up">
                            <div class="no-posts-icon">📝</div>
                            <p>No blog posts available at the moment.</p>
                        </div>
                    @endforelse
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