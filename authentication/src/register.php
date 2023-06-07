<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration Form</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/css/style.css" />
</head>

<body>
    <div class="container col-md-4">
        <!--Logo-->
        <div class="py-4">
            <img src="../resources/img/gparap_logo.png" width="128px" height="64px" alt="logo">
        </div>
        <!--Login Form-->
        <form method="POST" action="register.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>

            <div class="mb-3">
                <label for="password-confirm" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" name="password-confirm" id="password-confirm">
            </div>

            <button type="submit" name="submit" class="w-100 btn btn-lg btn-primary">Register</button>
        </form>
    </div>

    <!--Register-->
    <?php

    if (isset($_POST['submit'])) {

        // connect to the database
        require_once('connection.php');

        //check if passwords match
        $password = mysqli_real_escape_string($db_connection, $_POST['password']);
        $confirm = mysqli_real_escape_string($db_connection, $_POST['password-confirm']);
        if ($password != $confirm) {
            echo "<script>alert('Passwords do not match!')</script>";
            exit();
        }

        //validate input fields
        $username = mysqli_real_escape_string($db_connection, $_POST['username']);
        $email = mysqli_real_escape_string($db_connection, $_POST['email']);
        $password = mysqli_real_escape_string($db_connection, $_POST['password']);
        if (empty($username) || empty($email) || empty($password)) {
            echo "<script>alert('Empty Fields!')</script>";
            exit();
        }

        //query database to check if user exists already
        $query = "SELECT * FROM `users` WHERE email='$email'";
        $query_results = mysqli_query($db_connection, $query);
        $query_results_rows = mysqli_num_rows($query_results);
        if ($query_results_rows == 1) {
            echo "<script>alert('User is already registered...')</script>";
            exit();
        }

        //register user & redirect to home page   
        $query = "INSERT INTO `users`(`email`, `username`, `password`) VALUES('$email', '$username', '$password')";
        $query_results = mysqli_query($db_connection, $query);
        if ($query_results == TRUE) {
            header("Location: https://localhost/authentication/index.php");
            exit();
        }
    }
    ?>
    <script src="../resources/js/bootstrap.min.js"></script>
</body>

</html>