<?php require_once('../../config/config.php'); ?>
<!DOCTYPE html>
<!--
https://mit-license.org
Copyright © 2026 gparap
-->
<html data-bs-theme="light" lang="en">

<?php require_once INCLUDES_PATH . 'head.php'; ?>

<body>
	<!-- Navigation -->
	<?php require_once INCLUDES_PATH . 'navigation.php'; ?>	

	<!-- Products details section -->
	<section>
		<div class="container py-5">
			<article class="row align-items-start g-4">

				<!-- Product image -->
				<div class="col-md-5">
					<img class="img-fluid rounded-4" src="" alt="Product image">
				</div>

				<!-- Product data -->
				<div class="col-md-7">
					<h1>Product Name</h1>
					<div>
						<a href="#">Product Category</a>
					</div>
					<div>
						<del>$110.00</del>
						<span>$99.99</span>
					</div>
					<div class="my-4">
						<form>
							<div>
								<div>
									<button type="button">−</button>
									<input id="" type="number" name="quantity" value="1" min="1"
										step="1" style="width: 4rem">
									<button type="button">+</button>
								</div>
								<button type="submit" class="btn btn-primary shadow mt-4">Add to
									Cart</button>
							</div>
						</form>
					</div>
					<!-- Product description -->
					<div>
						<p>
							Totam quia nisi temporibus <i>sint.</i>
						</p>
					</div>
				</div>
			</article>
		</div>
	</section>

	<!-- Newsletter -->
	<?php require_once INCLUDES_PATH . 'newsletter.php'; ?>

	<!-- Footer -->
	<?php require_once INCLUDES_PATH . 'footer.php'; ?>
	
	<!-- Scripts -->
	<?php require_once INCLUDES_PATH . 'scripts.php'; ?>
</body>

</html>