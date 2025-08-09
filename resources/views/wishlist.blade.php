<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <!-- Favicon -->
    <title>NovaLink Computers | Your Wishlist</title>
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

        
        .wishlist-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .wishlist-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            border-radius: 8px;
            overflow: hidden;
        }
        
        .wishlist-table th {
            background-color: #f1f5f9;
            padding: 16px;
            text-align: left;
            font-weight: 600;
            color: #475569;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }
        
        .wishlist-table td {
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
        
        .action-buttons {
            display: flex;
            gap: 8px;
        }
        
        .action-btn {
            padding: 8px 12px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        
        .add-cart-btn {
            background-color: #3b82f6;
            color: white;
            border: none;
        }
        
        .add-cart-btn:hover {
            background-color: #2563eb;
        }
        
        .remove-btn {
            background-color: #f1f5f9;
            color: #64748b;
            border: 1px solid #e2e8f0;
        }
        
        .remove-btn:hover {
            background-color: #fee2e2;
            color: #dc2626;
            border-color: #fecaca;
        }
        
        .empty-wishlist {
            text-align: center;
            padding: 60px 0;
            color: #64748b;
        }
        
        .page-title {
            font-size: 28px;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 24px;
        }
        
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 50;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.4);
            backdrop-filter: blur(2px);
        }
        
        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 32px;
            border-radius: 12px;
            width: 90%;
            max-width: 400px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            animation: modalFadeIn 0.3s ease-out;
        }
        
        @keyframes modalFadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .modal-message {
            font-size: 18px;
            color: #1e293b;
            margin-bottom: 24px;
            font-weight: 500;
        }
        
        .modal-btn {
            padding: 10px 24px;
            background-color: #000000ff;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .modal-btn:hover {
            background-color: #191a1bff;
        }
        
        .close-modal {
            position: absolute;
            top: 16px;
            right: 16px;
            font-size: 24px;
            color: #94a3b8;
            cursor: pointer;
        }
        
        .close-modal:hover {
            color: #64748b;
        }
        
        @media (max-width: 768px) {
            .wishlist-table thead {
                display: none;
            }
            
            .wishlist-table tr {
                display: block;
                margin-bottom: 20px;
                border: 1px solid #e2e8f0;
                border-radius: 8px;
            }
            
            .wishlist-table td {
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-bottom: none;
            }
            
            .wishlist-table td::before {
                content: attr(data-label);
                font-weight: 500;
                color: #64748b;
                margin-right: 16px;
            }
            
            .action-buttons {
                justify-content: flex-end;
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        @include('layouts.nav-2')

        <div class="h-[10dvh]"></div>


        <nav style="display: flex; align-items: center; padding: 16px 24px;    max-width: 1200px; margin: 0px auto;" aria-label="Breadcrumb">
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
                    <span style="margin-left: 8px; font-size: 14px; font-weight: 600; color: #374151; padding: 6px 10px; border-radius: 6px; font-family: 'Orbitron', sans-serif;">Wishlist</span>
                </li>
            </ol>
        </nav>

        
        <!-- Main Wishlist Content -->
        <div class="wishlist-container py-2 px-4 sm:px-6 lg:px-8 mb-4">
            <h1 class="page-title" style="font-family: 'Orbitron', sans-serif;  font-size: 20px;">Your Wishlist</h1>
            
            <div class="overflow-x-auto">
                <table class="wishlist-table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample wishlist item (hidden template) -->
                        
                    </tbody>
                </table>
                
                <!-- Empty wishlist message (initially hidden) -->
                <div class="empty-wishlist hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    <h3 class="text-xl font-medium mb-2">Your wishlist is empty</h3>
                    <p class="text-gray-500">Save your favorite products to view them later</p>
                    <a href="/products" class="inline-block mt-4 px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition-colors">
                        Browse Products
                    </a>
                </div>
            </div>
        </div>

        @include('layouts.footer2')

        <!-- Modal -->
        <div id="customAlert" class="modal">
            <div class="modal-content">
                <span id="closeModal" class="close-modal">&times;</span>
                <div id="modalMessage" class="modal-message"></div>
                <button id="modalButton" class="modal-btn">OK</button>
            </div>
        </div>
    </div>

    <!-- Global Vendor, plugins JS -->
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

    <!-- Scripts -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script>
        // Function to populate the wishlist table
        function populateWishlist() {
            const tableBody = document.querySelector('.wishlist-table tbody');
            const emptyWishlistMessage = document.querySelector('.empty-wishlist');
            const wishlist = JSON.parse(localStorage.getItem('wishlist-items')) || [];

            if (!tableBody) return;

            // Clear existing rows except the hidden template
            const existingRows = tableBody.querySelectorAll('tr:not(.hidden)');
            existingRows.forEach(row => row.remove());

            // Show empty message if wishlist is empty
            if (wishlist.length === 0) {
                emptyWishlistMessage.classList.remove('hidden');
                return;
            } else {
                emptyWishlistMessage.classList.add('hidden');
            }

            // Add each wishlist item to the table
            wishlist.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="product-thumbnail" data-label="Product">
                        <a href="singleProduct?product-id=${item.id}" class="flex items-center">
                            <img src="${item.image}" alt="${item.name}" class="mr-4">
                            <span class="product-name" style=" color: black; ">${item.name}</span>
                        </a>
                    </td>
                    <td class="product-price" data-label="Price">
                        <span class="amount">${item.price}</span>
                    </td>
                    <td data-label="Actions">
                        <div class="action-buttons">
                            <button class="action-btn add-cart-btn bg-black" data-product-id="${item.id}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                Add to Cart
                            </button>
                            <button class="action-btn remove-btn" data-product-id="${item.id}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                </svg>
                                Remove
                            </button>
                        </div>
                    </td>
                `;

                tableBody.appendChild(row);
            });

            // Add event listeners
            addButtonListeners();
        }

        // Function to add item to cart
        function addToCart(item) {
            fetch(`/product-quantity/${item.id}`)
                .then(response => response.json())
                .then(data => {
                    const productQuantity = data.qty;

                    if (productQuantity <= 0) {
                        showModal('Sorry, this product is out of stock!');
                        return;
                    }

                    let cart = JSON.parse(localStorage.getItem('shopping-cart')) || [];
                    const existingItemIndex = cart.findIndex(cartItem => parseInt(cartItem.id) === parseInt(item.id));

                    if (existingItemIndex !== -1) {
                        if (cart[existingItemIndex].quantity < productQuantity) {
                            cart[existingItemIndex].quantity += 1;
                        } else {
                            showModal('Cannot add more of this item. Stock limit reached.');
                            return;
                        }
                    } else {
                        const newItem = {
                            ...item,
                            quantity: 1
                        };
                        cart.push(newItem);
                    }

                    localStorage.setItem('shopping-cart', JSON.stringify(cart));
                    showModal("Product added to cart successfully!");
                })
                .catch(error => {
                    console.error('Error:', error);
                    showModal('An error occurred. Please try again.');
                });
        }

        // Function to remove item from wishlist
        function removeWishlistItem(productId) {
            let wishlist = JSON.parse(localStorage.getItem('wishlist-items')) || [];
            wishlist = wishlist.filter(item => parseInt(item.id) !== parseInt(productId));
            localStorage.setItem('wishlist-items', JSON.stringify(wishlist));
            populateWishlist();
        }

        // Function to add button listeners
        function addButtonListeners() {
            // Add to cart buttons
            document.querySelectorAll('.add-cart-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    const wishlistItems = JSON.parse(localStorage.getItem('wishlist-items')) || [];
                    const item = wishlistItems.find(item => parseInt(item.id) === parseInt(productId));

                    if (item) {
                        addToCart(item);
                    }
                });
            });

            // Remove buttons
            document.querySelectorAll('.remove-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-product-id');
                    removeWishlistItem(productId);
                });
            });
        }

        // Modal functions
        function showModal(message) {
            const modal = document.getElementById('customAlert');
            const modalMessage = document.getElementById('modalMessage');
            
            modalMessage.textContent = message;
            modal.style.display = "block";
            
            document.getElementById('closeModal').onclick = function() {
                modal.style.display = "none";
            }
            
            document.getElementById('modalButton').onclick = function() {
                modal.style.display = "none";
            }
            
            // Close when clicking outside modal
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        }

        // Initialize wishlist when page loads
        document.addEventListener('DOMContentLoaded', () => {
            populateWishlist();
        });
    </script>
</body>
</html>