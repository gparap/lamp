<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6">Dashboard</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">

    <!-- Logout -->
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form method="POST">
                <button type="submit" class="btn btn-dark px-3" name="logout">Logout</button>
            </form>
            
            <!--Sign-out user and go to login page-->
			<?php
                if(isset($_POST['logout'])) {
                    session_unset();
                    session_destroy();
                    header("Location: https://localhost/cms/src/auth/login.php");
                    exit(); 
                }
            ?>
        </div>
    </div>
</header>