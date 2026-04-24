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
    @if(session('success'))
        <div class="alert alert-success" style="margin-bottom:16px;"><strong>Success!</strong> {{ session('success') }}</div>
    @endif

    <div style="margin-bottom:18px;">
        <a href="{{ route('shop.products.index') }}" style="color:#1a3a6b;text-decoration:none;font-size:14px;">
            <i class="fas fa-arrow-left" style="margin-right:6px;"></i>Back to My Products
        </a>
    </div>

    <div class="form-card">
        <div class="section-title"><i class="fas fa-edit" style="margin-right:8px;"></i>Edit Product: {{ $product->name }}</div>

        @php $s = $existingSpecs ?? []; @endphp

        <form method="POST" action="{{ route('shop.products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="grid-2">
                <div class="form-group">
                    <label class="form-label">Product Name <span style="color:red">*</span></label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Brand <span style="color:red">*</span></label>
                    <input type="text" name="brand" class="form-control" value="{{ old('brand', $product->brand) }}" required>
                </div>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label class="form-label">Product Type <span style="color:red">*</span></label>
                    <select name="type" id="type" class="form-control" required>
                        <option value="">Select a Type</option>
                        @foreach(['LAPTOPS','ASUS ROG','APPLE PRODUCTS','GAMING CONSOLE','PROCESSOR','MOTHERBOARD','RAM','GRAPHIC CARDS','CASINGS','POWER SUPPLY','SSD NVME','HARD DISK','FANS','MONITORS','ANTIVIRUS SOFTWARE','KEYBOARDS','MOUSE','MOUSE PAD','HEADSET','SPEAKERS','UPS','TABLES','THERMAL PASTE','COMMERCIAL SOLUTIONS','COOLING & LIGHTING','STORAGE & NAS','MONITORS & ACCESSORIES','OPTICAL DRIVERS & PRINTERS','SPEAKERS & HEADPHONES','KEYBOARDS, MOUSE & GAMEPADS','GRAPHICS TABLET / TAB','DESKTOP WORKSTATIONS','GAMING DESKTOPS','BUDGET DESKTOP COMPUTERS','CHAIRS','CABLES','LIVE STREAMING & RECORDING','EXPANSION CARDS & NETWORKING','GIFT VOUCHER'] as $t)
                            <option value="{{ $t }}" {{ old('type', $product->type) === $t ? 'selected' : '' }}>{{ $t }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Tag / Label</label>
                    @php $currentTag = old('tags', $product->tags); @endphp
                    <select name="tags" id="tags" class="form-control" onchange="toggleDealDates()">
                        <option value="">None</option>
                        <option value="New Arrivals"     {{ $currentTag === 'New Arrivals'      ? 'selected' : '' }}>New Arrivals</option>
                        <option value="Top Rated"        {{ $currentTag === 'Top Rated'         ? 'selected' : '' }}>Top Rated</option>
                        <option value="Featured"         {{ $currentTag === 'Featured'           ? 'selected' : '' }}>Featured</option>
                        <option value="DEAL OF THE DAYS" {{ $currentTag === 'DEAL OF THE DAYS'  ? 'selected' : '' }}>DEAL OF THE DAYS</option>
                    </select>
                </div>
            </div>

            {{-- Deal dates — only visible when DEAL OF THE DAYS is selected --}}
            <div id="deal-dates-wrap" style="display:{{ $currentTag === 'DEAL OF THE DAYS' ? 'block' : 'none' }};">
                <div style="background:#fff8e1;border:1px solid #ffe082;border-radius:8px;padding:16px 18px;margin-bottom:18px;">
                    <div style="font-size:13px;font-weight:700;color:#b45309;margin-bottom:12px;">
                        <i class="fas fa-fire" style="margin-right:6px;"></i>Deal of the Day — Set Duration
                    </div>
                    <div class="grid-2">
                        <div class="form-group" style="margin-bottom:0;">
                            <label class="form-label">Deal Start Date</label>
                            <input type="date" name="deal_start" class="form-control" value="{{ old('deal_start', $product->deal_start ? \Carbon\Carbon::parse($product->deal_start)->format('Y-m-d') : '') }}">
                        </div>
                        <div class="form-group" style="margin-bottom:0;">
                            <label class="form-label">Deal End Date</label>
                            <input type="date" name="deal_end" class="form-control" value="{{ old('deal_end', $product->deal_end ? \Carbon\Carbon::parse($product->deal_end)->format('Y-m-d') : '') }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Description <span style="color:red">*</span></label>
                <textarea name="description" class="form-control" required>{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="grid-3">
                <div class="form-group">
                    <label class="form-label">Discounted Price (Rs.) <span style="color:red">*</span></label>
                    <input type="number" name="discounted_price" class="form-control" step="0.01" value="{{ old('discounted_price', $product->discounted_price) }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Retail Price (Rs.) <span style="color:red">*</span></label>
                    <input type="number" name="retail_price" class="form-control" step="0.01" value="{{ old('retail_price', $product->retail_price) }}" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Quantity <span style="color:red">*</span></label>
                    <input type="number" name="qty" class="form-control" value="{{ old('qty', $product->qty) }}" min="0" required>
                </div>
            </div>

            <div class="grid-3">
                <div class="form-group">
                    <label class="form-label">Warranty <span style="color:red">*</span></label>
                    <select name="warranty" class="form-control" required>
                        @foreach(['No Warranty','3 Months','6 Months','1 Year','2 Years','3 Years'] as $w)
                            <option value="{{ $w }}" {{ old('warranty', $product->warranty) === $w ? 'selected' : '' }}>{{ $w }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">In Stock <span style="color:red">*</span></label>
                    <select name="in_stock" class="form-control" required>
                        <option value="In Stock" {{ old('in_stock', $product->in_stock) === 'In Stock' ? 'selected' : '' }}>In Stock</option>
                        <option value="Out of Stock" {{ old('in_stock', $product->in_stock) === 'Out of Stock' ? 'selected' : '' }}>Out of Stock</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">New Image (optional)</label>
                    <input type="file" name="image_path" class="form-control" accept="image/*">
                    @if($product->image)
                        <img src="{{ asset($product->image) }}" style="width:70px;margin-top:6px;border-radius:6px;object-fit:cover;" alt="Current">
                    @endif
                </div>
            </div>

            <!-- PC Component Specs -->
            @php
                $specGroupMap = [
                    'PROCESSOR'=>'PROCESSOR','MOTHERBOARD'=>'MOTHERBOARD','RAM'=>'RAM',
                    'GRAPHIC CARDS'=>'GRAPHIC_CARDS','POWER SUPPLY'=>'POWER_SUPPLY',
                    'SSD NVME'=>'STORAGE','HARD DISK'=>'STORAGE','STORAGE & NAS'=>'STORAGE',
                    'CASINGS'=>'CASINGS','COOLING & LIGHTING'=>'COOLING','FANS'=>'COOLING',
                ];
                $currentGroup = $specGroupMap[$product->type] ?? null;
            @endphp
            <div id="pc-specs-section" style="{{ $currentGroup ? 'display:block' : 'display:none' }}">
                <div class="spec-section">
                    <div class="spec-section-title"><i class="fas fa-microchip" style="margin-right:6px;"></i>PC Component Specifications</div>

                    <div id="spec-PROCESSOR" class="spec-group" style="{{ $currentGroup === 'PROCESSOR' ? 'display:block' : '' }}">
                        <div class="grid-3">
                            <div class="form-group"><label class="form-label">Socket Type</label>
                                <select name="specs[socket_type]" class="form-control"><option value="">Select</option>@foreach(['LGA1700','LGA1851','AM5','AM4','TR5'] as $v)<option value="{{ $v }}" {{ ($s['socket_type'] ?? '') === $v ? 'selected' : '' }}>{{ $v }}</option>@endforeach</select></div>
                            <div class="form-group"><label class="form-label">Compatible RAM</label>
                                <select name="specs[compatible_ram_type]" class="form-control"><option value="">Select</option>@foreach(['DDR4','DDR5','DDR4/DDR5'] as $v)<option value="{{ $v }}" {{ ($s['compatible_ram_type'] ?? '') === $v ? 'selected' : '' }}>{{ $v }}</option>@endforeach</select></div>
                            <div class="form-group"><label class="form-label">Cores</label><input type="number" name="specs[cores]" class="form-control" value="{{ $s['cores'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Threads</label><input type="number" name="specs[threads]" class="form-control" value="{{ $s['threads'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Base Clock</label><input type="text" name="specs[base_clock]" class="form-control" value="{{ $s['base_clock'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Boost Clock</label><input type="text" name="specs[boost_clock]" class="form-control" value="{{ $s['boost_clock'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">TDP (W)</label><input type="number" name="specs[power_consumption]" class="form-control" value="{{ $s['power_consumption'] ?? '' }}"></div>
                        </div>
                    </div>

                    <div id="spec-MOTHERBOARD" class="spec-group" style="{{ $currentGroup === 'MOTHERBOARD' ? 'display:block' : '' }}">
                        <div class="grid-3">
                            <div class="form-group"><label class="form-label">Socket</label>
                                <select name="specs[socket_type]" class="form-control"><option value="">Select</option>@foreach(['LGA1700','LGA1851','AM5','AM4','TR5'] as $v)<option value="{{ $v }}" {{ ($s['socket_type'] ?? '') === $v ? 'selected' : '' }}>{{ $v }}</option>@endforeach</select></div>
                            <div class="form-group"><label class="form-label">Supported RAM</label>
                                <select name="specs[supported_ram_type]" class="form-control"><option value="">Select</option>@foreach(['DDR4','DDR5','DDR4/DDR5'] as $v)<option value="{{ $v }}" {{ ($s['supported_ram_type'] ?? '') === $v ? 'selected' : '' }}>{{ $v }}</option>@endforeach</select></div>
                            <div class="form-group"><label class="form-label">Form Factor</label>
                                <select name="specs[form_factor]" class="form-control"><option value="">Select</option>@foreach(['ATX','mATX','Mini-ITX','E-ATX'] as $v)<option value="{{ $v }}" {{ ($s['form_factor'] ?? '') === $v ? 'selected' : '' }}>{{ $v }}</option>@endforeach</select></div>
                            <div class="form-group"><label class="form-label">RAM Slots</label><input type="number" name="specs[ram_slots]" class="form-control" value="{{ $s['ram_slots'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Max RAM (GB)</label><input type="number" name="specs[max_ram_gb]" class="form-control" value="{{ $s['max_ram_gb'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Chipset</label><input type="text" name="specs[chipset]" class="form-control" value="{{ $s['chipset'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">USB Ports</label><input type="text" name="specs[usb_ports]" class="form-control" value="{{ $s['usb_ports'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">M.2 Slots</label><input type="number" name="specs[m2_slots]" class="form-control" value="{{ $s['m2_slots'] ?? '' }}"></div>
                        </div>
                    </div>

                    <div id="spec-RAM" class="spec-group" style="{{ $currentGroup === 'RAM' ? 'display:block' : '' }}">
                        <div class="grid-3">
                            <div class="form-group"><label class="form-label">RAM Type</label>
                                <select name="specs[ram_type]" class="form-control"><option value="">Select</option>@foreach(['DDR4','DDR5'] as $v)<option value="{{ $v }}" {{ ($s['ram_type'] ?? '') === $v ? 'selected' : '' }}>{{ $v }}</option>@endforeach</select></div>
                            <div class="form-group"><label class="form-label">Capacity (GB)</label><input type="number" name="specs[capacity_gb]" class="form-control" value="{{ $s['capacity_gb'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Speed (MHz)</label><input type="number" name="specs[speed_mhz]" class="form-control" value="{{ $s['speed_mhz'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Sticks</label><input type="number" name="specs[sticks]" class="form-control" value="{{ $s['sticks'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Power (W)</label><input type="number" name="specs[power_consumption]" class="form-control" value="{{ $s['power_consumption'] ?? '' }}"></div>
                        </div>
                    </div>

                    <div id="spec-GRAPHIC_CARDS" class="spec-group" style="{{ $currentGroup === 'GRAPHIC_CARDS' ? 'display:block' : '' }}">
                        <div class="grid-3">
                            <div class="form-group"><label class="form-label">VRAM (GB)</label><input type="number" name="specs[vram_gb]" class="form-control" value="{{ $s['vram_gb'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Bus Width</label><input type="text" name="specs[bus_width]" class="form-control" value="{{ $s['bus_width'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">TDP (W)</label><input type="number" name="specs[power_consumption]" class="form-control" value="{{ $s['power_consumption'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">HDMI Ports</label><input type="number" name="specs[hdmi_ports]" class="form-control" value="{{ $s['hdmi_ports'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">DisplayPort</label><input type="number" name="specs[displayport_ports]" class="form-control" value="{{ $s['displayport_ports'] ?? '' }}"></div>
                        </div>
                    </div>

                    <div id="spec-POWER_SUPPLY" class="spec-group" style="{{ $currentGroup === 'POWER_SUPPLY' ? 'display:block' : '' }}">
                        <div class="grid-3">
                            <div class="form-group"><label class="form-label">Wattage (W)</label><input type="number" name="specs[wattage]" class="form-control" value="{{ $s['wattage'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Efficiency</label>
                                <select name="specs[efficiency_rating]" class="form-control">@foreach(['','80+ White','80+ Bronze','80+ Gold','80+ Platinum','80+ Titanium'] as $v)<option value="{{ $v }}" {{ ($s['efficiency_rating'] ?? '') === $v ? 'selected' : '' }}>{{ $v ?: 'Select' }}</option>@endforeach</select></div>
                            <div class="form-group"><label class="form-label">Modular</label>
                                <select name="specs[modular]" class="form-control">@foreach(['','Non-Modular','Semi-Modular','Full Modular'] as $v)<option value="{{ $v }}" {{ ($s['modular'] ?? '') === $v ? 'selected' : '' }}>{{ $v ?: 'Select' }}</option>@endforeach</select></div>
                        </div>
                    </div>

                    <div id="spec-STORAGE" class="spec-group" style="{{ $currentGroup === 'STORAGE' ? 'display:block' : '' }}">
                        <div class="grid-3">
                            <div class="form-group"><label class="form-label">Capacity (GB)</label><input type="number" name="specs[capacity_gb]" class="form-control" value="{{ $s['capacity_gb'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Interface</label>
                                <select name="specs[interface]" class="form-control">@foreach(['','PCIe 4.0 NVMe','PCIe 3.0 NVMe','SATA III','SATA II'] as $v)<option value="{{ $v }}" {{ ($s['interface'] ?? '') === $v ? 'selected' : '' }}>{{ $v ?: 'Select' }}</option>@endforeach</select></div>
                            <div class="form-group"><label class="form-label">Read (MB/s)</label><input type="number" name="specs[read_speed]" class="form-control" value="{{ $s['read_speed'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Write (MB/s)</label><input type="number" name="specs[write_speed]" class="form-control" value="{{ $s['write_speed'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Power (W)</label><input type="number" name="specs[power_consumption]" class="form-control" value="{{ $s['power_consumption'] ?? '' }}"></div>
                        </div>
                    </div>

                    <div id="spec-CASINGS" class="spec-group" style="{{ $currentGroup === 'CASINGS' ? 'display:block' : '' }}">
                        <div class="grid-3">
                            <div class="form-group"><label class="form-label">Form Factor Support</label>
                                <select name="specs[form_factor_support]" class="form-control">@foreach(['','mATX','ATX','E-ATX','Mini-ITX'] as $v)<option value="{{ $v }}" {{ ($s['form_factor_support'] ?? '') === $v ? 'selected' : '' }}>{{ $v ?: 'Select' }}</option>@endforeach</select></div>
                            <div class="form-group"><label class="form-label">Max GPU (mm)</label><input type="number" name="specs[max_gpu_length]" class="form-control" value="{{ $s['max_gpu_length'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Drive Bays</label><input type="text" name="specs[drive_bays]" class="form-control" value="{{ $s['drive_bays'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Front I/O</label><input type="text" name="specs[front_io]" class="form-control" value="{{ $s['front_io'] ?? '' }}"></div>
                        </div>
                    </div>

                    <div id="spec-COOLING" class="spec-group" style="{{ $currentGroup === 'COOLING' ? 'display:block' : '' }}">
                        <div class="grid-3">
                            <div class="form-group"><label class="form-label">Socket Compatibility</label><input type="text" name="specs[socket_compatibility]" class="form-control" value="{{ $s['socket_compatibility'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Radiator Size (mm)</label><input type="number" name="specs[radiator_size]" class="form-control" value="{{ $s['radiator_size'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Fan Size (mm)</label><input type="number" name="specs[fan_size]" class="form-control" value="{{ $s['fan_size'] ?? '' }}"></div>
                            <div class="form-group"><label class="form-label">Noise (dBA)</label><input type="number" name="specs[noise_dba]" class="form-control" value="{{ $s['noise_dba'] ?? '' }}" step="0.1"></div>
                            <div class="form-group"><label class="form-label">Power (W)</label><input type="number" name="specs[power_consumption]" class="form-control" value="{{ $s['power_consumption'] ?? '' }}"></div>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-submit">
                <i class="fas fa-save" style="margin-right:7px;"></i>Update Product
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

// Disable inputs inside hidden spec groups before submit so duplicate names don't overwrite active group values
document.querySelector('form').addEventListener('submit', function() {
    document.querySelectorAll('.spec-group').forEach(function(group) {
        if (group.style.display === 'none') {
            group.querySelectorAll('input, select').forEach(function(el) {
                el.disabled = true;
            });
        }
    });
});
</script>
