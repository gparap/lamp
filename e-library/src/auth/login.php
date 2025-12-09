<?php
session_start();

function log_in_user($email, $password): bool
{
    //init vars
    $is_login_successful = FALSE;
    $file_handler = NULL;

    //connect to database
    $db_connection = mysqli_connect("localhost", "root", "", "e_library_db");
    if ($db_connection == false) {
        error_log("Database connection failed." . $db_connection->error);
    }

    //prepare database query
    $query = "SELECT * FROM users WHERE email=?";
    $query_statement = mysqli_prepare($db_connection, $query);
    $query_statement->bind_param("s", $email);

    //execute database query
    $query_statement->execute();
    $query_result = $query_statement->get_result();

    //keep user login info in logger.txt file
    $file = "../../src/auth/logger.txt";

    //handle user login result
    while ($row = $query_result->fetch_assoc()) {
        //open logger for appending
        $file_handler = fopen($file, 'a');
        if ($file_handler === false) {
            die("Error: Cannot open file for appending.");
        }

        if (! password_verify("$password", $row['password'])) {
            $is_login_successful = FALSE;

            //update logger with failed attempt
            $id = $row['id'];
            $date = date("Y-m-d H:i:s");
            fwrite($file_handler, "user  with email: [$email] failed to logged-in at: [$date]\n");
        } else {
            $is_login_successful = TRUE;

            //give logged-in user their role
            switch ($row['role']) {
                case "admin":
                    $_SESSION['role'] = "administrator";
                    break;
                case "lib":
                    $_SESSION['role'] = "librarian";
                    break;
                case "user":
                    $_SESSION['role'] = "member";
                    break;

                default:
                    ;
                    break;
            }

            //keep some user info in the session
            $_SESSION['name'] = $row['name'];
            $_SESSION['u_id'] = $row['id'];

            //append the login info
            $id = $row['id'];
            $username = $row['username'];
            $role = $row['role'];
            $date = date("Y-m-d H:i:s");
            fwrite($file_handler, "user: [$username] [role: $role] with id: [$id] logged-in at: [$date]\n");
        }
    }

    //close the file !!!important
    if ($file_handler !== NULL) {
        fclose($file_handler);
    }

    //close database connection !!!important
    $db_connection->close();

    return $is_login_successful;
}
?>