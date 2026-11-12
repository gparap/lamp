<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once ('../../../config/config.php');
require_once (UTILS_PATH . 'functions.php');
if (! is_user_authenticated()) {
    $location = PUBLIC_URL . "auth/login.php";
    header('Location: ' . $location);
}
?>
<!DOCTYPE html>
<!--
https://mit-license.org
Copyright © 2026 gparap
-->
<html data-bs-theme="light" lang="en">

<?php require_once INCLUDES_PATH . 'admin/head.php'; ?>

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
						<button class="btn btn-link d-md-none me-3 rounded-circle" id="sidebarToggleTop" type="button">
							<i class="fas fa-bars"></i>
						</button>

						<!-- Search form -->
						<?php require_once INCLUDES_PATH . 'admin/search.php'; ?>
						
						<!-- Notifications -->
						<ul class="navbar-nav flex-nowrap ms-auto">
							<li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" data-bs-toggle="dropdown"
								aria-expanded="false" href="#"><i class="fas fa-search"></i></a>
								<div class="dropdown-menu p-3 dropdown-menu-end animated--grow-in" aria-labelledby="searchDropdown">
									<form class="w-100 me-auto navbar-search">
										<div class="input-group">
											<input class="bg-light border-0 form-control small" type="text" placeholder="Search for ...">
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

				<!-- Update Product -->
				<div class="container-fluid">
					<div class="d-sm-flex justify-content-between align-items-center mb-4">
						<h3 class="text-dark mb-0">Update Product</h3>
					</div>
					<hr>
					<div class="row d-flex justify-content-center">
						<div class="col-md-6 col-xl-4">
							<div class="card">
								<div class="card-body text-center d-flex flex-column align-items-center my-4">
									<form method="post" data-bs-theme="light" enctype="multipart/form-data"
										action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
										<div class="mb-3">
											<select class="form-control" name="category">
												<option value="" disabled selected>Select category</option>
											</select>
										</div>
										<div class="mb-3">
											<input class="form-control" type="text" name="name" placeholder="name">
										</div>
										<div class="mb-3">
											<input class="form-control" type="text" name="description" placeholder="description">
										</div>
										<div class="mb-3">
											<input class="form-control" type="text" name="description_short" placeholder="description_short">
										</div>
										<div class="mb-3">
											<input class="form-control" type="number" min="0.01" step="0.01" name="item_cost" placeholder="item_cost">
										</div>
										<div class="mb-3">
											<input class="form-control" type="number" min="1" max="99" step="1" name="item_discount"
												placeholder="item_discount">
										</div>
										<div class="mb-3 d-flex flex-column align-items-start">
											<input class="form-control" type="file" name="image_url" placeholder="image_url"> <img class="mt-1 mb-0"
												alt="" src="https://placehold.co/128x128" width="128" height="128">
										</div>
										<div class="mb-3">
											<input class="form-control" type="file" name="thumbnail" placeholder="thumbnail" disabled>
										</div>
										<div class="mb-3">
											<input class="form-control" type="text" name="keywords" placeholder="keywords">
										</div>

										<div class="mb-3">
											<button class="btn btn-primary shadow w-100 d-block" type="submit" name="submit">Update</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>

	<!-- Footer -->
	<?php require_once INCLUDES_PATH . 'footer.php'; ?>
	
	<!-- Scripts -->
	<?php require_once INCLUDES_PATH . 'admin/scripts.php'; ?>
	<script>
	//TODO: validate input fields
	</script>
</body>

</html>
