
<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreX Computers | Best Computers for you</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="CoreX Computers offer the best computers available at the market">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/X_logo.jpg" />
    <!-- CSS -->
    <script src="assets/js/tailwind-cdn.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/font.awesome.css" />
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/venobox.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- Alpine.js for interactions -->
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.10.3/cdn.min.js"></script>
    <!-- Custom Styles -->
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fadeIn {
            animation: fadeIn 0.5s ease-out forwards;
        }
        .input-focus-effect:focus {
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.5);
        }
        .bg-gradient {
            background-color: blueviolet;
        }
    </style>
</head>

<body>
@include('layouts.nav-2')
<div class="min-h-[92dvh] mt-[12dvh] flex items-center justify-center p-4 flex-col">
        <div x-data="{ tab: 'login' }" class="w-full max-w-md mx-auto">
            <div class="bg-white rounded-xl shadow-2xl overflow-hidden transform transition-all duration-300 hover:shadow-xl">
                <!-- Tab buttons -->
                <div class="flex bg-gray-50">
                    <button @click="tab = 'login'" :class="tab === 'login' ? 'light-blue-bg text-white' : 'bg-gray-50 text-gray-700 hover:bg-gray-100'" class="flex-1 py-4 px-6 text-center font-medium text-lg rounded-tl-xl transition-all duration-300" style="font-weight:600">
                        Login
                    </button>
                    <button @click="tab = 'register'" :class="tab === 'register' ? 'light-blue-bg text-white' : 'bg-gray-50 text-gray-700 hover:bg-gray-100'" class="flex-1 py-4 px-6 text-center font-medium text-lg rounded-tr-xl transition-all duration-300" style="font-weight:600">
                        Register
                    </button>
                </div>

                <!-- Success Message -->
                @if(session('success'))
                    <div class="alert alert-success p-4 bg-green-100 text-green-700 rounded-lg mx-8 mt-4" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Login Form -->
                <div x-show="tab === 'login'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" class="p-8 animate-fadeIn">
                    <h2 class="text-2xl font-bold text-center mb-8 text-gray-800">Welcome Back</h2>
                    @if(session('customer_id'))
                        <!-- Logout Form -->
                        <script>
                            window.location.href = "{{ route('customer.dashboard') }}";
                        </script>
                    @else
                        <!-- Login Form -->
                        <form action="{{ url('/loginCustomer') }}" method="POST" class="space-y-6">
                            @csrf
                            <div>
                                <label for="login-email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                <input type="text" id="login-email" name="email" placeholder="Email" required class="w-full px-4 py-3 rounded-lg bg-gray-100 border border-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all input-focus-effect">
                            </div>
                            <div>
                                <label for="login-password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                                <input type="password" id="login-password" name="user-password" placeholder="Password" required class="w-full px-4 py-3 rounded-lg bg-gray-100 border border-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all input-focus-effect">
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="d-flex align-items-center">
                                    <input type="checkbox" id="remember-me" name="remember-me" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500" style="width: 15px; height: 15px;">
                                    <label for="remember-me" class="ml-2 block text-sm text-gray-700 mb-0">Remember me</label>
                                </div>
                                <a href="#" class="text-sm font-medium text-indigo-600 hover:text-indigo-500">Forgot Password?</a>
                            </div>
                            <div>
                                <button type="submit" class="w-full light-blue-bg text-white py-3 px-4 rounded-lg font-medium hover:opacity-90 transition-all transform hover:scale-[1.02] shadow-md hover:shadow-lg active:scale-[0.98]" style="border-radius: 8px;">
                                    LOGIN
                                </button>
                            </div>
                        </form>
                    @endif
                </div>

                <!-- Register Form -->
                <div x-show="tab === 'register'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0" class="p-8 animate-fadeIn">
                    <h2 class="text-2xl font-bold text-center mb-8 text-gray-800">Create Account</h2>
                    <form action="{{ route('customer.register') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="register-username" class="block text-sm font-medium text-gray-700 mb-1">Username</label>
                            <input type="text" id="register-username" name="user-name" placeholder="Username" value="{{ old('user-name') }}" required class="w-full px-4 py-3 rounded-lg bg-gray-100 border border-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all input-focus-effect">
                            @error('user-name') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div>
                            <label for="register-fname" class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <input type="text" id="register-fname" name="fname" placeholder="First Name" value="{{ old('fname') }}" required class="w-full px-4 py-3 rounded-lg bg-gray-100 border border-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all input-focus-effect">
                            @error('fname') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div>
                            <label for="register-lname" class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <input type="text" id="register-lname" name="lname" placeholder="Last Name" value="{{ old('lname') }}" required class="w-full px-4 py-3 rounded-lg bg-gray-100 border border-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all input-focus-effect">
                            @error('lname') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div>
                            <label for="register-phone" class="block text-sm font-medium text-gray-700 mb-1">Phone</label>
                            <input type="text" id="register-phone" name="phone" placeholder="Phone" value="{{ old('phone') }}" required class="w-full px-4 py-3 rounded-lg bg-gray-100 border border-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all input-focus-effect">
                            @error('phone') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div>
                            <label for="register-password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <input type="password" id="register-password" name="user-password" placeholder="Password" required class="w-full px-4 py-3 rounded-lg bg-gray-100 border border-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all input-focus-effect">
                            @error('user-password') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div>
                            <label for="register-email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="register-email" name="user-email" placeholder="Email" value="{{ old('user-email') }}" required class="w-full px-4 py-3 rounded-lg bg-gray-100 border border-transparent focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all input-focus-effect">
                            @error('user-email') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                        <div>
                            <button type="submit" class="w-full light-blue-bg text-white py-3 px-4 rounded-lg font-medium hover:opacity-90 transition-all transform hover:scale-[1.02] shadow-md hover:shadow-lg active:scale-[0.98]" style="border-radius: 8px;">
                                REGISTER
                            </button>
                        </div>
                    </form>
                    <div class="mt-6 text-center text-sm text-gray-600">
                        By registering, you agree to our
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Terms of Service</a>
                        and
                        <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Privacy Policy</a>.
                    </div>
                </div>
            </div>
        </div>

        <!-- Scripts -->
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        animation: {
                            blob: "blob 7s infinite",
                        },
                        keyframes: {
                            blob: {
                                "0%": { transform: "translate(0px, 0px) scale(1)" },
                                "33%": { transform: "translate(30px, -50px) scale(1.1)" },
                                "66%": { transform: "translate(-20px, 20px) scale(0.9)" },
                                "100%": { transform: "translate(0px, 0px) scale(1)" },
                            },
                        },
                    },
                },
            };
        </script>
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
    </div>
</body>
</html>