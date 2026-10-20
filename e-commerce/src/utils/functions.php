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

/* Logs out the current user by removing all session vars and destroying the session. */
function log_out_user() {
	if (session_status() == PHP_SESSION_NONE) {
		session_start ();
	}
	session_unset();
	session_destroy();
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

/* Checks if user has successfully logged-in before accessing priviledged pages. */
function is_user_authenticated(): bool {
	if (isset($_SESSION['role'])) {
		return TRUE;
	}
	return FALSE;
}

/* Renders a product category filter based on a database record. */
function render_product_category_filter($row) {
	$id = $row ['id'];
	$name = $row ['name'];

	return sprintf ( '<div class="form-check">
			            <input class="form-check-input" type="checkbox" id="formCheck-%d">
			            <label class="form-check-label" for="formCheck-%d">%s</label>
		        	  </div>', $id, $id, $name );
}

/* Renders a product category card based on a database record. */
function render_product_category_card($row) { //TODO: No. of products per category, etc
	$id = $row ['id'];
	$name = $row ['name'];
	$items = $row['items_total'];
	
	//TODO: give proper icon based on name
	
	return sprintf ( '<div class="col-md-6 col-xl-3 mb-4">
							<div class="card shadow py-2 border-left-primary">
								<div class="card-body">
									<div class="row g-0 align-items-center">
										<div class="col me-2">
											<div class="text-uppercase text-primary mb-1 fw-bold text-xs">
												<span>%s</span>
											</div>
											<div class="text-dark mb-0 fw-bold h5">
												<span>'.$items.' products</span>
											</div>
										</div>
										<div class="col-auto">
											<i class="fas fa-boxes fa-2x text-gray-300"></i>
										</div>
									</div>
								</div>
							</div>
						</div>', $name );
}

/* Renders a product based on a database record. */
function render_product($row) {
	$id = $row ['id'];
	$name = $row ['name'];
	$desc_short = $row ['description_short'];
	$price = $row['item_cost'];
	//TODO: $img = $row ['image_url'];
	
	return sprintf ( '<div class="col-md-4">
							<div class="card">
								<img src="https://placehold.co/256x256" class="card-img-top" alt="">							
								<div class="card-body">
									<h5 class="card-title">%s</h5>
									<p class="card-text">%s</p>
									<p class="card-text"><i>price: &nbsp;&nbsp; %s</i></p>
									<div class="d-flex gap-5 justify-content-start mb-5">
										<a href="#pid=%d" class="btn btn-dark btn-sm px-4">View More</a>
									</div>	
								</div>
							</div>
							<input type="hidden" name="pid" value="%d">
						</div>', $name, $desc_short, $price, $id, $id );
}
function add_category($name, $desc, $file, $keywords): bool|string { // TODO: Refactor
    require_once (__DIR__ . '/../../config/config.php');
    $msg = "";

    // do a basic safe parameters cleanup
    $name = trim($name ?? '');
    $name = strip_tags($name);
    $desc = trim($desc ?? '');
    $desc = strip_tags($desc);
    $keywords = trim($keywords ?? '');
    $keywords = strip_tags($keywords);

    // check if the file is a valid image file
    $file_extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $file_extension = strtolower($file_extension);
    $allowed_file_exts = [
        'gif',
        'jpeg',
        'jpg',
        'png',
        'webp'
    ];
    if (! (in_array($file_extension, $allowed_file_exts))) {
        $msg = "File type not allowed.";
        return $msg;
    }

    // generate a unique new name for the file
    $file_name = uniqid('img_', true) . '.' . $file_extension;

    // get uploaded file attributes
    $file_temp_name = $file['tmp_name'];
    $file_error = $file['error'];
    $file_size = $file['size'];

    // if we have file uploaded errors
    if ($file_error !== UPLOAD_ERR_OK) {
        $msg = "Error uploading file.";
        return $msg;
    }

    // if file size is not allowed by the server configuration
    if ($file_size >= 2097152) {
        $msg = "File is too big.";
        return $msg;
    }

    // move uploaded file to images folder
    $destination = IMG_PATH . "/$file_name";
    move_uploaded_file($file_temp_name, $destination);

    // add category to database
    $connection = get_db_connection();
    $query = "INSERT INTO categories(name, description, image_url, keywords) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "ssss", $name, $desc, $file_name, $keywords);
    $query_result = mysqli_execute($stmt);
    mysqli_stmt_close($stmt);

    // return with some feedback
    if (! $query_result) {
        $msg = mysqli_stmt_error($stmt);
        error_log("E-Commerce: " . $msg);
        return $msg;
    }
    $msg = "Category added successfully...";
    return $msg;
}

?>
