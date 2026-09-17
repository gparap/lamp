<?php

/**
 * https://mit-license.org
 * Copyright © 2026 gparap
 */

/* Gets the database connection object. */
function get_db_connection(): mysqli {
	require_once (__DIR__ . '/connection.php');
	return $db_connection;
}

/* Logging users in & give them session vars. */
function log_in_user($username, $password): bool {
	$is_user_logged_in = false;

	//perform the log in process
	$db_connection = get_db_connection ();
	$query = "SELECT * FROM `users` WHERE username = ?";
	$stmt = mysqli_prepare ( $db_connection, $query );
	mysqli_stmt_bind_param ( $stmt, "s", $username );
	mysqli_stmt_execute ( $stmt );
	$query_results = mysqli_stmt_get_result ( $stmt );
	$query_results_rows = mysqli_num_rows ( $query_results );
	if ($query_results_rows == 1) {
		while ( $row = mysqli_fetch_assoc ( $query_results ) ) {
			if (password_verify ( $password, $row ['password'] )) {
				//give the user session vars
				if (session_status() == PHP_SESSION_NONE) {
					session_start ();				
				}
				$_SESSION ['id'] = $row ['id'];
				$_SESSION ['role'] = $row ['role'];
				$_SESSION ['name'] = $row ['username'];

				$is_user_logged_in = true;
			}
		}
	}
	$db_connection->close();
	return $is_user_logged_in;
}

/* Registers a new user always with a default role. */
function register_user($user_data): array {
	$result = array('result' => true, 'info' => "User registered successfully...");
	
	//do a basic safe registration data cleanup
	$email = trim($user_data['email'] ?? '');
	$email = strip_tags($user_data['email']);
	$username = trim($user_data['username'] ?? '');
	$username = strip_tags($user_data['username']);
	$firstname = trim($user_data['firstname'] ?? '');
	$firstname = strip_tags($user_data['firstname']);
	$lastname = trim($user_data['lastname'] ?? '');
	$lastname= strip_tags($user_data['lastname']);
	$address = trim($user_data['address'] ?? '');
	$address = strip_tags($user_data['address']);
	$postal_code = trim($user_data['postal_code'] ?? '');
	$postal_code = strip_tags($user_data['postal_code']);
	$phone = trim($user_data['phone'] ?? '');
	$phone = strip_tags($user_data['phone']);
	
	//hash user password
	$password = password_hash($user_data['password'], PASSWORD_DEFAULT);
	
	//check if user already exists (email)
	$db_connection = get_db_connection ();
	$query = "SELECT * FROM `users` WHERE `email` = '$email'";
	$query_result = mysqli_query($db_connection, $query);
	if ($query_result->num_rows > 0) {
		$result['info'] = "This e-mail is already registered.";
		$result['result'] = false;
		return $result;
	}
	
	//perform the registration process
	$query = "INSERT INTO users(email, username, password, firstname, lastname, address, postal_code, phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
	$stmt = mysqli_prepare ( $db_connection, $query );
	mysqli_stmt_bind_param ( $stmt, "ssssssss", $email, $username, $password, $firstname, $lastname, $address, $postal_code, $phone );
	$query_result =  mysqli_execute( $stmt );
	if (!$query_result) {	
		$result['info'] = "Registration failed..";
		$result['result'] = false;
	}
	$db_connection->close();
	return $result;
}

?>
