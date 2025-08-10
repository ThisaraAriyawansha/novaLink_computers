@include('layouts.header')


<style>
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

</style>


<div class="main-content">
    <div class="main-content-inner">
        <div class="main-content-wrap">

            <div class="wg-box p-6 rounded-lg shadow">

                <div class="admin-header">
                <h3 class="text-xl font-semibold" style=" font-size: 18px; font-family: 'Orbitron', sans-serif;">Update Blog</h3>
                    <div class="last-updated">
                        Last updated: {{ now()->format('M j, Y g:i A') }}
                    </div>
                </div>

                <form id="updateBlogForm" class="form-new-product space-y-5" method="POST" enctype="multipart/form-data" action="{{ route('updateBlog', $blog->id) }}">
                    @csrf

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

                    <!-- Title -->
                    <fieldset class="title">
                        <div class="body-title mb-10">Title <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter Title" name="title" value="{{ $blog->title }}" required>
                    </fieldset>

                    <!-- Description -->
                    <fieldset class="description">
                        <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
                        <textarea class="mb-10" placeholder="Enter Description" name="description" required rows="4">{{ $blog->description }}</textarea>
                    </fieldset>

                    <!-- Tags -->
                    <fieldset class="tags">
                        <div class="body-title mb-10">Tags <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter Tags" name="tags" value="{{ $blog->tag }}" required>
                    </fieldset>

                    <!-- Date -->
                    <fieldset class="date">
                        <div class="body-title mb-10">Date</div>
                        <input class="mb-10" type="datetime-local" name="date" value="{{ $blog->date ? \Carbon\Carbon::parse($blog->date)->format('Y-m-d\TH:i') : '' }}">
                    </fieldset>

                    <!-- Image Upload -->
                    <fieldset>
                        <div class="body-title">Upload New Image (Allowed only JPG, JPEG, PNG, and WebP files)</div>
                        <div class="upload-image flex-grow">
                            <div class="item up-load">
                                <label class="uploadfile" for="myFile">
                                    <span class="icon">
                                        <i class="icon-upload-cloud"></i>
                                    </span>
                                    <span class="body-text">Drop your images here or select <span class="tf-color">click to browse</span></span>
                                    <input type="file" id="myFile" name="image_path" accept="image/png, image/jpeg, image/jpg, image/webp">
                                    <div id="imagePreview" class="flex flex-wrap gap-2 mt-2">
                                        <!-- Display current image -->
                                        <img src="{{ asset($blog->image) }}" alt="Current Image" class="w-24 h-24 object-cover rounded-lg border p-1 shadow">
                                    </div>
                                </label>
                            </div>
                        </div>
                    </fieldset><br/>

                    <!-- Submit Button -->
                    <div class="bot">
                        <div></div>


                    <button type="submit" 
                        style="
                            display: block;
                            margin: 0 auto;
                            background-color: black;
                            color: white;
                            border: 1px solid black;
                            padding: 10px 20px;
                            cursor: pointer;
                            transition: all 0.3s ease;
                        "
                        onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                        onmouseout="this.style.backgroundColor='black'; this.style.color='white';"
                    >
                        Update Blog
                    </button>
                
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


