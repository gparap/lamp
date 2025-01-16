<?php
if (!empty($_POST['email']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    $result = array();

    //get POST values
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    //connect to the database
    require_once('../src/connection.php');

    if (!$db_connection) {
    	$result = array("status"=>"0", "msg"=>"Database connection failed.");
    }else{
        //check if user already exists
        $query = "SELECT * FROM `users` WHERE email='$email'";
        $query_result = mysqli_query($db_connection, $query);
        $query_result_rows = mysqli_num_rows($query_result);
        if ($query_result_rows == 1) {
            $result = array("status"=>"0", "msg"=>"User already registered.");
        }
        else{
            //encrypt password
            $password = password_hash($password, PASSWORD_DEFAULT);
            
            //register user
            $query = "INSERT INTO `users`(`email`, `username`, `password`) VALUES('$email', '$username', '$password')";
            $query_result = mysqli_query($db_connection, $query);

            //check user registration result
            if ($query_result == 1) {
                $result = array("status"=>"1", "msg"=>"User registration successful.");
            }else{
                $result = array("status"=>"0", "msg"=>"User registration failed.");
            }
        }
    }

    //create json response
    echo json_encode($result);
}
?>