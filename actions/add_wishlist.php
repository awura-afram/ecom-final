<?php

// Process adding to wishlist and other wishlist functionality

include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controllers/wishlist_controller.php';


$p_id = $_GET['p_id'];

//get customers IP address
$ipAddress = check_ip();

if (isset($p_id)) {
    $user_id = $_SESSION['user_id'];

    //check duplicate wishlist for customer logged in
    $check_lg = check_wishlist_lg_controller($p_id, $user_id);

    if ($check_lg) {
        echo "<script type='text/javascript'>alert('Product already in wishlist.'); window.history.back();</script>";
    } else {
        //add to wishlist for customer logged in
        $add_lg = add_wishlist_lg_controller($p_id, $user_id);

        if ($add_lg) {
            echo "
            <script type='text/javascript'>
            alert('Product has been added to wishlist'); 
            window.history.back();
            </script>
            ";
        } else {
            echo "<script>alert('Product has not been added to wishlist'); window.history.back();</script>";
        }
    }
}

else if (isset($_GET['deleteID'])) {

    $pid = $_GET['deleteID'];

    if (isset($_SESSION['user_id'])) {
        $cid = $_SESSION['user_id'];
        $delete = delete_wishlist_lg_controller($pid, $cid);
        if ($delete) {
            echo "<script type='text/javascript'> alert('Successfully deleted from wishlist');
            window.history.back();
            </script>";
        } else {
            echo "something went wrong";
        }
    }
} else {
    header("location: ../index.php");
}
