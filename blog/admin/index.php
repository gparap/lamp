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
        
        	<?php include_once 'src/utils//sidebar.php'; ?>

            <!--Content Area-->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Hello, <?= $_SESSION['user_name'] ?></h1>
                    <h6>
                        <?php if (!empty($_SESSION['user_role'])) {
                            echo "Role: " . $_SESSION['user_role'];
                        } ?>
                    </h6>
                </div>
            </main>
        </div>
    </div>

    <?php include_once 'src/utils/footer.php'; ?>
</body>

</html>
