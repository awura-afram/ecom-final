<?php
include_once (dirname(__FILE__)) . '/../controllers/user_controller.php';

if (isset($_POST['addUser'])) {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['pnum'];
    $password = $_POST['password'];

    // hash password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    //insert user into database
    if ($fname && $lname && $email && $contact && $password !== "") {

        $verify_email = verify_email($email);

        if ($verify_email) {
            echo "<script type='text/javascript'> alert('Email already exists');              
            window.history.back();
            </script>";
        } else {
            //add new user
            $result = add_user_controller($fname, $lname, $email, $hashed_password, $contact);
            if ($result) {
                header('Location: ./login.php');
            } else {
                echo "Registration failed";
            }
        }
    } else {
        header('location: register.php');
    }
} else {
    header('location: register.php');
}
