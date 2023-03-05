<?php 
	session_start(); 
	if(isset($_SESSION['username'])){
		header('Location: dashboard.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'templates/header.php' ?>
	<title>Login -  Barangay Management System</title>

<body class="login">
<?php include 'templates/loading_screen.php' ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4">
				<div class="wrapper wrapper-login">
					<div class="container container-login animated fadeIn">
						<form method="POST" action="model/login.php">
							<div class="form-group form-floating-label">
								<input id="username" name="username" type="text" class="form-control input-border-bottom" required>
								<label for="username" class="placeholder">Username</label>
							</div>
							<div class="form-group form-floating-label">
								<input id="password" name="password" type="password" class="form-control input-border-bottom" required>
								<label for="password" class="placeholder">Password</label>
								<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
							</div>
							<div class="form-action mb-3">
								<button type="submit" class="btn btn-primary btn-rounded btn-login">Log In</button>
							</div>
							<a href="register.php">register now as a resident</a>
						</form>
					</div>
				</div>
					<!-- <h3 class="text-center">Login Here</h3>
					<div class="login-form">
						<form method="POST" action="model/login.php">
						<div class="form-group form-floating-label">
							<input id="username" name="username" type="text" class="form-control input-border-bottom" required>
							<label for="username" class="placeholder">Username</label>
						</div>
						<div class="form-group form-floating-label">
							<input id="password" name="password" type="password" class="form-control input-border-bottom" required>
							<label for="password" class="placeholder">Password</label>
							<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
						</div>
						<div class="form-action mb-3">
							<button type="submit" class="btn btn-primary btn-rounded btn-login">Log In</button>
						</div>
						<a href="register.php">register now as a resident</a>
						</form>
					</div>
					<a class="btn btn-primary btn-rounded btn-login" href="Login">Login as a resident</a> -->

		</div>
	</div>
			</div>
			<div class="col-md-6">

			</div>
		</div>
	</div>
	<div class="wrapper wrapper-login">
        
		<div class="container container-login animated fadeIn">
            <?php if(isset($_SESSION['message'])): ?>
                <div class="alert alert-<?= $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
                    <?= $_SESSION['message']; ?>
                </div>
            <?php unset($_SESSION['message']); ?>
            <?php endif ?>
			<h3 class="text-center">Login Here</h3>
			<div class="login-form">
                <form method="POST" action="model/login.php">
				<div class="form-group form-floating-label">
					<input id="username" name="username" type="text" class="form-control input-border-bottom" required>
					<label for="username" class="placeholder">Username</label>
				</div>
				<div class="form-group form-floating-label">
					<input id="password" name="password" type="password" class="form-control input-border-bottom" required>
					<label for="password" class="placeholder">Password</label>
					<span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
				</div>
				<div class="form-action mb-3">
                    <button type="submit" class="btn btn-primary btn-rounded btn-login">Log In</button>
				</div>
				<a href="register.php">register now as a resident</a>
                </form>
			</div>
			<a class="btn btn-primary btn-rounded btn-login" href="Login">Login as a resident</a>

		</div>
	</div>
	<?php include 'templates/footer.php' ?>
</body>
</html>