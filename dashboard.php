<?php include 'server/server.php' ?>
<?php 

	$query = "SELECT * FROM tblresident WHERE resident_type=1";
    $result = $conn->query($query);
	$total = $result->num_rows;

	$query1 = "SELECT * FROM tblresident WHERE gender='Male' AND resident_type=1";
    $result1 = $conn->query($query1);
	$male = $result1->num_rows;

	$query2 = "SELECT * FROM tblresident WHERE gender='Female' AND resident_type=1";
    $result2 = $conn->query($query2);
	$female = $result2->num_rows;

	$query3 = "SELECT * FROM tblresident WHERE voterstatus='Yes' AND resident_type=1";
    $result3 = $conn->query($query3);
	$totalvoters = $result3->num_rows;

	$query4 = "SELECT * FROM tblresident WHERE voterstatus='No' AND resident_type=1";
	$non = $conn->query($query4)->num_rows;

	$query5 = "SELECT * FROM tblpurok";
	$purok = $conn->query($query5)->num_rows;

	$query6 = "SELECT * FROM tblprecinct";
	$precinct = $conn->query($query6)->num_rows;

	$query7 = "SELECT * FROM tblblotter";
	$blotter = $conn->query($query7)->num_rows;

	
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Dashboard -  Barangay Healthcare System</title>
</head>
<body>
	<?php include 'templates/loading_screen.php' ?>
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
							<div class="col-md-4">
								<div class="card card-stats card-primary card-round">
									<div class="card-body">
										<div class="row">
											<div class="col-3">
												<div class="icon-big text-center">
													<i class="flaticon-users"></i>
												</div>
											</div>
											<div class="col-3 col-stats">
											</div>
											<div class="col-6 col-stats">
												<div class="numbers mt-4">
													<h2 class="fw-bold text-uppercase">Population</h2>
													<h3 class="fw-bold text-uppercase"><?= number_format($total) ?></h3>
												</div>
											</div>
										</div>
									</div>
									<div class="card-body">
										<a href="resident_info.php?state=all" class="card-link text-light">Total Population </a>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card card-stats card-secondary card-round">
									<div class="card-body">
										<div class="row">
											<div class="col-3">
												<div class="icon-big text-center">
													<i class="flaticon-user"></i>
												</div>
											</div>
											<div class="col-3 col-stats">
											</div>
											<div class="col-6 col-stats">
												<div class="numbers mt-4">
													<h2 class="fw-bold text-uppercase">Male</h2>
													<h3 class="fw-bold"><?= number_format($male) ?></h3>
												</div>
											</div>
										</div>
									</div>
									<div class="card-body">
										<a href="resident_info.php?state=male" class="card-link text-light">Total Male </a>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card card-stats card-warning card-round">
									<div class="card-body">
										<div class="row">
											<div class="col-3">
												<div class="icon-big text-center">
													<i class="icon-user-female"></i>
												</div>
											</div>
											<div class="col-3 col-stats">
											</div>
											<div class="col-6 col-stats">
												<div class="numbers mt-4">
													<h2 class="fw-bold text-uppercase">Female</h2>
													<h3 class="fw-bold text-uppercase"><?= number_format($female) ?></h3>
												</div>
											</div>
										</div>
									</div>
									<div class="card-body">
										<a href="resident_info.php?state=female" class="card-link text-light">Total Female </a>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-4">
								<div class="card card-stats card-success card-round">
									<div class="card-body">
										<div class="row">
											<div class="col-3">
												<div class="icon-big text-center">
													<i class="fas fa-fingerprint"></i>
												</div>
											
											
											</div>
											<div class="col-3 col-stats">
											</div>
											<div class="col-6 col-stats">
												<div class="numbers mt-4">
													<h2 class="fw-bold text-uppercase">Purok</h2>
													<h3 class="fw-bold text-uppercase"><?= number_format($purok) ?></h3>
												</div>
											</div>
										</div>
									</div>
									<div class="card-body">
										<a href="purok_info.php?state=purok" class="card-link text-light">Purok Information</a>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card card-stats card-round card-danger">
									<div class="card-body">
										<div class="row">
											<div class="col-3">
												<div class="icon-big text-center">
													<i class="icon-layers"></i>
												</div>
											</div>
											<div class="col-3 col-stats">
											</div>
											<div class="col-6 col-stats">
												<div class="numbers mt-4">
													<h2 class="fw-bold text-uppercase">Appointment</h2>
													<h3 class="fw-bold text-uppercase"><?= number_format($blotter) ?></h3>
												</div>
											</div>
										</div>
									</div>
									<div class="card-body">
										<a href="appointment.php" class="card-link text-light">Appointment Information</a>
									</div>
								</div>
							
						</div>				
	
					<?php endif ?>
					<!-- end of analytics -->


					<!-- announcement -->
					<?php if(isset($_SESSION['username']) && ($_SESSION['role'] =='resident' || $_SESSION['role'] =='medical-admin')):?>
						<div class="row">
							<div class="col-md-12">
								<div class="card">
									<div class="card-header">
										<div class="card-head-row">
											<div class="card-title">
												<h1>ANNOUNCEMENT</h1>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col-md-3">
												<img
													src="http://via.placeholder.com/200x150"
													alt="Trendy Pants and Shoes"
													style="height:200px; width:100%"
												/>
											</div>
											<div class="col-md-9">
												<div class="card-body">
													<h5 class="card-title text-primary">Card title</h5>
													<p class="card-text">
														This is a wider card with supporting text below as a natural lead-in to
														additional content. This content is a little bit longer.

														This is a wider card with supporting text below as a natural lead-in to
														additional content. This content is a little bit longer.
													</p>
													<p class="card-text">
														<small class="text-muted">Last updated 3 mins ago</small><br>
														<a href="#" class="btn btn-sm btn-primary mt-2">Read more</a>
													</p>
												</div>
											</div>
										</div>
										<hr>
										<div class="row">
											<div class="col-md-3">
												<img
													src="http://via.placeholder.com/200x150"
													alt="Trendy Pants and Shoes"
													style="height:200px; width:100%"
												/>
											</div>
											<div class="col-md-9">
												<div class="card-body">
													<h5 class="card-title text-primary">Card title</h5>
													<p class="card-text">
														This is a wider card with supporting text below as a natural lead-in to
														additional content. This content is a little bit longer.

														This is a wider card with supporting text below as a natural lead-in to
														additional content. This content is a little bit longer.
													</p>
													<p class="card-text">
														<small class="text-muted">Last updated 3 mins ago</small><br>
														<a href="#" class="btn btn-sm btn-primary mt-2">Read more</a>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
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