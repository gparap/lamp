<!DOCTYPE html>
<!--
https://mit-license.org
Copyright © 2023 gparap
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>File Manager</title>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container text-center">
            <h1>File Manager</h1>
            <hr>
            <div class="row row-cols-6 text-center">
                <div class="col">Folder</div>
                <div class="col">Files Count</div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"><button>New Folder</button></div>
            </div>
            <hr>
            <!--List all existing folders-->
            <?php
            require_once './functions.php';
            getFolderList();
            ?>
        </div>
        <script src="js/bootstrap.bundle.min.js"></script>
    </body>
</html>
