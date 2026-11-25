<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start ();
}
require_once('../../../config/config.php');
require_once(UTILS_PATH . 'functions.php');
if (!is_user_authenticated()) {
	$location = PUBLIC_URL . "auth/login.php";
	header('Location: ' .  $location);
}
?>
<!DOCTYPE html>
<!--
https://mit-license.org
Copyright © 2026 gparap
-->
<html data-bs-theme="light" lang="en">

<?php require_once INCLUDES_PATH . 'admin/head.php'; ?>

<?php
require_once UTILS_PATH . 'functions.php';
$connection = get_db_connection();

//get the product's category id as filter, if any
$category_id = NULL;
if (isset($_GET['fcid'])) {
    $category_id = $_GET['fcid'];
    $category_id = filter_input(INPUT_GET, 'fcid', FILTER_SANITIZE_NUMBER_INT);
}

//get products
$query_prod = "SELECT * FROM `products`";
if ($category_id != NULL) {
    $query_prod .= "WHERE category_id='$category_id'";
}
$query_prod_res = mysqli_query($connection, $query_prod);

//delete product
if (isset($_GET['action']) && isset($_GET['id'])) {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if ($_GET['action'] === 'D') {
        delete_product($id);
    }
}
?>

<body id="page-top">

	<!-- Main Content -->
	<div id="wrapper">

		<!-- Navigation -->
		<?php require_once INCLUDES_PATH . 'admin/navigation.php'; ?>

		<!-- Main Content -->
		<div class="d-flex flex-column" id="content-wrapper">
			<div id="content">
				<nav class="navbar navbar-expand bg-white shadow mb-4 topbar">
					<div class="container-fluid">
						<button class="btn btn-link d-md-none me-3 rounded-circle"
							id="sidebarToggleTop" type="button">
							<i class="fas fa-bars"></i>
						</button>
						
						<!-- Search form -->
						<?php require_once INCLUDES_PATH . 'admin/search.php'; ?>
						
						<!-- Notifications -->
						<ul class="navbar-nav flex-nowrap ms-auto">
							<li class="nav-item dropdown d-sm-none no-arrow"><a
								class="dropdown-toggle nav-link" data-bs-toggle="dropdown"
								aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
								<div
									class="dropdown-menu p-3 dropdown-menu-end animated--grow-in"
									aria-labelledby="searchDropdown">
									<form class="w-100 me-auto navbar-search">
										<div class="input-group">
											<input class="bg-light border-0 form-control small"
												type="text" placeholder="Search for ...">
											<button class="btn btn-primary" type="button">
												<i class="fas fa-search"></i>
											</button>
										</div>
									</form>
								</div></li>
								
							<!-- Alerts center -->
							<?php require_once INCLUDES_PATH . 'admin/alerts.php'; ?>
							
							<!-- Messages center -->
							<?php require_once INCLUDES_PATH . 'admin/messages.php'; ?>
							
							<!-- divider -->
							<div class="d-none d-sm-block topbar-divider"></div>
							
							<!-- Profile Dropdown -->
							<?php require_once INCLUDES_PATH . 'admin/profile.php';?>
						</ul>
					</div>
				</nav>
				
				<!-- Products -->
				<div class="container-fluid">
					<div
						class="d-flex justify-content-between align-items-center mb-4 gap-2">
						<h3 class="text-dark mb-0">Products</h3>
						<div>
							<select	onchange="if(this.value) window.location.href='?fcid=' + this.value">
								<option selected style="display: none">Filter By Category</option>
                              	<?php
                                // display category names to filter products
                                $category_names = get_category_names();
                                foreach ($category_names as $category_name) {
                                    $category_id = get_category_id_by_name($category_name);
                                    echo '<option value="' . $category_id . '"> ' . $category_name . ' </option>';
                                }
                                ?>
    							<option value="NULL">**Clear Filter**</option>
							</select> 
							<a class="btn btn-primary btn-sm" href="add.php"> 
								<i class="fas fa-plus fa-sm text-white-100"></i> &nbsp;Add Product
							</a>
						</div>
					</div>
					<hr>
					<div class="table-responsive small">
						<table class="table table-striped table-sm">
							<thead>
								<tr><th>#</th><th>cid</th><th>name</th><th>desc</th><th>price</th><th>discount</th><th>stock</th></tr>
							</thead>
							<tbody>
							<?php
							//display products
							while ($row = mysqli_fetch_assoc($query_prod_res)) {
								echo render_product_details_table_row($row);
							}
							?>
							</tbody>
						</table>
					</div>				
				</div>
			</div>
		</div>
	</div>
	<a class="border rounded d-inline scroll-to-top" href="#page-top"><i
		class="fas fa-angle-up"></i></a>

	<!-- Footer -->
	<?php require_once INCLUDES_PATH . 'footer.php'; ?>
	
	<!-- Scripts -->
	<?php require_once INCLUDES_PATH . 'admin/scripts.php'; ?>
</body>

</html>