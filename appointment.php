<?php include 'server/server.php' ?>
<?php 
	$query = "SELECT * FROM tbl_appointment";
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
	<title>Appointments - Masili Health Service System</title>
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
							<?php include 'templates/loading_screen.php' ?>
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title text-primary">
											<h1>APPOINTMENT</h1>
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
															<td><?= ucwords($row['staff_in_charge']) ?></td>
															<td><?= ucwords($row['request_date']) ?></td>
															<td><?= ucwords($row['appointment_type']) ?></td>
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
																	<a type="button" href="#edit" data-toggle="modal" class="btn btn-link btn-primary" >
																	<i class="fa fa-edit mr-2"></i>Update
																	</a>
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
			
			 <!-- Modal -->
			 <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create an appointment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="model/save_blotter.php" >
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Resident</label>
											<input type="text" class="form-control" placeholder="Enter Resident Name" name="complainant" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Staff In Charge</label>
											<input type="text" class="form-control" placeholder="Enter staff Name" name="respondent" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Age</label>
											<input type="number" class="form-control" placeholder="Enter Age" name="victim" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Type</label>
											<select class="form-control" name="type">
												<option disabled selected>Appointment Type</option>
												<option value="Check up">Check Up</option>
												<option value="Therapy">Therapy</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Location</label>
											<input type="text" class="form-control" placeholder="Enter Location" name="location" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Date</label>
											<input type="date" class="form-control" name="date" value="<?= date('Y-m-d'); ?>" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Time</label>
											<input type="time" class="form-control" name="time" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Status</label>
											<select class="form-control" name="status">
												<option disabled selected>Select Appointment Status</option>
												<option value="Active">Active</option>
												<option value="Settled">Done</option>
												<option value="Scheduled">Scheduled</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Details</label>
									<textarea class="form-control" placeholder="Enter Appointment Details..." name="details" required></textarea>
								</div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

			<!-- Modal -->
			<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Appointment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="model/edit_blotter.php" >
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Resident</label>
											<input type="text" class="form-control" placeholder="Enter Complainant Name" id="complainant" name="complainant" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Staff In Charge</label>
											<input type="text" class="form-control" placeholder="Enter Respondent Name" id="respondent" name="respondent" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Age</label>
											<input type="number" class="form-control" placeholder="Enter age" id="victim" name="victim" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Type</label>
											<select class="form-control" name="type">
												<option disabled selected>Appointment Type</option>
												<option value="Check up">Check Up</option>
												<option value="Therapy">Therapy</option>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Location</label>
											<input type="text" class="form-control" placeholder="Enter Location" id="location" name="location" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Date</label>
											<input type="date" class="form-control" name="date" id="date" required>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label>Time</label>
											<input type="time" class="form-control" name="time" id="time" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label>Status</label>
											<select class="form-control" name="status" id="status">
												<option disabled selected>Select Blotter Status</option>
												<option value="Active">Active</option>
												<option value="Settled">Done</option>
												<option value="Scheduled">Scheduled</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label>Details</label>
									<textarea class="form-control" placeholder="Appointment detail..." id="details" name="details" required></textarea>
								</div>
                            
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="blotter_id" name="id">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<?php if(isset($_SESSION['username'])):?>
                            <button type="submit" class="btn btn-primary">Update</button>
							<?php endif ?>
                        </div>
                        </form>
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
				"order": [[ 4, "asc" ]]
            });

			$("#activeCase").click(function(){
				var textSelected = 'Active';
				oTable.columns(4).search(textSelected).draw();
			});
			$("#settledCase").click(function(){
				var textSelected = 'Settled';
				oTable.columns(4).search(textSelected).draw();
			});
			$("#scheduledCase").click(function(){
				var textSelected = 'Scheduled';
				oTable.columns(4).search(textSelected).draw();
			});
        });
    </script>
</body>
</html>