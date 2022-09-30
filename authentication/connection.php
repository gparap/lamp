<?php

// connect to database
$db_connection = mysqli_connect('localhost', 'root', '', 'test_db');
if (!$db_connection) {
    die(mysqli_connect_error());
}

?>