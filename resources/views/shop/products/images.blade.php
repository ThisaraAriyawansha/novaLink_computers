@include('layouts.shop_header')

<style>
/* Mobile Responsive Black & White Styles */
.shop-page-wrap { max-width:1200px; margin:0 auto; padding:15px; min-height:calc(100vh - 200px); }
@media(min-width:768px) { .shop-page-wrap { padding:20px; min-height:calc(100vh - 150px); } }

.shop-card { background:white; border-radius:12px; padding:20px; box-shadow:0 2px 10px rgba(0,0,0,0.05); margin-bottom:20px; border:1px solid #f0f0f0; min-height:120px; }
@media(min-width:768px) { .shop-card { padding:28px; margin-bottom:24px; min-height:150px; } }

.shop-section-title { font-size:18px; font-weight:700; color:#000; margin-bottom:20px; padding-bottom:12px; border-bottom:2px solid #ccc; min-height:40px; display:flex; align-items:center; }
@media(min-width:768px) { .shop-section-title { font-size:18px; min-height:45px; } }

/* Upload form card specific */
.shop-card:first-of-type { min-height:200px; }
@media(min-width:768px) { .shop-card:first-of-type { min-height:220px; } }

.shop-form-label { display:block; font-weight:600; font-size:13px; color:#000; margin-bottom:6px; min-height:20px; }
@media(min-width:768px) { .shop-form-label { font-size:14px; margin-bottom:7px; min-height:22px; } }

.shop-form-ctrl { width:100%; padding:10px 12px; border:1.5px solid #666; border-radius:8px; font-size:14px; outline:none; transition:border-color 0.2s; box-sizing:border-box; background:white; min-height:45px; }
@media(min-width:768px) { .shop-form-ctrl { min-height:48px; } }
.shop-form-ctrl:focus { border-color:#000; }

.shop-btn-black { background:#000; color:white; padding:10px 18px; border:none; border-radius:8px; font-size:14px; font-weight:600; cursor:pointer; transition:background 0.2s; width:100%; display:flex; align-items:center; justify-content:center; gap:5px; min-height:45px; }
@media(min-width:768px) { .shop-btn-black { width:auto; padding:11px 28px; font-size:15px; min-height:48px; } }
.shop-btn-black:hover { background:#333; }

.shop-empty { text-align:center; color:#666; font-size:14px; padding:30px 15px; background:#f9f9f9; border-radius:8px; border:1px dashed #ccc; min-height:150px; display:flex; flex-direction:column; align-items:center; justify-content:center; }
@media(min-width:768px) { .shop-empty { font-size:15px; padding:40px 20px; min-height:180px; } }
.shop-empty i { display:block; font-size:32px; margin-bottom:12px; color:#999; }
@media(min-width:768px) { .shop-empty i { font-size:40px; } }

/* Mobile-first form grid */
.form-grid { display:grid; grid-template-columns:1fr; gap:15px; align-items:end; min-height:180px; }
@media(min-width:768px) { .form-grid { grid-template-columns:1fr 1fr auto; gap:12px; min-height:auto; } }

/* Image gallery grid */
.images-grid { display:grid; grid-template-columns:repeat(auto-fill, minmax(140px, 1fr)); gap:12px; min-height:120px; }
@media(min-width:768px) { .images-grid { gap:14px; min-height:130px; } }

.image-card { position:relative; width:100%; min-height:100px; }
.image-card img { width:100%; height:100px; object-fit:cover; border-radius:8px; border:1px solid #eee; background:#f9f9f9; min-height:100px; }
@media(min-width:768px) { .image-card img { height:100px; min-height:100px; } }

.delete-btn { position:absolute; top:5px; right:5px; background:rgba(0,0,0,0.8); color:#fff; border:none; border-radius:50%; width:28px; height:28px; cursor:pointer; font-size:12px; display:flex; align-items:center; justify-content:center; transition:background 0.2s; min-width:28px; min-height:28px; }
@media(min-width:768px) { .delete-btn { width:26px; height:26px; min-width:26px; min-height:26px; } }
.delete-btn:hover { background:#000; }

#upload-preview { display:none; margin-top:12px; max-height:80px; min-height:60px; border-radius:6px; border:1px solid #eee; background:#f9f9f9; object-fit:cover; }
@media(min-width:768px) { #upload-preview { max-height:100px; min-height:80px; } }

.product-header { display:flex; flex-direction:column; gap:5px; margin-bottom:14px; padding-bottom:10px; border-bottom:1px solid #f0f0f0; min-height:50px; }
@media(min-width:768px) { .product-header { flex-direction:row; align-items:center; justify-content:space-between; min-height:40px; } }

.product-title { font-size:16px; font-weight:700; color:#111; }
@media(min-width:768px) { .product-title { font-size:15px; } }

.image-count { font-size:12px; color:#666; font-weight:400; }
@media(min-width:768px) { .image-count { margin-left:8px; } }

/* Alert styles */
.alert-success { background:#f0f0f0; border:1px solid #999; color:#000; padding:12px 15px; border-radius:8px; margin-bottom:18px; font-size:14px; min-height:50px; display:flex; align-items:center; }
@media(min-width:768px) { .alert-success { padding:12px 18px; font-size:14px; min-height:55px; } }

.alert-error { background:#f0f0f0; border:1px solid #999; color:#000; margin-top:10px; font-size:13px; padding:10px 12px; border-radius:6px; min-height:40px; display:flex; align-items:center; }
</style>

<div class="shop-page-wrap">

    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle" style="margin-right:6px;"></i>{{ session('success') }}
        </div>
    @endif

    {{-- ── Upload Form ── --}}
    <div class="shop-card">
        <div class="shop-section-title"><i class="fas fa-cloud-upload-alt" style="margin-right:8px;"></i>Upload Product Image</div>

        <form method="POST" action="{{ route('shop.products.images.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-grid">
                <div>
                    <label class="shop-form-label">Product</label>
                    <select name="product_id" class="shop-form-ctrl" required>
                        <option value="">— Select product —</option>
                        @foreach($myProducts as $p)
                            <option value="{{ $p->id }}" {{ old('product_id') == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="shop-form-label">Image File <span style="color:#666;font-weight:400;">(JPG/PNG/WebP, max 10 MB)</span></label>
                    <input type="file" name="image_path" class="shop-form-ctrl" accept="image/jpeg,image/png,image/webp" required onchange="previewUpload(this)">
                </div>
                <div>
                    <button type="submit" class="shop-btn-black"><i class="fas fa-upload" style="margin-right:5px;"></i>Upload</button>
                </div>
            </div>
            <img id="upload-preview" src="" alt="Preview">
            @if($errors->any())
                <div class="alert-error">{{ $errors->first() }}</div>
            @endif
        </form>
    </div>

    {{-- ── Per-Product Image Galleries ── --}}
    @forelse($myProducts as $product)
        @if($product->images->count())
        <div class="shop-card">
            <div class="product-header">
                <div style="display:flex; align-items:center; gap:7px; flex-wrap:wrap;">
                    <i class="fas fa-box" style="color:#666;"></i>
                    <span class="product-title">{{ $product->name }}</span>
                    <span class="image-count">({{ $product->images->count() }} image(s))</span>
                </div>
            </div>
            <div class="images-grid">
                @foreach($product->images as $img)
                <div id="img-card-{{ $img->id }}" class="image-card">
                    <img src="{{ asset($img->image_path) }}" alt="">
                    <button onclick="deleteImage({{ $img->id }})" class="delete-btn">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    @empty
        <div class="shop-card">
            <div class="shop-empty"><i class="fas fa-images"></i>You have no products yet.</div>
        </div>
    @endforelse

    @if($myProducts->every(fn($p) => $p->images->count() === 0))
        <div class="shop-card">
            <div class="shop-empty"><i class="fas fa-images"></i>No product images uploaded yet. Use the form above to add some.</div>
        </div>
    @endif

</div>

@include('layouts.shop_footer')

<script>
const CSRF = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

function previewUpload(input) {
    const prev = document.getElementById('upload-preview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { prev.src = e.target.result; prev.style.display = 'block'; };
        reader.readAsDataURL(input.files[0]);
    } else {
        prev.style.display = 'none';
        prev.src = '';
    }
}

function deleteImage(id) {
    if (!confirm('Delete this image?')) return;
    fetch('{{ url("shop/products/images") }}/' + id, {
        method: 'DELETE',
        headers: { 'X-CSRF-TOKEN': CSRF }
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            const card = document.getElementById('img-card-' + id);
            if (card) card.remove();
            
            // Check if any images remain and update count
            const productCard = card?.closest('.shop-card');
            if (productCard) {
                const remainingImages = productCard.querySelectorAll('[id^="img-card-"]');
                const countSpan = productCard.querySelector('.image-count');
                if (countSpan) {
                    const newCount = remainingImages.length;
                    countSpan.textContent = `(${newCount} image${newCount !== 1 ? 's' : ''})`;
                    
                    // Remove product card if no images left
                    if (newCount === 0) {
                        productCard.remove();
                    }
                }
            }
        } else {
            alert('Error: ' + (data.message || 'Could not delete image'));
        }
    })
    .catch(() => alert('Error deleting. Please try again.'));
}
</script>