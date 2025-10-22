<?php
session_start();

require_once __DIR__ . '/../../config/config.php';
require_once APP_ROOT . '/src/functions/users.php';
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>e-library</title>

<!-- Bootstrap core CSS -->
<link
	href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
	rel="stylesheet"
	integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
	crossorigin="anonymous">

</head>
<body>

	<header
		class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">e-library</a>
		<button class="navbar-toggler d-md-none collapsed" type="button"
			data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
			aria-controls="sidebarMenu" aria-expanded="false"
			aria-label="Toggle navigation" style="top: .125rem; margin: 0.25rem;">
			<span class="navbar-toggler-icon"></span>
		</button>
		<input class="form-control form-control-dark w-100" type="text"
			placeholder="Search" aria-label="Search">
		<div class="navbar-nav">
			<div class="nav-item text-nowrap">
				<a class="nav-link px-3"
					href="<?php echo URL_SOURCE; ?>/auth/logout.php">Sign out</a>
			</div>
		</div>
	</header>

	<div class="container-fluid">
		<div class="row">
			<!-- Navigation -->
			<?php require_once APP_ROOT .'/src/includes/navigation.php'; ?>
            
            <?php
            //get the users to display
            $users_param = $_GET['users'] ?? NULL;
            $users = NULL;
            if ($users_param != NULL) {
                $users = get_users($users_param);
            }

            //display the users
            if ($users != NULL) {
                echo '
	            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
					<h2 class="mt-3">';

                //Display page header info based on user params
                $page_header_info = "Lorem Ipsum";
                switch ($users_param) {
                    case "all":
                        $page_header_info = "All Users";
                        break;
                    case "A":
                        $page_header_info = "Administrators";
                        break;
                    case "L":
                        $page_header_info = "Librarians";
                        break;
                    case "M":
                        $page_header_info = "Members";
                        break;
                    default:
                        ;
                        break;
                }
                echo $page_header_info;

                echo '</h2>
					<hr>
					<div class="table-responsive">
						<table class="table table-striped table-sm">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">username</th>
									<th scope="col">email</th>
									<th scope="col">role</th>
									<th scope="col">status</th>
								</tr>
							</thead>
							<tbody>';
                foreach ($users as $user) {
                    echo '<tr>
				            		<td>' . $user['id'] . '</td>
				            		<td>' . $user['username'] . '</td>
				            		<td>' . $user['email'] . '</td>
				            		<td>' . $user['role'] . '</td>
									<td>' . $user['status'] . '</td>
									<td>';
                    //display actions based on user roles
                    if ($user['role'] == "admin") {
                        //actions to administrators
                        echo '		<a href="TODO.php?id=' . $user["id"] . '"><button name="button-contact" type="button" class="btn btn-info" style="margin: 0px 0px 0 4px;">CONTACT</button></a>
								';
                    } elseif ($user['role'] == "lib") {
                        //actions to librarians
                        echo '		<a href="TODO.php?id=' . $user["id"] . '"><button name="button-contact" type="button" class="btn btn-info" style="margin: 0px 0px 0 4px;">CONTACT</button></a>		                                
		                                <a href="TODO.php?id=' . $user["id"] . '"><button name="button-delete" type="button" class="btn btn-danger" style="margin: 0px 0px 0 4px;">DELETE</button></a>
								';
                    } elseif ($user['role'] == "user") {
                        //actions to members
                        echo '  	<a href="TODO.php?id=' . $user["id"] . '"><button name="button-contact" type="button" class="btn btn-info" style="margin: 0px 0px 0 4px;">CONTACT</button></a>
										<a href="TODO.php?id=' . $user["id"] . '"><button name="button-delete" type="button" class="btn btn-danger" style="margin: 0px 0px 0 4px;">DELETE</button></a>										
										<a href="TODO.php?id=' . $user["id"] . '"><button name="button-revoke" type="button" class="btn btn-warning" style="margin: 0px 0px 0 4px;">REVOKE</button></a>
										<a href="TODO.php?id=' . $user["id"] . '"><button name="button-approve" type="button" class="btn btn-success" style="margin: 0px 0px 0 4px;">APPROVE</button></a>
								';
                    }
                    echo '</td>
			            		</tr>';
                }
                echo '</tbody>
						</table>
					</div>
				</main>';
            }
            ?>

		</div>
	</div>


	<script
		src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
		crossorigin="anonymous"></script>
	<script
		src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
		integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
		crossorigin="anonymous"></script>
	<script>
      feather.replace();
    </script>
</body>
</html>
