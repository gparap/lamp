<?php

/*
 * https://mit-license.org
 * Copyright © 2023–2026 gparap
 * Register user into the database.
 */

require_once('../utils/functions.php');

//fetch all categories from the database and add them to the categories array
$categories = array();
$query = "SELECT * from `categories`";
$query_result = mysqli_query(get_db_connection(), $query);
while ($category = mysqli_fetch_assoc($query_result)) {
    $categories[] = $category;
}

//generate json response
echo json_encode($categories);

?>