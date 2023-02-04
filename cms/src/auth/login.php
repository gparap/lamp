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
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
                <button type="submit" class="btn btn-primary" name="button-login">Login</button>
            	<a href="https://localhost/cms/src/auth/register.php">Not registered yet?</a> 
        </form>

        <!--Login-->
        <?php
        if (isset($_POST['button-login'])) {
            //connect to database
            $connection = mysqli_connect('localhost', 'root', '', 'test_db');
            if (!$connection) {
                die(mysqli_connect_error);
            }
            
            if (isset($_POST['email']) && isset($_POST['password'])) {
                //get user credentials
                $email = mysqli_real_escape_string($connection, $_POST['email']);
                $password = mysqli_real_escape_string($connection, $_POST['password']);
                
                //validate user credentials
                if (empty($email) OR empty($password)) {
                    echo '<script>alert("Please, fill in input field(s)!")</script>';
                    exit();
                }
                
                //authenticate user
                $query = "SELECT * FROM `users` WHERE email='$email' AND password='$password'";
                $query_results = mysqli_query($connection, $query);
                if ($query_results->num_rows != 1) {
                    echo '<script>alert("User does not exist!")</script>';
                    exit();
                }else{
                    //give user a session var
                    while ($row = mysqli_fetch_assoc($query_results)) {
                        session_start();
                        session_destroy();
                        session_start();
                        $_SESSION['user_id'] = $row['id'];
                        $_SESSION['user_role'] = $row['role'];
                    }
                    //go to home page
                    header("Location: https://localhost/cms/index.php");
                    exit(); 
                }
            }
            
            //close database connection
            $connection-->close();
        }    
        ?>

    </div>
</body>

</html>
