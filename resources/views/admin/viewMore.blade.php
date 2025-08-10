@include('layouts.header')
<style>
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

.view-btn {
    background-color: #000000ff; /* Blue color */
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
    background-color:rgba(0, 0, 0, 1); /* Green color */
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
    

/* Form Container */
.inline-form {
    display: flex;
    justify-content: flex-start; /* Align left */
    align-items: center;
    width: 100%;
    max-width: 800px; /* Increased max width */
    margin: 0; /* Remove auto-centering */
}

/* Input and Button Wrapper */
.input-container {
    display: flex;
    align-items: center;
    gap: 10px;
    width: 100%;
    padding: 10px;
    background: transparent;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

/* File Input */
.file-input {
    flex: 1;
    padding: 10px;
    border: 2px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    outline: none;
    cursor: pointer;
}

/* Upload Button */
.upload-btn {
    padding: 10px 15px;
    background: #000000ff;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
    transition: background 0.3s ease-in-out;
}

.upload-btn:hover {
    background: #2e2f30ff;
}

/* Responsive - Stack on small screens */
@media (max-width: 480px) {
    .input-container {
        flex-direction: column;
        gap: 5px;
    }

    .file-input,
    .upload-btn {
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
    <div class="main-content-inner">
        <div class="main-content-wrap">


            <div class="wg-box">


                <div class="admin-header">
                <h3 class="text-xl font-semibold" style=" font-size: 18px; font-family: 'Orbitron', sans-serif;">Product Information</h3>
                    <div class="last-updated">
                        Last updated: {{ now()->format('M j, Y g:i A') }}
                    </div>
                </div>

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
                    
                <div class="wg-table">
                    <ul class="table-title flex gap-4 mb-4 px-4 py-3">
                        <li><div class="body-title">Product Name</div></li>
                    </ul>
                    <div class="table-container">
                        <ul class="flex flex-column">
                            <li class="product-item flex items-center gap-4 px-4 py-3 hover:bg-gray-50">
                                <div class="body-text">{{ $product->name }}</div>
                                <img src="{{ asset($product->image) }}" alt="Product Image" class="img-thumbnail" width="100">

                            </li>
                        </ul>
                    </div>
                        <br/>
                        <button class="update-btn" onclick="window.location.href='/product/{{ $product->id }}/features'">Manage Features</button>

                </div>
                

                <form id="addItemForm" class="inline-form" method="POST" enctype="multipart/form-data" action="{{ route('storeImage') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="productid" id="productid" value="{{ $product->id }}">

                    <!-- Image Input & Upload Button in One Row -->
                    <div class="input-container">
                        <label for="myFile" class="file-label">Choose an Image:</label>
                        <input type="file" id="myFile" name="image_path" accept="image/png, image/jpeg, image/jpg, image/webp" required class="file-input">
                        <button type="submit" class="upload-btn">Upload</button>
                    </div>
                </form>






                

                <div class="title-box mt-5">
                    <div class="body-text">Product Images</div>
                </div>

                <div class="wg-table">
                    <ul class="table-title flex gap-4 mb-4 px-4 py-3">
                        <li><div class="body-title">Image</div></li>
                        <li><div class="body-title">Action</div></li> <!-- Added Action column title -->
                    </ul>
                    <div class="table-container">
                        <ul class="flex flex-column">
                            @foreach($images as $image)
                            <li class="product-item flex items-center gap-4 px-4 py-3 hover:bg-gray-50">
                                <div class="body-text">
                                    <img src="{{ asset($image->image_path) }}" alt="Product Image" class="image">
                                </div>
                                <div class="body-text">
                                    <!-- Example Action buttons -->
                                    <button class="view-btn" data-image="{{ asset(''.$image->image_path) }}">View Image</button>
                                    <button class="delete-btn" data-id="{{ $image->id }}">Delete</button>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>



            <div class="divider"></div>

            <div class="flex items-center justify-between flex-wrap gap10">
                <div class="text-tiny">Showing {{ $images->firstItem() }} to {{ $images->lastItem() }} of {{ $images->total() }} entries</div>
                <ul class="wg-pagination">
                    <!-- Pagination Controls -->
                    @if ($images->onFirstPage())
                        <li class="disabled">
                            <span><i class="icon-chevron-left"></i></span>
                        </li>
                    @else
                        <li>
                            <a href="{{ $images->previousPageUrl() }}"><i class="icon-chevron-left"></i></a>
                        </li>
                    @endif

                    @foreach ($images->getUrlRange(1, $images->lastPage()) as $page => $url)
                        <li class="{{ $page == $images->currentPage() ? 'active' : '' }}">
                            <a href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    @if ($images->hasMorePages())
                        <li>
                            <a href="{{ $images->nextPageUrl() }}"><i class="icon-chevron-right"></i></a>
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
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".delete-btn").forEach(button => {
            button.addEventListener("click", function () {
                let imageId = this.getAttribute("data-id");

                if (confirm("Are you sure you want to delete this image?")) {
                    fetch(`/admin/deleteImage/${imageId}`, {
                        method: "POST", // Using POST because DELETE might not work without a form
                        headers: {
                            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                            "Content-Type": "application/json"
                        },
                        body: JSON.stringify({ _method: "DELETE" }) 
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log(data); // Debugging
                        if (data.success) {
                            alert("Image deleted successfully!");
                            location.reload();
                        } else {
                            alert("Error: " + data.error);
                        }
                    })
                    .catch(error => console.error("Error:", error));

                }
            });
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


    document.addEventListener("DOMContentLoaded", function () {
    // Add event listener to the "View More" button
    document.querySelectorAll(".view-more-btn").forEach(button => {
        button.addEventListener("click", function () {
            let projectId = this.getAttribute("data-id");

            // Redirect to project details page or handle as needed
            window.location.href = `/product/view/${projectId}`; // You can replace this URL with the desired view page URL
        });
    });


    

    // Modal related functionality
    const modal = document.getElementById("imageModal");
    const modalImg = document.getElementById("modalImage");
    const span = document.getElementsByClassName("close")[0];

    function openModal(imageSrc) {
        modal.style.display = "block";
        modalImg.src = imageSrc;
    }

    function closeModal() {
        modal.style.display = "none";
    }

    document.querySelectorAll(".view-btn").forEach(button => {
        button.addEventListener("click", function () {
            const imageSrc = this.getAttribute("data-image");
            openModal(imageSrc);
        });
    });

    span.addEventListener("click", closeModal);

    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            closeModal();
        }
    });
});


</script>




