<?php

/*
 * https://mit-license.org
 * Copyright © 2023 gparap
 * Check if user exists in database.
 */

if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $json_response = array();
    $username = $_POST['username'];
    $password = hash('md5', $_POST['password']);

    //check if user exists in database
    require_once('../utils/connection.php');
    $query_user = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
    $query_user_result = mysqli_query($db_connection, $query_user);
    if ($query_user_result->num_rows == 1) {
        //user exists
        $json_response = array("status"=>"1", "msg"=>"User authentication succeeded.", "user"=>$username);
    }else{
        //user not exists
        $json_response = array("status"=>"0", "msg"=>"User authentication failed.", "user"=>"");
    }

    //generate json response
    echo json_encode($json_response);
}

?>