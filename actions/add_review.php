<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controllers/product_controller.php';

if (isset($_GET['submitReview'])) {
    $user_id = $_GET['user_id'];
    $product_id = $_GET['product_id'];
    $review = $_GET['desc'];
    $post_date = $_GET['post_date'];

    if ($user_id !== '' && $product_id !== '' && $review !== '' && $post_date !== '') {
        $addReview = add_order_reviews_controller($user_id, $product_id, $review, $post_date);
        if ($addReview) {
            echo "<script>
            alert('Review added successfully'); 
            document.location.href='../view/userprofile/user-reviews.php';
            </script>";
        } else {
            echo "<script>alert('Review not added'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Review not added'); window.history.back();</script>";
    }
}
