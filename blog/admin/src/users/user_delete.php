<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/blog/config/config.php');
require_once('../utils/functions');
checkUserAuthentication();

//connect to database
$connection = connectToDatabase();

//get the user id to be deleted
$id = $_GET['id'];

//delete user
$sql = "DELETE FROM users WHERE id='$id' AND role != 'admin'";
$result = mysqli_query($connection, $sql);
$affected_rows = $connection->affected_rows;
if ($result && $affected_rows == 0) {
    echo '<script>alert("Cannot delete admin!");</script>';
}

//redirect to users
$location = ADMIN_URL . "/src/users/users.php";
echo '<script>window.location.href = "' . $location . '";</script>';

//!!! important
$connection->close();
