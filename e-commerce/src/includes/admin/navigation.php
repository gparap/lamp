<nav class="navbar align-items-start p-0 sidebar sidebar-dark accordion bg-gradient-primary navbar-dark">
	<div class="container-fluid d-flex flex-column p-0">
		<a class="navbar-brand d-flex justify-content-center align-items-center m-0 sidebar-brand" href="#"> <img
			src="<?= IMG_URL ?>logo.png" width="32" height="32" class="img-fluid rounded-0 shadow-lg sidebar-brand-icon" alt="">
			<div class="mx-3 sidebar-brand-text">
				<span>E-Commerce</span>
			</div>
		</a>
		<hr class="my-0 sidebar-divider">
		<ul class="navbar-nav text-light" id="accordionSidebar">
			<li class="nav-item"><a class="nav-link active" href="<?= ADMIN_URL ?>"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
			<li class="nav-item"><a class="nav-link" href="<?= ADMIN_URL ?>TODO"><i class="fas fa-shopping-bag"></i><span>Orders</span></a></li>
			<li class="nav-item"><a class="nav-link" href="<?= ADMIN_URL ?>categories/view.php"><i class="fas fa-box-open"></i><span>Categories</span></a></li>
			<li class="nav-item"><a class="nav-link" href="<?= ADMIN_URL ?>TODO"><i class="fas fa-box-open"></i><span>Products</span></a></li>
			<li class="nav-item"><a class="nav-link" href="<?= ADMIN_URL ?>TODO"><i class="far fa-user-circle"></i><span>Customers</span></a></li>
			<li class="nav-item"><a class="nav-link" href="<?= ADMIN_URL ?>TODO"><i class="fas fa-warehouse"></i><span>Inventory</span></a></li>
			<li class="nav-item"><a class="nav-link active" href="<?= ADMIN_URL ?>TODO"><i class="fas fa-chart-line"></i><span>Analytics</span></a></li>
			<li class="nav-item"><a class="nav-link" href="<?= ADMIN_URL ?>TODO"><i class="fas fa-star"></i><span>Reviews</span></a></li>
			<li class="nav-item"><a class="nav-link" href="<?= ADMIN_URL ?>TODO"><i class="fas fa-tags"></i><span>Discounts</span></a></li>
			<li class="nav-item"><a class="nav-link" href="<?= ADMIN_URL ?>TODO"><i class="fas fa-truck"></i><span>Shipping</span></a></li>
			<li class="nav-item"><a class="nav-link" href="<?= ADMIN_URL ?>TODO"><i class="fas fa-cog"></i><span>Settings</span></a></li>
			<li class="nav-item"><a class="nav-link" href="<?= ADMIN_URL ?>TODO"><i class="far fa-id-badge"></i><span>Profile</span></a></li>
			<li class="nav-item"><a class="nav-link" href="<?= PUBLIC_URL ?>auth/logout.php"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a></li>
		</ul>
		<div class="text-center d-none d-md-inline">
			<button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
		</div>
	</div>
</nav>