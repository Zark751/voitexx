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
    <title>Contact Form</title>
    <link rel="shortcut icon" href="./assets/img/voitex-images/favicon-1.png">
    <link rel="stylesheet" href="./assets/css/plugins.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="assets/css/Contact-Form.css">
    <link rel="stylesheet" href="./assets/css/colors/grape.css">
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

</head>

<body class="solution">
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
    <div class="content-wrapper">
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

        <section id="first-sec" class="wrapper overflow-hidden">
            <div class="container pt-19 pt-md-21 text-center position-relative">

                <div class="row position-relative solutions-header">
                    <div class="col-lg-12 position-relative">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="heading-wrapper" style="text-align: start;">
                                    <p class="header-name text-uppercase" data-group="page-title" data-delay="600"
                                        data-show="true"
                                        style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 900ms; animation-direction: normal; animation-fill-mode: both;">
                                        CONTACT US
                                    </p>
                                    <h1 class="display-1 text-centerfs-64 mb-5 mx-md-10 mx-lg-0 contact-form-heading all-text-color" data-group="page-title"
                                        data-delay="600" data-show="true"
                                        style="animation-name: slideInDown; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 600ms; animation-direction: normal; animation-fill-mode: both;">
                                        Submit your information <br>to
                                        <span class="pink">learn more
                                        </span>
                                    </h1>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="head-image">
                                    <img src="./assets/img/voitex-images/contact-form.png" alt="" data-cue="fadeIn"
                                        alt="" data-show="true"
                                        style="animation-name: fadeIn; animation-duration: 700ms; animation-timing-function: ease; animation-delay: 800ms; animation-direction: normal; animation-fill-mode: both;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /column -->
                </div>

                <!-- /.row -->
            </div>
            <div class="container myfmmm">
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
            <!-- /.container -->
        </section>
        <section id="sec-3">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 first-side">
                        <div class="side-wrapper">
                            <div class="icon-wrapper icon-1" data-aos="flip-down" data-aos-duration="2000">
                                <span><img src="./assets/img/voitex-images/contact-logo-2.png" alt=""></span>
                            </div>
                            <div class="text-wrapper">
                                <h4 class="all-text-color">Voitex User Guide</h4>
                                <p class="all-text-color">Voitex's API fetches custom recordings from the database based on callers' selection.
                                </p>
                            </div>
                            <div class="btn-wrapper btn-1" data-aos="fade-left" data-aos-duration="2000">
                                <a href="https://docs.voitex.com/"><button type="submit" class="btn">Explore</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 last-side">
                        <div class="side-wrapper">
                            <div class="icon-wrapper icon-2" data-aos="flip-down" data-aos-duration="2000">
                                <span><img src="./assets/img/voitex-images/contact-logo.png" alt=""></span>
                            </div>
                            <div class="text-wrapper">
                                <h4 class="all-text-color">Our team is here to assist</h4>
                                <p class="all-text-color">Reach out to us anytime at support&#64;voitex.com for any questions or assistance.
                                </p>
                            </div>
                            <div class="btn-wrapper btn-2" data-aos="fade-right" data-aos-duration="2000" >
                                <a href="mailto:support@voitex.com"><button type="button" class="btn">Reach Out</button></a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                                <img src="./assets/img/voitex-images/Contact-Form-Footer-1.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-1 col-4">
                            <div class="image-wrapper">
                                <img src="./assets/img/voitex-images/Contact-Form-Footer-2.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-1 col-4">
                            <div class="image-wrapper">
                                <img src="./assets/img/voitex-images/Gaavra - Logo (1).png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-1 col-4" >
                            <div class="image-wrapper">
                                <img src="./assets/img/voitex-images/Contact-Form-Footer-4.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-1 col-4" >
                            <div class="image-wrapper">
                                <img src="./assets/img/voitex-images/Gibor.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-1 col-4" >
                            <div class="image-wrapper">
                                <img src="./assets/img/voitex-images/Contact-Form-Footer-6.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-1 col-4" >
                            <div class="image-wrapper">
                                <img src="./assets/img/voitex-images/Contact-Form-Footer-7.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-1 col-4" >
                            <div class="image-wrapper">
                                <img src="./assets/img/voitex-images/Contact-Form-Footer-8.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-1 col-4" >
                            <div class="image-wrapper">
                                <img src="./assets/img/voitex-images/Contact-Form-Footer-9.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                                <p class="mb-5 voitex">User-friendly, no-code IVR & VoIP solutions for leading hotlines and businesses. offering utmost flexibility and superior service.</p>
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
</body>
<script src="./assets/js/plugins.js"></script>
<script src="./assets/js/theme.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    const options = document.querySelectorAll('#mySelect option');
    options.forEach(option => {
        option.style.padding = '10px'; // Adds padding to each option
    });
</script>
<script>
    AOS.init();
</script>

</html>