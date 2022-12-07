<?php
//connect to the user class

include_once (dirname(__FILE__)) . '/../classes/user_class.php';

/**
 *add new user controller 
 *takes the first name, last name,email, password, and contact
 */
function add_user_controller($fname, $lname, $email, $password, $contact)
{
    // create an instance of the user class
    $user_instance = new User();
    // call the method from the class
    return $user_instance->add_user($fname, $lname, $email, $password, $contact);
}

/**
 *edit a user function 
 *takes the id, first name, last name,email, password, and contact
 */
function update_user_controller($id, $email, $phone_num, $address, $img)
{
    // create an instance of the user class
    $user_instance = new User();
    // call the method from the class
    return $user_instance->update_one_user($id, $email, $phone_num, $address, $img);
}

function update_user_password_controller($id, $email)
{
    // create an instance of the user class
    $user_instance = new User();
    // call the method from the class
    return $user_instance->update_password($id, $email);
}



/**
 *delete a user function 
 *takes the id
 */
function delete_user_controller($id)
{
    // create an instance of the user class
    $user_instance = new User();
    // call the method from the class
    return $user_instance->delete_one_user($id);
}

/**
 *select all users function 
 *
 */
function select_all_users_controller()
{
    // create an instance of the user class
    $user_instance = new User();
    // call the method from the class
    return $user_instance->select_all_users();
}
/**
 *select a user function 
 *takes the id
 */
function select_one_user_controller($id)
{
    // create an instance of the user class
    $user_instance = new User();
    // call the method from the class
    return $user_instance->select_one_user($id);
}

/**
 *check if mail exists function 
 *takes the email
 */
function verify_email($email)
{
    //create an instance of the user class
    $user_instance = new User();
    return $user_instance->verify_email($email);
}

/**
 *get login information function 
 *takes the mail
 */
function get_login_func($email)
{
    $user_instance = new User();
    return $user_instance->verify_login($email);
}

function count_users_func()
{
    $user_instance = new User();
    return $user_instance->count_users();
}

function update_email_controller($user_id, $email)
{
    $user_instance = new User();
    return $user_instance->update_email($user_id, $email);
}
