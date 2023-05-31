<?php

/*
 * https://mit-license.org
 * Copyright © 2023 gparap
 * Connect to database.
 */

require_once($_SERVER["DOCUMENT_ROOT"] . '/recipes/config/config.php');

mysqli_report(MYSQLI_REPORT_OFF);
$db_connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
mysqli_set_charset($db_connection, "utf8mb4");
?>
