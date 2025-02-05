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
                    <h1 class="h2">Posts</h1>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Content</th>
                            <th scope="col">&nbsp;<a href="post_add.php" class="btn btn-dark">&nbsp;ADD&nbsp;</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //connect to database
                        $connection = connectToDatabase();

                        //get all posts
                        $query = "SELECT * FROM posts";
                        $results = mysqli_query($connection, $query);


                        //display all posts
                        while ($row = mysqli_fetch_assoc($results)) {
                            echo '<tr>';
                            echo '<th scope="row">' . $row['id'] . '</th>';
                            echo '<td>' . $row['title'] . '</td>';
                            echo '<td>' . $row['author'] . '</td>';
                            echo '<td>' . substr($row['content'], 0, 99) . '...' . '</td>';
                            echo '<td>';
                            echo '<a href="post_view.php?id=' . $row["id"] . '"><button name="button-view" type="button" class="btn btn-dark" style="margin: 0px 8px;">VIEW</button></a>';
                            echo '<a href="post_edit.php?id=' . $row["id"] . '"><button name="button-edit" type="button" class="btn btn-warning" style="margin: 0px 8px;">EDIT</button></a>';
                            echo '<a href="post_delete.php?id=' . $row["id"] . '"><button name="button-delete" type="button" class="btn btn-danger">DELETE</button></a>';
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
