<?php 
if (session_status() == PHP_SESSION_NONE) {
	session_start ();
}
require_once('../../config/config.php');
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

<head>
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<title>E-Commerce - ADMIN</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/bootstrap.min-admin.css">
<link rel="stylesheet"
	href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
<link rel="stylesheet"
	href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
<link rel="stylesheet"
	href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
</head>

<body id="page-top">

	<!-- Main Content -->
	<div id="wrapper">

		<!-- Navigation -->
		<nav
			class="navbar align-items-start p-0 sidebar sidebar-dark accordion bg-gradient-primary navbar-dark">
			<div class="container-fluid d-flex flex-column p-0">
				<a
					class="navbar-brand d-flex justify-content-center align-items-center m-0 sidebar-brand"
					href="#"> <img src="../img/logo.png" width="32" height="32"
					class="img-fluid rounded-0 shadow-lg sidebar-brand-icon" alt="">
					<div class="mx-3 sidebar-brand-text">
						<span>E-Commerce</span>
					</div>
				</a>
				<hr class="my-0 sidebar-divider">
				<ul class="navbar-nav text-light" id="accordionSidebar">
					<li class="nav-item"><a class="nav-link active" href="/index.html"><i
							class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
					<li class="nav-item"><a class="nav-link" href="/profile.html"><i
							class="fas fa-shopping-bag"></i><span>Orders</span></a></li>
					<li class="nav-item"><a class="nav-link" href="/table.html"><i
							class="fas fa-box-open"></i><span>Products</span></a></li>
					<li class="nav-item"><a class="nav-link" href="/login.html"><i
							class="far fa-user-circle"></i><span>Customers</span></a></li>
					<li class="nav-item"><a class="nav-link" href="/register.html"><i
							class="fas fa-warehouse"></i><span>Inventory</span></a></li>
					<li class="nav-item"><a class="nav-link active" href="/index.html"><i
							class="fas fa-chart-line"></i><span>Analytics</span></a></li>
					<li class="nav-item"><a class="nav-link" href="/profile.html"><i
							class="fas fa-star"></i><span>Reviews</span></a></li>
					<li class="nav-item"><a class="nav-link" href="/table.html"><i
							class="fas fa-tags"></i><span>Discounts</span></a></li>
					<li class="nav-item"><a class="nav-link" href="/table.html"><i
							class="fas fa-truck"></i><span>Shipping</span></a></li>
					<li class="nav-item"><a class="nav-link" href="/table.html"><i
							class="fas fa-cog"></i><span>Settings</span></a></li>
					<li class="nav-item"><a class="nav-link" href="/login.html"><i
							class="far fa-id-badge"></i><span>Profile</span></a></li>
					<li class="nav-item"><a class="nav-link" href="/register.html"><i
							class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>
				</ul>
				<div class="text-center d-none d-md-inline">
					<button class="btn rounded-circle border-0" id="sidebarToggle"
						type="button"></button>
				</div>
			</div>
		</nav>

		<!-- Dashboard Feed -->
		<div class="d-flex flex-column" id="content-wrapper">
			<div id="content">
				<nav class="navbar navbar-expand bg-white shadow mb-4 topbar">
					<div class="container-fluid">
						<button class="btn btn-link d-md-none me-3 rounded-circle"
							id="sidebarToggleTop" type="button">
							<i class="fas fa-bars"></i>
						</button>
						<form
							class="d-none d-sm-inline-block mw-100 ms-md-3 me-auto my-2 my-md-0 navbar-search">
							<div class="input-group">
								<input class="bg-light form-control border-0 small" type="text"
									placeholder="Search for ...">
								<button class="btn btn-primary py-0" type="button">
									<i class="fas fa-search"></i>
								</button>
							</div>
						</form>
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
							<li class="nav-item dropdown no-arrow">
								<div class="nav-item dropdown no-arrow">
									<a class="dropdown-toggle nav-link" data-bs-toggle="dropdown"
										aria-expanded="false" href="#"><span
										class="d-none d-lg-inline me-2 text-gray-600 small">gparap
											admin</span><img class="border rounded-circle img-profile"
										src="../img/avatars/avatar-m-01.png"></a>
									<div
										class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
										<a class="dropdown-item" href="#"><i
											class="fas fa-user me-2 fa-sm fa-fw text-gray-400"></i>&nbsp;Profile</a><a
											class="dropdown-item" href="#"><i
											class="fas fa-cogs me-2 fa-sm fa-fw text-gray-400"></i>&nbsp;Settings</a><a
											class="dropdown-item" href="#"><i
											class="fas fa-list me-2 fa-sm fa-fw text-gray-400"></i>&nbsp;Activity
											log</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#"><i
											class="fas fa-sign-out-alt me-2 fa-sm fa-fw text-gray-400"></i>&nbsp;Logout</a>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</nav>
				<div class="container-fluid">
					<div
						class="d-sm-flex justify-content-between align-items-center mb-4">
						<h3 class="text-dark mb-0">Dashboard</h3>
						<a class="btn btn-primary btn-sm d-none d-sm-inline-block"
							role="button" href="#"><i
							class="fas fa-download fa-sm text-white-50"></i>&nbsp;Generate
							Report</a>
					</div>
					<div class="row">
						<div class="col-md-6 col-xl-3 mb-4">
							<div class="card shadow py-2 border-left-primary">
								<div class="card-body">
									<div class="row g-0 align-items-center">
										<div class="col me-2">
											<div class="text-uppercase text-primary mb-1 fw-bold text-xs">
												<span>Products Added (monthly)</span>
											</div>
											<div class="text-dark mb-0 fw-bold h5">
												<span>1,240</span>
											</div>
										</div>
										<div class="col-auto">
											<i class="fas fa-calendar fa-2x text-gray-300"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-xl-3 mb-4">
							<div class="card shadow py-2 border-left-success">
								<div class="card-body">
									<div class="row g-0 align-items-center">
										<div class="col me-2">
											<div class="text-uppercase text-success mb-1 fw-bold text-xs">
												<span>Orders Fulfilled (annual)</span>
											</div>
											<div class="text-dark mb-0 fw-bold h5">
												<span>18,500</span>
											</div>
										</div>
										<div class="col-auto">
											<i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-xl-3 mb-4">
							<div class="card shadow py-2 border-left-info">
								<div class="card-body">
									<div class="row g-0 align-items-center">
										<div class="col me-2">
											<div class="text-uppercase text-info mb-1 fw-bold text-xs">
												<span>Abandoned Carts</span>
											</div>
											<div class="row g-0 align-items-center">
												<div class="col-auto">
													<div class="text-dark me-3 mb-0 fw-bold h5">
														<span>50%</span>
													</div>
												</div>
												<div class="col">
													<div class="progress progress-sm">
														<div class="progress-bar bg-info" aria-valuenow="50"
															aria-valuemin="0" aria-valuemax="100" style="width: 50%;">
															<span class="visually-hidden">50%</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-auto">
											<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-xl-3 mb-4">
							<div class="card shadow py-2 border-left-warning">
								<div class="card-body">
									<div class="row g-0 align-items-center">
										<div class="col me-2">
											<div class="text-uppercase text-warning mb-1 fw-bold text-xs">
												<span>Pending Shipments</span>
											</div>
											<div class="text-dark mb-0 fw-bold h5">
												<span>24</span>
											</div>
										</div>
										<div class="col-auto">
											<i class="fas fa-comments fa-2x text-gray-300"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6 mb-4">
							<div class="card shadow mb-4">
								<div class="card-header py-3">
									<h6 class="text-primary m-0 fw-bold">Todo List</h6>
								</div>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col me-2">
												<h6 class="mb-0">
													<strong>Supplier call</strong>
												</h6>
												<span class="text-xs">10:30 AM</span>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="checkbox"
														id="formCheck-1"><label class="form-check-label"
														for="formCheck-1"></label>
												</div>
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col me-2">
												<h6 class="mb-0">
													<strong>Review pending orders</strong>
												</h6>
												<span class="text-xs">11:30 AM</span>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="checkbox"
														id="formCheck-2"><label class="form-check-label"
														for="formCheck-2"></label>
												</div>
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col me-2">
												<h6 class="mb-0">
													<strong>Update product inventory</strong>
												</h6>
												<span class="text-xs">12:30 AM</span>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="checkbox"
														id="formCheck-3"><label class="form-check-label"
														for="formCheck-3"></label>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>

						<div class="col-lg-6 mb-4">
							<div class="card shadow mb-4">
								<div class="card-header py-3">
									<h6 class="text-primary m-0 fw-bold">Recent Activity</h6>
								</div>
								<ul class="list-group list-group-flush">
									<li class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col me-2">
												<h6 class="mb-0">
													<strong>New order received</strong>
												</h6>
												<span class="text-xs">10:30 AM</span>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="checkbox"
														id="formCheck-1"><label class="form-check-label"
														for="formCheck-1"></label>
												</div>
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col me-2">
												<h6 class="mb-0">
													<strong>Inventory synced</strong>
												</h6>
												<span class="text-xs">11:30 AM</span>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="checkbox"
														id="formCheck-2"><label class="form-check-label"
														for="formCheck-2"></label>
												</div>
											</div>
										</div>
									</li>
									<li class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col me-2">
												<h6 class="mb-0">
													<strong>Customer review posted</strong>
												</h6>
												<span class="text-xs">12:30 AM</span>
											</div>
											<div class="col-auto">
												<div class="form-check">
													<input class="form-check-input" type="checkbox"
														id="formCheck-3"><label class="form-check-label"
														for="formCheck-3"></label>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<a class="border rounded d-inline scroll-to-top" href="#page-top"><i
			class="fas fa-angle-up"></i></a>
	</div>

	<!-- Footer -->
	<?php require_once INCLUDES_PATH . 'footer.php'; ?>
	
	<!-- Scripts -->
	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
	<script src="../js/bs-init.js"></script>
	<script src="../js/theme-main.js"></script>
	<script src="../js/theme-admin.js"></script>
</body>

</html>
