<!-- Footer Area Start -->
<div class="footer-area border-t">
    <div class="footer-container dark-blue-bg text-white">
        <div class="footer-top">
            <div class="px-6">
                <div class="grid xl:grid-cols-4">
                    <div class="footer-logo flex max-xl:justify-center items-center">
                        <a href="{{ route('home')}}">
                            <img src="assets/images/logo/N_white.png" alt="" class="h-[200px] w-full object-contain max-xl:h-[100px] object-contain">
                        </a>
                    </div>
                    <div class="mb-lm-30px xl:pl-6">
                        <div class="single-wedge h-full flex flex-col justify-center">
                            <h4 class="footer-herading text-white">Services</h4>
                            <ul>
                                <li>
                                    <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'GAMING CONSOLE']) }}" class="text-white">Gaming Consoles</a>
                                </li>
                                <li>
                                    <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'LAPTOPS']) }}" class="text-white">Laptops</a>
                                </li>
                                <li>
                                    <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'CASINGS']) }}" class="text-white">Casings</a>
                                </li>
                                <li>
                                    <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'PROCESSOR']) }}" class="text-white">GPUs</a>
                                </li>
                                <li>
                                    <a href="{{ route('product.category', ['sort' => 'name_asc', 'filter' => 'APPLE PRODUCTS']) }}" class="text-white">Smart Phones</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mb-lm-30px xl:pl-6">
                        <div class="single-wedge h-full flex flex-col justify-center">
                            <h4 class="footer-herading text-white">Profile</h4>
                            <ul>
                                <li>
                                    <a href="{{ route('wishlist')}}" class="text-white">Wishlist</a>
                                </li>
                                <li>
                                    <a href="{{ route('cart')}}" class="text-white">Shopping Cart</a>
                                </li>
                                <li>
                                    <a href="{{ route('wishlist')}}" class="text-white">Checkout</a>
                                </li>
                                <li>
                                    <a href="#" class="text-white">Blog</a>
                                </li>
                                <li>
                                    <a href="{{ route('myAcc') }}" class="text-white">Login</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mb-lm-30px xl:pl-6 max-xl:mt-4 flex flex-col justify-between">
                        <div class="single-wedge flex flex-col justify-between h-full">
                            <h4 class="footer-herading text-white">Contact Info</h4>
                            <div class="footer-links text-white flex flex-col gap-2">
                                <p class="text-white text-sm">
                                    <strong>
                                        Address:
                                    </strong>
                                    NovaLink Computers,
                                    No. 12/B,
                                    Galle Road,
                                    Matara.
                                </p>
                                <p class="phone text-white text-sm">
                                    <strong>Phone:</strong>
                                    <a href="tel:0769417154" class=" text-white"> 0769417154</a>
                                </p>
                                <p class="phone text-white text-sm hidden">
                                    <strong>Phone:</strong>
                                    <a href="tel:+94456533121" class=" text-white"> +94 456 533 121</a>
                                </p>
                                <p class="mail text-white text-sm">
                                    <strong>Email:</strong>
                                    <a href="mailto:novaLinkcomputers@gmail.com" class=" text-white"> novaLinkcomputers@gmail.com</a>
                                </p>
                            </div>
                            <ul class="flex gap-2 mt-3 justify-end">
                                <li class="w-8 hover:scale-105 transition-all">
                                    <a href="#" rel="noopener noreferrer">
                                        <img src="assets/images/icons/fb.png" alt="" class="w-8">
                                    </a>
                                </li>
                                <li class="w-8 hover:scale-105 transition-all">
                                    <a href="#" rel="noopener noreferrer">
                                        <img src="assets/images/icons/insta.png" alt="" class="w-8">
                                    </a>
                                </li>
                                <li class="w-8 hover:scale-105 transition-all">
                                    <a href="#" rel="noopener noreferrer">
                                        <img src="assets/images/icons/tk.png" alt="" class="w-8">
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <div class="mb-lm-30px xl:pl-6 max-xl:mt-4 flex flex-col justify-center items-center hidden">
                        <ul class="flex gap-2 mt-3 justify-end">
                            <li class="w-8 hover:scale-105 transition-all">
                                <a href="#" rel="noopener noreferrer">
                                    <img src="assets/images/icons/fb.png" alt="" class="w-8">
                                </a>
                            </li>
                            <li class="w-8 hover:scale-105 transition-all">
                                <a href="#" rel="noopener noreferrer">
                                    <img src="assets/images/icons/insta.png" alt="" class="w-8">
                                </a>
                            </li>
                            <li class="w-8 hover:scale-105 transition-all">
                                <a href="#" rel="noopener noreferrer">
                                    <img src="assets/images/icons/tk.png" alt="" class="w-8">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!--#2d3748-->
        <div class="footer-bottom dark-blue-bg border-t border-[#aaa]">
            <div class="container text-white">
                <div class="">
                    <p class="w-full text-center">2025 © All Rights Reserved | NovaLink Computers </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer Area End -->