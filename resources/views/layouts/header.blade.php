<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->


<!-- Mirrored from themesflat.co/html/remos/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Dec 2024 18:12:21 GMT -->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>NovaLink Computers | Dashboard</title>
    <meta name="description" content="NovaLink Computers offer the best computers available at the market">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/N_back.jpg" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    <meta name="author" content="themesflat.com">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstraps.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">



    <!-- Font -->
    <link rel="stylesheet" href="{{ asset('fonts/fonts.css')}}">

    <!-- Icon -->
    <link rel="stylesheet" href="{{ asset('icon/style.css')}}">

    <!-- Favicon and Touch Icons  -->

</head>

<body class="body">

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <!-- layout-wrap -->
           <div class="layout-wrap">
                <!-- preload -->
                <div id="preload" class="preload-container hidden">
                    <div class="preloading">
                        <span></span>
                    </div>
                </div>
                <!-- /preload -->
                 
                <!-- section-menu-left -->
                <div class="section-menu-left">
                <div class="box-logo">
                        <a href="#" id="site-logo-inner">
                            <img class="logo" id="logo_header" alt="" src="{{ asset('assets/images/n_logo_remove_new.png')}}" data-light="{{ asset('assets/images/n_logo_remove_new.png')}}" data-dark="{{ asset('images/n_logo_remove_new.png')}}" >
                        </a>
                        <div class="button-show-hide">
                            <i class="icon-menu-left"></i>
                        </div>
                    </div>

                    <div class="section-menu-left-wrap">
                        <div class="center">
                            <div class="center-item">
                                <ul class="menu-list">
                                    <li class="menu-item">
                                    <a href="{{ route('dashboard') }}" class="">
                                            <div class="icon"><i class="icon-grid"></i></div>
                                            <div class="text">Dashboard</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="center-item">
                                <ul class="menu-list">
                                    <li class="menu-item">
                                        <a class="menu-item-button" href="{{ route('addProduct') }}">
                                            <div class="icon"><i class="fa-solid fa-plus"></i></div> <!-- Plus icon -->
                                            <div class="text">Add New Product</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>


                            <div class="center-item">
                                <ul class="menu-list">
                                    <li class="menu-item">
                                        <a class="menu-item-button" href="{{ route('addImage') }}">
                                            <div class="icon"><i class="fa-solid fa-image"></i></div> <!-- Image icon -->
                                            <div class="text">Add Images</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="center-item">
                                <ul class="menu-list">
                                    <li class="menu-item">
                                        <a class="menu-item-button" href="{{ route('addFeature') }}">
                                            <div class="icon"><i class="fa-solid fa-cogs"></i></div> <!-- Cogs icon -->
                                            <div class="text">Add Features</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="center-item">
                                <ul class="menu-list">
                                    <li class="menu-item">
                                        <a class="menu-item-button" href="{{ route('manageProduct') }}">
                                            <div class="icon"><i class="fa-solid fa-edit"></i></div> <!-- Edit icon -->
                                            <div class="text">Manage Product</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="center-item">
                                <ul class="menu-list">
                                    <li class="menu-item">
                                        <a class="menu-item-button" href="{{ route('manageCustomer') }}">
                                            <div class="icon"><i class="fa-solid fa-users"></i></div> <!-- Users icon -->
                                            <div class="text">Manage Customer</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="center-item ">
                                <ul class="menu-list">
                                    <li class="menu-item">
                                        <a class="menu-item-button" href="{{ route('viewOrder') }}">
                                            <div class="icon"><i class="fa-solid fa-receipt"></i></div> <!-- Changed to receipt icon -->
                                            <div class="text">View Order</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="center-item ">
                                <ul class="menu-list">
                                    <li class="menu-item">
                                        <a class="menu-item-button" href="{{ route('addBlog') }}">
                                            <div class="icon"><i class="fa-solid fa-pen"></i></div> 
                                            <div class="text">Add Blog</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <div class="center-item ">
                                <ul class="menu-list">
                                    <li class="menu-item">
                                        <a class="menu-item-button" href="{{ route('manageReview') }}">
                                            <div class="icon"><i class="fa-solid fa-star"></i></div> 
                                            <div class="text">Manage Review</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>




                            <div class="center-item ">
                                <ul class="menu-list">
                                    <li class="menu-item">
                                        <a class="menu-item-button" href="{{ route('manageBlog') }}">
                                            <div class="icon"><i class="fa-solid fa-gear"></i></div> 
                                            <div class="text">Manage Blog</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>



                            <div class="center-item">
                                <ul class="menu-list">
                                    <li class="menu-item">
                                        <a class="menu-item-button" href="{{ route('manageProfile') }}">
                                            <!-- Changed icon to user -->
                                            <div class="icon"><i class="fa-solid fa-user"></i></div> <!-- Updated icon -->
                                            <div class="text">Manage Profile</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>




                            <div class="center-item">
                                <ul class="menu-list">
                                    <li class="menu-item">
                                        <a class="menu-item-button" href="{{ route('logoutAdmin') }}">
                                            <div class="icon"><i class="fa-solid fa-sign-out-alt"></i></div> <!-- Logout icon -->
                                            <div class="text">Log Out</div>
                                        </a>
                                    </li>
                                </ul>
                            </div>



                            
                            
                        </div>
                    </div>
                </div>
                <!-- /section-menu-left -->
          

                <!-- /section-menu-left -->
                  <!-- section-content-right -->
                  <div class="section-content-right">
                    <!-- header-dashboard -->
                    <div class="header-dashboard">
                        <div class="wrap">
                            <div class="header-left">
                                
                                <div class="button-show-hide">
                                    <i class="icon-menu-left"></i>
                                </div>
                            </div>
                            <div class="header-grid">

                                <div class="popup-wrap user type-header">
                                    <div class="dropdown">
                                    @if (Auth::check())
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-user wg-user">
                                                <span class="image">
                                                    <img src="{{ asset('images/avatar/user-1.png')}}" alt="">
                                                </span>
                                                <span class="flex flex-column">
                                                    <span class="body-title mb-2">{{ Auth::user()->name }}</span>
                                                </span>
                                            </span>
                                        </button>
                                    @else
                                        <script>
                                            window.location.href = "{{ route('login') }}"; // Redirect to login page
                                        </script>
                                    @endif

                                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton3" >
                                            <li>
                                            <a href="{{ route('logoutAdmin') }}" class="user-item">
                                            <div class="icon">
                                                        <i class="icon-log-out"></i>
                                                    </div>
                                                    <div class="body-title-2">Log out</div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
