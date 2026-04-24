@include('layouts.header')

<style>
    /* Transparent Background */
    .modal-content {
        background: transparent; /* Semi-transparent white */
        border-radius: 15px; /* Rounded corners */
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Soft shadow */
        backdrop-filter: blur(10px); /* Blur effect */
    }

    /* Centered Modal Title */
    .modal-title {
        font-weight: bold;
        font-size: 1.2rem;
    }

    /* Custom Close Button */
    .btn-close {
        background-color: white;
        border-radius: 50%;
        padding: 5px;
        opacity: 0.7;
    }
    .btn-close:hover {
        opacity: 1;
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

        /* Override theme's 72px fixed width so dropdowns span full width */
        .form-new-product .select,
        .form-new-product .select select {
            width: 100%;
        }

        /* Hide the theme's custom caret inside form — Select2 provides its own */
        .form-new-product .select::after { display: none; }

        /* Select2 tweaks to match existing form styling */
        .form-new-product .select2-container { width: 100% !important; }
        .form-new-product .select2-selection--single {
            height: auto !important;
            padding: 12px 22px;
            border: 1px solid var(--Input, #e2e8f0) !important;
            border-radius: 12px !important;
        }
        .form-new-product .select2-selection__rendered {
            padding: 0 !important;
            line-height: 20px !important;
            color: var(--Heading, #2B2B2B) !important;
            font-size: 14px !important;
        }
        .form-new-product .select2-selection__arrow { top: 50% !important; right: 10px !important; transform: translateY(-50%); }

</style>

<div class="main-content">
    <div class="main-content-inner">
        <div class="main-content-wrap">


            <div class="wg-box p-6 rounded-lg shadow">
                <div class="admin-header">
                    <h3 class="text-xl font-semibold" style=" font-size: 18px; font-family: 'Orbitron', sans-serif;">Edit Product</h3>
                        <div class="last-updated">
                            Last updated: {{ now()->format('M j, Y g:i A') }}
                        </div>
                </div>
                <form id="addItemForm" class="form-new-product space-y-5" method="POST" enctype="multipart/form-data" action="{{ route('updateProduct', $product->id) }}">
                    @csrf
                    @method('PUT')

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


                    <!-- Product Name -->
                    <fieldset class="name">
                        <div class="body-title mb-10">Product Name <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter Product Name" name="name" value="{{ $product->name }}" required>
                    </fieldset>

                    <!-- Brand -->
                    <fieldset class="brand">
                        <div class="body-title mb-10">Brand Name <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="text" placeholder="Enter Brand Name" name="brand" value="{{ $product->brand }}" required>
                    </fieldset>

                    <!-- Type -->
                    <fieldset class="type">
                        <div class="body-title">Select Type</div>
                        <div class="select flex-grow">
                            <select id="type" name="type">
                                <option value="">Select a Type</option>
                                <option value="LAPTOPS" {{ $product->type == 'LAPTOPS' ? 'selected' : '' }}>LAPTOPS</option>
                                <option value="ASUS ROG" {{ $product->type == 'ASUS ROG' ? 'selected' : '' }}>ASUS ROG</option>
                                <option value="APPLE PRODUCTS" {{ $product->type == 'APPLE PRODUCTS' ? 'selected' : '' }}>APPLE PRODUCTS</option>
                                <option value="GAMING CONSOLE" {{ $product->type == 'GAMING CONSOLE' ? 'selected' : '' }}>GAMING CONSOLE</option>
                                <option value="PROCESSOR" {{ $product->type == 'PROCESSOR' ? 'selected' : '' }}>PROCESSOR</option>
                                <option value="MOTHERBOARD" {{ $product->type == 'MOTHERBOARD' ? 'selected' : '' }}>MOTHERBOARD</option>
                                <option value="RAM" {{ $product->type == 'RAM' ? 'selected' : '' }}>RAM</option>
                                <option value="GRAPHIC CARDS" {{ $product->type == 'GRAPHIC CARDS' ? 'selected' : '' }}>GRAPHIC CARDS</option>
                                <option value="CASINGS" {{ $product->type == 'CASINGS' ? 'selected' : '' }}>CASINGS</option>
                                <option value="POWER SUPPLY" {{ $product->type == 'POWER SUPPLY' ? 'selected' : '' }}>POWER SUPPLY</option>
                                <option value="SSD NVME" {{ $product->type == 'SSD NVME' ? 'selected' : '' }}>SSD NVME</option>
                                <option value="HARD DISK" {{ $product->type == 'HARD DISK' ? 'selected' : '' }}>HARD DISK</option>
                                <option value="FANS" {{ $product->type == 'FANS' ? 'selected' : '' }}>FANS</option>
                                <option value="MONITORS" {{ $product->type == 'MONITORS' ? 'selected' : '' }}>MONITORS</option>
                                <option value="ANTIVIRUS SOFTWARE" {{ $product->type == 'ANTIVIRUS SOFTWARE' ? 'selected' : '' }}>ANTIVIRUS SOFTWARE</option>
                                <option value="KEYBOARDS" {{ $product->type == 'KEYBOARDS' ? 'selected' : '' }}>KEYBOARDS</option>
                                <option value="MOUSE" {{ $product->type == 'MOUSE' ? 'selected' : '' }}>MOUSE</option>
                                <option value="MOUSE PAD" {{ $product->type == 'MOUSE PAD' ? 'selected' : '' }}>MOUSE PAD</option>
                                <option value="HEADSET" {{ $product->type == 'HEADSET' ? 'selected' : '' }}>HEADSET</option>
                                <option value="SPEAKERS" {{ $product->type == 'SPEAKERS' ? 'selected' : '' }}>SPEAKERS</option>
                                <option value="UPS" {{ $product->type == 'UPS' ? 'selected' : '' }}>UPS</option>
                                <option value="TABLES" {{ $product->type == 'TABLES' ? 'selected' : '' }}>TABLES</option>
                                <option value="THERMAL PASTE" {{ $product->type == 'THERMAL PASTE' ? 'selected' : '' }}>THERMAL PASTE</option>
                                <option value="COOLING & LIGHTING" {{ $product->type == 'COOLING & LIGHTING' ? 'selected' : '' }}>COOLING & LIGHTING</option>
                                <option value="COMMERCIAL SOLUTIONS" {{ $product->type == 'COMMERCIAL SOLUTIONS' ? 'selected' : '' }}>COMMERCIAL SOLUTIONS</option>
                                <option value="STORAGE & NAS" {{ $product->type == 'STORAGE & NAS' ? 'selected' : '' }}>STORAGE & NAS</option>
                                <option value="MONITORS & ACCESSORIES" {{ $product->type == 'MONITORS & ACCESSORIES' ? 'selected' : '' }}>MONITORS & ACCESSORIES</option>
                                <option value="OPTICAL DRIVERS & PRINTERS" {{ $product->type == 'OPTICAL DRIVERS & PRINTERS' ? 'selected' : '' }}>OPTICAL DRIVERS & PRINTERS</option>
                                <option value="SPEAKERS & HEADPHONES" {{ $product->type == 'SPEAKERS & HEADPHONES' ? 'selected' : '' }}>SPEAKERS & HEADPHONES</option>
                                <option value="KEYBOARDS, MOUSE & GAMEPADS" {{ $product->type == 'KEYBOARDS, MOUSE & GAMEPADS' ? 'selected' : '' }}>KEYBOARDS, MOUSE & GAMEPADS</option>
                                <option value="GRAPHICS TABLET / TAB" {{ $product->type == 'GRAPHICS TABLET / TAB' ? 'selected' : '' }}>GRAPHICS TABLET / TAB</option>
                                <option value="DESKTOP WORKSTATIONS" {{ $product->type == 'DESKTOP WORKSTATIONS' ? 'selected' : '' }}>DESKTOP WORKSTATIONS</option>
                                <option value="GAMING DESKTOPS" {{ $product->type == 'GAMING DESKTOPS' ? 'selected' : '' }}>GAMING DESKTOPS</option>
                                <option value="BUDGET DESKTOP COMPUTERS" {{ $product->type == 'BUDGET DESKTOP COMPUTERS' ? 'selected' : '' }}>BUDGET DESKTOP COMPUTERS</option>
                                <option value="CHAIRS" {{ $product->type == 'CHAIRS' ? 'selected' : '' }}>CHAIRS</option>
                                <option value="CABLES" {{ $product->type == 'CABLES' ? 'selected' : '' }}>CABLES</option>
                                <option value="LIVE STREAMING & RECORDING" {{ $product->type == 'LIVE STREAMING & RECORDING' ? 'selected' : '' }}>LIVE STREAMING & RECORDING</option>
                                <option value="EXPANSION CARDS & NETWORKING" {{ $product->type == 'EXPANSION CARDS & NETWORKING' ? 'selected' : '' }}>EXPANSION CARDS & NETWORKING</option>
                                <option value="GIFT VOUCHER" {{ $product->type == 'GIFT VOUCHER' ? 'selected' : '' }}>GIFT VOUCHER</option>
                            </select>
                        </div>
                    </fieldset><br/>

                    <!-- ===== PC COMPONENT SPECIFICATIONS (dynamic, pre-filled from existing features) ===== -->
                    @php
                        $s = $existingSpecs ?? [];
                        $pcSpecTypes = ['PROCESSOR','MOTHERBOARD','RAM','GRAPHIC CARDS','POWER SUPPLY','SSD NVME','HARD DISK','STORAGE & NAS','CASINGS','COOLING & LIGHTING','FANS'];
                        $showSpecs = in_array($product->type, $pcSpecTypes);
                    @endphp
                    <div id="pc-specs-section" style="{{ $showSpecs ? 'display:block' : 'display:none' }}; border:1px solid #e2e8f0; border-radius:8px; padding:20px; background:#f8fafc; margin-bottom:10px;">
                        <div class="body-title">
                            PC Component Specifications
                        </div>

                        <!-- PROCESSOR -->
                        <div id="spec-PROCESSOR" class="spec-group" style="{{ $product->type === 'PROCESSOR' ? 'display:block' : 'display:none' }}">
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                                <fieldset>
                                    <div class="body-title mb-10">CPU Socket Type</div>
                                    <div class="select flex-grow">
                                        <select name="specs[socket_type]">
                                            <option value="">Select Socket</option>
                                            @foreach(['LGA1700'=>'LGA1700 (Intel 12th/13th/14th Gen)','LGA1851'=>'LGA1851 (Intel Core Ultra 200)','AM5'=>'AM5 (AMD Ryzen 7000/9000)','AM4'=>'AM4 (AMD Ryzen 5000 & older)','TR5'=>'TR5 (AMD Threadripper)'] as $v=>$l)
                                            <option value="{{ $v }}" {{ ($s['socket_type'] ?? '') === $v ? 'selected' : '' }}>{{ $l }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Compatible RAM Type</div>
                                    <div class="select flex-grow">
                                        <select name="specs[compatible_ram_type]">
                                            <option value="">Select RAM Type</option>
                                            @foreach(['DDR4','DDR5','DDR4/DDR5'] as $v)
                                            <option value="{{ $v }}" {{ ($s['compatible_ram_type'] ?? '') === $v ? 'selected' : '' }}>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Cores</div>
                                    <input type="number" name="specs[cores]" min="1" placeholder="e.g. 8" value="{{ $s['cores'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Threads</div>
                                    <input type="number" name="specs[threads]" min="1" placeholder="e.g. 16" value="{{ $s['threads'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Base Clock (GHz)</div>
                                    <input type="number" step="0.1" name="specs[base_clock_ghz]" placeholder="e.g. 3.4" value="{{ $s['base_clock_ghz'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Boost Clock (GHz)</div>
                                    <input type="number" step="0.1" name="specs[boost_clock_ghz]" placeholder="e.g. 5.2" value="{{ $s['boost_clock_ghz'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Power Consumption / TDP (Watts)</div>
                                    <input type="number" name="specs[power_consumption]" min="1" placeholder="e.g. 65" value="{{ $s['power_consumption'] ?? '' }}">
                                </fieldset>
                            </div>
                        </div>

                        <!-- MOTHERBOARD -->
                        <div id="spec-MOTHERBOARD" class="spec-group" style="{{ $product->type === 'MOTHERBOARD' ? 'display:block' : 'display:none' }}">
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                                <fieldset>
                                    <div class="body-title mb-10">CPU Socket Type</div>
                                    <div class="select flex-grow">
                                        <select name="specs[socket_type]">
                                            <option value="">Select Socket</option>
                                            @foreach(['LGA1700'=>'LGA1700 (Intel 12th/13th/14th Gen)','LGA1851'=>'LGA1851 (Intel Core Ultra 200)','AM5'=>'AM5 (AMD Ryzen 7000/9000)','AM4'=>'AM4 (AMD Ryzen 5000 & older)','TR5'=>'TR5 (AMD Threadripper)'] as $v=>$l)
                                            <option value="{{ $v }}" {{ ($s['socket_type'] ?? '') === $v ? 'selected' : '' }}>{{ $l }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Form Factor</div>
                                    <div class="select flex-grow">
                                        <select name="specs[form_factor]">
                                            <option value="">Select Form Factor</option>
                                            @foreach(['ATX','mATX','E-ATX','Mini-ITX'] as $v)
                                            <option value="{{ $v }}" {{ ($s['form_factor'] ?? '') === $v ? 'selected' : '' }}>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Supported RAM Type</div>
                                    <div class="select flex-grow">
                                        <select name="specs[supported_ram_type]">
                                            <option value="">Select RAM Type</option>
                                            @foreach(['DDR4','DDR5'] as $v)
                                            <option value="{{ $v }}" {{ ($s['supported_ram_type'] ?? '') === $v ? 'selected' : '' }}>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">RAM Slots</div>
                                    <input type="number" name="specs[ram_slots]" min="1" max="8" placeholder="e.g. 4" value="{{ $s['ram_slots'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Max RAM (GB)</div>
                                    <input type="number" name="specs[max_ram_gb]" placeholder="e.g. 128" value="{{ $s['max_ram_gb'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Supported RAM Speed (MHz)</div>
                                    <input type="text" name="specs[supported_ram_speed]" placeholder="e.g. 3200, 4800, 5600" value="{{ $s['supported_ram_speed'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">M.2 NVMe Slots</div>
                                    <input type="number" name="specs[m2_slots]" min="0" placeholder="e.g. 2" value="{{ $s['m2_slots'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">SATA Ports</div>
                                    <input type="number" name="specs[sata_ports]" min="0" placeholder="e.g. 6" value="{{ $s['sata_ports'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">USB-A Ports (Rear)</div>
                                    <input type="number" name="specs[usb_a_ports]" min="0" placeholder="e.g. 4" value="{{ $s['usb_a_ports'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">USB-C Ports (Rear)</div>
                                    <input type="number" name="specs[usb_c_ports]" min="0" placeholder="e.g. 1" value="{{ $s['usb_c_ports'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">PCIe x16 Slots</div>
                                    <input type="number" name="specs[pcie_x16_slots]" min="0" placeholder="e.g. 1" value="{{ $s['pcie_x16_slots'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Has Onboard Wi-Fi</div>
                                    <div class="select flex-grow">
                                        <select name="specs[wifi]">
                                            <option value="">Select</option>
                                            <option value="Yes" {{ ($s['wifi'] ?? '') === 'Yes' ? 'selected' : '' }}>Yes</option>
                                            <option value="No" {{ ($s['wifi'] ?? '') === 'No' ? 'selected' : '' }}>No</option>
                                        </select>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <!-- RAM -->
                        <div id="spec-RAM" class="spec-group" style="{{ $product->type === 'RAM' ? 'display:block' : 'display:none' }}">
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                                <fieldset>
                                    <div class="body-title mb-10">RAM Type</div>
                                    <div class="select flex-grow">
                                        <select name="specs[ram_type]">
                                            <option value="">Select Type</option>
                                            @foreach(['DDR4','DDR5'] as $v)
                                            <option value="{{ $v }}" {{ ($s['ram_type'] ?? '') === $v ? 'selected' : '' }}>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Speed (MHz)</div>
                                    <input type="number" name="specs[speed_mhz]" placeholder="e.g. 3200" value="{{ $s['speed_mhz'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Capacity per Stick (GB)</div>
                                    <input type="number" name="specs[capacity_gb]" placeholder="e.g. 16" value="{{ $s['capacity_gb'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Number of Sticks</div>
                                    <input type="number" name="specs[sticks_count]" min="1" max="4" placeholder="e.g. 2" value="{{ $s['sticks_count'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Power Consumption (Watts)</div>
                                    <input type="number" name="specs[power_consumption]" min="1" placeholder="e.g. 5" value="{{ $s['power_consumption'] ?? '' }}">
                                </fieldset>
                            </div>
                        </div>

                        <!-- GRAPHIC CARDS -->
                        <div id="spec-GRAPHIC_CARDS" class="spec-group" style="{{ $product->type === 'GRAPHIC CARDS' ? 'display:block' : 'display:none' }}">
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                                <fieldset>
                                    <div class="body-title mb-10">VRAM (GB)</div>
                                    <input type="number" name="specs[vram_gb]" placeholder="e.g. 8" value="{{ $s['vram_gb'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Power Consumption / TDP (Watts)</div>
                                    <input type="number" name="specs[power_consumption]" placeholder="e.g. 200" value="{{ $s['power_consumption'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Power Connector</div>
                                    <div class="select flex-grow">
                                        <select name="specs[power_connector]">
                                            <option value="">Select</option>
                                            @foreach(['No external','1x 8-pin','2x 8-pin','3x 8-pin','1x 16-pin'] as $v)
                                            <option value="{{ $v }}" {{ ($s['power_connector'] ?? '') === $v ? 'selected' : '' }}>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">HDMI Ports</div>
                                    <input type="number" name="specs[hdmi_ports]" min="0" placeholder="e.g. 1" value="{{ $s['hdmi_ports'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">DisplayPort Ports</div>
                                    <input type="number" name="specs[displayport_ports]" min="0" placeholder="e.g. 3" value="{{ $s['displayport_ports'] ?? '' }}">
                                </fieldset>
                            </div>
                        </div>

                        <!-- POWER SUPPLY -->
                        <div id="spec-POWER_SUPPLY" class="spec-group" style="{{ $product->type === 'POWER SUPPLY' ? 'display:block' : 'display:none' }}">
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                                <fieldset>
                                    <div class="body-title mb-10">Wattage (W)</div>
                                    <input type="number" name="specs[wattage_w]" placeholder="e.g. 750" value="{{ $s['wattage_w'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Efficiency Rating</div>
                                    <div class="select flex-grow">
                                        <select name="specs[efficiency_rating]">
                                            <option value="">Select Rating</option>
                                            @foreach(['80+ White','80+ Bronze','80+ Silver','80+ Gold','80+ Platinum','80+ Titanium'] as $v)
                                            <option value="{{ $v }}" {{ ($s['efficiency_rating'] ?? '') === $v ? 'selected' : '' }}>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Form Factor</div>
                                    <div class="select flex-grow">
                                        <select name="specs[psu_form_factor]">
                                            <option value="">Select</option>
                                            @foreach(['ATX','SFX','SFX-L'] as $v)
                                            <option value="{{ $v }}" {{ ($s['psu_form_factor'] ?? '') === $v ? 'selected' : '' }}>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Modular</div>
                                    <div class="select flex-grow">
                                        <select name="specs[modular]">
                                            <option value="">Select</option>
                                            @foreach(['Non-Modular','Semi-Modular','Fully Modular'] as $v)
                                            <option value="{{ $v }}" {{ ($s['modular'] ?? '') === $v ? 'selected' : '' }}>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <!-- STORAGE -->
                        <div id="spec-STORAGE" class="spec-group" style="{{ in_array($product->type, ['SSD NVME','HARD DISK','STORAGE & NAS']) ? 'display:block' : 'display:none' }}">
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                                <fieldset>
                                    <div class="body-title mb-10">Storage Type</div>
                                    <div class="select flex-grow">
                                        <select name="specs[storage_type]">
                                            <option value="">Select Type</option>
                                            @foreach(['NVMe PCIe 4.0','NVMe PCIe 3.0','SATA SSD','HDD 7200 RPM','HDD 5400 RPM','NAS Drive'] as $v)
                                            <option value="{{ $v }}" {{ ($s['storage_type'] ?? '') === $v ? 'selected' : '' }}>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Capacity</div>
                                    <input type="text" name="specs[capacity]" placeholder="e.g. 1TB, 500GB" value="{{ $s['capacity'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Interface</div>
                                    <div class="select flex-grow">
                                        <select name="specs[interface]">
                                            <option value="">Select</option>
                                            @foreach(['M.2 NVMe','M.2 SATA','2.5 SATA','3.5 SATA'] as $v)
                                            <option value="{{ $v }}" {{ ($s['interface'] ?? '') === $v ? 'selected' : '' }}>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Power Consumption (Watts)</div>
                                    <input type="number" name="specs[power_consumption]" placeholder="e.g. 5" value="{{ $s['power_consumption'] ?? '' }}">
                                </fieldset>
                            </div>
                        </div>

                        <!-- CASINGS -->
                        <div id="spec-CASINGS" class="spec-group" style="{{ $product->type === 'CASINGS' ? 'display:block' : 'display:none' }}">
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                                <fieldset>
                                    <div class="body-title mb-10">Supported Motherboard Form Factor</div>
                                    <div class="select flex-grow">
                                        <select name="specs[form_factor_support]">
                                            <option value="">Select</option>
                                            @foreach(['Mini-ITX'=>'Mini-ITX only','mATX'=>'mATX & Mini-ITX','ATX'=>'ATX, mATX & Mini-ITX','E-ATX'=>'E-ATX, ATX, mATX & Mini-ITX'] as $v=>$l)
                                            <option value="{{ $v }}" {{ ($s['form_factor_support'] ?? '') === $v ? 'selected' : '' }}>{{ $l }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Drive Bays</div>
                                    <input type="text" name="specs[drive_bays]" placeholder="e.g. 2x 3.5, 2x 2.5" value="{{ $s['drive_bays'] ?? '' }}">
                                </fieldset>
                            </div>
                        </div>

                        <!-- COOLING & LIGHTING / FANS -->
                        <div id="spec-COOLING" class="spec-group" style="{{ in_array($product->type, ['COOLING & LIGHTING','FANS']) ? 'display:block' : 'display:none' }}">
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                                <fieldset>
                                    <div class="body-title mb-10">Cooler Type</div>
                                    <div class="select flex-grow">
                                        <select name="specs[cooler_type]">
                                            <option value="">Select Type</option>
                                            @foreach(['Air Tower','Low-Profile Air','AIO 120mm','AIO 240mm','AIO 280mm','AIO 360mm','Case Fan'] as $v)
                                            <option value="{{ $v }}" {{ ($s['cooler_type'] ?? '') === $v ? 'selected' : '' }}>{{ $v }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Socket Compatibility (comma separated)</div>
                                    <input type="text" name="specs[socket_compatibility]" placeholder="e.g. LGA1700, AM5, AM4" value="{{ $s['socket_compatibility'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Max TDP Support (Watts)</div>
                                    <input type="number" name="specs[max_tdp_support]" placeholder="e.g. 250" value="{{ $s['max_tdp_support'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Fan Count</div>
                                    <input type="number" name="specs[fan_count]" min="1" placeholder="e.g. 3" value="{{ $s['fan_count'] ?? '' }}">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Power Consumption (Watts)</div>
                                    <input type="number" name="specs[power_consumption]" placeholder="e.g. 10" value="{{ $s['power_consumption'] ?? '' }}">
                                </fieldset>
                            </div>
                        </div>

                    </div><!-- end pc-specs-section -->

                    <!-- Tags -->
                    <fieldset class="tags">
                        <div class="body-title">Select Tags Type</div>
                        <div class="select flex-grow">
                            <select id="tags" name="tags" onchange="toggleDealDates()">
                                <option value="">Select a Tags</option>
                                <option value="New Arrivals" {{ $product->tags == 'New Arrivals' ? 'selected' : '' }}>New Arrivals</option>
                                <option value="Top Rated" {{ $product->tags == 'Top Rated' ? 'selected' : '' }}>Top Rated</option>
                                <option value="Featured" {{ $product->tags == 'Featured' ? 'selected' : '' }}>Featured</option>
                                <option value="DEAL OF THE DAYS" {{ $product->tags == 'DEAL OF THE DAYS' ? 'selected' : '' }}>DEAL OF THE DAYS</option>
                                <option value="None" {{ $product->tags == 'None' ? 'selected' : '' }}>None</option>
                            </select>
                        </div>
                    </fieldset><br/>

                    <!-- Deal Start Date (Initially hidden) -->
                    <fieldset class="deal_start" id="deal_start_field" style="{{ $product->tags == 'DEAL OF THE DAYS' ? 'display: block;' : 'display: none;' }}">
                        <div class="body-title mb-10">Deal Start Date</div>
                        <input class="mb-10" type="datetime-local" name="deal_start" id="deal_start" value="{{ $product->deal_start ? \Carbon\Carbon::parse($product->deal_start)->format('Y-m-d\TH:i') : '' }}">
                    </fieldset>

                    <!-- Deal End Date (Initially hidden) -->
                    <fieldset class="deal_end" id="deal_end_field" style="{{ $product->tags == 'DEAL OF THE DAYS' ? 'display: block;' : 'display: none;' }}">
                        <div class="body-title mb-10">Deal End Date</div>
                        <input class="mb-10" type="datetime-local" name="deal_end" id="deal_end" value="{{ $product->deal_end ? \Carbon\Carbon::parse($product->deal_end)->format('Y-m-d\TH:i') : '' }}">
                    </fieldset>

                    <!-- Description -->
                    <fieldset class="description">
                        <div class="body-title mb-10">Description <span class="tf-color-1">*</span></div>
                        <div id="editor" class="mb-10 border rounded-lg p-2" style="min-height: 200px;">{!! $product->description !!}</div>
                        <textarea name="description" id="description" style="display: none;">{!! $product->description !!}</textarea>
                    </fieldset>

                    <!-- Prices -->
                    <fieldset class="discounted_price">
                        <div class="body-title mb-10">Discounted Price <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="number" step="0.1" placeholder="Enter Discounted Price" name="discounted_price" value="{{ $product->discounted_price }}" required>
                    </fieldset>

                    <fieldset class="retail_price">
                        <div class="body-title mb-10">Retail Price <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="number" step="0.1" placeholder="Enter Retail Price" name="retail_price" value="{{ $product->retail_price }}" required>
                    </fieldset>

                    <!-- Warranty -->
                    <fieldset class="warranty">
                        <div class="body-title">Select Warranty</div>
                        <div class="select flex-grow">
                            <select id="warranty" name="warranty">
                                <option value="">Select a Warranty</option>
                                <option value="1 year Warranty" {{ $product->warranty == '1 year Warranty' ? 'selected' : '' }}>1 year Warranty</option>
                                <option value="2 year Warranty" {{ $product->warranty == '2 year Warranty' ? 'selected' : '' }}>2 year Warranty</option>
                                <option value="3 year Warranty" {{ $product->warranty == '3 year Warranty' ? 'selected' : '' }}>3 year Warranty</option>
                                <option value="6 months warranty" {{ $product->warranty == '6 months warranty' ? 'selected' : '' }}>6 months warranty</option>
                                <option value="3 months warranty" {{ $product->warranty == '3 months warranty' ? 'selected' : '' }}>3 months warranty</option>
                                <option value="1 months warranty" {{ $product->warranty == '1 months warranty' ? 'selected' : '' }}>1 months warranty</option>
                            </select>
                        </div>
                    </fieldset><br/>

                    <!-- Stock Status -->
                    <fieldset class="in_stock">
                        <div class="body-title">Stock Status</div>
                        <div class="select flex-grow">
                            <select id="in_stock" name="in_stock">
                                <option value="">Select a Status</option>
                                <option value="In Stock" {{ $product->in_stock == 'In Stock' ? 'selected' : '' }}>In Stock</option>
                                <option value="Out of Stock" {{ $product->in_stock == 'Out of Stock' ? 'selected' : '' }}>Out of Stock</option>
                                <option value="Used" {{ $product->in_stock == 'Used' ? 'selected' : '' }}>Used</option>
                            </select>
                        </div>
                    </fieldset><br/>

                    <!-- Quantity -->
                    <fieldset class="qty">
                        <div class="body-title mb-10">Quantity <span class="tf-color-1">*</span></div>
                        <input class="mb-10" type="number" step="1" placeholder="Enter Quantity" name="qty" value="{{ $product->qty }}" required>
                    </fieldset>

                    <fieldset class="Image">
                        <div class="body-title mb-10">Current Image <span class="tf-color-1">*</span></div>
                    </fieldset>
                    <!-- Modern Image Viewer -->
                    <div class="form-group">
                        <br>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal">
                            <img src="{{ asset($product->image) }}" alt="Product Image" class="img-thumbnail" width="100">
                        </a>
                    </div><br/>

                    <!-- Bootstrap Modal for Full-Screen Image -->
                    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content custom-modal">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title w-100 text-center">Product Image</h5>
                                    <button type="button" class="btn-close position-absolute end-0 me-3" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img src="{{ asset($product->image) }}" alt="Product Image" class="img-fluid rounded-3">
                                </div>
                            </div>
                        </div>
                    </div>

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
                                    @if($product->image)
                                        <img src="{{ asset($product->image) }}" class="w-24 h-24 object-cover rounded-lg border p-1 shadow" alt="Product Image">
                                    @endif
                                </div>
                            </label>
                        </div>
                    </div>
                    </fieldset>
                    <br/>

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
                        Update Product
                    </button>


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

        // Disable inputs inside hidden spec groups so duplicate names don't overwrite active group values
        document.querySelectorAll('.spec-group').forEach(function(group) {
            if (group.style.display === 'none') {
                group.querySelectorAll('input, select').forEach(function(el) {
                    el.disabled = true;
                });
            }
        });
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

        if (selectedTag === "DEAL OF THE DAYS") {
            dealStartField.style.display = "block";
            dealEndField.style.display = "block";
        } else {
            dealStartField.style.display = "none";
            dealEndField.style.display = "none";
        }
    }

    window.onload = toggleDealDates;

    const specGroupMap = {
        'PROCESSOR':    'PROCESSOR',
        'MOTHERBOARD':  'MOTHERBOARD',
        'RAM':          'RAM',
        'GRAPHIC CARDS':'GRAPHIC_CARDS',
        'POWER SUPPLY': 'POWER_SUPPLY',
        'SSD NVME':     'STORAGE',
        'HARD DISK':    'STORAGE',
        'STORAGE & NAS':'STORAGE',
        'CASINGS':      'CASINGS',
        'COOLING & LIGHTING': 'COOLING',
        'FANS':         'COOLING',
    };

    document.getElementById('type').addEventListener('change', function() {
        const selectedType = this.value;
        const specSection = document.getElementById('pc-specs-section');
        const groupId = specGroupMap[selectedType];

        document.querySelectorAll('.spec-group').forEach(el => el.style.display = 'none');

        if (groupId) {
            specSection.style.display = 'block';
            const group = document.getElementById('spec-' + groupId);
            if (group) group.style.display = 'block';
        } else {
            specSection.style.display = 'none';
        }
    });
</script>

<!-- Select2 JS (CSS already loaded in header) -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.form-new-product select').select2({
            width: '100%',
            minimumResultsForSearch: Infinity
        });

        // Re-bind type change for Select2 (native change already handles spec groups)
        $('#type').on('change', function() {
            const selectedType = $(this).val();
            const specSection = document.getElementById('pc-specs-section');
            const map = {
                'PROCESSOR':'PROCESSOR','MOTHERBOARD':'MOTHERBOARD','RAM':'RAM',
                'GRAPHIC CARDS':'GRAPHIC_CARDS','POWER SUPPLY':'POWER_SUPPLY',
                'SSD NVME':'STORAGE','HARD DISK':'STORAGE','STORAGE & NAS':'STORAGE',
                'CASINGS':'CASINGS','COOLING & LIGHTING':'COOLING','FANS':'COOLING',
            };
            const groupId = map[selectedType];
            document.querySelectorAll('.spec-group').forEach(el => el.style.display = 'none');
            if (groupId) {
                specSection.style.display = 'block';
                const group = document.getElementById('spec-' + groupId);
                if (group) group.style.display = 'block';
            } else {
                specSection.style.display = 'none';
            }
        });

        $('#tags').on('change', function() { toggleDealDates(); });
    });
</script>
