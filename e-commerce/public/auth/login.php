<?php 
if (session_status() == PHP_SESSION_NONE) {
	session_start ();
}
require_once('../../config/config.php');

//do not display the page is the user is still signed-in
if (isset ( $_SESSION ['role'] )) {
	header("Location: " . PUBLIC_URL);
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
<title>E-Commerce</title>
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet"
	href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
</head>

<body>
	<!-- Navigation -->
	<?php require_once INCLUDES_PATH . 'navigation.php'; ?>

	<!-- Login -->
	<section class="py-5">
		<div class="container py-0">
			<div class="row mb-4 mb-lg-5">
				<div class="col-md-8 col-xl-6 text-center mx-auto">
					<p class="fw-bold text-success mb-2">Login</p>
					<h2 class="fw-bold">Welcome back</h2>
				</div>
			</div>
			<div class="row d-flex justify-content-center">
				<div class="col-md-6 col-xl-4">
					<div class="card">
						<div
							class="card-body text-center d-flex flex-column align-items-center">
							<div
								class="bs-icon-xl bs-icon-circle bs-icon-primary shadow my-4 bs-icon">
								<svg class="bi bi-person" xmlns="http://www.w3.org/2000/svg"
									width="1em" height="1em" fill="currentColor"
									viewBox="0 0 16 16">
                                    <path
										d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"></path>
                                </svg>
							</div>
							<form method="post" data-bs-theme="light">
								<div class="mb-3">
									<input class="form-control" type="username" name="username"
										placeholder="username">
								</div>
								<div class="mb-3">
									<input class="form-control" type="password" name="password"
										placeholder="Password">
								</div>
								<div class="mb-3">
									<button class="btn btn-primary shadow w-100 d-block"
										type="submit" name="submit">Log in</button>
								</div>
							</form>
							<?php
							// Perform the log in process
							if (isset ( $_POST ['submit'] )) {
								$username = $_POST ['username'];
								$password = $_POST ['password'];

								// TODO: validate input

								// log in user
								require_once UTILS_PATH . 'functions.php';
								$is_user_logged_in = log_in_user ( $username, $password );

								// redirect user to the appropriate view
								if ($is_user_logged_in) {
									if ($_SESSION ['role'] == "admin") {
										echo "<script>window.location.href='" . ADMIN_URL . "index.php'</script>";
									} elseif ($_SESSION ['role'] == "customer") {
										echo "<script>window.location.href='" . USER_URL . "index.php'</script>";
									}
								}

								// TODO: error msg
							}
							?>
							<a href="#">Forgot your password?</a>
							<a href="register.php">Not signed-up?</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Newsletter -->
	<?php require_once INCLUDES_PATH . 'newsletter.php'; ?>

	<!-- Footer -->
	<?php require_once INCLUDES_PATH . 'footer.php'; ?>
	
	<!-- Scripts -->
	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
	<script src="js/bs-init.js"></script>
	<script src="js/bold-and-bright.js"></script>
</body>

</html>