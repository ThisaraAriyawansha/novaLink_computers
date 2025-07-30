@include('layouts.header')

<!-- main-content -->
<div class="main-content">
    <!-- main-content-wrap -->
    <div class="main-content-inner">
        <!-- main-content-wrap -->
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>View Images</h3>
            </div>
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

                <div class="title-box">
                    <div class="body-text">Manage Images</div>
                </div>

                <div class="wg-table">
                    <ul class="table-title flex gap-4 mb-14 px-4 py-3">
                        <li><div class="body-title">Image</div></li>
                        <li><div class="body-title">Type</div></li>
                        <li><div class="body-title">Action</div></li>
                    </ul>
                    <ul class="flex flex-column">
                        @foreach($images as $image)
                        <li class="product-item gap-2 px-4 py-3 hover:bg-gray-50">
                            <div class="flex items-center justify-between gap-4 flex-grow">
                                <!-- Display Image -->
                                <div class="body-text">
                                    <img src="{{ asset(''.$image->image_path) }}" alt="Image" style="width: 100px; height: auto;" />
                                </div>
                                <!-- Display Type -->
                                <div class="body-text">{{ $image->tvType->name }}</div>
                                <!-- Action Button -->
                                <div class="">
                                    <button class="block-not-available delete-btn" data-id="{{ $image->id }}">Delete</button>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
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
            </div>
            <!-- /product-list -->
        </div>
        <!-- /main-content-wrap -->
    </div>
    @include('layouts.footer')
</div>
<!-- /main-content -->

<script>
    function showEntries() {
        const rows = document.querySelectorAll('#ListingsTable tbody tr'); // Target the ListingsTable
        let entries = document.getElementById('col_num').value;

        // Set default value of 30 if input is empty or invalid
        if (!entries || entries <= 0) {
            entries = 30;
        }

        rows.forEach((row, index) => {
            if (index < entries) {
                row.style.display = ''; // Show row
            } else {
                row.style.display = 'none'; // Hide row
            }
        });
    }
</script>


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
