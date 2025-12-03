<?php
require_once __DIR__ . '/../../config/config.php';

//get the session vars, if any
$role = $_SESSION['role'] ?? "";

//if user is not signed-in go to login page
if (empty($role)) {
    $location = URL_PUBLIC . "/auth/login.php";
    echo '<script>window.location.href = "' . $location . '";</script>';
    exit();
}

/** Returns e-lirary users based on query parameters criteria. */
function get_users($param): array
{
    //init vars
    $users = NULL;
    $role = NULL;
    $query = NULL;
    $query_statement = NULL;

    //handle the browser query
    $allowed_user_types = [
        "all",
        'A',
        'L',
        'M'
    ]; //Administrators, Librarians, Members
    if (! in_array($param, $allowed_user_types)) {
        return NULL;
    } else {
        //get user role from query param
        $role = map_param_to_user_role($param);
    }

    //open database connection
    $db_connection = mysqli_connect("localhost", "root", "", "e_library_db");

    //prepare database query for all users
    if ($param == "all") {
        $query = "SELECT * FROM users";
        $query_statement = mysqli_prepare($db_connection, $query);
    }

    //prepare database query based on user role
    if ($param != "all") {
        $query = "SELECT * FROM users WHERE role=?";
        $query_statement = mysqli_prepare($db_connection, $query);
        $query_statement->bind_param("s", $role);
    }

    //execute database query to get users
    $query_statement->execute();
    $query_result = $query_statement->get_result();
    $users = $query_result->fetch_all(MYSQLI_ASSOC);

    //close database connection
    $db_connection->close();

    return $users;
}

/** Adds a new user to the database. */
function add_user($user, $role, $user_to_add_role): bool
{
    $is_user_added = FALSE;

    //get user details
    $name = $user['name'];
    $username = $user['username'];
    $password = $user['password'];
    $email = $user['email'];
    $phone = $user['phone'];
    $address = $user['address'];
    $role_adder = $role; //the role of the user who adds the new user
    $role_added = map_param_to_user_role($user_to_add_role); //the role of the new user to be added
    $status = "pending";

    //TODO: validation

    //if the user is added by an administrator, they are already approved
    if ($role_adder == "administrator") {
        $status = "approved";
    }

    //connect to database
    $db_connection = mysqli_connect("localhost", "root", "", "e_library_db");
    if ($db_connection == false) {
        error_log("Database connection failed." . $db_connection->error);
    }

    //encrypt password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //prepare database query
    //!!! role & status are updated by the admin for each application user (pending)
    $query = "INSERT INTO `users`(`name`, `username`, `password`, `email`, `phone`, `address`, `role`, `status`) VALUES (?,?,?,?,?,?,?,?)";
    $query_statement = mysqli_prepare($db_connection, $query);
    $query_statement->bind_param("ssssssss", $name, $username, $password, $email, $phone, $address, $role_added, $status);

    //execute database query
    $query_result = $query_statement->execute();
    if ($query_result !== false) {
        $is_user_added = TRUE;
    } else {
        $is_user_added = FALSE;
    }

    //close database connection !!!important
    $db_connection->close();

    return $is_user_added;
}

/** Deletes a user from the database. */
function delete_user($id) {
    $is_user_deleted = FALSE;
    
    //connect to database
    $db_connection = mysqli_connect("localhost", "root", "", "e_library_db");
    if ($db_connection == false) {
        error_log("Database connection failed." . $db_connection->error);
    }
    
    //prepare database query
    $query = "DELETE FROM `users` WHERE id=?";
    $query_statement = mysqli_prepare($db_connection, $query);
    $query_statement->bind_param("s", $id);
    
    //execute database query
    $query_result = $query_statement->execute();
    if ($query_result !== false) {
        $is_user_deleted = TRUE;
    } else {
        $is_user_deleted = FALSE;
    }
    
    return $is_user_deleted;
}

/** Updates user's membership in the database. */
function update_user_membership($id, $status) {
    $is_user_status_updated = FALSE;
    
    //set user membershipt status
    //  TRUE => to approve, FALSE => to revoke
    if ($status === TRUE) {
        $status = "approved";
    }else {
        $status = "pending";
    }
    
    //connect to database
    $db_connection = mysqli_connect("localhost", "root", "", "e_library_db");
    if ($db_connection == false) {
        error_log("Database connection failed." . $db_connection->error);
    }
    
    //prepare database query
    $query = "UPDATE `users` SET `status` = ? WHERE id=?";
    $query_statement = mysqli_prepare($db_connection, $query);
    $query_statement->bind_param("ss", $status, $id);
    
    //execute database query
    $query_result = $query_statement->execute();
    if ($query_result !== false) {
        $is_user_status_updated = TRUE;
    } else {
        $is_user_status_updated = FALSE;
    }
    
    return $is_user_status_updated;
}

/** Contacts user by sending them a message to their inbox. */
function contact_user($form) {
    $is_user_contacted = FALSE;
    
    //get recipient id
    $id = $form['id'];
    
    //connect to database
    $db_connection = mysqli_connect("localhost", "root", "", "e_library_db");
    if ($db_connection == false) {
        error_log("Database connection failed." . $db_connection->error);
    }
    
    //prepare database query to get the recipient email
    $query = "SELECT * FROM `users` WHERE id=?";
    $query_statement = mysqli_prepare($db_connection, $query);
    $query_statement->bind_param("s", $id);
    
    //execute database query
    $query_statement->execute();
    $query_result = $query_statement->get_result();
    $recipient = $query_result->fetch_assoc();
    $recipient_email = $recipient['email'];
    
    //create & send the message
    $to = $recipient_email;
    $name = $form['name'];
    $email = $form['email'];
    $subject = "e-library - You have a new message";
    $message = $form['message'];
    $message = $message . "\r\n\n Sender: $name";
    $message = $message . "\r\n\n E-mail: $email";
    $is_user_contacted = mail($to, $subject, $message);
    
    return $is_user_contacted;
}

/** Maps query parameters to database user roles. */
function map_param_to_user_role($param): string
{
    if ($param == 'A') {
        $param = "admin";
    }
    if ($param == 'L') {
        $param = "lib";
    }
    if ($param == 'M') {
        $param = "user";
    }
    if ($param == 'G') {
        $param = "guest";
    }
    return $param;
}

/** Maps database user roles to query parameters. */
function map_user_role_to_param($role): string
{
    $param = "";
    if ($role == "administrator") {
        $param = 'A';
    }
    if ($role == "librarian") {
        $param = 'L';
    }
    if ($role == "member") {
        $param = 'M';
    }
    if ($role == "guest") {
        $param = 'G';
    }
    return $param;
}

?>