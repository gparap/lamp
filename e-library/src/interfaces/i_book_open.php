<?php
session_start();

require_once __DIR__ . '/../../config/config.php';
require_once APP_ROOT . '/src/functions/books.php';

//open book to read online
if (isset($_POST['button-open-book'])) {
    open_book($_POST['open-book-filename']);
}

?>