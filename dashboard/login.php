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
</head>

<body>
    <!--Logo-->
    <div class="container">
        <div class="col-md-12">
            <img src="img/gparap_logo.png" width="128px" height="64px" alt="logo">
        </div>
    </div>

    <!--Login Form-->
    <div class="container col-md-4">
        <form method="POST" action="index.php">
            <div class="mb-3">
                <label for="loginInputEmail" class="form-label">Email address</label>
                <input type="email" class="form-control" name="loginInputEmail" id="loginInputEmail" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="loginInputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="loginInputPassword" id="loginInputPassword">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="" async defer></script>
</body>

</html>