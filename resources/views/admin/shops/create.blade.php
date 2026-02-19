@include('layouts.header')
<style>
*, *::before, *::after { box-sizing: border-box; }

.wg-box { margin:20px 16px 50px; }

/* ── Back link ── */
.back-link {
    display:inline-flex; align-items:center; gap:6px;
    color:#666; text-decoration:none; font-size:13px;
    margin-bottom:16px; transition:color 0.15s;
}
.back-link:hover { color:#000; }

/* ── Card ── */
.form-card {
    background:white; border:1px solid #e0e0e0;
}

.card-header {
    padding:14px 20px; border-bottom:1px solid #ececec;
    background:#fafafa; display:flex; align-items:center; gap:8px;
}
.card-title {
    font-size:15px; font-weight:700; color:#111;
    font-family:'Orbitron', sans-serif;
}

.card-body { padding:24px 20px; }

/* ── Section divider ── */
.sub-title {
    font-size:10px; font-weight:600; color:#aaa;
    text-transform:uppercase; letter-spacing:.5px;
    margin:22px 0 14px; padding-bottom:8px;
    border-bottom:1px solid #ececec;
    display:flex; align-items:center; gap:6px;
}
.sub-title:first-child { margin-top:0; }

/* ── Form elements ── */
.form-group { margin-bottom:16px; }
.form-group:last-child { margin-bottom:0; }

.form-label {
    display:block; font-size:12px; font-weight:600;
    color:#444; margin-bottom:6px;
}
.req { color:#ccc; font-weight:400; }

.form-control {
    width:100%; padding:9px 12px;
    background:#fafafa; border:1.5px solid #ddd;
    border-radius:7px; font-size:13px; color:#111;
    font-family:inherit; outline:none;
    transition:border-color 0.15s, background 0.15s;
}
.form-control:focus { border-color:#111; background:#fff; }
.form-control::placeholder { color:#bbb; }

textarea.form-control { resize:vertical; min-height:76px; line-height:1.5; }

.hint { font-size:11px; color:#aaa; margin-top:4px; }

.field-error { color:#b91c1c; font-size:11px; margin-top:4px; }

/* ── Grid ── */
.grid-2 { display:grid; grid-template-columns:1fr 1fr; gap:14px; }
.grid-3 { display:grid; grid-template-columns:1fr 1fr 1fr; gap:14px; }

/* ── File input ── */
.file-wrap { position:relative; }
.file-btn {
    display:flex; align-items:center; gap:8px;
    padding:9px 12px; background:#fafafa;
    border:1.5px dashed #ccc; border-radius:7px;
    font-size:12px; color:#777; cursor:pointer;
    transition:border-color 0.15s, color 0.15s;
}
.file-btn:hover { border-color:#111; color:#111; }
.file-wrap input[type="file"] {
    position:absolute; inset:0; opacity:0;
    cursor:pointer; width:100%; height:100%;
}
.preview-img {
    width:64px; height:46px; object-fit:cover;
    border-radius:6px; border:1px solid #eee;
    margin-top:8px; display:none;
}

/* ── Error alert ── */
.alert-error {
    border:1px solid #ddd; border-radius:8px;
    padding:12px 16px; margin-bottom:16px;
    font-size:13px; color:#111; max-width:900px;
}
.alert-error ul { margin:6px 0 0; padding-left:16px; }

/* ── Actions ── */
.form-actions {
    display:flex; align-items:center; gap:10px;
    margin-top:24px; padding-top:20px;
    border-top:1px solid #ececec; flex-wrap:wrap;
}

.btn-submit {
    background:#111; color:#fff; border:none;
    border-radius:7px; padding:10px 24px;
    font-size:13px; font-weight:600; cursor:pointer;
    font-family:inherit; transition:background 0.15s;
    display:inline-flex; align-items:center; gap:6px;
}
.btn-submit:hover { background:#333; }

.btn-cancel {
    background:white; color:#555;
    padding:10px 18px; border:1.5px solid #ddd;
    border-radius:7px; font-size:13px; font-weight:600;
    cursor:pointer; text-decoration:none;
    display:inline-flex; align-items:center; gap:6px;
    transition:all 0.15s; font-family:inherit;
}
.btn-cancel:hover { background:#f5f5f5; border-color:#bbb; color:#111; }

/* ── Responsive ── */
@media (max-width:640px) {
    .wg-box { margin:12px 10px 40px; }
    .card-body { padding:16px 14px; }
    .grid-2, .grid-3 { grid-template-columns:1fr; }
    .form-actions { flex-direction:column; }
    .btn-submit, .btn-cancel { width:100%; justify-content:center; padding:11px; }
}
</style>

<div class="main-content">
<div class="main-content-inner">
<div class="main-content-wrap">
<div class="wg-box">

    @if($errors->any())
        <div class="alert-error">
            <strong>Please fix the following errors:</strong>
            <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <a href="{{ route('admin.shops.index') }}" class="back-link">
        <i class="fas fa-arrow-left"></i> Back to Shops
    </a>

    <div class="form-card">
        <div class="card-header">
            <i class="fas fa-user-plus" style="opacity:.45;font-size:13px;"></i>
            <span class="card-title">Add New Shop Owner</span>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.shops.store') }}" enctype="multipart/form-data">
                @csrf

                {{-- ── Account Details ── --}}
                <div class="sub-title"><i class="fas fa-user"></i> Account Details</div>

                <div class="form-group">
                    <label class="form-label">Full Name <span class="req">*</span></label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name') }}" placeholder="e.g. Kasun Perera" required>
                    @error('name')<div class="field-error">{{ $message }}</div>@enderror
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Email Address <span class="req">*</span></label>
                        <input type="email" name="email" class="form-control"
                               value="{{ old('email') }}" placeholder="owner@shop.lk" required>
                        <div class="hint">This will be the shop owner's login email.</div>
                        @error('email')<div class="field-error">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password <span class="req">*</span></label>
                        <input type="password" name="password" class="form-control"
                               placeholder="Min. 8 characters" required>
                        @error('password')<div class="field-error">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Confirm Password <span class="req">*</span></label>
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="Repeat password" required>
                </div>

                {{-- ── Shop Details ── --}}
                <div class="sub-title"><i class="fas fa-store"></i> Shop Details</div>

                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Shop Name <span class="req">*</span></label>
                        <input type="text" name="shop_name" class="form-control"
                               value="{{ old('shop_name') }}" placeholder="e.g. TechZone Store" required>
                        @error('shop_name')<div class="field-error">{{ $message }}</div>@enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Location / Address</label>
                        <input type="text" name="location" class="form-control"
                               value="{{ old('location') }}" placeholder="e.g. 45 Galle Road, Colombo 03">
                    </div>
                </div>

                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Contact Phone</label>
                        <input type="text" name="contact_phone" class="form-control"
                               value="{{ old('contact_phone') }}" placeholder="+94 77 123 4567">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Contact Email</label>
                        <input type="email" name="contact_email" class="form-control"
                               value="{{ old('contact_email') }}" placeholder="shop@example.com">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Shop Description</label>
                    <textarea name="description" class="form-control"
                              placeholder="Brief description of the shop…">{{ old('description') }}</textarea>
                </div>

                {{-- ── Images ── --}}
                <div class="sub-title"><i class="fas fa-images"></i> Shop Images <span style="font-size:10px;color:#ccc;font-weight:400;text-transform:none;letter-spacing:0;">(optional)</span></div>

                <div class="grid-2">
                    <div class="form-group">
                        <label class="form-label">Shop Logo</label>
                        <div class="file-wrap">
                            <div class="file-btn">
                                <i class="fas fa-image" style="font-size:11px;"></i>
                                <span>Choose logo</span>
                            </div>
                            <input type="file" name="logo" accept="image/*"
                                   onchange="previewImg(this,'logo-preview')">
                        </div>
                        <img id="logo-preview" class="preview-img" alt="Logo preview">
                        <div class="hint">JPG / PNG / WebP — max 2 MB</div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Cover / Banner Image</label>
                        <div class="file-wrap">
                            <div class="file-btn">
                                <i class="fas fa-panorama" style="font-size:11px;"></i>
                                <span>Choose cover</span>
                            </div>
                            <input type="file" name="cover_image" accept="image/*"
                                   onchange="previewImg(this,'cover-preview')">
                        </div>
                        <img id="cover-preview" class="preview-img" alt="Cover preview">
                        <div class="hint">JPG / PNG / WebP — max 4 MB</div>
                    </div>
                </div>

                {{-- ── Actions ── --}}
                <div class="form-actions">
                    <a href="{{ route('admin.shops.index') }}" class="btn-cancel">
                        <i class="fas fa-times" style="font-size:11px;"></i> Cancel
                    </a>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-user-plus" style="font-size:11px;"></i> Create Shop Owner
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
</div>
</div>
@include('layouts.footer')
</div>

<script>
function previewImg(input, previewId) {
    const preview = document.getElementById(previewId);
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { preview.src = e.target.result; preview.style.display = 'block'; };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>