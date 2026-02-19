@include('layouts.shop_header')
<style>
.setup-wrap { max-width:800px; margin:30px auto; padding:0 20px 40px; }
.setup-card { background:white; border-radius:14px; padding:34px; box-shadow:0 2px 12px rgba(0,0,0,0.08); }
.form-group { margin-bottom:20px; }
.form-label { display:block; font-weight:600; font-size:14px; color:#000; margin-bottom:7px; }
.form-control { width:100%; padding:10px 14px; border:1.5px solid #666; border-radius:8px; font-size:14px; outline:none; transition:border-color 0.2s; box-sizing:border-box; }
.form-control:focus { border-color:#000; }
textarea.form-control { resize:vertical; min-height:90px; }
.preview-img { max-width:120px; max-height:80px; border-radius:8px; margin-top:8px; object-fit:cover; filter:grayscale(100%); }
.btn-save { background:#000; color:white; padding:11px 28px; border:none; border-radius:8px; font-size:15px; font-weight:600; cursor:pointer; transition:background 0.2s; }
.btn-save:hover { background:#333; }
.section-title { font-size:18px; font-weight:700; color:#000; margin-bottom:24px; padding-bottom:12px; border-bottom:2px solid #ccc; }
.grid-2 { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
@media(max-width:600px){ .grid-2{ grid-template-columns:1fr; } }
</style>

<div class="main-content">
<div class="setup-wrap">
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" style="margin-bottom:20px; background:#f0f0f0; color:#000; border:1px solid #999; border-radius:8px; padding:12px;" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" style="float:right; background:none; border:none; font-size:20px; cursor:pointer;">×</button>
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger" style="margin-bottom:20px; background:#f0f0f0; color:#000; border:1px solid #999; border-radius:8px; padding:12px;">
            <ul class="mb-0">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
        </div>
    @endif

    <div class="setup-card">
        <div class="section-title"><i class="fas fa-store" style="margin-right:8px; color:#000;"></i>Shop Profile Setup</div>

        <form method="POST" action="{{ route('shop.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label class="form-label">Shop Name <span style="color:#000;">*</span></label>
                <input type="text" name="shop_name" class="form-control" value="{{ old('shop_name', $shop->shop_name ?? '') }}" placeholder="e.g. TechZone Store" required>
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label class="form-label">Shop Logo</label>
                    <input type="file" name="logo" class="form-control" accept="image/*">
                    @if(!empty($shop->logo))
                        <img src="{{ asset($shop->logo) }}" class="preview-img" alt="Current Logo">
                        <div style="font-size:12px;color:#666;margin-top:4px;">Current logo — upload new to replace</div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="form-label">Cover / Banner Image</label>
                    <input type="file" name="cover_image" class="form-control" accept="image/*">
                    @if(!empty($shop->cover_image))
                        <img src="{{ asset($shop->cover_image) }}" class="preview-img" alt="Current Cover">
                        <div style="font-size:12px;color:#666;margin-top:4px;">Current cover — upload new to replace</div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Location / Address</label>
                <input type="text" name="location" class="form-control" value="{{ old('location', $shop->location ?? '') }}" placeholder="e.g. 123 Main St, Colombo 3">
            </div>

            <div class="grid-2">
                <div class="form-group">
                    <label class="form-label">Contact Phone</label>
                    <input type="text" name="contact_phone" class="form-control" value="{{ old('contact_phone', $shop->contact_phone ?? '') }}" placeholder="+94 77 123 4567">
                </div>
                <div class="form-group">
                    <label class="form-label">Contact Email</label>
                    <input type="email" name="contact_email" class="form-control" value="{{ old('contact_email', $shop->contact_email ?? '') }}" placeholder="shop@example.com">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Shop Description</label>
                <textarea name="description" class="form-control" placeholder="Tell customers about your shop…">{{ old('description', $shop->description ?? '') }}</textarea>
            </div>

            <button type="submit" class="btn-save">
                <i class="fas fa-save" style="margin-right:7px; color:white;"></i>Save Shop Profile
            </button>
        </form>
    </div>
</div>
@include('layouts.shop_footer')
</div>