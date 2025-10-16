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
<link href="css/bootstrap.min.css" rel="stylesheet">

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
				<a class="nav-link px-3" href="#">Sign out</a>
			</div>
		</div>
	</header>

	<div class="container-fluid">
		<div class="row">
			<nav id="sidebarMenu"
				class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"
				style="height: fit-content;">
				<div class="position-sticky pt-3">
					<ul class="nav flex-column">
						<li class="nav-item"><a class="nav-link" href="#"> <span
								data-feather="users"></span> Users
						</a>
							<ul style="margin-left: 1rem; list-style-type: circle;">
								<li class="nav-item"><a class="nav-link" href="#">Administrators</a></li>
								<li class="nav-item"><a class="nav-link" href="#">Librarians </a></li>
								<li class="nav-item"><a class="nav-link" href="#">Members </a></li>
							</ul></li>
						<hr>
						<li class="nav-item"><a class="nav-link" href="#"> <span
								data-feather="book"></span> Books
						</a></li>
					</ul>
				</div>
			</nav>

			<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
				<div class="d-flex justify-content-end">
					<h2 class="mt-3">
						Welcome back,&nbsp;TODO: username&nbsp;<img
							src="assets/img/avatars/person-circle.svg" height="32" width="32">
					</h2>
				</div>
				<h2 class="mt-3">Lorem Ipsum</h2>
				<hr>
				<div class="table-responsive">
					<table class="table table-striped table-sm">
						<thead>
							<tr>
								<th scope="col">#</th>
								<th scope="col">TODO</th>
								<th scope="col">TODO</th>
								<th scope="col">...</th>
								<th scope="col">TODO</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Lorem Ipsum</td>
								<td>Lorem Ipsum</td>
								<td>...</td>
								<td>Lorem Ipsum</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Lorem Ipsum</td>
								<td>Lorem Ipsum</td>
								<td>...</td>
								<td>Lorem Ipsum</td>
							</tr>
							<tr>
								<td>...</td>
								<td>Lorem Ipsum</td>
								<td>Lorem Ipsum</td>
								<td>...</td>
								<td>Lorem Ipsum</td>
							</tr>
							<tr>
								<td>n</td>
								<td>Lorem Ipsum</td>
								<td>Lorem Ipsum</td>
								<td>...</td>
								<td>Lorem Ipsum</td>
							</tr>
						</tbody>
					</table>
				</div>
			</main>
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
