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
                            <a class="nav-link" href="#">
                                <span data-feather="users" class="align-text-bottom"></span>
                                Users
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="posts.php">
                                <span data-feather="posts" class="align-text-bottom"></span>
                                Posts
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!--Content Area-->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Users</h1>
                    <h6>
                        <?php if (!empty($_SESSION['user_id'])) {
                            echo "UserID: " . $_SESSION['user_id'];
                        } ?>
                    </h6>
                </div>
            </main>
        </div>
    </div>
    
</body>

</html>
