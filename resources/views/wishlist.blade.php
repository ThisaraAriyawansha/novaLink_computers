
<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreX Computers | Best Computers for you</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="CoreX Computers offer the best computers available at the market">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/X_logo.jpg" />


    <!-- CSS
    ============================================ -->
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/font.awesome.css" />
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/venobox.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<style>
/* Modal styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5); /* Darkened background */
    padding-top: 60px;
}

.modal-content {
    background-color: white;
    margin: 5% auto;
    padding: 30px;
    border: 1px solid #ddd; /* Light border for subtle separation */
    width: 80%;
    max-width: 500px;
    position: relative;
    text-align: center;
    border-radius: 15px; /* Rounded corners for modern look */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    transform: translateY(-100px);
    animation: modalAppear 0.3s ease-out forwards;
}

/* Fade-in animation */
@keyframes modalAppear {
    from {
        transform: translateY(-100px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.close {
    color: #aaa;
    font-size: 28px;
    font-weight: bold;
    position: absolute;
    top: 0;
    right: 10px;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: #333;
    text-decoration: none;
}

.modal-btn {
    padding: 12px 25px;
    background-color: rgb(49, 64, 106);
    color: white;
    border: none;
    cursor: pointer;
    font-size: 16px;
    display: inline-block;
    margin-top: 20px;
    border-radius: 8px; /* Rounded corners for button */
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.modal-btn:hover {
    transform: scale(1.05); /* Slight scale effect on hover */
}

.modal-btn:focus {
    outline: none;
}

/* Styling for the message text */
#modalMessage {
    font-size: 18px;
    color: #333;
    margin-bottom: 20px;
    font-weight: 600;
}
</style>
<body>
    <div class="main-wrapper">
    @include('layouts.nav-2')

        <div class="h-[12dvh]"></div>
        <!-- breadcrumb-area start -->
        
        <!-- breadcrumb-area end -->
        <!-- Wishlist Area Start -->
        <div class="cart-main-area pt-100px pb-100px">
            <div class="container">
                <h3 class="cart-page-title">Your wishlist items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="#">
                            <div class="table-content table-responsive cart-table-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Until Price</th>
                                            <th>Controls</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!--sample cart item-->
                                        <tr class="hidden">
                                            <td class="product-thumbnail">
                                                <a href="#"><img class="img-responsive ml-15px" src="assets/images/product-image/1.webp" alt="" /></a>
                                            </td>
                                            <td class="product-name"><a href="#">Modern Smart Phone</a></td>
                                            <td class="product-price-cart"><span class="amount">$60.00</span></td>
                                            <td class="product-quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                                </div>
                                            </td>
                                            <td class="product-subtotal">$70.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wishlist Area End -->
        <!-- footer -->
        @include('layouts.footer2')

        <div id="customAlert" class="modal">
        <div class="modal-content">
            <span id="closeModal" class="close">&times;</span>
            <h2 id="modalMessage"></h2>
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

    <script>
        // Updated function to populate the cart table
        function populateCartTable() {
            const tableBody = document.querySelector('table tbody');
            const cart = JSON.parse(localStorage.getItem('wishlist-items')) || [];

            if (!tableBody) return;

            // Clear existing rows except the hidden template
            const existingRows = tableBody.querySelectorAll('tr:not(.hidden)');
            existingRows.forEach(row => row.remove());

            // Add each cart item to the table
            cart.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
            <td class="product-thumbnail">
                <a href="single-product.php?product-id=${item.id}">
                    <img class="img-responsive ml-15px" src="${item.image}" alt="${item.name}" />
                </a>
            </td>
            <td class="product-name">
                <a href="single-product.php?product-id=${item.id}">${item.name}</a>
            </td>
            <td class="product-price-cart">
                <span class="amount">${item.price}</span>
            </td>
            <td class="product-remove">
                <a href="#" class="add-to-cart" data-product-id="${item.id}">
                    <i class="pe-7s-cart p-2 scale-110 bg-green-700 font-semibold rounded-md text-white"></i>
                </a>
                <a href="#" class="remove-item" data-product-id="${item.id}">
                    <i class="pe-7s-trash p-2 scale-110 bg-red-700 font-semibold rounded-md text-white"></i>
                </a>
            </td>
        `;

                tableBody.appendChild(row);
            });

            // Add event listeners for remove and add to cart buttons
            addButtonListeners();
            updateCartTotal();
        }
        // Function to add item to cart
// Function to add item to cart
function addToCart(item) {
    // Get the current product quantity from the server
    fetch(`/product-quantity/${item.id}`)
        .then(response => response.json())
        .then(data => {
            const productQuantity = data.qty;

            // Check if the requested quantity is available
            if (productQuantity <= 0) {
                alert('Sorry, this product is out of stock!');
                return;
            }

            let cart = JSON.parse(localStorage.getItem('shopping-cart')) || [];

            // Check if item already exists in cart
            const existingItemIndex = cart.findIndex(cartItem => parseInt(cartItem.id) === parseInt(item.id));

            if (existingItemIndex !== -1) {
                // If item exists, increment quantity only if stock is available
                if (cart[existingItemIndex].quantity < productQuantity) {
                    cart[existingItemIndex].quantity += 1;
                } else {
                    alert('Cannot add more of this item. Stock limit reached.');
                    return;
                }
            } else {
                // If item doesn't exist, add it with quantity 1
                const newItem = {
                    ...item,
                    quantity: 1
                };
                cart.push(newItem);
            }

            localStorage.setItem('shopping-cart', JSON.stringify(cart));
            showModal("Product added to cart successfully!");

            setTimeout(() => {
                window.location.reload();
            }, 2000);
        })
        .catch(error => {
            console.error('Error fetching product quantity:', error);
            alert('An error occurred. Please try again later.');
        });
}


        // Function to remove item from cart
        function removeCartItem(productId) {
            let cart = JSON.parse(localStorage.getItem('wishlist-items')) || [];
            cart = cart.filter(item => parseInt(item.id) !== parseInt(productId));
            localStorage.setItem('wishlist-items', JSON.stringify(cart));
            populateCartTable(); // Refresh the table
        }

        // Updated function to add button listeners
        function addButtonListeners() {
            // Remove button listeners
            const removeButtons = document.querySelectorAll('.remove-item');
            removeButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    const productId = button.getAttribute('data-product-id');
                    removeCartItem(productId);
                });
            });

            // Add to cart button listeners
            const addToCartButtons = document.querySelectorAll('.add-to-cart');
            addToCartButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    const productId = button.getAttribute('data-product-id');
                    const wishlistItems = JSON.parse(localStorage.getItem('wishlist-items')) || [];
                    const item = wishlistItems.find(item => parseInt(item.id) === parseInt(productId));

                    if (item) {
                        addToCart(item);
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
            const cart = JSON.parse(localStorage.getItem('wishlist-items')) || [];
            const total = cart.reduce((sum, item) => {
                const price = parseFloat(item.price.replace(/[^0-9.-]+/g, ''));
                return sum + (price * item.quantity);
            }, 0);

            const totalElement = document.querySelector('.cart-total-amount');
            if (totalElement) {
                totalElement.textContent = formatPrice(total);
            }
        }

        // Initialize table when page loads
        document.addEventListener('DOMContentLoaded', () => {
            populateCartTable();
        });
    </script>
</body>

</html>


<script>
    function showModal(message) {
    const modal = document.getElementById('customAlert');
    const modalMessage = document.getElementById('modalMessage');
    const closeModal = document.getElementById('closeModal');
    const modalButton = document.getElementById('modalButton');

    modalMessage.textContent = message;
    modal.style.display = "block";

    closeModal.onclick = function() {
        modal.style.display = "none";
    }

    modalButton.onclick = function() {
        modal.style.display = "none";
    }
}
</script>