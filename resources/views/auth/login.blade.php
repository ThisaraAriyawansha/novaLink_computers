<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->


<!-- Mirrored from themesflat.co/html/remos/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Dec 2024 18:13:15 GMT -->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Login</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/animation.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">



    <!-- Font -->
    <link rel="stylesheet" href="font/fonts.css">

    <!-- Icon -->
    <link rel="stylesheet" href="icon/style.css">

    <!-- Favicon and Touch Icons  -->
    <link rel="apple-touch-icon-precomposed" href="images/favicon.png">

</head>

<body class="body">

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <div class="wrap-login-page">
                <div class="flex-grow flex flex-column justify-center gap30">
                    <a href="index.html" id="site-logo-inner">

                    </a>
                    <div class="login-box">
                        <div>
                            <h3>Login to account</h3>
                            <div class="body-text">Enter your email & password to login</div>
                        </div>
                        <form class="form-login flex flex-column gap24" action="{{ asset('login') }}" method="POST">
                            {{ csrf_field() }}
                            <fieldset class="email">
                                <div class="body-title mb-10">Email address <span class="tf-color-1">*</span></div>
                                <input class="flex-grow" type="email" placeholder="Enter your email address" name="email" tabindex="0" value="" aria-required="true" required="">
                            </fieldset>
                            <fieldset class="password">
                                <div class="body-title mb-10">Password <span class="tf-color-1">*</span></div>
                                <input class="password-input" type="password" placeholder="Enter your password" name="password" tabindex="0" value="" aria-required="true" required="">
                                <span class="show-pass" onclick="togglePassword()">
                                    <i class="icon-eye view"></i>
                                    <i class="icon-eye-off hide"></i>
                                </span>
                            </fieldset>
                            <div class="flex justify-between items-center">
                                <div class="flex gap10">
                                    <input class="" type="checkbox" id="signed">
                                    <label class="body-text" for="signed">Keep me signed in</label>
                                </div>
                            </div>
                            <button type="submit" class="tf-button w-full">Login</button>
                        </form>
                        {{-- <div class="body-text text-center">
                            You don't have an account yet?
                            <a href="{{ asset('register') }}" class="body-text tf-color">Register Now</a>

                        </div> --}}
                    </div>
                </div>
                <div class="text-tiny">2025 © All Rights Reserved | CoreX  Computers (Pvt) Ltd</div>
            </div>
        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->

    <!-- Javascript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/main.js"></script>

    <script>
        function togglePassword() {
            const passwordInput = document.querySelector('.password-input');
            const eyeIcon = document.querySelector('.icon-eye');
            const eyeOffIcon = document.querySelector('.icon-eye-off');

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.style.display = "none";
                eyeOffIcon.style.display = "inline";
            } else {
                passwordInput.type = "password";
                eyeIcon.style.display = "inline";
                eyeOffIcon.style.display = "none";
            }
        }
    </script>
</body>


<!-- Mirrored from themesflat.co/html/remos/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Dec 2024 18:13:15 GMT -->
</html>
