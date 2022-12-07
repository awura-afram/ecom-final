<?php
include_once (dirname(__FILE__)) . '/./settings/core.php';
include_once (dirname(__FILE__)) . '/./controllers/cart_controller.php';

// get reference id
if (isset($_GET['message'])) {
    $payment_ref = $_GET['message'] ?? null;
}

if (isset($_SESSION['user_id'])) {

    $presub = select_subscription_ctr($_SESSION['user_id'], 'Premium')['subscription_type'] ?? null;
    $lite = select_subscription_ctr($_SESSION['user_id'], 'Lite')['subscription_type'] ?? null;
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Gym Template">
    <meta name="keywords" content="Gym, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gym | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="fa fa-close"></i>
        </div>
        <div class="canvas-search search-switch">
            <i class="fa fa-search"></i>
        </div>
        <nav class="canvas-menu mobile-menu">
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./view/about-us.php">About Us</a></li>
                <li><a href="./view/services.php">Services</a></li>
                <li><a href="./view/meal_plan.php">Meal & Merch</a></li>
                <li><a href="./view/contact.php">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="canvas-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-youtube-play"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
    </div>
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="logo">
                        <a href="./index.php">
                            <img src="img/logo.jpg" alt="" height="100" width="100" />
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="nav-menu">
                        <ul>
                            <li class="active"><a href="./index.php">Home</a></li>
                            <li><a href="./view/about-us.php">About Us</a></li>
                            <li><a href="./view/services.php">Services</a></li>
                            <li><a href="./view/meal_plan.php">Meal & Merch</a></li>
                            <li><a href="./view/contact.php">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="top-option">
                        <div class="to-search search-switch">
                            <i class="fa fa-search mr-3"></i>
                            <a href="./view/cart.php"><i class="fa fa-cart-plus"></i></a>
                        </div>
                        <?php

                        if (isset($_SESSION['user_id']) && isset($_SESSION['user_role'])) {
                            // page if admin logs in
                            if ($_SESSION['user_role'] == '1') {
                                header('location: ./admin/index.php');
                            }

                            // if normal user logs in
                            elseif ($_SESSION['user_role'] == '2') {
                        ?>
                                <a href="./login/logout.php" class="login">Logout</a>
                            <?php
                            }
                        } else {
                            ?>
                            <a href="./login/login.php" class="login">Login</a>

                        <?php
                        }
                        ?>

                        <div class="to-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-youtube-play"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="canvas-open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hs-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="./img/hero/index10.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Fitness is a lifestyle.</span>
                                <h1>GO <strong>INSIDE</strong></h1>
                                <a href="#" class="primary-btn">Get info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-item set-bg" data-setbg="./img/hero/index13.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Fitness is a lifestyle.</span>
                                <h1>GO <strong>INSIDE</strong></h1>
                                <a href="#" class="primary-btn">Get info</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- ChoseUs Section Begin -->
    <section class="choseus-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Why chose us?</span>
                        <h2>PUSH YOUR LIMITS FORWARD</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-034-stationary-bike"></span>
                        <h4>Modern equipment</h4>
                        <p>Provides aerobic and anaerobic exercises. Fitness equipment allows you to perform aerobic
                            and anaerobic exercises that play a crucial role in improving your overall fitness</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-033-juice"></span>
                        <h4>Healthy nutrition plan</h4>
                        <p>The mission is not only food consumption, but rather the provision of a pleasant ambience for your own well- being, combined with good service</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-002-dumbell"></span>
                        <h4>Professional training plan</h4>
                        <p>When developing your training plan, there are a number of considerations. Training is something that should be planned and developed in advance.
                            We set learning objectives to measure at the end of the training.
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="cs-item">
                        <span class="flaticon-014-heart-beat"></span>
                        <h4>Unique to your needs</h4>
                        <p>By understanding different customer behaviors, we are able to allocate resources to different customers to generate the highest gain</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ChoseUs Section End -->

    <!-- ChoseUs Section End -->

    <!-- Banner Section Begin -->
    <section class="banner-section set-bg" data-setbg="img/index.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="bs-text">
                        <h2>Register now to join the Family</h2>
                        <div class="bt-tips">Where health, beauty and fitness meet.</div>
                        <a href="#" class="primary-btn  btn-normal">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Pricing Section Begin -->
    <section class="pricing-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Our Plan</span>
                        <h2><?php

                            if (!empty($payment_ref) || !empty($presub) || !empty($lite)) {
                                if (!empty($presub) && empty($lite)) {
                                    echo "You are subscribed to the " . $presub  . " plan";
                                } else if (!empty($lite) && empty($presub)) {
                                    echo "You are subscribed to the " . $lite  . " plan";
                                } else {
                                    echo "You are subscribed to the " . $payment_ref  . " plan";
                                }
                            } else {

                                echo "Choose your pricing plan";
                            }
                            ?></h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <?php
                if ((!empty($payment_ref) && $payment_ref == 'Premium') || !empty($presub)) {

                ?>
                    <div class="col-lg-4 col-md-8">
                        <div class="ps-item">
                            <h3>PREMIUM</h3>
                            <div class="pi-price">
                                <h2>$ 45.99</h2>
                            </div>
                            <ul>
                                <li>Fitness routine & instructive videos</li>
                                <li>Consultation (Schedule meetings)</li>
                                <li>Curated informative Youtube playlists</li>
                                <li>Calorie guidance & nutrition tips</li>
                                <li>Booked live sessions</li>
                                <li>Accountability group</li>
                                <li>Workout song playlists</li>
                                <li>Sample meal plans</li>
                                <li>5% off Go Inside merch</li>
                            </ul>
                            <a href="./actions/unsubscribeMem.php?subType=Premium" class="primary-btn pricing-btn">Unsubscribe</a>
                        </div>
                    </div>
                <?php
                } else if ((!empty($payment_ref) && $payment_ref == 'Lite') || !empty($lite)) {
                ?>
                    <div class="col-lg-4 col-md-8">
                        <div class="ps-item">
                            <h3>LITE</h3>
                            <div class="pi-price">
                                <h2>$ 30.99</h2>
                            </div>
                            <ul>
                                <li>Fitness routine & instructive videos</li>
                                <li>Consultation (Schedule meetings)</li>
                                <li>Curated informative Youtube playlists</li>
                                <li>Calorie guidance & nutrition tips</li>
                            </ul>
                            <a href="./actions/unsubscribeMem.php?subType=Lite" class="primary-btn pricing-btn">Unsubscribe</a>
                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="col-lg-4 col-md-8">
                        <div class="ps-item">
                            <h3>PREMIUM</h3>
                            <div class="pi-price">
                                <h2>$ 45.99</h2>
                            </div>
                            <ul>
                                <li>Fitness routine & instructive videos</li>
                                <li>Consultation (Schedule meetings)</li>
                                <li>Curated informative Youtube playlists</li>
                                <li>Calorie guidance & nutrition tips</li>
                                <li>Booked live sessions</li>
                                <li>Accountability group</li>
                                <li>Workout song playlists</li>
                                <li>Sample meal plans</li>
                                <li>5% off Go Inside merch</li>
                            </ul>
                            <a href="https://paystack.com/pay/a0jeq28dtj" class="primary-btn pricing-btn">Subscribe</a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-8">
                        <div class="ps-item">
                            <h3>LITE</h3>
                            <div class="pi-price">
                                <h2>$ 30.99</h2>
                            </div>
                            <ul>
                                <li>Fitness routine & instructive videos</li>
                                <li>Consultation (Schedule meetings)</li>
                                <li>Curated informative Youtube playlists</li>
                                <li>Calorie guidance & nutrition tips</li>
                            </ul>
                            <a href="https://paystack.com/pay/6zxq6iwl12" class="primary-btn pricing-btn">Subscribe</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Pricing Section End -->

    <!-- Gallery Section Begin -->
    <div class="gallery-section">
        <div class="gallery">
            <div class="grid-sizer"></div>
            <div class="gs-item grid-wide set-bg" data-setbg="./img/gallery/index.jpg">
                <a href="./img/gallery/index.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="./img/gallery/index2.jpg">
                <a href="./img/gallery/index2.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="./img/gallery/index3.jpg">
                <a href="./img/gallery/index3.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="./img/gallery/index5.jpg">
                <a href="./img/gallery/index5.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item set-bg" data-setbg="./img/gallery/index6.jpg">
                <a href="./img/gallery/index6.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
            <div class="gs-item grid-wide set-bg" data-setbg="./img/gallery/index7.jpg">
                <a href="./img/gallery/index7.jpg" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
        </div>
    </div>
    <!-- Gallery Section End -->

    <!-- Team Section Begin -->
    <section class="team-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-title">
                        <div class="section-title">
                            <span>Our Team</span>
                            <h2>TRAIN WITH EXPERTS</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="ts-slider owl-carousel">
                    <div class="col-lg-4">
                        <div class="ts-item set-bg" data-setbg="img/team/index11.jpg">
                            <div class="ts_text">
                                <h4>Nathaniel Oppong</h4>
                                <span>Gym Trainer</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ts-item set-bg" data-setbg="img/team/index3.jpg">
                            <div class="ts_text">
                                <h4>Padi Berimah</h4>
                                <span>Gym Trainer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Section End -->

    <!-- Get In Touch Section Begin -->
    <div class="gettouch-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="gt-text">
                        <i class="fa fa-map-marker"></i>
                        <p>Jamestown</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gt-text">
                        <i class="fa fa-mobile"></i>
                        <ul>
                            <li>+233(0)508581062</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="gt-text email">
                        <i class="fa fa-envelope"></i>
                        <p>goinsidefitness@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Get In Touch Section End -->

    <!-- Footer Section Begin -->
    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="copyright-text">
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/jquery.barfiller.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>