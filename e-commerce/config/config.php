<?php

/**
 * https://mit-license.org
 * Copyright © 2026 gparap
 * Configuration constants.
 */

/* Database */
define ( 'HOST', 'localhost' );
define ( 'DATABASE', 'e_commerce_db' );
define ( 'USER', 'root' );
define ( 'PASSWORD', '' );

/* Paths */
define ( 'ROOT_PATH', realpath ( __DIR__ . '/..' ) . '/' );
define ( 'UTILS_PATH', ROOT_PATH . '/src/utils/' );
define ( 'INCLUDES_PATH', ROOT_PATH . '/src/includes/' );

/* URLs */
define ( 'ADMIN_URL', 'https://localhost/e-commerce/public/admin/' );
define ( 'USER_URL', 'https://localhost/e-commerce/public/user/' );
define ( 'IMG_URL', 'https://localhost/e-commerce/public/img/' );
define ( 'PUBLIC_URL', 'https://localhost/e-commerce/public/' );