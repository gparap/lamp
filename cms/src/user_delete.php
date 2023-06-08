<?php
//connect to database
$connection = mysqli_connect('localhost', 'root', '', 'test_db');
if (!$connection) {
    die(mysqli_connect_error);
}

//get user id to be deleted
$id = $_GET['id'];

//delete user
$sql = "DELETE FROM `users` WHERE id='$id'";
$sql_result = mysqli_query($connection, $sql);

//create a "delete user" message for the user
$msg="";
if ($sql_result == true) {
    $msg="User deleted.";
}

//' . $msg . '
//redirect to users
echo '<script>window.location.href="https://localhost/cms/src/users.php?msg=' . $msg . '"</script>';
?>
