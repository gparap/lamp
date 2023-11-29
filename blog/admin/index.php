<?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT'] .'/blog/config/config.php');

    //if user is not signed-in go to login page
    if (empty($_SESSION['user_id'])) {
        $location = ADMIN_URL . "/src/auth/login.php";
        echo '<script>window.location.href = "'.$location.'";</script>';
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">

<?php include_once 'src/utils/head.php'; ?>

<body>

	<?php include_once 'src/utils//header.php'; ?>
    
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
                        <?php //this navigation item is visible only for the administrator
                        if ($_SESSION['user_role'] == 'admin') {
                            echo '
                            <li class="nav-item">
                            <a class="nav-link" href="src/users/users.php">
                                <span data-feather="users" class="align-text-bottom"></span>
                                Users
                            </a>
                            </li>
                            ';
                        } ?>
                        <li class="nav-item">
                            <a class="nav-link" href="src/posts/posts.php">
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
                    <h1 class="h2">Please, select a category...</h1>
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
