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
    <!-- Minify Version -->
    <!-- <link rel="stylesheet" href="assets/css/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css"> -->
    <!-- Tailwind CSS -->
    
    <!-- Custom Styles -->
    <style>

        
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
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        @include('layouts.nav-2')

        <div class="h-[10dvh]"></div>
        

        <nav style="display: flex; align-items: center; padding: 16px 24px;    max-width: 1200px; margin: 10px auto;" aria-label="Breadcrumb">
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
            <h1 class="text-sm font-bold text-gray-900 " style="font-family: 'Orbitron', sans-serif;  font-size: 20px; margin-bottom: 15px;">Your Shopping Cart</h1>
            
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
                            <!-- Sample cart item (hidden template) -->
                            
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
                        <button type="submit" class="checkout-btn" style="font-family: 'Orbitron', sans-serif;"> Checkout</button>
                    </div>
                </div>
            </form>
        </div>

        @include('layouts.footer2')
    </div>

    <!-- JS Files
    ============================================ -->
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
    <!--Main JS (Common Activation Codes)-->
    <script src="assets/js/main.js"></script>

        <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- Scripts -->
    <script>
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
                            <span class="product-name" style=" color: black; font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;">${item.name}</span>
                        </a>
                    </td>
                    <td class="product-price" data-label="Price">
                        <span class="amount" style=" color: black; font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;">${item.price}</span>
                    </td>
                    <td class="product-quantity" data-label="Quantity">
                        <div class="quantity-control">
                            <button type="button" class="quantity-btn dec" data-product-id="${item.id}">-</button>
                            <input type="text" class="quantity-input" value="${item.quantity}" 
                                   data-product-id="${item.id}" >
                            <button type="button" class="quantity-btn inc" data-product-id="${item.id}">+</button>
                        </div>
                    </td>
                    <td class="product-subtotal" data-label="Subtotal" style=" color: black; font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;">${formatPrice(subtotal)}</td>
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
                    alert(`Only ${availableQty} items are available in stock.`);
                    return;
                }

                // Update the cart
                let cart = JSON.parse(localStorage.getItem('shopping-cart')) || [];
                const item = cart.find(item => parseInt(item.id) === parseInt(productId));

                if (item) {
                    item.quantity = Math.max(1, newQuantity); // Ensure quantity is at least 1
                    localStorage.setItem('shopping-cart', JSON.stringify(cart));
                    populateCartTable(); // Refresh the table
                }
            } catch (error) {
                console.error('Error fetching product quantity:', error);
            }
        }

        // Function to remove item from cart
        function removeCartItem(productId) {
            let cart = JSON.parse(localStorage.getItem('shopping-cart')) || [];
            cart = cart.filter(item => parseInt(item.id) !== parseInt(productId));
            localStorage.setItem('shopping-cart', JSON.stringify(cart));
            populateCartTable(); // Refresh the table
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
                    if (confirm('Are you sure you want to remove this item from your cart?')) {
                        removeCartItem(productId);
                    }
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
        });
    </script>
</body>
</html>