<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <!-- Favicon -->
    <title>NovaLink Computers | CheckOut</title>
    <meta name="description" content="NovaLink Computers offer the best computers available at the market">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/N_back.jpg" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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

        <div class="h-[10dvh]"></div>
        <!-- breadcrumb-area start -->
        
        @if(session('customer_id'))  <!-- Check if the customer is logged in via session -->
            @php
                // Retrieve customer details from the session (assuming the customer data is stored in the session)
                $customer = App\Models\Customer::find(session('customer_id'));
            @endphp
        @endif
        <!-- breadcrumb-area end -->
        <!-- checkout area start -->
        <div class="checkout-area pt-100px pb-100px">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="billing-info-wrap">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>First Name</label>
                                        <input type="text" name="fname" value="{{ $customer->fname ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Last Name</label>
                                        <input type="text" name="lname" value="{{ $customer->lname ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Phone</label>
                                        <input type="text" name="phone" value="{{ $customer->phone ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Email Address</label>
                                        <input type="text" name="email" value="{{ $customer->email ?? '' }}" />
                                    </div>
                                </div>
                                <!-- Address Fields -->
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                        <label>Address Line 1</label>
                                        <input type="text" name="address1" value="{{ $customer->address_line1 ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                        <label>Address Line 2</label>
                                        <input type="text" name="address2" value="{{ $customer->address_line2 ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>City</label>
                                        <input type="text" name="city" value="{{ $customer->city ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Postal Code</label>
                                        <input type="text" name="postal_code" value="{{ $customer->postal_code ?? '' }}" />
                                    </div>
                                </div>
                            </div>
                            <!-- Additional info section -->
                            <div class="additional-info-wrap">
                                <h4>Additional information</h4>
                                <div class="additional-info">
                                    <label>Order notes</label>
                                    <textarea placeholder="Notes about your order, e.g. special notes for delivery." name="message"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product and Cart Details -->
                    <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                        <div class="your-order-area">
                            <h3>Your order</h3>
                            <div class="your-order-wrap gray-bg-4">
                                <!-- Display Cart Products -->
                                <div class="your-order-product-info">
                                    <div class="your-order-top">
                                        <ul>
                                            <li>Product</li>
                                            <li>Total</li>
                                        </ul>
                                    </div>
                                    <div class="your-order-middle">
                                        <ul>
                                        @foreach($cartProducts as $cartProduct)
                                            <li style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px;">
                                                <span class="order-middle-left" style="flex-grow: 1; text-align: left;">{{ $cartProduct['name'] }} X {{ $cartProduct['quantity'] }}</span>
                                                <span class="order-price" style="text-align: right;">
                                                    @php
                                                        // Calculate the total for each product (price * quantity)
                                                        $totalPrice = $cartProduct['quantity'] * (float)filter_var($cartProduct['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                                                    @endphp
                                                    {{ $totalPrice }}
                                                </span>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>
                                    <div class="your-order-bottom">
                                        <ul>
                                            <li class="your-order-shipping">Shipping</li>
                                            <li>Free shipping</li>
                                        </ul>
                                    </div>
                                    <div class="your-order-total">
                                        <ul>
                                            <li class="order-total">Total</li>
                                            <li>{{ $totalAmount }}</li> <!-- Assuming you calculate the total -->
                                        </ul>
                                    </div>
                                </div>

                                <div class="payment-method">
                                    <div class="payment-accordion element-mrg">
                                        <div id="faq" class="panel-group">
                                        <label hidden class="d-flex gap-2 items-center space-x-2">
                                                <input
                                                    type="radio"
                                                    name="payment"
                                                    value="all"
                                                    
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500"
                                                    style="width: 15px; height: 15px;">
                                                <span>Direct Bank Transfer</span>
                                            </label>

                                            <label class="d-flex gap-2 items-center space-x-2">
                                                <input
                                                    type="radio"
                                                    name="payment"
                                                    value="all"
                                                    checked
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500" style="width: 15px; height: 15px;">
                                                <span>Cash On Delivery</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="Place-order mt-25">
                                <a class="btn-hover" href="#" id="placeOrderBtn">Place Order</a>
                                <div id="loadingIndicator" style="display: none; font-size: 16px; color: #003366; margin-top: 10px;">Processing...</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- checkout area end -->
        <!-- footer -->

        <div id="customAlert" class="modal">
        <div class="modal-content">
            <span id="closeModal" class="close">&times;</span>
            <h2 id="modalMessage"></h2>
            <button id="modalButton" class="modal-btn">OK</button>
        </div>
    </div>

        @include('layouts.footer2')

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
</body>

</html>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const placeOrderBtn = document.querySelector('#placeOrderBtn');
    const loadingIndicator = document.querySelector('#loadingIndicator');
    
    if (placeOrderBtn) {
        placeOrderBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Show loading indicator
            placeOrderBtn.style.display = 'none';  // Hide the button
            loadingIndicator.style.display = 'block';  // Show processing text

            // Get form inputs
            const fnameInput = document.querySelector('input[name="fname"]');
            const lnameInput = document.querySelector('input[name="lname"]');
            const phoneInput = document.querySelector('input[name="phone"]');
            const emailInput = document.querySelector('input[name="email"]');
            const messageInput = document.querySelector('textarea[name="message"]');
            const address1Input = document.querySelector('input[name="address1"]');
            const address2Input = document.querySelector('input[name="address2"]');
            const cityInput = document.querySelector('input[name="city"]');
            const postalCodeInput = document.querySelector('input[name="postal_code"]');

            // Validate required fields
            if (!fnameInput || !fnameInput.value.trim()) {
                showModal("First name is required.");
                resetButtonState();
                return;
            }
            if (!lnameInput || !lnameInput.value.trim()) {
                showModal("Last name is required.");
                resetButtonState();
                return;
            }
            if (!phoneInput || !phoneInput.value.trim()) {
                showModal("Phone number is required.");
                resetButtonState();
                return;
            }
            if (!emailInput || !emailInput.value.trim()) {
                showModal("Email is required.");
                resetButtonState();
                return;
            }

            if (!address1Input?.value.trim()) return showModal("Address Line 1 is required.");
            if (!cityInput?.value.trim()) return showModal("City is required.");
            if (!postalCodeInput?.value.trim()) return showModal("Postal Code is required.");

            // Create form data
            const formData = new FormData();
            formData.append('fname', fnameInput.value.trim());
            formData.append('lname', lnameInput.value.trim());
            formData.append('phone', phoneInput.value.trim());
            formData.append('email', emailInput.value.trim());

            formData.append('address1', address1Input.value.trim());
            if (address2Input?.value.trim()) formData.append('address2', address2Input.value.trim());
            formData.append('city', cityInput.value.trim());
            formData.append('postal_code', postalCodeInput.value.trim());

            // Append the message (order notes) if available (optional field)
            if (messageInput && messageInput.value.trim()) {
                formData.append('message', messageInput.value.trim());
            }

            // Add cart data
            if (window.cartData && window.cartData.length > 0) {
                formData.append('cartData', JSON.stringify(window.cartData));
            } else {
                alert('Your cart is empty.');
                resetButtonState();
                return;
            }

            // Add CSRF token
            const token = document.querySelector('meta[name="csrf-token"]');
            if (token) {
                formData.append('_token', token.content);
            }

            // Submit the order
            fetch('/checkout/process', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': token ? token.content : '',
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok.');
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    showModal("Order placed successfully!");
                    // Redirect to payment form if necessary
                    // window.location.href = '/payment/form?data=' + encodeURIComponent(JSON.stringify(data.paymentData));
                } else {
                    alert(data.message || 'Failed to process order.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showModal("Failed to process order. Please try again.");
            })
            .finally(() => {
                // Reset button and loading indicator
                resetButtonState();
            });
        });
    } else {
        console.error('Place order button not found');
    }

    // Helper function to reset button and loading indicator
    function resetButtonState() {
        if (placeOrderBtn) placeOrderBtn.style.display = 'block';
        if (loadingIndicator) loadingIndicator.style.display = 'none';
    }
});

// Show modal for success/error messages
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

<script>
    window.cartData = {!! json_encode($cartProducts) !!};
</script>