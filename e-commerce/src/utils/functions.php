<?php

/*
 * https://mit-license.org
 * Copyright © 2023 gparap
 * Connect to database.
 */

//get category name based on category id
function get_category_name($id) {
    switch ($id) {
        case 1:
            $category_name = "auto";
            break;

        case 2:
            $category_name = "bikes";
            break;
        
        case 3:
            $category_name = "drinks";
            break;

        case 4:
            $category_name = "garden";
            break;

        case 5:
            $category_name = "gym";
            break;

        case 6:
            $category_name = "tech";
            break;

        default:
            break;
    }
    return $category_name;
}
                                