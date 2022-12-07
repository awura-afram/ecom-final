<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controllers/product_controller.php';

$searchCategory = $_GET['searchTerm'];

//get customers IP address
$ipAddress = check_ip();

if (isset($_SESSION['user_id'])) {
    $user = $_SESSION['user_id'];
    $product_search = search_for_product($searchCategory);
    session_start();
    $_SESSION['search_result'] = $product_search;
    header("Location: ../view/shop.php");
} else{
    $user = $ipAddress;
    $product_search = search_for_product($searchCategory);
    session_start();
    $_SESSION['search_result'] = $product_search;
    header("Location: ../view/shop.php");
}


if (isset($_GET['searchTerm'])) {
    $search = $_GET['searchTerm'];
    $product_search = search_for_product($search);

    session_start();
    $_SESSION['search_result'] = $product_search;

    header("Location: ../view/shop.php");
}
