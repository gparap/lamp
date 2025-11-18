<?php
session_start();

require_once __DIR__ . '/../../config/config.php';
require_once APP_ROOT . '/src/functions/books.php';

//get the session var(s), if any
$role = $_SESSION['role'] ?? "";

//get the book id, if exists
$book_id = $_GET['id'] ?? NULL;

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
            
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            
            <?php
            //get the book to display
            $book = get_book_by_id($book_id) ?? NULL;

            //display the page header info
            echo '<h2 class="mt-3">Books Details</h2><hr>';
            ?>
            
            <?php
            //display the book details
            if ($book[0] != NULL) {
                //image (actual image)
                $image_url = URL_PUBLIC . "/assets/img/" . $book[0]['image'];
                echo "<div class=\"mb-3\">
                        <img src=\"$image_url\" alt=\"Book Image\" style=\"max-width:256px; max-height:512px;\">
                    </div>";

                //title
                echo "<div class=\"mb-3\"><b>Title:&nbsp;</b>{$book[0]['title']}</div>";

                //author
                echo "<div class=\"mb-3\"><b>Author:&nbsp;</b>{$book[0]['author']}</div>";

                //image (filename)
                echo "<div class=\"mb-3\"><b>Image:&nbsp;</b>{$book[0]['image']}</div>";

                //book
                echo "<div class=\"mb-3\"><b>File:&nbsp;</b>{$book[0]['file']}</div>";

                //genre
                echo "<div class=\"mb-3\"><b>Genre:&nbsp;</b>{$book[0]['genre']}</div>";

                //pages
                echo "<div class=\"mb-3\"><b>Pages:&nbsp;</b>{$book[0]['pages']}</div>";

                //year
                echo "<div class=\"mb-3\"><b>Year:&nbsp;</b>{$book[0]['year']}</div>";
            }
            ?>
			</main>
		</div>
	</div>
	
    <?php
    //Delete book from the database
    if (isset($_POST['button-delete-book'])) {
        $is_book_deleted = delete_book($_POST['delete-book-id']);

        //check if the book was deleted
        if ($is_book_deleted) {
            //show success message
            echo '<script>alert("Book deleted successfully.")</script>';

            //refresh page
            $location = URL_PUBLIC . "/books/books_view.php";
            echo '<script>window.location.href = "' . $location . '";</script>';
        } else {
            //if something went wrong, show message for failure
            echo '<div class="alert alert-danger alert-dismissible fade show mx-2" role="alert">
                    Cannot delete book. Please, try again.
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
