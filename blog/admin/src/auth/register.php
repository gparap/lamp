<?php require_once($_SERVER['DOCUMENT_ROOT'] .'/blog/config/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--styles-->
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
	rel="stylesheet">
<title>Register</title>
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

		<!--Registration Form-->
		<form method="post">
			<div class="col-mb-3">
				<label for="email" class="form-label">Email address</label> <input
					type="email" class="form-control" name="email">
			</div>
			<div class="col-mb-3">
				<label for="username" class="form-label">Username</label> <input
					type="text" class="form-control" name="username">
			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Password</label> <input
					type="password" class="form-control" name="password">
			</div>
			<div class="mb-3">
				<label for="password-confirm" class="form-label">Confirm Password</label>
				<input type="password" class="form-control" name="password-confirm">
			</div>
			<button type="submit" class="btn btn-primary" name="button-register">Register</button>
		</form>

		<!--Registration-->
        <?php
        if (isset($_POST['button-register'])) {
            // connect to database
            require_once ('../utils/functions');
            $connection = connectToDatabase();

            if (isset($_POST['email']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['password-confirm'])) {
                // get user info
                $email = mysqli_real_escape_string($connection, $_POST['email']);
                $username = mysqli_real_escape_string($connection, $_POST['username']);
                $password = hash('md5', mysqli_real_escape_string($connection, $_POST['password']));
                $password_confirm = hash('md5', mysqli_real_escape_string($connection, $_POST['password-confirm']));

                // validate user credentials
                if (empty($email) or empty($username) or empty($password) or empty($password_confirm)) {
                    $location = ADMIN_URL . "/src/auth/register.php?msg=Please, fill in input fields!";
                    echo '<script>window.location.href = "'.$location.'";</script>';
                    exit();
                }
                
                // validate password
                if ($password !== $password_confirm) {
                    $location = ADMIN_URL . "/src/auth/register.php?msg=Passwords do not match!";
                    echo '<script>window.location.href = "'.$location.'";</script>';
                    exit();
                }
                
                // check if user is already registered
                $query = "SELECT * FROM `users` WHERE email='$email'";
                $query_results = mysqli_query($connection, $query);
                if ($query_results->num_rows == TRUE) {
                    $location = ADMIN_URL . "/src/auth/register.php?msg=User already registered!";
                    echo '<script>window.location.href = "'.$location.'";</script>';
                    exit();
                }

                // register user:
                // (users are "authors" with a "pending" status waiting approval from admin)
                $query = "INSERT INTO `users`(`username`, `email`, `password`, `role`, `status`) 
                                VALUES ('$username','$email','$password','author','pending')";
                $query_results = mysqli_query($connection, $query);
                if ($query_results == FALSE) {
                    $location = ADMIN_URL . "/src/auth/register.php?msg=User registration failed!";
                    echo '<script>window.location.href = "'.$location.'";</script>';
                    exit();
                } else {
                    $location = ADMIN_URL . "/src/auth/login.php?msg=Registration successful!";
                    echo '<script>window.location.href = "'.$location.'";</script>';
                    exit();
                }
            }

            // close database connection
            $connection->close();
        }
        ?>
    </div>
    <script	src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
