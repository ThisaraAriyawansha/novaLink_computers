@include('layouts.header')
<style>
.wg-box { margin: 30px 20px 50px; }
.form-card { background: white; border-radius: 14px; padding: 34px; box-shadow: 0 2px 12px rgba(0,0,0,0.08); max-width: 820px; }
.section-title { font-size: 18px; font-weight: 700; font-family: 'Orbitron', sans-serif; margin-bottom: 24px; padding-bottom: 12px; border-bottom: 2px solid #f0f0f0; }
.sub-title { font-size: 13px; font-weight: 700; color: #555; text-transform: uppercase; letter-spacing: .5px; margin: 24px 0 14px; padding-bottom: 8px; border-bottom: 1px solid #eee; }
.form-group { margin-bottom: 18px; }
.form-label { display: block; font-weight: 600; font-size: 13px; color: #444; margin-bottom: 6px; }
.form-control { width: 100%; padding: 9px 13px; border: 1.5px solid #ddd; border-radius: 7px; font-size: 14px; outline: none; transition: border-color 0.2s; box-sizing: border-box; }
.form-control:focus { border-color: #1a1a1a; }
textarea.form-control { resize: vertical; min-height: 80px; }
.grid-2 { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
@media(max-width: 640px) { .grid-2 { grid-template-columns: 1fr; } }
.btn-submit { background: #1a1a1a; color: white; padding: 11px 28px; border: none; border-radius: 8px; font-size: 15px; font-weight: 600; cursor: pointer; }
.btn-submit:hover { background: #333; }
.btn-cancel { background: white; color: #555; padding: 11px 20px; border: 1.5px solid #ddd; border-radius: 8px; font-size: 15px; font-weight: 600; cursor: pointer; text-decoration: none; display: inline-block; margin-right: 10px; }
.btn-cancel:hover { background: #f5f5f5; }
.hint { font-size: 12px; color: #888; margin-top: 4px; }
.required { color: red; }
.preview-img { max-width: 100px; max-height: 70px; border-radius: 6px; margin-top: 6px; object-fit: cover; display: none; }
</style>

<div class="main-content">
<div class="main-content-inner">
<div class="main-content-wrap">
<div class="wg-box">

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" style="max-width:820px;margin-bottom:16px;">
            <strong>Please fix the following errors:</strong>
            <ul class="mt-2 mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div style="margin-bottom:18px;">
        <a href="{{ route('admin.shops.index') }}" style="color:#555;text-decoration:none;font-size:14px;">
            <i class="fas fa-arrow-left" style="margin-right:6px;"></i>Back to Shops
        </a>
    </div>

    <div class="form-card">
        <div class="section-title"><i class="fas fa-user-plus" style="margin-right:10px;"></i>Add New Shop Owner</div>

        <form method="POST" action="{{ route('admin.shops.store') }}" enctype="multipart/form-data">
            @csrf

            {{-- ── Account Details ── --}}
            <div class="sub-title"><i class="fas fa-user" style="margin-right:7px;color:#667eea;"></i>Account Details</div>

            <div class="form-group">
                <label class="form-label">Full Name <span class="required">*</span></label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="e.g. Kasun Perera" required>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label class="form-label">Email Address <span class="required">*</span></label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="owner@shop.lk" required>
                    <div class="hint">This will be the shop owner's login email.</div>
                </div>
                <div class="form-group">
                    <label class="form-label">Password <span class="required">*</span></label>
                    <input type="password" name="password" class="form-control" placeholder="Min. 8 characters" required>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Confirm Password <span class="required">*</span></label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Repeat password" required>
            </div>

            {{-- ── Shop Details ── --}}
            <div class="sub-title"><i class="fas fa-store" style="margin-right:7px;color:#4ecdc4;"></i>Shop Details</div>

            <div class="form-group">
                <label class="form-label">Shop Name <span class="required">*</span></label>
                <input type="text" name="shop_name" class="form-control" value="{{ old('shop_name') }}" placeholder="e.g. TechZone Store" required>
            </div>

            <div class="form-group">
                <label class="form-label">Location / Address</label>
                <input type="text" name="location" class="form-control" value="{{ old('location') }}" placeholder="e.g. 45 Galle Road, Colombo 03">
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label class="form-label">Contact Phone</label>
                    <input type="text" name="contact_phone" class="form-control" value="{{ old('contact_phone') }}" placeholder="+94 77 123 4567">
                </div>
                <div class="form-group">
                    <label class="form-label">Contact Email</label>
                    <input type="email" name="contact_email" class="form-control" value="{{ old('contact_email') }}" placeholder="shop@example.com">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Shop Description</label>
                <textarea name="description" class="form-control" placeholder="Brief description of the shop…">{{ old('description') }}</textarea>
            </div>

            {{-- ── Images ── --}}
            <div class="sub-title"><i class="fas fa-images" style="margin-right:7px;color:#f39c12;"></i>Shop Images (optional)</div>

            <div class="grid-2">
                <div class="form-group">
                    <label class="form-label">Shop Logo</label>
                    <input type="file" name="logo" class="form-control" accept="image/*" onchange="previewImg(this,'logo-preview')">
                    <img id="logo-preview" class="preview-img" alt="Logo preview">
                    <div class="hint">JPG/PNG/WebP, max 2 MB</div>
                </div>
                <div class="form-group">
                    <label class="form-label">Cover / Banner Image</label>
                    <input type="file" name="cover_image" class="form-control" accept="image/*" onchange="previewImg(this,'cover-preview')">
                    <img id="cover-preview" class="preview-img" alt="Cover preview">
                    <div class="hint">JPG/PNG/WebP, max 4 MB</div>
                </div>
            </div>

            {{-- ── Actions ── --}}
            <div style="margin-top:24px;display:flex;align-items:center;gap:10px;">
                <a href="{{ route('admin.shops.index') }}" class="btn-cancel">Cancel</a>
                <button type="submit" class="btn-submit">
                    <i class="fas fa-user-plus" style="margin-right:7px;"></i>Create Shop Owner
                </button>
            </div>
        </form>
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
