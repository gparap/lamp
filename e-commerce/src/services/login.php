<?php

/*
 * https://mit-license.org
 * Copyright © 2023 gparap
 * Check if user exists in database.
 */

if (!empty($_POST['username']) && !empty($_POST['email'])) {    //TODO: password
    $json_response = array();
    $username = $_POST['username'];
    $email = $_POST['email'];

    //check if user exists in database
    require_once('../utils/connection.php');
    $query_user = "SELECT * FROM `users` WHERE username='$username' AND email='$email'";
    $query_user_result = mysqli_query($db_connection, $query_user);
    if ($query_user_result->num_rows == 1) {
        //user exists
        $json_response = array("status"=>"1", "msg"=>"User authentication succeeded.");
    }else{
        //user not exists
        $json_response = array("status"=>"0", "msg"=>"User authentication failed.");
    }

    //generate json response
    echo json_encode($json_response);
}

?>