@include('layouts.header')
<style>

.wg-table {
        width: 100%;
        overflow-x: auto;
    }

    .table-container {
        width: 100%;
        overflow-x: auto;
    }

    .wg-table .table-title, .wg-table .product-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .wg-table .table-title li, .wg-table .product-item > div {
        flex: 1;
        text-align: left;
        min-width: 120px;
    }

    .wg-table .button-container {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    .wg-table .body-text {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .image {
        width: 80px;
        height: auto;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .wg-table .table-title {
            display: none; /* Hide table headers on small screens */
        }

        .wg-table .product-item {
            display: flex;
            flex-wrap: wrap;
            border-bottom: 1px solid #ddd;
            padding: 10px;
        }

        .wg-table .product-item > div {
            flex: 100%;
            text-align: left;
        }

        .wg-table .image {
            width: 100%;
            max-width: 100px;
        }

        .wg-table .button-container {
            flex: 100%;
            display: flex;
            justify-content: flex-start;
            gap: 5px;
        }
    }
    

        .wg-box {
            margin-left: 20px;
            margin-right: 20px;
        }

        .last-updated {
            background: var(--white);
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            border: 1px solid var(--gray-200);
            font-size: 1.3rem;
            color: var(--gray-600);
        }
        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

     .wg-pagination li a:hover {
        background-color: #333;    /* Darker shade on hover */
    }
    .wg-pagination li.active a {
        background-color: #000000ff; /* Highlighted page */
        color: black;
    } 
    
        .main-content {
        min-height: 77vh;
    }
</style>
<!-- main-content -->
<div class="main-content">
    <!-- main-content-wrap -->
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">

            <!-- product-list -->
            <div class="wg-box">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Oops! There were some errors with your submission:</strong>
                        <ul class="mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success! </strong> {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error! </strong> {{ session('error') }}
                    </div>
                @endif

                <div class="admin-header">
                <h3 class="text-xl font-semibold" style=" font-size: 18px; font-family: 'Orbitron', sans-serif;">Manage Customer</h3>
                    <div class="last-updated">
                        Last updated: {{ now()->format('M j, Y g:i A') }}
                    </div>
                </div>
                
                
                <div class="wg-table">
                <ul class="table-title flex gap-4 mb-4 px-4 py-3">
                    <li><div class="body-title">First name</div></li>
                    <li><div class="body-title">Last Name</div></li>
                    <li><div class="body-title">Email</div></li>
                    <li><div class="body-title">Phone</div></li>

                </ul>
                <div class="table-container">
    <ul class="flex flex-column">
        @foreach($product as $item)
        <li class="product-item flex items-center gap-4 px-4 py-3 hover:bg-gray-50">

        
            <div class="body-text flex-grow">{{ $item->fname }}</div>

            <div class="body-text flex-grow">{{ $item->lname }}</div>

            <div class="body-text flex-grow">{{ $item->email }}</div>

            <div class="body-text flex-grow">{{ $item->phone }}</div>




        </li>
        @endforeach
    </ul>
</div>

            </div>

            <div class="divider"></div>

            <div class="flex items-center justify-between flex-wrap gap10">
                <div class="text-tiny">Showing {{ $product->firstItem() }} to {{ $product->lastItem() }} of {{ $product->total() }} entries</div>
                <ul class="wg-pagination">
                    <!-- Pagination Controls -->
                    @if ($product->onFirstPage())
                        <li class="disabled">
                            <span><i class="icon-chevron-left"></i></span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $product->previousPageUrl() }}"><i class="icon-chevron-left"></i></a>
                        </li>
                    @endif

                    @foreach ($product->getUrlRange(1, $product->lastPage()) as $page => $url)
                        <li class="{{ $page == $product->currentPage() ? 'active' : '' }}">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    @if ($product->hasMorePages())
                        <li>
                            <a href="{{ $product->nextPageUrl() }}"><i class="icon-chevron-right"></i></a>
                        </li>
                    @else
                        <li class="disabled">
                            <span><i class="icon-chevron-right"></i></span>
                        </li>
                    @endif
                </ul>
            </div>


                <div class="divider"></div>

                
            </div>
            <!-- /product-list -->
        </div>
        <!-- /main-content-wrap -->
    </div>

</div>
    @include('layouts.footer')

<!-- /main-content -->





