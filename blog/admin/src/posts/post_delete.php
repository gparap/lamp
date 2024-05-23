<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] .'/blog/config/config.php');
require_once('../utils/functions');
checkUserAuthentication();

//connect to database
$connection = connectToDatabase();

//get post id to be deleted
$id = $_GET['id'];

//TODO: authors can delete ONLY their posts

//delete post
$sql = "DELETE FROM posts WHERE id='$id'";
mysqli_query($connection, $sql);

//redirect to posts
$location = ADMIN_URL . "/src/posts/posts.php";
echo '<script>window.location.href = "'.$location.'";</script>';

//!!! important
$connection->close();
?>