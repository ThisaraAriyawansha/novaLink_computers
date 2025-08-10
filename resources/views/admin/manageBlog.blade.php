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

.view-btn {
    background-color: white;
    color: black;
    padding: 8px 12px;
    border: 1px solid black;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

.view-btn:hover {
    background-color: black;
    color: white;
}


.update-btn {
    background-color:rgba(0, 0, 0, 1); /* Green color */
    color: white;
    padding: 8px 12px;
    border: 1px solid black;
    cursor: pointer;
    border-radius: 5px;
}

.update-btn:hover {
    background-color: white;
    color: black;
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
    border-color: #000000ff;
    box-shadow: 0 0 5px rgba(37, 38, 39, 0.5);
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
    background: #3c3d3fff;
}

/* Responsive Design */
@media (max-width: 480px) {
    .search-form {
        flex-direction: column;
        max-width: 100%; /* Make full width on mobile */
        padding: 5px; /* Slightly reduce padding */
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
                <h3 class="text-xl font-semibold" style=" font-size: 18px; font-family: 'Orbitron', sans-serif;">Manage Blog</h3>
                    <div class="last-updated">
                        Last updated: {{ now()->format('M j, Y g:i A') }}
                    </div>
                </div>

                <form method="GET" action="{{ route('manageBlog') }}" class="search-form">
                    <input type="text" name="search" value="{{ request('search') }}" class="search-input" placeholder="Search Title...">
                    <button type="submit" class="search-button">Search</button>
                </form>




                <div class="wg-table">
                <ul class="table-title flex gap-4 mb-4 px-4 py-3">
                    <li><div class="body-title">Image</div></li>
                    <li><div class="body-title">Title</div></li>
                    <li><div class="body-title">Date</div></li>
                    <li><div class="body-title">Tags</div></li>
                    <li><div class="body-title">Action</div></li>
                </ul>
                <div class="table-container">
            <ul class="flex flex-column">
            @foreach($blogs as $blog)
        <li class="product-item flex items-center gap-4 px-4 py-3 hover:bg-gray-50">
            <!-- Image -->
            <div class="body-text flex-shrink-0">
                <img src="{{ asset(''.$blog->image) }}" alt="Image" class="image">
            </div>
            
            <div class="body-text flex-grow">{{ $blog->title }}</div>

            <div class="body-text flex-grow">{{ $blog->date }}</div>

            <div class="body-text flex-grow">{{ $blog->tag }}</div>





            <!-- Action Buttons -->
            <div class="button-container flex-shrink-0">
            <button class="view-btn" data-image="{{ asset(''.$blog->image) }}">View Image</button>
                <button class="update-btn" data-id="{{ $blog->id }}">Update</button> 
            </div>
        </li>
        @endforeach
    </ul>
</div>

            </div>

            <div class="divider"></div>

            <div class="flex items-center justify-between flex-wrap gap10">
                <div class="text-tiny">Showing {{ $blogs->firstItem() }} to {{ $blogs->lastItem() }} of {{ $blogs->total() }} entries</div>
                <ul class="wg-pagination">
                    <!-- Pagination Controls -->
                    @if ($blogs->onFirstPage())
                        <li class="disabled">
                            <span><i class="icon-chevron-left"></i></span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $blogs->previousPageUrl() }}"><i class="icon-chevron-left"></i></a>
                        </li>
                    @endif

                    @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                        <li class="{{ $page == $blogs->currentPage() ? 'active' : '' }}">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    @if ($blogs->hasMorePages())
                        <li>
                            <a href="{{ $blogs->nextPageUrl() }}"><i class="icon-chevron-right"></i></a>
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
    <!-- Modal Structure -->
<div id="imageModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="modalImage">
</div>
    @include('layouts.footer')
</div>
<!-- /main-content -->

<script>
    document.querySelectorAll('.update-btn').forEach(button => {
        button.addEventListener('click', function () {
            const blogId = this.getAttribute('data-id');
            window.location.href = `/blogs/edit/${blogId}`; // Redirect to edit page
        });
    });
</script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Get the modal
        const modal = document.getElementById("imageModal");
        const modalImg = document.getElementById("modalImage");
        const span = document.getElementsByClassName("close")[0];

        // Function to open the modal with the image
        function openModal(imageSrc) {
            modal.style.display = "block";
            modalImg.src = imageSrc;
        }

        // Function to close the modal
        function closeModal() {
            modal.style.display = "none";
        }

        // Add event listeners to all "View" buttons
        document.querySelectorAll(".view-btn").forEach(button => {
            button.addEventListener("click", function () {
                const imageSrc = this.getAttribute("data-image");
                openModal(imageSrc);
            });
        });

        // Close the modal when the close button is clicked
        span.addEventListener("click", closeModal);

        // Close the modal when clicking outside the image
        window.addEventListener("click", function (event) {
            if (event.target === modal) {
                closeModal();
            }
        });
    });




    



</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

