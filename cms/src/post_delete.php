<?php
//connect to database
$connection = mysqli_connect('localhost', 'root', '', 'test_db');
if (!$connection) {
    die(mysqli_connect_error);
}

//get post id to be deleted
$id = $_GET['id'];

//delete post
$sql = "DELETE FROM posts WHERE id='$id'";
mysqli_query($connection, $sql);

//redirect to posts
echo '<script>window.location.href="https://localhost/cms/src/posts.php"</script>';
?>