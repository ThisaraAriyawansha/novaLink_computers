@include('layouts.shop_header')

<style>
*, *::before, *::after { box-sizing: border-box; }

.wrap {
    max-width: 1200px;
    margin: 20px auto;
    padding: 0 14px 50px;
}

/* ── Alert ── */
.alert-success {
    background: #f0fdf4;
    border: 1px solid #bbf7d0;
    color: #166534;
    padding: 11px 16px;
    border-radius: 8px;
    margin-bottom: 16px;
    font-size: 13px;
    display: flex;
    align-items: center;
    gap: 8px;
}

/* ── Card ── */
.table-card {
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 10px;
    overflow: hidden;
}

.card-header {
    padding: 16px 18px;
    border-bottom: 1px solid #ececec;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    gap: 12px;
}

.card-title {
    font-size: 15px;
    font-weight: 700;
    color: #111;
    display: flex;
    align-items: center;
    gap: 7px;
}

/* ── Filter form ── */
.filter-form {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    padding: 14px 18px;
    border-bottom: 1px solid #f0f0f0;
    background: #fafafa;
}

.filter-select {
    padding: 8px 12px;
    border: 1px solid #ccc;
    border-radius: 7px;
    font-size: 13px;
    background: #fff;
    color: #111;
    outline: none;
    cursor: pointer;
    font-family: inherit;
    flex: 1;
    min-width: 130px;
    transition: border-color 0.15s;
}
.filter-select:focus { border-color: #000; }

.filter-btn {
    padding: 8px 16px;
    background: #000;
    color: #fff;
    border: none;
    border-radius: 7px;
    font-size: 13px;
    cursor: pointer;
    font-family: inherit;
    white-space: nowrap;
    transition: background 0.15s;
}
.filter-btn:hover { background: #333; }

.clear-btn {
    padding: 8px 14px;
    background: #f0f0f0;
    color: #444;
    border: 1px solid #ccc;
    border-radius: 7px;
    font-size: 13px;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    white-space: nowrap;
    transition: background 0.15s;
}
.clear-btn:hover { background: #e0e0e0; color: #111; }

/* ── Stars ── */
.stars { color: #f59e0b; font-size: 13px; display: flex; align-items: center; gap: 1px; }
.star-dim { opacity: 0.2; }

/* ── Badge ── */
.badge {
    display: inline-block;
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
}
.badge-visible  { background: #f0f0f0; color: #000; border: 1px solid #999; }
.badge-hidden   { background: #f9f9f9; color: #aaa; border: 1px solid #ddd; }

/* ── Action button ── */
.action-btn {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 500;
    border: none;
    cursor: pointer;
    font-family: inherit;
    white-space: nowrap;
    transition: background 0.15s;
}
.btn-hide { background: #fee2e2; color: #b91c1c; }
.btn-hide:hover { background: #fecaca; }
.btn-show { background: #e8e8e8; color: #111; }
.btn-show:hover { background: #d5d5d5; }

/* ── Desktop table ── */
.table-responsive { overflow-x: auto; -webkit-overflow-scrolling: touch;  }

.review-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 700px;
    border:none;
}

.review-table th {
    background: #f5f5f5;
    padding: 11px 14px;
    text-align: left;
    font-size: 12px;
    font-weight: 600;
    color: #000;
    border-bottom: 2px solid #ddd;
    white-space: nowrap;
}

.review-table td {
    padding: 11px 14px;
    border-bottom: 1px solid #f0f0f0;
    font-size: 13px;
    color: #333;
    vertical-align: middle;
}

.review-table tr:last-child td { border-bottom: none; }
.review-table tr:hover td { background: #fafafa; }

.review-text {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    font-size: 13px;
    color: #555;
    max-width: 240px;
}

/* ── Mobile cards ── */
.mobile-list { display: none; }

.mobile-card {
    padding: 14px;
    border-bottom: 1px solid #f0f0f0;
}
.mobile-card:last-child { border-bottom: none; }

.mc-row1 {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 10px;
    margin-bottom: 6px;
}

.mc-product {
    font-size: 13px;
    font-weight: 700;
    color: #000;
    flex: 1;
    min-width: 0;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

.mc-reviewer {
    font-size: 12px;
    color: #555;
    margin-bottom: 6px;
}

.mc-reviewer span { color: #999; }

.mc-stars-row {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 7px;
}

.mc-message {
    font-size: 13px;
    color: #555;
    line-height: 1.5;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
    margin-bottom: 10px;
}

.mc-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 8px;
    flex-wrap: wrap;
}

.mc-date { font-size: 11px; color: #aaa; }

.mc-footer .action-btn {
    flex: 1;
    justify-content: center;
    padding: 9px 12px;
    font-size: 13px;
}

/* ── Empty ── */
.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #999;
}
.empty-state i { font-size: 40px; color: #ccc; display: block; margin-bottom: 12px; }

/* ── Pagination ── */
.pagination-wrap {
    padding: 13px 18px;
    border-top: 1px solid #f0f0f0;
}

/* ── Mobile ── */
@media (max-width: 640px) {
    .wrap { padding: 0 10px 40px; }
    .table-responsive { display: none; }
    .mobile-list { display: block; }
    .filter-form { padding: 12px; gap: 7px; }
    .filter-select { flex: 1 1 calc(50% - 4px); min-width: 0; }
    .filter-btn, .clear-btn { flex: 1; justify-content: center; text-align: center; }
    .card-header { padding: 13px 14px; }
}
</style>

<div class="main-content">
<div class="wrap">

    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    <div class="table-card">

        <div class="card-header">
            <div class="card-title"><i class="fas fa-star" style="color:#f59e0b;"></i> Customer Reviews</div>
        </div>

        {{-- Filters --}}
        <form method="GET" action="{{ route('shop.reviews.index') }}" class="filter-form">
            <select name="rating" class="filter-select">
                <option value="">All Ratings</option>
                @for($i = 5; $i >= 1; $i--)
                    <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                @endfor
            </select>
            <select name="status" class="filter-select">
                <option value="">All Status</option>
                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Visible</option>
                <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>Hidden</option>
            </select>
            <button type="submit" class="filter-btn"><i class="fas fa-filter" style="margin-right:5px;"></i>Filter</button>
            @if(request('rating') || request('status'))
                <a href="{{ route('shop.reviews.index') }}" class="clear-btn">Clear</a>
            @endif
        </form>

        @if($reviews->isEmpty())
            <div class="empty-state">
                <i class="fas fa-star"></i>
                No reviews found for your products yet.
            </div>
        @else

        {{-- ── Desktop Table ── --}}
        <div class="table-responsive">
            <table class="review-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Reviewer</th>
                        <th>Rating</th>
                        <th>Review</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reviews as $review)
                    <tr>
                        <td style="max-width:150px;font-weight:600;font-size:13px;">{{ $review->product->name ?? '—' }}</td>
                        <td>
                            <div style="font-weight:600;font-size:13px;">{{ $review->name }}</div>
                            <div style="font-size:12px;color:#999;">{{ $review->email }}</div>
                        </td>
                        <td>
                            <div class="stars">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="fas fa-star {{ $i <= $review->rating ? '' : 'star-dim' }}"></i>
                                @endfor
                            </div>
                            <div class="hidden" style="font-size:11px;color:#aaa;margin-top:2px;">{{ $review->rating }}/5</div>
                        </td>
                        <td><div class="review-text">{{ $review->message }}</div></td>
                        <td style="font-size:12px;color:#aaa;white-space:nowrap;">{{ $review->created_at->format('M j, Y') }}</td>
                        <td>
                            <span class="badge {{ $review->status == 2 ? 'badge-visible' : 'badge-hidden' }}">
                                {{ $review->status == 2 ? 'Visible' : 'Hidden' }}
                            </span>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('shop.reviews.toggle', $review->id) }}">
                                @csrf @method('PATCH')
                                <button type="submit" class="action-btn {{ $review->status == 2 ? 'btn-hide' : 'btn-show' }}">
                                    <i class="fas fa-{{ $review->status == 2 ? 'eye-slash' : 'eye' }}"></i>
                                    {{ $review->status == 2 ? 'Hide' : 'Show' }}
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- ── Mobile Card List ── --}}
        <div class="mobile-list">
            @foreach($reviews as $review)
            <div class="mobile-card">
                <div class="mc-row1">
                    <div class="mc-product">{{ $review->product->name ?? '—' }}</div>
                    <span class="badge {{ $review->status == 2 ? 'badge-visible' : 'badge-hidden' }}">
                        {{ $review->status == 2 ? 'Visible' : 'Hidden' }}
                    </span>
                </div>
                <div class="mc-reviewer">{{ $review->name }} <span>· {{ $review->email }}</span></div>
                <div class="mc-stars-row">
                    <div class="stars">
                        @for($i = 1; $i <= 5; $i++)
                            <i class="fas fa-star {{ $i <= $review->rating ? '' : 'star-dim' }}"></i>
                        @endfor
                    </div>
                    <span style="font-size:12px;color:#aaa;">{{ $review->rating }}/5</span>
                </div>
                <div class="mc-message">{{ $review->message }}</div>
                <div class="mc-footer">
                    <span class="mc-date"><i class="fas fa-calendar" style="margin-right:4px;"></i>{{ $review->created_at->format('M j, Y') }}</span>
                    <form method="POST" action="{{ route('shop.reviews.toggle', $review->id) }}" style="flex:1;display:flex;">
                        @csrf @method('PATCH')
                        <button type="submit" class="action-btn {{ $review->status == 2 ? 'btn-hide' : 'btn-show' }}" style="flex:1;justify-content:center;">
                            <i class="fas fa-{{ $review->status == 2 ? 'eye-slash' : 'eye' }}"></i>
                            {{ $review->status == 2 ? 'Hide' : 'Show' }}
                        </button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>

        <div class="pagination-wrap">
            {{ $reviews->links() }}
        </div>

        @endif
    </div>
</div>
</div>