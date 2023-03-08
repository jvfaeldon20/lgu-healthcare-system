<?php include 'server/server.php' ?>
<?php 

    // announcement
	$getAnnouncement = "SELECT * FROM tbl_announcement WHERE status=1";
    $announcement = $conn->query($getAnnouncement);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Announcement - Masili Health Service System</title>
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
                             <!-- action alert -->
                            <?php if(isset($_SESSION['message'])): ?>
                                <div class="alert alert-<?= $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
                                    <?php echo $_SESSION['message']; ?>
                                </div>
                            <?php unset($_SESSION['message']); ?>
                            <?php endif ?>
                            <!-- end of action alert -->
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
                                                        <a href="announcement_update_form.php?id=<?= $row['id'] ?>&tbl=tbl_announcement&page=announcement" class="btn btn-link float-right">
                                                            <i class="fa fa-edit mr-2"></i>Update
                                                        </a>
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
														<a href="announcement_detail.php?id=<?= $row['id'] ?>&tbl=tbl_announcement&page=announcement" class="btn btn-sm btn-primary mt-2">
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
				</div>
			</div>
			
			<!-- Main Footer -->
			<?php include 'templates/main-footer.php' ?>
			<!-- End Main Footer -->
			
		</div>
	</div>
	
	<?php include 'templates/footer.php' ?>
	<script src="assets/js/plugin/datatables/datatables.min.js"></script>
</body>
</html>