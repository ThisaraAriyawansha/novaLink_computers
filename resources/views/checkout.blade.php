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
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }
        
        .checkout-container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            background-color: #fff;
            transition: border-color 0.2s;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 0 1px #6366f1;
        }
        
        .order-summary {
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }
        
        .order-item {
            border-bottom: 1px solid #f1f5f9;
            padding: 1rem 0;
        }
        
        .btn-primary {
            background-color: #4f46e5;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            font-weight: 500;
            transition: background-color 0.2s;
            width: 100%;
        }
        
        .btn-primary:hover {
            background-color: #4338ca;
        }
        
        .btn-primary:disabled {
            background-color: #c7d2fe;
            cursor: not-allowed;
        }
        
        .payment-method {
            padding: 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            margin-top: 1rem;
        }
        
        .payment-option {
            display: flex;
            align-items: center;
            padding: 0.75rem;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        
        .payment-option:hover {
            background-color: #f8fafc;
        }
        
        .payment-option input {
            margin-right: 0.75rem;
        }
        
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
        <main class="flex-grow py-8">
            <div class="checkout-container px-4">
                <h1 class="text-2xl md:text-3xl font-semibold text-gray-800 mb-8">Checkout</h1>
                
                <div class="flex flex-col lg:flex-row gap-8">
                    <!-- Billing Information -->
                    <div class="lg:w-7/12">
                        <div class="bg-white rounded-lg shadow-sm p-6">
                            <h2 class="text-xl font-semibold mb-6">Billing Information</h2>
                            
                            <form id="checkoutForm">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                                        <input type="text" name="fname" value="{{ $customer->fname ?? '' }}" 
                                            class="form-input" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                                        <input type="text" name="lname" value="{{ $customer->lname ?? '' }}" 
                                            class="form-input" required>
                                    </div>
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                                        <input type="tel" name="phone" value="{{ $customer->phone ?? '' }}" 
                                            class="form-input" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                        <input type="email" name="email" value="{{ $customer->email ?? '' }}" 
                                            class="form-input" required>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Address Line 1</label>
                                    <input type="text" name="address1" value="{{ $customer->address_line1 ?? '' }}" 
                                        class="form-input" required>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Address Line 2</label>
                                    <input type="text" name="address2" value="{{ $customer->address_line2 ?? '' }}" 
                                        class="form-input">
                                </div>
                                
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">City</label>
                                        <input type="text" name="city" value="{{ $customer->city ?? '' }}" 
                                            class="form-input" required>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-1">Postal Code</label>
                                        <input type="text" name="postal_code" value="{{ $customer->postal_code ?? '' }}" 
                                            class="form-input" required>
                                    </div>
                                </div>
                                
                                <div class="mb-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Order Notes</label>
                                    <textarea name="message" rows="3" 
                                        class="form-input" 
                                        placeholder="Special instructions or notes about your order"></textarea>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Order Summary -->
                    <div class="lg:w-5/12">
                        <div class="order-summary p-6">
                            <h2 class="text-xl font-semibold mb-6">Order Summary</h2>
                            
                            <div class="mb-6">
                                @foreach($cartProducts as $cartProduct)
                                <div class="order-item">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <h3 class="font-medium">{{ $cartProduct['name'] }}</h3>
                                            <p class="text-sm text-gray-500">Qty: {{ $cartProduct['quantity'] }}</p>
                                        </div>
                                        <div class="font-medium">
                                                    @php
                                                        // Calculate the total for each product (price * quantity)
                                                        $totalPrice = $cartProduct['quantity'] * (float)filter_var($cartProduct['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                                                    @endphp
                                                    {{ $totalPrice }}LKR
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            
                            <div class="border-t border-gray-200 pt-4 mb-6">
                                <div class="flex justify-between mb-2">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span class="font-medium">{{$totalAmount}}</span>
                                </div>
                                <div class="flex justify-between mb-2">
                                    <span class="text-gray-600">Shipping</span>
                                    <span class="font-medium text-green-600">Free</span>
                                </div>
                                <div class="flex justify-between text-lg font-semibold mt-4">
                                    <span>Total</span>
                                    <span>{{$totalAmount}}</span>
                                </div>
                            </div>
                            
                                <div class="payment-method mb-2">
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
                            
                            <button id="placeOrderBtn" class="btn-primary mt-6">
                                <span id="buttonText">Place Order</span>
                                <span id="loadingIndicator" class="hidden">
                                    <span class="loading-spinner"></span>
                                    Processing...
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </main>

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