<?php
require_once __DIR__ . '/../../config/config.php';

//get the session vars, if any
$role = $_SESSION['role'] ?? "";

//if user is not signed-in go to login page
if (empty($role)) {
    $location = URL_PUBLIC . "/auth/login.php";
    echo '<script>window.location.href = "' . $location . '";</script>';
    exit();
}

/** Adds a new book to the database. */
function add_book($book, $files): bool
{
    $is_book_added = FALSE;

    //get book fields
    $title = $book['title'] ?? "";
    $author = $book['author'] ?? "";
    $image = ""; //init the final name of image to insert to the db
    $book = ""; //init the final name of book to insert to the db
    $genre = $book['genre'] ?? "";
    $pages = $book['pages'] ?? 0;
    $year = $book['year'] ?? 1970;

    //TODO: validation

    //get image file attributes
    if (isset($files['image'])) {
        $filename = $files['image']['name'];
        $filetype = $files['image']['type'];
        $file_tmp_name = $files['image']['tmp_name'];
        $file_error = $files['image']['error'];
        $filesize = $files['image']['size'];

        //create the file path destination
        $file_dest = APP_ROOT . "/public/assets/img/" . $filename;

        //upload file to blog images
        move_uploaded_file($file_tmp_name, $file_dest);

        //changes file mode
        chmod($file_dest, 0644);

        //update the final name of image to insert to the db
        $image = $filename;
    }

    //get book file attributes
    if (isset($files['book'])) {
        $filename = $files['book']['name'];
        $filetype = $files['book']['type'];
        $file_tmp_name = $files['book']['tmp_name'];
        $file_error = $files['book']['error'];
        $filesize = $files['book']['size'];

        //create the file path destination
        $file_dest = APP_ROOT . "/public/assets/books/" . $filename;

        //upload file to blog images
        move_uploaded_file($file_tmp_name, $file_dest);

        //changes file mode
        chmod($file_dest, 0644);

        //update the final name of image to insert to the db
        $book = $filename;
    }

    //open database connection
    $db_connection = mysqli_connect("localhost", "root", "", "e_library_db");

    //prepare database query
    $query = "INSERT INTO `books` (`title`, `author`, `image`, `file`, `genre`, `pages`, `year`) VALUES (?,?,?,?,?,?,?)";
    $query_statement = mysqli_prepare($db_connection, $query);
    $query_statement->bind_param("sssssdd", $title, $author, $image, $book, $genre, $pages, $year);

    //execute database query
    $query_result = $query_statement->execute();
    if ($query_result !== false) {
        $is_book_added = TRUE;
    } else {
        $is_book_added = FALSE;
    }

    //close database connection !!! important
    $db_connection->close();

    return $is_book_added;
}

?>
