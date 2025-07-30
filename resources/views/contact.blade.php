<!DOCTYPE html>
<html lang="zxx" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CoreX Computers | Best Computers for you</title>
    <meta name="robots" content="index, follow" />
    <meta name="description" content="CoreX Computers offer the best computers available at the market">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/X_logo.jpg" />

    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/font.awesome.css" />
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.css" />
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/venobox.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
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
        <div class="h-[10dvh]"></div>
        <div class="contact-area">
            <div class="container">
                <div class="contact-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="contact-form">
                                <div class="contact-title mb-30">
                                    <h2 class="title">Send A Request</h2>
                                </div>
                                <form class="contact-form-style" id="contact-form" action="{{ route('contact.submit') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input name="name" placeholder="Name*" type="text" required />
                                        </div>
                                        <div class="col-lg-6">
                                            <input name="email" placeholder="Email*" type="email" required />
                                        </div>
                                        <div class="col-lg-6">
                                            <input name="tel" placeholder="Telephone Number*" type="text" required />
                                        </div>
                                        <div class="col-lg-6">
                                            <input name="subject" placeholder="Subject*" type="text" required />
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <textarea name="message" placeholder="Your Message*" required></textarea>
                                            <button class="btn btn-primary" type="submit" id="submit-btn">Send Message</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="contact-info my-3">
                                <div class="single-contact">
                                    <div class="icon-box">
                                        <img src="assets/images/contact/home-icon.webp" alt="">
                                    </div>
                                    <div class="info-box">
                                        <h5 class="title">Address</h5>
                                        <p>CoreX Computers, <br> No. 45/A, <br> Anagarika Dharmapala Mawatha, <br> Matara</p>
                                    </div>
                                </div>
                                <div class="single-contact">
                                    <div class="icon-box">
                                        <img src="assets/images/contact/phone-icon.webp" alt="">
                                    </div>
                                    <div class="info-box">
                                        <h5 class="title">Phone No</h5>
                                        <p><a href="tel:0765544567">0765544567</a></p>
                                        <p><a href="tel:+94412223454">0412223454</a></p>
                                    </div>
                                </div>
                                <div class="single-contact m-0">
                                    <div class="icon-box">
                                        <img src="assets/images/contact/email-icon.webp" alt="">
                                    </div>
                                    <div class="info-box">
                                        <h5 class="title">Email</h5>
                                        <p><a href="mailto:corexcomputers@gmail.com">corexcomputers@gmail.com</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
            <div class="contact-map">
                <div id="mapid">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe id="gmap_canvas" 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.1173434426637!2d80.54642697413173!3d5.948566929857624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae137c55c2bb4c5%3A0x49fd7e3a36b85b9e!2sMatara!5e0!3m2!1sen!2slk!4v1722000000000!5m2!1sen!2slk" 
                                width="100%" 
                                height="450" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
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