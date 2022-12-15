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
        	<!--Sidebar Navigation-->
            <?php include_once 'sidebar.php'; ?>

            <!--Content Area-->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Please, select a category...</h1>
                    <?php 
                        if (!empty($_SESSION['user_id'])) {
                            echo "role | ".$_SESSION['user_role'];
                        } 
                    ?>
                </div>
            </main>
        </div>
    </div>
    
</body>

</html>
