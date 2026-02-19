@include('layouts.shop_header')

<div class="shop-page-wrap">

    @if(session('success'))
        <div style="background:#f0fdf4;border:1px solid #bbf7d0;color:#166534;padding:12px 18px;border-radius:8px;margin-bottom:18px;font-size:14px;">
            <i class="fas fa-check-circle" style="margin-right:6px;"></i>{{ session('success') }}
        </div>
    @endif

    <div class="shop-card" style="padding:28px;">
        <div class="shop-section-title"><i class="fas fa-star" style="margin-right:8px;"></i>Customer Reviews</div>

        {{-- Filters --}}
        <form method="GET" action="{{ route('shop.reviews.index') }}" style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:20px;">
            <select name="rating" class="shop-form-ctrl" style="width:160px;">
                <option value="">All Ratings</option>
                @for($i = 5; $i >= 1; $i--)
                    <option value="{{ $i }}" {{ request('rating') == $i ? 'selected' : '' }}>{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                @endfor
            </select>
            <select name="status" class="shop-form-ctrl" style="width:160px;">
                <option value="">All Status</option>
                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>Visible</option>
                <option value="2" {{ request('status') == '2' ? 'selected' : '' }}>Hidden</option>
            </select>
            <button type="submit" class="shop-btn-black"><i class="fas fa-filter" style="margin-right:5px;"></i>Filter</button>
            @if(request('rating') || request('status'))
                <a href="{{ route('shop.reviews.index') }}" class="shop-btn-outline">Clear</a>
            @endif
        </form>

        @if($reviews->isEmpty())
            <div class="shop-empty">
                <i class="fas fa-star"></i>
                No reviews found for your products yet.
            </div>
        @else
            <div style="overflow-x:auto;">
                <table class="shop-table">
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
                            <td style="max-width:160px;font-size:13px;">{{ $review->product->name ?? '—' }}</td>
                            <td>
                                <div style="font-weight:600;font-size:13px;">{{ $review->name }}</div>
                                <div style="font-size:12px;color:#888;">{{ $review->email }}</div>
                            </td>
                            <td>
                                <span style="color:#f59e0b;font-size:14px;">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star{{ $i <= $review->rating ? '' : '-o' }}" style="{{ $i <= $review->rating ? '' : 'opacity:0.25;' }}"></i>
                                    @endfor
                                </span>
                                <span style="font-size:12px;color:#666;margin-left:4px;">{{ $review->rating }}/5</span>
                            </td>
                            <td style="max-width:260px;">
                                <span style="font-size:13px;color:#444;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">
                                    {{ $review->message }}
                                </span>
                            </td>
                            <td style="font-size:12px;color:#888;white-space:nowrap;">
                                {{ $review->created_at->format('M j, Y') }}
                            </td>
                            <td>
                                @if($review->status == 2)
                                    <span class="shop-badge-active">Visible</span>
                                @else
                                    <span class="shop-badge-inactive">Hidden</span>
                                @endif
                            </td>
                            <td>
                                <form method="POST" action="{{ route('shop.reviews.toggle', $review->id) }}">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="shop-action-btn {{ $review->status == 2 ? 'shop-btn-danger' : 'shop-btn-edit' }}">
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

            <div style="margin-top:18px;">
                {{ $reviews->links() }}
            </div>
        @endif
    </div>
</div>

@include('layouts.shop_footer')
