<?php
session_start();

require_once __DIR__ . '/../../config/config.php';
require_once APP_ROOT . '/src/functions/books.php';

//get the session var(s), if any
$role = $_SESSION['role'] ?? "";

//if user is not signed-in go to login page
if (empty($role)) {
    $location = URL_PUBLIC . "/auth/login.php";
    echo '<script>window.location.href = "' . $location . '";</script>';
    exit();
}
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
            
            <!--Add Book Form-->
			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				<h2 class="mt-3">Add Book</h2>
				<hr>

				<form method="POST" action="" enctype="multipart/form-data">
					<!--title-->
					<div class="mb-3">
						<label for="title" class="form-label">Title</label> <input
							type="text" class="form-control" id="title" name="title">
					</div>

					<!--author-->
					<div class="mb-3">
						<label for="author" class="form-label">Author</label> <input
							type="text" class="form-control" id="author" name="author">
					</div>

					<!--image-->
					<div class="mb-3">
						<label for="image" class="form-label">Image</label> <input
							type="file" class="form-control" id="image" name="image">
					</div>

					<!--book-->
					<div class="mb-3">
						<label for="book" class="form-label">Book</label> <input
							type="file" class="form-control" id="book" name="book">
					</div>

					<!--genre-->
					<div class="mb-3">
						<label for="genre" class="form-label">Genre</label> <input
							type="text" class="form-control" id="genre" name="genre">
					</div>

					<!--pages-->
					<div class="mb-3">
						<label for="pages" class="form-label">Pages</label> <input
							type="number" class="form-control" id="pages" name="pages">
					</div>

					<!--year-->
					<div class="mb-3">
						<label for="year" class="form-label">Year</label> <input
							type=number class="form-control" id="year" name="year">
					</div>

					<!--Add book button-->
					<button type="submit" class="btn btn-dark" name="button-add-book">Add
						Book</button>
				</form>
			</main>

		</div>
	</div>
	
    <?php
    //add new book
    $is_book_added = NULL;
    if (isset($_POST['button-add-book'])) {
        //TODO: check if the book already exists

        //add book
        $is_book_added = add_book($_POST, $_FILES);

        //check if book was added
        if ($is_book_added) {
            //show success message
            echo '<script>alert("Book added successfully.")</script>';

            //redirect to dashboard
            $location = "https://localhost/e-library/public/dashboard.php";
            echo '<script>window.location.href = "' . $location . '";</script>';
        } else {
            //if something went wrong, show message for failure
            echo '<div class="alert alert-danger alert-dismissible fade show mx-2" role="alert">
                            Cannot add book. Please, try again.
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
