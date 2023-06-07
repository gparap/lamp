<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Form</title>
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
        <form method="POST" action="login.php">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" name="submit" class="w-100 btn btn-lg btn-primary">Login</button>
            <div class="py-2">
                <a href="https://localhost/authentication/src/register.php">Not registered yet?</a>
            </div>

        </form>
    </div>

    <!--Login-->
    <?php
    if (isset($_POST['submit'])) {

        // connect to the database
        require_once('connection.php');

        //validate input fields
        $email = mysqli_real_escape_string($db_connection, $_POST['email']);
        $password = mysqli_real_escape_string($db_connection, $_POST['password']);
        if (empty($email) || empty($password)) {
            echo "<script>alert('Empty Fields!')</script>";
            exit();
        }

        //query database
        $query = "SELECT * FROM `users` WHERE email='$email' AND password='$password'";
        $query_results = mysqli_query($db_connection, $query);

        //check query results validity
        $query_results_rows = mysqli_num_rows($query_results);
        if ($query_results_rows == 1) {
            while ($row = mysqli_fetch_assoc($query_results)) {
                //give the user a session id
                $_SESSION['id'] = $row['id'];
            }
            echo $_SESSION['id'];

            //redirect to home page
            header("Location: https://localhost/authentication/index.php");
            exit();
        } else {
            echo "<script>alert('Check your credentials!')</script>";
            exit();
        }
    }
    ?>
    <script src="../resources/js/bootstrap.min.js"></script>
</body>

</html>