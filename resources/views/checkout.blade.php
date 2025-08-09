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
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/n_logo_remove_new.png" />
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
                <li style="display: flex; align-items: center; margin: 0 6px;">
                    <svg style="width: 16px; height: 16px; color: #9ca3af; fill: none; stroke: currentColor; stroke-width: 2;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <a href="/cart" style="margin-left: 8px; font-size: 14px; font-weight: 500; color: #4b5563; text-decoration: none; transition: color 0.3s ease, transform 0.2s ease; padding: 6px 10px; border-radius: 6px; font-family: 'Orbitron', sans-serif;">Shopping Cart</a>
                </li>
                <li style="display: flex; align-items: center; margin: 0 6px;" aria-current="page">
                    <svg style="width: 16px; height: 16px; color: #9ca3af; fill: none; stroke: currentColor; stroke-width: 2;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span style="margin-left: 8px; font-size: 14px; font-weight: 600; color: #374151; padding: 6px 10px; border-radius: 6px; font-family: 'Orbitron', sans-serif;">CheckOut</span>
                </li>
            </ol>
        </nav>
        
        @if(session('customer_id'))  <!-- Check if the customer is logged in via session -->
            @php
                // Retrieve customer details from the session (assuming the customer data is stored in the session)
                $customer = App\Models\Customer::find(session('customer_id'));
            @endphp
        @endif
        <!-- breadcrumb-area end -->
        <!-- checkout area start -->
        <main class="flex-grow py-6 bg-white">
            <div class="checkout-container px-3 max-w-7xl mx-auto">
                <div class="flex items-center justify-between mb-6 border-b border-gray-100 pb-4">
                    <h1 class="text-gray-900 tracking-tight"
                        style="font-family: 'Orbitron', sans-serif; font-size: 22px;">
                        CHECKOUT
                    </h1>
                    <div class="text-xs text-gray-500 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        SECURE CHECKOUT
                    </div>
                </div>
                
                <div class="flex flex-col lg:flex-row gap-5">
                    <!-- Order Summary - Left Side -->
                    <div class="lg:w-5/12">
                        <div class="border border-gray-150 rounded-sm p-4 bg-gray-50">
                            
                    <div class="mb-5 space-y-4">
                        @foreach($cartProducts as $cartProduct)
                        <div class="flex justify-between items-center">
                            <!-- Left side: Icon + Name + Qty -->
                            <div class="flex items-start space-x-3">
                                <!-- Icon -->
                            <div class="bg-white border border-gray-200 p-1 rounded-sm flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 11V5a4 4 0 00-8 0v6m-4 0h16l-1.5 9h-13L4 11z" />
                                </svg>
                            </div>


                                <!-- Name & Qty -->
                                <div class="leading-snug">
                                    <h3 class="text-gray-800 truncate max-w-[150px] sm:max-w-[300px]" 
                                        style="font-size: 14px; font-weight: 500; ">
                                        {{ $cartProduct['name'] }}
                                    </h3>

                                    <p class="text-[11px] text-gray-500 mt-0.5">Qty: {{ $cartProduct['quantity'] }}</p>
                                </div>
                            </div>

                            <!-- Right side: Price -->
                            <div class="text-sm font-semibold text-gray-900 whitespace-nowrap">
                                @php
                                    $totalPrice = $cartProduct['quantity'] * (float)filter_var($cartProduct['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                                @endphp
                                {{ number_format($totalPrice, 2) }} LKR
                            </div>
                        </div>
                        @endforeach
                    </div>

                            
                            <div class="border-t border-gray-200 pt-4 space-y-2">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span class="font-medium">{{$totalAmount}}</span>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-600">Shipping</span>
                                    <span class="font-medium">Free</span>
                                </div>
                                <div class="flex justify-between text-base font-medium pt-3 border-t border-gray-200">
                                    <span>Total</span>
                                    <span style="font-size: 20px; font-weight: 800; ">{{$totalAmount}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4 border border-gray-150 rounded-sm p-4 bg-gray-50">
                            <h3 class="text-sm font-medium text-gray-900 uppercase tracking-wider mb-3" style="font-size: 18px; font-weight: 500; font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;">Payment Method</h3>
                            <div class="space-y-2">
                                <!-- Disabled Card Payment Option -->
                                <label class="flex items-center space-x-3 p-2 border border-gray-200 bg-white rounded-sm opacity-60 cursor-not-allowed">
                                    <input type="radio" name="payment" value="card" disabled
                                        style="width: 12px; height: 12px;"
                                        class="text-gray-800 border-gray-300">
                                    <div>
                                        <span class="block text-sm line-through text-gray-700">Credit/Debit Card (Coming Soon)</span>
                                        <span class="block text-xs text-red-500 mt-0.5">Currently not available</span>
                                    </div>
                                </label>

                                <!-- Active COD Option -->
                                <label class="flex items-center space-x-3 p-2 border border-gray-200 bg-white rounded-sm cursor-pointer">
                                    <input type="radio" name="payment" value="cod" checked
                                        style="width: 12px; height: 12px;"
                                        class="text-gray-800 border-gray-300 focus:ring-gray-400">
                                    <div>
                                        <span class="block text-sm">Cash On Delivery</span>
                                        <span class="block text-xs text-gray-500 mt-0.5">Pay when you receive</span>
                                    </div>
                                </label>
                            </div>
                        </div>


                    </div>
                    
                    <!-- Billing Information - Right Side -->
                    <div class="lg:w-7/12">
                        <div class="border border-gray-150 rounded-sm">
                            <div class="border-b border-gray-150 px-4 py-3 bg-gray-50">
                                <h2 class="text-sm font-medium text-gray-900 uppercase tracking-wider" style="font-size: 20px; font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; ">Billing Details</h2>
                            </div>
                            
                            <div class="p-4">
                                <form id="checkoutForm" class="space-y-4">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-xs font-medium text-gray-700 mb-1 uppercase tracking-wider">First Name</label>
                                            <input type="text" name="fname" value="{{ $customer->fname ?? '' }}" 
                                                class="w-full px-3 py-2 text-xs border border-gray-200 rounded-sm focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 bg-white" required>
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-gray-700 mb-1 uppercase tracking-wider">Last Name</label>
                                            <input type="text" name="lname" value="{{ $customer->lname ?? '' }}" 
                                                class="w-full px-3 py-2 text-xs border border-gray-200 rounded-sm focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 bg-white" required>
                                        </div>
                                    </div>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-xs font-medium text-gray-700 mb-1 uppercase tracking-wider">Phone</label>
                                            <input type="tel" name="phone" value="{{ $customer->phone ?? '' }}" 
                                                class="w-full px-3 py-2 text-xs border border-gray-200 rounded-sm focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 bg-white" required>
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-gray-700 mb-1 uppercase tracking-wider">Email</label>
                                            <input type="email" name="email" value="{{ $customer->email ?? '' }}" 
                                                class="w-full px-3 py-2 text-xs border border-gray-200 rounded-sm focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 bg-white" required>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <label class="block text-xs font-medium text-gray-700 mb-1 uppercase tracking-wider">Address Line 1</label>
                                        <input type="text" name="address1" value="{{ $customer->address_line1 ?? '' }}" 
                                            class="w-full px-3 py-2 text-xs border border-gray-200 rounded-sm focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 bg-white" required>
                                    </div>
                                    
                                    <div>
                                        <label class="block text-xs font-medium text-gray-700 mb-1 uppercase tracking-wider">Address Line 2</label>
                                        <input type="text" name="address2" value="{{ $customer->address_line2 ?? '' }}" 
                                            class="w-full px-3 py-2 text-xs border border-gray-200 rounded-sm focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 bg-white">
                                    </div>
                                    
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-xs font-medium text-gray-700 mb-1 uppercase tracking-wider">City</label>
                                            <input type="text" name="city" value="{{ $customer->city ?? '' }}" 
                                                class="w-full px-3 py-2 text-xs border border-gray-200 rounded-sm focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 bg-white" required>
                                        </div>
                                        <div>
                                            <label class="block text-xs font-medium text-gray-700 mb-1 uppercase tracking-wider">Postal Code</label>
                                            <input type="text" name="postal_code" value="{{ $customer->postal_code ?? '' }}" 
                                                class="w-full px-3 py-2 text-xs border border-gray-200 rounded-sm focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 bg-white" required>
                                        </div>
                                    </div>
                                    
                                    <div class="pt-2">
                                        <label class="block text-xs font-medium text-gray-700 mb-1 uppercase tracking-wider">Order Notes</label>
                                        <textarea name="message" rows="2" 
                                            class="w-full px-3 py-2 text-xs border border-gray-200 rounded-sm focus:outline-none focus:ring-1 focus:ring-gray-400 focus:border-gray-400 bg-white" 
                                            placeholder="Special instructions"></textarea>
                                    </div>

                                    <div class="Place-order mt-2">
                                        <a class="w-full bg-black hover:bg-gray-800 text-white text-xs font-medium py-3 px-4 rounded-sm uppercase tracking-wider mt-6 flex items-center justify-center focus:outline-none focus:ring-1 focus:ring-gray-700" href="#" id="placeOrderBtn" >Place Order</a>
                                        <div id="loadingIndicator" style="display: none; font-size: 16px; color: #000000ff; margin-top: 10px;">Processing...</div>
                                    </div>
                                    <div class="text-center text-xs text-gray-500 mt-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                        </svg>
                                        Secure checkout. Your information is protected.
                                    </div>
                                </form>
                            </div>
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