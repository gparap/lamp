
<?php
session_start();

function register_user(array $params): bool
{
    $is_registration_successful = FALSE;

    //get user details
    $name = $params['name'];
    $username = $params['username'];
    $password = $params['password'];
    $email = $params['email'];
    $phone = $params['phone'];
    $address = $params['address'];

    //TODO: input validation

    //connect to database
    $db_connection = mysqli_connect("localhost", "root", "", "e_library_db");
    if ($db_connection == false) {
        error_log("Database connection failed." . $db_connection->error);
    }

    //encrypt password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //prepare database query
    //!!! role & status are updated by the admin for each application user (pending)
    $query = "INSERT INTO `users`(`name`, `username`, `password`, `email`, `phone`, `address`) VALUES (?,?,?,?,?,?)";
    $query_statement = mysqli_prepare($db_connection, $query);
    $query_statement->bind_param("ssssss", $name, $username, $password, $email, $phone, $address);

    //execute database query
    $query_statement->execute();
    $query_result = $query_statement->get_result();
    if (! $query_result === false) {
        $is_registration_successful = FALSE;
    } else {
        $is_registration_successful = TRUE;
    }

    //close database connection !!!important
    $db_connection->close();

    return $is_registration_successful;
}

?>