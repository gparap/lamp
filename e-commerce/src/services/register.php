<?php

/*
 * https://mit-license.org
 * Copyright © 2023 gparap
 * Register user into the database.
 */

if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['email'])) {
    $json_response = array();

    //user registration fields
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = hash('md5', $_POST['password']);
    $address = $_POST['address'];
    $postal_code = $_POST['postal_code'];
    $phone = $_POST['phone'];

    //register user unless they already exist in the database
    require_once('../utils/connection.php');
    $query_email = "SELECT * FROM `users` WHERE email='$email'";
    $query_email_result = mysqli_query($db_connection, $query_email);
    if (mysqli_num_rows($query_email_result) == 1) {
        //user already registered
        $json_response = array("status" => "0", "msg" => "User is already registered in the database.", "user" => $username);

    } else {
        //register user into the database
        $query = "INSERT INTO `users` (`email`, `username`, `password`, `address`, `postal_code`, `phone`) 
                        VALUES ('$email', '$username', '$password', '$address', '$postal_code', '$phone')";
        $query_result = mysqli_query($db_connection, $query);

        if ($query_result == true) {
            //user registerd ok
            $json_response = array("status" => "1", "msg" => "User registration succeeded.", "user" => $username);
        } else {
            //user couldn't register
            $json_response = array("status" => "0", "msg" => "User registration failed.", "user" => "");
        }
    }

    //generate json response
    echo json_encode($json_response);
}

