<?php
    session_start();

    //if user is not signed-ing go to login page
    if (empty($_SESSION['user_id'])) {
        header("Location: http://localhost/cms/login.php");
        exit;
    } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--styles-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>CMS</title>
</head>

<body>
    <div class="container">
        <h1>Content Management System</h1>
        <br />
        <form method="post">
            <button type="submit" class="btn btn-primary" name="button-logout">Logout</button>
        </form>
    </div>

    <!--Sign-out user and go to login page-->
    <?php
        if(isset($_POST['button-logout'])) {
            session_unset();
            session_destroy();
            header("Location: http://localhost/cms/login.php");
            exit(); 
        }
    ?>

</body>

</html>
