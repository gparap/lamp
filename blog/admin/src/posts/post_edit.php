<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] .'/blog/config/config.php');
require_once('../utils/functions.php');
checkUserAuthentication();
?>

<!DOCTYPE html>
<html>

<?php include_once('../utils/head.php'); ?>

<body>

    <?php include_once '../utils/header.php'; ?>

     <!-- Container -->
    <div class="container-fluid">
        <div class="row">
            <!--Sidebar Navigation-->
            <?php include_once '../utils/sidebar.php'; ?>

            <?php
                //get post id
                $id = $_GET['id'];

                //connect to database
                $connection = connectToDatabase();

                //get post
                $query = "SELECT * FROM posts WHERE `id`='$id'";
                $results = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($results)) {
                    //get fields
                    $title = $row['title'];
                    $author = $row['author'];
                    $content = $row['content'];
                    //TODO: image file upload
                    $date = $row['date'];
                    $keywords = $row['keywords'];
                }
            ?>

            <!--Content Area-->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Edit Post</h1>
                </div>
                <div>
                    <form method="POST" action="post_edit.php?id=<?php echo $id?>" enctype="multipart/form-data">
                        <!--title-->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $title; ?>">
                        </div>

                        <!--author-->
                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control" id="author" name="author" value="<?php echo $author; ?>">
                        </div>

                        <!--content-->
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" id="content" class="form-control" rows="5" style="resize: both;"><?php echo $content; ?></textarea>
                        </div>

                        <!--image-->
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <!--date-->
                        <div class="mb-3">
                            <label for="date" class="form-label">date</label>
                            <input type="date" class="form-control" id="date" name="date" value="<?php echo $date; ?>">
                        </div>

                        <!--keywords-->
                        <div class="mb-3">
                            <label for="keywords" class="form-label">Keywords</label>
                            <input type="text" class="form-control" id="keywords" name="keywords" value="<?php echo $keywords; ?>">
                        </div>

                        <!--Edit post button-->
                        <button type="submit" class="btn btn-dark" name="button-edit">Update</button>

                        <!--Clear button post-->
                        <button onclick="clearAllText()" class="btn btn-dark" name="button-clear">Clear</button>
                    </form>

                    <?php

                    //TODO: validate post

                    //edit post
                    if (isset($_POST['button-edit'])) {
                        //get post id
                        $id = $_GET['id'];

                        //get input values
                        $title = $_POST['title'];
                        $author = $_POST['author'];
                        $content = $_POST['content'];
                        //TODO: image
                        $date = $_POST['date'];
                        $keywords = $_POST['keywords'];
                        
                        //execute update query
                        $query = "UPDATE `posts` SET `title`='$title',`author`='$author',`content`='$content',`image`=NULL,`date`=NULL,`keywords`='$keywords' WHERE id='$id'";
                        $results = mysqli_query($connection, $query);
                        
                        //TODO: validate results

                        //!!! important
                        $connection->close();

                        //redirect to posts
                        $location = ADMIN_URL . "/src/posts/posts.php";
                        echo '<script>window.location.href = "'.$location.'";</script>';
                        exit();
                    }
                    ?>

                </div>
            </main>
        </div>
    </div>
</body>

</html>
