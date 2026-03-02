<!DOCTYPE html>
<html lang="zxx" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <!-- Favicon -->
    <title>NovaLink Computers | Best Computers for you</title>
    <meta name="description" content="NovaLink Computers offer the best computers available at the market">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/n_logo_remove_new.png" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">    <!-- CSS
    ============================================ -->
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
    <!-- Minify Version -->
    <!-- <link rel="stylesheet" href="assets/css/plugins.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css"> -->
</head>

<body>
    <div class="main-wrapper">
            <section style="background-color: #ffffff; min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px;">
                <div style="width: 100%; max-width: 350px; display: flex; justify-content: center; align-items: center;">
                    <dotlottie-player
                        id="lottie-animation"
                        src="assets/images/animation/gaming.json"
                        background="transparent"
                        speed="1"
                        style="width: 100%; height: auto; max-height: 50vh; min-height: 150px;"
                        autoplay>
                    </dotlottie-player>
                </div>
            </section>
    </div>
</body>

</html>


<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>

<script>
    window.addEventListener('load', function () {
        const player = document.getElementById('lottie-animation');

        setTimeout(function () {
            window.location.href = "{{ route('mainbuildMyPC') }}";
        }, 3000);
    });
</script>



