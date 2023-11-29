<?php session_start();
require_once($_SERVER['DOCUMENT_ROOT'] .'/blog/config/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--styles-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <!-- Display alert messages to user -->
    <div class="container">
    	<?php
    	if (isset($_GET['msg'])) {
            echo '
            <div class="alert alert-dark alert-dismissible fade show" role="alert">' . $_GET['msg'] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
        }
        ?>
    </div>
        
	<div class="container col-md-3">
		<!--Logo-->
		<div class="container text-center">
			<div class="col-md-12">
				<img src="../../img/logo.png" width="128px" height="64px" alt="logo">
			</div>
		</div>

		<!--Login Form-->
		<form method="post">
			<div class="col-mb-3">
				<label for="email" class="form-label">Email address</label> <input
					type="email" class="form-control" name="email">
			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Password</label> <input
					type="password" class="form-control" name="password">
			</div>
			<button type="submit" class="btn btn-primary" name="button-login">Login</button>
			<a href="https://localhost/blog/admin/src/auth/register.php">Not registered
				yet?</a>
		</form>

		<!--Login-->
        <?php
        if (isset($_POST['button-login'])) {
            // connect to database
            $connection = mysqli_connect('localhost', 'root', '', 'blog_db');
            if (! $connection) {
                die(mysqli_connect_error);
            }

            if (isset($_POST['email']) && isset($_POST['password'])) {
                // get user credentials
                $email = mysqli_real_escape_string($connection, $_POST['email']);
                $password = hash('md5', mysqli_real_escape_string($connection, $_POST['password']));

                // validate user credentials
                if (empty($email) or empty($password)) {
                    $location = ADMIN_URL . "/src/auth/login.php?msg=Please, fill in input fields!";
                    echo '<script>window.location.href = "'.$location.'";</script>';
                    exit();
                }

                // authenticate user
                $query = "SELECT * FROM `users` WHERE email='$email' AND password='$password'";
                $query_results = mysqli_query($connection, $query);
                if ($query_results->num_rows != 1) {
                    $location = ADMIN_URL . "/src/auth/login.php?msg=User does not exist!";
                    echo '<script>window.location.href = "'.$location.'";</script>';
                    exit();
                } else {
                    while ($row = mysqli_fetch_assoc($query_results)) {
                        // make sure user status is approved
                        if ($row['status'] == 'pending') {
                            $location = ADMIN_URL . "/src/auth/login.php?msg=You are not authorized yet. <br />Please, wait for approval or contact admin...";
                            echo '<script>window.location.href = "'.$location.'";</script>';
                            exit();
                        }

                        // give user a session var
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['user_role'] = $row['role'];

                        // go to home page
                        $location = ADMIN_URL . "/index.php";
                        echo '<script>window.location.href = "'.$location.'";</script>';
                        exit();
                    }
                }
            }

            // close database connection
            $connection -- > close();
        }
        ?>
    </div>
	<script	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
