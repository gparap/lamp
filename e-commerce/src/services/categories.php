<?php
require_once('../utils/connection.php');

//fetch all categories from the database and add them to the categories array
$categories = array();
$query = "SELECT * from `categories`";
$query_result = mysqli_query($db_connection, $query);
while ($category = mysqli_fetch_assoc($query_result)) {
    $categories[] = $category;
}

//generate json response
echo json_encode($categories);

?>