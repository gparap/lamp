<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../../index.php">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Home
                </a>
            </li>
            <?php //this navigation item is visible only for the administrator
            if ($_SESSION['user_role'] == 'admin') {
                echo '
                <li class="nav-item">
                <a class="nav-link" href="../users/users.php">
                    <span data-feather="users" class="align-text-bottom"></span>
                    Users
                </a>
                </li>
                ';
            } ?>
            <li class="nav-item">
                <a class="nav-link" href="../posts/posts.php">
                    <span data-feather="posts" class="align-text-bottom"></span>
                    Posts
                </a>
            </li>
        </ul>
    </div>
</nav>