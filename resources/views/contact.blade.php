<!DOCTYPE html>
<html lang="zxx" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <title>NovaLink Computers | Best Computers for you</title>
    <meta name="description" content="NovaLink Computers offer the best computers available at the market">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/n_logo_remove_new.png" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/font.awesome.css" />
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/venobox.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        .custom-alert {
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            max-width: 300px;
            background-color: #28a745;
            color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
            font-size: 14px;
            line-height: 1.5;
        }
        .custom-alert .close-btn {
            float: right;
            margin-left: 10px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
        }
        .custom-alert.success {
            background-color: #28a745;
        }
        .custom-alert.error {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="main-wrapper">
        @include('layouts.nav-2')

        <div class="product-area py-[200px] dark-blue-bg relative" 
            style="background:url(assets/images/banner/01__kv_rog_flow_x16.jpg) no-repeat; background-position:center; background-size:cover; background-attachment: fixed; border-bottom-left-radius: 0px; border-bottom-right-radius: 0px;">
            
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black opacity-70 z-0" style="border-bottom-left-radius: 0px; border-bottom-right-radius: 0px;"></div>

            <div class="container h-100 relative z-10">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 text-center">
                        <h2 class="text-xl lg:text-4xl font-light text-white mb-2" 
                            style="font-family: 'Orbitron', sans-serif;">
                            Contact NovaLink Computers
                        </h2>
                        <p class="text-white text-sm" style="font-family: 'Orbitron', sans-serif;">Reach out for expert tech support, Apple product inquiries, or personalized solutions in Sri Lanka</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- breadcrumb-area start -->

        <nav style="display: flex; align-items: center; padding: 16px 24px;    max-width: 1200px; margin: 10px auto;" aria-label="Breadcrumb">
            <ol style="display: inline-flex; align-items: center; margin: 0; padding: 0; list-style: none; flex-wrap: wrap;">
                <li style="display: inline-flex; align-items: center;">
                    <a href="/home" style="display: inline-flex; align-items: center; font-size: 14px; font-family: 'Orbitron', sans-serif; font-weight: 500; color: #4b5563; text-decoration: none; transition: color 0.3s ease, transform 0.2s ease; padding: 6px 10px; border-radius: 6px;">
                        <svg style="width: 18px; height: 18px; margin-right: 8px; fill: none; stroke: #6b7280; stroke-width: 2;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Home
                    </a>
                </li>

                <li style="display: flex; align-items: center; margin: 0 6px;" aria-current="page">
                    <svg style="width: 16px; height: 16px; color: #9ca3af; fill: none; stroke: currentColor; stroke-width: 2;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span style="margin-left: 8px; font-size: 14px; font-weight: 600; color: #374151; padding: 6px 10px; border-radius: 6px; font-family: 'Orbitron', sans-serif;">Contact Us</span>
                </li>
            </ol>
        </nav>




        <div class="contact-area bg-white py-5">
            <div class="container">
                <div class="row g-4 align-items-stretch">
                    <!-- Contact Form Column (Left) -->
                    <div class="col-lg-6">
                        <div class="contact-form p-4 h-100">
                            <div class="contact-title mb-4">
                            <h2 class="title" style="font-family: 'Orbitron', sans-serif; font-size: 26px;">
                                Send A Request
                            </h2>                              
                              <p class="text-muted" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;">Fill out the form and we'll get back to you soon</p>
                            </div>
                            <form class="contact-form-style" id="contact-form" action="{{ route('contact.submit') }}" method="POST">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input name="name" class="form-control" placeholder="Name*" type="text" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;;" required />
                                    </div>
                                    <div class="col-md-6">
                                        <input name="email" class="form-control" placeholder="Email*" type="email"  style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;"required />
                                    </div>
                                    <div class="col-md-6">
                                        <input name="tel" class="form-control" placeholder="Telephone Number*" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;" type="text" required />
                                    </div>
                                    <div class="col-md-6">
                                        <input name="subject" class="form-control" placeholder="Subject*" type="text" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;" required />
                                    </div>
                                    <div class="col-12">
                                        <textarea name="message" class="form-control" placeholder="Your Message*" rows="5" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;" required></textarea>
                                    </div>
                                    <div class="col-12 text-center">
                                        <button class="btn btn-primary px-4 py-2" type="submit" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;" id="submit-btn">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Map Column (Right) -->
                    <div class="col-lg-6">
                        <div class="contact-map h-100">
                            <div class="map-container h-100">
                                <iframe id="gmap_canvas" 
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.1173434426637!2d80.54642697413173!3d5.948566929857624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae137c55c2bb4c5%3A0x49fd7e3a36b85b9e!2sMatara!5e0!3m2!1sen!2slk!4v1722000000000!5m2!1sen!2slk" 
                                    width="100%" 
                                    height="100%" 
                                    style="border:0; min-height: 450px;" 
                                    allowfullscreen="" 
                                    loading="lazy" 
                                    referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Info Row (Below on all screens) -->
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="contact-info bg-light p-4 rounded">
                            <div class="row text-center">
                                <div class="col-md-4 mb-3 mb-md-0">
                                    <div class="single-contact">
                                        <div class="icon-box mb-2">
                                            <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                                        </div>
                                        <div class="info-box">
                                            <h5 class="title" style="font-family: 'Orbitron', sans-serif;">Address</h5>
                                            <p class="mb-0" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;">NovaLink Computers,<br>No. 12/B, Galle Road,<br>Matara</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3 mb-md-0">
                                    <div class="single-contact">
                                        <div class="icon-box mb-2">
                                            <i class="fas fa-phone-alt fa-2x text-primary"></i>
                                        </div>
                                        <div class="info-box">
                                            <h5 class="title" style="font-family: 'Orbitron', sans-serif;">Phone No</h5>
                                            <p class="mb-0" ><a href="tel:0769417154" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: black;">0769417154</a></p>
                                            <p class="mb-0"><a href="tel:+94412223454" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: black;">0412223454</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="single-contact">
                                        <div class="icon-box mb-2">
                                            <i class="fas fa-envelope fa-2x text-primary"></i>
                                        </div>
                                        <div class="info-box">
                                            <h5 class="title" style="font-family: 'Orbitron', sans-serif;">Email</h5>
                                            <p class="mb-0"><a href="mailto:novaLinkcomputers@gmail.com" style="font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; color: black;">novaLinkcomputers@gmail.com</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom Alert Box -->
        <div class="custom-alert" id="custom-alert">
            <span class="close-btn" id="close-alert">&times;</span>
            <span id="alert-message"></span>
        </div>
        @include('layouts.footer2')
    </div>
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
    <script>
        $(document).ready(function() {
            var isSubmitting = false;

            // Show custom alert
            function showCustomAlert(message, type = 'success') {
                var alertBox = $('#custom-alert');
                var alertMessage = $('#alert-message');
                alertBox.removeClass('success error').addClass(type);
                alertMessage.text(message);
                alertBox.fadeIn(300);

                // Auto-hide after 5 seconds
                setTimeout(function() {
                    alertBox.fadeOut(300);
                }, 5000);
            }

            // Close alert on click
            $('#close-alert').on('click', function() {
                $('#custom-alert').fadeOut(300);
            });

            $('#contact-form').on('submit', function(event) {
                event.preventDefault(); // Prevent default form submission

                if (isSubmitting) {
                    return; // Prevent multiple submissions
                }

                var submitBtn = $('#submit-btn');
                var formMessage = $('#form-message');

                isSubmitting = true;
                submitBtn.prop('disabled', true).text('Sending...');
                formMessage.empty(); // Clear previous messages

                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        showCustomAlert(response.success, 'success');
                        $('#contact-form')[0].reset(); // Reset form
                    },
                    error: function(xhr) {
                        var errorMessage = xhr.responseJSON && xhr.responseJSON.errors
                            ? Object.values(xhr.responseJSON.errors)[0][0]
                            : 'An error occurred. Please try again.';
                        showCustomAlert(errorMessage, 'error');
                    },
                    complete: function() {
                        isSubmitting = false;
                        submitBtn.prop('disabled', false).text('Send Message');
                    }
                });
            });
        });
    </script>
</body>
</html>