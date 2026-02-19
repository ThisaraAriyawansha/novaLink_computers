@include('layouts.shop_header')
<style>
*, *::before, *::after { box-sizing: border-box; }

.wrap { max-width:1100px; margin:0 auto; padding:20px 14px 50px; }

/* ── Alert ── */
.alert-success {
    background:#f0fdf4; border:1px solid #bbf7d0; color:#166534;
    padding:11px 16px; border-radius:8px; margin-bottom:16px;
    font-size:13px; display:flex; align-items:center; gap:8px;
}

/* ── Account summary banner ── */
.account-banner {
    background:white; border:1px solid #e0e0e0; border-radius:10px;
    padding:16px 18px; margin-bottom:14px;
    display:flex; align-items:center; gap:16px; flex-wrap:wrap;
}
.avatar {
    width:50px; height:50px; border-radius:50%;
    background:#111; display:flex; align-items:center;
    justify-content:center; color:#fff; font-size:20px;
    font-weight:700; flex-shrink:0; letter-spacing:-.5px;
}
.account-info { flex:1; min-width:0; }
.account-name { font-size:16px; font-weight:700; color:#111; margin-bottom:2px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
.account-email { font-size:13px; color:#777; margin-bottom:5px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
.role-badge {
    display:inline-block; background:#f0f0f0; color:#555;
    padding:2px 10px; border-radius:12px; font-size:11px;
    font-weight:600; text-transform:uppercase; letter-spacing:.5px;
}
.account-meta { font-size:11px; color:#bbb; margin-left:auto; white-space:nowrap; align-self:flex-end; }

/* ── Two column grid ── */
.two-col {
    display:grid; grid-template-columns:1fr 1fr; gap:14px;
}

/* ── Card ── */
.card {
    background:white; border:1px solid #e0e0e0;
    border-radius:10px; overflow:hidden;
}
.card-header {
    padding:13px 18px; border-bottom:1px solid #ececec;
    background:#fafafa; display:flex; align-items:center; gap:8px;
}
.card-title { font-size:14px; font-weight:700; color:#111; }
.card-body { padding:18px; }

/* ── Form elements ── */
.form-group { margin-bottom:16px; }
.form-group:last-of-type { margin-bottom:0; }

.form-label {
    display:block; font-size:12px; font-weight:600;
    color:#444; margin-bottom:6px; letter-spacing:.01em;
}

.form-control {
    width:100%; padding:9px 12px;
    background:#fafafa; border:1.5px solid #ddd;
    border-radius:7px; font-size:13px; color:#111;
    font-family:inherit; outline:none; transition:border-color 0.15s;
}
.form-control:focus { border-color:#111; background:#fff; }
.form-control::placeholder { color:#bbb; }

.field-error { color:#b91c1c; font-size:11px; margin-top:4px; }

.form-hint {
    font-size:11px; color:#aaa;
    display:flex; align-items:center; gap:5px;
    margin-top:14px; margin-bottom:14px;
    padding:8px 10px; background:#f7f7f5;
    border-radius:6px; border:1px solid #ececec;
}

/* ── Submit button ── */
.btn-save {
    background:#111; color:#fff; border:none;
    border-radius:7px; padding:9px 22px;
    font-size:13px; font-weight:600; cursor:pointer;
    font-family:inherit; transition:background 0.15s;
    display:inline-flex; align-items:center; gap:6px;
}
.btn-save:hover { background:#333; }
.btn-save:active { transform:scale(0.98); }

/* ── Responsive ── */
@media (max-width:640px) {
    .wrap { padding:12px 10px 40px; }
    .two-col { grid-template-columns:1fr; }
    .account-meta { display:none; }
    .card-body { padding:14px; }
}
</style>

<div class="main-content">
<div class="wrap">

    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    {{-- ── Account Banner ── --}}
    <div class="account-banner">
        <div class="avatar">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
        <div class="account-info">
            <div class="account-name">{{ $user->name }}</div>
            <div class="account-email">{{ $user->email }}</div>
            <span class="role-badge">{{ $user->role }}</span>
        </div>
        <div class="account-meta">
            <i class="fas fa-calendar" style="margin-right:4px;opacity:.5;"></i>
            Joined {{ $user->created_at->format('M j, Y') }}
        </div>
    </div>

    <div class="two-col">

        {{-- ── Profile Info ── --}}
        <div class="card">
            <div class="card-header">
                <i class="fas fa-user-cog" style="opacity:.45;font-size:13px;"></i>
                <span class="card-title">Account Information</span>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('shop.profile.update') }}">
                    @csrf @method('PUT')

                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control"
                               value="{{ old('name', $user->name) }}" required>
                        @error('name')<div class="field-error">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control"
                               value="{{ old('email', $user->email) }}" required>
                        @error('email')<div class="field-error">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-hint">
                        <i class="fas fa-info-circle" style="opacity:.5;font-size:11px;"></i>
                        Changes will update your login credentials.
                    </div>

                    <button type="submit" class="btn-save">
                        <i class="fas fa-save" style="font-size:12px;"></i> Save Changes
                    </button>
                </form>
            </div>
        </div>

        {{-- ── Change Password ── --}}
        <div class="card">
            <div class="card-header">
                <i class="fas fa-lock" style="opacity:.45;font-size:13px;"></i>
                <span class="card-title">Change Password</span>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('shop.profile.password') }}">
                    @csrf @method('PATCH')

                    <div class="form-group">
                        <label class="form-label">Current Password</label>
                        <input type="password" name="current_password" class="form-control" required>
                        @error('current_password')<div class="field-error">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">New Password</label>
                        <input type="password" name="new_password" class="form-control" required minlength="8">
                        @error('new_password')<div class="field-error">{{ $message }}</div>@enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" class="form-control" required>
                    </div>

                    <div class="form-hint">
                        <i class="fas fa-shield-alt" style="opacity:.5;font-size:11px;"></i>
                        Use at least 8 characters for a strong password.
                    </div>

                    <button type="submit" class="btn-save">
                        <i class="fas fa-key" style="font-size:12px;"></i> Update Password
                    </button>
                </form>
            </div>
        </div>

    </div>

</div>
@include('layouts.shop_footer')
</div>