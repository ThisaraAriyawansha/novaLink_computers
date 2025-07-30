@include('layouts.header')

<!-- main-content -->
<div class="main-content">
    <!-- main-content-wrap -->
    <div class="main-content-inner">
        <h3>Admin Dashboard</h3><br><br>

        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="tf-section-4 mb-30">

                <!-- Product Count -->
                <div class="wg-chart-default">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap14">
                            <div class="image type-white">
                                <i class="fas fa-shopping-cart text-success" style="font-size: 2rem;"></i>
                            </div>
                            <div>
                                <div class="body-text mb-2">Total Products</div>
                                <h4>{{ $productCount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Count -->

                <!-- Product Feature Count -->
                <div class="wg-chart-default">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap14">
                            <div class="image type-white">
                                <i class="fas fa-cogs text-primary" style="font-size: 2rem;"></i>
                            </div>
                            <div>
                                <div class="body-text mb-2">Total Features</div>
                                <h4>{{ $productFeatureCount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Feature Count -->

                <!-- Product Image Count -->
                <div class="wg-chart-default">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap14">
                            <div class="image type-white">
                                <i class="fas fa-images text-warning" style="font-size: 2rem;"></i>
                            </div>
                            <div>
                                <div class="body-text mb-2">Total Product Images</div>
                                <h4>{{ $productImageCount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Product Image Count -->

                <!-- Customer Count -->
                <div class="wg-chart-default">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap14">
                            <div class="image type-white">
                                <i class="fas fa-users text-info" style="font-size: 2rem;"></i>
                            </div>
                            <div>
                                <div class="body-text mb-2">Total Customers</div>
                                <h4>{{ $customerCount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Customer Count -->

                <!-- Payment Count -->
                <div class="wg-chart-default">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap14">
                            <div class="image type-white">
                                <i class="fas fa-credit-card text-danger" style="font-size: 2rem;"></i>
                            </div>
                            <div>
                                <div class="body-text mb-2">Total Orders</div>
                                <h4>{{ $paymentCount }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Payment Count -->

            </div>
        </div>
        <!-- /main-content-wrap -->
    </div>
    @include('layouts.footer')

</div>
