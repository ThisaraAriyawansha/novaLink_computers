@include('layouts.shop_header')

<div class="shop-page-wrap">

    @if(session('success'))
        <div style="background:#f0fdf4;border:1px solid #bbf7d0;color:#166534;padding:12px 18px;border-radius:8px;margin-bottom:18px;font-size:14px;">
            <i class="fas fa-check-circle" style="margin-right:6px;"></i>{{ session('success') }}
        </div>
    @endif

    {{-- ── Add Feature Form ── --}}
    <div class="shop-card" style="padding:28px;margin-bottom:24px;">
        <div class="shop-section-title"><i class="fas fa-plus-circle" style="margin-right:8px;"></i>Add Feature to Product</div>

        <form method="POST" action="{{ route('shop.products.features.store') }}">
            @csrf
            <div style="display:grid;grid-template-columns:1fr 1fr 1fr auto;gap:12px;align-items:end;">
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
                    <label class="shop-form-label">Feature Name</label>
                    <input type="text" name="feature_name" class="shop-form-ctrl" value="{{ old('feature_name') }}" placeholder="e.g. RAM" required>
                </div>
                <div>
                    <label class="shop-form-label">Feature Value</label>
                    <input type="text" name="feature_value" class="shop-form-ctrl" value="{{ old('feature_value') }}" placeholder="e.g. 16 GB DDR5" required>
                </div>
                <div>
                    <button type="submit" class="shop-btn-black"><i class="fas fa-plus" style="margin-right:5px;"></i>Add</button>
                </div>
            </div>
            @if($errors->any())
                <div style="margin-top:10px;color:#991b1b;font-size:13px;">{{ $errors->first() }}</div>
            @endif
        </form>
    </div>

    {{-- ── Features Table ── --}}
    <div class="shop-card" style="padding:28px;">
        <div class="shop-section-title"><i class="fas fa-tags" style="margin-right:8px;"></i>Product Features</div>

        @if($features->isEmpty())
            <div class="shop-empty"><i class="fas fa-tags"></i>No features yet. Add one above.</div>
        @else
            <div style="overflow-x:auto;">
                <table class="shop-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Feature Name</th>
                            <th>Feature Value</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($features as $f)
                        <tr id="row-{{ $f->id }}">
                            <td>{{ $loop->iteration }}</td>
                            <td style="max-width:200px;">{{ $f->product->name ?? '—' }}</td>
                            <td>
                                <span class="view-name-{{ $f->id }}">{{ $f->feature_name }}</span>
                                <input type="text" class="shop-form-ctrl edit-input-{{ $f->id }}" style="display:none;" value="{{ $f->feature_name }}">
                            </td>
                            <td>
                                <span class="view-val-{{ $f->id }}">{{ $f->feature_value }}</span>
                                <input type="text" class="shop-form-ctrl edit-input-val-{{ $f->id }}" style="display:none;" value="{{ $f->feature_value }}">
                            </td>
                            <td>
                                <button class="shop-action-btn shop-btn-edit" onclick="startEdit({{ $f->id }})" id="edit-btn-{{ $f->id }}">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </button>
                                <button class="shop-action-btn shop-btn-black" onclick="saveEdit({{ $f->id }})" id="save-btn-{{ $f->id }}" style="display:none;">
                                    <i class="fas fa-save"></i> Save
                                </button>
                                <button class="shop-action-btn shop-btn-danger" onclick="deleteFeature({{ $f->id }})">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div style="margin-top:18px;">
                {{ $features->links() }}
            </div>
        @endif
    </div>

</div>

@include('layouts.shop_footer')

<script>
const CSRF = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

function startEdit(id) {
    document.querySelector('.view-name-' + id).style.display = 'none';
    document.querySelector('.view-val-' + id).style.display = 'none';
    document.querySelector('.edit-input-' + id).style.display = 'block';
    document.querySelector('.edit-input-val-' + id).style.display = 'block';
    document.getElementById('edit-btn-' + id).style.display = 'none';
    document.getElementById('save-btn-' + id).style.display = 'inline-flex';
}

function saveEdit(id) {
    const name  = document.querySelector('.edit-input-' + id).value.trim();
    const value = document.querySelector('.edit-input-val-' + id).value.trim();
    if (!name || !value) { alert('Both fields are required.'); return; }

    fetch('{{ url("shop/products/features") }}/' + id, {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': CSRF },
        body: JSON.stringify({ feature_name: name, feature_value: value })
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            document.querySelector('.view-name-' + id).textContent = name;
            document.querySelector('.view-val-' + id).textContent = value;
            document.querySelector('.view-name-' + id).style.display = '';
            document.querySelector('.view-val-' + id).style.display = '';
            document.querySelector('.edit-input-' + id).style.display = 'none';
            document.querySelector('.edit-input-val-' + id).style.display = 'none';
            document.getElementById('edit-btn-' + id).style.display = 'inline-flex';
            document.getElementById('save-btn-' + id).style.display = 'none';
        }
    })
    .catch(() => alert('Error saving. Please try again.'));
}

function deleteFeature(id) {
    if (!confirm('Delete this feature?')) return;
    fetch('{{ url("shop/products/features") }}/' + id, {
        method: 'DELETE',
        headers: { 'X-CSRF-TOKEN': CSRF }
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            document.getElementById('row-' + id).remove();
        }
    })
    .catch(() => alert('Error deleting. Please try again.'));
}
</script>
