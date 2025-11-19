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

/**
 * Adds a new book to the database.
 */
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

/**
 * Returns e-lirary books based on query parameters criteria.
 */
function get_books($param): array
{
    //init vars
    $books = NULL;
    $role = NULL;
    $query = NULL;
    $query_statement = NULL;

    //handle the browser query
    $allowed_user_types = [
        'A',
        'L',
        'M'
    ]; //Administrators, Librarians, Members
    if (! in_array($param, $allowed_user_types)) {
        return NULL;
    } else {
        //get user role from query param
        $role = map_param_to_user_role($param);
    }

    //open database connection
    $db_connection = mysqli_connect("localhost", "root", "", "e_library_db");

    //prepare database query based on user role
    if ($param != "M") {
        $query = "SELECT * FROM books";
        $query_statement = mysqli_prepare($db_connection, $query);
    } else {
        //TODO: members will see only borrowed and/or downloaded books
        $query = "SELECT * FROM books WHERE `id` = -1";
        $query_statement = mysqli_prepare($db_connection, $query);
    }

    //execute database query to get books
    $query_statement->execute();
    $query_result = $query_statement->get_result();
    $books = $query_result->fetch_all(MYSQLI_ASSOC);

    //close database connection
    $db_connection->close();

    return $books;
}

/**
 * Returns an e-lirary book based on its id.
 */
function get_book_by_id($id): array
{
    $book = NULL;
    
    //open database connection
    $db_connection = mysqli_connect("localhost", "root", "", "e_library_db");
    
    //prepare database query
    $query = "SELECT * FROM books WHERE `id` = ?";
    $query_statement = mysqli_prepare($db_connection, $query);
    $query_statement->bind_param("s", $id);
    
    //execute database query to get the book
    $query_statement->execute();
    $query_result = $query_statement->get_result();
    $book = $query_result->fetch_all(MYSQLI_ASSOC);
    
    //close database connection
    $db_connection->close();
    
    return $book;
}

/**
 * Deletes an existing book from the database.
 */
function delete_book($id): bool
{
    $is_book_deleted = FALSE;

    //open database connection
    $db_connection = mysqli_connect("localhost", "root", "", "e_library_db");

    //prepare database query
    $query = "DELETE FROM books WHERE `id` = ?";
    $query_statement = mysqli_prepare($db_connection, $query);
    $query_statement->bind_param("s", $id);

    //execute database query
    $query_result = $query_statement->execute();
    if ($query_result !== false) {
        $is_book_deleted = TRUE;
    } else {
        $is_book_deleted = FALSE;
    }

    //close database connection !!! important
    $db_connection->close();

    return $is_book_deleted;
}

/**
 * Updates an existing book in the database.
 */
function update_book($book, $files): bool
{
    $is_book_updated = FALSE;
    
    //get book fields
    $id =  $book['id'];
    $title = $book['title'] ?? "";
    $author = $book['author'] ?? "";
    $image = $book['image-old'] ?? "";
    $file = $book['book-old'] ?? "";
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

        if (!empty($filename) && $filename != $image) {
            //create the file path destination
            $file_dest = APP_ROOT . "/public/assets/img/" . $filename;
    
            //upload file to blog images
            move_uploaded_file($file_tmp_name, $file_dest);
    
            //changes file mode
            chmod($file_dest, 0644);
    
            //update the final name of image to insert to the db
            $image = $filename;
        }
    }

    //get book file attributes
    if (isset($files['book'])) {
        $filename = $files['book']['name'];
        $filetype = $files['book']['type'];
        $file_tmp_name = $files['book']['tmp_name'];
        $file_error = $files['book']['error'];
        $filesize = $files['book']['size'];

        if (!empty($filename) && $filename != $file) {
            //create the file path destination
            $file_dest = APP_ROOT . "/public/assets/books/" . $filename;
    
            //upload file to blog images
            move_uploaded_file($file_tmp_name, $file_dest);
    
            //changes file mode
            chmod($file_dest, 0644);
    
            //update the final name of image to insert to the db
            $file = $filename;
        }
    }

    //open database connection
    $db_connection = mysqli_connect("localhost", "root", "", "e_library_db");

    //prepare database query
    $query = "UPDATE `books` SET `title` = ?, `author` = ?,`image` = ?,`file` = ?,`genre` = ?,`pages` = ?,`year`= ? WHERE `id` = ?";
    $query_statement = mysqli_prepare($db_connection, $query);
    $query_statement->bind_param("sssssdds", $title, $author, $image, $book, $genre, $pages, $year, $id);

    //execute database query
    $query_result = $query_statement->execute();
    if ($query_result !== false) {
        $is_book_updated = TRUE;
    } else {
        $is_book_updated = FALSE;
    }

    //close database connection !!! important
    $db_connection->close();

    return $is_book_updated;
}

?>