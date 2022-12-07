<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controllers/user_controller.php';

if (isset($_POST['updateUser'])) {
    $user_id = $_SESSION['user_id'];
    $email = $_POST['email'];
    $pnum = $_POST['pnum'];
    $address = $_POST['address'];

    $target_dir = "../assets/images/profile/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imgFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (empty($_FILES["image"]["name"])) {
        echo "Must insert an Image";
    } else {
        $img_size = getimagesize($_FILES["image"]["tmp_name"]);
        if ($img_size == false) {
            echo "The file is not a valid image";
        }
        if ($_FILES["image"]["size"] > 5000000000) {
            echo "Image file is too large";
        }
        if ($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg" && $imgFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
    }
    $image_upload = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    if ($image_upload) {

        $result = update_user_controller($user_id, $email, $pnum, $address, $target_file);

        if ($result) {
            echo "<script type='text/javascript'> alert('Updated successfully');              
                    document.location.href='../view/userprofile/user-ac-settings.php';
                    </script>";
        } else {
            echo "<script type='text/javascript'> alert('Failed to update');              
            document.location.href='../view/userprofile/user-ac-settings.php';
                    </script>";
        }
    } else {
        echo "<script type='text/javascript'> alert('Failed to insert');              
                    window.history.back();
                    </script>";
    }
}
