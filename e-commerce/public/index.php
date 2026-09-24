<?php require_once('../config/config.php'); ?>
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
<title>E-Commerce</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet"
	href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
</head>

<body>
	<!-- Navigation -->
	<?php require_once INCLUDES_PATH . 'navigation.php'; ?>

	<!-- Hero -->
	<header class="bg-primary-gradient">
		<div class="container min-vh-100 d-flex align-items-center py-5">
			<div class="row align-items-center w-100">

				<!-- Left Content -->
				<div class="col-lg-6 text-center text-lg-start mb-5 mb-lg-0">
					<p class="text-uppercase fw-bold text-warning mb-2">New
						Collection 2026</p>

					<h1 class="display-3 fw-bold mb-4">Premium Products For
						Everyday Life</h1>

					<p class="lead text-light opacity-75 mb-4">Discover curated
						essentials with modern design, fast shipping, and unbeatable
						quality.</p>

					<div
						class="d-flex gap-3 justify-content-center justify-content-lg-start">
						<a href="#" class="btn btn-warning btn-lg px-4"> Shop Now </a> <a
							href="#" class="btn btn-dark btn-lg px-4"> View Collection </a>
					</div>
				</div>

				<!-- Right Images -->
				<div class="col-lg-6">
					<div class="position-relative d-flex justify-content-center">

						<div 
							style="width: 220px; transform: rotate(-8deg) translateX(40px); z-index: 1;">
							<img src="img/hero/hero_1.jpg"
								class="img-fluid rounded-4 shadow-lg" alt="">
						</div>

						<div style="width: 260px; z-index: 0;">
							<img src="img/hero/hero_2.jpg"
								class="img-fluid rounded-4 shadow-lg" alt="">
						</div>

						<div
							style="width: 220px; transform: rotate(8deg) translateX(-40px); z-index: 1;">
							<img src="img/hero/hero_3.png"
								class="img-fluid rounded-4 shadow-lg" alt="">
						</div>

					</div>
				</div>

			</div>
		</div>
	</header>

	<!-- Newsletter -->
	<?php require_once INCLUDES_PATH . 'newsletter.php'; ?>

	<!-- Footer -->
	<?php require_once INCLUDES_PATH . 'footer.php'; ?>
	
	<!-- Scripts -->
	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
	<script src="js/bs-init.js"></script>
	<script src="js/theme-main.js"></script>
</body>

</html>
