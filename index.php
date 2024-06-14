<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
    <meta name="keywords"
        content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
    <meta name="author" content="elemis">
    <title>voitex-landing-page</title>
    <link rel="shortcut icon" href="./assets/img/voitex-images/favicon-1.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="./assets/css/plugins.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/voitex-landing-page.css">
    <link rel="stylesheet" href="./assets/css/colors/grape.css">
    <link rel="stylesheet" href="./assets/css/API-article.css">
    <link rel="preload" href="./assets/css/fonts/space.css" as="style" onload="this.rel='stylesheet'">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GVYEEJTS23"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-GVYEEJTS23');
</script>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5K7J9WBK');</script>
    <!-- End Google Tag Manager -->
</head>

<body style=" font-family: 'Space Grotesk';">
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $message_content = $_POST['message'];
    $service = $_POST['service'];

    $message = "New Form Request:<br><br>First Name: $first_name<br>Last Name: $last_name<br>Email: $email<br>Service: $service<br>Message: $message_content";

    $data = [
        'message' => $message,
        'notification_type' => 'email'
    ];

    $data_string = json_encode($data);

    $ch = curl_init('https://astapi1.voitexdev.com/v1/internal_notify/index.php');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string),
        'auth_key: p75KL0vqz3MSuQRrpUiHonu9PkblYwti'
    ]);

    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo json_encode(['status' => 'error', 'message' => 'Curl error: ' . curl_error($ch)]);
    } else {
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if ($http_code >= 400) {
            echo json_encode(['status' => 'error', 'message' => 'HTTP error: ' . $http_code]);
        } else {
            echo json_encode(['status' => 'success', 'message' => 'Your message has been sent successfully.']);
            header("Location: thankyou.php");
            exit();
        }
    }
    curl_close($ch);
    exit;
}
?>


<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5K7J9WBK"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <div class="content-wrapper main-landing">
        <header class="position-absolute w-100">
            <nav class="navbar navbar-expand-lg center-nav transparent navbar-light">
                <div class="container flex-lg-row flex-nowrap align-items-center">
                    <div class="navbar-brand w-100">
                        <a href="./index.php">
                            <img src="./assets/img/voitex-images/logo-1.svg"
                                srcset="./assets/img/voitex-images/logo-1.svg" alt="" />
                        </a>
                    </div>
                    <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
                        <div class="offcanvas-header d-lg-none">
                            <a href="./index.php">
                                <img src="./assets/img/voitex-images/logo-1.svg"
                                    srcset="./assets/img/voitex-images/logo-1.svg" alt="" />
                            </a>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle font-500" href="#" data-bs-toggle="dropdown">Solutions</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item font-500"><a class="dropdown-link" href="./index.php"><img
                                                    src="./assets/img/voitex-images/hotline-image-navbar.png" alt="">
                                                Hotline</a></li>
                                        <li class="dropdown-item font-500"><a class="dropdown-link"
                                                href="./landing-pbx.html"><img
                                                    src="./assets/img/voitex-images/pbx-image-header.png" alt="">
                                                PBX</a></li>
                                        <li class="dropdown-item font-500"><a class="dropdown-link"
                                                href="./Landingpage-sms.html"> <img
                                                    src="./assets/img/voitex-images/sms-image-navbar.png" alt="">
                                                SMS</a></li>
                                        <li class="dropdown-item font-500"><a class="dropdown-link"
                                                href="Landingpage-API.html"><img
                                                    src="./assets/img/voitex-images/api-image-navbar.png" alt="">
                                                API</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle font-500" href="#" data-bs-toggle="dropdown">Resources</a>
                                    <ul class="dropdown-menu">
                                        <li class="dropdown-item font-500"><a class="dropdown-link"
                                                href="voitex-blogs-main-page.html"><img
                                                    src="./assets/img/voitex-images/blog-image-navbar.png"
                                                    alt="">Blogs</a></li>
                                        <li class="dropdown-item font-500"><a class="dropdown-link" href="./main-page.html"> <img
                                                    src="./assets/img/voitex-images/succes-stories-image-navbar.png"
                                                    alt="">Success Stories</a></li>
                                        <li class="dropdown-item font-500"><a class="dropdown-link" href="http://docs.voitex.com/"><img
                                                    src="./assets/img/voitex-images/knowledge-base-image-header.png"
                                                    alt="">Knowledge Base</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown ">
                                    <a class="nav-link font-500" href="">Pricing</a>
                                </li>
                                <li class="nav-item dropdown ">
                                    <a class="nav-link font-500" href="About-Us.html">About</a>
                                </li>
                                <li class="nav-item dropdown dropdown-mega font-500">
                                    <a class="nav-link font-500" href="./Contact-Form.php">Contact</a>
                                </li>
                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="offcanvas-footer d-lg-none">
                                <ul class="navbar-nav align-items-center">
                                    <li class="nav-item-off">
                                        <a href="Contact-Form.php" class="btn offcanvas-btn" id="transparent-btn">See Demo</a>
                                        <!-- /.social -->
                                    </li>
                                    <li class="nav-item-off login">
                                        <nav>
                                            <a href="https://portal.voitex.com/login" class="btn offcanvas-btn-2" id="right-btn"></i>Login</a>
                                        </nav>
                                    </li>
                                    <!-- <li class="nav-item d-lg-none nav-item-3">
                                        <button class="hamburger offcanvas-nav-btn"><span></span></button>
                                    </li> -->
                                </ul>
                                <!-- <div>
                                    <a href="mailto:first.last@email.com" class="link-inverse">info@email.com</a>
                                    <br /> 00 (123) 456 78 90 <br />
                                    <nav class="nav social social-white mt-4">
                                        <a href="#"><i class="bi bi-telephone-fill"></i></a>
                                        <a href="#"><i class="uil uil-facebook-f"></i></a>
                                        <a href="#"><i class="uil uil-dribbble"></i></a>
                                        <a href="#"><i class="uil uil-instagram"></i></a>
                                        <a href="#"><i class="uil uil-youtube"></i></a>
                                    </nav>
                               
                                </div> -->
                            </div>
                            <!-- /.offcanvas-footer -->
                        </div>
                        <!-- /.offcanvas-body -->
                    </div>
                    <!-- /.navbar-collapse -->
                    <div class="navbar-other w-50 d-flex ms-2">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <li class="nav-item nav-item-1">
                                <a href="#" class="btn" id="transparent-btn">See Demo</a>
                                <!-- /.social -->
                            </li>
                            <li class="nav-item login nav-item-2">
                                <nav>
                                    <a href="https://portal.voitex.com/login" class="btn" id="right-btn"></i>Login</a>
                                </nav>
                            </li>
                            <li class="nav-item d-lg-none nav-item-3">
                                <button class="hamburger offcanvas-nav-btn"><span></span></button>
                            </li>
                        </ul>
                        <!-- /.navbar-nav -->
                    </div>
                    <!-- /.navbar-other -->
                </div>
                <!-- /.container -->
            </nav>
            <!-- /.navbar -->
        </header>
        <!-- /header -->

        <!-- Section 01  Start -->
        <section class="wrapper-communication overflow-hidden  landing-page-sec-1" >
            <div class="container pt-19 pt-md-19 pt-sm-15 text-center position-relative communication-container" >
                <div class="row position-relative">
                    <div class="col-md-6 sec1-paragraph">
                        <div class="sec1-content">
                            <h1 class="index-heading all-text-color">Turn Your Hotline <br> Into a <span class="pink">Communication <br> Powerhouse</span>
                            </h1>
                            <p class="landing-page-paragraph all-text-color">Bring your hotline vision to life with Voitex. Our
                                platform offers complete
                                flexibility to design your hotline your way. All of this is made simple with our
                                user-friendly, no-code solution, putting you in full control without the complexity.
                            </p>
                            <div class="bottom-row-communication1">
                                <div class="try-voitex-button-communication1">
                                    <a href="Contact-Form.php"><button class="demo-now btn"> Demo now</button></a>
                                    <a href="Contact-Form.php"><button class="learn-more btn"> Learn more</button></a>
                                </div>
                                <div class="arrow-image-wrapper">
                                    <img src="./assets/img/voitex-images/arrow-down-image.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">

                    </div>
                    <!-- /column -->
                </div>
                <!-- /.row -->
            </div>

            <!-- /.container -->
            <div class="index-image" >
                <div class="my-image position-relative">
                    <a href="./assets/media/movie.mp4"
                        class="btn btn-circle btn-primary btn-play ripple position-absolute btn-class"
                        style="bottom: 100px; left: 75%; z-index:3;" data-glightbox=""><i
                            class="icn-caret-right"></i></a>
                    <figure class="rounded shadow-lg"><img src="assets/img/voitex-images/index-image-header.png"
                            srcset="assets/img/voitex-images/index-image-header.png" alt=""></figure>
                    <!-- <img src="assets/img/voitex-images/index-image-header.png" alt=""> -->
                </div>
            </div>

            <!-- <div class="position-relative" data-cue="slideInDown" data-show="true" style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 0ms; animation-direction: normal; animation-fill-mode: both;">
                  <a href="./assets/media/movie.mp4" class="btn btn-circle btn-primary btn-play ripple mx-auto mb-6 position-absolute" style="top:50%; left: 50%; transform: translate(-50%,-50%); z-index:3;" data-glightbox=""><i class="icn-caret-right"></i></a>
                  <figure class="rounded shadow-lg"><img src="assets/img/voitex-images/index-image-header.png" srcset="assets/img/voitex-images/index-image-header.png" alt=""></figure>
                </div> -->
            <!-- /div -->

        </section>
        <!-- section 01 End -->


        <!-- section 02 Start  -->

        <!-- <section id="sec2">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12" data-aos="fade-down" data-aos-duration="1000" >
                        <h3 class="text-center proud all-text-color">Proud to service a community of leading hotlines!</h3>
                        <div class="sec-2-image">
                            <img src="assets/img/voitex-images/Home-logos.png" width="100%" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </section> -->
        <section id="sec-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p class="text-center all-text-color">Proud to service a community of leading hotlines! 
                        </p>
                    </div>
                    <div class="row" data-aos="fade-up" data-aos-duration="2000">
                        <div class="col-lg-1 col-4">
                            <div class="image-wrapper">
                                <img src="./assets/img/voitex-images/first-image-index.svg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-1 col-4">
                            <div class="image-wrapper">
                                <img src="./assets/img/voitex-images/second-image-index.svg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-1 col-4">
                            <div class="image-wrapper">
                                <img src="./assets/img/voitex-images/third-image-index.svg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-1 col-4" >
                            <div class="image-wrapper">
                                <img src="./assets/img/voitex-images/fourth-image-index.svg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-1 col-4" >
                            <div class="image-wrapper">
                                <img src="./assets/img/voitex-images/fifth-image-index.svg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-1 col-4" >
                            <div class="image-wrapper">
                                <img src="./assets/img/voitex-images/sixth-image-index.svg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-1 col-4" >
                            <div class="image-wrapper">
                                <img src="./assets/img/voitex-images/seventh-image-index.svg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-1 col-4" >
                            <div class="image-wrapper">
                                <img src="./assets/img/voitex-images/second-last-image-index.svg" alt="">
                            </div>
                        </div>
                        <div class="col-lg-1 col-4" >
                            <div class="image-wrapper">
                                <img src="./assets/img/voitex-images/last-image-index.svg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- section 02 End  -->


        <!-- section 03 -->


        <section id="sec3">
            <div class="container sec3-container">
                <div class="row">
                    <div class="col-md-6 sec-3-paragraph" data-aos="fade-right" data-aos-duration="500">
                        <div class="sec3-content">
                            <h2 class="all-text-color ">Design Your Perfect <br> IVR Route:<span class="pink"> No Code, <br> Total
                                    Control</span></h2>
                            <p class="all-text-color">With our innovative no-code IVR system, you have complete control over crafting the ideal
                                IVR route for your callers without needing any coding expertise.</p>
                            <a href="Contact-Form.php" class=""><button class="demo-now sec-3-button btn"> Demo now</button></a>
                        </div>
                    </div>
                    <div class="col-md-6" data-aos="fade-right" data-aos-duration="500">
                        <div class="bg-image">
                            <img src="assets/img/voitex-images/Group 1171275197.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- section 04 Start -->

        <section id="sec4">
            <div class="container">
                <div class="row">
                    <div class="sec-4-top">
                        <p class="stars ">KEY FEATURES</p>
                    </div>
                    <h2 class="all-text-color index-heading">It's <span class="pink">your hotline, your way.</span></h2>
                    <p class="all-text-color">Unlocking limitless phone capabilities for your ultimate <br> caller experience so they can
                        seamlessly:</p>
                </div>
                <div id="innerrow-sec4-1" class="row" data-aos="fade-down" data-aos-duration="1000">
                    <div class="col-sm-4 col-12">
                        <div class="sec4-content">
                            <img src="assets/img/voitex-images/sec4-6.png" alt="">
                            <h5 class="sec-4-heading index-heading all-text-color">Take Actions</h5>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="sec4-content">
                            <img src="assets/img/voitex-images/sec4-5.png" alt="">
                            <h5 class="sec-4-heading all-text-color index-heading ">Navigate to Content</h5>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="sec4-content">
                            <img src="assets/img/voitex-images/sec4-4.png" alt="">
                            <h5 class="sec-4-heading all-text-color index-heading ">Input Information</h5>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="sec4-content">
                            <img src="assets/img/voitex-images/sec4-3.png" alt="">
                            <h5 class="sec-4-heading all-text-color index-heading ">Process Payment & Donations</h5>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="sec4-content">
                            <img src="assets/img/voitex-images/sec4-2.png" alt="">
                            <h5 class="sec-4-heading all-text-color index-heading ">Join a Conference Call</h5>
                        </div>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="sec4-content">
                            <img src="assets/img/voitex-images/sec4-1.png" alt="">
                            <h5 class="sec-4-heading all-text-color index-heading ">& Much More!</h5>
                        </div>
                    </div>
                </div>

            </div>
        </section>




        <!-- section 04 End -->



        <!-- section 05 Start -->


        <section id="sec5">
            <div class="container sec5-manage-container">
                <div class="row"  data-aos="fade-right" data-aos-duration="500">
                    <div class="col-lg-6">
                        <div class="bg-image-sec-5">
                            <img src="assets/img/voitex-images/manage-image.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="sec5-content">
                            <h2 class="all-text-color index-heading">Manage it all with ease through a <span class="pink">sleek user-friendly portal</span>
                                or directly
                                from your phone.</h2>
                            <a href="Contact-Form.php"> <button class="demo-now sec-5-button btn"> Demo
                                    now</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- section 05 End -->


        <!-- section 06 Start  -->

        <section id="sec6">
            <div class="container">
                <div class="row sec6-row" data-aos="fade-up" data-aos-duration="500">
                    <div class="sec6-content">
                        <h2 class="all-text-color index-heading"><span class="pink">Unleash Possibilities</span> <br> Beyond Limits with Voitex</h2>
                        <p class=" s-18p all-text-color">Seamlessly unify communication channels—from calls <br> to texts and
                            emails.</p>
                        <p class=" s-18p all-text-color">Explore the Voitex suite of solutions:</p>
                    </div>
                    <div id="innerrow-sec6" class="row sec6-landing" >
                        <div class="col-md-4">
                            <div class="main-card-wrapper">
                                <div id="mini-row" class="row">
                                    <div class="col-1">
                                        <img src="assets/img/voitex-images/Frame (1).png" alt="">
                                    </div>
                                    <div class="col-11">
                                        <h3 class="all-text-color index-heading">PBX</h3>
                                    </div>
                                </div>
                                <p class="sec-6-paragraph all-text-color">The Ultimate All-in-One Phone System Solution</p>
                            </div>
                            <a href="landing-pbx.html" class=""> <button class="learn-more-blue button-1 btn"> Learn
                                    more</button></a>
                        </div>
                        <div class="col-md-4">
                            <div class="main-card-wrapper">
                                <div id="mini-row" class="row">
                                    <div class="col-1">
                                        <img src="assets/img/voitex-images/Group 1171275293.png" alt="">
                                    </div>
                                    <div class="col-11">
                                        <h3 class="all-text-color index-heading">SMS</h3>
                                    </div>
                                </div>
                                <p class="sec-6-paragraph all-text-color">Transform text messaging into an actionable communication
                                    channel
                                    with your contacts.</p>
                            </div>
                            <a href="Landingpage-sms.html" class=""> <button class="Learn-more-green button-1 btn">
                                    Learn more</button></a>
                        </div>
                        <div class="col-md-4 no-margin">
                            <div class="main-card-wrapper ">
                                <div id="mini-row" class="row">
                                    <div class="col-1">
                                        <img src="assets/img/voitex-images/Vector.png" alt="">
                                    </div>
                                    <div class="col-11">
                                        <h3 class="all-text-color index-heading">API/ Integrations</h3>
                                    </div>
                                </div>
                                <p class="sec-6-paragraph all-text-color">Experience seamless data exchange, increased operational
                                    efficiency, and improved user
                                    experiences with our robust API integrations.</p>
                            </div>
                            <a href="Landingpage-API.html" class=""> <button class="Learn-more-yellow   button-1 btn">
                                    Learn
                                    more</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- section 06 End  -->



        <!-- section 07  Start -->

        <section id="sec7">
            <div class="container sec7-container">
                <div class="row" data-aos="fade-right" data-aos-duration="1000">
                    <div class="col-md-6" >
                        <div class="sec7-content">
                            <h2 class="all-text-color index-heading"><span class="pink">Experience Voitex:</span><br>Powerfully Engineered, Expertly
                                Supported.</h2>
                            <p class="all-text-color">We're not just about providing advanced hotline solutions; we're committed to delivering
                                exceptional customer service. Our dedicated team goes above and beyond to ensure that
                                all your questions are answered and that your system is meticulously designed to meet
                                your unique requirements.</p>
                            <a href="Contact-Form.php"> <button class="demo-now sec7-button btn"> Demo now</button></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="bg-image-sec7">
                            <img src="assets/img/voitex-images/Group 1171275667.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- section 07  End -->



        <!-- section 08 Start -->

        <section id="sec8">
            <div class="container">
                <p class="key-features">Happy Customers</p>
                <h2 class="all-text-color index-heading">What our <span class="pink">clients say</span> about us?</h2>
                <div class="row" data-aos="fade-up" data-aos-duration="1500">
                    <div class="slider" style="background-color: #fff;">
                        <div class="client-review">
                            <div class="star">
                                <img src="assets/img/voitex-images/Group 1171275295.png    " alt="">
                            </div>
                            <p class="all-text-color">I came to your company to open a hotline and I would like to share with you the
                                amazing customer service I received especially from Mrs. D kohn, she has been
                                extremely patient, helpful, and professional throughout.</p>
                            <h6 class="all-text-color">Yoely Fried</h6>

                        </div>
                        <div class="client-review">
                            <div class="star">
                                <img src="assets/img/voitex-images/Group 1171275295.png" alt="">
                            </div>
                            <p class="all-text-color">I came to your company to open a hotline and I would like to share with you the
                                amazing customer service I received especially from Mrs. D kohn, she has been
                                extremely patient, helpful, and professional throughout.</p>
                            <h6 class="all-text-color">Yoely Fried</h6>

                        </div>
                        <div class="client-review">
                            <div class="star">
                                <img src="assets/img/voitex-images/Group 1171275295.png" alt="">
                            </div>
                            <p class="all-text-color">I came to your company to open a hotline and I would like to share with you the
                                amazing customer service I received especially from Mrs. D kohn, she has been
                                extremely patient, helpful, and professional throughout.</p>
                            <h6 class="all-text-color">Yoely Fried</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- section 08 End -->



        <!-- section 09  Start -->

        <section id="sec9">
            <div class="container">
                <div class="row">
                    <div class="sec9-heading">
                        <p class="key-features">OUR INDUSTRY EXPERIENCE</p>
                        <h2 class="all-text-color index-heading">Supporting a range of <span class="pink">industries</span></h2>
                    </div>
                    <div id="innerrow-sec9-1" class="row"  >
                        <div class="col-sm-3 ">
                            <div class="sec9-content">
                                <img src="assets/img/voitex-images/sec-9img1.png" alt="">
                                <h3 class="all-text-color index-heading">Healthcare</h3>
                            </div>
                        </div>
                        <div class="col-sm-3 ">
                            <div class="sec9-content">
                                <img src="assets/img/voitex-images/sec9-img2.png" alt="">
                                <h3 class="all-text-color index-heading">Retail</h3>
                            </div>
                        </div>
                        <div class="col-sm-3 ">
                            <div class="sec9-content">
                                <img src="assets/img/voitex-images/sec9-img3.png" alt="">
                                <h3 class="all-text-color index-heading">Education</h3>
                            </div>
                        </div>
                        <div class="col-sm-3 ">
                            <div class="sec9-content">
                                <img src="assets/img/voitex-images/sec9-img-4.png" alt="">
                                <h3 class="all-text-color index-heading">Real Estate</h3>
                            </div>
                        </div>
                    </div>
                    <div id="innerrow-sec9-2" class="row"  >
                        <div class="col-sm-3 ">
                            <div class="sec9-content">
                                <img src="assets/img/voitex-images/sec9-img-5.png" alt="">
                                <h3 class="all-text-color index-heading">Non Profit</h3>
                            </div>
                        </div>
                        <div class="col-sm-3 ">
                            <div class="sec9-content">
                                <img src="assets/img/voitex-images/img6.png.png" alt="">
                                <h3 class="all-text-color index-heading">Technology</h3>
                            </div>
                        </div>
                        <div class="col-sm-3 ">
                            <div class="sec9-content">
                                <img src="assets/img/voitex-images/sec9-img7.png" alt="">
                                <h3 class="all-text-color index-heading">Finance</h3>
                            </div>
                        </div>
                        <div class="col-sm-3 ">
                            <div class="sec9-content">
                                <img src="assets/img/voitex-images/sec9-img8.png" alt="">
                                <h3 class="all-text-color index-heading">Delivery</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- section 09 End -->
        <!-- section 10 Start -->

        <section id="sec10">
        <div class="container">
    <form action="" method="post">
        <div class="row">
            <div class="col-lg-6">
                <div class="form-4">
                    <input type="text" name="first_name" placeholder="First name" class="form-control forms"
                        style="width: 100%; height: 50px;" required>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-4">
                    <input type="email" name="email" placeholder="Email*" class="form-control forms"
                        style="width: 100%; height: 50px;" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-4">
                    <input type="text" name="last_name" placeholder="Last name" class="form-control forms"
                        style="width: 100%; height: 50px;" required>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-4">
                    
                    <select class="form-select forms py-2" id="mySelect" name="service" required>
                        <option>Select a service</option>
                            <option>Hotline</option>
                            <option>PBX</option>
                            <option>SMS</option>
                            <option>API</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="text-area" style="padding-bottom: 20px">
                    <textarea name="message" rows="10" class="form-control" placeholder="Message"
                        style="resize: none; color: #cbcbcb" required></textarea>
                </div>
            </div>
            <div class="btn-div">
                <button class="btn btn-primary" type="submit">Send</button>
            </div>
        </div>
    </form>
</div>

        </section>


        <!-- section 10 end -->



        <!-- section 11 starts  -->
        <section id="sec11">
            <div class="container">
                <div class="row">
                    <div class="sec-4-top">
                        <p class="stars">OUR PRICING PLANS</p>
                        <h2 class="all-text-color index-heading">Select from our range of hotline plans <br> <span class="pink">tailored to your
                                needs.</span></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12">
                        <div id="green" class="plan-parent">
                            <h3 class="all-text-color">Starter</h3>
                            <h2 class="all-text-color">$50<span class="month">/month</span></h2>
                            <a href="#" id="green-btn" class=""><button
                                    class="select-button-pbx sec-11-button btn">Select</button>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div id="pink" class="plan-parent">
                            <div class="save-div">
                                <i class="bi bi-bookmark-star-fill pink"></i>
                            </div>
                            <h3 class="all-text-color">Essential</h3>
                            <h2 class="all-text-color">$130<span class="month">/month</span></h2>
                            <a href="#" id="green-btn" class=""><button class="select-button-pbx btn ">Select</button>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div id="purple" class="plan-parent">
                            <h3 class="all-text-color">Professional</h3>
                            <h2 class="all-text-color">$200<span class="month">/month</span></h2>
                            <a href="#" id="green-btn" class=""><button
                                    class="select-button-pbx sec-11-button btn">Select</button>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div id="yellow" class="plan-parent">
                            <h3 class="all-text-color">Advanced</h3>
                            <h2 class="all-text-color">$300<span class="month">/month</span></h2>
                            <a href="#" id="green-btn" class=""><button
                                    class="select-button-pbx sec-11-button btn">Select</button>
                            </a>
                        </div>
                    </div>
                </div>

                <a href=""><button class="pricing-plans-button btn">See All Pricing Plans</button></a>
            </div>
        </section>

        <!-- section 11 end  -->


        <!--section 11 start  -->
        <section id="try-voitex-communication" class="mb-5">
            <div class="container voitex-try-container text-center ">
                <div class="text-wrapper">
                    <h2 class="all-text-color index-heading">Ready to try Voitex?</h2>
                    <p class="all-text-color">Unleash the full potential of your hotline with Voitex and <br> connect with your audience like
                        never
                        before.
                    </p>
                </div>
                <div class="try-voitex-button">
                    <a href="Contact-Form.php"><button class="demo-now btn color-change-1"> Demo now</button></a>
                    <a href="Contact-Form.php"><button class="learn-more btn color-change-2"> Learn more</button></a>
                </div>
            </div>
        </section>
        <!--section 11 end  -->



        <footer class="wrapper pattern-wrapper bg-image section-frame">
            <div class="container pb-13 pb-md-15">
              <div class="card image-wrapper bg-full bg-image bg-overlay mt-n50p mx-md-5 rounded-xl overflow-hidden">
      
                <!--/.card-body -->
              </div>
              <!--/.card -->
              <div class="text-inverse mx-md-5 mt-n15 mt-lg-0">
                <div class="row gy-6 gy-lg-0">
                  <div class="col-lg-4">
                    <div class="widget">
                      <div class="footer-image">
                        <a href="index.php"><img src="./assets/img/voitex-images/footer-img.PNG" alt=""></a>
                      </div>
                      <p class="mb-5 voitex">User-friendly, no-code IVR & VoIP solutions for leading hotlines and businesses, offering utmost flexibility and superior service.</p>
                      <!-- <p class="mb-1 news-letter voitex-opacity">Sign up for our newsletter </p> -->
                      <!-- <div class="col-lg-7 mt-3  mb-3">
                                    <input type="email" class="form-control footer-form" placeholder="Your email">
                                    <button class="   button-submit" type="search">Submit</button>
                                </div> -->
      
                    </div>
                    <!-- /.widget -->
                  </div>
      
                  <!-- /column -->
                  <div class="col-4 col-lg-2 offset-lg-2">
                    <div class="widget">
                      <h4 class="widget-title text-white mb-3">Solutions</h4>
                      <ul class="list-unstyled text-reset mb-0">
                        <li><a href="index.php">Hotline</a></li>
                        <li><a href="landing-pbx.html">PBX</a></li>
                        <li><a href="Landingpage-sms.html">SMS</a></li>
                        <li><a href="Landingpage-API.html">API</a></li>
                      </ul>
                    </div>
                    <!-- /.widget -->
                  </div>
                  <!-- /column -->
                  <div class="col-4 col-lg-2 footer-main-col">
                    <div class="widget">
                      <h4 class="widget-title text-white mb-3">Resources</h4>
                      <ul class="list-unstyled text-reset mb-0">
                        <li><a href="voitex-blogs-main-page.html">Blogs</a></li>
                        <li><a href="main-page.html">Success Stories</a></li>
                        <li><a href="http://docs.voitex.com/">Knowledge Base</a></li>
                        <li><a href="https://portal.voitex.com/login">Login</a></li>
                      </ul>
                    </div>
                    <!-- /.widget -->
                  </div>
                  <!-- /column -->
                  <div class="col-4 col-lg-2">
                    <div class="widget">
                      <h4 class="widget-title text-white mb-3">Company</h4>
                      <ul class="list-unstyled text-reset  mb-0">
                        <li><a href="About-Us.html">About</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="Contact-Form.php">Contact</a></li>
                        <li><a href="privacypolicy.html">Privacy Policy</a></li>
                      </ul>
                    </div>
                    <!-- /.widget -->
                  </div>
                  <!-- /column -->
      
                </div>
                <!--/.row -->
      
                <!-- SECOND ROW -->
                <div class="row gy-6 gy-lg-0 mycustomrow">
                  <div class="col-lg-4">
                    <div class="widget">
                      <!-- <div class="footer-image">
                                <img src="./assets/img/voitex-images/footer-img.PNG" alt="">
                            </div> -->
                      <!-- <p class="mb-5 voitex">Voitex leverages your client database to create
                                more meaningful and profitable interactions
                                across all communications channels.</p> -->
                      <p class="mb-1 news-letter voitex-opacity">Sign up for our newsletter </p>
                      <div class="col-lg-7 mt-3  mb-3 newslettr">
                        <input type="email" class="form-control footer-form" placeholder="Your email">
                        <button class="   button-submit" type="search">Submit</button>
                      </div>
                    </div>
                  </div>
                  <!-- /.widget -->
                </div>
                <!-- END ROW -->
              </div>
            </div>
            <!-- /.container -->
          </footer>

        <!-- section 08 JS Script -->


        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/theme.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script>
            $(document).ready(function () {
                $('.slider').slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: false,
                    autoplaySpeed: 2000,
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                infinite: true,
                                dots: true
                            }
                        },
                        {
                            breakpoint: 768,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1
                            }
                        }
                        // Add more breakpoints and settings as needed
                    ]
                });
            });
        </script>

</body>

</html>