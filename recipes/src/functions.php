<?php
/* https://mit-license.org | © 2023 gparap */

require_once('../config/config.php');

function connect_to_database() {
    mysqli_report(MYSQLI_REPORT_OFF);
    $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    mysqli_set_charset($connection, "utf8mb4");
    return $connection;
}

?>