<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controllers/cart_controller.php';
include_once (dirname(__FILE__)) . '/../controllers/user_controller.php';

if (isset($_SESSION['user_id'])) { //gets session of customer(logged in)
    $user_id = $_SESSION['user_id'];  //user_id is now session
    $product_cart = select_all_cart_lg_controller($user_id);
    $selected_user = select_one_user_controller($user_id);
    $cart_amount_lg = sum_cart_lg_controller($user_id);
    $total_checkout = total_checkout_lg_controller($user_id);
}
if (isset($_SESSION['user_id']) && isset($_SESSION['user_role'])) {
    if ($_SESSION['user_role'] == '2') {
?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
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
            <title>Checkout</title>
        </head>

        <body>
            <main>
                <section class="container checkout">
                    <div class="content">
                        <div class="heading">
                            <h2>Checkout</h2>
                        </div>



                        <div class="checkoutInfo">
                            <div class="left">
                                <p class="infoHead">1. Checkout Information</p>

                                <form action="" id="paymentForm">
                                    <div class="fields">
                                        <div>
                                            <label for="">Name</label>
                                            <input type="text" class="form-control" placeholder="Full Name" id="name" value="<?php echo $selected_user['user_fname'] . " " . $selected_user['user_lname'] ?>">
                                        </div>

                                        <div>
                                            <label for="">Email Address</label>
                                            <input type="text" class="form-control" placeholder="Email Address" id="email" value="<?php echo $selected_user['user_email']; ?>">
                                        </div>
                                    </div>
                                    <div class="fields">
                                        <div>
                                            <label for="">Phone Number</label>
                                            <input type="text" class="form-control" placeholder="Phone Number" id="phone" value="<?php echo $selected_user['user_contact']; ?>">
                                        </div>

                                        <div>
                                            <label for="">Address</label>
                                            <input type="text" class="form-control" placeholder="Address" id="address" value="<?php echo $selected_user['user_address']; ?>">
                                        </div>
                                    </div>
                                </form>

                                <p class="infoHead">2. Delivery Information</p>

                                <form action="">
                                    <div class="delivery">
                                        <div class="delPlq active">
                                            <div class="icon">
                                                <img src="../assets/icons/delivery.png" alt="">
                                            </div>
                                            <p>Pickup</p>
                                        </div>
                                        <div class="delPlq">
                                            <div class="icon">
                                                <img src="../assets/icons/carbon_delivery.svg" alt="">
                                            </div>
                                            <p>Delivery</p>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="right">
                                <div class="content">
                                    <div class="heading">
                                        <h2>Summary</h2>
                                    </div>

                                    <div class="orderItems">
                                        <?php
                                        foreach ($product_cart as $order_item) {
                                        ?>
                                            <div class="orItem">
                                                <div class="image">
                                                    <img src="<?php echo $order_item['product_image']; ?>" alt="">
                                                </div>
                                                <div class="details">
                                                    <p><?php echo $order_item['product_title']; ?></p>
                                                    <p>GHS <?php echo $order_item['product_price']; ?></p>
                                                </div>
                                                <p class="quantity">x<?php echo $order_item['quantity']; ?></p>
                                            </div>
                                        <?php
                                        }
                                        ?>

                                    </div>
                                    <hr>

                                    <div class="saleInfo">
                                        <div class="amount">
                                            <div class="amItem">
                                                <p>Subtotal</p>
                                                <p>GHS <?php echo $cart_amount_lg['result']; ?></p>
                                            </div>
                                            <hr>
                                            <div class="amItem">
                                                <p>Delivery</p>
                                                <p>GHS 0.00</p>
                                            </div>
                                            <hr>
                                            <div class="amItem">
                                                <h1>Total</h1>
                                                <p class="total">GHS <?php echo $cart_amount_lg['result']; ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="btn">
                                        <button type="button" id="pay" class="pay" onclick="payWithPaystack()" value="<?php echo $cart_amount_lg['result']; ?>">Pay GHS <?php echo $cart_amount_lg['result']; ?></button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- absolute image background -->

                    <img class="chkBG-img" src="../assets/backgrounds/checkbg.svg" alt="">
                </section>

            </main>
            <!-- PAYSTACK INLINE SCRIPT -->
            <script src="https://js.paystack.co/v1/inline.js"></script>

            <script type="text/javascript">
                // const paymentForm = document.getElementById('paymentForm');
                // paymentForm.addEventListener("submit", payWithPaystack, false);

                // PAYMENT FUNCTION
                function payWithPaystack() {

                    let handler = PaystackPop.setup({
                        key: 'pk_live_bd5356607a881f3a0d6843b75d3172b74b9675cd', // Replace with your public key
                        // key: 'pk_test_b28f7685fbbab527a165b02f5d271541fa8e95fa', // Replace with your public key
                        // key: 'pk_test_aeac52408dfe068589d984dc145de1ea34aa8a1d', // Replace with your public key
                        //pk_live_bd5356607a881f3a0d6843b75d3172b74b9675cd
                        email: document.getElementById("email").value,
                        phone: document.getElementById("phone").value,
                        amount: document.getElementById("pay").value * 100,
                        currency: 'GHS',
                        onClose: function() {
                            // window.location = "http://localhost/CodeX/index.php?transaction=cancel"
                            alert('Transaction Cancelled.');
                        },
                        callback: function(response) {

                            let message = "Payment Successful! Reference: " + response.reference;
                            alert(message);
                            window.location = "../actions/processPayment.php?reference=" + response.reference;
                            // window.location = "http://localhost/CodeX/Actions/processPayment.php?reference=" + response.reference;
                        }
                    });
                    handler.openIframe();
                }
            </script>

        </body>

        </html>
<?php
    }
} else {
}
