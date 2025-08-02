
    <style>

        /* Main Slider Container (renamed from hero-container) */
        .main-slider-container {
            width: 100%;
            height: 90vh;
            background-color: #ffffff;
            position: relative;
            overflow: hidden;
            font-family: 'Orbitron', sans-serif;
        }
        
        /* Slider & Slides */
        .slider-container {
            width: 100%;
            height: 100%;
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        .slide {
            min-width: 100%;
            display: flex;
            align-items: center;
            background-color: #ffffff;
        }
        
        /* Slide Content Layout */
        .slide-content {
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
        }
        .flex-container {
            display: flex;
            flex-direction: row;
            align-items: center;
            width: 100%;
            height: 100%;
            flex-wrap: wrap;
        }
        
        /* Text & Image Styling */
        .text-content {
            flex: 1;
            padding: 16px 0;
            animation: slideInLeft 1s ease-out forwards;
            text-align: left;
        }
        .product-image-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            padding: 16px 0;
        }
        .product-image {
            max-height: 384px;
            width: auto;
        }
        
        /* Navigation Dots */
        .nav-dots {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 8px;
            z-index: 10;
        }
        .nav-dot {
            width: 12px;
            height: 12px;
            background-color: #cccccc;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .nav-dot.active {
            background-color: #000000;
        }
        
        /* Animations */
        @keyframes slideInLeft {
            0% { transform: translateX(-100px); opacity: 0; }
            100% { transform: translateX(0); opacity: 1; }
        }
        
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .flex-container {
                flex-direction: column;
                justify-content: center;
            }
            .text-content {
                text-align: center;
                justify-content: center;
            }
            .shop-button {
                align-self: center !important;
            }
            .product-image {
                max-height: 256px !important;
            }
            h2 {
                font-size: 1.75rem !important;
            }
            p {
                font-size: 1rem !important;
            }
        }
        @media (max-width: 576px) {
            .product-image {
                max-height: 192px !important;
            }
            h2 {
                font-size: 1.5rem !important;
            }
        }
    </style>
    <div class="main-slider-container" style="font-family: 'Orbitron', sans-serif;"> <!-- Changed class name here -->
        <!-- Slider Container -->
        <div class="slider-container" style="font-family: 'Orbitron', sans-serif;">
            <!-- Slide 1: Laptops -->
            <div class="slide">
                <div class="slide-content">
                    <div class="flex-container">
                        <div class="text-content">
                            <span style="display: block; font-size: 1.25rem; color: #000000; margin-bottom: 1rem; font-weight: 600; font-family: 'Orbitron', sans-serif;">Welcome To NovaLink Computers</span>
                            <h2 style="font-size: 2.5rem; font-weight: 700; color: #000000; line-height: 1.2; margin: 0; font-family: 'Orbitron', sans-serif;">High-Performance Laptops</h2>
                            <p style="font-size: 1.125rem; color: #000000; margin: 0.5rem 0; font-family: 'Orbitron', sans-serif;">Discover our range of powerful laptops for work and play.</p>
                            <a href="/products?filter=LAPTOPS&sort=name_asc" class="shop-button" style="display: inline-block; background-color: #000000; color: #ffffff; padding: 0.75rem 1.5rem; border-radius: 0.25rem; text-decoration: none; font-size: 1rem; text-transform: capitalize; margin-top: 1rem; transition: transform 0.3s ease; align-self: flex-start; font-family: 'Orbitron', sans-serif;" onmouseover="this.style.transform='scale(1.05)';" onmouseout="this.style.transform='scale(1)';">Shop Laptops</a>
                        </div>
                        <div class="product-image-container">
                            <img src="assets/images/Banner_section/lapp.png" alt="Laptop" class="product-image" />
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 2: Desktops -->
            <div class="slide">
                <div class="slide-content">
                    <div class="flex-container">
                        <div class="text-content">
                            <span style="display: block; font-size: 1.25rem; color: #000000; margin-bottom: 1rem; font-weight: 600; font-family: 'Orbitron', sans-serif;">Welcome To NovaLink Computers</span>
                            <h2 style="font-size: 2.5rem; font-weight: 700; color: #000000; line-height: 1.2; margin: 0; font-family: 'Orbitron', sans-serif;">Custom-Built Desktops</h2>
                            <p style="font-size: 1.125rem; color: #000000; margin: 0.5rem 0; font-family: 'Orbitron', sans-serif;">Tailored desktops for gaming and productivity.</p>
                            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'CASINGS']) }}" class="shop-button" style="display: inline-block; background-color: #000000; color: #ffffff; padding: 0.75rem 1.5rem; border-radius: 0.25rem; text-decoration: none; font-size: 1rem; text-transform: capitalize; margin-top: 1rem; transition: transform 0.3s ease; align-self: flex-start; font-family: 'Orbitron', sans-serif;" onmouseover="this.style.transform='scale(1.05)';" onmouseout="this.style.transform='scale(1)';">Shop Desktops</a>
                        </div>
                        <div class="product-image-container">
                            <img src="assets/images/Banner_section/172782111228.png" alt="Desktop" class="product-image" />
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 3: Accessories -->
            <div class="slide">
                <div class="slide-content">
                    <div class="flex-container">
                        <div class="text-content">
                            <span style="display: block; font-size: 1.25rem; color: #000000; margin-bottom: 1rem; font-weight: 600; font-family: 'Orbitron', sans-serif;">Welcome To NovaLink Computers</span>
                            <h2 style="font-size: 2.5rem; font-weight: 700; color: #000000; line-height: 1.2; margin: 0; font-family: 'Orbitron', sans-serif;">Premium Accessories</h2>
                            <p style="font-size: 1.125rem; color: #000000; margin: 0.5rem 0; font-family: 'Orbitron', sans-serif;">Keyboards, mice, and more to enhance your setup.</p>
                            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'RAM']) }}" class="shop-button" style="display: inline-block; background-color: #000000; color: #ffffff; padding: 0.75rem 1.5rem; border-radius: 0.25rem; text-decoration: none; font-size: 1rem; text-transform: capitalize; margin-top: 1rem; transition: transform 0.3s ease; align-self: flex-start; font-family: 'Orbitron', sans-serif;" onmouseover="this.style.transform='scale(1.05)';" onmouseout="this.style.transform='scale(1)';">Shop Accessories</a>
                        </div>
                        <div class="product-image-container">
                            <img src="assets/images/Banner_section/Sample.png" alt="Accessories" class="product-image" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Navigation Dots -->
        <div class="nav-dots">
            <div class="nav-dot active" data-slide="0" onclick="goToSlide(0)"></div>
            <div class="nav-dot" data-slide="1" onclick="goToSlide(1)"></div>
            <div class="nav-dot" data-slide="2" onclick="goToSlide(2)"></div>
        </div>
    </div>

    <script>
        // Slider Functionality
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        const totalSlides = slides.length;
        const sliderContainer = document.querySelector('.slider-container');
        const navDots = document.querySelectorAll('.nav-dot');

        function updateSlide() {
            sliderContainer.style.transform = `translateX(-${currentSlide * 100}%)`;
            navDots.forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlide);
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % totalSlides;
            updateSlide();
        }

        function goToSlide(index) {
            currentSlide = index;
            updateSlide();
        }

        // Auto-slide every 5 seconds
        setInterval(nextSlide, 5000);

        // Initial setup
        updateSlide();
    </script>
