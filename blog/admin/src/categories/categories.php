<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] .'/blog/config/config.php');
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
                    <h1 class="h2">Categories</h1>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Number of Posts</th>
                            <th scope="col">&nbsp;<a href="TODO: category_add.php" class="btn btn-dark" style="margin-left: 4px;  min-width: 5.25rem;">&nbsp;ADD&nbsp;</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //connect to database
                        $connection = connectToDatabase();
                        
                        //create sql query
                        $query = "SELECT * FROM categories";

                        //get all categories
                        $results = mysqli_query($connection, $query);

                        //display all categories
                        while ($row = mysqli_fetch_assoc($results)) {
                            echo '<tr>';
                            echo '<th scope="row">' . $row['id'] . '</th>';
                            echo '<td>' . $row['name'] . '</td>';
                            echo '<td>' . $row['description'] . '</td>';
                            echo '<td>' . $row['posts'] . '</td>';
                            echo '<td>';
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

    <?php include_once '../utils/footer.php'; ?>
</body>

</html>
