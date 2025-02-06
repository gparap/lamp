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
                        $connection = connectToDatabase();

                        //get fields
                        $title = $_POST['title'];
                        $author = $_POST['author'];
                        $content = $_POST['content'];
                        $image = ""; //init the final name of image to insert to the db
                        $date = $_POST['date'];
                        $keywords = $_POST['keywords'];

                        //get the date string if it is not inserted                      
                        if ($date === "") {
                            $date = date("Y-m-d H:i:s");
                        }

                        //get image file attributes
                        if (isset($_FILES['image'])) {
                            $filename = $_FILES['image']['name'];
                            $filetype = $_FILES['image']['type'];
                            $file_tmp_name = $_FILES['image']['tmp_name'];
                            $file_error = $_FILES['image']['error'];
                            $filesize = $_FILES['image']['size'];

                            //TODO: validate image file uploads
                            
                            //create the file path destination
                            $file_dest = "../../../public/img/" . $filename;

                            //upload file to blog images
                            move_uploaded_file($file_tmp_name, $file_dest);

                            //changes file mode
                            chmod($file_dest, 0644);

                            //update the final name of image to insert to the db
                            $image = $filename;
                        }

                        //execute query
                        $query = "INSERT INTO `posts` (`id`, `title`, `author`, `content`, `image`, `date`, `keywords`) 
                            VALUES (NULL, '$title', '$author', '$content', '$image', '$date', '$keywords')";
                        $result = mysqli_query($connection, $query);
                        
                        //TODO: validate results

                        //!!! important
                        $connection->close();

                        //give user info
                        echo "<script>alert('Post added successfully.');</script>";

                        //redirect to posts
                        $location = ADMIN_URL . "/src/posts/posts.php";
                        echo '<script>window.location.href = "'.$location.'";</script>';
                    }
                    ?>

                </div>
            </main>
        </div>
    </div>

    <?php include_once '../utils/footer.php'; ?>
</body>

</html>
