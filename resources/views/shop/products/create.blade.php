@include('layouts.shop_header')
<style>
.wrap { max-width:900px; margin:30px auto; padding:0 20px 50px; }
.form-card { background:white; border-radius:14px; padding:34px; box-shadow:0 2px 12px rgba(0,0,0,0.08); }
.section-title { font-size:18px; font-weight:700; color:#1a3a6b; margin-bottom:24px; padding-bottom:12px; border-bottom:2px solid #e3f2fd; }
.form-group { margin-bottom:18px; }
.form-label { display:block; font-weight:600; font-size:13px; color:#444; margin-bottom:6px; }
.form-control { width:100%; padding:9px 13px; border:1.5px solid #ddd; border-radius:7px; font-size:14px; outline:none; transition:border-color 0.2s; box-sizing:border-box; }
.form-control:focus { border-color:#1a3a6b; }
select.form-control { cursor:pointer; }
textarea.form-control { resize:vertical; min-height:100px; }
.grid-2 { display:grid; grid-template-columns:1fr 1fr; gap:14px; }
.grid-3 { display:grid; grid-template-columns:1fr 1fr 1fr; gap:14px; }
@media(max-width:640px){ .grid-2,.grid-3{ grid-template-columns:1fr; } }
.btn-submit { background:#1a3a6b; color:white; padding:11px 28px; border:none; border-radius:8px; font-size:15px; font-weight:600; cursor:pointer; margin-top:8px; }
.btn-submit:hover { background:#14306a; }
.spec-group { display:none; }
.spec-section { border:1.5px solid #e3f2fd; border-radius:10px; padding:20px; margin-top:18px; background:#f8faff; }
.spec-section-title { font-size:13px; font-weight:700; color:#1565c0; text-transform:uppercase; letter-spacing:.5px; margin-bottom:14px; }
</style>

<div class="main-content">
<div class="wrap">
    @if($errors->any())
        <div class="alert alert-danger" style="margin-bottom:16px;">
            <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <div style="margin-bottom:18px;">
        <a href="{{ route('shop.products.index') }}" style="color:#1a3a6b;text-decoration:none;font-size:14px;">
            <i class="fas fa-arrow-left" style="margin-right:6px;"></i>Back to My Products
        </a>
    </div>

    <div class="form-card">
        <div class="section-title"><i class="fas fa-plus-circle" style="margin-right:8px;"></i>Add New Product</div>

        <form method="POST" action="{{ route('shop.products.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="grid-2">
                <div class="form-group">
                    <label class="form-label">Product Name <span style="color:red">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Brand <span style="color:red">*</span></label>
                    <input type="text" name="brand" class="form-control" value="{{ old('brand') }}" required>
                </div>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label class="form-label">Product Type <span style="color:red">*</span></label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="">Select a Type</option>
                        @foreach(['LAPTOPS','ASUS ROG','APPLE PRODUCTS','GAMING CONSOLE','PROCESSOR','MOTHERBOARD','RAM','GRAPHIC CARDS','CASINGS','POWER SUPPLY','SSD NVME','HARD DISK','FANS','MONITORS','ANTIVIRUS SOFTWARE','KEYBOARDS','MOUSE','MOUSE PAD','HEADSET','SPEAKERS','UPS','TABLES','THERMAL PASTE','COMMERCIAL SOLUTIONS','COOLING & LIGHTING','STORAGE & NAS','MONITORS & ACCESSORIES','OPTICAL DRIVERS & PRINTERS','SPEAKERS & HEADPHONES','KEYBOARDS, MOUSE & GAMEPADS','GRAPHICS TABLET / TAB','DESKTOP WORKSTATIONS','GAMING DESKTOPS','BUDGET DESKTOP COMPUTERS','CHAIRS','CABLES','LIVE STREAMING & RECORDING','EXPANSION CARDS & NETWORKING','GIFT VOUCHER'] as $t)
                            <option value="{{ $t }}" {{ old('type') === $t ? 'selected' : '' }}>{{ $t }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Tag / Label</label>
                    <select name="tags" id="tags" class="form-control" onchange="toggleDealDates()">
                        <option value="">None</option>
                        <option value="New Arrivals"  {{ old('tags') === 'New Arrivals'      ? 'selected' : '' }}>New Arrivals</option>
                        <option value="Top Rated"     {{ old('tags') === 'Top Rated'         ? 'selected' : '' }}>Top Rated</option>
                        <option value="Featured"      {{ old('tags') === 'Featured'           ? 'selected' : '' }}>Featured</option>
                        <option value="DEAL OF THE DAYS" {{ old('tags') === 'DEAL OF THE DAYS' ? 'selected' : '' }}>DEAL OF THE DAYS</option>
                    </select>
                </div>
            </div>

            {{-- Deal dates — only visible when DEAL OF THE DAYS is selected --}}
            <div id="deal-dates-wrap" style="display:{{ old('tags') === 'DEAL OF THE DAYS' ? 'block' : 'none' }};">
                <div style="background:#fff8e1;border:1px solid #ffe082;border-radius:8px;padding:16px 18px;margin-bottom:18px;">
                    <div style="font-size:13px;font-weight:700;color:#b45309;margin-bottom:12px;">
                        <i class="fas fa-fire" style="margin-right:6px;"></i>Deal of the Day — Set Duration
                    </div>
                    <div class="grid-2">
                        <div class="form-group" style="margin-bottom:0;">
                            <label class="form-label">Deal Start Date</label>
                            <input type="date" name="deal_start" class="form-control" value="{{ old('deal_start') }}">
                        </div>
                        <div class="form-group" style="margin-bottom:0;">
                            <label class="form-label">Deal End Date</label>
                            <input type="date" name="deal_end" class="form-control" value="{{ old('deal_end') }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Description <span style="color:red">*</span></label>
                <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
            </div>

            <div class="grid-3">
                <div class="form-group">
                    <label class="form-label">Discounted Price (Rs.) <span style="color:red">*</span></label>
                    <input type="number" name="discounted_price" class="form-control" step="0.01" value="{{ old('discounted_price') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Retail Price (Rs.) <span style="color:red">*</span></label>
                    <input type="number" name="retail_price" class="form-control" step="0.01" value="{{ old('retail_price') }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Quantity <span style="color:red">*</span></label>
                    <input type="number" name="qty" class="form-control" value="{{ old('qty', 1) }}" min="0" required>
                </div>
            </div>

            <div class="grid-3">
                <div class="form-group">
                    <label class="form-label">Warranty <span style="color:red">*</span></label>
                    <select name="warranty" class="form-control" required>
                        <option value="">Select</option>
                        @foreach(['No Warranty','3 Months','6 Months','1 Year','2 Years','3 Years'] as $w)
                            <option value="{{ $w }}" {{ old('warranty') === $w ? 'selected' : '' }}>{{ $w }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">In Stock <span style="color:red">*</span></label>
                    <select name="in_stock" class="form-control" required>
                        <option value="In Stock" {{ old('in_stock') === 'In Stock' ? 'selected' : '' }}>In Stock</option>
                        <option value="Out of Stock" {{ old('in_stock') === 'Out of Stock' ? 'selected' : '' }}>Out of Stock</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Product Image <span style="color:red">*</span></label>
                    <input type="file" name="image_path" class="form-control" accept="image/*" required>
                </div>
            </div>

            <!-- PC Component Specs Section -->
            <div id="pc-specs-section" style="display:none;">
                <div class="spec-section">
                    <div class="spec-section-title"><i class="fas fa-microchip" style="margin-right:6px;"></i>PC Component Specifications</div>

                    <!-- PROCESSOR -->
                    <div id="spec-PROCESSOR" class="spec-group">
                        <div class="grid-3">
                            <div class="form-group"><label class="form-label">Socket Type</label>
                                <select name="specs[socket_type]" class="form-control"><option value="">Select</option><option>LGA1700</option><option>LGA1851</option><option>AM5</option><option>AM4</option><option>TR5</option></select></div>
                            <div class="form-group"><label class="form-label">Compatible RAM</label>
                                <select name="specs[compatible_ram_type]" class="form-control"><option value="">Select</option><option>DDR4</option><option>DDR5</option><option>DDR4/DDR5</option></select></div>
                            <div class="form-group"><label class="form-label">Cores</label><input type="number" name="specs[cores]" class="form-control" placeholder="e.g. 8"></div>
                            <div class="form-group"><label class="form-label">Threads</label><input type="number" name="specs[threads]" class="form-control" placeholder="e.g. 16"></div>
                            <div class="form-group"><label class="form-label">Base Clock (GHz)</label><input type="text" name="specs[base_clock]" class="form-control" placeholder="e.g. 3.6"></div>
                            <div class="form-group"><label class="form-label">Boost Clock (GHz)</label><input type="text" name="specs[boost_clock]" class="form-control" placeholder="e.g. 5.2"></div>
                            <div class="form-group"><label class="form-label">TDP / Power (W)</label><input type="number" name="specs[power_consumption]" class="form-control" placeholder="e.g. 65"></div>
                        </div>
                    </div>

                    <!-- MOTHERBOARD -->
                    <div id="spec-MOTHERBOARD" class="spec-group">
                        <div class="grid-3">
                            <div class="form-group"><label class="form-label">Socket Type</label>
                                <select name="specs[socket_type]" class="form-control"><option value="">Select</option><option>LGA1700</option><option>LGA1851</option><option>AM5</option><option>AM4</option><option>TR5</option></select></div>
                            <div class="form-group"><label class="form-label">Supported RAM</label>
                                <select name="specs[supported_ram_type]" class="form-control"><option value="">Select</option><option>DDR4</option><option>DDR5</option><option>DDR4/DDR5</option></select></div>
                            <div class="form-group"><label class="form-label">Form Factor</label>
                                <select name="specs[form_factor]" class="form-control"><option value="">Select</option><option>ATX</option><option>mATX</option><option>Mini-ITX</option><option>E-ATX</option></select></div>
                            <div class="form-group"><label class="form-label">RAM Slots</label><input type="number" name="specs[ram_slots]" class="form-control" placeholder="e.g. 4"></div>
                            <div class="form-group"><label class="form-label">Max RAM (GB)</label><input type="number" name="specs[max_ram_gb]" class="form-control" placeholder="e.g. 128"></div>
                            <div class="form-group"><label class="form-label">Chipset</label><input type="text" name="specs[chipset]" class="form-control" placeholder="e.g. Z790"></div>
                            <div class="form-group"><label class="form-label">USB Ports</label><input type="text" name="specs[usb_ports]" class="form-control" placeholder="e.g. 4x USB 3.2"></div>
                            <div class="form-group"><label class="form-label">M.2 Slots</label><input type="number" name="specs[m2_slots]" class="form-control" placeholder="e.g. 3"></div>
                        </div>
                    </div>

                    <!-- RAM -->
                    <div id="spec-RAM" class="spec-group">
                        <div class="grid-3">
                            <div class="form-group"><label class="form-label">RAM Type</label>
                                <select name="specs[ram_type]" class="form-control"><option value="">Select</option><option>DDR4</option><option>DDR5</option></select></div>
                            <div class="form-group"><label class="form-label">Capacity (GB)</label><input type="number" name="specs[capacity_gb]" class="form-control" placeholder="e.g. 16"></div>
                            <div class="form-group"><label class="form-label">Speed (MHz)</label><input type="number" name="specs[speed_mhz]" class="form-control" placeholder="e.g. 3200"></div>
                            <div class="form-group"><label class="form-label">Sticks</label><input type="number" name="specs[sticks]" class="form-control" placeholder="e.g. 2"></div>
                            <div class="form-group"><label class="form-label">Power (W)</label><input type="number" name="specs[power_consumption]" class="form-control" placeholder="e.g. 5"></div>
                        </div>
                    </div>

                    <!-- GRAPHIC CARDS -->
                    <div id="spec-GRAPHIC_CARDS" class="spec-group">
                        <div class="grid-3">
                            <div class="form-group"><label class="form-label">VRAM (GB)</label><input type="number" name="specs[vram_gb]" class="form-control" placeholder="e.g. 8"></div>
                            <div class="form-group"><label class="form-label">Bus Width</label><input type="text" name="specs[bus_width]" class="form-control" placeholder="e.g. 256-bit"></div>
                            <div class="form-group"><label class="form-label">TDP / Power (W)</label><input type="number" name="specs[power_consumption]" class="form-control" placeholder="e.g. 200"></div>
                            <div class="form-group"><label class="form-label">HDMI Ports</label><input type="number" name="specs[hdmi_ports]" class="form-control" placeholder="e.g. 1"></div>
                            <div class="form-group"><label class="form-label">DisplayPort</label><input type="number" name="specs[displayport_ports]" class="form-control" placeholder="e.g. 3"></div>
                        </div>
                    </div>

                    <!-- POWER SUPPLY -->
                    <div id="spec-POWER_SUPPLY" class="spec-group">
                        <div class="grid-3">
                            <div class="form-group"><label class="form-label">Wattage (W)</label><input type="number" name="specs[wattage]" class="form-control" placeholder="e.g. 750"></div>
                            <div class="form-group"><label class="form-label">Efficiency</label>
                                <select name="specs[efficiency_rating]" class="form-control"><option value="">Select</option><option>80+ White</option><option>80+ Bronze</option><option>80+ Gold</option><option>80+ Platinum</option><option>80+ Titanium</option></select></div>
                            <div class="form-group"><label class="form-label">Modular</label>
                                <select name="specs[modular]" class="form-control"><option value="">Select</option><option>Non-Modular</option><option>Semi-Modular</option><option>Full Modular</option></select></div>
                        </div>
                    </div>

                    <!-- STORAGE (SSD/HDD) -->
                    <div id="spec-STORAGE" class="spec-group">
                        <div class="grid-3">
                            <div class="form-group"><label class="form-label">Capacity (GB)</label><input type="number" name="specs[capacity_gb]" class="form-control" placeholder="e.g. 1000"></div>
                            <div class="form-group"><label class="form-label">Interface</label>
                                <select name="specs[interface]" class="form-control"><option value="">Select</option><option>PCIe 4.0 NVMe</option><option>PCIe 3.0 NVMe</option><option>SATA III</option><option>SATA II</option></select></div>
                            <div class="form-group"><label class="form-label">Read Speed (MB/s)</label><input type="number" name="specs[read_speed]" class="form-control" placeholder="e.g. 7000"></div>
                            <div class="form-group"><label class="form-label">Write Speed (MB/s)</label><input type="number" name="specs[write_speed]" class="form-control" placeholder="e.g. 6500"></div>
                            <div class="form-group"><label class="form-label">Power (W)</label><input type="number" name="specs[power_consumption]" class="form-control" placeholder="e.g. 5"></div>
                        </div>
                    </div>

                    <!-- CASINGS -->
                    <div id="spec-CASINGS" class="spec-group">
                        <div class="grid-3">
                            <div class="form-group"><label class="form-label">Form Factor Support</label>
                                <select name="specs[form_factor_support]" class="form-control"><option value="">Select</option><option>mATX</option><option>ATX</option><option>E-ATX</option><option>Mini-ITX</option></select></div>
                            <div class="form-group"><label class="form-label">Max GPU Length (mm)</label><input type="number" name="specs[max_gpu_length]" class="form-control" placeholder="e.g. 360"></div>
                            <div class="form-group"><label class="form-label">Drive Bays</label><input type="text" name="specs[drive_bays]" class="form-control" placeholder="e.g. 2x 3.5 + 2x 2.5"></div>
                            <div class="form-group"><label class="form-label">Front I/O</label><input type="text" name="specs[front_io]" class="form-control" placeholder="e.g. 2x USB 3.0, 1x USB-C"></div>
                        </div>
                    </div>

                    <!-- COOLING -->
                    <div id="spec-COOLING" class="spec-group">
                        <div class="grid-3">
                            <div class="form-group"><label class="form-label">Socket Compatibility</label><input type="text" name="specs[socket_compatibility]" class="form-control" placeholder="e.g. LGA1700, AM5"></div>
                            <div class="form-group"><label class="form-label">Radiator Size (mm)</label><input type="number" name="specs[radiator_size]" class="form-control" placeholder="e.g. 240 (for AIO)"></div>
                            <div class="form-group"><label class="form-label">Fan Size (mm)</label><input type="number" name="specs[fan_size]" class="form-control" placeholder="e.g. 120"></div>
                            <div class="form-group"><label class="form-label">Noise (dBA)</label><input type="number" name="specs[noise_dba]" class="form-control" placeholder="e.g. 25" step="0.1"></div>
                            <div class="form-group"><label class="form-label">Power (W)</label><input type="number" name="specs[power_consumption]" class="form-control" placeholder="e.g. 10"></div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-submit">
                <i class="fas fa-save" style="margin-right:7px;"></i>Add Product
            </button>
        </form>
    </div>
</div>
@include('layouts.shop_footer')
</div>

<script>
function toggleDealDates() {
    const wrap = document.getElementById('deal-dates-wrap');
    wrap.style.display = document.getElementById('tags').value === 'DEAL OF THE DAYS' ? 'block' : 'none';
}

const specGroupMap = {
    'PROCESSOR':'PROCESSOR','MOTHERBOARD':'MOTHERBOARD','RAM':'RAM',
    'GRAPHIC CARDS':'GRAPHIC_CARDS','POWER SUPPLY':'POWER_SUPPLY',
    'SSD NVME':'STORAGE','HARD DISK':'STORAGE','STORAGE & NAS':'STORAGE',
    'CASINGS':'CASINGS','COOLING & LIGHTING':'COOLING','FANS':'COOLING',
};
document.getElementById('type').addEventListener('change', function() {
    const groupId = specGroupMap[this.value];
    const section = document.getElementById('pc-specs-section');
    document.querySelectorAll('.spec-group').forEach(el => el.style.display = 'none');
    if (groupId) {
        section.style.display = 'block';
        const g = document.getElementById('spec-' + groupId);
        if (g) g.style.display = 'block';
    } else {
        section.style.display = 'none';
    }
});
// On page load (if old() has a value)
document.getElementById('type').dispatchEvent(new Event('change'));
</script>
