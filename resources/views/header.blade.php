<!doctype html>
<html class="no-js" lang="zxx">
   
<!-- Mirrored from html.hixstudio.net/ishpat-prev/ishpat/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jan 2025 10:23:48 GMT -->
<head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Ishpat – Construction HTML Template </title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Place favicon.ico in the root directory -->
      <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/logo/logo.png') }}">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

      <!-- CSS here -->
      <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
      <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
      <link rel="stylesheet" href="{{ asset('css/swiper-bundle.css') }}">
      <link rel="stylesheet" href="{{ asset('css/swiper-gl.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
      <link rel="stylesheet" href="{{ asset('css/font-awesome-pro.css') }}"> 
      <link rel="stylesheet" href="{{ asset('css/flaticon_ishpat.css') }}">
      <link rel="stylesheet" href="{{ asset('css/spacing.css') }}">
      <link rel="stylesheet" href="{{ asset('css/main.css') }}">
      <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}">
      
   </head>
   <body>
      <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->


      <!-- mouse cursor drag start -->
      <div class="mouseCursor cursor-outer"></div>
      <div class="mouseCursor cursor-inner"><span><img src="{{ asset('img/icon/mouse-cursor.svg')}}" alt=""></span></div>
      <!-- mouse cursor drag end -->

      <!-- pre loader area start -->
      <div id="loading">
         <div id="loading-center">
            <div id="loading-center-absolute">
               <div class="tp-preloader-content">
                  <div class="tp-preloader-logo">
                     <div class="tp-preloader-circle">
                        <svg width="190" height="190" viewBox="0 0 380 380" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <circle stroke="#D9D9D9" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round">
                           </circle>
                           <circle stroke="red" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round"></circle>
                        </svg>
                        <img class="logo" src="{{ asset('img/logo/logo.png')}}" alt="">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- pre loader area end -->


      <!-- back to top start -->
      <div class="back-to-top-wrapper">
         <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>               
         </button>
      </div>
      <!-- back to top end -->


      <!-- search area start -->
      <div class="search-area">
         <div class="search-inner p-relative">
            <div class="container">
               <div class="row justify-content-center">
                  <div class="col-lg-8">
                     <div class="search-wrapper">
                        <div class="search-close">
                           <button class="search-close-btn">
                              <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>
                           </button>
                        </div>
                        <div class="search-content pt-35">
                           <h3 class="heading text-center mb-30">Hi! How can we help You?</h3>
                           <div class="d-flex justify-content-center">
                              <div class="search w-100 p-relative">
                                 <input type="text" class="search-input" placeholder="Search...">
                                 <a href="#" class="search-icon">
                                 <i class="fa fa-search"></i>
                                 </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="search-overlay"></div>
      <!-- search area end -->

      <!-- offcanvas area start -->
      <div class="offcanvas__area">
         <div class="offcanvas__close">
            <button class="offcanvas__close-btn offcanvas-close-btn">
               <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
               </svg>
            </button>
         </div>
         <div class="offcanvas__wrapper">
            <div class="offcanvas__content">
               <div class="offcanvas__top mb-40">
                  <div class="offcanvas__logo">
                     <a href="{{ asset('home') }}">
                        <img class="logo" src="{{ asset('img/logo/logo.png')}}" alt="logo">
                     </a>
                  </div>
               </div>

               <div class="tp-main-menu-mobile fix d-xl-none mb-30"></div>
               
               </div>
               <div class="offcanvas-info mb-30">
                  <h4 class="offcanvas__title">Contacts</h4>
                  <div class="offcanvas__contact-content d-flex">
                     <div class="offcanvas__contact-content-icon">
                        <i class="fa-sharp fa-solid fa-location-dot"></i>
                     </div>
                     <div class="offcanvas__contact-content-content">
                        <a href="https://www.google.com/maps/search/86+Road+Broklyn+Street,+600+New+York,+USA/@40.6897806,-74.0278086,12z/data=!3m1!4b1">86 Road Broklyn Street, 600 </a>
                     </div>
                  </div>
                  <div class="offcanvas__contact-content d-flex">
                     <div class="offcanvas__contact-content-icon">
                        <i class="fa-solid fa-envelope"></i>
                     </div>
                     <div class="offcanvas__contact-content-content">
                        <a href="mailto:needhelp@company.com"> Needhelp@company.com  </a>
                     </div>
                  </div>
                  <div class="offcanvas__contact-content d-flex">
                     <div class="offcanvas__contact-content-icon">
                        <i class="fa-solid fa-phone"></i>
                     </div>
                     <div class="offcanvas__contact-content-content">
                        <a href="tel:01310-069824"> +92 666 888 0000</a>
                     </div>
                  </div>
               </div>
               <div class="offcanvas__social">
                  <a class="icon facebook" href="#"><i class="fab fa-facebook-f"></i></a>
                  <a class="icon twitter" href="#"><i class="fab fa-twitter"></i></a>
                  <a class="icon youtube" href="#"><i class="fab fa-youtube"></i></a>
                  <a class="icon linkedin" href="#"><i class="fab fa-linkedin"></i></a>
               </div>
            </div>
         </div>
      </div>
      <div class="body-overlay"></div>
      <!-- offcanvas area end -->


      <div class="tp-page-wrapper">
        
            <!-- header area start -->
            <header class="tp-header-area p-relative">
         
         <div class="tp-header-main-sticky tp-header-main p-relative">
            <div class="container container-large">
               <div class="row align-items-center">
                  <div class="col-lg-2 col-md-3 col-6">
                     <div class="tp-header-logo">
                        <a href="{{ asset('home') }}">
                           <img class="logo" src="{{ asset('img/logo/logo.png')}}" alt="">
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-7 d-none d-lg-block">
                     <div class="tp-header-main-menu">
                        <div class="tp-main-menu d-none d-xl-block">
                           <nav class="tp-main-menu-content">
                              <ul>
                                 <li>
                                    <a href="{{ asset('home') }}">Home</a>
                                    
                                 </li>
                                 <li class="has-dropdown"><a href="#">Download Construction Plan</a>
                                    <ul class="submenu">
                                       <li><a href="{{ asset('about') }}">Housing Plans</a></li>
                                       <li><a href="{{ asset('history') }}">Cabana</a></li>
                                       <li><a href="{{ asset('pricing') }}">Garage</a></li>
                                       <li><a href="testimonial.html">Guard Rooms</a></li>
                                       <li><a href="team.html">Concrete Stones</a></li>
                                       <li><a href="team-details.html">View More</a></li>
                                       <li><a href="error.html">Restaurants </a></li>
                                       <li><a href="error.html">Warehouses </a></li>
                                       <li><a href="error.html">Shops </a></li>
                                       <li><a href="error.html">Factories </a></li>
                                    </ul>
                                 </li>
                                 <li class="has-dropdown">
                                    <a href="service.html">Ready Made Doors/Windows</a>
                                    <ul class="submenu">
                                       <li><a href="service.html">Main Doors</a></li>
                                       <li><a href="service-details.html">Wooden Doors for Rooms</a></li>
                                       <li><a href="service-details.html">Aluminium Doors for Rooms</a></li>
                                       <li><a href="service-details.html">Wooden Windows</a></li>
                                       <li><a href="service-details.html">Aluminium Windows</a></li>
                                       <li><a href="service-details.html">Steel Doors</a></li>
                                    </ul>
                                 </li>
                              </ul>
                           </nav>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-9 col-6">
                     <div class="tp-header-main-right d-flex align-items-center justify-content-end">
                        <div class="tp-header-contact d-xl-flex align-items-center">
                           <div class="tp-header-btn d-none d-xl-block">
                           <a class="tp-btn tp-icon-style d-none d-xl-block" href="{{ asset('login') }}">Login<span>
                              <svg class="qodef-svg--custom-arrow qodef-m-arrow" xmlns="http://www.w3.org/2000/svg" width="14.2" height="14.2" viewBox="0 0 14.2 14.2">
                                 <g><path d="M13.2 9V1h-8M13.4.8.7 13.5"></path><path d="M13.2 9V1h-8M13.4.8.7 13.5"></path></g>
                                 <g><path d="M13.2 9V1h-8M13.4.8.7 13.5"></path><path d="M13.2 9V1h-8M13.4.8.7 13.5"></path></g>
                              </svg>
                           </span></a>
                           </div>
                              <div class="tp-header-btn d-none d-xl-block">
                              <div class="dropdown">
                                 <button class="tp-btn tp-icon-style dropdown-toggle" type="button" id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Translate
                                 </button>
                                 <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                                    <li>
                                    <div id="google_translate_element"></div></li>
                                 </ul>
                              </div>
                              </div>
                              <div id="google_translate_element" style="display: none;"></div>

                           <div class="tp-header-hamburger d-xl-none offcanvas-open-btn">
                              <button class="hamburger-btn">
                                 <span></span>
                                 <span></span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>

          </header>
      <!-- header area end -->