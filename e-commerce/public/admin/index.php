<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once ('../../config/config.php');
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

		<!-- Dashboard Feed -->
		<div class="d-flex flex-column" id="content-wrapper">
			<div id="content">
				<nav class="navbar navbar-expand bg-white shadow mb-4 topbar">
					<div class="container-fluid">
						<button class="btn btn-link d-md-none me-3 rounded-circle" id="sidebarToggleTop" type="button">
							<i class="fas fa-bars"></i>
						</button>
						<form class="d-none d-sm-inline-block mw-100 ms-md-3 me-auto my-2 my-md-0 navbar-search">
							<div class="input-group">
								<input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
						
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
				<div class="container-fluid">
					<div
						class="d-sm-flex justify-content-between align-items-center mb-4">
						<h3 class="text-dark mb-0">Dashboard</h3>
						<a class="btn btn-primary btn-sm d-xs-inline-block"
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
	<?php require_once INCLUDES_PATH . 'admin/scripts.php'; ?>
</body>

</html>
