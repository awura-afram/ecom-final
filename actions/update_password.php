<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controllers/user_controller.php';


if (isset($_SESSION['user_role']) && ($_SESSION['user_id'])) {
    if (isset($_POST['updatePassword'])) {
        $user_id = $_SESSION['user_id'];
        $new_password = $_POST['n_pass'];
        $confirm_password = $_POST['c_pass'];

        if ($new_password === $confirm_password) {
            // hash password
            $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

            $result = update_user_password_controller($user_id, $hashed_password);

            if($new_password == '' && $confirm_password == ''){
                echo "<script type='text/javascript'> alert('Fields cannot be blank');              
                    window.history.back();
                    </script>";
            }
            if ($result) {
                echo "<script type='text/javascript'> alert('Password updated successfully');              
                    document.location.href='../login/logout.php';
                    </script>";
            } else {
                echo "<script type='text/javascript'> alert('Password update failed');              
                    document.location.href='../view/userprofile/user-sc-settings.php';
                    </script>";
            }
        }
    }
}
