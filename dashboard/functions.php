<?php

// Checks and signs-in the user if it is an authenticated user
function handleLogin()
{
    require_once 'connection.php';
    if (isset($_POST['loginInputEmail']) && isset($_POST['loginInputPassword'])) {
        //get post vars
        $email = mysqli_real_escape_string($db_connection, $_POST['loginInputEmail']);
        $password = $_POST['loginInputPassword'];

        //query database
        $query = "SELECT * FROM `users` WHERE email='$email' AND password='$password'";
        $query_results = mysqli_query($db_connection, $query);

        //check query results validity
        $query_results_rows = mysqli_num_rows($query_results);
        if ($query_results_rows != 1) {
            redirectToLoginPage();
        }
        session_start();
    }
}

// Checks and signs-out the user
function handleLogout()
{
    if (isset($_POST['logoutButton'])) {
        session_destroy();
        header("Location: http://localhost/dashboard/login.php");
        exit();
    }
}

// Redirects to Login.php page
function redirectToLoginPage()
{
    header("Location: http://localhost/dashboard/login.php");
    exit();
}
