@include('layouts.shop_header')

<div class="shop-page-wrap">

    @if(session('success'))
        <div style="background:#f0fdf4;border:1px solid #bbf7d0;color:#166534;padding:12px 18px;border-radius:8px;margin-bottom:18px;font-size:14px;">
            <i class="fas fa-check-circle" style="margin-right:6px;"></i>{{ session('success') }}
        </div>
    @endif

    {{-- ── Upload Form ── --}}
    <div class="shop-card" style="padding:28px;margin-bottom:24px;">
        <div class="shop-section-title"><i class="fas fa-cloud-upload-alt" style="margin-right:8px;"></i>Upload Product Image</div>

        <form method="POST" action="{{ route('shop.products.images.store') }}" enctype="multipart/form-data">
            @csrf
            <div style="display:grid;grid-template-columns:1fr 1fr auto;gap:12px;align-items:end;">
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
                    <label class="shop-form-label">Image File <span style="color:#aaa;font-weight:400;">(JPG/PNG/WebP, max 10 MB)</span></label>
                    <input type="file" name="image_path" class="shop-form-ctrl" accept="image/jpeg,image/png,image/webp" required onchange="previewUpload(this)">
                </div>
                <div>
                    <button type="submit" class="shop-btn-black"><i class="fas fa-upload" style="margin-right:5px;"></i>Upload</button>
                </div>
            </div>
            <img id="upload-preview" src="" alt="" style="display:none;margin-top:10px;max-height:100px;border-radius:6px;border:1px solid #eee;">
            @if($errors->any())
                <div style="margin-top:10px;color:#991b1b;font-size:13px;">{{ $errors->first() }}</div>
            @endif
        </form>
    </div>

    {{-- ── Per-Product Image Galleries ── --}}
    @forelse($myProducts as $product)
        @if($product->images->count())
        <div class="shop-card" style="padding:24px;margin-bottom:20px;">
            <div style="font-size:15px;font-weight:700;color:#111;margin-bottom:14px;padding-bottom:10px;border-bottom:1px solid #f0f0f0;">
                <i class="fas fa-box" style="margin-right:7px;color:#666;"></i>{{ $product->name }}
                <span style="font-size:12px;color:#999;font-weight:400;margin-left:8px;">{{ $product->images->count() }} image(s)</span>
            </div>
            <div style="display:flex;flex-wrap:wrap;gap:14px;">
                @foreach($product->images as $img)
                <div id="img-card-{{ $img->id }}" style="position:relative;width:140px;">
                    <img src="{{ asset($img->image_path) }}" alt=""
                         style="width:140px;height:100px;object-fit:cover;border-radius:8px;border:1px solid #eee;">
                    <button onclick="deleteImage({{ $img->id }})"
                            style="position:absolute;top:5px;right:5px;background:rgba(0,0,0,0.65);color:#fff;border:none;border-radius:50%;width:26px;height:26px;cursor:pointer;font-size:12px;display:flex;align-items:center;justify-content:center;">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    @empty
        <div class="shop-card" style="padding:28px;">
            <div class="shop-empty"><i class="fas fa-images"></i>You have no products yet.</div>
        </div>
    @endforelse

    @if($myProducts->every(fn($p) => $p->images->count() === 0))
        <div class="shop-card" style="padding:28px;">
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
        }
    })
    .catch(() => alert('Error deleting. Please try again.'));
}
</script>
