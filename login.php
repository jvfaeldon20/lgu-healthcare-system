<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'templates/header.php' ?>
	<title>Login -  Barangay Management System</title>

<body class="login">
	<?php include 'templates/loading_screen.php' ?>
	<div class="container-fluid bg-default">
		<div class="row">
			<div class="col-md-12">
				
			</div>
		</div>
		<div class="row">
			<!-- resident login -->
			<div class="col-md-1"></div>

			<!-- member login -->
			<div class="col-md-3">
				<div class="wrapper wrapper-login">
					<div class="container animated fadeIn">
						<form class="form-signin" method="POST" action="model/login.php">
							<h2 class="form-signin-heading mb-3">Member Login</h2>
							<label for="inputUsername" class="sr-only">Username</label>
							<input id="inputUsername" class="form-control mb-2" placeholder="Username" name="username"  autofocus>
							<label for="password" class="sr-only">Password</label>
							<input type="password" id="password" class="form-control mb-5" placeholder="Password" name="password" >
							<button class="btn btn-primary btn-rounded" type="submit">Sign in</button>
							<button class="btn btn-primary btn-rounded btn-success" type="submit">Login as Resident</button>
						</form>
					</div>
				</div>
			</div>

			<!-- announcement -->
			<div class="col-md-7">
				<div class="wrapper wrapper-login">
					<div class="container-fluid animated fadeIn mr-5">
						<h3 class="text-primary">ANNOUNCEMENT</h3>
						<div class="media">
							<div class="media-left mr-3">
							  <a href="#">
								<img class="media-object" src="https://dummyimage.com/64x64/" alt="...">
							  </a>
							</div>
							<div class="media-body">
							  <h4 class="media-heading text-primary">Media heading</h4>
							  Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores eius accusamus et eos architecto dolorum explicabo incidunt quod dicta dolor sunt, expedita veniam officia commodi, quam atque sed quidem nostrum?
							</div>
						</div>
						<hr>
						<div class="media">
							<div class="media-left mr-3">
							  <a href="#">
								<img class="media-object" src="https://dummyimage.com/64x64/" alt="...">
							  </a>
							</div>
							<div class="media-body">
							  <h4 class="media-heading text-primary">Media heading</h4>
							  Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores eius accusamus et eos architecto dolorum explicabo incidunt quod dicta dolor sunt, expedita veniam officia commodi, quam atque sed quidem nostrum?
							</div>
						</div>
						<hr>
						<div class="media">
							<div class="media-left mr-3">
							  <a href="#">
								<img class="media-object" src="https://dummyimage.com/64x64/" alt="...">
							  </a>
							</div>
							<div class="media-body">
							  <h4 class="media-heading text-primary">Media heading</h4>
							  Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores eius accusamus et eos architecto dolorum explicabo incidunt quod dicta dolor sunt, expedita veniam officia commodi, quam atque sed quidem nostrum?
							</div>
						</div>
						<hr>
						<div class="media">
							<div class="media-left mr-3">
							  <a href="#">
								<img class="media-object" src="https://dummyimage.com/64x64/" alt="...">
							  </a>
							</div>
							<div class="media-body">
							  <h4 class="media-heading text-primary">Media heading</h4>
							  Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores eius accusamus et eos architecto dolorum explicabo incidunt quod dicta dolor sunt, expedita veniam officia commodi, quam atque sed quidem nostrum?
							</div>
						</div>
						<hr>
						<div class="media">
							<div class="media-left mr-3">
							  <a href="#">
								<img class="media-object" src="https://dummyimage.com/64x64/" alt="...">
							  </a>
							</div>
							<div class="media-body">
							  <h4 class="media-heading text-primary">Media heading</h4>
							  Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores eius accusamus et eos architecto dolorum explicabo incidunt quod dicta dolor sunt, expedita veniam officia commodi, quam atque sed quidem nostrum?
							</div>
						</div>
						<hr>
						<div class="media">
							<div class="media-left mr-3">
							  <a href="#">
								<img class="media-object" src="https://dummyimage.com/64x64/" alt="...">
							  </a>
							</div>
							<div class="media-body">
							  <h4 class="media-heading text-primary">Media heading</h4>
							  Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores eius accusamus et eos architecto dolorum explicabo incidunt quod dicta dolor sunt, expedita veniam officia commodi, quam atque sed quidem nostrum?
							</div>
						</div>
					</div>

				</div>
			</div>

			<div class="col-md-1"></div>

		</div>
	</div>
	<?php include 'templates/footer.php' ?>
</body>
</html>