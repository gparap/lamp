<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/blog/config/config.php');
require_once('../utils/functions.php');
checkUserAuthentication();
?>

<!DOCTYPE html>
<html>

<?php include_once('../utils/head.php'); ?>

<body>

    <?php include_once('../utils/header.php'); ?>

    <!-- Container -->
    <div class="container-fluid">
        <div class="row">

            <?php
            //Sidebar Navigation
            include_once('../utils/sidebar.php');

            //get content from database based on its post id
            if (isset($_GET['id'])) {
                //connect to database
                $connection = connectToDatabase();

                //init vars
                $id = "";
                $title = "";
                $keywords = "";
                $content = "";
                $author = "";
                $date = "";
                $image = "";

                //get post id
                $id = $_GET['id'];

                //get content
                $query = "SELECT * FROM `posts` WHERE `id`='$id'";
                $results = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($results)) {
                    $title = $row['title'];
                    $author = $row['author'];
                    $content = $row['content'];
                    $image = $row['image'];
                    $date = $row['date'];
                    $keywords = $row['keywords'];
                }
            }

            ?>
            <!--Display content-->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Post ID:&nbsp;<?php echo $id; ?></h1>
                </div>
                <?php
                if (!empty($image)) {
                    echo '<div class="mb-3">
                            <img src="' . BASE_URL . '/public/img/' . $image . '" width="256" height="128">
                        </div>';
                }
                ?>
                <div class="mb-3">
                    <label><b>Title:</b>&nbsp;</label><?php echo $title; ?>
                </div>
                <div class="mb-3">
                    <label><b>Author:</b>&nbsp;</label><?php echo $author; ?>
                </div>
                <div class="mb-3">
                    <label><b>Date:</b>&nbsp;</label><?php echo $date; ?>
                </div>
                <div class="mb-3">
                    <label><b>Keywords:</b>&nbsp;</label><?php echo $keywords; ?>
                </div>
                <div class="mb-3">
                    <label><b>content:</b>&nbsp;</label>
                    <p><?php echo $content; ?></p>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
