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

//get product categories
$query_cat = "SELECT * FROM `categories`";
$query_cat_res = mysqli_query($connection, $query_cat);
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
						
						<!-- Alerts -->
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
							<li class="nav-item mx-1 dropdown no-arrow">
								<div class="nav-item dropdown no-arrow">
									<a class="dropdown-toggle nav-link" data-bs-toggle="dropdown"
										aria-expanded="false" href="#"><span
										class="badge bg-danger badge-counter">3+</span><i
										class="fas fa-bell fa-fw"></i></a>
									<div
										class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
										<h6 class="dropdown-header">alerts center</h6>
										<a class="dropdown-item d-flex align-items-center" href="#">
											<div class="me-3">
												<div class="bg-primary icon-circle">
													<i class="fas fa-file-alt text-white"></i>
												</div>
											</div>
											<div>
												<span class="small text-gray-500">May 20, 2026</span>
												<p>25 new orders are waiting for processing.</p>
											</div>
										</a><a class="dropdown-item d-flex align-items-center"
											href="#">
											<div class="me-3">
												<div class="bg-success icon-circle">
													<i class="fas fa-donate text-white"></i>
												</div>
											</div>
											<div>
												<span class="small text-gray-500">May 19, 2026</span>
												<p>A customer requested a refund for Order #1042.</p>
											</div>
										</a><a class="dropdown-item d-flex align-items-center"
											href="#">
											<div class="me-3">
												<div class="bg-warning icon-circle">
													<i class="fas fa-exclamation-triangle text-white"></i>
												</div>
											</div>
											<div>
												<span class="small text-gray-500">May 18, 2026</span>
												<p>Low stock alert: Wireless Headphones almost out of stock.</p>
											</div>
										</a><a class="dropdown-item text-center small text-gray-500"
											href="#">Show All Alerts</a>
									</div>
								</div>
							</li>
							<li class="nav-item mx-1 dropdown no-arrow">
								<div class="nav-item dropdown no-arrow">
									<a class="dropdown-toggle nav-link" data-bs-toggle="dropdown"
										aria-expanded="false" href="#"><span
										class="badge bg-danger badge-counter">7</span><i
										class="fas fa-envelope fa-fw"></i></a>
									<div
										class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
										<h6 class="dropdown-header">alerts center</h6>
										<a class="dropdown-item d-flex align-items-center" href="#">
											<div class="me-3 dropdown-list-image">
												<img class="rounded-circle"
													src="assets/img/avatars/avatar4.jpeg">
												<div class="bg-success status-indicator"></div>
											</div>
											<div class="fw-bold">
												<div class="text-truncate">
													<span>Hi, my order arrived damaged. Can you help me with a
														replacement?</span>
												</div>
												<p class="mb-0 small text-gray-500">John Doe - 58m</p>
											</div>
										</a><a class="dropdown-item d-flex align-items-center"
											href="#">
											<div class="me-3 dropdown-list-image">
												<img class="rounded-circle"
													src="assets/img/avatars/avatar2.jpeg">
												<div class="status-indicator"></div>
											</div>
											<div class="fw-bold">
												<div class="text-truncate">
													<span>Just checking if my package has been shipped yet.</span>
												</div>
												<p class="mb-0 small text-gray-500">Jane Doe - 1d</p>
											</div>
										</a><a class="dropdown-item d-flex align-items-center"
											href="#">
											<div class="me-3 dropdown-list-image">
												<img class="rounded-circle"
													src="assets/img/avatars/avatar3.jpeg">
												<div class="bg-warning status-indicator"></div>
											</div>
											<div class="fw-bold">
												<div class="text-truncate">
													<span>I love the quality of the products, definitely
														ordering again!</span>
												</div>
												<p class="mb-0 small text-gray-500">J. J. Doe - 2d</p>
											</div>
										</a><a class="dropdown-item d-flex align-items-center"
											href="#">
											<div class="me-3 dropdown-list-image">
												<img class="rounded-circle"
													src="assets/img/avatars/avatar5.jpeg">
												<div class="bg-success status-indicator"></div>
											</div>
											<div class="fw-bold">
												<div class="text-truncate">
													<span>Do you have this item available in another color?</span>
												</div>
												<p class="mb-0 small text-gray-500">Jane D. Doe · 2w</p>
											</div>
										</a><a class="dropdown-item text-center small text-gray-500"
											href="#">Show All Alerts</a>
									</div>
								</div>
								<div
									class="shadow dropdown-list dropdown-menu dropdown-menu-end"
									aria-labelledby="alertsDropdown"></div>
							</li>
							<div class="d-none d-sm-block topbar-divider"></div>
							
							<!-- Profile Dropdown -->
							<?php require_once INCLUDES_PATH . 'admin/profile.php';?>
						</ul>
					</div>
				</nav>
				
				<!-- Categories -->
				<div class="container-fluid">
					<div
						class="d-sm-flex justify-content-between align-items-center mb-4">
						<h3 class="text-dark mb-0">Categories</h3>
						<a class="btn btn-primary btn-sm d-xs-inline-block"
							role="button" href="add.php"><i
							class="fas fa-solid fa-plus fa-sm text-white-100"></i>&nbsp;Add Category</a>
					</div>
					<div class="row">
						<?php 
						//display product categories
						while ($row = mysqli_fetch_assoc($query_cat_res)) {
							echo render_product_category_card($row);
						}
						?>
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
