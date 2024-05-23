<?php

function checkUserAuthentication() {   
    //if user is not signed-in go to login page
    if (empty($_SESSION['user_id'])) {
        $location = ADMIN_URL . "/src/auth/login.php";
        echo '<script>window.location.href = "'.$location.'";</script>';
        exit;
    }
}

function connectToDatabase() {
    //connect to database or die
    $connection = mysqli_connect('localhost', 'root', '', 'blog_db');
    if (! $connection) {
        die(mysqli_connect_error());
    }
    return $connection;
}

?>
