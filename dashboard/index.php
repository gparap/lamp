<?php
require_once 'functions.php';
handleLogin();
handleLogout();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="">
    <!--bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!--styles-->
    <link rel="stylesheet" href="css/admin.css" />
    <!--scripts-->
    <script src="js/admin.js"></script>
</head>

<body>
    <!-- Logo -->
    <div class="container">
        <div class="col-md-12">
            <img src="img/gparap_logo.png" width="128px" height="64px" alt="logo">
        </div>
    </div>

    <!-- Logout -->
    <div class="container">
        <div class="col-md-12">
            <form method="POST" action="index.php">
                <button type="submit" class="btn btn-primary" name="logoutButton">Logout</button>
            </form>
        </div>
    </div>

    <!-- Dashboard -->
    <div class="container-fluid">
        <div class="row" id="dashboard-categories">
            <!-- Categories -->
            <ul class="nav flex-column col-sm-2">
                <li onclick="displayCategoryContents('dashboard-category-home')" id="dashboard-category-home"><i class="bi bi-house">&nbsp;</i><a href="#">Home</a></li>
                <li onclick="displayCategoryContents('dashboard-category-1')" id="dashboard-category-1"><i class="bi bi-1-circle"><a href="#">&nbsp;</i>Category</a></li>
                <li onclick="displayCategoryContents('dashboard-category-2')" id="dashboard-category-2"><i class="bi bi-2-circle"><a href="#">&nbsp;</i>Category</a></li>
                <li onclick="displayCategoryContents('dashboard-category-n')" id="dashboard-category-n"><i class="bi bi-circle">&nbsp;<a href="#"></i>n</a></li>
            </ul>
            <!-- Content -->
            <div class="col-sm-8"><p id="dashboard-category-content"></p></div>
        </div>
    </div>

</body>

</html>