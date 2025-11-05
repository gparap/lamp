<?php
session_start();

require_once __DIR__ . '/../../config/config.php';
require_once APP_ROOT . '/src/functions/users.php';

//get the session var(s), if any
$id = $_GET['id'] ?? "";
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>e-library</title>

<!-- Bootstrap core CSS -->
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
	rel="stylesheet"
	integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
	crossorigin="anonymous">
<link href="css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

	<header
		class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">e-library</a>
		<button class="navbar-toggler d-md-none collapsed" type="button"
			data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
			aria-controls="sidebarMenu" aria-expanded="false"
			aria-label="Toggle navigation" style="top: .125rem; margin: 0.25rem;">
			<span class="navbar-toggler-icon"></span>
		</button>
		<input class="form-control form-control-dark w-100" type="text"
			placeholder="Search" aria-label="Search">
		<div class="navbar-nav">
			<div class="nav-item text-nowrap">
				<a class="nav-link px-3"
					href="<?php echo URL_SOURCE; ?>/auth/logout.php">Sign out</a>
			</div>
		</div>
	</header>

	<div class="container-fluid">
		<div class="row">
			<!-- Navigation -->
			<?php require_once APP_ROOT .'/src/includes/navigation.php'; ?>
            
			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				<!-- Page Header -->
				<h2 class="mt-3">Contact User</h2>
				<hr>

				<!-- Contact Form -->
				<form method="POST" action="#">
					<!-- recipient id -->
					<input type="hidden" id="id" name="id" value="<?php echo $id; ?>">

					<!-- Sender Details -->
					<div>
						<div class="form-floating mb-3">
							<input class="form-control" type="text" id="name"
								placeholder="Name" name="name"> <label class="form-label"
								for="name">Name</label>
						</div>
					</div>
					<div>
						<div class="form-floating mb-3">
							<input class="form-control" type="email" id="email"
								placeholder="Email" name="email"> <label class="form-label">Email</label>
						</div>
					</div>
					<div>
						<div class="form-floating mb-3">
							<textarea class="form-control" id="message" placeholder="Message"
								name="message" style="height: 196px;"></textarea>
							<label class="form-label">Message</label>
						</div>
					</div>
					<div id="success"></div>
					<div class="mb-3">
						<button class="btn btn-primary" id="submit" type="submit"
							name="submit">Send</button>
					</div>
				</form>

			</main>
		</div>
	</div>
	
    <?php
    //Contact user by sending a message
    $is_user_contacted = NULL;
    if (isset($_POST['submit'])) {

        //contact user
        $is_user_contacted = contact_user($_POST);

        //check if user was contacted
        if ($is_user_contacted) {
            //show success message
            echo '<script>alert("User contacted successfully.")</script>';
            
            //redirect to dashboard
            $location = URL_PUBLIC .  "/dashboard.php";
            echo '<script>window.location.href = "' . $location . '";</script>';
        } else {
            //if something went wrong, show message for failure
            echo '<div class="alert alert-danger alert-dismissible fade show mx-2" role="alert">
                    Cannot contact user. Please, try again.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>';
        }
    }
    ?>

	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
		crossorigin="anonymous"></script>
	<script
		src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
		integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
		crossorigin="anonymous"></script>
	<script>
  feather.replace();
</script>
</body>
</html>
