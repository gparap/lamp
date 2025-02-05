<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/blog/config/config.php');
require_once('../utils/functions.php');
checkUserAuthentication();
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once '../utils/head.php'; ?>

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
                    <h1 class="h2">Users</h1>
                    <h6>
                        <?php if (!empty($_SESSION['user_id'])) {
                            echo $_SESSION['user_role'] . "&nbsp;|&nbsp;" . "UserID: " . $_SESSION['user_id'];
                        } ?>
                    </h6>
                </div>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Username</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Status</th>
                                <th scope="col">&nbsp;<a href="user_add.php" class="btn btn-dark">&nbsp;ADD&nbsp;</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //connect to database
                            $connection = connectToDatabase();

                            //get all users
                            $query = "SELECT * FROM users";
                            $results = mysqli_query(connectToDatabase(), $query);

                            //display all users
                            while ($row = mysqli_fetch_assoc($results)) {
                                echo '<tr>';
                                echo '<th scope="row">' . $row['id'] . '</th>';
                                echo '<td>' . $row['username'] . '</td>';
                                echo '<td>' . $row['email'] . '</td>';
                                echo '<td>' . $row['status'] . '</td>';
                                echo '<td>';
                                echo '<a href="user_approve.php?id=' . $row["id"] . '"><button name="button-approve" type="button" class="btn btn-success" style="margin: 0px 0px 0 4px;">APPROVE</button></a>';
                                echo '<a href="user_update.php?id=' . $row["id"] . '"><button name="button-update" type="button" class="btn btn-warning" style="margin: 0px 8px;">UPDATE</button></a>';
                                echo '<a href="user_delete.php?id=' . $row["id"] . '"><button name="button-delete" type="button" class="btn btn-danger">DELETE</button></a>';
                                echo '</td>';
                                echo '</tr>';
                            }

                            //!!! important
                            $connection->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

</body>

</html>