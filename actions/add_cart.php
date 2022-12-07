<?php

// Process adding to cart and other cart functionality

include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controllers/cart_controller.php';


$p_id = $_GET['p_id'];
$user_id = $_SESSION['user_id'];

//get customers IP address
$ipAddress = check_ip();

if (isset($user_id)) {
  
    //check duplicate cart for customer logged in
    $check_lg = check_cart_lg_controller($p_id, $user_id);

    if ($check_lg) {
        echo "<script>alert('Product already in Cart. Go to Cart and increase quantity'); window.history.back();</script>";
    } else {
        //add to cart for customer logged in
        $add_lg = add_cart_lg_controller($p_id, $user_id);

        if ($add_lg) {
            echo "<script>alert('Product has been added to Cart'); window.history.back();</script>";
        } else {
            echo "<script>alert('Product has not been added to Cart'); window.history.back();</script>";
        }
    }
} else if(isset($ipAddress)){

    //check duplicate cart for guest customer
    $check_gst = check_cart_gst_controller($p_id, $ipAddress);

    if ($check_gst) {
        echo "<script>alert('Product already in Cart. Go to Cart and increase quantity'); window.history.back();</script>";
    } else {

        //add to cart for guest customer
        $add_gst = add_cart_gst_controller($p_id, $ipAddress);

        if ($add_gst) {
            echo "<script>alert('Product has been added to Cart'); window.history.back();</script>";
        } else {
            echo "<script>alert('Product has not been added to Cart'); window.history.back();</script>";
        }
    }
}



