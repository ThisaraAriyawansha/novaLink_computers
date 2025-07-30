@include('layouts.header')
<style>


.delete-btn {
    background-color: #e74c3c; /* Red color */
    color: white;
    padding: 8px 12px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
}/* View More Button Styles */

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


    /* Style for the edit button */
.edit-btn {
    background-color: #4CAF50; /* Green background */
    color: white; /* White text */
    border: none;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.edit-btn:hover {
    background-color: #45a049; /* Darker green on hover */
}

/* Style for the save button */
.save-btn {
    background-color: #008CBA; /* Blue background */
    color: white; /* White text */
    border: none;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
    display: none; /* Hide by default */
}

.save-btn:hover {
    background-color: #007bb5; /* Darker blue on hover */
}

/* Style for the delete button */
.delete-btn {
    background-color: #f44336; /* Red background */
    color: white; /* White text */
    border: none;
    padding: 8px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.delete-btn:hover {
    background-color: #d32f2f; /* Darker red on hover */
}

/* Optional: Style for the input fields */
.edit-feature-name, .edit-feature-value {
    padding: 6px 12px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 4px;
    width: 100%;
    max-width: 200px;
}

.edit-feature-name:disabled, .edit-feature-value:disabled {
    background-color: #f0f0f0; /* Gray background when disabled */
}


/* Form Container */
.form-new-product {
    display: flex;
    flex-direction: column;
    gap: 15px;
    max-width: 600px;
    margin: auto;
    padding: 20px;
    background: transparent;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

/* Input and Button in One Row */
.input-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
    width: 100%;
}

/* Input Fields */
.input-container .input-label {
    font-size: 14px;
    font-weight: bold;
    color: #333;
    margin-right: 5px;
}

.input-container .input-field {
    padding: 12px;
    font-size: 14px;
    outline: none;
    width: 30%; /* Adjust width as needed */
    transition: border-color 0.3s;
}

.input-container .input-field:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

/* Submit Button */
.submit-btn {
    padding: 12px 15px;
    background: #007bff;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
    transition: background 0.3s;
}

.submit-btn:hover {
    background: #0056b3;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .input-container {
        flex-direction: column;
        align-items: stretch;
    }

    .input-container .input-field,
    .submit-btn {
        width: 100%;
    }
}



    
</style>
<!-- main-content -->

<div class="main-content">
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>Product Features</h3>
            </div>

            <div class="wg-box">
                <div class="title-box">
                    <div class="body-text">Product Information</div>
                </div>

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

                                <form id="addItemForm" class="form-new-product form-style-1" method="POST" enctype="multipart/form-data" action="{{ route('storeFeature') }}">
                                    @csrf
                                    <input type="hidden" name="productid" id="productid" value="{{ $product->id }}">

                                    <!-- Feature Name & Value in One Line -->
                                    <div class="input-container">
                                        <input type="text" id="featureName" name="name" class="input-field" placeholder="Feature Name" required>
                                        <input type="text" id="featureValue" name="value" class="input-field" placeholder="Feature Value" required>
                                        <button type="submit" class="submit-btn">Submit</button>
                                    </div>
                                </form>

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
                                </div>




                <div class="title-box mt-5">
                    <div class="body-text">Product Feature</div>
                </div>

                <div class="wg-table">
    <ul class="table-title flex gap-4 mb-4 px-4 py-3">
        <li><div class="body-title">Name</div></li>
        <li><div class="body-title">Value</div></li>
        <li><div class="body-title">Action</div></li> <!-- Added Action column title -->
    </ul>
    <div class="table-container">
        <ul class="flex flex-column">
        @foreach($features as $feature)
        <li class="product-item flex items-center gap-4 px-4 py-3 hover:bg-gray-50">
            <div class="body-text flex-grow">
                <input type="text" class="edit-feature-name" value="{{ $feature->feature_name }}" data-id="{{ $feature->id }}" disabled />
            </div>
            <div class="body-text flex-grow">
                <input type="text" class="edit-feature-value" value="{{ $feature->feature_value }}" data-id="{{ $feature->id }}" disabled />
            </div>

            <div class="body-text">
                <!-- Edit and Save buttons -->
                <button class="edit-btn" data-id="{{ $feature->id }}">Edit</button>
                <button class="save-btn" data-id="{{ $feature->id }}" style="display: none;">Save</button>
                <button class="delete-btn" data-id="{{ $feature->id }}">Delete</button>
            </div>
        </li>
        @endforeach
        </ul>
    </div>
</div>




            <div class="divider"></div>

            <div class="flex items-center justify-between flex-wrap gap-10">
        <div class="text-tiny">
            Showing {{ $features->firstItem() }} to {{ $features->lastItem() }} of {{ $features->total() }} entries
        </div>
        <ul class="wg-pagination">
            <!-- Pagination Controls -->
            @if ($features->onFirstPage())
                <li class="disabled">
                    <span><i class="icon-chevron-left"></i></span>
                </li>
            @else
                <li>
                    <a href="{{ $features->previousPageUrl() }}"><i class="icon-chevron-left"></i></a>
                </li>
            @endif

            @foreach ($features->getUrlRange(1, $features->lastPage()) as $page => $url)
                <li class="{{ $page == $features->currentPage() ? 'active' : '' }}">
                    <a href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            @if ($features->hasMorePages())
                <li>
                    <a href="{{ $features->nextPageUrl() }}"><i class="icon-chevron-right"></i></a>
                </li>
            @else
                <li class="disabled">
                    <span><i class="icon-chevron-right"></i></span>
                </li>
            @endif
        </ul>
    </div>
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

                if (confirm("Are you sure you want to delete this Feature?")) {
                    fetch(`/admin/deleteFeature/${imageId}`, {
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
                            alert("Feature deleted successfully!");
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
    document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', function() {
        const featureId = this.getAttribute('data-id');
        const nameInput = document.querySelector(`.edit-feature-name[data-id='${featureId}']`);
        const valueInput = document.querySelector(`.edit-feature-value[data-id='${featureId}']`);
        const saveButton = document.querySelector(`.save-btn[data-id='${featureId}']`);
        
        // Enable inputs and show the save button
        nameInput.disabled = false;
        valueInput.disabled = false;
        saveButton.style.display = 'inline-block';
        this.style.display = 'none'; // Hide edit button
    });
});

document.querySelectorAll('.save-btn').forEach(button => {
    button.addEventListener('click', function() {
        const featureId = this.getAttribute('data-id');
        const nameInput = document.querySelector(`.edit-feature-name[data-id='${featureId}']`);
        const valueInput = document.querySelector(`.edit-feature-value[data-id='${featureId}']`);
        
        const updatedName = nameInput.value;
        const updatedValue = valueInput.value;
        
        // Send an AJAX request to update the feature
        fetch(`/features/${featureId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                feature_name: updatedName,
                feature_value: updatedValue
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update the UI and show a success message
                nameInput.disabled = true;
                valueInput.disabled = true;
                this.style.display = 'none'; // Hide save button
                document.querySelector(`.edit-btn[data-id='${featureId}']`).style.display = 'inline-block'; // Show edit button
            } else {
                // Handle error
                alert('Failed to update feature');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred');
        });
    });
});

</script>
