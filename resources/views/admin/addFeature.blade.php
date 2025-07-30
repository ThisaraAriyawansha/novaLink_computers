
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
                                    <h3>Add a Feature</h3>
                                </div>
                                <!-- new-category -->
                                <div class="wg-box">
                                <form id="addItemForm" class="form-new-product form-style-1" method="POST" enctype="multipart/form-data" action="{{ route('storeFeature') }}">                            
                                        @csrf

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

                                        <h5>Add Feature</h5>
                                        <fieldset class="category">
                                            <div class="body-title">Select Product</div>
                                            <div class="select flex-grow">
                                                <select class="select2 form-control dark-mode-input" id="productid" name="productid">
                                                    <option value="">Select a Product</option>
                                                    @foreach($product as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </fieldset>

                                        <fieldset class="name">
                                            <div class="body-title mb-10">Feature Name <span class="tf-color-1">*</span></div>
                                            <input class="mb-10" type="text" placeholder="Enter Feature Name" name="name" required>
                                        </fieldset>

                                        <!-- Brand -->
                                        <fieldset class="value">
                                            <div class="body-title mb-10">Feature Value<span class="tf-color-1">*</span></div>
                                            <input class="mb-10" type="text" placeholder="Feature Value" name="value" required>
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




<!-- Initialize Select2 -->
<script>
    $(document).ready(function() {
        $('#productid').select2({
            placeholder: "Select a Product",
            allowClear: true
        });
    });
</script>