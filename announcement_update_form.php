<?php include 'server/server.php' ?>
<?php 
    // announcement
    $id = $_GET['id'];
	$getAnnouncement = "SELECT * FROM tbl_announcement WHERE id = '$id'";
    $result = $conn->query($getAnnouncement);

    $announcement = array();
	while($row = $result->fetch_assoc()){
		$announcement[] = $row; 
	}
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
					<div class="row mt--2">
						<div class="col-md-12">
							<?php include 'templates/loading_screen.php' ?>
							<div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title">
											<h1>
                                            <a href="announcement.php" class="text-primary">ANNOUNCEMENT</a> > <strong class="text-default">UPDATE</strong></h1>
										</div>
									</div>
								</div>
								<div class="card-body">
                                    <?php foreach($announcement as $row): ?>
                                        <form method="POST" action="announcement_update_record.php" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <img
                                                            src="assets/img/<?= ucwords($row['image']) ?>"
                                                            alt="announcement-image"
                                                            style="height: 300px; width:auto"
                                                        />
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="file" class="form-control" name="fileToUpload" id="fileToUpload" accept="image/*">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input class="form-control" id="title" name="title" value="<?php echo $row['title']?$row['title']:'NO DATA' ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputStatus">Post Status</label>
                                                        <select class="form-control" id="inputStatus" name="status">
                                                            <option value="1" <?=$row['status'] == '1' ? ' selected="selected"' : '';?>>ACTIVE</option>
                                                            <option value="0" <?=$row['status'] == '0' ? ' selected="selected"' : '';?>>INACTIVE</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputCategory">Category</label>
                                                        <select class="form-control" id="inputCategory" name="category">
                                                            <option value="ANNOUNCEMENT" <?=$row['category'] == 'ANNOUNCEMENT' ? ' selected="selected"' : '';?>>ANNOUNCEMENT</option>
                                                            <option value="REMINDER" <?=$row['category'] == 'REMINDER' ? ' selected="selected"' : '';?>>REMINDER</option>
                                                            <option value="BRGY EVENT" <?=$row['category'] == 'BRGY EVENT' ? ' selected="selected"' : '';?>>BARANGAY EVENT</option>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="description">Description</label>
                                                        <textarea class="form-control" id="description" rows="10" name="description"><?php echo $row['description']?$row['description']:'No Remarks' ?></textarea>
                                                    </div>
                                                    
                                                    
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary mt-2 mb-2 mr-1" name="submit">Update</button>
                                                    </div>
                                                    <input type="hidden" value="<?php echo $id ?>" name="id">
                                                </div>
                                            </div>
                                        </form>
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