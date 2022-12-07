<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controllers/user_controller.php';

if (isset($_SESSION['user_role']) && isset($_SESSION['user_id'])) {
    if (isset($_GET['updateEmail'])) {
        $user_id = $_SESSION["user_id"];
        $get_admin = select_one_user_controller($user_id);
        $email = $get_admin['user_email'];
        echo $email;

        $result = update_email_controller($user_id, $email);

        if ($result) {
            echo "
                            <script type='text/javascript'>
                                alert('Email updated successfully');
                                document.location.href='../login/login.php';
                            </script>
                        ";
        } else {
            echo "
                            <script type='text/javascript'>
                                alert('Failed to update email');
                                window.history.back();
                            </script>
                        ";
        }
    }

}
