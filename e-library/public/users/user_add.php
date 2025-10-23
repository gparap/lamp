<?php
session_start();

require_once __DIR__ . '/../../config/config.php';
require_once APP_ROOT . '/src/functions/users.php';

//get the session var(s), if any
$role = $_SESSION['role'] ?? "";

//if user is not signed-in go to login page
if (empty($role)) {
    $location = URL_PUBLIC . "/auth/login.php";
    echo '<script>window.location.href = "' . $location . '";</script>';
    exit();
}

//get the user-to-add role parameter, if any
$user_to_add_role = $_GET['user'] ?? NULL;
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add User</title>

<!-- Bootstrap core CSS -->
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
	rel="stylesheet"
	integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
	crossorigin="anonymous">

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
            <?php require_once APP_ROOT . '/src/includes/navigation.php';?>

            <!--Add User Form-->
			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				<h2 class="mt-3">Add User</h2>
				<hr>

				<form method="POST" action="#" enctype="multipart/form-data">
					<!--Name-->
					<div class="mb-3">
						<label class="form-label" for="name">Name</label><input
							class="form-control item" type="text" id="name" name="name">
					</div>

					<!--Avatar-->
					<div class="mb-3">
						<label for="image" class="form-label">Avatar</label> <input
							type="file" class="form-control" id="image" name="image">
					</div>

					<!--Username-->
					<div class="mb-3">
						<label class="form-label" for="username">Username</label><input
							class="form-control item" type="text" id="username"
							name="username">
					</div>

					<!--Password-->
					<div class="mb-3">
						<label class="form-label" for="password">Password</label><input
							class="form-control item" type="password" id="password"
							name="password">
					</div>

					<!--Email-->
					<div class="mb-3">
						<label class="form-label" for="email">Email</label><input
							class="form-control item" type="email" id="email" name="email">
					</div>

					<!--Phone-->
					<div class="mb-3">
						<label class="form-label" for="phone">Phone</label><input
							class="form-control item" type="tel" id="phone" name="phone">
					</div>

					<!--Address-->
					<div class="mb-3">
						<label class="form-label" for="address">Address</label><input
							class="form-control item" type="text" id="address" name="address">
					</div>

					<!--Role-->
					<input type="hidden" id="role" name="role"
						value="<?php echo $user_to_add_role; ?>">

					<!--Add user button-->
					<button type="submit" class="btn btn-dark" name="button-add-user">Add
						User</button>
				</form>
			</main>
		</div>
	</div>
	
    <?php
    //add new user
    $is_user_added = NULL;
    if (isset($_POST['button-add-user'])) {
        //TODO: check if user already exists

        //add user
        $is_user_added = add_user($_POST, $role, $user_to_add_role);

        //check if user was added
        if ($is_user_added) {
            //show success message
            echo '<script>alert("User added successfully.")</script>';

            //redirect to dashboard
            $location = "https://localhost/e-library/public/dashboard.php";
            echo '<script>window.location.href = "' . $location . '";</script>';
        } else {
            //if something went wrong, show message for failure
            echo '<div class="alert alert-danger alert-dismissible fade show mx-2" role="alert">
                            Cannot add new user. Please, try again.
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
