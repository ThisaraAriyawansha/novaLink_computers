<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovaLink Computers | Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-black: #000000;
            --primary-white: #ffffff;
            --light-gray: #f8f9fa;
            --medium-gray: #e9ecef;
            --dark-gray: #6c757d;
            --border-color: #dee2e6;
            --hover-gray: #f5f5f5;
            --shadow: 0 2px 4px rgba(0,0,0,0.1);
            --sidebar-width: 280px;
            --sidebar-collapsed-width: 70px;
            --header-height: 70px;
            --transition: all 0.3s ease;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background-color: var(--light-gray);
            color: var(--primary-black);
            line-height: 1.6;
        }

        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background-color: var(--primary-white);
            border-right: 1px solid var(--border-color);
            transition: var(--transition);
            position: fixed;
            height: 100vh;
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar.collapsed {
            width: var(--sidebar-collapsed-width);
        }

        .sidebar::-webkit-scrollbar {
            width: 4px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: var(--light-gray);
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: var(--medium-gray);
            border-radius: 2px;
        }

        .logo-section {
            padding: 20px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: var(--primary-black);
        }

        .logo img {
            width: 32px;
            height: 32px;
            border-radius: 4px;
        }

        .logo-text {
            font-size: 18px;
            font-weight: 600;
            transition: var(--transition);
        }

        .sidebar.collapsed .logo-text {
            opacity: 0;
            width: 0;
            overflow: hidden;
        }

        .sidebar-toggle {
            background: none;
            border: none;
            font-size: 18px;
            cursor: pointer;
            color: var(--dark-gray);
            padding: 8px;
            border-radius: 4px;
            transition: var(--transition);
        }

        .sidebar-toggle:hover {
            background-color: var(--hover-gray);
            color: var(--primary-black);
        }

        /* Navigation Styles */
        .nav-menu {
            padding: 20px 0;
        }

        .nav-item {
            margin: 4px 16px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            color: var(--dark-gray);
            text-decoration: none;
            border-radius: 8px;
            transition: var(--transition);
            gap: 12px;
            font-size: 14px;
            font-weight: 500;
        }

        .nav-link:hover {
            background-color: var(--hover-gray);
            color: var(--primary-black);
        }

        .nav-link.active {
            background-color: var(--primary-black);
            color: var(--primary-white);
        }

        .nav-icon {
            font-size: 18px;
            min-width: 18px;
            text-align: center;
        }

        .nav-text {
            transition: var(--transition);
        }

        .sidebar.collapsed .nav-text {
            opacity: 0;
            width: 0;
            overflow: hidden;
        }

        .sidebar.collapsed .nav-item {
            margin: 4px 8px;
        }

        .sidebar.collapsed .nav-link {
            justify-content: center;
            padding: 12px 8px;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: var(--transition);
            display: flex;
            flex-direction: column;
        }

        .main-content.expanded {
            margin-left: var(--sidebar-collapsed-width);
        }

        /* Header Styles */
        .header {
            background-color: var(--primary-white);
            border-bottom: 1px solid var(--border-color);
            height: var(--header-height);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: var(--dark-gray);
            padding: 8px;
        }

        .header-title {
            font-size: 24px;
            font-weight: 600;
            color: var(--primary-black);
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .user-menu {
            position: relative;
        }

        .user-button {
            display: flex;
            align-items: center;
            gap: 12px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 8px 12px;
            border-radius: 8px;
            transition: var(--transition);
        }

        .user-button:hover {
            background-color: var(--hover-gray);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: var(--medium-gray);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: var(--primary-black);
        }

        .user-info {
            text-align: left;
        }

        .user-name {
            font-size: 14px;
            font-weight: 600;
            color: var(--primary-black);
        }

        .user-role {
            font-size: 12px;
            color: var(--dark-gray);
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: var(--primary-white);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            box-shadow: var(--shadow);
            min-width: 200px;
            margin-top: 8px;
            display: none;
            z-index: 1000;
        }

        .dropdown-menu.show {
            display: block;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            color: var(--dark-gray);
            text-decoration: none;
            transition: var(--transition);
            font-size: 14px;
        }

        .dropdown-item:hover {
            background-color: var(--hover-gray);
            color: var(--primary-black);
        }

        /* Content Area */
        .content-area {
            flex: 1;
            padding: 24px;
            overflow-y: auto;
        }

        .content-card {
            background: var(--primary-white);
            border-radius: 12px;
            padding: 24px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border-color);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                z-index: 1001;
            }

            .sidebar.mobile-open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .mobile-toggle {
                display: block;
            }

            .header-title {
                font-size: 20px;
            }

            .user-name {
                display: none;
            }

            .content-area {
                padding: 16px;
            }
        }

        @media (max-width: 480px) {
            .content-area {
                padding: 12px;
            }

            .content-card {
                padding: 16px;
            }

            .header {
                padding: 0 16px;
            }
        }

        /* Overlay for mobile */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .overlay.show {
            display: block;
        }

        /* Welcome Section */
        .welcome-section {
            margin-bottom: 24px;
        }

        .welcome-title {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 8px;
            color: var(--primary-black);
        }

        .welcome-subtitle {
            color: var(--dark-gray);
            font-size: 16px;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 24px;
        }

        .stat-card {
            background: var(--primary-white);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
        }

        .stat-icon {
            font-size: 24px;
            color: var(--primary-black);
            margin-bottom: 12px;
        }

        .stat-number {
            font-size: 24px;
            font-weight: 600;
            color: var(--primary-black);
            margin-bottom: 4px;
        }

        .stat-label {
            color: var(--dark-gray);
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="overlay" id="overlay"></div>
    
    <div class="dashboard-container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="logo-section">
                <a href="#" class="logo">
                    <img src="https://via.placeholder.com/32x32/000000/ffffff?text=N" alt="NovaLink">
                    <span class="logo-text">NovaLink</span>
                </a>
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <nav class="nav-menu">
                <div class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link active">
                        <i class="fas fa-grid-2 nav-icon"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="{{ route('addProduct') }}" class="nav-link">
                        <i class="fas fa-plus nav-icon"></i>
                        <span class="nav-text">Add New Product</span>
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-image nav-icon"></i>
                        <span class="nav-text">Add Images</span>
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cogs nav-icon"></i>
                        <span class="nav-text">Add Features</span>
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-edit nav-icon"></i>
                        <span class="nav-text">Manage Product</span>
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users nav-icon"></i>
                        <span class="nav-text">Manage Customer</span>
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-receipt nav-icon"></i>
                        <span class="nav-text">View Order</span>
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-pen nav-icon"></i>
                        <span class="nav-text">Add Blog</span>
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-star nav-icon"></i>
                        <span class="nav-text">Manage Review</span>
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-gear nav-icon"></i>
                        <span class="nav-text">Manage Blog</span>
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user nav-icon"></i>
                        <span class="nav-text">Manage Profile</span>
                    </a>
                </div>
                
                <div class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-sign-out-alt nav-icon"></i>
                        <span class="nav-text">Log Out</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content" id="mainContent">
            <!-- Header -->
            <header class="header">
                <div class="header-left">
                    <button class="mobile-toggle" id="mobileToggle">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h1 class="header-title">Dashboard</h1>
                </div>
                
                <div class="header-right">
                    <div class="user-menu">
                        <button class="user-button" id="userButton">
                            <div class="user-avatar">
                                <i class="fas fa-user"></i>
                            </div>
                            <div class="user-info">
                                <div class="user-name">Admin User</div>
                                <div class="user-role">Administrator</div>
                            </div>
                            <i class="fas fa-chevron-down"></i>
                        </button>
                        
                        <div class="dropdown-menu" id="userDropdown">

                            <a href="#" class="dropdown-item">
                                <i class="fas fa-sign-out-alt"></i>
                                Log Out
                            </a>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <div class="content-area">
                <div class="welcome-section">
                    <h2 class="welcome-title">Welcome back, Admin</h2>
                    <p class="welcome-subtitle">Here's what's happening with your store today.</p>
                </div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="stat-number">247</div>
                        <div class="stat-label">Total Orders</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-boxes"></i>
                        </div>
                        <div class="stat-number">1,283</div>
                        <div class="stat-label">Total Products</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="stat-number">892</div>
                        <div class="stat-label">Total Customers</div>
                    </div>
                    
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                        <div class="stat-number">$24,580</div>
                        <div class="stat-label">Total Revenue</div>
                    </div>
                </div>

                <div class="content-card" style="margin-top: 24px;">
                    <h3 style="margin-bottom: 16px; font-size: 20px; font-weight: 600;">Recent Activity</h3>
                    <p style="color: var(--dark-gray);">Your dashboard content will appear here. This is a clean, minimal interface designed for optimal user experience and productivity.</p>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Sidebar toggle functionality
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const mobileToggle = document.getElementById('mobileToggle');
        const overlay = document.getElementById('overlay');

        // Desktop sidebar toggle
        sidebarToggle.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
        });

        // Mobile sidebar toggle
        mobileToggle.addEventListener('click', () => {
            sidebar.classList.add('mobile-open');
            overlay.classList.add('show');
        });

        // Close mobile sidebar
        overlay.addEventListener('click', () => {
            sidebar.classList.remove('mobile-open');
            overlay.classList.remove('show');
        });

        // User dropdown toggle
        const userButton = document.getElementById('userButton');
        const userDropdown = document.getElementById('userDropdown');

        userButton.addEventListener('click', (e) => {
            e.stopPropagation();
            userDropdown.classList.toggle('show');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', () => {
            userDropdown.classList.remove('show');
        });

        // Navigation link active state
        const navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                navLinks.forEach(l => l.classList.remove('active'));
                link.classList.add('active');
            });
        });

        // Auto-collapse sidebar on mobile when window is resized
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('mobile-open');
                overlay.classList.remove('show');
            }
        });
    </script>
</body>
</html>