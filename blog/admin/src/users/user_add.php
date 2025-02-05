<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/blog/config/config.php');
require_once('../utils/functions.php');
checkUserAuthentication();
?>

<!DOCTYPE html>
<html>

<?php include_once('../utils/head.php'); ?>

<body>

    <?php include_once '../utils/header.php'; ?>

    <!-- Container -->
    <div class="container-fluid">
        <div class="row">
            <!--Sidebar Navigation-->
            <?php include_once '../utils/sidebar.php'; ?>

            <!--Content Area-->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Add User</h1>
                </div>
                <div>
                    <form method="POST" action="user_add.php" enctype="multipart/form-data">
                        <!--username-->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>">
                        </div>

                        <!--email-->
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
                        </div>

                        <!--password-->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <!--role-->
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-control" id="role" name="role">
                                <option value="user">User</option>
                                <option value="author">Author</option>
                            </select>
                        </div>

                        <!--Add user button-->
                        <button type="submit" class="btn btn-dark" name="button-add">Add</button>
                    </form>

                    <?php

                    //add user
                    if (isset($_POST['button-add'])) {
                        //connect to database
                        $connection = connectToDatabase();

                        //get fields
                        $username = mysqli_real_escape_string($connection, $_POST['username']);
                        $email = mysqli_real_escape_string($connection, $_POST['email']);
                        $password = hash('md5', mysqli_real_escape_string($connection, $_POST['password']));
                        $role = mysqli_real_escape_string($connection, $_POST['role']);

                        //validate input
                        if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['role'])) {
                            echo '<script>alert("Please, fill in all values.");</script>';
                            exit;
                        }

                        //check if user already exists in the database
                        $query = "SELECT * FROM `users` WHERE `email` = '$email'";
                        $result = mysqli_query($connection, $query);
                        if ($result) {
                            if (mysqli_num_rows($result) > 0) {
                                echo '<script>alert("User already exists.");</script>';
                                exit;
                            } else {
                                //check if this username is taken
                                $query = "SELECT * FROM `users` WHERE `username` = '$username'";
                                $result = mysqli_query($connection, $query);
                                if ($result) {
                                    if (mysqli_num_rows($result) > 0) {
                                        echo '<script>alert("Please, choose a different username.");</script>';
                                        exit;
                                    }
                                }
                            }
                        }

                        //add new user to the database
                        $query = "INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `status`) 
                            VALUES (NULL, '$username', '$email', '$password', '$role', 'approved')";
                        $result = mysqli_query($connection, $query);
                        if ($result) {
                            //redirect to users
                            $location = ADMIN_URL . "/src/users/users.php";
                            echo '<script>window.location.href = "' . $location . '";</script>';
                            exit();
                        }

                        //!!! important
                        $connection->close();
                    }

                    ?>

                </div>
            </main>
        </div>
    </div>

    <?php include_once '../utils/footer.php'; ?>
</body>

</html>