<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controllers/cart_controller.php';
if (isset($_SESSION['user_id'])) { //gets session of customer(logged in)
    $user_id = $_SESSION['user_id'];  //user_id is now session
    $all_cart_items = select_all_cart_lg_controller($user_id);
    $cart_amount_lg = sum_cart_lg_controller($user_id);
} else {
    $ipAddress = check_ip();
    $all_cart_items = select_all_cart_gst_controller($ipAddress);
    $cart_amount_gst = sum_cart_gst_controller($ipAddress);
}
// print_r($select_iliwib);
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
    <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="../css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/main/app.css">
    <link rel="stylesheet" href="../assets/css/main/app-dark.css">
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
                            <li><a href="./about-us.php">About Us</a></li>
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
                        <h2>Cart</h2>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Team Section Begin -->
    <section class="team-section team-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-title">
                        <div class="section-title">
                            <span>Cart</span>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php
                foreach ($all_cart_items as $item) {
                ?>
                    <div class="col-lg-9 mb-3">
                        <div class="cartItem row align-items-center">
                            <div class="cI-left row col-lg-5 align-items-center">
                                <div class="picture col-lg-3">
                                    <img src="<?php echo $item['product_image'] ?>" alt="">
                                </div>
                                <div class="details col-lg-3">
                                    <h3><?php echo $item['product_title'] ?></h3>
                                    <p>GHS <?php echo $item['product_price'] ?></p>
                                </div>
                            </div>
                            <div class="quantity row col-lg-4">
                                <div class="row col-lg-auto">
                                    <a class="col-lg-1" href="../actions/manage_quantity.php?decID=<?php echo $item['product_id'] ?>"><i class="fa fa-minus"></i></a>
                                    <span class="col-lg-1"><?php echo $item['quantity'] ?></span>
                                    <a class="col-lg-1" href="../actions/manage_quantity.php?incID=<?php echo $item['product_id'] ?>"><i class="fa fa-plus"></i></a>
                                </div>
                                <div class="remove col-lg-1">
                                    <a href="../actions/manage_quantity.php?deleteID=<?php echo $item['product_id'] ?>"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }

                ?>

                <div class="col-lg-3">
                    <div class="amount">
                        <div class="amItem">
                            <p>Subtotal</p>
                            <p>GHS <?php echo $cart_amount_lg['result'] ?></p>
                        </div>
                        <hr>

                        <div class="amItem">
                            <h1>Total</h1>
                            <p class="total">GHS <?php echo $cart_amount_lg['result'] ?></p>
                        </div>

                        <div class="btn btn-dark">
                            <a href="checkout.php">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

</html>