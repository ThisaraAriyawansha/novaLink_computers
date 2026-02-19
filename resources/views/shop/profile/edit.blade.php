@include('layouts.shop_header')

<div class="shop-page-wrap">

    @if(session('success'))
        <div style="background:#f0fdf4;border:1px solid #bbf7d0;color:#166534;padding:12px 18px;border-radius:8px;margin-bottom:20px;font-size:14px;">
            <i class="fas fa-check-circle" style="margin-right:6px;"></i>{{ session('success') }}
        </div>
    @endif

    <div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">

        {{-- ── Profile Info ── --}}
        <div class="shop-card" style="padding:28px;">
            <div class="shop-section-title"><i class="fas fa-user-cog" style="margin-right:8px;"></i>Account Information</div>

            <form method="POST" action="{{ route('shop.profile.update') }}">
                @csrf @method('PUT')

                <div class="shop-form-group">
                    <label class="shop-form-label">Full Name</label>
                    <input type="text" name="name" class="shop-form-ctrl" value="{{ old('name', $user->name) }}" required>
                    @error('name')<div style="color:#991b1b;font-size:12px;margin-top:4px;">{{ $message }}</div>@enderror
                </div>

                <div class="shop-form-group">
                    <label class="shop-form-label">Email Address</label>
                    <input type="email" name="email" class="shop-form-ctrl" value="{{ old('email', $user->email) }}" required>
                    @error('email')<div style="color:#991b1b;font-size:12px;margin-top:4px;">{{ $message }}</div>@enderror
                </div>

                <div style="margin-top:6px;">
                    <div style="font-size:12px;color:#888;margin-bottom:12px;">
                        <i class="fas fa-info-circle" style="margin-right:4px;"></i>
                        Account created: {{ $user->created_at->format('M j, Y') }}
                    </div>
                    <button type="submit" class="shop-btn-black">
                        <i class="fas fa-save" style="margin-right:6px;"></i>Save Changes
                    </button>
                </div>
            </form>
        </div>

        {{-- ── Change Password ── --}}
        <div class="shop-card" style="padding:28px;">
            <div class="shop-section-title"><i class="fas fa-lock" style="margin-right:8px;"></i>Change Password</div>

            <form method="POST" action="{{ route('shop.profile.password') }}">
                @csrf @method('PATCH')

                <div class="shop-form-group">
                    <label class="shop-form-label">Current Password</label>
                    <input type="password" name="current_password" class="shop-form-ctrl" required>
                    @error('current_password')<div style="color:#991b1b;font-size:12px;margin-top:4px;">{{ $message }}</div>@enderror
                </div>

                <div class="shop-form-group">
                    <label class="shop-form-label">New Password</label>
                    <input type="password" name="new_password" class="shop-form-ctrl" required minlength="8">
                    @error('new_password')<div style="color:#991b1b;font-size:12px;margin-top:4px;">{{ $message }}</div>@enderror
                </div>

                <div class="shop-form-group">
                    <label class="shop-form-label">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" class="shop-form-ctrl" required>
                </div>

                <div style="margin-top:6px;">
                    <div style="font-size:12px;color:#888;margin-bottom:12px;">
                        <i class="fas fa-shield-alt" style="margin-right:4px;"></i>
                        Use at least 8 characters for a strong password.
                    </div>
                    <button type="submit" class="shop-btn-black">
                        <i class="fas fa-key" style="margin-right:6px;"></i>Update Password
                    </button>
                </div>
            </form>
        </div>

    </div>

    {{-- ── Account Summary ── --}}
    <div class="shop-card" style="padding:24px;margin-top:20px;">
        <div style="display:flex;align-items:center;gap:18px;">
            <div style="width:56px;height:56px;border-radius:50%;background:#111;display:flex;align-items:center;justify-content:center;color:#fff;font-size:22px;flex-shrink:0;">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>
            <div>
                <div style="font-size:17px;font-weight:700;color:#111;">{{ $user->name }}</div>
                <div style="font-size:13px;color:#666;margin-top:2px;">{{ $user->email }}</div>
                <div style="font-size:12px;color:#999;margin-top:4px;">
                    <span style="background:#f0f0f0;padding:2px 10px;border-radius:12px;font-weight:600;text-transform:uppercase;letter-spacing:.5px;">
                        {{ $user->role }}
                    </span>
                </div>
            </div>
        </div>
    </div>

</div>

@include('layouts.shop_footer')
