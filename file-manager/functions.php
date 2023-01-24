<?php

/*
 * https://mit-license.org
 * Copyright © 2023 gparap
 */

/** List all existing folders. */
function getFolderList() {
    //find all pathnames and filter those that are directories
    $folder = array_filter(glob('*'), 'is_dir');

    //handle the output based on the number of folders
    if (count($folder) < 0) {
        echo '
                <div class="row row-cols-6 text-center">
                    <div class="col">No folders found...</div>
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col"></div>
                    <div class="col"></div>
                </div>
            ';
    } else {
        //display folders row by row
        foreach ($folder as $folder_name) {
            echo '
                <div class="row row-cols-6 text-center">
                    <div class="col">' . $folder_name . '</div>
                    <div class="col">' . getFilesCount($folder_name) . '</div>
                    <div class="col"><button>Add File</button></div>
                    <div class="col"><button>Delete File</button></div>
                    <div class="col"><button>View Files</button></div>
                    <div class="col"><button>Edit Folder</button></div>
                </div> 
            ';
        }
    }
}

/** Create a new folder into the current path. */
function createNewFolder() {
    $result = mkdir("./new_folder");
    if ($result == true) {
        echo '<script>alert("File created successfully. Please, reload the page... '
        . '\n\n(rename the new_folder if you want to create another one)");</script>';
    } else {
        echo '<script>alert("Error. File not created.");</script>';
    }
}

//get the number of files inside a folder (-2: filepaths "." and "..")
function getFilesCount($folder) {
    $iterator = new DirectoryIterator("./$folder");
    return iterator_count($iterator) - 2;
}
