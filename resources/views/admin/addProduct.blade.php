@include('layouts.header')

<div class="main-content">
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3 class="text-xl font-semibold">Add a New Product</h3>
            </div>

            <div class="wg-box p-6 rounded-lg shadow">
                <form id="addItemForm" class="form-new-product space-y-5" method="POST" enctype="multipart/form-data" action="{{ route('storeProduct') }}">
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

                    <fieldset class="name">
                        <div class="body-title mb-10">Product Name <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter Product Name" name="name" required>
                    </fieldset>

                    <!-- Brand -->
                    <fieldset class="brand">
                        <div class="body-title mb-10">Brand Name <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter Brand Name" name="brand" required>
                    </fieldset>

                    <!-- Type -->
                    <fieldset class="type">
                        <div class="body-title">Select Type</div>
                        <div class="select flex-grow">
                            <select id="type" name="type">
                                <option value="">Select a Type</option>
                                <option value="LAPTOPS">LAPTOPS</option>
                                <option value="ASUS ROG">ASUS ROG</option>
                                <option value="APPLE PRODUCTS">APPLE PRODUCTS</option>
                                <option value="GAMING CONSOLE">GAMING CONSOLE</option>
                                <option value="PROCESSOR">PROCESSOR</option>
                                <option value="MOTHERBOARD">MOTHERBOARD</option>
                                <option value="RAM">RAM</option>
                                <option value="GRAPHIC CARDS">GRAPHIC CARDS</option>
                                <option value="CASINGS">CASINGS</option>
                                <option value="POWER SUPPLY">POWER SUPPLY</option>
                                <option value="SSD NVME">SSD NVME</option>
                                <option value="HARD DISK">HARD DISK</option>
                                <option value="FANS">FANS</option>
                                <option value="MONITORS">MONITORS</option>
                                <option value="ANTIVIRUS SOFTWARE">ANTIVIRUS SOFTWARE</option>
                                <option value="KEYBOARDS">KEYBOARDS</option>
                                <option value="MOUSE">MOUSE</option>
                                <option value="MOUSE PAD">MOUSE PAD</option>
                                <option value="HEADSET">HEADSET</option>
                                <option value="SPEAKERS">SPEAKERS</option>
                                <option value="UPS">UPS</option>
                                <option value="TABLES">TABLES</option>
                                <option value="THERMAL PASTE">THERMAL PASTE</option>
                                <option value="COOLING AND LIGHTING">COOLING AND LIGHTING</option>
                                <option value="COMMERCIAL SOLUTIONS">COMMERCIAL SOLUTIONS</option>
                                <option value="COOLING & LIGHTING">COOLING & LIGHTING</option>
                                <option value="STORAGE & NAS">STORAGE & NAS</option>
                                <option value="MONITORS & ACCESSORIES">MONITORS & ACCESSORIES</option>
                                <option value="OPTICAL DRIVERS & PRINTERS">OPTICAL DRIVERS & PRINTERS</option>
                                <option value="SPEAKERS & HEADPHONES">SPEAKERS & HEADPHONES</option>
                                <option value="KEYBOARDS, MOUSE & GAMEPADS">KEYBOARDS, MOUSE & GAMEPADS</option>
                                <option value="GRAPHICS TABLET / TAB">GRAPHICS TABLET / TAB</option>
                                <option value="DESKTOP WORKSTATIONS">DESKTOP WORKSTATIONS</option>
                                <option value="GAMING DESKTOPS">GAMING DESKTOPS</option>
                                <option value="BUDGET DESKTOP COMPUTERS">BUDGET DESKTOP COMPUTERS</option>
                                <option value="CHAIRS">CHAIRS</option>
                                <option value="CABLES">CABLES</option>
                                <option value="LIVE STREAMING & RECORDING">LIVE STREAMING & RECORDING</option>
                                <option value="EXPANSION CARDS & NETWORKING">EXPANSION CARDS & NETWORKING</option>
                                <option value="GIFT VOUCHER">GIFT VOUCHER</option>
                            </select>
                        </div>
                    </fieldset><br/>

                    <fieldset class="tags">
                        <div class="body-title">Select Tags Type</div>
                        <div class="select flex-grow">
                            <select id="tags" name="tags" onchange="toggleDealDates()">
                                <option value="">Select a Tags</option>
                                <option value="New Arrivals">New Arrivals</option>
                                <option value="Top Rated">Top Rated</option>
                                <option value="Featured">Featured</option>
                                <option value="DEAL OF THE DAYS">DEAL OF THE DAYS</option>
                                <option value="None">None</option>
                            </select>
                        </div>
                    </fieldset><br/>

                    <!-- Deal Start Date (Initially hidden) -->
                    <fieldset class="deal_start" id="deal_start_field" style="display: none;">
                        <div class="body-title mb-10">Deal Start Date</div>
                        <input class="mb-10" type="datetime-local" name="deal_start" id="deal_start">
                    </fieldset>

                    <!-- Deal End Date (Initially hidden) -->
                    <fieldset class="deal_end" id="deal_end_field" style="display: none;">
                        <div class="body-title mb-10">Deal End Date</div>
                        <input class="mb-10" type="datetime-local" name="deal_end" id="deal_end">
                    </fieldset>

                    <!-- Description -->
                    <br/>
                    <fieldset class="description">
                        <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
                        <div id="editor" class="mb-10 border rounded-lg p-2" style="min-height: 200px;"></div>
                        <textarea name="description" id="description" style="display: none;"></textarea>
                    </fieldset>

                    <!-- Prices -->
                    <fieldset class="discounted_price">
                        <div class="body-title mb-10">Discounted Price <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="number" step="0.1" placeholder="Enter Discounted Price" name="discounted_price" required>
                    </fieldset>

                    <fieldset class="retail_price">
                        <div class="body-title mb-10">Retail Price <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="number" step="0.1" placeholder="Enter Retail Price" name="retail_price" required>
                    </fieldset>

                    <!-- Warranty -->
                    <fieldset class="warranty">
                        <div class="body-title">Select Warranty</div>
                        <div class="select flex-grow">
                            <select id="warranty" name="warranty">
                                <option value="">Select a Warranty</option>
                                <option value="1 year Warranty">1 year Warranty</option>
                                <option value="2 year Warranty">2 year Warranty</option>
                                <option value="3 year Warranty">3 year Warranty</option>
                                <option value="6 months warranty">6 months warranty</option>
                                <option value="3 months warranty">3 months warranty</option>
                                <option value="1 months warranty">1 months warranty</option>
                            </select>
                        </div>
                    </fieldset><br/>

                    <!-- Stock Status -->
                    <fieldset class="in_stock">
                        <div class="body-title">Stock Status</div>
                        <div class="select flex-grow">
                            <select id="in_stock" name="in_stock">
                                <option value="">Select a Status</option>
                                <option value="In Stock">In Stock</option>
                                <option value="Out of Stock">Out of Stock</option>
                                <option value="Used">Used</option>
                            </select>
                        </div>
                    </fieldset><br/>

                    <!-- Quantity -->
                    <fieldset class="qty">
                        <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="number" step="1" placeholder="Enter Quantity" name="qty" required>
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
                        <button class="tf-button w208" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('layouts.footer')
</div>

<!-- Quill CSS -->
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">

<!-- Quill JS -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

<script>
    // Initialize Quill editor
    const quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                ['link'],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'align': [] }],
                ['clean']
            ]
        },
        placeholder: 'Enter Description'
    });

    // Sync Quill content with hidden textarea before form submission
    const form = document.getElementById('addItemForm');
    const descriptionTextarea = document.getElementById('description');
    form.addEventListener('submit', () => {
        descriptionTextarea.value = quill.root.innerHTML;
    });
</script>

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

<script>
    function toggleDealDates() {
        var selectedTag = document.getElementById("tags").value;
        var dealStartField = document.getElementById("deal_start_field");
        var dealEndField = document.getElementById("deal_end_field");

        // Show the Deal Start and End Date fields only if 'DEAL OF THE DAYS' is selected
        if (selectedTag === "DEAL OF THE DAYS") {
            dealStartField.style.display = "block";
            dealEndField.style.display = "block";
        } else {
            dealStartField.style.display = "none";
            dealEndField.style.display = "none";
        }
    }
</script>
