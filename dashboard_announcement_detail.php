<?php include 'server/server.php' ?>
<?php 

    // announcement
    $id = $_GET['id'];
	$getAnnouncement = "SELECT * FROM tbl_announcement WHERE id = '$id'";
    $announcement = $conn->query($getAnnouncement);

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
				<div class="page-inner">
                    <div class="row">
                        <?php include 'templates/loading_screen.php' ?>
                        <div class="col-md-12 mt-0">
                            <?php foreach($announcement as $row): ?>
                                <div class="card" style="margin-bottom: 15px !important;">
                                <div class="card-header">
									<div class="card-head-row">
										<div class="card-title">
											<h1>
                                            <a href="dashboard.php" class="text-primary">DASHBOARD</a> > <strong class="text-default">DETAILS</strong></h1>
										</div>
									</div>
								</div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <img
                                                    src="assets/img/<?= ucwords($row['image']) ?>"
                                                    alt="announcement-image"
                                                    style="width:100%"
                                                />
                                            </div>
                                            <div class="col-md-7">
                                                <div class="card-body pt-0">
                                                    <h2 class="card-title text-primary" style="font-size: 30px">
                                                        <?= ucwords($row['title']) ?>
                                                    </h2>
                                                    <span class="mt-2 mr-2 badge badge-<?= $row['category'] =='ANNOUNCEMENT'?'success':'warning' ?>" style="font-size: 12px">
                                                        <?= ucwords($row['category']) ?>
                                                    </span>
                                                    <span class="mt-2 mr-2 badge">
                                                        <strong>DATE POSTED: </strong>
                                                        <?= ucwords($row['create_date']) ?>
                                                    </span>
                                                    <hr>
                                                    
                                                    <p class="card-text mt-2" style="font-size: 15px">
                                                        <?= ucwords($row['description']) ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach ?>
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