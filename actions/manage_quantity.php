<?php

include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controllers/cart_controller.php';


// manage quantity
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    //Decrease the quantity in the cart
    if (isset($_GET['decID'])) {
        $p_id = $_GET['decID'];
        $cartItem = select_one_lg_controller($p_id, $user_id);
        $stock_count = get_stock_controller($p_id);
        foreach ($cartItem as $item) {
            $oldQty = $item['quantity'];
            $newQty = $oldQty - 1;
            if ($oldQty != 0 && $newQty != 0) {
                if (($stock_count['stock']) >= 0) {
                    $remain_stock = $stock_count['stock'] + 1;
                    $new_stock = update_stock_controller($remain_stock, $p_id);
                    $result = update_cart_lg_controller($newQty, $p_id, $user_id);
                    echo "<script>document.location.href='../view/cart.php';</script>";
                }

                echo "<script>document.location.href='../view/cart.php';</script>";
            } else {
                echo "<script>document.location.href='../view/cart.php';;</script>";
            }
        }
    }

    //Increase the quantity in the cart
    if (isset($_GET['incID'])) {
        $p_id = $_GET['incID'];
        $cartItem = select_one_lg_controller($p_id, $user_id);
        $stock_count = get_stock_controller($p_id);
        foreach ($cartItem as $item) {
            $oldQty = $item['quantity'];
            $newQty = $oldQty + 1;
            if (($stock_count['stock']) >= 0) {
                $remain_stock = $stock_count['stock'] - 1;
                if ($remain_stock <= 0) {
                    echo "<script>alert('Out of stock');document.location.href='../view/cart.php';</script>";
                } else {
                    $new_stock = update_stock_controller($remain_stock, $p_id);
                    $result = update_cart_lg_controller($newQty, $p_id, $user_id);
                    echo "<script>document.location.href='../view/cart.php';</script>";
                }
            } else {
                echo "<script>alert('Out of stock');document.location.href='../view/cart.php';</script>";
            }
            echo "<script>document.location.href='../view/cart.php';</script>";
        }
    }
} else { // GUEST
    $ipAddress = check_ip();
    //Decrease the quantity in the cart
    if (isset($_GET['decID'])) {
        $p_id = $_GET['decID'];
        $cartItem = select_one_gst_controller($p_id, $ipAddress);
        $stock_count = get_stock_controller($p_id);
        foreach ($cartItem as $item) {
            $oldQty = $item['quantity'];
            $newQty = $oldQty - 1;
            if ($oldQty != 0 && $newQty != 0) {
                if (($stock_count['stock']) >= 0) {
                    $remain_stock = $stock_count['stock'] + 1;
                    $new_stock = update_stock_controller($remain_stock, $p_id);
                    $result = update_cart_gst_controller($newQty, $p_id, $ipAddress);
                    echo "<script>document.location.href='../view/cart.php';</script>";
                }

                echo "<script>document.location.href='../view/cart.php';</script>";
            } else {
                echo "<script>document.location.href='../view/cart.php';;</script>";
            }
        }
    }

    //Increase the quantity in the cart
    if (isset($_GET['incID'])) {
        $p_id = $_GET['incID'];
        $cartItem = select_one_gst_controller($p_id, $ipAddress);
        $stock_count = get_stock_controller($p_id);
        foreach ($cartItem as $item) {
            $oldQty = $item['quantity'];
            $newQty = $oldQty + 1;
            if (($stock_count['stock']) >= 0) {
                $remain_stock = $stock_count['stock'] - 1;
                if ($remain_stock <= 0) {
                    echo "<script>alert('Out of stock');document.location.href='../view/cart.php';</script>";
                } else {
                    $new_stock = update_stock_controller($remain_stock, $p_id);
                    $result = update_cart_gst_controller($newQty, $p_id, $ipAddress);
                    echo "<script>document.location.href='../view/cart.php';</script>";
                }
            } else {
                echo "<script>alert('Out of stock');document.location.href='../view/cart.php';</script>";
            }
            echo "<script>document.location.href='../view/cart.php';</script>";
        }
    }
}


// remove from cart

if (isset($_GET['deleteID'])) {

    $pid = $_GET['deleteID'];
    $ipadd = check_ip();

    if (isset($_SESSION['user_id'])) {
        $cid = $_SESSION['user_id'];
        $delete = delete_cart_lg_controller($pid, $cid);
        if ($delete) {
            echo "<script type='text/javascript'> alert('Successfully deleted from Cart');
            document.location.href='../view/cart.php';
            </script>";
        } else {
            echo "something went wrong";
        }
    } else {
        $delete = delete_cart_gst_controller($pid, $ipadd);
        if ($delete) {
            echo "<script type='text/javascript'> alert('Successfully deleted from Cart');
            document.location.href='../view/cart.php';
            </script>";
        } else {
            echo "<script type='text/javascript'> alert('Delete Failed');              
            document.location.href='../view/cart.php';
        </script>";
        }
    }
}
