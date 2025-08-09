<!DOCTYPE html>
<html lang="zxx" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <title>NovaLink Computers | Best Computers for you</title>
    <meta name="description" content="NovaLink Computers offer the best computers available at the market">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/n_logo_remove_new.png" />
    <script src="assets/js/tailwind-cdn.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/font.awesome.css" />
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/venobox.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        * {
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
            line-height: 1.6;
        }

        .checkout-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .checkout-header {
            text-align: center;
            margin-bottom: 3rem;
            padding: 2rem 0;
        }

        .checkout-header h1 {
            font-size: 2.25rem;
            font-weight: 700;
            color: #0f172a;
            margin: 0;
            letter-spacing: -0.025em;
        }

        .checkout-grid {
            display: grid;
            grid-template-columns: 400px 1fr;
            gap: 3rem;
            align-items: start;
        }

        .billing-section, .order-section {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            border: 1px solid #e2e8f0;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #0f172a;
            margin: 0 0 1.5rem 0;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #f1f5f9;
        }

        .form-grid {
            display: grid;
            gap: 1.5rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .form-control {
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: #000000ff;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }

        .order-summary {
            position: sticky;
            top: 2rem;
        }

        .order-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
            border-bottom: 1px solid #f1f5f9;
        }

        .order-item:last-child {
            border-bottom: none;
        }

        .product-info {
            font-weight: 500;
            color: #374151;
        }

        .price {
            font-weight: 600;
            color: #0f172a;
        }

        .total-row {
            padding: 1.5rem 0 1rem 0;
            margin-top: 1rem;
            border-top: 2px solid #f1f5f9;
        }

        .total-price {
            font-size: 1.25rem;
            font-weight: 700;
            color: #0f172a;
        }

        .payment-section {
            margin: 1.5rem 0;
            padding: 1rem;
            background: #f8fafc;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }

        .payment-option {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .payment-option input[type="radio"] {
            width: 1rem;
            height: 1rem;
            accent-color: #000000ff;
        }

        .payment-option label {
            font-weight: 500;
            color: #374151;
            cursor: pointer;
            margin: 0;
        }

        .place-order-btn {
            width: 100%;
            background: linear-gradient(135deg, #000000ff 0%, #3c3b3bff 100%);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 0.025em;
            margin-top: 1rem;
        }

        .place-order-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
        }

        .place-order-btn:disabled {
            background: #9ca3af;
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .alert {
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 8px;
            font-weight: 500;
        }

        .alert-success {
            background-color: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .alert-danger {
            background-color: #fef2f2;
            color: #dc2626;
            border: 1px solid #fecaca;
        }

        .text-danger {
            color: #dc2626;
            font-size: 0.75rem;
            margin-top: 0.25rem;
        }

        .shipping-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #059669;
            font-size: 0.875rem;
            font-weight: 500;
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .checkout-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .order-summary {
                position: static;
            }
        }

        @media (max-width: 768px) {
            .checkout-container {
                margin: 1rem auto;
                padding: 0 0.5rem;
            }
            
            .checkout-header h1 {
                font-size: 1.875rem;
            }
            
            .billing-section, .order-section {
                padding: 1.5rem;
                border-radius: 8px;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .checkout-grid {
                gap: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .checkout-header {
                margin-bottom: 2rem;
                padding: 1rem 0;
            }
            
            .checkout-header h1 {
                font-size: 1.5rem;
            }
            
            .billing-section, .order-section {
                padding: 1rem;
            }
            
            .section-title {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        @include('layouts.nav-2')
        <div class="h-[13dvh]"></div>

        @if(session('customer_id'))  
            @php
                $customer = App\Models\Customer::find(session('customer_id'));
            @endphp
        @endif

        <div class="checkout-container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('customer.placeOrder') }}" method="POST" id="order-form">
                @csrf
                <div class="checkout-grid">
                    <!-- Order Summary Section (Now on the left) -->
                    <div class="order-section">
                        <div class="order-summary">
                            <h2 class="section-title">Order Summary</h2>
                            
                            <div class="order-item">
                                <span class="product-info">{{ $products['name'] }} × 1</span>
                                <span class="price">Rs. {{ number_format($highest_bid, 2) }}</span>
                            </div>
                            
                            <div class="order-item">
                                <span class="product-info">Shipping</span>
                                <span class="shipping-info">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 12L11 14L15 10M21 12C21 16.9706 16.9706 21 12 21C7.02944 21 3 16.9706 3 12C3 7.02944 7.02944 3 12 3C16.9706 3 21 7.02944 21 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    Free
                                </span>
                            </div>
                            
                            <div class="order-item total-row">
                                <span class="product-info">Total</span>
                                <span class="price total-price">Rs. {{ number_format($highest_bid, 2) }}</span>
                            </div>

                            <div class="payment-section">
                                <div class="payment-option">
                                    <input type="radio" name="payment" value="cod" checked id="cod">
                                    <label for="cod">Cash On Delivery</label>
                                </div>
                            </div>

                            <input type="hidden" name="product_id" value="{{ $products['id'] }}">
                            <input type="hidden" name="product_name" value="{{ $products['name'] }}">
                            <input type="hidden" name="highest_bid" value="{{ $highest_bid }}">

                            <button type="submit" class="place-order-btn" id="place-order-btn">
                                Place Order
                            </button>
                        </div>
                    </div>

                    <!-- Billing Details Section (Now on the right) -->
                    <div class="billing-section">
                        <h2 class="section-title">Billing Details</h2>
                        
                        <div class="form-grid">
                            <div class="form-row">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="fname" value="{{ $customer->fname ?? '' }}" required class="form-control" />
                                    @error('fname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="lname" value="{{ $customer->lname ?? '' }}" required class="form-control" />
                                    @error('lname')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="{{ $customer->phone ?? '' }}" required class="form-control" />
                                    @error('phone')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" name="email" value="{{ $customer->email ?? '' }}" required class="form-control" />
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Address Line 1</label>
                                <input type="text" name="address1" value="{{ $customer->address_line1 ?? '' }}" required class="form-control" />
                                @error('address1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Address Line 2 (Optional)</label>
                                <input type="text" name="address2" value="{{ $customer->address_line2 ?? '' }}" class="form-control" />
                                @error('address2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" name="city" value="{{ $customer->city ?? '' }}" required class="form-control" />
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input type="text" name="postal_code" value="{{ $customer->postal_code ?? '' }}" required class="form-control" />
                                    @error('postal_code')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Order Notes (Optional)</label>
                                <textarea name="message" placeholder="Special notes for delivery..." class="form-control"></textarea>
                                @error('message')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        @include('layouts.footer2')
    </div>

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
        $(document).ready(function() {
            $('#order-form').on('submit', function() {
                const button = $('#place-order-btn');
                button.text('Processing...');
                button.prop('disabled', true);
            });
        });
    </script>
</body>
</html>