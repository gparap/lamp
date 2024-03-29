<?php
require_once 'src/functions.php';
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
	<link rel="stylesheet" href="resources/css/bootstrap.min.css">
	<link rel="stylesheet" href="resources/css/style.css">
</head>

<body>
	<div class="container col-md-4">
		<!--Logo-->
		<div class="py-4">
			<img src="resources/img/gparap_logo.png" width="128px" height="64px" alt="logo">
		</div>

		<!--Logout-->
		<form method="POST" action="index.php">
			<button type="submit" class="btn btn-primary" name="logout">Logout</button>
		</form>
	</div>

	<script src="resources/js/bootstrap.min.js"></script>
</body>

</html>