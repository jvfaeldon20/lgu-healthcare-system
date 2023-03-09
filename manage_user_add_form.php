<?php include 'server/server.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Manage User - Masili Health Service System</title>
</head>
<body>
	<div class="wrapper">
		<?php include 'templates/main-header.php' ?>
		<?php include 'templates/sidebar.php' ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row mt--2">
						<div class="col-md-12">
                            <!-- action alert -->
							<?php if(isset($_SESSION['message'])): ?>
								<div class="alert alert-<?= $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
									<?php echo $_SESSION['message']; ?>
								</div>
							<?php unset($_SESSION['message']); ?>
							<?php endif ?>
							<!-- end of action alert -->
							<?php include 'templates/loading_screen.php' ?>
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">
											<h1>
                                            <a href="manage-user.php" class="text-primary">MANAGE USER</a> > <strong class="text-default">CREATE</strong></h1>
										</div>
									</div>
								</div>
								<div class="card-body">
                                    <form method="POST" action="manage_user_add_record.php" oninput='confirm_password.setCustomValidity(confirm_password.value != password.value ? "Passwords do not match." : ""); '>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputUsername">Username</label>
                                                    <input type="text" class="form-control" id="inputUsername" name="username" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputDisplayName">Display Name</label>
                                                    <input type="text" class="form-control" id="inputDisplayName" name="display_name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">User Type</label>
                                                    <select class="form-control" id="exampleFormControlSelect1" name="user_type" required>
                                                        <option selected="true" disabled="disabled">--</option>
                                                        <option value="medical-admin">MEDICAL ADMIN</option>
                                                        <option value="system-maintenance">SYSTEM MAINTENANCE</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPassword">Password</label>
                                                    <input type="password" class="form-control" id="inputPassword" name="password"  minlength="8" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="inputPassword2">Confirm Password</label>
                                                    <input type="password" class="form-control" id="inputPassword2" name="confirm_password" minlength="8" required>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary mt-2 mb-2">Create</button>
                                                </div>
                                            </div>
                                            <div class="col-md-6"></div>
                                        </div>
                                    </form>
								</div>
								<!-- end of medicine table -->
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Main Footer -->
			<?php include 'templates/main-footer.php' ?>
			<!-- End Main Footer -->
			
		</div>
	</div>
	
	<?php include 'templates/footer.php' ?>
	<script src="assets/js/plugin/datatables/datatables.min.js"></script>
	<style>
		.text-primary, .text-primary a{
			color: #1c9790 !important;
		}

		.btn-primary, .btn-primary:hover, .btn-primary:focus, .btn-primary:disabled{
			background: #1c9790 !important;
			border-color: #1c9790 !important;
		}

        .text-primary:hover, .text-primary a:hover{
			color: #1c9790 !important;
		}
	</style>
</body>
</html>