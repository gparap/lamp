<?php

/*
 * https://mit-license.org
 * Copyright © 2023 gparap
 * Register user into the database.
 */

if (!empty($_POST['username']) && !empty($_POST['email'])) {    //TODO: password hash
    $json_response = array();

    //user registration fields
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $postal_code = $_POST['postal_code'];
    $phone = $_POST['phone'];

    //TODO: check if user already exists

    //register user into the database
    require_once('../utils/connection.php');
    $query = "INSERT INTO `users` (`email`, `username`, `password`, `address`, `postal_code`, `phone`) 
                    VALUES ('$email', '$username', '$password', '$address', '$postal_code', '$phone')";
    $query_result = mysqli_query($db_connection, $query);

    if ($query_result == true) {
        //user registerd ok
        $json_response = array("status"=>"1", "msg"=>"User registration succeeded.",
        "query_result"=>$query_result);
    }else{
        //user couldn't register
        $json_response = array("status"=>"0", "msg"=>"User registration failed.");
    }

    //generate json response
    echo json_encode($json_response);
}

?>