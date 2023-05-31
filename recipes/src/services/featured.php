<?php
/* https://mit-license.org | © 2023 gparap */

//connect to database
require_once('../utils/connection.php');

//fetch all featured recipes from the database
$recipes = array();
$db_query = "SELECT * FROM `recipes`WHERE `visible`= 1 LIMIT 40";
$db_query_result = mysqli_query($db_connection, $db_query);
while($recipe = mysqli_fetch_assoc($db_query_result)) {
    $recipes[] = $recipe;
}

//generate json response
echo json_encode($recipes);

//close database connection
$db_connection->close();
?>