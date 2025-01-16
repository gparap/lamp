<?php
if (!empty($_POST['email']) && !empty($_POST['password'])) {
	$result = array();
	$email = $_POST['email'];
	$password = $_POST['password'];
    	
	//connect to the database
    require_once('../src/connection.php');
    
    if (!$db_connection) {
    	$result = array("status"=>"0", "msg"=>"Database connection failed.");
    }else {
    	//query database
    	$query = "SELECT * FROM `users` WHERE email='$email'";
    	$query_results = mysqli_query($db_connection, $query);
   	
   		//check query results
   	    $query_results_rows = mysqli_num_rows($query_results);
    	if ($query_results_rows == 1) {
    	    while ($row = mysqli_fetch_assoc($query_results)) {
    	        //verify password & return result
    	        if (password_verify($password, $row['password'])) {
    	            $result = array("status"=>"1", "msg"=>"User authentication succeeded.");
    	        }else {
    	            $result = array("status"=>"0", "msg"=>"User authentication failed.");
    	        }
    	    }
    	}else {
			$result = array("status"=>"0", "msg"=>"User authentication failed.");
    	}
    }
    
    //create json response
    echo json_encode($result);
}
?>