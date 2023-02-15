<?php
require_once('../utils/connection.php');

//get the category id
$category_id = $_GET['category_id'];

//fetch all products of the given category from the database and add them to the products array
$products = array();
$query = "SELECT * from `products` WHERE category_id='$category_id'";
$query_result = mysqli_query($db_connection, $query);
while ($product = mysqli_fetch_assoc($query_result)) {
    $products[] = $product;
}

//generate json response
echo json_encode($products);

?>
