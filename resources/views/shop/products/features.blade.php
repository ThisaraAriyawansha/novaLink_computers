@include('layouts.shop_header')

<style>
/* Mobile Responsive Black & White Styles */
.shop-page-wrap { max-width:1200px; margin:0 auto; padding:15px; min-height:calc(100vh - 200px); }
@media(min-width:768px) { .shop-page-wrap { padding:20px; min-height:calc(100vh - 150px); } }

.shop-card { background:white; border-radius:12px; padding:20px; box-shadow:0 2px 10px rgba(0,0,0,0.05); margin-bottom:20px; border:1px solid #f0f0f0; min-height:150px; }
@media(min-width:768px) { .shop-card { padding:28px; margin-bottom:24px; min-height:180px; } }

/* Upload form card specific */
.shop-card:first-of-type { min-height:220px; }
@media(min-width:768px) { .shop-card:first-of-type { min-height:200px; } }

.shop-section-title { font-size:18px; font-weight:700; color:#000; margin-bottom:20px; padding-bottom:12px; border-bottom:2px solid #ccc; min-height:40px; display:flex; align-items:center; }
@media(min-width:768px) { .shop-section-title { font-size:18px; min-height:45px; } }

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
.form-grid { display:grid; grid-template-columns:1fr; gap:15px; align-items:end; min-height:280px; }
@media(min-width:768px) { .form-grid { grid-template-columns:1fr 1fr 1fr auto; gap:12px; min-height:auto; } }

/* Table Styles */
.table-responsive { overflow-x:auto; margin:0 -20px; padding:0 20px; width:calc(100% + 40px); }
@media(min-width:768px) { .table-responsive { margin:0; padding:0; width:100%; } }

.shop-table { width:100%; border-collapse:collapse; font-size:13px; min-width:600px;border:none}
@media(min-width:768px) { .shop-table { font-size:14px; min-width:0; } }

.shop-table th { background:#f5f5f5; color:#000; font-weight:600; padding:12px 10px; text-align:left; border-bottom:2px solid #ccc; white-space:nowrap; }
@media(min-width:768px) { .shop-table th { padding:14px 12px; } }

.shop-table td { padding:15px 10px; border-bottom:1px solid #eee; vertical-align:middle; }
@media(min-width:768px) { .shop-table td { padding:15px 12px; } }

.shop-table tr:hover { background:#fafafa; }

/* Action Buttons */
.shop-action-btn { padding:8px 12px; border:none; border-radius:6px; font-size:12px; font-weight:500; cursor:pointer; margin:0 4px 4px 0; display:inline-flex; align-items:center; gap:4px; transition:all 0.2s; min-height:36px; }
@media(min-width:768px) { .shop-action-btn { padding:8px 14px; font-size:13px; margin:0 5px 0 0; min-height:38px; } }

.shop-btn-edit { background:#e0e0e0; color:#000; }
.shop-btn-edit:hover { background:#d0d0d0; }

.shop-btn-danger { background:#333; color:white; }
.shop-btn-danger:hover { background:#000; }

/* Product name column */
.product-name-cell { max-width:150px; font-weight:500; color:#111; }
@media(min-width:768px) { .product-name-cell { max-width:200px; } }

/* Feature name/value cells */
.feature-cell { min-width:100px; }
@media(min-width:768px) { .feature-cell { min-width:120px; } }

/* Edit inputs in table */
.edit-input { display:none; width:100%; padding:8px; border:1.5px solid #666; border-radius:4px; font-size:13px; min-height:38px; }

/* Pagination */
.pagination-wrap { margin-top:18px; display:flex; justify-content:center; }
@media(min-width:768px) { .pagination-wrap { justify-content:flex-start; } }

.pagination { display:flex; gap:5px; flex-wrap:wrap; list-style:none; padding:0; }
.pagination li a, .pagination li span { display:block; padding:8px 12px; background:#f5f5f5; color:#000; border-radius:6px; font-size:13px; min-width:35px; text-align:center; text-decoration:none; min-height:35px; line-height:1; }
.pagination li.active span { background:#000; color:white; }
.pagination li a:hover { background:#ccc; }

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

    {{-- ── Add Feature Form ── --}}
    <div class="shop-card">
        <div class="shop-section-title"><i class="fas fa-plus-circle" style="margin-right:8px;"></i>Add Feature to Product</div>

        <form method="POST" action="{{ route('shop.products.features.store') }}">
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
                <div class="alert-error">{{ $errors->first() }}</div>
            @endif
        </form>
    </div>

    {{-- ── Features Table ── --}}
    <div class="shop-card" style="min-height:300px;">
        <div class="shop-section-title"><i class="fas fa-tags" style="margin-right:8px;"></i>Product Features</div>

        @if($features->isEmpty())
            <div class="shop-empty"><i class="fas fa-tags"></i>No features yet. Add one above.</div>
        @else
            <div class="table-responsive">
                <table class="shop-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product</th>
                            <th>Feature Name</th>
                            <th>Feature Value</th>
                            <th style="min-width:150px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($features as $f)
                        <tr id="row-{{ $f->id }}">
                            <td style="font-weight:500;">{{ $loop->iteration }}</td>
                            <td class="product-name-cell">{{ $f->product->name ?? '—' }}</td>
                            <td class="feature-cell">
                                <span class="view-name-{{ $f->id }}">{{ $f->feature_name }}</span>
                                <input type="text" class="shop-form-ctrl edit-input edit-input-{{ $f->id }}" style="display:none;" value="{{ $f->feature_name }}">
                            </td>
                            <td class="feature-cell">
                                <span class="view-val-{{ $f->id }}">{{ $f->feature_value }}</span>
                                <input type="text" class="shop-form-ctrl edit-input edit-input-val-{{ $f->id }}" style="display:none;" value="{{ $f->feature_value }}">
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

            <div class="pagination-wrap">
                {{ $features->links() }}
            </div>
        @endif
    </div>

</div>

@include('layouts.shop_footer')

<script>
const CSRF = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

function startEdit(id) {
    // Hide view elements
    document.querySelector('.view-name-' + id).style.display = 'none';
    document.querySelector('.view-val-' + id).style.display = 'none';
    
    // Show edit inputs
    document.querySelector('.edit-input-' + id).style.display = 'block';
    document.querySelector('.edit-input-val-' + id).style.display = 'block';
    
    // Toggle buttons
    document.getElementById('edit-btn-' + id).style.display = 'none';
    document.getElementById('save-btn-' + id).style.display = 'inline-flex';
}

function saveEdit(id) {
    const name  = document.querySelector('.edit-input-' + id).value.trim();
    const value = document.querySelector('.edit-input-val-' + id).value.trim();
    
    if (!name || !value) { 
        alert('Both fields are required.'); 
        return; 
    }

    fetch('{{ url("shop/products/features") }}/' + id, {
        method: 'PUT',
        headers: { 
            'Content-Type': 'application/json', 
            'X-CSRF-TOKEN': CSRF 
        },
        body: JSON.stringify({ 
            feature_name: name, 
            feature_value: value 
        })
    })
    .then(r => r.json())
    .then(data => {
        if (data.success) {
            // Update displayed values
            document.querySelector('.view-name-' + id).textContent = name;
            document.querySelector('.view-val-' + id).textContent = value;
            
            // Show view elements
            document.querySelector('.view-name-' + id).style.display = '';
            document.querySelector('.view-val-' + id).style.display = '';
            
            // Hide edit inputs
            document.querySelector('.edit-input-' + id).style.display = 'none';
            document.querySelector('.edit-input-val-' + id).style.display = 'none';
            
            // Toggle buttons
            document.getElementById('edit-btn-' + id).style.display = 'inline-flex';
            document.getElementById('save-btn-' + id).style.display = 'none';
        } else {
            alert('Error: ' + (data.message || 'Could not save changes'));
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
            const row = document.getElementById('row-' + id);
            if (row) {
                row.remove();
                
                // Check if table is empty and show empty state
                const tbody = document.querySelector('tbody');
                if (tbody && tbody.children.length === 0) {
                    location.reload(); // Reload to show empty state
                }
            }
        } else {
            alert('Error: ' + (data.message || 'Could not delete feature'));
        }
    })
    .catch(() => alert('Error deleting. Please try again.'));
}
</script>