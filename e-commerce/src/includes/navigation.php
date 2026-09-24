<nav class="navbar navbar-expand-md sticky-top py-3 navbar-shrink"
	id="mainNav">
	<div class="container">
		<a class="navbar-brand d-flex align-items-center" href="<?= PUBLIC_URL ?>index.php"><span
			class="bs-icon-sm bs-icon-circle bs-icon-primary shadow d-flex justify-content-center align-items-center me-2 bs-icon">
				<img src="<?= IMG_URL ?>logo.png"
				class="img-fluid rounded-0 shadow-lg" alt="">

		</span><span>e-commerce</span></a>
		<button class="navbar-toggler" data-bs-toggle="collapse"
			data-bs-target="#navcol-1">
			<span class="visually-hidden">Toggle navigation</span><span
				class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navcol-1">
			<ul class="navbar-nav mx-auto">
				<li class="nav-item"><a class="nav-link active" href="<?= PUBLIC_URL ?>index.php">Home</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Collection</a></li>
				<li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
			</ul>
			<?php
			if (session_status() == PHP_SESSION_NONE){
				session_start();			
			}
			if (isset ( $_SESSION ['role'] )) {
				echo '<a class="btn btn-primary shadow" role="button" href="'.PUBLIC_URL.'auth/logout.php">Sign out</a>';
			} else {
				echo '<a class="btn btn-primary shadow" role="button" href="' . PUBLIC_URL . 'auth/login.php">Sign in</a>';
			}
			?>
		</div>
	</div>
</nav>
