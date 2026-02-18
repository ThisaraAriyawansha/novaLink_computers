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
                <h3 class="text-xl font-semibold" style=" font-size: 18px; font-family: 'Orbitron', sans-serif;">Add a New Product</h3>
                    <div class="last-updated">
                        Last updated: {{ now()->format('M j, Y g:i A') }}
                    </div>
                </div>


                <form id="addItemForm" class="form-new-product space-y-5" method="POST" enctype="multipart/form-data" action="{{ route('storeProduct') }}">
                    {{ csrf_field() }}

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

                    <!-- ===== PC COMPONENT SPECIFICATIONS (shown based on type) ===== -->
                    <div id="pc-specs-section" style="display:none; border:1px solid #e2e8f0; border-radius:8px; padding:20px; background:#f8fafc; margin-bottom:10px;">
                        <div class="body-title">
                            PC Component Specifications
                        </div>

                        <!-- PROCESSOR -->
                        <div id="spec-PROCESSOR" class="spec-group" style="display:none;">
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                                <fieldset>
                                    <div class="body-title mb-10">CPU Socket Type</div>
                                    <div class="select flex-grow">
                                        <select name="specs[socket_type]">
                                            <option value="">Select Socket</option>
                                            <option value="LGA1700">LGA1700 (Intel 12th/13th/14th Gen)</option>
                                            <option value="LGA1851">LGA1851 (Intel Core Ultra 200)</option>
                                            <option value="AM5">AM5 (AMD Ryzen 7000/9000)</option>
                                            <option value="AM4">AM4 (AMD Ryzen 5000 & older)</option>
                                            <option value="TR5">TR5 (AMD Threadripper)</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Compatible RAM Type</div>
                                    <div class="select flex-grow">
                                        <select name="specs[compatible_ram_type]">
                                            <option value="">Select RAM Type</option>
                                            <option value="DDR4">DDR4</option>
                                            <option value="DDR5">DDR5</option>
                                            <option value="DDR4/DDR5">DDR4 / DDR5</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Cores</div>
                                    <input type="number" name="specs[cores]" min="1" placeholder="e.g. 8">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Threads</div>
                                    <input type="number" name="specs[threads]" min="1" placeholder="e.g. 16">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Base Clock (GHz)</div>
                                    <input type="number" step="0.1" name="specs[base_clock_ghz]" placeholder="e.g. 3.4">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Boost Clock (GHz)</div>
                                    <input type="number" step="0.1" name="specs[boost_clock_ghz]" placeholder="e.g. 5.2">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Power Consumption / TDP (Watts)</div>
                                    <input type="number" name="specs[power_consumption]" min="1" placeholder="e.g. 65">
                                </fieldset>
                            </div>
                        </div>

                        <!-- MOTHERBOARD -->
                        <div id="spec-MOTHERBOARD" class="spec-group" style="display:none;">
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                                <fieldset>
                                    <div class="body-title mb-10">CPU Socket Type</div>
                                    <div class="select flex-grow">
                                        <select name="specs[socket_type]">
                                            <option value="">Select Socket</option>
                                            <option value="LGA1700">LGA1700 (Intel 12th/13th/14th Gen)</option>
                                            <option value="LGA1851">LGA1851 (Intel Core Ultra 200)</option>
                                            <option value="AM5">AM5 (AMD Ryzen 7000/9000)</option>
                                            <option value="AM4">AM4 (AMD Ryzen 5000 & older)</option>
                                            <option value="TR5">TR5 (AMD Threadripper)</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Form Factor</div>
                                    <div class="select flex-grow">
                                        <select name="specs[form_factor]">
                                            <option value="">Select Form Factor</option>
                                            <option value="ATX">ATX</option>
                                            <option value="mATX">Micro-ATX (mATX)</option>
                                            <option value="E-ATX">Extended ATX (E-ATX)</option>
                                            <option value="Mini-ITX">Mini-ITX</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Supported RAM Type</div>
                                    <div class="select flex-grow">
                                        <select name="specs[supported_ram_type]">
                                            <option value="">Select RAM Type</option>
                                            <option value="DDR4">DDR4</option>
                                            <option value="DDR5">DDR5</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">RAM Slots</div>
                                    <input type="number" name="specs[ram_slots]" min="1" max="8" placeholder="e.g. 4">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Max RAM (GB)</div>
                                    <input type="number" name="specs[max_ram_gb]" placeholder="e.g. 128">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Supported RAM Speed (MHz)</div>
                                    <input type="text" name="specs[supported_ram_speed]" placeholder="e.g. 3200, 4800, 5600">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">M.2 NVMe Slots</div>
                                    <input type="number" name="specs[m2_slots]" min="0" placeholder="e.g. 2">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">SATA Ports</div>
                                    <input type="number" name="specs[sata_ports]" min="0" placeholder="e.g. 6">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">USB-A Ports (Rear)</div>
                                    <input type="number" name="specs[usb_a_ports]" min="0" placeholder="e.g. 4">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">USB-C Ports (Rear)</div>
                                    <input type="number" name="specs[usb_c_ports]" min="0" placeholder="e.g. 1">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">PCIe x16 Slots</div>
                                    <input type="number" name="specs[pcie_x16_slots]" min="0" placeholder="e.g. 1">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Has Onboard Wi-Fi</div>
                                    <div class="select flex-grow">
                                        <select name="specs[wifi]">
                                            <option value="">Select</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <!-- RAM -->
                        <div id="spec-RAM" class="spec-group" style="display:none;">
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                                <fieldset>
                                    <div class="body-title mb-10">RAM Type</div>
                                    <div class="select flex-grow">
                                        <select name="specs[ram_type]">
                                            <option value="">Select Type</option>
                                            <option value="DDR4">DDR4</option>
                                            <option value="DDR5">DDR5</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Speed (MHz)</div>
                                    <input type="number" name="specs[speed_mhz]" placeholder="e.g. 3200">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Capacity per Stick (GB)</div>
                                    <input type="number" name="specs[capacity_gb]" placeholder="e.g. 16">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Number of Sticks</div>
                                    <input type="number" name="specs[sticks_count]" min="1" max="4" placeholder="e.g. 2">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Power Consumption (Watts)</div>
                                    <input type="number" name="specs[power_consumption]" min="1" placeholder="e.g. 5">
                                </fieldset>
                            </div>
                        </div>

                        <!-- GRAPHIC CARDS -->
                        <div id="spec-GRAPHIC_CARDS" class="spec-group" style="display:none;">
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                                <fieldset>
                                    <div class="body-title mb-10">VRAM (GB)</div>
                                    <input type="number" name="specs[vram_gb]" placeholder="e.g. 8">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Power Consumption / TDP (Watts)</div>
                                    <input type="number" name="specs[power_consumption]" placeholder="e.g. 200">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Power Connector</div>
                                    <div class="select flex-grow">
                                        <select name="specs[power_connector]">
                                            <option value="">Select</option>
                                            <option value="No external">No external power</option>
                                            <option value="1x 8-pin">1x 8-pin</option>
                                            <option value="2x 8-pin">2x 8-pin</option>
                                            <option value="3x 8-pin">3x 8-pin</option>
                                            <option value="1x 16-pin">1x 16-pin (PCIe 5.0)</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">HDMI Ports</div>
                                    <input type="number" name="specs[hdmi_ports]" min="0" placeholder="e.g. 1">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">DisplayPort Ports</div>
                                    <input type="number" name="specs[displayport_ports]" min="0" placeholder="e.g. 3">
                                </fieldset>
                            </div>
                        </div>

                        <!-- POWER SUPPLY -->
                        <div id="spec-POWER_SUPPLY" class="spec-group" style="display:none;">
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                                <fieldset>
                                    <div class="body-title mb-10">Wattage (W)</div>
                                    <input type="number" name="specs[wattage_w]" placeholder="e.g. 750">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Efficiency Rating</div>
                                    <div class="select flex-grow">
                                        <select name="specs[efficiency_rating]">
                                            <option value="">Select Rating</option>
                                            <option value="80+ White">80+ White</option>
                                            <option value="80+ Bronze">80+ Bronze</option>
                                            <option value="80+ Silver">80+ Silver</option>
                                            <option value="80+ Gold">80+ Gold</option>
                                            <option value="80+ Platinum">80+ Platinum</option>
                                            <option value="80+ Titanium">80+ Titanium</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Form Factor</div>
                                    <div class="select flex-grow">
                                        <select name="specs[psu_form_factor]">
                                            <option value="">Select</option>
                                            <option value="ATX">ATX</option>
                                            <option value="SFX">SFX</option>
                                            <option value="SFX-L">SFX-L</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Modular</div>
                                    <div class="select flex-grow">
                                        <select name="specs[modular]">
                                            <option value="">Select</option>
                                            <option value="Non-Modular">Non-Modular</option>
                                            <option value="Semi-Modular">Semi-Modular</option>
                                            <option value="Fully Modular">Fully Modular</option>
                                        </select>
                                    </div>
                                </fieldset>
                            </div>
                        </div>

                        <!-- STORAGE (SSD NVME, HARD DISK, STORAGE & NAS) -->
                        <div id="spec-STORAGE" class="spec-group" style="display:none;">
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                                <fieldset>
                                    <div class="body-title mb-10">Storage Type</div>
                                    <div class="select flex-grow">
                                        <select name="specs[storage_type]">
                                            <option value="">Select Type</option>
                                            <option value="NVMe PCIe 4.0">NVMe PCIe 4.0</option>
                                            <option value="NVMe PCIe 3.0">NVMe PCIe 3.0</option>
                                            <option value="SATA SSD">SATA SSD</option>
                                            <option value="HDD 7200 RPM">HDD 7200 RPM</option>
                                            <option value="HDD 5400 RPM">HDD 5400 RPM</option>
                                            <option value="NAS Drive">NAS Drive</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Capacity</div>
                                    <input type="text" name="specs[capacity]" placeholder="e.g. 1TB, 500GB">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Interface</div>
                                    <div class="select flex-grow">
                                        <select name="specs[interface]">
                                            <option value="">Select</option>
                                            <option value="M.2 NVMe">M.2 NVMe</option>
                                            <option value="M.2 SATA">M.2 SATA</option>
                                            <option value="2.5 SATA">2.5" SATA</option>
                                            <option value="3.5 SATA">3.5" SATA</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Power Consumption (Watts)</div>
                                    <input type="number" name="specs[power_consumption]" placeholder="e.g. 5">
                                </fieldset>
                            </div>
                        </div>

                        <!-- CASINGS -->
                        <div id="spec-CASINGS" class="spec-group" style="display:none;">
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                                <fieldset>
                                    <div class="body-title mb-10">Supported Motherboard Form Factor</div>
                                    <div class="select flex-grow">
                                        <select name="specs[form_factor_support]">
                                            <option value="">Select</option>
                                            <option value="Mini-ITX">Mini-ITX only</option>
                                            <option value="mATX">mATX & Mini-ITX</option>
                                            <option value="ATX">ATX, mATX & Mini-ITX</option>
                                            <option value="E-ATX">E-ATX, ATX, mATX & Mini-ITX</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Drive Bays</div>
                                    <input type="text" name="specs[drive_bays]" placeholder="e.g. 2x 3.5, 2x 2.5">
                                </fieldset>
                            </div>
                        </div>

                        <!-- COOLING & LIGHTING / FANS -->
                        <div id="spec-COOLING" class="spec-group" style="display:none;">
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:12px;">
                                <fieldset>
                                    <div class="body-title mb-10">Cooler Type</div>
                                    <div class="select flex-grow">
                                        <select name="specs[cooler_type]">
                                            <option value="">Select Type</option>
                                            <option value="Air Tower">Air Tower</option>
                                            <option value="Low-Profile Air">Low-Profile Air</option>
                                            <option value="AIO 120mm">AIO 120mm</option>
                                            <option value="AIO 240mm">AIO 240mm</option>
                                            <option value="AIO 280mm">AIO 280mm</option>
                                            <option value="AIO 360mm">AIO 360mm</option>
                                            <option value="Case Fan">Case Fan</option>
                                        </select>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Socket Compatibility (comma separated)</div>
                                    <input type="text" name="specs[socket_compatibility]" placeholder="e.g. LGA1700, AM5, AM4">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Max TDP Support (Watts)</div>
                                    <input type="number" name="specs[max_tdp_support]" placeholder="e.g. 250">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Fan Count</div>
                                    <input type="number" name="specs[fan_count]" min="1" placeholder="e.g. 3">
                                </fieldset>
                                <fieldset>
                                    <div class="body-title mb-10">Power Consumption (Watts)</div>
                                    <input type="number" name="specs[power_consumption]" placeholder="e.g. 10">
                                </fieldset>
                            </div>
                        </div>

                    </div><!-- end pc-specs-section -->

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
                        Save Product
                    </button>

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

        if (selectedTag === "DEAL OF THE DAYS") {
            dealStartField.style.display = "block";
            dealEndField.style.display = "block";
        } else {
            dealStartField.style.display = "none";
            dealEndField.style.display = "none";
        }
    }

    // PC Spec groups keyed by product type value
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

        // Hide all spec groups
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
