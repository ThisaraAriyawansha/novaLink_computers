<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <title>NovaLink Computers | Best Computers for you</title>
    <meta name="description" content="NovaLink Computers offer the best computers available at the market">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/N_back.jpg" />
    <!-- CSS -->
    <script src="assets/js/tailwind-cdn.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/font.awesome.css" />
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/venobox.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Alpine.js -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js"></script>
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
        }
        body {
            font-family: 'Orbitron', sans-serif;
            background-color: #f8fafc;
        }
        .auth-container {
            max-width: 1200px;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1);
        }
        .auth-image {
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), 
                        url('https://images.unsplash.com/photo-1518770660439-4636190af475?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80');
            background-size: cover;
            background-position: center;
        }
        .auth-tabs {
            border-bottom: 2px solid #e2e8f0;
        }
        .auth-tab {
            padding: 1rem 2rem;
            transition: all 0.3s ease;
            position: relative;
        }
        .auth-tab.active {
            color: var(--primary);
            font-weight: 600;
        }
        .auth-tab.active:after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 2px;
            background: var(--primary);
        }
        .form-input {
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            padding: 0.75rem 1rem;
        }
        .form-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        .btn-primary {
            background: var(--primary);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }
        @media (max-width: 1023px) {
            .auth-image {
                height: 200px;
            }
        }
    </style>
</head>

<body>
@include('layouts.nav-2')

    <div class="h-[13dvh]"></div>


<div class="min-h-[calc(100vh-12dvh)] flex items-center justify-center p-4">
    <div class="auth-container bg-white w-full">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <!-- Left Side - Image -->
            <div class="auth-image hidden lg:flex flex-col justify-between p-10 text-white">
                <div>
                    <h2 class="text-3xl font-bold mb-4">NovaLink Computers</h2>
                    <p class="text-lg">Premium computing solutions for professionals and enthusiasts</p>
                </div>
                <div class="flex space-x-6">
                    <div>
                        <div class="w-12 h-12 bg-black bg-opacity-20 rounded-full flex items-center justify-center mb-2">
                            <i class="fas fa-bolt text-xl"></i>
                        </div>
                        <p>High Performance</p>
                    </div>
                    <div>
                        <div class="w-12 h-12 bg-black bg-opacity-20 rounded-full flex items-center justify-center mb-2">
                            <i class="fas fa-shield-alt text-xl"></i>
                        </div>
                        <p>Reliable Hardware</p>
                    </div>
                </div>
            </div>

            <!-- Right Side - Form -->
            <div class="p-8 lg:p-12">
                <div x-data="{ tab: 'login' }">
                    <!-- Tab buttons -->
                    <div class="auth-tabs flex mb-8">
                        <button @click="tab = 'login'" 
                                :class="tab === 'login' ? 'active' : 'text-gray-500 hover:text-gray-700'"
                                class="auth-tab">
                            Login
                        </button>
                        <button @click="tab = 'register'" 
                                :class="tab === 'register' ? 'active' : 'text-gray-500 hover:text-gray-700'"
                                class="auth-tab">
                            Register
                        </button>
                    </div>

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="p-4 mb-6 bg-green-100 text-green-700 rounded-lg">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Login Form -->
                    <div x-show="tab === 'login'" x-transition>
                        <h3 class="text-2xl font-bold mb-6 text-gray-800">Welcome Back</h3>
                        @if(session('customer_id'))
                            <script>window.location.href = "{{ route('customer.dashboard') }}";</script>
                        @else
                            <form action="{{ url('/loginCustomer') }}" method="POST" class="space-y-4">
                                @csrf
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                    <input type="text" name="email" placeholder="Email" required
                                           class="form-input w-full rounded-lg">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                    <input type="password" name="user-password" placeholder="Password" required
                                           class="form-input w-full rounded-lg">
                                </div>
                                
                                <button type="submit" 
                                        class="btn-primary w-full text-white py-3 px-4 rounded-lg font-medium mt-4">
                                    LOGIN
                                </button>
                            </form>
                        @endif
                    </div>

                    <!-- Register Form -->
                    <div x-show="tab === 'register'" x-transition>
                        <h3 class="text-2xl font-bold mb-6 text-gray-800">Create Account</h3>
                        <form action="{{ route('customer.register') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                                <input type="text" name="user-name" placeholder="Username" value="{{ old('user-name') }}" required
                                       class="form-input w-full rounded-lg">
                                @error('user-name') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                                    <input type="text" name="fname" placeholder="First Name" value="{{ old('fname') }}" required
                                           class="form-input w-full rounded-lg">
                                    @error('fname') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                                    <input type="text" name="lname" placeholder="Last Name" value="{{ old('lname') }}" required
                                           class="form-input w-full rounded-lg">
                                    @error('lname') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                                <input type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}" required
                                       class="form-input w-full rounded-lg">
                                @error('phone') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                <input type="password" name="user-password" placeholder="Password" required
                                       class="form-input w-full rounded-lg">
                                @error('user-password') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="email" name="user-email" placeholder="Email" value="{{ old('user-email') }}" required
                                       class="form-input w-full rounded-lg">
                                @error('user-email') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                            </div>
                            <button type="submit" 
                                    class="btn-primary w-full text-white py-3 px-4 rounded-lg font-medium mt-4">
                                REGISTER
                            </button>
                        </form>
                        <div class="mt-6 text-center text-sm text-gray-600">
                            By registering, you agree to our
                            <a href="#" class="font-medium text-blue-600 hover:text-blue-500">Terms of Service</a>
                            and
                            <a href="#" class="font-medium text-blue-600 hover:text-blue-500">Privacy Policy</a>.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer2')

<!-- Scripts -->
<script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
<script src="assets/js/vendor/modernizr-3.11.2.min.js"></script>
<script src="assets/js/plugins/jquery.countdown.min.js"></script>
<script src="assets/js/plugins/swiper-bundle.min.js"></script>
<script src="assets/js/plugins/scrollUp.js"></script>
<script src="assets/js/plugins/venobox.min.js"></script>
<script src="assets/js/plugins/jquery-ui.min.js"></script>
<script src="assets/js/plugins/mailchimp-ajax.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>