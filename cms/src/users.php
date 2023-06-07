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
    
    <!-- Container -->
    <div class="container-fluid">
        <div class="row">
            <!--Sidebar Navigation-->
            <?php include_once 'utils/sidebar.php'; ?>

            <!--Content Area-->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Users</h1>
                    <h6>
                        <?php if (!empty($_SESSION['user_id'])) {
                            //display user details on the edge of the screen
                            require_once 'utils/functions.php';
                            display_user_details($_SESSION['user_id']);
                        } ?>
                    </h6>
                </div>
            </main>
        </div>
    </div>
    
</body>

</html>
