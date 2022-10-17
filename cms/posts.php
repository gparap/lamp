<?php
session_start();

//if user is not signed-ing go to login page
if (empty($_SESSION['user_id'])) {
    header("Location: https://localhost/cms/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once 'head.php'; ?>

<body>

	<?php include_once 'header.php'; ?>
    
    <!-- Container -->
    <div class="container-fluid">
        <div class="row">
        	<!-- Sidebar -->
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">
                                <span data-feather="home" class="align-text-bottom"></span>
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="users.php">
                                <span data-feather="users" class="align-text-bottom"></span>
                                Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="posts" class="align-text-bottom"></span>
                                Posts
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

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
                            <th scope="col">&nbsp;<a href="job_add.php" class="btn btn-dark">&nbsp;ADD&nbsp;</a></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //connect to database
                        $connection = mysqli_connect('localhost', 'root', '', 'test_db');
                        if (!$connection) {
                            die(mysqli_connect_error);
                        }

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
