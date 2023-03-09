<?php include 'server/server.php' ?>
<?php 
	$query = "SHOW TABLES FROM bis";
    $result = $conn->query($query);

    $tables = array();
	while($row = $result->fetch_assoc()){
		$tables[] = $row; 
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Manage Backup - Masili Health Service System</title>
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
										<div class="card-title text-primary">
											<h1>MANAGE BACKUP</h1>
										</div>
									</div>
								</div>
								<div class="card-body">
                                    <form method="POST" action="manage_backup_exec.php">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="tables">Select Back-up data</label>
                                                    <div class="input-group mr-1">
                                                        <select class="form-control" id="tables" name="backup_data" required>
                                                            <option selected="selected" disabled="disabled" value="">--</option>
                                                            <option value="bis">bis_db</option>
                                                            <?php foreach($tables as $row): ?>
                                                                <option value='<?= $row['Tables_in_bis'] ?>'><?= $row['Tables_in_bis'] ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                        <div class="input-group-append">
                                                            <input type="submit" class="btn btn-primary " value="Start backup">
                                                        </div>
														<!-- <span class="loader loader-info ml-2 mt-2 <?= $_SESSION['success']; ?>"></span> -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
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