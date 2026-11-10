<?php

/*
 * https://mit-license.org
 * Copyright © 2026 gparap
 * Connect to database.
 */

require_once ($_SERVER['DOCUMENT_ROOT'] . '/e-commerce/config/config.php');

return mysqli_connect(HOST, USER, PASSWORD, DATABASE);

?>