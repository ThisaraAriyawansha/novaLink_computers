@include('layouts.header')

<div class="main-content">
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3 class="text-xl font-semibold">Add a New Blog</h3>
            </div>

            <div class="wg-box  p-6 rounded-lg shadow">
                <form id="addItemForm" class="form-new-product space-y-5" method="POST" enctype="multipart/form-data" action="{{ route('storeBlog') }}">
                    {{ csrf_field() }}

                    @if ($errors->any())
                        <div class="alert alert-danger p-3 rounded">
                            <strong>Oops! There were some errors:</strong>
                            <ul class="mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success p-3 rounded">
                            <strong>Success!</strong> {{ session('success') }}
                        </div>
                    @endif


                    <fieldset class="title">
                        <div class="body-title mb-10">Title <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter Title" name="title" required>
                    </fieldset>

                     <br/>
                    <!-- Description -->
                    <fieldset class="description">
                        <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
                        <textarea class="mb-10" placeholder="Enter Description" name="description" required rows="4"></textarea>
                    </fieldset>


                    <fieldset class="tags">
                        <div class="body-title mb-10">Tags <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter Tags" name="tags" required>
                    </fieldset>


                    <fieldset class="date">
                        <div class="body-title mb-10">Date</div>
                        <input class="mb-10" type="datetime-local" name="date" >
                    </fieldset>


                    <!-- Image Upload -->
                    <fieldset>
                        <div class="body-title">Upload All Images here (Allowed only JPG, JPEG, PNG, and WebP files)<span class="tf-color-1">*</span></div>
                        <div class="upload-image flex-grow">
                            <div class="item up-load">
                                <label class="uploadfile" for="myFile">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="body-text">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                    <input type="file" id="myFile" name="image_path" accept="image/png, image/jpeg, image/jpg, image/webp">
                                    <div id="imagePreview" class="flex flex-wrap gap-2 mt-2"></div>
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <br/>

                    <!-- Submit Button -->
                    <div class="bot">
                     <div></div>
                    <button class="tf-button w208" type="submit" >Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.footer')

</div>


<script>
    document.getElementById("myFile").addEventListener("change", function (event) {
        const previewContainer = document.getElementById("imagePreview");
        previewContainer.innerHTML = ""; 

        const files = event.target.files;
        if (files.length > 0) {
            Array.from(files).forEach((file) => {
                if (file.type.startsWith("image/")) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const img = document.createElement("img");
                        img.src = e.target.result;
                        img.classList.add("w-24", "h-24", "object-cover", "rounded-lg", "border", "p-1", "shadow");
                        previewContainer.appendChild(img);
                    };
                    reader.readAsDataURL(file);
                }
            });
        }
    });
</script>


