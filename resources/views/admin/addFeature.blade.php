
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

    .main-content {
        min-height: 77vh;
    }
</style>
                    <!-- main-content -->
                    <div class="main-content">
                        <!-- main-content-wrap -->
                        <div class="main-content-inner">
                            <!-- main-content-wrap -->
                            <div class="main-content-wrap">
                                <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                                </div>
                                <!-- new-category -->
                                <div class="wg-box">
                                <div class="admin-header">
                                <h3 class="text-xl font-semibold" style=" font-size: 18px; font-family: 'Orbitron', sans-serif;">Add a Feature</h3>
                                    <div class="last-updated">
                                        Last updated: {{ now()->format('M j, Y g:i A') }}
                                    </div>
                                </div>
                                <form id="addItemForm" class="form-new-product form-style-1" method="POST" enctype="multipart/form-data" action="{{ route('storeFeature') }}">                            
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
                                                    Add Feature
                                                </button>
                                                        </div>
                                    </form>
                                </div>
                                <!-- /new-category -->
                            </div>
                            <!-- /main-content-wrap -->
                        </div>
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