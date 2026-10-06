<?php

/*
 * https://mit-license.org
 * Copyright © 2023–2026 gparap
 * Register user into the database.
 */

require_once('../utils/functions.php');

//get the category id
$c_id = $_GET['category_id'];

//fetch all products of the given category from the database and add them to the products array
$products = array();
$query = "SELECT * from `products` WHERE category_id='$c_id'";
$query_result = mysqli_query(get_db_connection(), $query);
while ($product = mysqli_fetch_assoc($query_result)) {
    $products[] = $product;
}

//generate json response
echo json_encode($products);

?>