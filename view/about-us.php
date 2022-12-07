<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';

?>
<!DOCTYPE php>
<php lang="zxx">

    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Gym Template">
        <meta name="keywords" content="Gym, unica, creative, php">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Gym | Template</title>

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,500,600,700&display=swap" rel="stylesheet">

        <!-- Css Styles -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="../css/flaticon.css" type="text/css">
        <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="../css/barfiller.css" type="text/css">
        <link rel="stylesheet" href="../css/magnific-popup.css" type="text/css">
        <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="../css/style.css" type="text/css">
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
                    <li><a href="./view/services.php">Services</a></li>]
                    <li><a href="./meal_plan.php">Meal Plan</a></li>
                    <li><a href="./contact.php">Contact</a></li>
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
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="./about-us.php">About Us</a></li>
                    <li><a href="./services.php">Services</a></li>
                    <li><a href="./meal_plan.php">Meal & Merch</a></li>
                    <li><a href="./contact.php">Contact</a></li>
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
                            <a href="../index.php">
                                <img src="../img/logo.jpg" alt="" height="100" width="100" />
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <nav class="nav-menu">
                            <ul>
                                <li><a href="../index.php">Home</a></li>
                                <li class="active"><a href="./about-us.php">About Us</a></li>
                                <li><a href="./services.php">Services</a></li>
                                <li><a href="./meal_plan.php">Meal & Merch</a></li>
                                <li><a href="./contact.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        <div class="top-option">
                            <div class="to-search search-switch">
                                <i class="fa fa-search mr-3"></i>
                                <a href="cart.php"><i class="fa fa-cart-plus"></i></a>
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

        <!-- Breadcrumb Section Begin -->
        <section class="breadcrumb-section set-bg" data-setbg="../img/breadcrumb-bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <div class="breadcrumb-text">
                            <h2>About us</h2>
                            <div class="bt-option">
                                <a href="../index.php">Home</a>
                                <span>About</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Section End -->

        <!-- About US Section Begin -->
        <section class="aboutus-section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 p-0">
                        <div class="about-video set-bg" data-setbg="../img/index.jpg">
                        </div>
                    </div>
                    <div class="col-lg-6 p-0">
                        <div class="about-text">
                            <div class="section-title">
                                <span>About Us</span>
                                <h2>What we have done</h2>
                            </div>
                            <div class="at-desc">
                                <p>GoInside promotes fitness in a fun way. We see working out as a lifestyle and therefore we think it should be so for everyone. We have been able to create a network of gym rats and it has been an amazing experience.</p>
                            </div>
                            <div class="about-bar">
                                <div class="ab-item">
                                    <p>Body building</p>
                                    <div id="bar1" class="barfiller">
                                        <span class="fill" data-percentage="80"></span>
                                        <div class="tipWrap">
                                            <span class="tip"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="ab-item">
                                    <p>Training</p>
                                    <div id="bar2" class="barfiller">
                                        <span class="fill" data-percentage="85"></span>
                                        <div class="tipWrap">
                                            <span class="tip"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="ab-item">
                                    <p>Fitness</p>
                                    <div id="bar3" class="barfiller">
                                        <span class="fill" data-percentage="75"></span>
                                        <div class="tipWrap">
                                            <span class="tip"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About US Section End -->

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
                            <div class="ts-item set-bg" data-setbg="../img/team/index11.jpg">
                                <div class="ts_text">
                                    <h4>Nathaniel Oppong</h4>
                                    <span>Gym Trainer</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="ts-item set-bg" data-setbg="../img/team/index3.jpg">
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

        <!-- Banner Section Begin -->
        <section class="banner-section set-bg" data-setbg="../img/index.jpg">
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

        <!-- Testimonial Section Begin -->
        <section class="testimonial-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <span>Testimonial</span>
                            <h2>Our cilent say</h2>
                        </div>
                    </div>
                </div>
                <div class="ts_slider owl-carousel">
                    <div class="ts_item">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="ti_pic">
                                    <img src="../img/testimonial/index16.jpg" alt="">
                                </div>
                                <div class="ti_text">
                                    <p>Go Inside has been awesome to me. <br />Their trainers are exceptional,
                                        the overall vibe is great and I have had nothing but good experiences.<br />
                                        I definitely recommend them to my friends and family.</p>
                                    <h5>Daniel Odei</h5>
                                    <div class="tt-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ts_item">
                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <div class="ti_pic">
                                    <img src="../img/testimonial/index17.jpg" alt="">
                                </div>
                                <div class="ti_text">
                                    <p>This is a fantastic gym!! All the trainers are super nice and take an interest in
                                        you no matter what fitness level you’re at. <br />
                                        I really like how they give me tips and tricks to get the most out of every workout.
                                        <br />
                                        I’ve been going for a little bit and am already seeing a big change in my energy levels and body.
                                        It’s great! I feel 10 years younger!
                                    </p>
                                    <h5>James Duncan</h5>
                                    <div class="tt-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial Section End -->

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
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.magnific-popup.min.js"></script>
        <script src="../js/masonry.pkgd.min.js"></script>
        <script src="../js/jquery.barfiller.js"></script>
        <script src="../js/jquery.slicknav.js"></script>
        <script src="../js/owl.carousel.min.js"></script>
        <script src="../js/main.js"></script>


    </body>

</php>