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
    .checkout-container {
        display: flex;
        justify-content: center; /* Center horizontally */
    }

    .checkout-btn {
        background-color: rgb(49, 64, 106); /* Dark blue */
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        max-width: 200px; /* Adjust width for responsiveness */
        text-align: center;
        font-size: 16px;
    }

    @media (min-width: 640px) {
        .checkout-btn {
            width: auto;
        }
    }

    .cart-total-label {
    text-align: right;
    font-weight: bold;
    padding-right: 10px;
}

.cart-total-amount {
    font-weight: bold;
    color: rgb(49, 64, 106); /* Match checkout button color */
    text-align: left;
}
</style>

</head>

<body>
    <div class="main-wrapper">
    @include('layouts.nav-2')

        <div class="h-[10dvh]"></div>
        <!-- breadcrumb-area start -->
        
        <!-- breadcrumb-area end -->
        <!-- Wishlist Area Start -->
        <div class="cart-main-area pt-100px pb-100px">
            <div class="container">
                <h3 class="cart-page-title">Your cart items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                    <form action="{{ route('checkOut') }}" method="POST" name="checkout">
                    @csrf
                    <div class="table-content table-responsive cart-table-content">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Until Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
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
                                    <tfoot>
            <tr>
                <td colspan="4"></td>
                <td class="cart-total-label"><strong>Total:</strong></td>
                <td class="cart-total-amount">0 LKR</td>
            </tr>
        </tfoot>
                                </table>
                                <br/>

                                <input type="hidden" name="cartData" id="cartDataInput">
                                <div class="checkout-container">

                                <button type="submit" class="checkout-btn">CheckOut</button>
                                            </div>
                            </div>
                        </form>
                    </div>
                </div>

                



<script>
    // Populate the hidden input with cart data before form submission
    document.forms["checkout"].addEventListener("submit", function () {
        const cart = JSON.parse(localStorage.getItem("shopping-cart")) || [];
        document.getElementById("cartDataInput").value = JSON.stringify(cart);
    });
</script>

            </div>

        </div>
        <!-- Wishlist Area End -->
        <!-- footer -->
        @include('layouts.footer2')

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
        // Function to populate the cart table from localStorage
        function populateCartTable() {
            const tableBody = document.querySelector('table tbody');
            const cart = JSON.parse(localStorage.getItem('shopping-cart')) || [];

            if (!tableBody) return;

            // Clear existing rows except the hidden template
            const existingRows = tableBody.querySelectorAll('tr:not(.hidden)');
            existingRows.forEach(row => row.remove());

            // Add each cart item to the table
            cart.forEach(item => {
                const row = document.createElement('tr');
                const subtotal = parseFloat(item.price.replace(/[^0-9.-]+/g, '')) * item.quantity;

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
            <td class="product-quantity">
                <div class="cart-plus-minus">
                    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="${item.quantity}" 
                           data-product-id="${item.id}" />
                    <div class="dec qtybutton">-</div>
                    <div class="inc qtybutton">+</div>
                </div>
            </td>
            <td class="product-subtotal">${formatPrice(subtotal)}</td>
            <td class="product-remove">
                <a href="#" class="remove-item" data-product-id="${item.id}"><i class="pe-7s-trash p-2 scale-110 bg-red-700 font-semibold rounded-md text-white"></i></a>
            </td>
        `;

                tableBody.appendChild(row);
            });

            // Add event listeners for quantity controls and remove buttons
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
        // Function to add quantity control listeners
        function addQuantityControlListeners() {
            const quantityInputs = document.querySelectorAll('.cart-plus-minus-box');

            quantityInputs.forEach(input => {
                const productId = input.getAttribute('data-product-id');
                const decrementBtn = input.parentElement.querySelector('.dec');
                const incrementBtn = input.parentElement.querySelector('.inc');

                decrementBtn.addEventListener('click', () => {
                    const currentValue = parseInt(input.value);
                    updateQuantity(productId, currentValue - 1);
                });

                incrementBtn.addEventListener('click', () => {
                    const currentValue = parseInt(input.value);
                    updateQuantity(productId, currentValue + 1);
                });

                input.addEventListener('change', (e) => {
                    const newValue = parseInt(e.target.value);
                    if (!isNaN(newValue)) {
                        updateQuantity(productId, newValue);
                    }
                });
            });
        }

        // Function to add remove button listeners
        function addRemoveButtonListeners() {
            const removeButtons = document.querySelectorAll('.remove-item');
            removeButtons.forEach(button => {
                button.addEventListener('click', (e) => {
                    e.preventDefault();
                    const productId = button.getAttribute('data-product-id');
                    removeCartItem(productId);
                });
            });
        }

        // Helper function to format price
        function formatPrice(price) {
            return price.toLocaleString() + ' LKR';
        }

        // Function to update cart total
// Function to update cart total
function updateCartTotal() {
    const cart = JSON.parse(localStorage.getItem('shopping-cart')) || [];
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