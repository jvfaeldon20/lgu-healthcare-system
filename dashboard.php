<?php include 'server/server.php' ?>
<?php 
	// announcement
	$getAnnouncement = "SELECT * FROM tbl_announcement WHERE status=1 ORDER BY id DESC";
    $announcement = $conn->query($getAnnouncement);
	
	// total residents
	$stmtResidentTotal 	= "SELECT COUNT(*) AS count FROM tblresident";
    $resResidentTotal 	= $conn->query($stmtResidentTotal);
	$totalResident = $resResidentTotal->fetch_assoc();

	// total female
	$stmtFemaleResidentTotal 	= "SELECT COUNT(*) AS count FROM tblresident WHERE gender='Female'";
    $resFemaleResidentTotal 	= $conn->query($stmtFemaleResidentTotal);
	$totalFemaleResident = $resFemaleResidentTotal->fetch_assoc();

	// total male
	$stmtMaleResidentTotal 	= "SELECT COUNT(*) AS count FROM tblresident WHERE gender='Male'";
    $resMaleResidentTotal 	= $conn->query($stmtMaleResidentTotal);
	$totalMaleResident = $resMaleResidentTotal->fetch_assoc();

	// total medicine available
	$stmtMedinceAvailableTotal 	= "SELECT SUM(quantity) AS med_count FROM tbl_medicine";
    $resMedicineAvailableTotal 	= $conn->query($stmtMedinceAvailableTotal);
	$totalMedicineAvailable = $resMedicineAvailableTotal->fetch_assoc();

	// total medical supply available
	$stmtMedicalSupplyAvailable 	= "SELECT SUM(quantity) AS supply_count FROM tbl_medical_supply";
    $resMedicalSupplyAvailable 	= $conn->query($stmtMedicalSupplyAvailable);
	$totalMedicalSupplyAvailable = $resMedicalSupplyAvailable->fetch_assoc();

	// total appointments today
	$date_today 			= date("Y-m-d");
	$stmtAppointmentsToday 	= "SELECT COUNT(*) AS total_appointment FROM tbl_appointment WHERE appointment_date = '$date_today'";
    $resAppointmentsToday 	= $conn->query($stmtAppointmentsToday);
	$totalAppointmentsToday = $resAppointmentsToday->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Dashboard - Masili Health Service System</title>
</head>
<body>
	<div class="wrapper">
		<?php include 'templates/main-header.php' ?>
		<?php include 'templates/sidebar.php' ?>
		
		<div class="main-panel">
			<div class="content">
				<div class="page-inner mt--2">
					
					<!-- login alert -->
					<?php if(isset($_SESSION['message'])): ?>
						<div class="alert alert-<?= $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
							<?php echo $_SESSION['message']; ?>
						</div>
					<?php unset($_SESSION['message']); ?>
					<?php endif ?>
					<!-- end of login alert -->
					
					
					<!-- analytics -->
					<?php if(isset($_SESSION['username']) && $_SESSION['role'] =='system-maintenance'):?>
						<div class="row">
							<div class="d-flex p-3 flex-row ">
								<div class="card text-center mr-3 " style="width: 15rem;">
									<div class="card-header card-success">
										<span style="font-size: 65px; font-weight: bold;"><?php echo $totalResident['count']?$totalResident['count']:0 ?></span>
									</div>
									<div class="card-body">
										<h5 class="card-title">
											<strong>RESIDENTS</strong>
										</h5>
										<p class="card-text">Total no. of residents in the barangay.</p>
										<a href="resident.php" class="btn btn-success btn-sm">View Details</a>
									</div>
								</div>
								<div class="card text-center mr-3" style="width: 15rem;">
									<div class="card-header card-primary">
										<span style="font-size: 65px; font-weight: bold;"><?php echo $totalMaleResident['count']?$totalMaleResident['count']:0 ?></span>
									</div>
									<div class="card-body">
										<h5 class="card-title">
											<strong>MALE</strong>
										</h5>
										<p class="card-text">Total male residents in the barangay.</p>
										<a href="resident.php" class="btn btn-primary btn-sm">View Details</a>
									</div>
								</div>
								<div class="card text-center mr-3" style="width: 15rem;">
									<div class="card-header card-danger">
										<span style="font-size: 65px; font-weight: bold;"><?php echo $totalFemaleResident['count']?$totalFemaleResident['count']:0 ?></span>
									</div>
									<div class="card-body">
										<h5 class="card-title">
											<strong>FEMALE</strong>
										</h5>
										<p class="card-text">Total female residents in the barangay.</p>
										<a href="resident.php" class="btn btn-danger btn-sm">View Details</a>
									</div>
								</div>
								<div class="card text-center mr-3" style="width: 15rem;">
									<div class="card-header card-info">
										<span style="font-size: 65px; font-weight: bold;"><?php echo $totalMedicineAvailable['med_count']?$totalMedicineAvailable['med_count']:0 ?></span>
									</div>
									<div class="card-body">
										<h5 class="card-title">
											<strong>MEDICINE</strong>
										</h5>
										<p class="card-text">Total no. of medicines available in the barangay.</p>
										<a href="medicine.php" class="btn btn-info btn-sm">View Details</a>
									</div>
								</div>
								<div class="card text-center mr-3" style="width: 15rem;">
									<div class="card-header card-warning">
										<span style="font-size: 65px; font-weight: bold;"><?php echo $totalMedicalSupplyAvailable['supply_count']>0?$totalMedicalSupplyAvailable['supply_count']:0 ?></span>
									</div>
									<div class="card-body">
										<h5 class="card-title text-default">
											<strong>MEDICAL SUPPLY</strong>
										</h5>
										<p class="card-text">Total no. of consumables available in the barangay.</p>
										<a href="supplies.php" class="btn btn-warning btn-sm">View Details</a>
									</div>
								</div>
								<div class="card text-center mr-3" style="width: 15rem;">
									<div class="card-header card-default">
										<span style="font-size: 65px; font-weight: bold;"><?php echo $totalAppointmentsToday['total_appointment']>0?$totalAppointmentsToday['total_appointment']:0 ?></span>
									</div>
									<div class="card-body">
										<h5 class="card-title text-default">
											<strong>APPOINTMENTS</strong>
										</h5>
										<p class="card-text">Total no. of appointments today in the barangay.</p>
										<a href="appointment.php" class="btn btn-warning btn-sm">View Details</a>
									</div>
								</div>
							</div>
						</div>
					<?php endif ?>
					<!-- end of analytics -->


					<!-- announcement -->
					<?php if(isset($_SESSION['username']) && ($_SESSION['role'] =='resident' || $_SESSION['role'] =='medical-admin')):?>
						<div class="row">
						<?php include 'templates/loading_screen.php' ?>
                        <div class="col-md-12 mt-0">
                            <?php foreach($announcement as $row): ?>
                                <div class="card" style="margin-bottom: 15px !important;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <img
                                                    src="assets/img/<?= ucwords($row['image']) ?>"
                                                    alt="announcement-image"
                                                    style="height:200px; width:100%"
                                                />
                                            </div>
                                            <div class="col-md-9">
                                                <div class="card-body pt-0">
                                                    <h5 class="card-title text-primary">
                                                        <?= ucwords($row['title']) ?>
                                                    </h5>
                                                    <span class="text-<?= $row['category'] =='ANNOUNCEMENT'?'success':'warning' ?>"><?= ucwords($row['category']) ?></span>
                                                    
                                                    <p class="card-text">
													<?= ucwords(substr($row['description'],0,200).'..') ?>
                                                    </p>
                                                    <p class="card-text">
                                                        <small class="text-muted">
															<strong>Date Posted: </strong>
															<span class="text-primary">
																<?= ucwords($row['create_date']) ?>
															</span>
														</small><br>
														<a href="dashboard_announcement_detail.php?id=<?= $row['id'] ?>&tbl=tbl_announcement&page=announcement" class="btn btn-sm btn-primary mt-2">
															Read more
															<i class="fas fa-solid fa-angle-right ml-2"></i>
														</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
						</div>
					<?php endif ?>
					<!-- end of announcement -->


				</div>
			</div>
			<!-- Main Footer -->
			<?php include 'templates/main-footer.php' ?>
			<!-- End Main Footer -->
		</div>
		
	</div>
	<?php include 'templates/footer.php' ?>
</body>
</html>