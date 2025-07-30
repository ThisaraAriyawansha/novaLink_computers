<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Advanced Payment | Udarata Computers</title>

    <meta name="keywords" content="Marketplace ecommerce responsive HTML5 Template" />
    <meta name="description" content="Wolmart is powerful marketplace &amp; ecommerce responsive Html5 Template.">
    <meta name="author" content="D-THEMES">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/B-logo.png">

    <!-- WebFont.js -->
    <script>
        WebFontConfig = {
            google: {
                families: ['Poppins:400,500,600,700']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <link rel="preload" href="assets/vendor/fontawesome-free/webfonts/fa-regular-400.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="assets/vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="assets/vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="assets/fonts/wolmart.woff?png09e" as="font" type="font/woff" crossorigin="anonymous">
    <link href="https://db.onlinewebfonts.com/c/2f82d6d318e624089b99e7754feb1465?family=BebasNeuePro-Regular" rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.min.css">

    <!-- Plugin CSS -->
    <link rel="stylesheet" type="text/css" href="assets/vendor/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" href="assets/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/photoswipe/photoswipe.min.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/photoswipe/default-skin/default-skin.min.css">
    <!-- Swiper's CSS -->
    <link rel="stylesheet" href="assets/vendor/swiper/swiper-bundle.min.css">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.min.css">
    <link rel="stylesheet" type="text/css" href="assets/mypayment.css">


</head>

<body>
    <style>
        @import url(https://db.onlinewebfonts.com/c/2f82d6d318e624089b99e7754feb1465?family=BebasNeuePro-Regular);

        @font-face {
            font-family: 'BebasNeueProSmERgRegular';
            src: url('fonts/FSP\ DEMO\ -\ Bbs\ N\ Pr\ Sm\ b.ttf') format('truetype');
        }

        .custom-font3 {
            font-family: 'BebasNeueProSmERgRegular';

        }

        @font-face {
            font-family: "BebasNeuePro-Regular";
            src: url("https://db.onlinewebfonts.com/t/2f82d6d318e624089b99e7754feb1465.eot");
            src: url("https://db.onlinewebfonts.com/t/2f82d6d318e624089b99e7754feb1465.eot?#iefix")format("embedded-opentype"),
                url("https://db.onlinewebfonts.com/t/2f82d6d318e624089b99e7754feb1465.woff2")format("woff2"),
                url("https://db.onlinewebfonts.com/t/2f82d6d318e624089b99e7754feb1465.woff")format("woff"),
                url("https://db.onlinewebfonts.com/t/2f82d6d318e624089b99e7754feb1465.ttf")format("truetype"),
                url("https://db.onlinewebfonts.com/t/2f82d6d318e624089b99e7754feb1465.svg#BebasNeuePro-Regular")format("svg");
        }

        .payment-logo {
    max-width: 100px; /* Adjust size as needed */
    height: auto;
    margin-left: 8px; /* Space between image and text */
    vertical-align: middle; /* Align image with text */
}

    </style>

@include('parts.header')
<div class="page-wrapper" style="margin-top: 50px; margin-bottom: 50px;">

    <div class="bodyclass">
        <div class="payment-container">
            <!-- Add this to your payment view -->
            @if (session('success_message'))
                <div>{{ session('success_message') }}</div>
            @endif

            @if (session('error_message'))
                <div>{{ session('error_message') }}</div>
            @endif

            <!-- Payment Details Section -->
            <div class="payment-details">
                <h1>Payment Page</h1>

                <div class="payment-info">
                    <p><strong>Customer ID:</strong> {{ $customerId }}</p>

                    <!-- Package details -->
                    <p><strong>Package Name:</strong> {{ $packageItem->package->package_name ?? 'N/A' }}</p>
                    <!-- <p><strong>Sub Category ID:</strong> {{ $packageItem->sub_category_id ?? 'N/A' }}</p> -->
                    <p><strong>Price:</strong> ${{ $packageItem->price ?? 'N/A' }}</p>
                </div>

<!-- Payment Method Form -->
<form action="{{ route('processPayment') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="paymentType">Payment Type:</label>
        <select name="paymentType" id="paymentType" class="form-control" required>
            <option value="1">Full Payment</option>
            <option value="2">Advanced 20% Payment</option>
        </select>
    </div>

    <input type="hidden" name="customerId" value="{{ $customerId }}">
    <input type="hidden" name="subCategoryId" value="{{ $packageItem->sub_category_id }}">
    <input type="hidden" name="packageItemId" value="{{ $packageItem->id }}">
    <input type="hidden" name="packagePrice" value="{{ $packageItem->price }}">

    <!-- OnePay Payment Method Section -->
    <div class="form-group" style="display: none;">
    <label for="onepay_account">OnePay Account:</label>
    <input type="hidden" name="onepay_account" id="onepay_account" class="form-control" value="default_account_value" placeholder="Enter OnePay Account">
</div>

<!-- Additional Fields -->
<div class="form-group" style="display: none;">
    <label for="billingAddress">Billing Address:</label>
    <textarea name="billingAddress" id="billingAddress" class="form-control" placeholder="Enter your billing address">Default Billing Address</textarea>
</div>


    <div class="form-group">
        <label for="transactionNotes">Transaction Notes:</label>
        <textarea name="transactionNotes" id="transactionNotes" class="form-control" placeholder="Enter any notes for this transaction"></textarea>
    </div>

    <button type="submit" class="btn">Proceed to Payment</button>
</form>

            </div>

            <!-- Payment Method Selection Sidebar -->
            <div class="payment-method">
                <h3>Payment Method</h3>
                <div class="radio-group">
                    <label>
                        <input type="radio" name="method" value="onepay" checked>
                        <img src="{{ asset('images/Payment/Onepay-PG-Logo.png') }}" alt="OnePay" class="payment-logo"> OnePay
                    </label>
                </div>
            </div>

        </div>
    </div>
</div>



@include('parts.footer')



<!-- Plugin JS File -->
<script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/sticky/sticky.js"></script>
    <script src="assets/vendor/jquery.plugin/jquery.plugin.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/zoom/jquery.zoom.js"></script>
    <script src="assets/vendor/photoswipe/photoswipe.js"></script>
    <script src="assets/vendor/photoswipe/photoswipe-ui-default.js"></script>

    <!-- Swiper JS -->
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Main JS File -->
    <script src="assets/js/main.min.js"></script>
</body>
</html>