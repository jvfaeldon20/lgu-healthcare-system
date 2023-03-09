<?php include 'server/server.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Resident - Masili Health Service System</title>
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
							<?php include 'templates/loading_screen.php' ?>
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">
											<h1>
                                            <a href="resident.php" class="text-primary">RESIDENT</a> > <strong class="text-default">CREATE</strong></h1>
										</div>
									</div>
								</div>
								<div class="card-body">
                                    <form method="POST" action="resident_add_record.php">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="first_name">First Name</label>
                                                    <input type="text" class="form-control mb-1" id="first_name" name="first_name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="middle_name">Middle Name</label>
                                                    <input type="text" class="form-control mb-1" id="middle_name" name="middle_name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="last_name">Last Name</label>
                                                    <input type="text" class="form-control mb-1" id="last_name" name="last_name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="age">Age</label>
                                                    <input type="number" class="form-control" id="age" name="age" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Birthdate:</label>
                                                    <input type="date" class="form-control" name="birthdate" id="date" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group">
                                                    <label for="civil_status">Civil Status</label>
                                                    <select class="form-control" id="civil_status" name="civil_status" required>
														<option selected="true" disabled="disabled">--</option>
														<option>SINGLE</option>
														<option>MARRIED</option>
														<option>WIDOWED</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="gender">Gender</label>
                                                    <select class="form-control" id="gender" name="gender" required>
														<option selected="true" disabled="disabled">--</option>
														<option>MALE</option>
														<option>FEMALE</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="purok">Purok</label>
                                                    <select class="form-control" id="purok" name="purok" required>
														<option selected="true" disabled="disabled">--</option>
														<option>PUROK 1</option>
														<option>PUROK 2</option>
														<option>PUROK 3</option>
														<option>PUROK 4</option>
														<option>PUROK 5</option>
														<option>PUROK 6</option>
														<option>PUROK 7</option>
														<option>PUROK 8</option>
														<option>PUROK 9</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="voterstatus">Voterstatus</label>
                                                    <select class="form-control" id="voter" name="voterstatus" required>
														<option selected="true" disabled="disabled">--</option>
														<option>Yes</option>
														<option>No</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary mt-2 mb-2">Create</button>
                                                </div>
                                            </div>
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