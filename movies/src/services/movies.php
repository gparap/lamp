<?php   //TODO

/*
 * https://mit-license.org
 * Copyright © 2023 gparap
 * Connect to database.
 */

//test db connection
require_once('../utils/connection.php');
$query = "SELECT * from `movies`";
$query_result = mysqli_query($db_connection, $query);
if ($query_result) {
    print("Connection to db is successful.");
}else{
    print("Connection to db failed.");
}

?>