<?php require_once('../../config/config.php'); ?>
<!DOCTYPE html>
<!--
https://mit-license.org
Copyright © 2026 gparap
-->
<html data-bs-theme="light" lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>E-Commerce - Products</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
	integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
<link rel="stylesheet"
	href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
</head>

<?php
require_once UTILS_PATH . 'functions.php';
$connection = get_db_connection();

//get product categories
$query_cat = "SELECT * FROM `categories`";
$query_cat_res_desktop = mysqli_query($connection, $query_cat);
$query_cat_res_mobile = mysqli_query($connection, $query_cat);

//get products
$query_prod = "SELECT * FROM `products`";
$query_prod_res = mysqli_query($connection, $query_prod);
?>

<body>
	<!-- Navigation -->
	<?php require_once INCLUDES_PATH . 'navigation.php'; ?>

	<!-- Products section -->
	<section>
		<div class="container py-5">

			<!-- Heading -->
			<div class="row mb-4 mb-lg-5">
				<div class="col-md-8 col-xl-6 text-center mx-auto">
					<h2 class="fw-bold">Our Products</h2>
					<p class="text-muted">Premium Products For Everyday Life.</p>
				</div>
			</div>

			<!-- Main content -->
			<div class="row mx-auto">
				<div class="col-md-3">

					<!-- Left column: Filters - Desktop version -->
					<div class="d-none d-md-block">
						<div class="filters">
							<div class="filter-item">
								<h3>Categories</h3>
								<hr>
								<?php
                                //display product categories
                                while ($row = mysqli_fetch_assoc($query_cat_res_desktop)) {
                                    echo render_product_category_filter($row);
                                }
                                ?>
							</div>
						</div>
					</div>

					<!-- Left column: Filters - Mobile version -->
					<div class="d-md-none">
						<a class="btn btn-link d-md-none filter-collapse" data-bs-toggle="collapse" role="button" aria-expanded="false"
							aria-controls="filters" href="#filters">Filters<i class="icon-arrow-down filter-caret"></i></a>
						<div class="collapse" id="filters">
							<div class="filters">
								<div class="filter-item">
									<h3>Categories</h3>
									<hr>
									<?php
                                    //display product categories
                                    while ($row = mysqli_fetch_assoc($query_cat_res_mobile)) {
                                        echo render_product_category_filter($row);
                                    }
                                    ?>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Right column: Product list -->
				<div class="col-md-9">
					<div class="row">
					<?php
                    //display products TODO: fix missing images
                    while ($row = mysqli_fetch_assoc($query_prod_res)) {
                        echo render_product($row);
                    }
                    ?>
					</div>

					<!-- Pagination -->
					<nav>
						<ul class="pagination mt-5">
							<li class="page-item disabled"><a class="page-link" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
							<li class="page-item active"><a class="page-link">1</a></li>
							<li class="page-item"><a class="page-link">2</a></li>
							<li class="page-item"><a class="page-link">3</a></li>
							<li class="page-item"><a class="page-link" aria-label="Next"><span aria-hidden="true">»</span></a></li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</section>

	<!-- Newsletter -->
	<?php require_once INCLUDES_PATH . 'newsletter.php'; ?>

	<!-- Footer -->
	<?php require_once INCLUDES_PATH . 'footer.php'; ?>
	
	<!-- Scripts -->
	<?php require_once INCLUDES_PATH . 'scripts.php'; ?>
</body>

</html>
