<?php include 'server/server.php' ?>
<?php 
    $id = $_GET["id"];
	$query = "SELECT * FROM tbl_appointment WHERE id='$id'";
    $result = $conn->query($query);

    $appointment = array();
	while($row = $result->fetch_assoc()){
		$appointment[] = $row; 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Appointment - Masili Health Service System</title>
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
                                            <a href="appointment.php" class="text-primary">APPOINTMENT</a> > <strong class="text-default">DETAILS</strong></h1>
										</div>
									</div>
								</div>
								<div class="card-body">
                                    <?php foreach($appointment as $row): ?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Status: 
                                                        <strong class="text-primary ml-2">
                                                            <?php if($row['status']=='scheduled'): ?>
                                                                <span class="badge badge-warning" style="width:90px;">Scheduled</span>
                                                            <?php elseif($row['status']=='active'): ?>
                                                                <span class="badge badge-primary" style="width:90px;">Active</span>
                                                            <?php else: ?>
                                                                <span class="badge badge-success" style="width:90px;">Completed</span>
                                                            <?php endif ?>
                                                        </strong>
                                                    </label><br>
                                                    <label>Appointment Type: 
                                                        <strong class="text-primary"><?php echo $row['appointment_type'] ?></strong>
                                                    </label><br>
                                                    <label>Resident Name:
                                                        <strong class="text-primary"><?php echo $row['resident_name']." | ".$row['age'] ?></strong>
                                                    </label><br>
                                                    <label>Concern:<br>
                                                        <strong class="text-primary"><?php echo $row['concern']?$row['concern']: "N/A" ?></strong>
                                                    </label>
                                                    <br>
                                                    <label>Last Appointment Date:<br>
                                                        <strong class="text-primary"><?php echo $row['appointment_date'] ?></strong>
                                                    </label><br>
                                                    <label>Remarks:<br>
                                                        <strong class="text-primary"><?php echo $row['remarks']?$row['remarks']: "No Remarks" ?></strong>
                                                    </label>
                                                </div>
                                                <div class="form-group">
                                                    <a href="appointment.php" class="btn btn-primary">
                                                        Back
                                                    </a>
                                                </div>
                                                <input type="hidden" value="<?php echo $id ?>" name="id">
                                            </div>
                                            <div class="col-md-6"></div>
                                        </div>
                                    <?php endforeach ?>
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