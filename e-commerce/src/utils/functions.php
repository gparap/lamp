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

?>
