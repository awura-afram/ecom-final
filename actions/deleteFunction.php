<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controllers/cart_controller.php';

// delete payment
if (isset($_GET['deletePayID'])) {

    $id = $_GET['deletePayID'];

    // call the function
    $result = delete_payment_controller($id);

    if ($result === true) {
        echo "<script type='text/javascript'> alert('Successfully deleted');
            window.history.back()';
            </script>";
    } else {
        echo "<script type='text/javascript'> alert('Delete Failed');              
        window.history.back();
        </script>";
    }
}


// delete order
if (isset($_GET['delOrder'])) {

    $id = $_GET['delOrder'];

    // call the function
    $result = delete_order_controller($id);

    if ($result === true) {
        echo "<script type='text/javascript'> alert('Successfully deleted');
            window.history.back()';
            </script>";
    } else {
        echo "<script type='text/javascript'> alert('Delete Failed');              
        window.history.back();
        </script>";
    }
}