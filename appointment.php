<?php include 'server/server.php' ?>
<?php 
	$query = "SELECT * FROM tbl_appointment ORDER BY id DESC";
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
					<div class="row">
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
											<h1>APPOINTMENT RECORD</h1>
										</div>
										
										<div class="card-tools">
											<a href="appointment_add_form.php" class="btn btn-primary mr-1">
												<i class="fa fa-plus mr-2"></i>
												Appointment
											</a>
											<?php if(isset($_SESSION['username']) && $_SESSION['role']!='resident'): ?>
												<button onclick="Export()" class="btn btn-default btn-default">
													<i class="fa fa-download mr-2"></i>
													Export to CSV
												</button>
											<?php endif?>
										</div>
										
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="appointment" class="display table">
											<thead>
												<tr class="text-primary">
													<th scope="col">Resident Name</th>
													<th scope="col">Age</th>
													<th scope="col">Staff In Charge</th>
													<th scope="col">Request Date</th>
													<th scope="col">Appointment type</th>
													<th scope="col">Appointment Date</th>
													<th scope="col">Status</th>
													<?php if(isset($_SESSION['username']) && $_SESSION['role'] !='resident'): ?>
														<th scope="col">Action</th>
													<?php endif ?>
												</tr>
											</thead>
											<tbody>
												<?php if(!empty($appointment)): ?>
													<?php foreach($appointment as $row): ?>
														<tr>
															<td><?= ucwords($row['resident_name']) ?></td>
															<td><?= ucwords($row['age']) ?></td>
															<td>
																<?php if($row['staff_in_charge']=='unassigned'): ?>
																	<span class="badge text-primary" style="width:90px;">Unassigned</span>
																<?php else:?>
																	<?= ucwords($row['staff_in_charge']) ?>
																<?php endif ?>
															</td>
															<td><?= ucwords($row['request_date']) ?></td>
															<td><?= ucwords($row['appointment_type']) ?></td>
															<td>
																<?php if(!$row['appointment_date']): ?>
																	<span class="badge text-primary">No appointment yet</span>
																<?php else:?>
																	<?= ucwords($row['appointment_date']) ?>
																<?php endif ?>
															<td class="text-center">
																<?php if($row['status']=='scheduled'): ?>
																	<span class="badge badge-warning" style="width:90px;">Scheduled</span>
																<?php elseif($row['status']=='active'): ?>
																	<span class="badge badge-primary" style="width:90px;">Active</span>
																<?php else: ?>
																	<span class="badge badge-success" style="width:90px;">Completed</span>
																<?php endif ?>
															</td>
															<?php if(isset($_SESSION['username']) && $_SESSION['role'] !='resident'): ?>
																<td>
																	<?php if($row['status'] !='completed'): ?>
																		<a href="appointment_update_form.php?id=<?= $row['id'] ?>&tbl=tbl_appointment&page=appointment" class="btn btn-link">
																			<i class="fa fa-edit mr-2"></i>Update
																		</a>
																	<?php else: ?>
																		<a href="appointment_detail.php?id=<?= $row['id'] ?>&tbl=tbl_appointment&page=appointment" class="btn btn-link">
																			<i class="fa fa-file-medical-alt mr-2"></i>Details
																		</a>
																	<?php endif ?>
																</td>
															<?php endif ?>
														</tr>
													<?php endforeach ?>
												<?php endif ?>
											</tbody>
										</table>
									</div>
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
	<script src="assets/js/plugin/datatables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            var oTable = $('#appointment').DataTable({
				"order": [[ 4, "desc" ]]
            });
        });

		function Export(){
			// should have policy like 2 weeks retention of records and scope for export to csv
			var conf = confirm("Export appointment to CSV?");
			var stmt = "SELECT * FROM tbl_appointment";
			var tblHeader = 'No,Resident Name,Age,Staff In Charge,Request Date,Concern,Appointment Type,Status,Appointment Date,Remarks';
			var fileName = "appointment";
			if(conf){
				window.open(`export.php?query=${stmt}&tblHeader=${tblHeader}&fileName=${fileName}`, '_blank');
			}
		}
    </script>
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