@include('layouts.header')

<style>
    :root {
        --black: #000000;
        --white: #ffffff;
        --gray-100: #f8f9fa;
        --gray-200: #e9ecef;
        --gray-600: #6c757d;
        --gray-800: #343a40;
        --primary: #000000;
        --radius-sm: 4px;
        --radius: 8px;
        --radius-lg: 12px;
        --shadow-sm: 0 1px 3px rgba(0,0,0,0.1);
        --shadow: 0 4px 6px rgba(0,0,0,0.1);
        --transition: all 0.3s ease;
    }

    /* Base Styles */
    .main-content {
        min-height: 75vh;
    }

    .wg-box {
        background: var(--white);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow);
        padding: 2.5rem;
        margin: 1.5rem;
        max-width: 800px;
        margin-left: auto;
        margin-right: auto;
    }

    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2.5rem;
        flex-wrap: wrap;
        gap: 1.5rem;
        
    }

    .admin-header h3 {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--black);
        font-family: 'Inter', sans-serif;
        margin: 0;
        letter-spacing: -0.5px;
        font-size: 18px; font-family: 'Orbitron', sans-serif;
    }

    .last-updated {
        background: var(--white);
        padding: 0.75rem 1.25rem;
        border-radius: var(--radius-sm);
        border: 1px solid var(--gray-200);
        font-size: 1rem;
        color: var(--gray-600);
        box-shadow: var(--shadow-sm);
    }

    /* Form Styles */
    .form-style-1 {
        display: flex;
        flex-direction: column;
        gap: 1.75rem;
    }

    fieldset {
        border: none;
        padding: 0;
        margin: 0;
    }

    .body-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: 0.75rem;
        display: block;
    }

    .tf-color-1 {
        color: #dc3545;
    }

    input[type="email"],
    input[type="password"],
    input[type="text"] {
        width: 100%;
        padding: 1rem;
        border: 1px solid var(--gray-200);
        border-radius: var(--radius-sm);
        font-size: 1rem;
        transition: var(--transition);
        background-color: var(--white);
    }

    input[type="email"]:focus,
    input[type="password"]:focus,
    input[type="text"]:focus {
        outline: none;
        border-color: var(--black);
        box-shadow: 0 0 0 2px rgba(0,0,0,0.1);
    }

    .bot {
        display: flex;
        justify-content: flex-end;
        margin-top: 2rem;
    }

    /* Button Styles */
    .btn-black {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background-color: var(--black);
        color: var(--white);
        border: 2px solid var(--black);
        padding: 1rem 2.5rem;
        font-size: 1rem;
        font-weight: 600;
        border-radius: var(--radius-sm);
        cursor: pointer;
        transition: var(--transition);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-black:hover {
        background-color: var(--white);
        color: var(--black);
    }

    /* Alert Styles */
    .alert {
        padding: 1.25rem;
        margin-bottom: 1.5rem;
        border-radius: var(--radius-sm);
        display: flex;
        align-items: flex-start;
        gap: 1rem;
    }

    .alert-danger {
        background-color: #fff5f5;
        border-left: 4px solid #ff3b3b;
        color: #ff3b3b;
    }

    .alert-success {
        background-color: #f0fff4;
        border-left: 4px solid #38a169;
        color: #38a169;
    }

    .alert-icon {
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .alert-content {
        flex-grow: 1;
    }

    .alert-content strong {
        display: block;
        margin-bottom: 0.5rem;
    }

    .alert-content ul {
        margin: 0;
        padding-left: 1.25rem;
        list-style-type: none;
    }

    .alert-content li {
        position: relative;
        padding-left: 1rem;
        margin-bottom: 0.25rem;
    }

    .alert-content li:before {
        content: "•";
        position: absolute;
        left: 0;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .wg-box {
            padding: 1.75rem;
            margin: 1rem;
        }

        .admin-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .admin-header h3 {
            font-size: 1.5rem;
        }

        .last-updated {
            width: 100%;
            text-align: center;
        }

        input[type="email"],
        input[type="password"],
        input[type="text"] {
            padding: 0.875rem;
        }

        .btn-black {
            width: 100%;
            padding: 0.875rem;
        }
    }
</style>

<div class="main-content">
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="wg-box">
                <div class="admin-header">
                    <h3>User Profile</h3>
                    <div class="last-updated">
                        Last updated: {{ now()->format('M j, Y g:i A') }}
                    </div>
                </div>

                <form id="UpdateUser" class="form-style-1" method="POST" enctype="multipart/form-data" action="{{ route('updateProfile') }}">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <span class="alert-icon">⚠️</span>
                            <div class="alert-content">
                                <strong>Oops! There were some errors:</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            <span class="alert-icon">✓</span>
                            <div class="alert-content">
                                <strong>Success!</strong>
                                <p>{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    <fieldset class="name">
                        <label class="body-title" for="email">Email <span class="tf-color-1">*</span></label>
                        <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required placeholder="Enter your email">
                    </fieldset>

                    <fieldset class="value">
                        <label class="body-title" for="password">Password <span class="tf-color-1">*</span></label>
                        <input type="password" id="password" name="password" placeholder="New Password (leave empty if unchanged)">
                    </fieldset>

                    <fieldset class="value">
                        <label class="body-title" for="password_confirmation">Confirm Password <span class="tf-color-1">*</span></label>
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password">
                    </fieldset>

                    <div class="bot">
                        <button type="submit" class="btn-black">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')