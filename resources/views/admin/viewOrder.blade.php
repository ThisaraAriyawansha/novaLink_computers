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

    .view-more-btn {
        background-color: #2ecc71; /* Green color */
        color: white;
        padding: 8px 12px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }


    
.search-form {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: center;
    align-items: center;
    width: 100%;
    max-width: 400px;
    margin: auto;
    padding: 10px;
    background: transparent;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.search-input {
    flex: 1;
    padding: 10px;
    border: 2px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
    outline: none;
    transition: all 0.3s ease-in-out;
}

.search-input:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

.search-button {
    padding: 10px 15px;
    background: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease-in-out;
}

.search-button:hover {
    background: #0056b3;
}

/* Responsive Design */
@media (max-width: 480px) {
    .search-form {
        flex-direction: column;
    }
    
    .search-input, 
    .search-button {
        width: 100%;
    }
}
</style>

<!-- main-content -->
<div class="main-content">
    <!-- main-content-wrap -->
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
        <div class="wg-box">

        <div class="title-box">
            <div class="body-text">Payment Details</div>
        </div>

        <form method="GET" action="{{ route('viewOrder') }}" class="search-form">
                <input type="text" name="search" value="{{ request('search') }}" class="search-input" placeholder="Search by customer name...">
                <button type="submit" class="search-button">🔍 Search</button>
            </form>

        <div class="wg-table">
            <ul class="table-title flex gap-4 mb-4 px-4 py-3">
                <li><div class="body-title" style="flex: 1; min-width: 120px;">Customer</div></li>
                <li><div class="body-title" style="flex: 1; min-width: 120px;">Total Amount</div></li>
                <li><div class="body-title" style="flex: 1; min-width: 120px;">Note</div></li>
                <li><div class="body-title" style="flex: 1; min-width: 120px;">Payment Status</div></li>
                <li><div class="body-title" style="flex: 1; min-width: 120px;">Action</div></li>
            </ul>

            <div class="table-container">
                <ul class="flex flex-column">
                    @foreach($payments as $payment)
                        <li class="product-item flex items-center gap-4 px-4 py-3 hover:bg-gray-50">
                            <!-- Customer Name -->
                            <div class="body-text" style="flex: 1; min-width: 120px;">{{ $payment->customer->fname ?? 'N/A' }}</div>

                            <!-- Total Amount -->
                            <div class="body-text" style="flex: 1; min-width: 120px;">Rs.{{ number_format($payment->total, 2) }}</div>

                            <!-- Note -->
                            <div class="body-text" style="flex: 1; min-width: 120px;">{{ $payment->note }}</div>

                            <!-- Payment Status -->
                            <div class="body-text" style="flex: 1; min-width: 120px;">{{ $payment->paymentStatus->status_name }}</div>

                            <!-- Action Button -->
                            <div style="flex: 1; min-width: 120px;">
                                <button class="view-more-btn" data-id="{{ $payment->id }}">View More</button>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        

        <div class="divider"></div>

        <div class="flex items-center justify-between flex-wrap gap10">
            <div class="text-tiny">Showing {{ $payments->firstItem() }} to {{ $payments->lastItem() }} of {{ $payments->total() }} entries</div>
            <ul class="wg-pagination">
                @if ($payments->onFirstPage())
                    <li class="disabled">
                        <span><i class="icon-chevron-left"></i></span>
                    </li>
                @else
                    <li>
                        <a href="{{ $payments->previousPageUrl() }}"><i class="icon-chevron-left"></i></a>
                    </li>
                @endif

                @foreach ($payments->getUrlRange(1, $payments->lastPage()) as $page => $url)
                    <li class="{{ $page == $payments->currentPage() ? 'active' : '' }}">
                        <a href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                @if ($payments->hasMorePages())
                    <li>
                        <a href="{{ $payments->nextPageUrl() }}"><i class="icon-chevron-right"></i></a>
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
</div>
</div>
<!-- /main-content -->
@include('layouts.footer')
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Add event listener to the "View More" button
        document.querySelectorAll(".view-more-btn").forEach(button => {
            button.addEventListener("click", function () {
                let projectId = this.getAttribute("data-id");
                window.location.href = `/order/view/${projectId}`;
            });
        });
    });
</script>