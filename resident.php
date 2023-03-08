<?php include 'server/server.php' ?>
<?php 
	$query = "SELECT * FROM tblresident";
    $result = $conn->query($query);

    $resident = array();
	while($row = $result->fetch_assoc()){
		$resident[] = $row; 
	}

    $query1 = "SELECT * FROM tblpurok ORDER BY `name`";
    $result1 = $conn->query($query1);

    $purok = array();
	while($row = $result1->fetch_assoc()){
		$purok[] = $row; 
	}
?>
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
										<div class="card-title text-primary">
											<h1>RESIDENTS</h1>
										</div>

                                        <div class="card-tools">
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
										<table id="tblResident" class="display table">
											<thead>
												<tr class="text-primary">
													<th scope="col">Resident Name</th>
													<th scope="col">Birthdate</th>
													<th scope="col">Age</th>
													<th scope="col">Civil Status</th>
                                                    <th scope="col">Gender</th>
													<th scope="col">Purok</th>
													<th scope="col">isVoter</th>
												</tr>
											</thead>
											<tbody>
												<?php if(!empty($resident)): ?>
													<?php $no=1; foreach($resident as $row): ?>
                                                        <tr>
                                                            <td>
                                                                <div class="avatar avatar-sm">
                                                                    <span class="avatar-title rounded-circle border border-white" style="background-color: lightseagreen"><?= ucwords(strtoupper($row['lastname'][0].$row['firstname'][0])) ?></span>
                                                                </div>
                                                                <?= ucwords(strtoupper($row['lastname'].', '.$row['firstname'].' '.$row['middlename'])) ?>
                                                            </td>
                                                            <td><?= $row['birthdate'] ?></td>
                                                            <td><?= $row['age'] ?></td>
                                                            <td><?= $row['civilstatus'] ?></td>
                                                            <td><?= $row['gender'] ?></td>
                                                            <td><?= $row['purok'] ?></td>
                                                            <td><?= $row['voterstatus'] ?></td>
                                                        </tr>
													<?php $no++; endforeach ?>
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
            $('#tblResident').DataTable();
        });

        function Export(){
			// should have policy like 2 weeks retention of records and scope for export to csv
			var conf = confirm("Export resident to CSV?");
			var stmt = "SELECT lastname,firstname,middlename,birthdate,age,civilstatus, gender, purok,voterstatus FROM tblresident";
			var tblHeader = 'Last name,First name,Middle name,Birthdate,Age, Civil Status,Gender,Purok,Voter Status';
			var fileName = "resident";
			if(conf){
				window.open(`export.php?query=${stmt}&tblHeader=${tblHeader}&fileName=${fileName}`, '_blank');
			}
		}
    </script>
</body>
</html>