<!DOCTYPE html>
<html lang="zxx" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Udarata Computers | Best Computers for you</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="Udarata Computers - Best Computers for you">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.ico" />
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
        .btn-hover {
            background-color: #1e3a8a; /* Dark blue */
            color: #fff;
            padding: 10px 20px;
            border-radius: 4px;
            text-transform: uppercase;
            border: none;
            cursor: pointer;
        }
        .btn-hover:hover {
            background-color: #1e40af;
        }
        .btn-hover:disabled {
            background-color: #6b7280;
            cursor: not-allowed;
        }
        .alert-success, .alert-danger {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }
        .text-danger {
            color: #dc3545;
            font-size: 0.875rem;
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
        <div class="checkout-area py-[30px]">
            <div class="container">
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
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="billing-info-wrap">
                                <h3>Billing Details</h3>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-4">
                                            <label>First Name</label>
                                            <input type="text" name="fname" value="{{ $customer->fname ?? '' }}" required />
                                            @error('fname')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-4">
                                            <label>Last Name</label>
                                            <input type="text" name="lname" value="{{ $customer->lname ?? '' }}" required />
                                            @error('lname')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-4">
                                            <label>Phone</label>
                                            <input type="text" name="phone" value="{{ $customer->phone ?? '' }}" required />
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-4">
                                            <label>Email Address</label>
                                            <input type="text" name="email" value="{{ $customer->email ?? '' }}" required />
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-4">
                                            <label>Address Line 1</label>
                                            <input type="text" name="address1" value="{{ $customer->address_line1 ?? '' }}" required />
                                            @error('address1')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-4">
                                            <label>Address Line 2</label>
                                            <input type="text" name="address2" value="{{ $customer->address_line2 ?? '' }}" />
                                            @error('address2')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-4">
                                            <label>City</label>
                                            <input type="text" name="city" value="{{ $customer->city ?? '' }}" required />
                                            @error('city')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-4">
                                            <label>Postal Code</label>
                                            <input type="text" name="postal_code" value="{{ $customer->postal_code ?? '' }}" required />
                                            @error('postal_code')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="additional-info-wrap">
                                    <h4>Additional information</h4>
                                    <div class="additional-info">
                                        <label>Order notes</label>
                                        <textarea placeholder="Notes about your order, e.g. special notes for delivery." name="message"></textarea>
                                        @error('message')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 mt-md-30px mt-lm-30px">
                            <div class="your-order-area">
                                <h3>Your order</h3>
                                <div class="your-order-wrap gray-bg-4">
                                    <div class="your-order-product-info">
                                        <div class="your-order-top">
                                            <ul>
                                                <li>Product</li>
                                                <li>Total</li>
                                            </ul>
                                        </div>
                                        <div class="your-order-middle">
                                            <ul>
                                                <li>
                                                    <span class="order-middle-left">{{ $products['name'] }} X 1</span>
                                                    <span class="order-price">Rs. {{ number_format($highest_bid, 2) }}</span>
                                                </li>
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
                                                <li>Rs. {{ number_format($highest_bid, 2) }}/=</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="payment-method">
                                        <div class="payment-accordion element-mrg">
                                            <div id="faq" class="panel-group">
                                                <label class="d-flex gap-2 items-center space-x-2">
                                                    <input type="radio" name="payment" value="cod" checked class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500" style="width: 15px; height: 15px;">
                                                    <span>Cash On Delivery</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="product_id" value="{{ $products['id'] }}">
                                <input type="hidden" name="product_name" value="{{ $products['name'] }}">
                                <input type="hidden" name="highest_bid" value="{{ $highest_bid }}">
                                <div class="Place-order mt-25">
                                    <button type="submit" class="btn-hover" id="place-order-btn">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
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