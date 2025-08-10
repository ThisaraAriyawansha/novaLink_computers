<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - NovaLink Computers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="shortcut icon" type="image/x-icon" href="/n_logo_remove_new.png" />


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
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700&display=swap" rel="stylesheet">



    <!-- Font -->
    <link rel="stylesheet" href="{{ asset('fonts/fonts.css')}}">

    <!-- Icon -->
    <link rel="stylesheet" href="{{ asset('icon/style.css')}}">
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f5f5f5; min-height: 100vh;">

    <!-- Navigation Bar -->
    <nav style="background-color: #1a1a1a; box-shadow: 0 2px 10px rgba(0,0,0,0.3); position: fixed; width: 100%; top: 0; z-index: 1000;">
        <div style="max-width: 1200px; margin: 0 auto;">
            <div style="display: flex; justify-content: space-between; align-items: center; height: 70px; padding: 0 20px;">
                
                <!-- Logo/Brand -->
            <div style="display: flex; align-items: center; gap: 12px;">
                <div style=" padding: 0px;  display: flex; align-items: center; justify-content: center;">
                    <img src="/N_white.png" alt="Admin Icon" style="width: 60px; height: 60px; object-fit: contain;">
                </div>
                <span style="color: white; font-weight: bold; font-size: 22px; font-family: 'Orbitron', sans-serif;">NovaLink</span>
            </div>



                <!-- Desktop Menu -->
                <div id="desktop-menu" style="display: flex; align-items: center; gap: 5px;">
                    
                    <a href="{{ route('dashboard') }}" style="display: flex; align-items: center; padding: 12px 16px; border-radius: 6px; color: #ccc; text-decoration: none; transition: all 0.3s ease;" 
                       onmouseover="this.style.color='white'; this.style.backgroundColor='#333'; this.style.transform='translateY(-2px)';" 
                       onmouseout="this.style.color='#ccc'; this.style.backgroundColor='transparent'; this.style.transform='translateY(0)';">
                        <i class="fas fa-home" style="margin-right: 8px;"></i>
                        Dashboard
                    </a>
                    
                    <!-- Products Dropdown -->
                    <div style="position: relative; display: inline-block;" onmouseover="showDropdown('products-dropdown')" onmouseleave="hideDropdown('products-dropdown')">
                        <button style="display: flex; align-items: center; padding: 12px 16px; border-radius: 6px; color: #ccc; background: none; border: none; cursor: pointer; font-family: inherit; font-size: 14px; transition: all 0.3s ease;" 
                                onmouseover="this.style.color='white'; this.style.backgroundColor='#333';" 
                                onmouseout="this.style.color='#ccc'; this.style.backgroundColor='transparent';">
                            <i class="fas fa-box" style="margin-right: 8px;"></i>
                            Products
                            <i class="fas fa-chevron-down" style="margin-left: 6px; font-size: 12px;"></i>
                        </button>
                        <div id="products-dropdown" style="position: absolute; left: 0; top: 100%; margin-top: 5px; width: 200px; background-color: #2a2a2a; border-radius: 8px; box-shadow: 0 8px 25px rgba(0,0,0,0.4); opacity: 0; visibility: hidden; transform: translateY(-10px); transition: all 0.3s ease;">
                            <a href="{{ route('addProduct') }}" style="display: block; padding: 12px 16px; color: #ccc; text-decoration: none; border-radius: 8px 8px 0 0; transition: all 0.2s ease;" 
                               onmouseover="this.style.color='white'; this.style.backgroundColor='#444';" 
                               onmouseout="this.style.color='#ccc'; this.style.backgroundColor='transparent';">
                                <i class="fas fa-plus" style="margin-right: 8px; width: 16px;"></i>Add New Product
                            </a>
                            <a href="{{ route('addImage') }}" style="display: block; padding: 12px 16px; color: #ccc; text-decoration: none; transition: all 0.2s ease;" 
                               onmouseover="this.style.color='white'; this.style.backgroundColor='#444';" 
                               onmouseout="this.style.color='#ccc'; this.style.backgroundColor='transparent';">
                                <i class="fas fa-images" style="margin-right: 8px; width: 16px;"></i>Add Images
                            </a>
                            <a href="{{ route('addFeature') }}" style="display: block; padding: 12px 16px; color: #ccc; text-decoration: none; transition: all 0.2s ease;" 
                               onmouseover="this.style.color='white'; this.style.backgroundColor='#444';" 
                               onmouseout="this.style.color='#ccc'; this.style.backgroundColor='transparent';">
                                <i class="fas fa-star" style="margin-right: 8px; width: 16px;"></i>Add Features
                            </a>
                            <a href="{{ route('manageProduct') }}" style="display: block; padding: 12px 16px; color: #ccc; text-decoration: none; border-radius: 0 0 8px 8px; transition: all 0.2s ease;" 
                               onmouseover="this.style.color='white'; this.style.backgroundColor='#444';" 
                               onmouseout="this.style.color='#ccc'; this.style.backgroundColor='transparent';">
                                <i class="fas fa-cogs" style="margin-right: 8px; width: 16px;"></i>Manage Product
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('manageCustomer') }}" style="display: flex; align-items: center; padding: 12px 16px; border-radius: 6px; color: #ccc; text-decoration: none; transition: all 0.3s ease;" 
                       onmouseover="this.style.color='white'; this.style.backgroundColor='#333'; this.style.transform='translateY(-2px)';" 
                       onmouseout="this.style.color='#ccc'; this.style.backgroundColor='transparent'; this.style.transform='translateY(0)';">
                        <i class="fas fa-users" style="margin-right: 8px;"></i>
                        Manage Customer
                    </a>
                    
                    <a href="{{ route('viewOrder') }}" style="display: flex; align-items: center; padding: 12px 16px; border-radius: 6px; color: #ccc; text-decoration: none; transition: all 0.3s ease;" 
                       onmouseover="this.style.color='white'; this.style.backgroundColor='#333'; this.style.transform='translateY(-2px)';" 
                       onmouseout="this.style.color='#ccc'; this.style.backgroundColor='transparent'; this.style.transform='translateY(0)';">
                        <i class="fas fa-shopping-cart" style="margin-right: 8px;"></i>
                        View Order
                    </a>

                    <!-- Blog Dropdown -->
                    <div style="position: relative; display: inline-block;" onmouseover="showDropdown('blog-dropdown')" onmouseleave="hideDropdown('blog-dropdown')">
                        <button style="display: flex; align-items: center; padding: 12px 16px; border-radius: 6px; color: #ccc; background: none; border: none; cursor: pointer; font-family: inherit; font-size: 14px; transition: all 0.3s ease;" 
                                onmouseover="this.style.color='white'; this.style.backgroundColor='#333';" 
                                onmouseout="this.style.color='#ccc'; this.style.backgroundColor='transparent';">
                            <i class="fas fa-blog" style="margin-right: 8px;"></i>
                            Blog
                            <i class="fas fa-chevron-down" style="margin-left: 6px; font-size: 12px;"></i>
                        </button>
                        <div id="blog-dropdown" style="position: absolute; left: 0; top: 100%; margin-top: 5px; width: 180px; background-color: #2a2a2a; border-radius: 8px; box-shadow: 0 8px 25px rgba(0,0,0,0.4); opacity: 0; visibility: hidden; transform: translateY(-10px); transition: all 0.3s ease;">
                            <a href="{{ route('addBlog') }}" style="display: block; padding: 12px 16px; color: #ccc; text-decoration: none; border-radius: 8px 8px 0 0; transition: all 0.2s ease;" 
                               onmouseover="this.style.color='white'; this.style.backgroundColor='#444';" 
                               onmouseout="this.style.color='#ccc'; this.style.backgroundColor='transparent';">
                                <i class="fas fa-plus" style="margin-right: 8px; width: 16px;"></i>Add Blog
                            </a>
                            <a href="{{ route('manageBlog') }}" style="display: block; padding: 12px 16px; color: #ccc; text-decoration: none; border-radius: 0 0 8px 8px; transition: all 0.2s ease;" 
                               onmouseover="this.style.color='white'; this.style.backgroundColor='#444';" 
                               onmouseout="this.style.color='#ccc'; this.style.backgroundColor='transparent';">
                                <i class="fas fa-edit" style="margin-right: 8px; width: 16px;"></i>Manage Blog
                            </a>
                        </div>
                    </div>

                    <a href="{{ route('manageReview') }}" style="display: flex; align-items: center; padding: 12px 16px; border-radius: 6px; color: #ccc; text-decoration: none; transition: all 0.3s ease;" 
                       onmouseover="this.style.color='white'; this.style.backgroundColor='#333'; this.style.transform='translateY(-2px)';" 
                       onmouseout="this.style.color='#ccc'; this.style.backgroundColor='transparent'; this.style.transform='translateY(0)';">
                        <i class="fas fa-comments" style="margin-right: 8px;"></i>
                        Manage Review
                    </a>

                    <a href="{{ route('manageProfile') }}" style="display: flex; align-items: center; padding: 12px 16px; border-radius: 6px; color: #ccc; text-decoration: none; transition: all 0.3s ease;" 
                       onmouseover="this.style.color='white'; this.style.backgroundColor='#333'; this.style.transform='translateY(-2px)';" 
                       onmouseout="this.style.color='#ccc'; this.style.backgroundColor='transparent'; this.style.transform='translateY(0)';">
                        <i class="fas fa-user-circle" style="margin-right: 8px;"></i>
                        Manage Profile
                    </a>

                    <a href="{{ route('logoutAdmin') }}" style="display: flex; align-items: center; padding: 12px 16px; border-radius: 6px; color: #ff6b6b; text-decoration: none; transition: all 0.3s ease;" 
                       onmouseover="this.style.color='#ff5252'; this.style.backgroundColor='rgba(255,107,107,0.1)'; this.style.transform='translateY(-2px)';" 
                       onmouseout="this.style.color='#ff6b6b'; this.style.backgroundColor='transparent'; this.style.transform='translateY(0)';">
                        <i class="fas fa-sign-out-alt" style="margin-right: 8px;"></i>
                        Log Out
                    </a>
                </div>

                <!-- Mobile menu button -->
                <button id="mobile-menu-button" onclick="toggleMobileMenu()" style="display: none; color: #ccc; background: none; border: none; cursor: pointer; font-size: 24px; padding: 8px;">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div id="mobile-menu-overlay" onclick="closeMobileMenu()" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); z-index: 1500;"></div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" style="position: fixed; left: -320px; top: 0; width: 320px; height: 100%; background-color: #1a1a1a; z-index: 1600; transition: left 0.3s ease; overflow-y: auto;">
        
        <!-- Mobile Menu Header -->
        <div style="display: flex; justify-content: space-between; align-items: center; padding: 20px; border-bottom: 1px solid #333;">
            <div style="display: flex; align-items: center; gap: 12px;">
                <div style=" padding: 8px; border-radius: 6px;">
                    <img src="../assets/images/logo/N_white.png" alt="Admin Icon" style="width: 60px; height: 60px; object-fit: contain;">
                </div>
                <span style="color: white; font-weight: bold; font-size: 18px; font-family: 'Orbitron', sans-serif; ">NovaLink</span>
            </div>
            <button onclick="closeMobileMenu()" style="color: #ccc; background: none; border: none; cursor: pointer; font-size: 20px; padding: 8px;">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <!-- Mobile Menu Items -->
        <div style="padding: 20px;">
            <a href="{{ route('dashboard') }}" style="display: flex; align-items: center; padding: 15px 0; color: #ccc; text-decoration: none; border-bottom: 1px solid #333; transition: color 0.2s ease;" 
               onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">
                <i class="fas fa-home" style="margin-right: 15px; width: 20px; color: #667eea;"></i>
                Dashboard
            </a>
            
            <!-- Products Section -->
            <div style="margin-top: 20px;">
                <p style="color: #888; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; margin: 0 0 15px 0; font-weight: bold;">Products</p>
                <a href="{{ route('addProduct') }}" style="display: flex; align-items: center; padding: 12px 0; color: #ccc; text-decoration: none; transition: color 0.2s ease;" 
                   onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">
                    <i class="fas fa-plus" style="margin-right: 15px; width: 20px; color: #4ecdc4;"></i>
                    Add New Product
                </a>
                <a href="{{ route('addImage') }}" style="display: flex; align-items: center; padding: 12px 0; color: #ccc; text-decoration: none; transition: color 0.2s ease;" 
                   onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">
                    <i class="fas fa-images" style="margin-right: 15px; width: 20px; color: #4ecdc4;"></i>
                    Add Images
                </a>
                <a href="{{ route('addFeature') }}" style="display: flex; align-items: center; padding: 12px 0; color: #ccc; text-decoration: none; transition: color 0.2s ease;" 
                   onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">
                    <i class="fas fa-star" style="margin-right: 15px; width: 20px; color: #4ecdc4;"></i>
                    Add Features
                </a>
                <a href="{{ route('manageProduct') }}" style="display: flex; align-items: center; padding: 12px 0 20px 0; color: #ccc; text-decoration: none; border-bottom: 1px solid #333; transition: color 0.2s ease;" 
                   onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">
                    <i class="fas fa-cogs" style="margin-right: 15px; width: 20px; color: #4ecdc4;"></i>
                    Manage Product
                </a>
            </div>

            <a href="{{ route('manageCustomer') }}" style="display: flex; align-items: center; padding: 15px 0; color: #ccc; text-decoration: none; border-bottom: 1px solid #333; transition: color 0.2s ease;" 
               onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">
                <i class="fas fa-users" style="margin-right: 15px; width: 20px; color: #45b7d1;"></i>
                Manage Customer
            </a>
            
            <a href="{{ route('viewOrder') }}" style="display: flex; align-items: center; padding: 15px 0; color: #ccc; text-decoration: none; border-bottom: 1px solid #333; transition: color 0.2s ease;" 
               onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">
                <i class="fas fa-shopping-cart" style="margin-right: 15px; width: 20px; color: #f39c12;"></i>
                View Order
            </a>

            <!-- Blog Section -->
            <div style="margin-top: 20px;">
                <p style="color: #888; font-size: 12px; text-transform: uppercase; letter-spacing: 1px; margin: 0 0 15px 0; font-weight: bold;">Blog</p>
                <a href="{{ route('addBlog') }}" style="display: flex; align-items: center; padding: 12px 0; color: #ccc; text-decoration: none; transition: color 0.2s ease;" 
                   onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">
                    <i class="fas fa-plus" style="margin-right: 15px; width: 20px; color: #9b59b6;"></i>
                    Add Blog
                </a>
                <a href="{{ route('manageBlog') }}" style="display: flex; align-items: center; padding: 12px 0 20px 0; color: #ccc; text-decoration: none; border-bottom: 1px solid #333; transition: color 0.2s ease;" 
                   onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">
                    <i class="fas fa-edit" style="margin-right: 15px; width: 20px; color: #9b59b6;"></i>
                    Manage Blog
                </a>
            </div>

            <a href="{{ route('manageReview') }}" style="display: flex; align-items: center; padding: 15px 0; color: #ccc; text-decoration: none; border-bottom: 1px solid #333; transition: color 0.2s ease;" 
               onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">
                <i class="fas fa-comments" style="margin-right: 15px; width: 20px; color: #e67e22;"></i>
                Manage Review
            </a>

            <a href="{{ route('manageProfile') }}" style="display: flex; align-items: center; padding: 15px 0; color: #ccc; text-decoration: none; border-bottom: 1px solid #333; transition: color 0.2s ease;" 
               onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">
                <i class="fas fa-user-circle" style="margin-right: 15px; width: 20px; color: #2ecc71;"></i>
                Manage Profile
            </a>

            <a href="{{ route('logoutAdmin') }}" style="display: flex; align-items: center; padding: 20px 0 15px 0; color: #ff6b6b; text-decoration: none; margin-top: 20px; border-top: 1px solid #333; transition: color 0.2s ease;" 
               onmouseover="this.style.color='#ff5252';" onmouseout="this.style.color='#ff6b6b';">
                <i class="fas fa-sign-out-alt" style="margin-right: 15px; width: 20px;"></i>
                Log Out
            </a>
        </div>
    </div>

    <!-- Main Content Area -->
    <div style="margin-top: 40px; padding: 30px 20px;">

    </div>

    <script>
        // Dropdown functionality
        function showDropdown(id) {
            const dropdown = document.getElementById(id);
            dropdown.style.opacity = '1';
            dropdown.style.visibility = 'visible';
            dropdown.style.transform = 'translateY(0)';
        }

        function hideDropdown(id) {
            const dropdown = document.getElementById(id);
            dropdown.style.opacity = '0';
            dropdown.style.visibility = 'hidden';
            dropdown.style.transform = 'translateY(-10px)';
        }

        // Mobile menu functionality
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            const overlay = document.getElementById('mobile-menu-overlay');
            
            if (mobileMenu.style.left === '0px') {
                closeMobileMenu();
            } else {
                mobileMenu.style.left = '0px';
                overlay.style.display = 'block';
            }
        }

        function closeMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            const overlay = document.getElementById('mobile-menu-overlay');
            
            mobileMenu.style.left = '-320px';
            overlay.style.display = 'none';
        }

        // Responsive behavior
        function handleResize() {
            const desktopMenu = document.getElementById('desktop-menu');
            const mobileButton = document.getElementById('mobile-menu-button');
            
            if (window.innerWidth <= 1024) {
                desktopMenu.style.display = 'none';
                mobileButton.style.display = 'block';
            } else {
                desktopMenu.style.display = 'flex';
                mobileButton.style.display = 'none';
                closeMobileMenu();
            }
        }

        // Initialize responsive behavior
        window.addEventListener('resize', handleResize);
        window.addEventListener('load', handleResize);
    </script>

</body>
</html>