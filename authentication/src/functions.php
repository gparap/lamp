<?php

// Checks the user if it is an authenticated user
// and if they are not, they are redirected to login page
function checkUserAuthentication()
{
    // connect to the database
    require_once 'connection.php';

    // get user session id
    $id = mysqli_real_escape_string($db_connection, $_SESSION['id']);

    // query database
    $query = "SELECT * FROM `users` WHERE id='$id'";
    $query_results = mysqli_query($db_connection, $query);

    // check query results validity
    $query_results_rows = mysqli_num_rows($query_results);
    if ($query_results_rows != 1) {
        // redirect to login page
        header("Location: http://localhost/authentication/login.php");
        exit();
    }
}

// Checks and signs-out the user
function handleLogout()
{
    if (isset($_POST['logout'])) {
        session_start();
        session_unset();
        session_destroy();
        header("Location: http://localhost//authentication/index.php");
        exit();
    }
}
