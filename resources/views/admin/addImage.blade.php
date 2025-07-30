
@include('layouts.header')

<style>
    /* Default Light Mode Styles */
    :root {
        --bg-color: #ffffff;
        --text-color: #333;
        --input-bg: #fff;
        --input-border: #ccc;
        --button-bg: #007bff;
        --button-text: #fff;
    }

    /* Dark Mode Styles */
    [data-theme="dark"] {
        --bg-color: #1e1e1e;
        --text-color: #f5f5f5;
        --input-bg: #333;
        --input-border: #555;
        --button-bg: #007bff;
        --button-text: #fff;
    }

    .dark-mode-input {
        background-color: var(--input-bg);
        border: 2px solid var(--input-border);
        color: var(--text-color);
        padding: 10px;
        width: 100%;
        border-radius: 8px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .main-content-wrap {
            padding: 15px;
        }
        .tf-button {
            width: 100%;
        }
    }

    /* Custom styles for select box */
    .select2-container .select2-selection--single {
        height: 50px;
        border-radius: 10px;
        border: 2px solid var(--input-border);
        font-size: 16px;
        padding: 8px;
        background-color: var(--input-bg);
        color: var(--text-color);
    }

    .select2-dropdown {
        border-radius: 10px;
        font-size: 16px;
        background-color: var(--bg-color);
        color: var(--text-color);
    }

</style>
                    <!-- main-content -->
                    <div class="main-content">
                        <!-- main-content-wrap -->
                        <div class="main-content-inner">
                            <!-- main-content-wrap -->
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                    <h3>Add a Image</h3>
                                </div>
                                <!-- new-category -->
                                <div class="wg-box">
                                <form id="addItemForm" class="form-new-product form-style-1" method="POST" enctype="multipart/form-data" action="{{ route('storeImage') }}">
                                {{ csrf_field() }}

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

                                        <h5>Add Image</h5>
                                        <fieldset class="category">
                                            <div class="body-title">Select Product</div>
                                            <div class="select flex-grow">
                                                <select class="select2 form-control" id="productid" name="productid">
                                                    <option value="">Select a Product</option>
                                                    @foreach($product as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </fieldset>


                                        
                                        <fieldset>
                                            <div class="body-title">Upload All Images here (Allowed: JPG, JPEG, PNG & WEBP)<span class="tf-color-1">*</span></div>
                                            <div class="upload-image flex-grow">
                                                <div class="item up-load">
                                                    <label class="uploadfile" for="myFile">
                                                        <span class="icon">
                                                            <i class="icon-upload-cloud"></i>
                                                        </span>
                                                        <span class="body-text">
                                                            Drop your images here or select 
                                                            <span class="tf-color">click to browse</span>
                                                        </span>
                                                        <!-- Accept JPG, JPEG, PNG, and WEBP formats -->
                                                        <input type="file" id="myFile" name="image_path" accept="image/png, image/jpeg, image/jpg, image/webp">
                                                        <div id="imagePreview" class="flex flex-wrap gap-2 mt-2"></div>
                                                    </label>
                                                </div>
                                            </div>
                                        </fieldset>

                                        <div class="bot">
                                            <div></div>
                                            <button class="tf-button w208" type="submit" >Save</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /new-category -->
                            </div>
                            <!-- /main-content-wrap -->
                        </div>

@include('layouts.footer')

<!-- Include jQuery & Select2 JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script>
    document.getElementById("myFile").addEventListener("change", function (event) {
    const previewContainer = document.getElementById("imagePreview");
    previewContainer.innerHTML = ""; // Clear previous previews

    const files = event.target.files;
    if (files.length > 0) {
        Array.from(files).forEach((file) => {
            if (file.type.startsWith("image/")) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const img = document.createElement("img");
                    img.src = e.target.result;
                    img.classList.add("w-24", "h-24", "object-cover", "rounded", "border", "p-1", "shadow-sm");
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    }
});

</script>


<!-- Initialize Select2 -->
<script>
    $(document).ready(function() {
        $('#productid').select2({
            placeholder: "Select a Product",
            allowClear: true
        });
    });
</script>