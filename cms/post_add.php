<?php
session_start();

//if user is not signed-ing go to login page
if (empty($_SESSION['user_id'])) {
    header("Location: https://localhost/cms/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<?php include_once('head.php'); ?>

<body>

    <?php include_once 'header.php'; ?>

     <!-- Container -->
    <div class="container-fluid">
        <div class="row">
            <!--Sidebar Navigation-->
            <?php include_once 'sidebar.php'; ?>

            <!--Content Area-->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Add Post</h1>
                </div>
                <div>
                    <form method="POST" action="post_add.php" enctype="multipart/form-data">
                        <!--title-->
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>

                        <!--author-->
                        <div class="mb-3">
                            <label for="author" class="form-label">Author</label>
                            <input type="text" class="form-control" id="author" name="author">
                        </div>

                        <!--content-->
                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea name="content" id="content" class="form-control" rows="5" style="resize: both;"></textarea>
                        </div>

                        <!--image-->
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <!--date-->
                        <div class="mb-3">
                            <label for="date" class="form-label">date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>

                        <!--keywords-->
                        <div class="mb-3">
                            <label for="keywords" class="form-label">Keywords</label>
                            <input type="text" class="form-control" id="keywords" name="keywords">
                        </div>

                        <!--Add post button-->
                        <button type="submit" class="btn btn-dark" name="button-add">Add</button>

                        <!--Clear button post-->
                        <button onclick="clearAllText()" class="btn btn-dark" name="button-clear">Clear</button>
                    </form>

                    <?php

                    //TODO: validate post

                    //add post
                    if (isset($_POST['button-add'])) {
                        //connect to database
                        $connection = mysqli_connect('localhost', 'root', '', 'test_db');
                        if (!$connection) {
                            die(mysqli_connect_error);
                        }

                        //get fields
                        $title = $_POST['title'];
                        $author = $_POST['author'];
                        $content = $_POST['content'];
                        //TODO: image file upload
                        $date = $_POST['date'];
                        $keywords = $_POST['keywords'];

                        //execute query
                        $query = "INSERT INTO `posts` (`id`, `title`, `author`, `content`, `image`, `date`, `keywords`) 
                            VALUES (NULL, '$title', '$author', '$content', NULL, '$date', '$keywords')";
                        $result = mysqli_query($connection, $query);
                        
                        //TODO: validate results

                        //redirect to posts
                        echo "<script>window.location.href='https://localhost/cms/posts.php'</script>";
                        exit();
                    }
                    ?>

                </div>
            </main>
        </div>
    </div>
</body>

</html>
