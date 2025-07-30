<div class="{{ request()->is('/') ? 'w-full p-2 px-3 z-50 fixed top-0' : 'w-full p-2 px-3 z-50 absolute' }}">
<nav class="bg-[#010117] text-white h-[10dvh] flex justify-center items-center rounded-full w-full">
    <div class="px-4 flex justify-between items-center w-full">
        <a href="{{ route('home') }}" class="flex items-center">
            <img src="assets/images/logo/N_white.png" alt="udarata" class="h-15 mr-4">
        </a>
        <div class="flex items-center space-x-6 max-lg:hidden">
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'ALL']) }}" class="text-white uppercase font-bold text-center max-xl:text-sm">Products</a>
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'ALL']) }}" class="text-white uppercase font-bold text-center max-xl:text-sm">Accessories</a>
            <a href="/products?filter=LAPTOPS&sort=name_asc" class="text-white uppercase font-bold text-center max-xl:text-sm">Laptops</a>
            <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'APPLE PRODUCTS']) }}" class="text-white uppercase font-bold text-center max-xl:text-sm">Mobile</a>
            <a href="{{ route('aboutUs') }}" class="text-white uppercase font-bold text-center max-xl:text-sm">About Us</a>
            <a href="{{ route('contact') }}" class="text-white uppercase font-bold text-center max-xl:text-sm">Contact Us</a>
            <a href="{{ route('myAcc') }}" class="text-white uppercase font-bold text-center max-xl:text-sm">My Account</a>
            <a href="{{ route('buildMyPC')}}" class="text-white uppercase font-bold text-center max-xl:text-sm">Build My PC</a>

        </div>
        <div class="flex items-center space-x-4">
                <a data-bs-toggle="modal" data-bs-target="#exampleModal-search" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </a>
                <a href="#offcanvas-cart" class="text-white offcanvas-toggle relative">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
    </svg>
    <span class="absolute inset-3 object-right-top -mr-6 -top-4">
        <div class="inline-flex items-center px-1 border-white rounded-full text-xs font-semibold leading-4 bg-white text-black">
            <p id="cart-badge"></p>
        </div>
    </span>
</a>

<a href="#offcanvas-wishlist" class="text-white offcanvas-toggle relative">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 18 18">
        <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132" />
    </svg>
    <span class="absolute inset-3 object-right-top -mr-6 -top-4">
        <div class="inline-flex items-center px-1 border-white rounded-full text-xs font-semibold leading-4 bg-white text-black">
            <p id="wishlist-badge"></p>
        </div>
    </span>
</a>
                <a href="#offcanvas-categories" class="text-white offcanvas-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor"
                        class="bi bi-list scale-150" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                    </svg>
                </a>
            </div>
    </div>
</nav>
</div>
<!--offcanvas for categories (old) data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" -->
<div class="offcanvas offcanvas-start red-custom-scroll p-0" data-bs-backdrop="false" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel"
    style="background:white;z-index:999;">
    <div class="offcanvas-header justify-between items-center bg-gray-900">
        <h2 class="text-2xl font-bold text-center text-white">Categories</h2>
        <button type="button" style="width: 30px;height:30px" class="btn btn-light text-white hover:text-gray-200 cursor-pointer border-1 p-1 rounded-lg" data-bs-dismiss="offcanvas" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg"
                viewBox="0 0 16 16">
                <path
                    d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
            </svg>
        </button>
    </div>
    <div class="offcanvas-body bg-gray-900 red-custom-scroll">
        <div class="bg-gray-900 text-white">
            <div class="grid grid-cols-1 gap-6">
                <a href="product-category.php?filter=LAPTOPS&sort=name_asc" class="bg-gray-500 rounded-lg p-4 flex items-center justify-between"
                    style="background: white;">
                    <img src="assets/images/category/1697178958_laptops_laptop.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">LAPTOPS</h6>
                </a>
                <a href="product-category.php?filter=ASUS%20ROG&sort=name_asc" class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1691938347_asus_rog_29-asus-logo-rog-icon-symbol-26.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">ASUS ROG</h6>
                </a>
                <a href="product-category.php?filter=APPLE%20PRODUCTS&sort=name_asc" class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1691938365_apple_products_33-apple.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">APPLE PRODUCTS</h6>
                </a>
                <a href="product-category.php?filter=GAMING%20CONSOLE&sort=name_asc" class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1697179045_gaming_console_wireless2 (8).png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">GAMING CONSOLE</h6>
                </a>
                <a href="product-category.php?filter=PROCESSOR&sort=name_asc" class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1697179065_processors_1 (7).png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">PROCESSORS</h6>
                </a>
                <a href="product-category.php?filter=MOTHERBOARD&sort=name_asc" class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1697179145_motherboards_board.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">MOTHERBOARDS</h6>
                </a>
                <a href="product-category.php?filter=RAM&sort=name_asc" class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1697179167_memory_ram_ram memory.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">MEMORY (RAM)</h6>
                </a>
                <a href="product-category.php?filter=GRAPHIC%20CARDS&sort=name_asc" class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1697179212_graphic_cards_vga card.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">GRAPHIC CARDS</h6>
                </a>
                <a class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1691938461_powered_by_asus_31-Powered_by_ASUS_Black.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">POWERED BY ASUS</h6>
                </a>
                <a class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1691938477_commercial_solutions_26-Asus Logo.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">COMMERCIAL SOLUTIONS</h6>
                </a>
                <a href="product-category.php?filter=CASINGS&sort=name_asc" class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1697179233_casings_wireless2 (7).png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">CASINGS</h6>
                </a>
                <a href="product-category.php?filter=POWER%20SUPPLY&sort=name_asc" class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1697179291_power_supply_ups_surge_protectors_cable.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">POWER SUPPLY, UPS & SURGE PROTECTORS</h6>
                </a>
                <a class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1697179312_cooling_and_lighting_gaming fan.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">COOLING & LIGHTING</h6>
                </a>
                <a class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1697179339_storage_and_nas_hard disk.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">STORAGE & NAS</h6>
                </a>
                <a class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1697179351_monitors_and_accessories_monitor.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">MONITORS & ACCESSORIES</h6>
                </a>
                <a class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1697179398_optical_drivers_and_printers_wireless2 (23).png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">OPTICAL DRIVERS & PRINTERS</h6>
                </a>
                <a class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1697179477_speakers_and_headphones_wireless2 (15).png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">SPEAKERS & HEADPHONES</h6>
                </a>
                <a class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1697179509_keyboars_mice_and_gamepads_wireless2 (24).png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">KEYBOARDS, MOUSE & GAMEPADS</h6>
                </a>
                <a class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1691938652_graphics_tablet_tab_35-1077685.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">GRAPHICS TABLET / TAB</h6>
                </a>
                <a class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1697179672_desktop_workstations_cpu 2.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">DESKTOP WORKSTATIONS</h6>
                </a>
                <a class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1691938688_gaming_desktops_20-3312339-200.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">GAMING DESKTOPS</h6>
                </a>
                <a class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1697179650_budget_desktop_computers_cpu.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">BUDGET DESKTOP COMPUTERS</h6>
                </a>
                <a class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1691938742_gaming_chairs_27-barber-chair.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">GAMING CHAIRS</h6>
                </a>
                <a class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1697179564_cables_and_connetctors_power cable.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">CABLES & CONNECTORS</h6>
                </a>
                <a class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1697179575_external_storage_wireless2 (20).png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">EXTERNAL STORAGE</h6>
                </a>
                <a class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1691938788_live_streaminge_and_recording_14-2177994.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">LIVE STREAMING & RECORDING</h6>
                </a>
                <a class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1697179622_expansion_cards_and_networking_wireless2 (10).png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">EXPANSION CARDS & NETWORKING</h6>
                </a>
                <a class="bg-gray-500 rounded-lg p-4 flex items-center justify-between" style="background: white;">

                    <img src="assets/images/category/1691938823_gift_voucher_36-png.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end">GIFT VOUCHER</h6>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- offcanvas overlay start -->
<div class="offcanvas-overlay"></div>
<!-- OffCanvas Cart Start -->
<div id="offcanvas-cart" class="offcanvas offcanvas-cart red-custom-scroll">
    <div class="inner">
        <div class="head">
            <span class="title">Cart</span>
            <button class="offcanvas-close">×</button>
        </div>
        <div class="body customScroll">
            <ul class="minicart-product-list">
                <!--cart items will be inserted here-->
            </ul>
        </div>
        <div class="foot">
            <div class="buttons my-[30px]">
                <a href="{{ route('cart') }}" class="btn btn-dark btn-hover-primary mb-30px">view cart</a>
                <a href="{{ route('cart') }}" class="btn btn-dark btn-hover-primary mb-30px">checkout</a>
            </div>
        </div>
    </div>
</div>
<!-- OffCanvas Wishlist Start -->
<div id="offcanvas-wishlist" class="offcanvas offcanvas-cart red-custom-scroll">
    <div class="inner">
        <div class="head">
            <span class="title">Wishlist</span>
            <button class="offcanvas-close">×</button>
        </div>
        <div class="body customScroll">
            <ul class="miniwishlist-product-list">
                <!--wishlist items will be inserted here-->
            </ul>
        </div>
        <div class="foot">
            <div class="buttons my-[30px]">
                <a href="{{ route('wishlist')}}" class="btn btn-dark btn-hover-primary mb-30px">view wishlist</a>
                <a href="{{ route('cart') }}" class="btn btn-outline-dark current-btn">view cart</a>
            </div>
        </div>
    </div>
</div>
<!-- OffCanvas Categories Start -->
<div id="offcanvas-categories" class="offcanvas offcanvas-cart red-custom-scroll normal-w-on-lg">
    <div class="inner">
        <div class="head align-items-center">
            <span class="title text-white">Categories</span>
            <button class="offcanvas-close text-white">×</button>
        </div>
        <div class="body customScroll">
            <div class="grid grid-cols-1 gap-2 pb-2">
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'LAPTOPS']) }}" class="bg-gray-500 p-4 flex items-center justify-between"
                    style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">
                    <img src="assets/images/category/1697178958_laptops_laptop.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">LAPTOPS</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'brand' => 'ASUS']) }}" class="bg-gray-500 p-4 flex items-center justify-between" 
                style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1691938347_asus_rog_29-asus-logo-rog-icon-symbol-26.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">ASUS ROG</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'APPLE PRODUCTS']) }}" class="bg-gray-500 p-4 flex items-center justify-between" 
                style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1691938365_apple_products_33-apple.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">APPLE PRODUCTS</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'GAMING CONSOLE']) }}" class="bg-gray-500 p-4 flex items-center justify-between" 
                style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1697179045_gaming_console_wireless2 (8).png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">GAMING CONSOLE</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'PROCESSOR']) }}" class="bg-gray-500 p-4 flex items-center justify-between"
                 style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1697179065_processors_1 (7).png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">PROCESSORS</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'MOTHERBOARD']) }}" class="bg-gray-500 p-4 flex items-center justify-between" 
                style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1697179145_motherboards_board.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">MOTHERBOARDS</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'RAM']) }}" class="bg-gray-500 p-4 flex items-center justify-between" 
                style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1697179167_memory_ram_ram memory.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">MEMORY (RAM)</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'GRAPHIC CARDS']) }}" class="bg-gray-500 p-4 flex items-center justify-between" 
                style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1697179212_graphic_cards_vga card.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">GRAPHIC CARDS</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'brand' => 'ASUS']) }}" 
                class="bg-gray-500 p-4 flex items-center justify-between" 
                style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1691938461_powered_by_asus_31-Powered_by_ASUS_Black.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">POWERED BY ASUS</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'COMMERCIAL SOLUTIONS']) }}"
                 class="bg-gray-500 p-4 flex items-center justify-between" 
                 style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1691938477_commercial_solutions_26-Asus Logo.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">COMMERCIAL SOLUTIONS</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'CASINGS']) }}" class="bg-gray-500 p-4 flex items-center justify-between" 
                style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1697179233_casings_wireless2 (7).png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">CASINGS</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'POWER SUPPLY']) }}" class="bg-gray-500 p-4 flex items-center justify-between" 
                style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1697179291_power_supply_ups_surge_protectors_cable.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">POWER SUPPLY, UPS & SURGE PROTECTORS</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'COOLING & LIGHTING']) }}" 
                class="bg-gray-500 p-4 flex items-center justify-between" style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1697179312_cooling_and_lighting_gaming fan.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">COOLING & LIGHTING</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'STORAGE & NAS']) }}" 
                class="bg-gray-500 p-4 flex items-center justify-between" style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1697179339_storage_and_nas_hard disk.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">STORAGE & NAS</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'MONITORS & ACCESSORIES']) }}" 
                class="bg-gray-500 p-4 flex items-center justify-between" style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1697179351_monitors_and_accessories_monitor.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">MONITORS & ACCESSORIES</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'OPTICAL DRIVERS & PRINTERS']) }}" 
                class="bg-gray-500 p-4 flex items-center justify-between" style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1697179398_optical_drivers_and_printers_wireless2 (23).png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">OPTICAL DRIVERS & PRINTERS</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'SPEAKERS & HEADPHONES']) }}" 
                class="bg-gray-500 p-4 flex items-center justify-between" style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1697179477_speakers_and_headphones_wireless2 (15).png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">SPEAKERS & HEADPHONES</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'KEYBOARDS, MOUSE & GAMEPADS']) }}" 
                class="bg-gray-500 p-4 flex items-center justify-between" style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1697179509_keyboars_mice_and_gamepads_wireless2 (24).png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">KEYBOARDS, MOUSE & GAMEPADS</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'GRAPHICS TABLET / TAB']) }}" 
                class="bg-gray-500 p-4 flex items-center justify-between" style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1691938652_graphics_tablet_tab_35-1077685.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">GRAPHICS TABLET / TAB</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'DESKTOP WORKSTATIONS']) }}" 
                class="bg-gray-500 p-4 flex items-center justify-between" style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1697179672_desktop_workstations_cpu 2.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">DESKTOP WORKSTATIONS</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'GAMING DESKTOPS']) }}" 
                class="bg-gray-500 p-4 flex items-center justify-between" style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1691938688_gaming_desktops_20-3312339-200.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">GAMING DESKTOPS</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'BUDGET DESKTOP COMPUTERS']) }}" 
                class="bg-gray-500 p-4 flex items-center justify-between" style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1697179650_budget_desktop_computers_cpu.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">BUDGET DESKTOP COMPUTERS</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'GAMING CHAIRS']) }}" 
                class="bg-gray-500 p-4 flex items-center justify-between" style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1691938742_gaming_chairs_27-barber-chair.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">GAMING CHAIRS</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'CABLES & CONNECTORS']) }}" 
                class="bg-gray-500 p-4 flex items-center justify-between" style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1697179564_cables_and_connetctors_power cable.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">CABLES & CONNECTORS</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'EXTERNAL STORAGE']) }}" 
                class="bg-gray-500 p-4 flex items-center justify-between" style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1697179575_external_storage_wireless2 (20).png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="ffont-bold text-end" style="margin: 0%;">EXTERNAL STORAGE</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'LIVE STREAMING & RECORDING']) }}" 
                class="bg-gray-500 p-4 flex items-center justify-between" style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1691938788_live_streaminge_and_recording_14-2177994.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">LIVE STREAMING & RECORDING</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'EXPANSION CARDS & NETWORKING']) }}" 
                class="bg-gray-500 p-4 flex items-center justify-between" style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1697179622_expansion_cards_and_networking_wireless2 (10).png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">EXPANSION CARDS & NETWORKING</h6>
                </a>
                <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'GIFT VOUCHER']) }}" 
                class="bg-gray-500 p-4 flex items-center justify-between" style="background: white; border-bottom: 1px solid #ebebeb; border-radius: 18px;">

                    <img src="assets/images/category/1691938823_gift_voucher_36-png.png" alt="Laptop" class="w-10 h-10 object-contain">
                    <h6 class="font-bold text-end" style="margin: 0%;">GIFT VOUCHER</h6>
                </a>
            </div>
        </div>
        <div class="foot">

        </div>
    </div>
</div>
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

        // Clear existing items
        cartList.innerHTML = '';

        if (savedCart) {
            const cart = JSON.parse(savedCart);

            cart.forEach(item => {
                const li = document.createElement('li');
                li.innerHTML = `
                <a href="singleProduct?product-id=${item.id}" class="image">
                    <img src="${item.image}" alt="Cart product Image">
                </a>
                <div class="content">
                    <a href="singleProduct?product-id=${item.id}" class="title">${item.name}</a>
                    <span class="quantity-price">${item.quantity} x <span class="amount">${item.price}</span></span>
                    <a href="#" class="remove" data-product-id="${item.id}">×</a>
                </div>
            `;
                cartList.appendChild(li);
            });

            // Add event listeners to remove buttons
            addRemoveEventListeners();
        }

        // Update cart total
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

        // Clear existing items
        wishlistList.innerHTML = '';

        if (savedWishlist) {
            const wishlist = JSON.parse(savedWishlist);

            wishlist.forEach(item => {
                const li = document.createElement('li');
                li.innerHTML = `
                <a href="singleProduct?product-id=${item.id}" class="image">
                    <img src="${item.image}" alt="Wishlist product Image">
                </a>
                <div class="content">
                    <a href="singleProduct?product-id=${item.id}" class="title">${item.name}</a>
                    <span class="quantity-price"><span class="amount">${item.price}</span></span>
                    <a href="#" class="remove" data-product-id="${item.id}">×</a>
                </div>
            `;
                wishlistList.appendChild(li);
            });

            // Add event listeners to remove and add-to-cart buttons
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




<div class="modal fade" id="exampleModal-search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog p-0">
        <div class="modal-content p-0">
            <div class="modal-body p-3 m-0">
                <form onsubmit="event.preventDefault(); searchProduct(this.search.value);">
                    <div class="flex gap-3 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        <input type="text" name="search" class="form-control" placeholder="Search...">
                    </div>
                </form>
                <div class="flex flex-col gap-1 mt-1">
                    <p>Showing top 3 results</p>
                    <ul>
                        <li onclick="window.location.href = '{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'LAPTOPS']) }}'" class="flex gap-3 items-center hover:bg-blue-200 rounded-sm px-2 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                            </svg>
                            Laptops
                        </li>
                        <li onclick="window.location.href = '{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'APPLE PRODUCTS']) }}'" class="flex gap-3 items-center hover:bg-blue-200 rounded-sm px-2 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                            </svg>
                            Smart Phones
                        </li>
                        <li onclick="window.location.href = '{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'RAM']) }}'" class="flex gap-3 items-center hover:bg-blue-200 rounded-sm px-2 cursor-pointer">
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
