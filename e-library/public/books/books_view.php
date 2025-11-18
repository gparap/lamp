<?php
session_start();

require_once __DIR__ . '/../../config/config.php';
require_once APP_ROOT . '/src/functions/books.php';
require_once APP_ROOT . '/src/functions/users.php';

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
            
            <?php
            //get the books to display
            $books = get_books(map_user_role_to_param($role)) ?? NULL;

            //display the books
            if ($books != NULL) {
                echo '
	            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
					<h2 class="mt-3">';

                //init the image path
                $image_path = URL_PUBLIC . "/assets/img/";

                //Display page header info
                $page_header_info = "Books";
                echo $page_header_info;

                //Display library books
                echo '</h2>
					<hr>
					<div class="table-responsive">
						<table class="table table-striped table-sm">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">title</th>
									<th scope="col">author</th>
									<th scope="col">image</th>
									<th scope="col">file</th>
                                    <th scope="col">genre</th>
                                    <th scope="col">pages</th>
                                    <th scope="col">year</th>
                                    <th scope="col">&nbsp;</th>
                                    
								</tr>
							</thead>
							<tbody>';
                foreach ($books as $book) {
                    echo '<tr>
				            		<td>' . $book['id'] . '</td>
				            		<td>' . $book['title'] . '</td>
				            		<td>' . $book['author'] . '</td>
				            		<td><img src="' . $image_path . htmlspecialchars($book['image']) . '" alt="' . $book['image'] . '" 
                                            style="max-width:48px; max-height:64px;">
                                    </td>
									<td>' . $book['file'] . '</td>
									<td>' . $book['genre'] . '</td>
									<td>' . $book['pages'] . '</td>
									<td>' . $book['year'] . '</td>
									<td><div class="btn-group" role="group">
                                        <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Actions</button>
                                        <ul class="dropdown-menu">';

                    //display actions based on user roles
                    if ($role == "administrator") {
                        //TODO: actions to administrators
                        //delete book
                        echo '<li>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="delete-book-id" value="' . $book['id'] . '">
                                <button type="submit" class="dropdown-item" name="button-delete-book" 
                                        onclick="return confirm(\'Are you sure you want to delete the book?\')">Delete</button>
                            </form>
                        </li>';
                        echo '<li><a class="dropdown-item" href="TODO.php?id=' . $book['id'] . '">Edit Details</a></li>';
                        //display book details
                        echo '<li><a class="dropdown-item" href="book_view.php?id=' . $book['id'] . '">View Details</a></li>';
                        echo '<li><a class="dropdown-item" href="TODO.php?id=' . $book['id'] . '">Read Online</a></li>';
                        echo '<li><a class="dropdown-item" href="TODO.php?id=' . $book['id'] . '">Download</a></li>';
                    } elseif ($role == "librarian") {
                        //TODO: actions to librarians
                        echo '<li><a class="dropdown-item" href="book_edit__TODO.php?id=' . $book['id'] . '">Edit Details</a></li>';
                        //display book details
                        echo '<li><a class="dropdown-item" href="book_view.php?id=' . $book['id'] . '">View Details</a></li>';
                        echo '<li><a class="dropdown-item" href="TODO.php?id=' . $book['id'] . '">Read Online</a></li>';
                        echo '<li><a class="dropdown-item" href="TODO.php?id=' . $book['id'] . '">Download</a></li>';
                    } elseif ($role == "member") {
                        //TODO: actions to members
                        //display book details
                        echo '<li><a class="dropdown-item" href="book_view.php?id=' . $book['id'] . '">View Details</a></li>';
                        echo '<li><a class="dropdown-item" href="TODO.php?id=' . $book['id'] . '">Read Online</a></li>';
                        echo '<li><a class="dropdown-item" href="TODO.php?id=' . $book['id'] . '">Download</a></li>';
                    }

                    echo '</ul></div></td></tr>';
                }
                echo '</tbody>
						</table>
					</div>
				</main>';
            }
            ?>

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
