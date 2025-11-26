<?php
session_start();

require_once __DIR__ . '/../../config/config.php';
require_once APP_ROOT . '/src/functions/books.php';

//download book
if (isset($_POST['button-download-book'])) {
    download_book($_POST['download-book-filename']);
}

?>