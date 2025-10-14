<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Register - e-library</title>
    <meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,700,700i,600,600i&amp;display=swap">
    <link rel="stylesheet" href="../assets/css/baguetteBox.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg fixed-top bg-body clean-navbar">
        <div class="container"><a class="navbar-brand logo" href="#">e-library</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="../index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="../auth/login.php">Login</a></li>
                    <li class="nav-item"><a class="nav-link active" href="../auth/registration.php">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page">
        <section class="clean-block clean-form dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info">Registration</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                </div>
                <form action="#" method="post">
                    <div class="mb-3"><label class="form-label" for="name">Name</label><input class="form-control item" type="text" id="name" data-bs-theme="light"></div>
                    <div class="mb-3"><label class="form-label" for="password">Password</label><input class="form-control item" type="password" id="password" data-bs-theme="light"></div>
                    <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control item" type="email" id="email" data-bs-theme="light"></div>
                    <div class="mb-3"><label class="form-label" for="phone">Phone</label><input class="form-control item" type="tel" id="phone" data-bs-theme="light"></div>
                    <div class="mb-3"><label class="form-label" for="address">Address</label><input class="form-control item" type="text" id="address" data-bs-theme="light"></div>
					<button class="btn btn-primary" type="submit" name="submit">Sign Up</button>
				</form>
            </div>
        </section>
    </main>
    
	<?php
    //TODO: register user
    if (isset($_POST['submit'])) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                User registered successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    ?>
    
    <footer class="page-footer dark">
        <div class="footer-copyright mt-0">
            <p>© 2025 gparap</p>
        </div>
    </footer>
    <script src="../assets/js/bootstrap.min.js"></script>
</body>

</html>