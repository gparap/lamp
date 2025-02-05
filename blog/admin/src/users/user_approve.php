<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/blog/config/config.php');
require_once('../utils/functions.php');
checkUserAuthentication();

//connect to database
$connection = connectToDatabase();

//get the user id to be approved
$id = $_GET['id'];

//approve user
$query = "UPDATE `users` SET `status`='approved' WHERE id='$id'";
$result = mysqli_query($connection, $query);

//redirect to users
$location = ADMIN_URL . "/src/users/users.php";
echo '<script>window.location.href = "' . $location . '";</script>';

//!!! important
$connection->close();
