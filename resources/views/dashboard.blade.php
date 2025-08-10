<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <!-- Favicon -->
    <title>NovaLink Computers | Dashboard</title>
    <meta name="description" content="NovaLink Computers offer the best computers available at the market">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/n_logo_remove_new.png" />
    <!-- CSS -->
    <script src="assets/js/tailwind-cdn.js"></script>
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
        /* Modern Typography */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        :root {
            --primary-color: #000000ff;
            --primary-hover: #353535ff;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --text-primary: #1f2937;
            --text-secondary: #6b7280;
            --text-muted: #9ca3af;
            --border-color: #e5e7eb;
            --bg-gray-50: #f9fafb;
            --bg-gray-100: #f3f4f6;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: var(--bg-gray-50);
            color: var(--text-primary);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
        }

        /* Dashboard Layout */
        .dashboard-container {
            background: white;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        /* Sidebar Navigation */
        .dashboard-sidebar {
            background: white;
            border-right: 1px solid var(--border-color);
            min-height: 600px;
        }

        .nav-tabs {
            border: none;
            flex-direction: column;
            padding: 1.5rem 0;
        }

        .nav-tabs .nav-item {
            width: 100%;
            margin: 0;
        }

        .nav-tabs .nav-link {
            border: none;
            border-radius: 0;
            color: var(--text-secondary);
            font-weight: 500;
            font-size: 0.875rem;
            padding: 0.875rem 1.5rem;
            text-align: left;
            background: transparent;
            transition: all 0.2s ease;
            position: relative;
        }

        .nav-tabs .nav-link:hover {
            background: var(--bg-gray-50);
            color: var(--primary-color);
            border-color: transparent;
        }

        .nav-tabs .nav-link.active {
            background: var(--bg-gray-50);
            color: var(--primary-color);
            font-weight: 600;
            border-color: transparent;
        }

        .nav-tabs .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 3px;
            background: var(--primary-color);
        }

        /* Main Content Area */
        .dashboard-content {
            padding: 2rem;
            background: white;
        }

        .tab-content {
            border: none;
        }

        .tab-pane {
            padding: 0;
        }

        /* Page Headers */
        .page-header {
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--text-primary);
            margin: 0;
        }

        .welcome-text {
            color: var(--text-secondary);
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }

        /* Tables */
        .data-table {
            background: white;
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border-color);
        }

        .table {
            margin: 0;
            font-size: 0.875rem;
        }

        .table thead th {
            background: var(--bg-gray-50);
            border: none;
            color: var(--text-secondary);
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            padding: 1rem;
        }

        .table tbody td {
            border-color: var(--border-color);
            padding: 1rem;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: var(--bg-gray-50);
        }

        /* Badges */
        .badge {
            font-size: 0.75rem;
            font-weight: 500;
            padding: 0.375rem 0.75rem;
            border-radius: 9999px;
        }

        .badge.bg-success {
            background-color: var(--success-color) !important;
            color: white;
        }

        .badge.bg-warning {
            background-color: var(--warning-color) !important;
            color: white;
        }

        .badge.bg-secondary {
            background-color: var(--text-muted) !important;
            color: white;
        }

        /* Buttons */
        .btn-modern {
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: var(--radius-md);
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-modern:hover {
            background: var(--primary-hover);
            color: white;
            transform: translateY(-1px);
            box-shadow: var(--shadow-md);
        }

        .btn-modern-sm {
            padding: 0.375rem 0.75rem;
            font-size: 0.8125rem;
        }

        .btn-modern-outline {
            background: white;
            color: var(--primary-color);
            border: 1px solid var(--border-color);
        }

        .btn-modern-outline:hover {
            background: var(--bg-gray-50);
            color: var(--primary-color);
        }

        /* Product Info */
        .product-info {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .product-image {
            width: 48px;
            height: 48px;
            border-radius: var(--radius-md);
            object-fit: cover;
            border: 1px solid var(--border-color);
        }

        .product-name {
            font-weight: 500;
            color: var(--text-primary);
        }

        /* Forms */
        .form-modern {
            background: white;
            padding: 2rem;
            border-radius: var(--radius-lg);
            border: 1px solid var(--border-color);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group.form-group-half {
            flex: 0 0 calc(50% - 0.75rem);
        }

        .form-row {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
        }

        .form-control-modern {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border-color);
            border-radius: var(--radius-md);
            font-size: 0.875rem;
            transition: all 0.2s ease;
            background: white;
        }

        .form-control-modern:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        /* Alerts */
        .alert-modern {
            border-radius: var(--radius-md);
            border: none;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            font-size: 0.875rem;
        }

        .alert-success {
            background: #dcfce7;
            color: #166534;
            border-left: 4px solid var(--success-color);
        }

        /* Dashboard Stats */
        .dashboard-welcome {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-hover));
            color: white;
            padding: 2rem;
            border-radius: var(--radius-lg);
            margin-bottom: 2rem;
        }

        .welcome-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .welcome-subtitle {
            opacity: 0.9;
            font-size: 0.875rem;
        }

        /* Modal Enhancements */
        .modal-content {
            border: none;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
        }

        .modal-header {
            background: var(--bg-gray-50);
            border-bottom: 1px solid var(--border-color);
            padding: 1.5rem;
        }

        .modal-title {
            font-weight: 600;
            color: var(--text-primary);
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            background: var(--bg-gray-50);
            border-top: 1px solid var(--border-color);
            padding: 1rem 1.5rem;
        }

        /* Order Details Modal Styling */
        .order-section {
            margin-bottom: 2rem;
        }

        .section-title {
            font-size: 0.875rem;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }

        .section-title::after {
            content: '';
            flex: 1;
            height: 1px;
            background: var(--border-color);
            margin-left: 1rem;
        }

        .order-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }

        .order-table thead th {
            background: var(--bg-gray-50);
            color: var(--text-secondary);
            font-weight: 600;
            text-align: left;
            padding: 0.75rem;
            border-bottom: 1px solid var(--border-color);
        }

        .order-table tbody td {
            padding: 0.75rem;
            border-bottom: 1px solid var(--border-color);
        }

        .address-card, .note-card {
            background: var(--bg-gray-50);
            border-radius: var(--radius-md);
            padding: 1rem;
            border: 1px solid var(--border-color);
        }

        .address-line, .note-content {
            margin: 0 0 0.25rem 0;
            font-size: 0.875rem;
            color: var(--text-secondary);
        }

        .address-line:last-child, .note-content:last-child {
            margin-bottom: 0;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .dashboard-container {
                border-radius: 0;
            }
            
            .dashboard-content {
                padding: 1.5rem;
            }
            
            .nav-tabs .nav-link {
                padding: 1rem;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            
            .form-group.form-group-half {
                flex: none;
            }
            
            .table-responsive {
                border-radius: var(--radius-md);
                border: 1px solid var(--border-color);
            }
        }

        /* Loading States */
        .loading {
            opacity: 0.6;
            pointer-events: none;
        }

        /* Empty States */
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            color: var(--text-muted);
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.3;
        }
    </style>
</head>

<body>
    <div class="main-wrapper flex flex-col min-h-dvh">
        @include('layouts.nav-2')
        <div class="h-[13dvh]"></div>


        <!-- Account Page Area -->
        <div class="account-page-area py-12">
            <div class="container">
                @if(session('success'))
                    <div class="alert-modern alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                
                <div class="dashboard-container">
                    <div class="row g-0">
                        <div class="col-lg-3">
                            <!-- Mobile Toggle Button -->
                            <div class="sm:hidden p-4">
                                <button onclick="toggleSidebar()" class="bg-black text-white px-4 py-2 rounded">
                                    ☰ Menu
                                </button>
                            </div>

                            <!-- Sidebar -->
                            <div id="mobileSidebar" class="fixed top-0 left-0 h-full w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 z-50 sm:translate-x-0 sm:static sm:block">
                                <nav class="h-full p-4">
                                    <div class="nav nav-tabs flex-col space-y-2" id="nav-tab" role="tablist">
                                        <button onclick="handleNavClick()" class="nav-link active" id="nav-dashboard-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-dashboard" type="button" role="tab"
                                            aria-controls="nav-dashboard" aria-selected="true">
                                            <i class="pe-7s-home me-2"></i>Dashboard
                                        </button>

                                        <button onclick="handleNavClick()" class="nav-link" id="nav-bidding-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-bidding" type="button" role="tab"
                                            aria-controls="nav-bidding" aria-selected="false">
                                            <i class="pe-7s-hammer me-2"></i>My Bids
                                        </button>

                                        <button onclick="handleNavClick()" class="nav-link" id="nav-orders-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-orders" type="button" role="tab"
                                            aria-controls="nav-orders" aria-selected="false">
                                            <i class="pe-7s-cart me-2"></i>Orders
                                        </button>

                                        <button onclick="handleNavClick()" class="nav-link" id="nav-details-tab" data-bs-toggle="tab"
                                            data-bs-target="#nav-details" type="button" role="tab"
                                            aria-controls="nav-details" aria-selected="false">
                                            <i class="pe-7s-user me-2"></i>Account Details
                                        </button>

                                        <a href="#" onclick="handleNavClick(); event.preventDefault(); document.getElementById('logout-form').submit();" 
                                        class="nav-link text-danger">
                                            <i class="pe-7s-power me-2"></i>Logout
                                        </a>
                                    </div>
                                </nav>
                            </div>

                            <!-- Overlay -->
                            <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden sm:hidden" onclick="closeSidebar()"></div>

                            <!-- Hidden Logout Form -->
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            <!-- JavaScript -->
                            <script>
                                function toggleSidebar() {
                                    document.getElementById('mobileSidebar').classList.toggle('-translate-x-full');
                                    document.getElementById('overlay').classList.toggle('hidden');
                                }

                                function closeSidebar() {
                                    document.getElementById('mobileSidebar').classList.add('-translate-x-full');
                                    document.getElementById('overlay').classList.add('hidden');
                                }

                                function handleNavClick() {
                                    // Only auto-close on mobile
                                    if (window.innerWidth < 640) {
                                        closeSidebar();
                                    }
                                }
                            </script>

                        </div>

                        <div class="col-lg-9">
                            <div class="dashboard-content">
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- Dashboard Tab -->
                                    <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel"
                                        aria-labelledby="nav-dashboard-tab">
                                        @if(session('customer_id'))
                                            @php
                                                $customer = App\Models\Customer::find(session('customer_id'));
                                            @endphp
                                        @endif
                                        
                                        <div class="dashboard-welcome">
                                            <h1 class="welcome-title text-white ">Hey {{ $customer->fname ?? 'User' }}, great to see you!</h1>
                                            <p class="welcome-subtitle mb-0">
                                                Let’s get things done — manage your account, track your orders, and stay on top of your bids right from here.
                                            </p>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="card border-0 shadow-sm">
                                                    <div class="card-body p-4">
                                                        <h6 class="text-muted mb-2">Quick Actions</h6>
                                                        <div class="d-flex flex-column gap-2">

                                                            <!-- View Recent Orders (Triggers Orders Tab) -->
                                                            <a href="#nav-orders"
                                                            onclick="handleNavClick(); document.getElementById('nav-orders-tab').click();"
                                                            style="padding: 6px 12px; font-size: 13px; border: 1px solid black; background: transparent; color: black; border-radius: 4px; text-decoration: none; display: inline-flex; align-items: center;">
                                                                <i class="pe-7s-bag me-2" style="font-size: 16px;"></i>View Recent Orders
                                                            </a>

                                                            <!-- Check Active Bids (Triggers Bids Tab) -->
                                                            <a href="#nav-bidding"
                                                            onclick="handleNavClick(); document.getElementById('nav-bidding-tab').click();"
                                                            style="padding: 6px 12px; font-size: 13px; border: 1px solid black; background: transparent; color: black; border-radius: 4px; text-decoration: none; display: inline-flex; align-items: center;">
                                                                <i class="pe-7s-hammer me-2" style="font-size: 16px;"></i>Check Active Bids
                                                            </a>

                                                            <!-- Update Profile (Triggers Account Details Tab) -->
                                                            <a href="#nav-details"
                                                            onclick="handleNavClick(); document.getElementById('nav-details-tab').click();"
                                                            style="padding: 6px 12px; font-size: 13px; border: 1px solid black; background: transparent; color: black; border-radius: 4px; text-decoration: none; display: inline-flex; align-items: center;">
                                                                <i class="pe-7s-user me-2" style="font-size: 16px;"></i>Update Profile
                                                            </a>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Bidding Tab -->
                                    <div class="tab-pane fade" id="nav-bidding" role="tabpanel"
                                        aria-labelledby="nav-bidding-tab">
                                        <div class="page-header">
                                            <h2 class="page-title">My Bids</h2>
                                            <p class="welcome-text">Track your bidding activity and manage active bids</p>
                                        </div>
                                        
                                        <div class="data-table">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Product</th>
                                                            <th>Your Bid</th>
                                                            <th>Highest Bid</th>
                                                            <th>Status</th>
                                                            <th>Expires</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($bids as $bid)
                                                            @php
                                                                $highestBid = \App\Models\Bid::where('product_id', $bid->product_id)->max('bid_amount');
                                                                $status = $bid->bid_amount == $highestBid ? 'Highest Bid' : 'Outbid';
                                                                $badgeClass = $status == 'Highest Bid' ? 'bg-success' : 'bg-warning';
                                                                $dealExpired = \Carbon\Carbon::parse($bid->product->deal_end)->isPast();
                                                            @endphp
                                                            <tr>
                                                                <td>
                                                                    <div class="product-info">
                                                                        <img src="{{ asset($bid->product->image) }}"
                                                                            alt="{{ $bid->product->name }}" class="product-image">
                                                                        <span class="product-name">{{ $bid->product->name }}</span>
                                                                    </div>
                                                                </td>
                                                                <td class="fw-semibold">Rs.{{ number_format($bid->bid_amount, 2) }}</td>
                                                                <td class="fw-semibold">Rs.{{ number_format($highestBid, 2) }}</td>
                                                                <td><span class="badge {{ $badgeClass }}">{{ $status }}</span></td>
                                                                <td>{{ \Carbon\Carbon::parse($bid->product->deal_end)->format('M d, Y') }}</td>
                                                                <td>
                                                                    @if ($dealExpired && $status == 'Highest Bid')
                                                                        <a href="{{ url('bidPay?product_id=' . $bid->product->id . '&product_name=' . urlencode($bid->product->name) . '&highest_bid=' . $highestBid) }}"
                                                                            class="btn-modern btn-modern-sm">
                                                                            Pay Now
                                                                        </a>
                                                                    @elseif (!$dealExpired)
                                                                        <a href="{{ url('biddings?product-id=' . $bid->product->id) }}"
                                                                        style="padding: 4px 8px; font-size: 12px; border: 1px solid black; background: transparent; color: black; border-radius: 4px; text-decoration: none; display: inline-block;">
                                                                        Update Bid
                                                                        </a>

                                                                    @else
                                                                        <span class="badge bg-secondary">Bidding Closed</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Orders Tab -->
                                    <div class="tab-pane fade" id="nav-orders" role="tabpanel"
                                        aria-labelledby="nav-orders-tab">
                                        <div class="page-header">
                                            <h2 class="page-title">My Orders</h2>
                                            <p class="welcome-text">View and manage your order history</p>
                                        </div>
                                        
                                        <div class="data-table">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Order ID</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @forelse ($payments as $payment)
                                                            @php
                                                                $totalItems = $payment->orders->sum('qty');
                                                                $totalAmount = $payment->total;
                                                            @endphp
                                                            <tr>
                                                                <td class="fw-semibold">#{{ $payment->id }}</td>
                                                                <td>{{ \Carbon\Carbon::parse($payment->created_at)->format('M d, Y') }}</td>
                                                                <td>
                                                                    <span class="badge bg-success">
                                                                        {{ $payment->paymentStatus->status_name ?? 'On Hold' }}
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <div>
                                                                        <div class="fw-semibold">Rs.{{ number_format($totalAmount, 2) }}</div>
                                                                        <small class="text-muted">{{ $totalItems }} item(s)</small>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <button class="btn-modern btn-modern-sm"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#bitOrderModal{{ $payment->id }}">
                                                                        <i class="pe-7s-look me-1"></i>View
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        @empty
                                                            <tr>
                                                                <td colspan="5">
                                                                    <div class="empty-state">
                                                                        <i class="pe-7s-bag"></i>
                                                                        <p class="mb-0">No orders found.</p>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Account Details Tab -->
                                    <div class="tab-pane fade" id="nav-details" role="tabpanel"
                                        aria-labelledby="nav-details-tab">
                                        <div class="page-header">
                                            <h2 class="page-title">Account Details</h2>
                                            <p class="welcome-text">Update your personal information and password</p>
                                        </div>
                                        
                                        <div class="form-modern">
                                            <form action="{{ route('update-account') }}" method="POST">
                                                @csrf
                                                <div class="form-row">
                                                    <div class="form-group form-group-half">
                                                        <label class="form-label" for="fname">First Name *</label>
                                                        <input type="text" class="form-control-modern" id="fname" name="fname"
                                                            value="{{ $customer->fname ?? '' }}" required />
                                                        @error('fname')
                                                            <span class="text-danger small mt-1">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group form-group-half">
                                                        <label class="form-label" for="lname">Last Name *</label>
                                                        <input type="text" class="form-control-modern" id="lname" name="lname"
                                                            value="{{ $customer->lname ?? '' }}" required />
                                                        @error('lname')
                                                            <span class="text-danger small mt-1">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="form-label" for="email">Email Address *</label>
                                                    <input type="email" class="form-control-modern" id="email" name="email"
                                                        value="{{ $customer->email ?? '' }}" required />
                                                    @error('email')
                                                        <span class="text-danger small mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                
                                                <hr class="my-4">
                                                
                                                <div class="form-group">
                                                    <label class="form-label" for="current_password">Current Password</label>
                                                    <input type="password" class="form-control-modern" id="current_password"
                                                        name="current_password" placeholder="Leave blank to keep unchanged" />
                                                    @error('current_password')
                                                        <span class="text-danger small mt-1">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-row">
                                                    <div class="form-group form-group-half">
                                                        <label class="form-label" for="new_password">New Password</label>
                                                        <input type="password" class="form-control-modern" id="new_password"
                                                            name="new_password" placeholder="Leave blank to keep unchanged" />
                                                        @error('new_password')
                                                            <span class="text-danger small mt-1">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group form-group-half">
                                                        <label class="form-label" for="new_password_confirmation">Confirm New Password</label>
                                                        <input type="password" class="form-control-modern" id="new_password_confirmation"
                                                            name="new_password_confirmation" />
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <button class="btn-modern" type="submit">
                                                        <i class="pe-7s-check me-2"></i>Save Changes
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// Account Page Area -->
        
        <!--flex grow div-->
        <div class="flex-grow"></div>
        
        <!-- footer -->
        @include('layouts.footer2')
    </div>

    <!-- Order Details Modals -->
    @forelse ($payments as $payment)
    <div class="modal fade" id="bitOrderModal{{ $payment->id }}" tabindex="-1"
        aria-labelledby="bitOrderModalLabel{{ $payment->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bitOrderModalLabel{{ $payment->id }}">
                        <i class="pe-7s-note me-2"></i>Order Details #{{ $payment->id }}
                    </h5>
                <button type="button" data-bs-dismiss="modal" style="padding: 8px 16px; background: black; color: white; border: 1px solid white; border-radius: 6px; font-size: 14px; display: inline-flex; align-items: center;">
                    <i class="pe-7s-close me-2" style="color: white; font-size: 16px;"></i>
                </button>
                            </div>
                <div class="modal-body">
                    <div class="order-section">
                        <h6 class="section-title">Order Items</h6>
                        <div class="table-responsive">
                            <table class="order-table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payment->orders as $order)
                                        <tr>
                                            <td>
                                                <div class="product-info">
                                                    <img src="{{ asset($order->product->image) }}" 
                                                         alt="{{ $order->product->name }}" class="product-image">
                                                    <span class="product-name">{{ $order->product->name }}</span>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-secondary">{{ $order->qty }}</span></td>
                                            <td class="fw-semibold">Rs.{{ number_format($order->product->discounted_price, 2) }}</td>
                                            <td class="fw-semibold">Rs.{{ number_format($order->product->discounted_price * $order->qty, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="order-section">
                        <h6 class="section-title">Shipping Address</h6>
                        <div class="address-card">
                            <p class="address-line"><strong>{{ $payment->address1 }}</strong></p>
                            @if($payment->address2)
                                <p class="address-line">{{ $payment->address2 }}</p>
                            @endif
                            <p class="address-line">{{ $payment->city }}, {{ $payment->postal_code }}</p>
                        </div>
                    </div>

                    <div class="order-section">
                        <h6 class="section-title">Order Note</h6>
                        <div class="note-card">
                            <p class="note-content">
                                {{ $payment->note ?? 'No special instructions provided for this order.' }}
                            </p>
                        </div>
                    </div>

                    <div class="order-section">
                        <h6 class="section-title">Order Summary</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="d-flex justify-content-between py-2 border-bottom">
                                    <span>Order Date:</span>
                                    <span class="fw-semibold">{{ \Carbon\Carbon::parse($payment->created_at)->format('F d, Y') }}</span>
                                </div>
                                <div class="d-flex justify-content-between py-2 border-bottom">
                                    <span>Payment Status:</span>
                                    <span class="badge bg-success">{{ $payment->paymentStatus->status_name ?? 'Completed' }}</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-between py-2 border-bottom">
                                    <span>Total Items:</span>
                                    <span class="fw-semibold">{{ $payment->orders->sum('qty') }} item(s)</span>
                                </div>
                                <div class="d-flex justify-content-between py-2 border-bottom">
                                    <span class="fw-semibold">Total Amount:</span>
                                    <span class="fw-bold text-primary fs-5">Rs.{{ number_format($payment->total, 2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" data-bs-dismiss="modal" style="padding: 8px 16px; background: black; color: white; border: 1px solid white; border-radius: 6px; font-size: 14px; display: inline-flex; align-items: center;">
                    <i class="pe-7s-power me-2" style="color: white; font-size: 16px;"></i>Close
                </button>

                </div>
            </div>
        </div>
    </div>
    @empty
    @endforelse

    <!-- Include existing modals -->
    @include('layouts.modals')

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
    <script src="assets/js/main.js"></script>

    <script>
        // Enhanced user experience features
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth tab transitions
            const tabTriggers = document.querySelectorAll('.nav-link[data-bs-toggle="tab"]');
            tabTriggers.forEach(trigger => {
                trigger.addEventListener('click', function() {
                    // Add loading state
                    const targetId = this.getAttribute('data-bs-target');
                    const targetPane = document.querySelector(targetId);
                    if (targetPane) {
                        targetPane.style.opacity = '0.5';
                        setTimeout(() => {
                            targetPane.style.opacity = '1';
                        }, 150);
                    }
                });
            });

            // Form validation feedback
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function() {
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.innerHTML = '<i class="pe-7s-refresh-2 me-2"></i>Saving...';
                        submitBtn.disabled = true;
                    }
                });
            });

            // Enhanced table interactions
            const tableRows = document.querySelectorAll('.table tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateX(2px)';
                    this.style.transition = 'all 0.2s ease';
                });
                
                row.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateX(0)';
                });
            });

            // Button hover effects
            const modernButtons = document.querySelectorAll('.btn-modern');
            modernButtons.forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-1px)';
                });
                
                btn.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Auto-hide alerts
            const alerts = document.querySelectorAll('.alert-modern');
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.style.opacity = '0';
                    alert.style.transform = 'translateY(-10px)';
                    setTimeout(() => {
                        alert.remove();
                    }, 300);
                }, 5000);
            });

            // Form input focus effects
            const inputs = document.querySelectorAll('.form-control-modern');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateY(-1px)';
                    this.parentElement.style.transition = 'all 0.2s ease';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateY(0)';
                });
            });
        });

        // Utility function for showing notifications
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            notification.className = `alert-modern alert-${type} position-fixed`;
            notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; max-width: 300px;';
            notification.innerHTML = message;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.opacity = '0';
                notification.style.transform = 'translateX(100%)';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }
    </script>
</body>
</html>