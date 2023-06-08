<?php
session_start();

//if user is not signed-ing go to login page
if (empty($_SESSION['user_id'])) {
    header("Location: https://localhost/cms/src/auth/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once 'utils/head.php'; ?>

<body>

	<?php include_once 'utils/header.php'; ?>
	
	<?php 
	//display any existing message to the user
	if (isset($_GET['msg'])){
        echo '
        <div class="alert alert-dark alert-dismissible fade show" role="alert">'.$_GET['msg'].'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
	}
	?>
    
    <!-- Container -->
    <div class="container-fluid">
        <div class="row">
            <!--Sidebar Navigation-->
            <?php include_once 'utils/sidebar.php'; ?>

            <!--Content Area-->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Users</h1>
                    <h6>
                        <?php if (!empty($_SESSION['user_id'])) {
                            //display user details on the edge of the screen
                            require_once 'utils/functions.php';
                            display_user_details($_SESSION['user_id']);
                        } ?>
                    </h6>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //connect to database
                        $connection = mysqli_connect('localhost', 'root', '', 'test_db');
                        if (!$connection) {
                            die(mysqli_connect_error);
                        }

                        //get all users
                        $query = "SELECT * FROM users";
                        $results = mysqli_query($connection, $query);


                        //display all users
                        while ($row = mysqli_fetch_assoc($results)) {
                            echo '<tr>';
                            echo '<th scope="row">' . $row['id'] . '</th>';
                            echo '<td>' . $row['username'] . '</td>';
                            echo '<td>' . $row['email'] . '</td>';
                            echo '<td>' . $row['role'] . '</td>';
                            echo '<td>' . $row['status'] . '</td>';
                            echo '<td>';
                            echo '<a href="user_status.php?id=' . $row["id"] . '"><button name="button-approve" type="button" class="btn btn-success" >APPROVE</button></a>';
                            echo '<a href="user_status.php?id=' . $row["id"] . '"><button name="button-disapprove" type="button" class="btn btn-warning">DISAPPROVE</button></a>';
                            echo '<a href="user_delete.php?id=' . $row["id"] . '"><button name="button-delete" type="button" class="btn btn-danger">DELETE</button></a>';
                            echo '</td>';
                            echo '</tr>';
                        }

                        //!!! important
                        $connection->close();
                        ?>
                    </tbody>
                </table>
            </main>
        </div>
    </div>
</body>

</html>
