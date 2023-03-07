<?php include 'server/server.php' ?>
<?php 
    $id = $_GET['id'];
	$query = "SELECT * FROM tblblotter WHERE id='$id'";
    $result = $conn->query($query);
    $resident = $result->fetch_assoc();

    $query1 = "SELECT * FROM tbl_officials JOIN tbl_position ON tbl_officials.position=tbl_position.id WHERE tbl_position.position NOT IN ('SK Chairrman','Secretary','Treasurer')
                AND `status`='Active' ORDER BY `order` ASC";
    $result1 = $conn->query($query1);
    $officials = array();
	while($row = $result1->fetch_assoc()){
		$officials[] = $row; 
	}

    $c = "SELECT * FROM tbl_officials JOIN tbl_position ON tbl_officials.position=tbl_position.id WHERE tbl_position.position='Captain'";
    $captain = $conn->query($c)->fetch_assoc();
    $s = "SELECT * FROM tbl_officials JOIN tbl_position ON tbl_officials.position=tbl_position.id WHERE tbl_position.position='Secretary'";
    $sec = $conn->query($s)->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Appointment Report -  Barangay Management Systemm</title>
</head>
<body>
<?php include 'templates/loading_screen.php' ?>
	<div class="wrapper">
		<!-- Main Header -->
		<?php include 'templates/main-header.php' ?>
		<!-- End Main Header -->

		<!-- Sidebar -->
		<?php include 'templates/sidebar.php' ?>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white fw-bold">Generate Report</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner">
					<div class="row mt--2">
						<div class="col-md-12">

                            <?php if(isset($_SESSION['message'])): ?>
                                <div class="alert alert-<?php echo $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
                                    <?php echo $_SESSION['message']; ?>
                                </div>
                            <?php unset($_SESSION['message']); ?>
                            <?php endif ?>

                            <div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">Appointment Report</div>
										<div class="card-tools">
											<button class="btn btn-info btn-border btn-round btn-sm" onclick="printDiv('printThis')">
												<i class="fa fa-print"></i>
												Print Report
											</button>
										</div>
									</div>
								</div>
								<div class="card-body m-5" id="printThis">
                                    <div class="d-flex flex-wrap justify-content-center" style="border-bottom:1px solid red">
										<div class="text-center">
                                            <h3 class="mb-0">Republic of the Philippines</h3>
                                            <h3 class="mb-0">Province of <?= ucwords($province) ?></h3>
											<h3 class="mb-0"><?= ucwords($town) ?></h3>
											<h1 class="fw-bold mb-0"><?= ucwords($brgy) ?></i></h2>
                                            <p><i>Mobile No. <?= $number ?></i></p>
										</div>
									</div>
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <div class="text-center p-3" style="border:2px dotted red">
                                                <img src="assets/uploads/<?= $brgy_logo ?>" class="img-fluid" width="200" />
                                                <?php if(!empty($officials)):?>
                                                    <?php foreach($officials as $row): ?>
                                                        <h3 class="mt-3 fw-bold mb-0 text-uppercase"><?= ucwords($row['name']) ?></h3>
                                                        <h5 class="mb-2 text-uppercase">BARANGAY  <?= ucwords($row['position']) ?></h5>
                                                    <?php endforeach ?>
                                                <?php endif ?>

                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="text-center">
                                                <h2 class="mt-4 fw-bold">OFFICE OF THE BARANGAY CAPTAIN</h2>
                                            </div>
                                            <div class="text-center">
                                                <h1 class="mt-4 fw-bold mb-5">Appointment Report</h1>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group row">
                                                        <h3 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Resident:</h3>
                                                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black; margin:0 !important">
                                                            <span class="fw-bold" style="font-size:20px;"><?= ucwords($resident['complainant']) ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <h3 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Age:</h3>
                                                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black">
                                                            <span class="fw-bold" style="font-size:20px"><?= ucwords($resident['victim']) ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <h3 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Location:</h3>
                                                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black">
                                                            <span class="fw-bold" style="font-size:20px"><?= ucwords($resident['location']) ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <h3 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Time:</h3>
                                                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black">
                                                            <span class="fw-bold" style="font-size:20px"><?= date('h:i:s A', strtotime($resident['time'])) ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="form-group row">
                                                        <h3 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Staff:</h3>
                                                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black">
                                                            <span class="fw-bold" style="font-size:20px"><?= ucwords($resident['respondent']) ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <h3 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Type:</h3>
                                                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black">
                                                            <span class="fw-bold" style="font-size:20px"><?= ucwords($resident['type']) ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <h3 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Date:</h3>
                                                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black">
                                                            <span class="fw-bold" style="font-size:20px"><?= date('F d, Y', strtotime($resident['date'])) ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <h3 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Status:</h3>
                                                        <div class="col-lg-8 col-md-8 col-sm-8" style="border-bottom:1px solid black">
                                                            <span class="fw-bold" style="font-size:20px"><?= ucwords($resident['status']) ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="form-group row">
                                                        <h3 class="mt-5 col-lg-4 col-md-4 col-sm-4 mt-sm-2 text-left">Appointment Details:</h3>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 text-left">
                                                        <textarea class="form-control fw-bold" style="font-size:20px" rows="8"><?= ucwords(trim($resident['details'])) ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-12">
                                            <div class="p-3 text-right mr-3">
                                                <h2 class="fw-bold mb-0 text-uppercase"><?= ucwords($captain['name']) ?></h2>
                                                <p class="mr-3">PUNONG BARANGAY</p>
                                            </div>
                                            <div class="p-3 text-left">
                                                <h2 class="fw-bold mb-0 text-uppercase"><?= empty($sec['name']) ? 'Please Create Official with Secretary Position' : ucwords($sec['name']) ?></h2>
                                                <p class="ml-2">BARANGAY SECRETARY</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 d-flex flex-wrap justify-content-end">
                                            <div class="p-3 text-center">
                                                <div class="border mb-3" style="height:150px;width:290px">
                                                    <p class="mt-5 mb-0 pt-5">Right Thumb Mark</p>
                                                </div>
                                                <h2 class="fw-bold mb-0"><?= ucwords($resident['complainant']) ?></h2>
                                                <p>Resident's Signature</p>
                                            </div>
                                        </div>
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
    <script>
            function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</body>
</html>