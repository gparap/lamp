<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/blog/config/config.php');
require_once('../utils/functions');
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

            <?php
            //get user id
            $id = $_GET['id'];

            //connect to database
            $connection = connectToDatabase();

            //get user
            $query = "SELECT * FROM users WHERE `id`='$id'";
            $results = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($results)) {
                //get fields
                $username = $row['username'];
                $email = $row['email'];
                $role = $row['role'];
            }
            ?>

            <!--Content Area-->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Edit user</h1>
                </div>
                <div>
                    <form method="POST" action="user_update.php?id=<?php echo $id ?>" enctype="multipart/form-data">
                        <!--username-->
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
                        </div>

                        <!--email-->
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                        </div>

                        <!--role-->
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-control" id="role" name="role">
                                <option value="user" <?php echo ($role == "user") ? 'selected' : ''; ?>>User</option>
                                <option value="author" <?php echo ($role == "author") ? 'selected' : ''; ?>>Author</option>
                            </select>
                        </div>

                        <!--Update user button-->
                        <button type="submit" class="btn btn-dark" name="button-update">Update</button>
                    </form>

                    <?php

                    //update user
                    if (isset($_POST['button-update'])) {
                        //get user id
                        $id = $_GET['id'];

                        //get input values
                        $username = $_POST['username'];
                        $email = $_POST['email'];
                        $role = $_POST['role'];

                        //execute update query
                        $query = "UPDATE `users` SET `username`='$username',`email`='$email',`role`='$role' WHERE id='$id'";
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
</body>

</html>