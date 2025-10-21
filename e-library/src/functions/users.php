<?php

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
    return $param;
}

?>