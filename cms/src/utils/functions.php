<?php

/**
 * Displays the user's name and their role in the application.
 * @param string $user_id
 */
function display_user_details($user_id)
{
    $username = "";
    $role = "";

    // connect to database
    $connection = mysqli_connect('localhost', 'root', '', 'test_db');
    if (! $connection) {
        die(mysqli_connect_error);
    }

    // get the user details
    $query = "SELECT * FROM `users` WHERE id='$user_id'";
    $query_results = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($query_results)) {
        $username = $row['username'];
        $role = $row['role'];
    }

    // display user details
    echo $username . " | " . $role;
}
?>