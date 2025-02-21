<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Blog</title>
<!--styles-->
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
	rel="stylesheet"
	integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
	crossorigin="anonymous">
</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
		<div class="container">
			<a class="navbar-brand" href="#">Blog</a>
			<button class="navbar-toggler" type="button"
				data-bs-toggle="collapse" data-bs-target="#navbarNav"
				aria-controls="navbarNav" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link active" aria-current="page"
						href="#">Home</a></li>
					<li class="nav-item"><a class="nav-link disabled"
						aria-disabled="true">About</a></li>
					<li class="nav-item"><a class="nav-link disabled"
						aria-disabled="true">Contact</a></li>
					<li class="nav-item"><a class="nav-link disabled"
						aria-disabled="true">Posts</a></li>
				</ul>
				<form class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Search"
						aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
				</form>
			</div>
		</div>
	</nav>

	<!-- Content -->
	<main>
		<div class="container">
		<?php
            $is_welcome_page = true;
            
            // Display post
            if (isset($_GET['id'])) {
                // connect to database
                require_once ($_SERVER['DOCUMENT_ROOT'] . '/blog/admin/src/utils/functions.php');
                $connection = connectToDatabase();
            
                // init vars
                $id = $_GET['id'];
                $title = "";
                $content = "";
                $author = "";
                $date = "";
                $image = "";
            
                // get post
                $query = "SELECT * FROM `posts` WHERE id='$id'";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    $title = $row['title'];
                    $author = $row['author'];
                    $content = $row['content'];
                    $image = $row['image'];
                    $date = $row['date'];
                }
            
                // display post
                if (! empty($title)) {
                    echo '<div class="mt-5 mb-0"><label><p class="h1">' . $title . '</p>&nbsp;</label></div><BR>';
                    if (! empty($image)) {
                        echo '<div class="mb-3"><img src="img/' . $image . '" width="256" height="128"></div>';
                    }
                    echo '<div class="mt-0 mb-0"><label><i><p class="small">by&nbsp;' . $author . ',&nbsp;published on&nbsp;' . $date . '</p></i></label></div><BR>';
                    echo '<div class="mt-5 mb-0"><label><p class="fs-5">' . $content . '</p></label></div><BR>';
            
                    // do not display welcome page
                    $is_welcome_page = false;
                }
            }
            
            // Display welcome page
            if ($is_welcome_page) {
                echo '<p class="h1 text-center mt-5">Welcome to blog!</p>
                                            <p class="text-center"><img alt="" src="img/static/logo.png"></p>';
            }
            ?>
        </div>
	</main>

	<!-- Scripts -->
	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
		crossorigin="anonymous"></script>
</body>