<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controllers/cart_controller.php';




if (isset($_GET['subType'])) {
    $subtype = $_GET['subType'];
    $user_id = $_SESSION['user_id'];

    $result = remove_subscription_ctr($user_id, $subtype);

    if ($result) {
        header('Location: ../index.php');
    } else {
        echo "failed to unsubscribe";
    }
}
