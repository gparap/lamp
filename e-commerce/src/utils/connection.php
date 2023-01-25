<?php

/*
 * https://mit-license.org
 * Copyright © 2023 gparap
 * Connect to database.
 */

require_once('../../config/config.php');

$db_connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

?>