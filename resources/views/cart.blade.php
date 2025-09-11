<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <!-- Favicon -->
    <title>NovaLink Computers | Your Cart</title>
    <meta name="description" content="NovaLink Computers offer the best computers available at the market">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/n_logo_remove_new.png" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">    <!-- CSS
    ============================================ -->
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
    <!-- Custom Styles -->
    <style>
        /* Modern Alert Styles - Apple Inspired */
        .alert-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .alert-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .alert-dialog {
            background: white;
            border-radius: 16px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            max-width: 320px;
            width: 90%;
            overflow: hidden;
            transform: scale(0.9) translateY(20px);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .alert-overlay.active .alert-dialog {
            transform: scale(1) translateY(0);
        }

        .alert-content {
            padding: 24px 20px 16px;
            text-align: center;
        }

        .alert-icon {
            width: 48px;
            height: 48px;
            margin: 0 auto 16px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .alert-icon.warning {
            background: #fff3cd;
            color: #856404;
        }

        .alert-icon.error {
            background: #f8d7da;
            color: #721c24;
        }

        .alert-icon.success {
            background: #d4edda;
            color: #155724;
        }

        .alert-title {
            font-size: 17px;
            font-weight: 600;
            color: #1d1d1f;
            margin-bottom: 8px;
            line-height: 1.3;
        }

        .alert-message {
            font-size: 13px;
            color: #6e6e73;
            line-height: 1.4;
            margin-bottom: 20px;
        }

        .alert-buttons {
            border-top: 0.5px solid #e5e5e7;
            display: flex;
        }

        .alert-button {
            flex: 1;
            padding: 14px 16px;
            background: none;
            border: none;
            font-size: 17px;
            font-weight: 400;
            cursor: pointer;
            transition: background-color 0.15s ease;
            position: relative;
        }

        .alert-button:not(:last-child)::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 0.5px;
            height: 100%;
            background: #e5e5e7;
        }

        .alert-button:hover {
            background: rgba(0, 0, 0, 0.04);
        }

        .alert-button:active {
            background: rgba(0, 0, 0, 0.08);
        }

        .alert-button.primary {
            color: #007AFF;
            font-weight: 600;
        }

        .alert-button.destructive {
            color: #FF3B30;
            font-weight: 600;
        }

        .alert-button.cancel {
            color: #1d1d1f;
        }

        /* Toast Alert Styles */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 10001;
            pointer-events: none;
        }

        .toast {
            background: rgba(0, 0, 0, 0.9);
            color: white;
            padding: 12px 20px;
            border-radius: 12px;
            margin-bottom: 12px;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12);
            transform: translateX(400px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            pointer-events: auto;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            max-width: 300px;
        }

        .toast.show {
            transform: translateX(0);
        }

        .toast.success {
            background: rgba(52, 199, 89, 0.95);
        }

        .toast.error {
            background: rgba(255, 59, 48, 0.95);
        }

        .toast.warning {
            background: rgba(255, 149, 0, 0.95);
        }

        .cart-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .cart-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            border-radius: 8px;
            overflow: hidden;
        }
        
        .cart-table th {
            background-color: #f1f5f9;
            padding: 16px;
            text-align: left;
            font-weight: 600;
            color: #475569;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }
        
        .cart-table td {
            padding: 16px;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
        }
        
        .product-thumbnail img {
            width: 80px;
            height: auto;
            border-radius: 4px;
            object-fit: cover;
        }
        
        .product-name a {
            color: #1e293b;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s;
        }
        
        .product-name a:hover {
            color: #3b82f6;
        }
        
        .quantity-control {
            display: flex;
            align-items: center;
        }
        
        .quantity-btn {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f1f5f9;
            border: none;
            cursor: pointer;
            font-size: 16px;
            color: #475569;
            border-radius: 4px;
        }
        
        .quantity-input {
            width: 50px;
            text-align: center;
            margin: 0 8px;
            padding: 4px;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
        }
        
        .remove-btn {
            color: #ef4444;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
            transition: transform 0.2s;
        }
        
        .remove-btn:hover {
            transform: scale(1.1);
        }
        
        .cart-summary {
            display: flex;
            justify-content: flex-end;
            margin-top: 24px;
        }
        
        .total-box {
            background: white;
            padding: 24px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            width: 300px;
        }
        
        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
        }
        
        .total-label {
            font-weight: 500;
            color: #64748b;
        }
        
        .total-amount {
            font-weight: 600;
            color: #1e293b;
        }
        
        .grand-total {
            border-top: 1px solid #e2e8f0;
            padding-top: 12px;
            margin-top: 12px;
            font-size: 1.1rem;
        }
        
        .checkout-btn {
            width: 100%;
            padding: 12px;
            background-color: #000000ff;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-top: 16px;
        }
        
        .checkout-btn:hover {
            background-color: #292a2cff;
        }
        
        .empty-cart {
            text-align: center;
            padding: 60px 0;
            color: #64748b;
        }
        
        @media (max-width: 768px) {
            .cart-table thead {
                display: none;
            }
            
            .cart-table tr {
                display: block;
                margin-bottom: 20px;
                border: 1px solid #e2e8f0;
                border-radius: 8px;
            }
            
            .cart-table td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-bottom: none;
            }
            
            .cart-table td::before {
                content: attr(data-label);
                font-weight: 500;
                color: #64748b;
                margin-right: 16px;
            }
            
            .total-box {
                width: 100%;
            }

            .alert-dialog {
                max-width: 280px;
            }

            .toast-container {
                top: 10px;
                right: 10px;
                left: 10px;
            }

            .toast {
                max-width: none;
                transform: translateY(-100px);
            }

            .toast.show {
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
        <div class="main-wrapper">
        @include('layouts.nav-2')
    <!-- Modern Alert Overlay -->
    <div class="alert-overlay" id="alertOverlay">
        <div class="alert-dialog">
            <div class="alert-content">
                <div class="alert-icon" id="alertIcon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="alert-title" id="alertTitle">Alert</div>
                <div class="alert-message" id="alertMessage">This is an alert message.</div>
            </div>
            <div class="alert-buttons" id="alertButtons">
                <button class="alert-button cancel" onclick="closeAlert()">Cancel</button>
                <button class="alert-button destructive" onclick="confirmAction()">OK</button>
            </div>
        </div>
    </div>

    <!-- Toast Container -->
    <div class="toast-container" id="toastContainer"></div>

    <div class="main-wrapper">
        <!-- Include your nav here -->
        <div class="h-[10dvh]"></div>
        
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
                    <span style="margin-left: 8px; font-size: 14px; font-weight: 600; color: #374151; padding: 6px 10px; border-radius: 6px; font-family: 'Orbitron', sans-serif;">Cart</span>
                </li>
            </ol>
        </nav>

        <!-- Main Cart Content -->
        <div class="cart-container py-2 px-4 sm:px-6 lg:px-8">
            <h1 class="text-sm font-bold text-gray-900" style="font-family: 'Orbitron', sans-serif; font-size: 20px; margin-bottom: 15px;">Your Shopping Cart</h1>
            
            <form action="{{ route('checkOut') }}" method="POST" name="checkout">
                @csrf
                <div class="overflow-x-auto">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Cart items will be populated here -->
                        </tbody>
                    </table>
                    
                    <!-- Empty cart message (initially hidden) -->
                    <div class="empty-cart hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        <h3 class="text-lg font-medium mb-2">Your cart is empty</h3>
                        <p class="text-gray-500">Start shopping to add items to your cart</p>
                    </div>
                </div>
                
                <!-- Cart Summary -->
                <div class="cart-summary">
                    <div class="total-box">
                        <div class="total-row">
                            <span class="total-label">Subtotal</span>
                            <span class="total-amount subtotal">0 LKR</span>
                        </div>
                        <div class="total-row">
                            <span class="total-label">Shipping</span>
                            <span class="total-amount">Calculated at checkout</span>
                        </div>
                        <div class="total-row grand-total">
                            <span class="total-label">Total</span>
                            <span class="total-amount cart-total">0 LKR</span>
                        </div>
                        
                        <input type="hidden" name="cartData" id="cartDataInput">
                        <button type="submit" class="checkout-btn" style="font-family: 'Orbitron', sans-serif;">Checkout</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Include your footer here -->
    </div>
            @include('layouts.footer2')
        <!-- Include your footer here -->
    </div>

    <!-- JS Files -->
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
        // Modern Alert System
        let currentAlertResolve = null;
        
        // Show modern alert dialog
        function showAlert(title, message, type = 'warning', buttons = null) {
            return new Promise((resolve) => {
                currentAlertResolve = resolve;
                
                const overlay = document.getElementById('alertOverlay');
                const titleEl = document.getElementById('alertTitle');
                const messageEl = document.getElementById('alertMessage');
                const iconEl = document.getElementById('alertIcon');
                const buttonsEl = document.getElementById('alertButtons');
                
                titleEl.textContent = title;
                messageEl.textContent = message;
                
                // Set icon based on type
                iconEl.className = `alert-icon ${type}`;
                if (type === 'warning') {
                    iconEl.innerHTML = '<i class="fas fa-exclamation-triangle"></i>';
                } else if (type === 'error') {
                    iconEl.innerHTML = '<i class="fas fa-times-circle"></i>';
                } else if (type === 'success') {
                    iconEl.innerHTML = '<i class="fas fa-check-circle"></i>';
                }
                
                // Set buttons
                if (buttons) {
                    buttonsEl.innerHTML = buttons;
                } else {
                    buttonsEl.innerHTML = `
                        <button class="alert-button cancel" onclick="closeAlert(false)">Cancel</button>
                        <button class="alert-button destructive" onclick="closeAlert(true)">OK</button>
                    `;
                }
                
                overlay.classList.add('active');
            });
        }
        
        function closeAlert(result = false) {
            const overlay = document.getElementById('alertOverlay');
            overlay.classList.remove('active');
            
            if (currentAlertResolve) {
                currentAlertResolve(result);
                currentAlertResolve = null;
            }
        }
        
        // Show toast notification
        function showToast(message, type = 'success', duration = 3000) {
            const container = document.getElementById('toastContainer');
            const toast = document.createElement('div');
            
            toast.className = `toast ${type}`;
            
            let icon = '';
            if (type === 'success') {
                icon = '<i class="fas fa-check"></i>';
            } else if (type === 'error') {
                icon = '<i class="fas fa-times"></i>';
            } else if (type === 'warning') {
                icon = '<i class="fas fa-exclamation"></i>';
            }
            
            toast.innerHTML = `${icon}${message}`;
            container.appendChild(toast);
            
            // Trigger animation
            setTimeout(() => toast.classList.add('show'), 100);
            
            // Remove toast after duration
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => {
                    if (container.contains(toast)) {
                        container.removeChild(toast);
                    }
                }, 400);
            }, duration);
        }

        // Function to populate the cart table from localStorage
        function populateCartTable() {
            const tableBody = document.querySelector('table tbody');
            const emptyCartMessage = document.querySelector('.empty-cart');
            const cart = JSON.parse(localStorage.getItem('shopping-cart')) || [];

            if (!tableBody) return;

            // Clear existing rows except the hidden template
            const existingRows = tableBody.querySelectorAll('tr:not(.hidden)');
            existingRows.forEach(row => row.remove());

            // Show empty message if cart is empty
            if (cart.length === 0) {
                emptyCartMessage.classList.remove('hidden');
                document.querySelector('.cart-summary').classList.add('hidden');
                return;
            } else {
                emptyCartMessage.classList.add('hidden');
                document.querySelector('.cart-summary').classList.remove('hidden');
            }

            // Add each cart item to the table
            cart.forEach(item => {
                const row = document.createElement('tr');
                const subtotal = parseFloat(item.price.replace(/[^0-9.-]+/g, '')) * item.quantity;

                row.innerHTML = `
                    <td class="product-thumbnail" data-label="Product">
                        <a href="singleProduct?product-id=${item.id}" class="flex items-center">
                            <img src="${item.image}" alt="${item.name}" class="mr-4" >
                            <span class="product-name" style="color: black; font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;">${item.name}</span>
                        </a>
                    </td>
                    <td class="product-price" data-label="Price">
                        <span class="amount" style="color: black; font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;">${item.price}</span>
                    </td>
                    <td class="product-quantity" data-label="Quantity">
                        <div class="quantity-control">
                            <button type="button" class="quantity-btn dec" data-product-id="${item.id}">-</button>
                            <input type="text" class="quantity-input" value="${item.quantity}" 
                                   data-product-id="${item.id}" >
                            <button type="button" class="quantity-btn inc" data-product-id="${item.id}">+</button>
                        </div>
                    </td>
                    <td class="product-subtotal" data-label="Subtotal" style="color: black; font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;">${formatPrice(subtotal)}</td>
                    <td data-label="Remove">
                        <button type="button" class="remove-btn" data-product-id="${item.id}">×</button>
                    </td>
                `;

                tableBody.appendChild(row);
            });

            // Add event listeners
            addQuantityControlListeners();
            addRemoveButtonListeners();
            updateCartTotal();
        }

        // Function to update quantity
        async function updateQuantity(productId, newQuantity) {
            try {
                // Fetch available quantity from the server
                const response = await fetch(`/product-quantity/${productId}`);
                const data = await response.json();
                const availableQty = data.qty;

                // Check if the new quantity exceeds available stock
                if (newQuantity > availableQty) {
                    await showAlert(
                        'Stock Limit Exceeded',
                        `Only ${availableQty} items are available in stock.`,
                        'warning',
                        '<button class="alert-button primary" onclick="closeAlert(true)">Got it</button>'
                    );
                    return;
                }

                // Update the cart
                let cart = JSON.parse(localStorage.getItem('shopping-cart')) || [];
                const item = cart.find(item => parseInt(item.id) === parseInt(productId));

                if (item) {
                    item.quantity = Math.max(1, newQuantity); // Ensure quantity is at least 1
                    localStorage.setItem('shopping-cart', JSON.stringify(cart));
                    populateCartTable(); // Refresh the table
                    showToast('Quantity updated successfully', 'success');
                }
            } catch (error) {
                console.error('Error fetching product quantity:', error);
                showToast('Error updating quantity', 'error');
            }
        }

        // Function to remove item from cart
        async function removeCartItem(productId) {
            const confirmed = await showAlert(
                'Remove Item',
                'Are you sure you want to remove this item from your cart?',
                'warning',
                `<button class="alert-button cancel" onclick="closeAlert(false)">Cancel</button>
                 <button class="alert-button destructive" onclick="closeAlert(true)">Remove</button>`
            );

            if (confirmed) {
                let cart = JSON.parse(localStorage.getItem('shopping-cart')) || [];
                cart = cart.filter(item => parseInt(item.id) !== parseInt(productId));
                localStorage.setItem('shopping-cart', JSON.stringify(cart));
                populateCartTable(); // Refresh the table
                showToast('Item removed from cart', 'success');
            }
        }

        // Function to add quantity control listeners
        function addQuantityControlListeners() {
            // Decrement buttons
            document.querySelectorAll('.dec').forEach(btn => {
                btn.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    const input = this.parentElement.querySelector('.quantity-input');
                    const currentValue = parseInt(input.value);
                    updateQuantity(productId, currentValue - 1);
                });
            });

            // Increment buttons
            document.querySelectorAll('.inc').forEach(btn => {
                btn.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    const input = this.parentElement.querySelector('.quantity-input');
                    const currentValue = parseInt(input.value);
                    updateQuantity(productId, currentValue + 1);
                });
            });

            // Input changes
            document.querySelectorAll('.quantity-input').forEach(input => {
                input.addEventListener('change', function() {
                    const productId = this.getAttribute('data-product-id');
                    const newValue = parseInt(this.value);
                    if (!isNaN(newValue)) {
                        updateQuantity(productId, newValue);
                    }
                });
            });
        }

        // Function to add remove button listeners
        function addRemoveButtonListeners() {
            document.querySelectorAll('.remove-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    removeCartItem(productId);
                });
            });
        }

        // Helper function to format price
        function formatPrice(price) {
            return price.toLocaleString() + ' LKR';
        }

        // Function to update cart total
        function updateCartTotal() {
            const cart = JSON.parse(localStorage.getItem('shopping-cart')) || [];
            const subtotal = cart.reduce((sum, item) => {
                const price = parseFloat(item.price.replace(/[^0-9.-]+/g, ''));
                return sum + (price * item.quantity);
            }, 0);

            // Update subtotal and total display
            document.querySelector('.subtotal').textContent = formatPrice(subtotal);
            document.querySelector('.cart-total').textContent = formatPrice(subtotal);
        }

        // Initialize cart when page loads
        document.addEventListener('DOMContentLoaded', () => {
            populateCartTable();
            
            // Populate hidden input with cart data before form submission
            document.forms["checkout"].addEventListener("submit", function() {
                const cart = JSON.parse(localStorage.getItem("shopping-cart")) || [];
                document.getElementById("cartDataInput").value = JSON.stringify(cart);
            });

            // Close alert when clicking overlay
            document.getElementById('alertOverlay').addEventListener('click', function(e) {
                if (e.target === this) {
                    closeAlert(false);
                }
            });

            // Prevent alert dialog from closing when clicking inside
            document.querySelector('.alert-dialog').addEventListener('click', function(e) {
                e.stopPropagation();
            });

            // Handle keyboard events for alerts
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && document.getElementById('alertOverlay').classList.contains('active')) {
                    closeAlert(false);
                }
            });
        });

        // Example usage for testing (you can remove this)
        // showToast('Welcome to your cart!', 'success');
    </script>
</body>
</html>