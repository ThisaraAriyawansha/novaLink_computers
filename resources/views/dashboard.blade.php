<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <!-- Favicon -->
    <title>NovaLink Computers | Dashboard</title>
    <meta name="description" content="NovaLink Computers offer the best computers available at the market">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/N_back.jpg" />
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
        /**
        * My Account
        */
        .myaccount-tab-trigger {
            display: block;
        }

        .myaccount-tab-trigger li {
            display: block;
        }

        .myaccount-tab-trigger li+li {
            margin-top: -1px;
        }

        .myaccount-tab-trigger li a {
            border: 1px solid #444444;
            display: block;
            background: #555555;
            color: #ffffff;
            text-transform: uppercase;
            font-weight: 600;
            font-family: "Roboto", sans-serif;
            padding: 10px 20px;
        }

        .myaccount-tab-trigger li a.active {
            background: #0B88EE;
            border-color: #0B88EE;
            color: #ffffff;
        }

        .myaccount-tab-trigger li a:hover:not(.active) {
            color: #0B88EE;
        }

        .myaccount-tab-content {
            border: 1px solid #e5e5e5;
            padding: 30px;
            -webkit-transition: all 0.4s ease-in-out 0s;
            transition: all 0.4s ease-in-out 0s;
        }

        .myaccount-dashboard p {
            margin-bottom: 20px;
        }

        .myaccount-dashboard p:last-child {
            margin-bottom: 0;
        }

        .myaccount-dashboard p a {
            color: #7e7e7e;
        }

        .myaccount-dashboard p a:hover {
            color: #0B88EE;
        }

        .myaccount-orders .table {
            margin-bottom: 0;
        }

        .myaccount-orders .table .account-order-id {
            color: #7e7e7e;
        }

        .myaccount-orders .table .account-order-id:hover {
            color: #0B88EE;
        }

        .myaccount-orders .table-hover tbody tr:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .myaccount-orders .table td,
        .myaccount-orders .table th {
            vertical-align: middle;
            text-align: center;
        }

        .myaccount-address .small-title {
            margin-bottom: 15px;
        }

        /**
        * Form Styles
        */
        .ho-form.ho-form-boxed {
            padding: 30px;
            border-radius: 0;
            border: 1px solid #d5d5d5;
        }

        .ho-form-inner {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            margin-top: -20px;
        }

        .ho-form-inner .single-input {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 100%;
            flex: 0 0 100%;
            max-width: 100%;
            margin-top: 20px;
        }

        .ho-form-inner .single-input.single-input-half {
            -webkit-box-flex: 0;
            -ms-flex: 0 0 calc(50% - 15px);
            flex: 0 0 calc(50% - 15px);
            max-width: calc(50% - 15px);
        }

        .ho-form-inner .single-input label {
            font-family: "Roboto", sans-serif;
            font-weight: 400;
            margin-bottom: 8px;
            display: block;
            color: #454545;
        }

        .ho-form-inner .single-input input,
        .ho-form-inner .single-input select,
        .ho-form-inner .single-input textarea,
        .ho-form-inner .single-input .nice-select {
            border-radius: 3px;
            border: 1px solid #e5e5e5;
        }

        .ho-form-inner .single-input input+input {
            margin-top: 20px;
        }

        .ho-form-inner .single-input .checkbox-input {
            display: inline-block;
        }

        .ho-form-inner .single-input .checkbox-input label {
            display: inline-block;
        }

        .ho-form-inner a {
            color: #7e7e7e;
            font-size: 13px;
        }

        .ho-form-inner a:hover {
            color: #0B88EE;
        }

        @media only screen and (max-width: 767px) {
            .ho-form .single-input.single-input-half {
                -webkit-box-flex: 0;
                -ms-flex: 0 0 100%;
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

        /**
            Bidding section
        */
        .bid-product-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .bid-product-info img {
            border-radius: 4px;
        }

        /* Modal Styling */
        .modal-content {
            border-radius: 8px;
        }

        .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #e5e5e5;
        }

        .modal-title {
            font-family: "Roboto", sans-serif;
            font-weight: 600;
        }

        .modal-body h6 {
            font-family: "Roboto", sans-serif;
            font-weight: 500;
            margin-bottom: 10px;
        }

        .modal-body p {
            margin-bottom: 15px;
        }

        .modal-footer {
            border-top: 1px solid #e5e5e5;
        }




        /* Modern Minimalist Modal Styling */
    .modal-content {
        border: none;
        border-radius: 12px;
        box-shadow: 0 5px 30px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .modal-header {
        border-bottom: 1px solid #f0f0f0;
        padding: 20px 24px;
        background: #fff;
    }

    .modal-title {
        font-weight: 600;
        font-size: 1.25rem;
        color: #333;
        margin: 0;
    }

    .btn-close {
        background-size: 14px;
        opacity: 0.5;
        transition: all 0.2s ease;
    }

    .btn-close:hover {
        opacity: 1;
        transform: rotate(90deg);
    }

    .modal-body {
        padding: 24px;
        color: #444;
    }

    .order-section {
        margin-bottom: 24px;
    }

    .section-title {
        font-size: 0.9rem;
        font-weight: 600;
        color: #666;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
    }

    .section-title::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #eee;
        margin-left: 16px;
    }

    .order-table {
        width: 100%;
        border-collapse: collapse;
    }

    .order-table thead th {
        font-weight: 500;
        font-size: 0.8rem;
        color: #777;
        text-align: left;
        padding: 12px 16px;
        border-bottom: 1px solid #f0f0f0;
    }

    .order-table tbody td {
        padding: 16px;
        border-bottom: 1px solid #f8f8f8;
        font-size: 0.9rem;
    }

    .product-info {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .product-img {
        width: 48px;
        height: 48px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #f0f0f0;
    }

    .product-name {
        font-weight: 500;
        color: #333;
    }

    .address-card, .note-card {
        background: #fafafa;
        border-radius: 8px;
        padding: 16px;
    }

    .address-line {
        margin: 0 0 4px 0;
        font-size: 0.9rem;
        color: #555;
    }

    .address-line:last-child {
        margin-bottom: 0;
    }

    .note-content {
        margin: 0;
        font-size: 0.9rem;
        color: #555;
        line-height: 1.5;
    }

    .modal-footer {
        border-top: 1px solid #f0f0f0;
        padding: 16px 24px;
        background: #fff;
    }

    .btn-close-modal {
        background: #fff;
        color: #333;
        border: 1px solid #e0e0e0;
        padding: 8px 20px;
        border-radius: 6px;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.2s ease;
    }

    .btn-close-modal:hover {
        background: #f8f8f8;
        border-color: #d0d0d0;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .modal-header {
            padding: 16px 20px;
        }
        
        .modal-body {
            padding: 20px;
        }
        
        .order-table tbody td {
            padding: 12px;
        }
        
        .product-img {
            width: 40px;
            height: 40px;
        }
    }

    @media (max-width: 576px) {
        .modal-content {
            margin: 16px;
        }
        
        .modal-header {
            padding: 14px 16px;
        }
        
        .modal-body {
            padding: 16px;
        }
        
        .order-table thead {
            display: none;
        }
        
        .order-table tbody tr {
            display: block;
            margin-bottom: 16px;
            border: 1px solid #f0f0f0;
            border-radius: 8px;
            padding: 12px;
        }
        
        .order-table tbody td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border: none;
        }
        
        .order-table tbody td::before {
            content: attr(data-label);
            font-weight: 500;
            color: #777;
            font-size: 0.8rem;
            margin-right: 12px;
        }
        
        .product-info {
            width: 100%;
            justify-content: space-between;
        }
        
        .address-card, .note-card {
            padding: 12px;
        }
    }
   
    </style>
</head>

<body>
    <div class="main-wrapper flex flex-col min-h-dvh">

        @include('layouts.nav-2')
        <div class="h-[13dvh]"></div>

        <!-- Account Page Area -->
        <div class="account-page-area py-10">
            <div class="container">
                @if(session('success'))
                    <div class="alert alert-success p-4 bg-green-100 text-green-700 rounded-lg mx-8 mt-4" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="account-dashboard-tab" data-bs-toggle="tab"
                                    href="#account-dashboard" role="tab" aria-controls="account-dashboard"
                                    aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-bidding-tab" data-bs-toggle="tab" href="#account-bidding"
                                    role="tab" aria-controls="account-bidding" aria-selected="false">My Bids</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-orders-tab" data-bs-toggle="tab" href="#account-orders"
                                    role="tab" aria-controls="account-orders" aria-selected="false">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-details-tab" data-bs-toggle="tab"
                                    href="#account-details" role="tab" aria-controls="account-details"
                                    aria-selected="false">Account Details</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link" id="account-logout-tab"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    role="tab" aria-selected="false">
                                    Logout
                                </a>
                            </li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </div>

                    <div class="col-lg-9">
                        <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                            <!-- Dashboard Tab -->
                            <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel"
                                aria-labelledby="account-dashboard-tab">
                                @if(session('customer_id'))
                                    @php
                                        $customer = App\Models\Customer::find(session('customer_id'));
                                    @endphp
                                @endif
                                <div class="myaccount-dashboard">
                                    <p>
                                        Hello <b>{{ $customer->fname ?? '' }}</b>
                                    </p>
                                    <p>
                                        From your account dashboard you can view your recent
                                        orders, manage your shipping and billing addresses and
                                        <a href="#">edit your password and account details</a>.
                                    </p>
                                </div>
                            </div>

                            <!-- Bidding Tab -->
                            <div class="tab-pane fade" id="account-bidding" role="tabpanel"
                                aria-labelledby="account-bidding-tab">
                                <div class="myaccount-bidding">
                                    <h4 class="small-title">MY BIDS</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>PRODUCT</th>
                                                    <th>YOUR BID</th>
                                                    <th>HIGHEST BID</th>
                                                    <th>STATUS</th>
                                                    <th>EXPIRES</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($bids as $bid)
                                                    @php
                                                        $highestBid = \App\Models\Bid::where('product_id', $bid->product_id)->max('bid_amount');
                                                        $status = $bid->bid_amount == $highestBid ? 'Highest Bid' : 'Outbid';
                                                        $badgeClass = $status == 'Highest Bid' ? 'bg-success' : 'bg-warning';
                                                        $dealExpired = \Carbon\Carbon::parse($bid->product->deal_end)->isPast();
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            <div class="bid-product-info">
                                                                <img src="{{ asset($bid->product->image) }}"
                                                                    alt="Product" width="50">
                                                                <span>{{ $bid->product->name }}</span>
                                                            </div>
                                                        </td>
                                                        <td>Rs.{{ number_format($bid->bid_amount, 2) }}</td>
                                                        <td>Rs.{{ number_format($highestBid, 2) }}</td>
                                                        <td><span class="badge {{ $badgeClass }}">{{ $status }}</span>
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($bid->product->deal_end)->format('F d, Y') }}
                                                        </td>
                                                        <td>
                                                            @if ($dealExpired && $status == 'Highest Bid')
                                                                <a href="{{ url('bidPay?product_id=' . $bid->product->id . '&product_name=' . urlencode($bid->product->name) . '&highest_bid=' . $highestBid) }}"
                                                                    class="ho-button ho-button-sm">
                                                                    <span>Pay Now</span>
                                                                </a>
                                                            @elseif (!$dealExpired)
                                                                <a href="{{ url('biddings?product-id=' . $bid->product->id) }}"
                                                                    class="ho-button ho-button-sm">
                                                                    <span>Update Bid</span>
                                                                </a>
                                                            @else
                                                                <span class="badge bg-secondary">Bidding Closed</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Orders Tab -->
                            <div class="tab-pane fade" id="account-orders" role="tabpanel"
                                aria-labelledby="account-orders-tab">
                                <div class="myaccount-orders">
                                    <h4 class="small-title">MY ORDERS</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>ORDER</th>
                                                    <th>DATE</th>
                                                    <th>STATUS</th>
                                                    <th>TOTAL</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($payments as $payment)
                                                    @php
                                                        $totalItems = $payment->orders->sum('qty');
                                                        $totalAmount = $payment->total;
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            <a class="account-order-id"
                                                                href="#">#{{ $payment->id }}</a>
                                                        </td>
                                                        <td>{{ \Carbon\Carbon::parse($payment->created_at)->format('F d, Y') }}
                                                        </td>
                                                        <td>{{ $payment->paymentStatus->status_name ?? 'On Hold' }}</td>
                                                        <td>Rs.{{ number_format($totalAmount, 2) }} for
                                                            {{ $totalItems }} item(s)</td>
                                                        <td>
                                                            <button class="ho-button ho-button-sm"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#bitOrderModal{{ $payment->id }}">
                                                                <span>View</span>
                                                            </button>
                                                        </td>
                                                    </tr>

                                                    <!-- Order Details Modal -->
                                                    
                                                    
                                                @empty
                                                    <tr>
                                                        <td colspan="5">No orders found.</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <!-- Account Details Tab -->
                            <div class="tab-pane fade" id="account-details" role="tabpanel"
                                aria-labelledby="account-details-tab">
                                <div class="myaccount-details">
                                    <form action="{{ route('update-account') }}" method="POST" class="ho-form">
                                        @csrf
                                        <div class="ho-form-inner">
                                            <div class="single-input single-input-half">
                                                <label for="account-details-firstname">First Name*</label>
                                                <input type="text" id="account-details-firstname" name="fname"
                                                    value="{{ $customer->fname ?? '' }}" required />
                                                @error('fname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="single-input single-input-half">
                                                <label for="account-details-lastname">Last Name*</label>
                                                <input type="text" id="account-details-lastname" name="lname"
                                                    value="{{ $customer->lname ?? '' }}" required />
                                                @error('lname')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-email">Email*</label>
                                                <input type="email" id="account-details-email" name="email"
                                                    value="{{ $customer->email ?? '' }}" required />
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-oldpass">Current Password (leave blank to
                                                    leave
                                                    unchanged)</label>
                                                <input type="password" id="account-details-oldpass"
                                                    name="current_password" />
                                                @error('current_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-newpass">New Password (leave blank to leave
                                                    unchanged)</label>
                                                <input type="password" id="account-details-newpass"
                                                    name="new_password" />
                                                @error('new_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-confpass">Confirm New Password</label>
                                                <input type="password" id="account-details-confpass"
                                                    name="new_password_confirmation" />
                                            </div>
                                            <div class="single-input">
                                                <button class="w-fit border py-2 px-4 rounded-md"
                                                    style="background-color: #28337e; color: #ffffff;" type="submit">
                                                    <span>SAVE CHANGES</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--// Account Page Area -->
        <!--flex grow div-->
        <div class="flex-grow"></div>
        <!-- footer -->
        @include('layouts.footer2')

    </div>


    <!-- Order Details Modal -->

    @forelse ($payments as $payment)
    <div class="modal fade" id="bitOrderModal{{ $payment->id }}" tabindex="-1"
    aria-labelledby="bitOrderModalLabel{{ $payment->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bitOrderModalLabel{{ $payment->id }}">Order #{{ $payment->id }}</h5>
            </div>
            <div class="modal-body">
                <div class="order-section">
                    <h6 class="section-title">Order Details</h6>
                    <div class="table-responsive">
                        <table class="order-table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Qty</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payment->orders as $order)
                                    <tr>
                                        <td>
                                            <div class="product-info">
                                                <img src="{{ asset($order->product->image) }}" alt="{{ $order->product->name }}" class="product-img">
                                                <span class="product-name">{{ $order->product->name }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $order->qty }}</td>
                                        <td>Rs.{{ number_format($order->product->discounted_price, 2) }}</td>
                                        <td>Rs.{{ number_format($order->product->discounted_price * $order->qty, 2) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="order-section">
                    <h6 class="section-title">Shipping Address</h6>
                    <div class="address-card">
                        <p class="address-line">{{ $payment->address1 }}</p>
                        @if($payment->address2)
                            <p class="address-line">{{ $payment->address2 }}</p>
                        @endif
                        <p class="address-line">{{ $payment->city }}, {{ $payment->postal_code }}</p>
                    </div>
                </div>

                <div class="order-section">
                    <h6 class="section-title">Order Note</h6>
                    <div class="note-card">
                        <p class="note-content">{{ $payment->note ?? 'No notes provided' }}</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-close-modal" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@empty
@endforelse


    <!-- modals -->
    @include('layouts.modals')

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
</body>

</html>