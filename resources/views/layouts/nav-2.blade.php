<div class="w-full p-2 px-3 z-50 fixed top-0">
    <nav class="bg-black text-white h-[10dvh] flex justify-center items-center rounded-2xl w-full">
        <div class="px-4 flex justify-between items-center w-full">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="assets/images/logo/N_white.png" alt="NovaLink" class="h-15 mr-4">
            </a>

            <!-- Desktop Navigation -->
            <div class="hidden lg:flex items-center space-x-6">
                <a href="#" class="text-white uppercase font-bold text-center max-xl:text-sm" id="category-toggle">Category</a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'ALL']) }}" class="text-white uppercase font-bold text-center max-xl:text-sm">Products</a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'ALL']) }}" class="text-white uppercase font-bold text-center max-xl:text-sm">Accessories</a>
                <a href="/products?filter=LAPTOPS&sort=name_asc" class="text-white uppercase font-bold text-center max-xl:text-sm">Laptops</a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'APPLE PRODUCTS']) }}" class="text-white uppercase font-bold text-center max-xl:text-sm">Mobile</a>
                <a href="{{ route('aboutUs') }}" class="text-white uppercase font-bold text-center max-xl:text-sm">About Us</a>
                <a href="{{ route('contact') }}" class="text-white uppercase font-bold text-center max-xl:text-sm">Contact Us</a>
                <a href="{{ route('myAcc') }}" class="text-white uppercase font-bold text-center max-xl:text-sm">My Account</a>
                <a href="{{ route('buildMyPC')}}" class="text-white uppercase font-bold text-center max-xl:text-sm">Build My PC</a>
            </div>

            <!-- Icons (Cart, Search, Wishlist) - Always visible -->
            <div class="flex items-center space-x-4">
                <!-- Search Icon - Now visible on all screen sizes -->
                <a data-bs-toggle="modal" data-bs-target="#exampleModal-search" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </a>
                
                <!-- Cart Icon with updated styling -->
                <a href="#offcanvas-cart" class="text-white offcanvas-toggle relative group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-300 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="absolute -top-2 -right-2">
                        <div class="inline-flex items-center justify-center h-5 w-5 rounded-full bg-red-500 text-white text-xs font-bold">
                            <span id="cart-badge">0</span>
                        </div>
                    </span>
                </a>
                
                <!-- Wishlist Icon with updated styling -->
                <a href="#offcanvas-wishlist" class="text-white offcanvas-toggle relative group">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:text-gray-300 transition-colors" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
                    </svg>
                    <span class="absolute -top-2 -right-2">
                        <div class="inline-flex items-center justify-center h-5 w-5 rounded-full bg-red-500 text-white text-xs font-bold">
                            <span id="wishlist-badge">0</span>
                        </div>
                    </span>
                </a>
            </div>
            <!-- Mobile Menu Button -->
            <button class="lg:hidden text-white focus:outline-none" id="mobile-menu-button">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="lg:hidden fixed top-0 right-0 h-full bg-black text-white w-3/4 transition-all duration-300 transform translate-x-full z-50" id="mobile-menu">
        <div class="px-4 py-2 space-y-1 h-full flex flex-col">
            <div class="flex justify-end">
                <button class="text-white focus:outline-none p-2" id="mobile-menu-close">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <a href="#" class="block py-3 px-4 uppercase font-bold hover:bg-gray-800 rounded-lg transition-colors duration-200 text-white" id="mobile-category-toggle">Category</a>
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'ALL']) }}" class="block py-3 px-4 uppercase font-bold hover:bg-gray-800 rounded-lg transition-colors duration-200 text-white">Products</a>
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'ALL']) }}" class="block py-3 px-4 uppercase font-bold hover:bg-gray-800 rounded-lg transition-colors duration-200 text-white">Accessories</a>
            <a href="/products?filter=LAPTOPS&sort=name_asc" class="block py-3 px-4 uppercase font-bold hover:bg-gray-800 rounded-lg transition-colors duration-200 text-white">Laptops</a>
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'APPLE PRODUCTS']) }}" class="block py-3 px-4 uppercase font-bold hover:bg-gray-800 rounded-lg transition-colors duration-200 text-white">Mobile</a>
            <a href="{{ route('aboutUs') }}" class="block py-3 px-4 uppercase font-bold hover:bg-gray-800 rounded-lg transition-colors duration-200 text-white">About Us</a>
            <a href="{{ route('contact') }}" class="block py-3 px-4 uppercase font-bold hover:bg-gray-800 rounded-lg transition-colors duration-200 text-white">Contact Us</a>
            <a href="{{ route('myAcc') }}" class="block py-3 px-4 uppercase font-bold hover:bg-gray-800 rounded-lg transition-colors duration-200 text-white">My Account</a>
            <a href="{{ route('buildMyPC')}}" class="block py-3 px-4 uppercase font-bold hover:bg-gray-800 rounded-lg transition-colors duration-200 text-white">Build My PC</a>
        </div>
    </div>

    <!-- Category Popup -->
    <div class="fixed inset-0 bg-black bg-opacity-50 z-60 hidden" id="category-popup-overlay">
    <div class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-black rounded-2xl p-6 w-11/12 max-w-2xl max-h-[80vh] overflow-y-auto transition-all duration-300 scale-75 opacity-0 border border-gray-700" id="category-popup">
        <div class="flex justify-end">
            <button class="text-white focus:outline-none" id="category-popup-close">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Laptops -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'LAPTOPS']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">LAPTOPS</h6>
            </a>
            
            <!-- ASUS ROG -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'brand' => 'ASUS']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">ASUS ROG</h6>
            </a>
            
            <!-- Apple Products -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'APPLE PRODUCTS']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">APPLE PRODUCTS</h6>
            </a>
            
            <!-- Gaming Console -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'GAMING CONSOLE']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">GAMING CONSOLE</h6>
            </a>
            
            <!-- Processors -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'PROCESSOR']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">PROCESSORS</h6>
            </a>
            
            <!-- Motherboards -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'MOTHERBOARD']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">MOTHERBOARDS</h6>
            </a>
            
            <!-- Memory (RAM) -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'RAM']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">MEMORY (RAM)</h6>
            </a>
            
            <!-- Graphic Cards -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'GRAPHIC CARDS']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">GRAPHIC CARDS</h6>
            </a>
            
            <!-- Powered by ASUS -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'brand' => 'ASUS']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">POWERED BY ASUS</h6>
            </a>
            
            <!-- Commercial Solutions -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'COMMERCIAL SOLUTIONS']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">COMMERCIAL SOLUTIONS</h6>
            </a>
            
            <!-- Casings -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'CASINGS']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">CASINGS</h6>
            </a>
            
            <!-- Power Supply -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'POWER SUPPLY']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">POWER SUPPLY, UPS & SURGE PROTECTORS</h6>
            </a>
            
            <!-- Cooling & Lighting -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'COOLING & LIGHTING']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">COOLING & LIGHTING</h6>
            </a>
            
            <!-- Storage & NAS -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'STORAGE & NAS']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">STORAGE & NAS</h6>
            </a>
            
            <!-- Monitors & Accessories -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'MONITORS & ACCESSORIES']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">MONITORS & ACCESSORIES</h6>
            </a>
            
            <!-- Optical Drivers & Printers -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'OPTICAL DRIVERS & PRINTERS']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">OPTICAL DRIVERS & PRINTERS</h6>
            </a>
            
            <!-- Speakers & Headphones -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'SPEAKERS & HEADPHONES']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.536 8.464a5 5 0 010 7.072m2.828-9.9a9 9 0 010 12.728M5.586 15.536a5 5 0 001.414 1.414m2.828-9.9a9 9 0 012.728-2.728" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">SPEAKERS & HEADPHONES</h6>
            </a>
            
            <!-- Keyboards, Mouse & Gamepads -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'KEYBOARDS, MOUSE & GAMEPADS']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">KEYBOARDS, MOUSE & GAMEPADS</h6>
            </a>
            
            <!-- Graphics Tablet / Tab -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'GRAPHICS TABLET / TAB']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">GRAPHICS TABLET / TAB</h6>
            </a>
            
            <!-- Desktop Workstations -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'DESKTOP WORKSTATIONS']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">DESKTOP WORKSTATIONS</h6>
            </a>
            
            <!-- Gaming Desktops -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'GAMING DESKTOPS']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">GAMING DESKTOPS</h6>
            </a>
            
            <!-- Budget Desktop Computers -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'BUDGET DESKTOP COMPUTERS']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">BUDGET DESKTOP COMPUTERS</h6>
            </a>
            
            <!-- Gaming Chairs -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'GAMING CHAIRS']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">GAMING CHAIRS</h6>
            </a>
            
            <!-- Cables & Connectors -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'CABLES & CONNECTORS']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">CABLES & CONNECTORS</h6>
            </a>
            
            <!-- External Storage -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'EXTERNAL STORAGE']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">EXTERNAL STORAGE</h6>
            </a>
            
            <!-- Live Streaming & Recording -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'LIVE STREAMING & RECORDING']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">LIVE STREAMING & RECORDING</h6>
            </a>
            
            <!-- Expansion Cards & Networking -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'EXPANSION CARDS & NETWORKING']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">EXPANSION CARDS & NETWORKING</h6>
            </a>
            
            <!-- Gift Voucher -->
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'GIFT VOUCHER']) }}" class="p-4 flex items-center justify-between hover:bg-gray-800 rounded-lg transition-colors duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4H5z" />
                </svg>
                <h6 class="font-bold text-white text-end" style="margin: 0%;">GIFT VOUCHER</h6>
            </a>
        </div>
    </div>
</div>
</div>

<!-- Offcanvas overlay -->
<div class="offcanvas-overlay hidden fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 z-40"></div>

<!-- OffCanvas Cart -->
<div id="offcanvas-cart" class="offcanvas offcanvas-cart fixed inset-y-0 right-0 w-full max-w-[400px] bg-black shadow-2xl transform transition-transform duration-300 ease-in-out z-50">
    <div class="inner flex flex-col h-full">
        <div class="head flex items-center justify-between p-4 border-b border-gray-800">
            <span class="title text-lg font-semibold text-white">Cart</span>
            <button class="offcanvas-close bg-white text-gray-300 hover:text-white text-2xl font-light w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-800 transition-colors duration-200">&times;</button>
        </div>
        <div class="body flex-1 overflow-y-auto p-4">
            <ul class="minicart-product-list space-y-4">
                <!--cart items will be inserted here-->
            </ul>
        </div>
        <div class="foot p-4 border-t border-gray-800">
            <div class="buttons flex flex-col gap-3">
                <a href="{{ route('cart') }}" class="btn block w-full text-center py-2 text-sm border border-gray-600 text-white rounded-md hover:bg-gray-800 transition-colors duration-200">View Cart</a>
                <a href="{{ route('cart') }}" class="btn block w-full text-center py-2 text-sm border border-gray-600 text-white rounded-md hover:bg-gray-800 transition-colors duration-200 mt-2">Checkout</a>

            </div>
        </div>
    </div>
</div>

<!-- OffCanvas Wishlist -->
<div id="offcanvas-wishlist" class="offcanvas offcanvas-cart fixed inset-y-0 right-0 w-full max-w-[400px] bg-black shadow-2xl transform transition-transform duration-300 ease-in-out z-50">
    <div class="inner flex flex-col h-full">
        <div class="head flex items-center justify-between p-4 border-b border-gray-800">
            <span class="title text-lg font-semibold text-white">Wishlist</span>
            <button class="offcanvas-close bg-white text-gray-300 hover:text-white text-2xl font-light w-10 h-10 flex items-center justify-center rounded-full hover:bg-gray-800 transition-colors duration-200">&times;</button>
        </div>
        <div class="body flex-1 overflow-y-auto p-4">
            <ul class="miniwishlist-product-list space-y-4">
                <!--wishlist items will be inserted here-->
            </ul>
        </div>
        <div class="foot p-4 border-t border-gray-800">
            <div class="buttons flex flex-col gap-3">
                <a href="{{ route('wishlist') }}" class="btn block w-full text-center py-2 text-sm border border-gray-600 text-white rounded-md hover:bg-gray-800 transition-colors duration-200">View Wishlist</a>
                <a href="{{ route('cart') }}" class="btn block w-full text-center py-2 text-sm border border-gray-600 text-white rounded-md hover:bg-gray-800 transition-colors duration-200 mt-2">View Cart</a>

            </div>
        </div>
    </div>
</div>

<style>
.offcanvas {
    transform: translateX(100%);
}
.offcanvas.open {
    transform: translateX(0);
}
body {
    font-family: 'Inter', sans-serif;
}
</style>

<script>
    // Mobile menu toggle functionality with animation
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenuClose = document.getElementById('mobile-menu-close');
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileOverlay = document.querySelector('.offcanvas-overlay');
    const categoryToggle = document.getElementById('category-toggle');
    const mobileCategoryToggle = document.getElementById('mobile-category-toggle');
    const categoryPopupOverlay = document.getElementById('category-popup-overlay');
    const categoryPopup = document.getElementById('category-popup');
    const categoryPopupClose = document.getElementById('category-popup-close');

    function toggleMobileMenu() {
        if (mobileMenu.classList.contains('hidden')) {
            // Open mobile menu
            mobileMenu.classList.remove('hidden');
            mobileOverlay.classList.remove('hidden');
            setTimeout(() => {
                mobileMenu.classList.remove('translate-x-full');
                mobileMenu.classList.add('translate-x-0');
                mobileOverlay.classList.add('opacity-100');
            }, 10);
        } else {
            // Close mobile menu
            mobileMenu.classList.remove('translate-x-0');
            mobileMenu.classList.add('translate-x-full');
            mobileOverlay.classList.remove('opacity-100');
            setTimeout(() => {
                mobileMenu.classList.add('hidden');
                mobileOverlay.classList.add('hidden');
            }, 300); // Match duration-300
        }
    }

    function toggleCategoryPopup() {
        if (categoryPopupOverlay.classList.contains('hidden')) {
            // Open category popup
            categoryPopupOverlay.classList.remove('hidden');
            setTimeout(() => {
                categoryPopup.classList.remove('scale-75', 'opacity-0');
                categoryPopup.classList.add('scale-100', 'opacity-100');
                categoryPopupOverlay.classList.add('opacity-100');
            }, 10);
            // Close mobile menu if open
            if (!mobileMenu.classList.contains('hidden')) {
                toggleMobileMenu();
            }
        } else {
            // Close category popup
            categoryPopup.classList.remove('scale-100', 'opacity-100');
            categoryPopup.classList.add('scale-75', 'opacity-0');
            categoryPopupOverlay.classList.remove('opacity-100');
            setTimeout(() => {
                categoryPopupOverlay.classList.add('hidden');
            }, 300); // Match duration-300
        }
    }

    mobileMenuButton.addEventListener('click', toggleMobileMenu);
    mobileMenuClose.addEventListener('click', toggleMobileMenu);
    mobileOverlay.addEventListener('click', () => {
        // Close both mobile menu and category popup if open
        if (!mobileMenu.classList.contains('hidden')) {
            toggleMobileMenu();
        }
        if (!categoryPopupOverlay.classList.contains('hidden')) {
            toggleCategoryPopup();
        }
    });
    categoryToggle.addEventListener('click', (e) => {
        e.preventDefault();
        toggleCategoryPopup();
    });
    mobileCategoryToggle.addEventListener('click', (e) => {
        e.preventDefault();
        toggleCategoryPopup();
    });
    categoryPopupClose.addEventListener('click', toggleCategoryPopup);
    categoryPopupOverlay.addEventListener('click', (e) => {
        if (e.target === categoryPopupOverlay) {
            toggleCategoryPopup();
        }
    });
</script>
<!-- OffCanvas Categories Start -->

<!--cart & wishlist logic-->
<script>
let cart = [];

function addToCart(prodID) {
    // Fetch product quantity from API before adding to cart
    fetch(`/product-quantity/${prodID}`)
        .then(response => response.json())
        .then(data => {
            const availableQty = data.qty;

            if (availableQty <= 0) {
                alert('This product is out of stock.');
                return;
            }

            // Product Data from PHP (Convert PHP array to JSON)
            const products = <?php echo json_encode($products); ?>;

            prodID = parseInt(prodID);

            // Find the product in products array
            const productToAdd = products.find(product => parseInt(product.id) === prodID);

            if (!productToAdd) {
                console.error('Product not found');
                return;
            }

            // Check if product already exists in cart
            const existingCartItem = cart.find(item => item.id === prodID);

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
                    id: productToAdd.id,
                    name: productToAdd.name,
                    price: productToAdd.dis_price,
                    image: productToAdd.image,
                    quantity: 1
                });
            }
                        // Update cart count in UI
                        updateCartCount();

                // Show success message
                updateCartModal(productToAdd);

                // Save cart to localStorage
                saveCartToStorage();

                // Log cart for debugging
                console.log('Current cart:', cart);

                // Update cart modal
                displayCartItems();


        })
        .catch(error => console.error('Error fetching product quantity:', error));
}


    // Function to update the cart modal with the latest item
    function updateCartModal(product) {
        const modal = document.getElementById('exampleModal-Cart');
        if (!modal) return;

        // Update image
        const imageElement = modal.querySelector('.tt-img img');
        if (imageElement) {
            imageElement.src = product.image;
            imageElement.alt = product.name;
        }

        // Update title
        const titleElement = modal.querySelector('.tt-title a');
        if (titleElement) {
            titleElement.textContent = product.name;
            titleElement.href = `singleProduct?product-id=${product.id}`;
        }
    }

    // Helper functions
    function updateCartCount() {
    const cartCount = cart.reduce((total, item) => total + item.quantity, 0);
    const cartCountElement = document.getElementById('cart-badge'); // Changed to match HTML
    if (cartCountElement) {
        cartCountElement.textContent = cartCount;
    }
}

    function saveCartToStorage() {
        localStorage.setItem('shopping-cart', JSON.stringify(cart));
    }

    // Load cart from storage on page load
    function initializeCart() {
        const savedCart = localStorage.getItem('shopping-cart');
        if (savedCart) {
            cart = JSON.parse(savedCart);
            updateCartCount();
        }
    }

    // Call initialization when page loads
    document.addEventListener('DOMContentLoaded', initializeCart);

    ///////////////////////////////////////////////////////////////
    // Function to display cart items in the offcanvas
    ///////////////////////////////////////////////////////////////
    function displayCartItems() {
        const cartList = document.querySelector('.minicart-product-list');
        const savedCart = localStorage.getItem('shopping-cart');

        if (!cartList) return;

        cartList.innerHTML = '';

        if (savedCart) {
            const cart = JSON.parse(savedCart);

            cart.forEach(item => {
                // Trim name to 25 characters
                const shortName = item.name.length > 25 
                    ? `${item.name.substring(0, 20)}...` 
                    : item.name;

                const li = document.createElement('li');
                li.className = 'flex py-2 gap-3 items-center';
                li.innerHTML = `
                    <a href="singleProduct?product-id=${item.id}" >
                        <img src="${item.image}" alt="${item.name}" class="w-12 h-12 object-cover">
                    </a>
                    <div class="content flex-1 min-w-0">
                        <div class="flex justify-between items-baseline gap-2">
                            <a href="singleProduct?product-id=${item.id}" 
                            class="title text-white text-sm truncate hover:text-gray-300"
                            title="${item.name}"> <!-- Full name shows on hover -->
                                ${shortName}
                            </a>
                            <a href="#" class="remove text-white hover:text-gray-300 text-xl font-light transition-colors" data-product-id="${item.id}">×</a>
                        </div>
                        <div class="flex justify-between items-center mt-1">
                            <span class="text-gray-300 text-xs">${item.quantity} × ${item.price}</span>
                            ${item.color || item.size ? 
                                `<span class="text-gray-400 text-xs">${item.color ? item.color : ''}${item.color && item.size ? ' • ' : ''}${item.size ? item.size : ''}</span>` 
                                : ''}
                        </div>
                    </div>
                `;
                cartList.appendChild(li);
            });

            addRemoveEventListeners();
        }

        updateCartTotal();
    }

    // Function to remove item from cart
    function removeFromCart(productId) {
        let cart = JSON.parse(localStorage.getItem('shopping-cart')) || [];

        // Remove item from cart
        cart = cart.filter(item => parseInt(item.id) !== parseInt(productId));

        // Update localStorage
        localStorage.setItem('shopping-cart', JSON.stringify(cart));

        // Refresh cart display
        displayCartItems();

        // Update cart count
        updateCartCount();
    }

    // Function to add event listeners to remove buttons
    function addRemoveEventListeners() {
        const removeButtons = document.querySelectorAll('.minicart-product-list .remove');
        removeButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                e.preventDefault();
                const productId = button.getAttribute('data-product-id');
                removeFromCart(productId);
            });
        });
    }

    // Function to update cart total
    function updateCartTotal() {
        const savedCart = localStorage.getItem('shopping-cart');
        const cart = savedCart ? JSON.parse(savedCart) : [];

        const total = cart.reduce((sum, item) => {
            const price = parseFloat(item.price.replace(/[^0-9.-]+/g, '')); // Remove currency symbol and commas
            return sum + (price * item.quantity);
        }, 0);

        // Update total display if you have a total element
        const totalElement = document.querySelector('.cart-total-amount');
        if (totalElement) {
            totalElement.textContent = `${total.toLocaleString()} LKR`;
        }
    }

    // Call displayCartItems when the offcanvas is opened
    document.addEventListener('DOMContentLoaded', () => {
        const cartButton = document.querySelector('[data-bs-target="#offcanvas-cart"]');
        if (cartButton) {
            cartButton.addEventListener('click', displayCartItems);
        }

        // Initial display
        displayCartItems();
    });
</script>
<script>
    let wishlist = [];

    function addToWishlist(prodID) {
        // Product Data from PHP (Convert PHP array to JSON)
        const products = <?php echo json_encode(value: $products); ?>;

        prodID = parseInt(prodID);

        // Find the product in products array
        const productToAdd = products.find(product => parseInt(product.id) === prodID);

        if (!productToAdd) {
            console.error('Product not found');
            return;
        }

        // Check if product already exists in wishlist
        const existingWishlistItem = wishlist.find(item => item.id === prodID);

        if (!existingWishlistItem) {
            // Add to wishlist if it doesn't exist (no quantity needed for wishlist)
            wishlist.push({
                id: productToAdd.id,
                name: productToAdd.name,
                price: productToAdd.dis_price,
                image: productToAdd.image
            });

            // Update wishlist count in UI
            updateWishlistCount();

            // Show success message or update UI as needed
            updateWishlistModal(productToAdd);

            // Save wishlist to localStorage
            saveWishlistToStorage();

            // Log wishlist for debugging
            console.log('Current wishlist:', wishlist);

            // Update wishlist modal
            displayWishlistItems();
        }
    }

    // Function to update the wishlist modal with the latest item
    function updateWishlistModal(product) {
        const modal = document.getElementById('exampleModal-Wishlist');
        if (!modal) return;

        // Update image
        const imageElement = modal.querySelector('.tt-img img');
        if (imageElement) {
            imageElement.src = product.image;
            imageElement.alt = product.name;
        }

        // Update title
        const titleElement = modal.querySelector('.tt-title a');
        if (titleElement) {
            titleElement.textContent = product.name;
            titleElement.href = `single-product.php?product-id=${product.id}`;
        }
    }

    // Helper functions
    function updateWishlistCount() {
    const wishlistCount = wishlist.length;
    const wishlistCountElement = document.getElementById('wishlist-badge'); // Changed to match HTML
    if (wishlistCountElement) {
        wishlistCountElement.textContent = wishlistCount;
    }
}

    function saveWishlistToStorage() {
        localStorage.setItem('wishlist-items', JSON.stringify(wishlist));
    }

    // Load wishlist from storage on page load
    function initializeWishlist() {
        const savedWishlist = localStorage.getItem('wishlist-items');
        if (savedWishlist) {
            wishlist = JSON.parse(savedWishlist);
            updateWishlistCount();
        }
    }

    // Function to display wishlist items in the offcanvas
    function displayWishlistItems() {
        const wishlistList = document.querySelector('.miniwishlist-product-list');
        const savedWishlist = localStorage.getItem('wishlist-items');

        if (!wishlistList) return;

        wishlistList.innerHTML = '';

        if (savedWishlist) {
            const wishlist = JSON.parse(savedWishlist);

            wishlist.forEach(item => {
                // Trim name to 20 characters (25 was too long for wishlist design)
                const shortName = item.name.length > 20 
                    ? `${item.name.substring(0, 20)}...` 
                    : item.name;

                const li = document.createElement('li');
                li.className = 'flex py-2 gap-3 items-center border-b border-gray-700 last:border-b-0';
                li.innerHTML = `
                    <a href="singleProduct?product-id=${item.id}" class="shrink-0">
                        <img src="${item.image}" alt="${item.name}" class="w-12 h-12 object-cover">
                    </a>
                    <div class="content flex-1 min-w-0">
                        <div class="flex justify-between items-baseline gap-2">
                            <a href="singleProduct?product-id=${item.id}" 
                            class="title text-white text-sm truncate hover:text-gray-300"
                            title="${item.name}">
                                ${shortName}
                            </a>
                            <a href="#" class="remove text-white hover:text-gray-300 text-xl font-light transition-colors" data-product-id="${item.id}">×</a>
                        </div>
                        <div class="flex justify-between items-center mt-1">
                            <span class="text-gray-300 text-xs">${item.price}</span>
                            <button class="add-to-cart text-xs text-gray-400 hover:text-white transition-colors" 
                                    data-product-id="${item.id}">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                `;
                wishlistList.appendChild(li);
            });

            addWishlistEventListeners();
        }
    }

    // Function to remove item from wishlist
    function removeFromWishlist(productId) {
        let wishlist = JSON.parse(localStorage.getItem('wishlist-items')) || [];

        // Remove item from wishlist
        wishlist = wishlist.filter(item => parseInt(item.id) !== parseInt(productId));

        // Update localStorage
        localStorage.setItem('wishlist-items', JSON.stringify(wishlist));

        // Refresh wishlist display
        displayWishlistItems();

        // Update wishlist count
        updateWishlistCount();
    }

    // Function to move item from wishlist to cart
    function moveToCart(productId) {
        const wishlistItem = wishlist.find(item => parseInt(item.id) === parseInt(productId));

        if (wishlistItem) {
            // Add to cart
            addToCart(productId);

            // Remove from wishlist
            removeFromWishlist(productId);
        }
    }

    // Function to add event listeners to wishlist buttons
    function addWishlistEventListeners() {
        const wishlistItems = document.querySelectorAll('.miniwishlist-product-list li');

        wishlistItems.forEach(item => {
            // Remove button
            const removeBtn = item.querySelector('.remove');
            if (removeBtn) {
                removeBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    const productId = removeBtn.getAttribute('data-product-id');
                    removeFromWishlist(productId);
                });
            }

            // Add to cart button
            const addToCartBtn = item.querySelector('.add-to-cart');
            if (addToCartBtn) {
                addToCartBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    const productId = addToCartBtn.getAttribute('data-product-id');
                    moveToCart(productId);
                });
            }
        });
    }

    // Initialize wishlist functionality when page loads
    document.addEventListener('DOMContentLoaded', () => {
        initializeWishlist();

        const wishlistButton = document.querySelector('[data-bs-target="#offcanvas-wishlist"]');
        if (wishlistButton) {
            wishlistButton.addEventListener('click', displayWishlistItems);
        }

        // Initial display
        displayWishlistItems();
    });
</script>




<div class="modal fade" id="exampleModal-search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="background-color: rgba(0, 0, 0, 0.7);">
    <div class="modal-dialog p-0" style="background-color: rgba(0, 0, 0, 0.7);">
        <div class="modal-content p-0" style="background-color: rgba(0, 0, 0, 0.7);">
            <div class="modal-body p-3 m-0">
                <form onsubmit="event.preventDefault(); searchProduct(this.search.value);">
                    <div class="flex gap-3 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input type="text" name="search" class="form-control" placeholder="Search..." style="width: 100%; background-color: #1a1a1a; color: #ffffff; border: none; border-radius: 6px; padding: 8px 12px; font-size: 14px; outline: none; transition: box-shadow 0.2s;" placeholder="Search products..." onfocus="this.style.boxShadow='0 0 0 2px #3b82f6';" onblur="this.style.boxShadow='none';">
                    </div>
                </form>
                <div class="flex flex-col gap-1 mt-1">
                    <p >Showing top 3 results</p>
                    <ul>
                        <li onclick="window.location.href = '{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'LAPTOPS']) }}'" class="flex gap-3 items-center text-white hover:bg-blue-900 rounded-sm px-2 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                            </svg>
                            Laptops
                        </li>
                        <li onclick="window.location.href = '{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'APPLE PRODUCTS']) }}'" class="flex gap-3 items-center text-white hover:bg-blue-900 rounded-sm px-2 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                            </svg>
                            Smart Phones
                        </li>
                        <li onclick="window.location.href = '{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'RAM']) }}'" class="flex gap-3 items-center text-white hover:bg-blue-900 rounded-sm px-2 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                            </svg>
                            RAM
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function searchProduct(searchQuery) {
        window.location.href = `/products?sort=name_asc&search=${encodeURIComponent(searchQuery)}`;
    }
</script>
