<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->


<!-- Mirrored from themesflat.co/html/remos/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Dec 2024 18:13:15 GMT -->
<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Register</title>

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
            <div class="wrap-login-page sign-up">
                <div class="flex-grow flex flex-column justify-center gap30">
                    <a href="index.html" id="site-logo-inner">
                        
                    </a>
                    <div class="login-box">
                        <div>
                            <h3>Create your account</h3>
                            <div class="body-text">Enter your personal details to create account</div>
                        </div>
                        <form method="POST" id="addUser" enctype="multipart/form-data" class="form-login flex flex-column gap24">
                            @csrf
                            

                            <fieldset class="name">
                                <div class="body-title mb-10">Your username <span class="tf-color-1">*</span></div>
                                <div class="flex gap10">
                                    <input class="flex-grow" type="text" placeholder="User Name" name="name" tabindex="0" value="" aria-required="true" required="">
                                    <!-- <input class="flex-grow" type="text" placeholder="Last name" name="lname" tabindex="0" value="" aria-required="true" required=""> -->
                                </div>
                            </fieldset>

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
                            <!-- <fieldset class="password">
                                <div class="body-title mb-10">Confirm password <span class="tf-color-1">*</span></div>
                                <input class="password-input" type="password" placeholder="Enter your password" name="password" tabindex="0" value="" aria-required="true" required="">
                                <span class="show-pass">
                                    <i class="icon-eye view"></i>
                                    <i class="icon-eye-off hide"></i>
                                </span>
                            </fieldset> -->

                            <button type="submit" class="tf-button w-full">Create Account</button>
                        </form>
                        <div class="body-text text-center">
                            You have an account?
                            <a href="{{ asset('login') }}" class="body-text tf-color">Login Now</a>
                        </div>
                    </div>
                </div>
                <div class="text-tiny">2025 © All Rights Reserved | Udarata Computers (Pvt) Ltd | Designed and Developed by Silicon Radon Networks (Pvt) Ltd</div>
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

</body>


<!-- Mirrored from themesflat.co/html/remos/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 23 Dec 2024 18:13:15 GMT -->
</html>

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