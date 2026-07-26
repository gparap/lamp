<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

//get the book search query
$book_action = $_GET['action'] ?? "";
$book_query = $_GET['q'] ?? "";

//get the session vars, if any
$role = $_SESSION['role'] ?? "";
$user_id = $_SESSION['u_id'] ?? 0;

//if user is not signed-in give'em a guest role
if (empty($role)) {
    $_SESSION['role'] = "guest";
}

require_once __DIR__ . '/../config/config.php';
require_once APP_ROOT . '/src/functions/books.php';
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Books - e-library</title>
    <meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
	<script type="text/javascript" src="assets/js/e_library.js"></script>
</head>

<body>
	<nav class="navbar navbar-expand-lg fixed-top bg-body clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="index.php">e-library</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link active" href="books.php">Books</a></li>
                    <li class="nav-item"><a class="nav-link" href="auth/login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="auth/registration.php">Register</a></li>
                    <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                </ul>
                              
                <!--Book search-->
                <form class="d-flex" role="search" action="search.php" method="GET" id="search-form">
                    <input class="form-control me-2" type="search" placeholder="Search Books" aria-label="Search" id="search-input" name="search-input"
                        style="min-width: 16.125em; text-align: start;">
                    <button class="btn btn-primary" type="submit" onclick="validateSearchInput();">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
            	</form>
            </div>
        </div>
    </nav>
	<main class="page">
        <div class="alert alert-danger alert-dismissible fade show m-2 d-none" role="alert" id="alert">
        	Cannot borrow book. Please, check your borrowed books or try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
		<section class="clean-block clean-hero" style="background-image:url(&quot;assets/img/bg.jpg&quot;);color:rgba(9, 162, 255, 0.85);">
			<div class="row justify-content-center"	style="z-index: 1; padding: 1.5rem 1.5rem 0 1.5rem;">

 				<?php 
                //search & display books from the database
 				display_books($book_query);
 				?>
 				
			</div>
		</section>
	</main>
	<footer class="page-footer dark">
		<div class="footer-copyright mt-0">
			<p>© 2025 gparap</p>
		</div>
	</footer>
	<script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
<?php
//handle the possible borrowing of books by members or not
if (isset($_GET['action']) && $_GET['action'] === 'borrow') {
    $book_id = (int) $_GET['bid']; //get the book to borrow id  
    $is_book_borrowed = borrow_book($user_id, $book_id); //borrow the book
    
    //check if the book was borrowed by the user
    if ($is_book_borrowed) {
        //show success message & refresh
        echo '<script>alert("Book borrowed successfully.")</script>';
        
    } else {
        //if something went wrong or user has already borrowed the book, show message for failure
        echo "<script>document.getElementById('alert').classList.remove('d-none');</script>";
    }
}
?>