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
                    <div class="col">0</div>
                    <div class="col"><button>Add File</button></div>
                    <div class="col"><button>Delete File</button></div>
                    <div class="col"><button>View Files</button></div>
                    <div class="col"><button>Edit Folder</button></div>
                </div> 
            ';
        }
    }
}
