<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Products - E-Commerce</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>
    <?php include_once('../src/utils/navigation.php'); ?>
    <section class="py-5">
        <div class="container py-5">
            <!-- Header -->
            <div class="row mb-4 mb-lg-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 class="fw-bold">Products</h2>
                    <p class="text-muted">We hope you have a nice shopping experience.&nbsp;</p>
                </div>
            </div>

            <?php
            require_once('../src/utils/connection.php');

            //query the database for the total number of products
            $query_products_count = "SELECT COUNT(*) as count FROM `products`";
            $products_count_result = mysqli_query($db_connection, $query_products_count);
            $products_count_assoc = mysqli_fetch_assoc($products_count_result);
            $products_count = $products_count_assoc['count'];

            //get the current page
            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = 1;
            }

            //setup pagination limits
            $page_limit = 6;
            $pages = $products_count / $page_limit;
            ?>

            <!-- Pagination -->
            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled"><a class="page-link">Pages</a></li>
                    <?php
                    for ($i = 1; $i <= $pages; $i++) {
                        echo '
                            <li class="page-item"><a class="page-link" 
                            href="https://localhost/e-commerce/public/index.php?page=' . $i . '">' . $i . '</a></li>
                            ';
                    }
                    ?>
                </ul>
            </nav>

            <!-- Display Products -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php require_once('../src/utils/functions.php');

                //get pagination limits
                $pagination_start = ($page * $page_limit) - ($page_limit - 1);
                $pagination_end = $page * $page_limit;

                //query the database for products
                $query_products = "SELECT * FROM `products` WHERE id >= " . $pagination_start . " AND id <=" . $pagination_end;
                $query_products_results = mysqli_query($db_connection, $query_products);
                if (!$query_products_results) {
                    exit("Cannot connect to database.");
                }

                //display all products
                while ($product = mysqli_fetch_assoc($query_products_results)) {
                    //get product details
                    $product_name = $product['name'];
                    $product_description = $product['description'];
                    $product_cost = $product['item_cost'];
                    $products_left = $product['items_left'];
                    $product_image = $product['image_url'];
                    $product_category_id = $product['category_id'];

                    //get the product category name based on its category id
                    $product_category_name = get_category_name($product_category_id);

                    //get the product image path
                    $product_image_path = "https://localhost/e-commerce/public/img/products/"
                        . $product_category_name . "/" . $product_image;

                    echo '
                    <div class="col">
                        <div style="padding: 32px;">
                            <a href="">
                                <img class="img img-fluid" src="' . $product_image_path . '" loading="lazy" />
                                <div>
                                    <h5>' . $product_name . '</h5>
                                    <p>' . $product_description . '</p>
                                </div>
                                <strong>€' . $product_cost . '</strong>

                                <div class="py-2">
                                    <a type="button" class="btn btn-primary" href="#">Add to Cart</a>
                                </div>
                            </a>
                        </div>
                    </div>
                    ';
                }

                //close database connection
                $db_connection->close();
                ?>
            </div>
        </div>
    </section>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>