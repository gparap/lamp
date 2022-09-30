<?php
require_once 'functions.php';
session_start();
checkUserAuthentication();
handleLogout();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Authentication</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" />
    <script src="js/bootstrap.min.js"></script>
</head>

<body>

<div class="container">
  <!--Logo-->
      <div class="col-md-12">
          <img src="img/gparap_logo.png" width="128px" height="64px" alt="logo">
      </div>

  <!--Logout-->
  <form method="POST" action="index.php">
      <button type="submit" class="btn btn-primary" name="logout">Logout</button>
  </form>
</div>

</body>

</html>
