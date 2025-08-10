@include('layouts.header')
<style>
/* Modal Styles */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1000; /* Sit on top */
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%); /* Centering */
    width: 60%; /* Default width */
    max-width: 600px; /* Ensures it doesn't get too wide on large screens */
    height: 60%; /* Default height */
    max-height: 90vh; /* Prevents modal from exceeding viewport height */
    background-color: rgba(0, 0, 0, 0.9); /* Black with opacity */
    padding: 20px;
    border-radius: 10px; /* Optional: Add rounded corners */
    overflow: auto; /* Enables scrolling if needed */
}

/* Modal Content */
.modal-content {
    margin: auto;
    display: block;
    max-width: 90%;
    max-height: 100%;
}

/* Close Button */
.close {
    position: absolute;
    top: 10px;
    right: 15px;
    color: #fff;
    font-size: 30px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* Responsive Design */
@media screen and (max-width: 768px) {
    .modal {
        width: 90%; /* Increase width for small screens */
        height: auto; /* Auto height for content flexibility */
        max-width: 90%; /* Keep it within the screen limits */
    }

    .modal-content {
        max-width: 90%;
    }

    .close {
        font-size: 25px; /* Reduce close button size */
        top: 5px;
        right: 10px;
    }
}

@media screen and (max-width: 480px) {
    .modal {
        width: 95%; /* Almost full width for small phones */
        height: auto; /* Allow content to dictate height */
        padding: 15px;
    }

    .modal-content {
        max-width: 90%;
    }

    .close {
        font-size: 22px; /* Smaller close button */
        top: 5px;
        right: 8px;
    }
}


.button-container {
    display: flex;
    gap: 10px; /* Adjust spacing between buttons */
    justify-content: center; /* Center buttons horizontally */
}


.view-btn {
    background-color: #3498db; /* Blue color */
    color: white;
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}
.status-btn{
    background-color: #e74c3c; /* Red color */
    color: white;
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

.delete-btn {
    background-color: #e74c3c; /* Red color */
    color: white;
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}/* View More Button Styles */
.view-more-btn {
    background-color: #2ecc71; /* Green color */
    color: white;
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}

/* Button Hover Effects */
.view-btn:hover,
.view-more-btn:hover {
    opacity: 0.8; /* Slightly dim the button when hovered */
}


.update-btn {
    background-color:rgb(135, 141, 137); /* Green color */
    color: white;
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}
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
    

    .search-form {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
        align-items: center;
        width: 100%;
        max-width: 700px; /* Increased from 400px */
        margin: auto;
        padding: 10px;
        background: transparent;
        border-radius: 8px;
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
        border-color: #000000ff;
        box-shadow: 0 0 5px rgba(42, 44, 46, 0.5);
    }

    .search-button {
        padding: 10px 15px;
        background: #000000ff;
        color: white;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s ease-in-out;
    }

    .search-button:hover {
        background: #2c2c2cff;
    }

    /* Responsive Design */
    @media (max-width: 480px) {
        .search-form {
            flex-direction: column;
            max-width: 100%; /* Full width on small screens */
        }
        
        .search-input, 
        .search-button {
            width: 100%;
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


.btn {
    display: inline-block;
    font-weight: 600;
    text-align: center;
    padding: 6px 12px;
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
    border: none;
    user-select: none;
}

.btn-sm {
    padding: 4px 10px;
    font-size: 13px;
}

/* White background, black text & border */
.btn-success {
    background-color: white;
    color: black;
    border: 1px solid black;
}

.btn-success:hover {
    background-color: black;
    color: white;
}

/* Black background, white text (for danger) */
.btn-danger {
    background-color: black;
    color: white;
    border: 1px solid white;
}

.btn-danger:hover {
    background-color: white;
    color: black;
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
                        <div style="background-color: #fff5f5; border-left: 4px solid #ff3b3b; color: #ff3b3b; padding: 16px; margin-bottom: 20px; border-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                            <strong style="font-size: 16px; display: block; margin-bottom: 8px;">⚠️ Oops! There were some errors:</strong>
                            <ul style="margin: 0; padding-left: 20px; list-style-type: none;">
                                @foreach ($errors->all() as $error)
                                    <li style="padding: 4px 0; display: flex; align-items: center;">
                                        <span style="display: inline-block; width: 6px; height: 6px; background-color: #ff3b3b; border-radius: 50%; margin-right: 8px;"></span>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div style="background-color: #f0fff4; border-left: 4px solid #38a169; color: #38a169; padding: 16px; margin-bottom: 20px; border-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                            <div style="font-size: 16px; display: flex; align-items: center; gap: 8px;">
                                <svg style="width: 20px; height: 20px;" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <strong>Success!</strong>
                            </div>
                            <p style="margin: 8px 0 0 28px;">{{ session('success') }}</p>
                        </div>
                    @endif


                 <div class="admin-header">
                <h3 class="text-xl font-semibold" style=" font-size: 18px; font-family: 'Orbitron', sans-serif;">Manage Review</h3>
                    <div class="last-updated">
                        Last updated: {{ now()->format('M j, Y g:i A') }}
                    </div>
                </div>

                <form method="GET" action="{{ route('manageReview') }}" class="search-form">
                    <input type="text" name="search" value="{{ request('search') }}" class="search-input" placeholder="Search product name...">
                    <button type="submit" class="search-button">Search</button>
                </form>




                <div class="wg-table">
                <ul class="table-title flex gap-4 mb-4 px-4 py-3">
                <li><div class="body-title">Image</div></li>
                    <li><div class="body-title">Product Name</div></li>
                    <li><div class="body-title">Customer Name</div></li>
                    <li><div class="body-title">Email</div></li>
                    <li><div class="body-title">Rating</div></li>
                    <li><div class="body-title">Message</div></li>
                    <li><div class="body-title">Status</div></li>
                    <li><div class="body-title">Action</div></li>
                </ul>
                <div class="table-container">
                <ul class="flex flex-column">
    @foreach($reviews as $review)
        <li class="product-item flex items-center gap-4 px-4 py-3 hover:bg-gray-50">
            <!-- Product Image -->
            <div class="body-text flex-shrink-0">
                <img src="{{ asset($review->product->image ?? 'default.jpg') }}" alt="Image" class="image">
            </div>

            <!-- Product Name -->
            <div class="body-text flex-grow">{{ $review->product->name ?? 'N/A' }}</div>

            <!-- Customer Name -->
            <div class="body-text flex-grow">{{ $review->name }}</div>

            <!-- Email -->
            <div class="body-text flex-grow">{{ $review->email }}</div>

            <!-- Rating -->
            <div class="body-text flex-grow">{{ $review->rating }}</div>

            <!-- Message -->
            <div class="body-text flex-grow">{{ $review->message }}</div>

            <!-- Status -->
            <div class="body-text flex-grow">
                {{ $review->status == 2 ? 'Active' : 'Inactive' }}
            </div>

            <!-- Action -->
            <!-- Action -->
            <div class="button-container flex-shrink-0">
                <form method="POST" action="{{ route('toggleReviewStatus', $review->id) }}">
                    @csrf
                    @method('PATCH')
                    <button type="submit" class="btn btn-sm {{ $review->status == 2 ? 'btn-danger' : 'btn-success' }}">
                        {{ $review->status == 2 ? 'Deactivate' : 'Activate' }}
                    </button>
                </form>
            </div>

        </li>
    @endforeach
</ul>

</div>

            </div>

            <div class="divider"></div>

            <div class="text-tiny">
                Showing {{ $reviews->firstItem() }} to {{ $reviews->lastItem() }} of {{ $reviews->total() }} entries
            </div>

            <ul class="wg-pagination">
                @if ($reviews->onFirstPage())
                    <li class="disabled"><span><i class="icon-chevron-left"></i></span></li>
                @else
                    <li><a href="{{ $reviews->previousPageUrl() }}"><i class="icon-chevron-left"></i></a></li>
                @endif

                @foreach ($reviews->getUrlRange(1, $reviews->lastPage()) as $page => $url)
                    <li class="{{ $page == $reviews->currentPage() ? 'active' : '' }}">
                        <a href="{{ $url }}">{{ $page }}</a>
                    </li>
                @endforeach

                @if ($reviews->hasMorePages())
                    <li><a href="{{ $reviews->nextPageUrl() }}"><i class="icon-chevron-right"></i></a></li>
                @else
                    <li class="disabled"><span><i class="icon-chevron-right"></i></span></li>
                @endif
            </ul>



                <div class="divider"></div>

                
            </div>
            <!-- /product-list -->
        </div>
        <!-- /main-content-wrap -->
    </div>

    @include('layouts.footer')
</div>
<!-- /main-content -->




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

