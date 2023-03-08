<?php include 'server/server.php' ?>
<?php 
	if(isset($_SESSION['role'])){
		if($_SESSION['role'] =='staff'){
			$off_q = "SELECT *,tbl_officials.id as id, tbl_position.id as pos_id,tbl_chairmanship.id as chair_id FROM tbl_officials JOIN tbl_position ON tbl_position.id=tbl_officials.position JOIN tbl_chairmanship ON tbl_chairmanship.id=tbl_officials.chairmanship WHERE `status`='Active' ORDER BY tbl_position.order ASC ";
		}else{
			$off_q = "SELECT *,tbl_officials.id as id, tbl_position.id as pos_id,tbl_chairmanship.id as chair_id FROM tbl_officials JOIN tbl_position ON tbl_position.id=tbl_officials.position JOIN tbl_chairmanship ON tbl_chairmanship.id=tbl_officials.chairmanship ORDER BY tbl_position.order ASC, `status` ASC ";
		}
	}else{
		$off_q = "SELECT *,tbl_officials.id as id, tbl_position.id as pos_id,tbl_chairmanship.id as chair_id FROM tbl_officials JOIN tbl_position ON tbl_position.id=tbl_officials.position JOIN tbl_chairmanship ON tbl_chairmanship.id=tbl_officials.chairmanship WHERE `status`='Active' ORDER BY tbl_position.order ASC ";
	}
	
	$res_o = $conn->query($off_q);

	$official = array();
	while($row = $res_o->fetch_assoc()){
		$official[] = $row; 
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Barangay Info - Masili Health Service System</title>
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
											<h1>BARANGAY INFO</h1>
										</div>
									</div>
								</div>
								<div class="card-body">
                                <iframe
                                    width="100%"
                                    height="790"
                                    style="border:0"
                                    loading="lazy"
                                    allowfullscreen
                                    referrerpolicy="no-referrer-when-downgrade"
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2300.0563774308553!2d121.20115095991318!3d14.181987050701315!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd613926c4267f%3A0x62fd88e8affa6ac1!2sMasili%2C%20Real%2C%20Calamba%2C%20Laguna!5e0!3m2!1sen!2sph!4v1678197920713!5m2!1sen!2sph">
                                </iframe>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			 <!-- Modal -->
			 <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Official</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="model/save_official.php" >
                                <div class="form-group">
                                    <label>Fullname</label>
                                    <input type="text" class="form-control" placeholder="Enter Fullname" name="name" required>
                                </div>
								<div class="form-group">
                                    <label>Chairmanship</label>
                                    <select class="form-control" id="pillSelect" required name="chair">
                                        <option disabled selected>Select Official Chairmanship</option>
                                        <?php foreach($chair as $row): ?>
											<option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
										<?php endforeach ?>
                                    </select>
                                </div>
								<div class="form-group">
                                    <label>Position</label>
                                    <select class="form-control" id="pillSelect" required name="position">
                                        <option disabled selected>Select Official Position</option>
										<?php foreach($position as $row): ?>
											<option value="<?= $row['id'] ?>">Brgy. <?= $row['position'] ?></option>
										<?php endforeach ?>
                                    </select>
                                </div>
								<div class="form-group">
                                    <label>Term Start</label>
                                    <input type="date" class="form-control" name="start" required>
                                </div>
								<div class="form-group">
                                    <label>Term End</label>
                                    <input type="date" class="form-control" name="end" required>
                                </div>
								<div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" id="pillSelect" required name="status">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="pos_id" name="id">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

			<!-- Modal -->
			<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Official</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="model/edit_official.php" >
                                <div class="form-group">
                                    <label>Fullname</label>
                                    <input type="text" class="form-control" id="name" placeholder="Enter Fullname" name="name" required>
                                </div>
								<div class="form-group">
                                    <label>Chairmanship</label>
                                    <select class="form-control" id="chair" required name="chair">
                                        <option disabled selected>Select Official Chairmanship</option>
                                        <?php foreach($chair as $row): ?>
											<option value="<?= $row['id'] ?>"><?= $row['title'] ?></option>
										<?php endforeach ?>
                                    </select>
                                </div>
								<div class="form-group">
                                    <label>Position</label>
                                    <select class="form-control" id="position" required name="position">
                                        <option disabled selected>Select Official Position</option>
										<?php foreach($position as $row): ?>
											<option value="<?= $row['id'] ?>">Brgy. <?= $row['position'] ?></option>
										<?php endforeach ?>
                                    </select>
                                </div>
								<div class="form-group">
                                    <label>Term Start</label>
                                    <input type="date" class="form-control" id="start" name="start" required>
                                </div>
								<div class="form-group">
                                    <label>Term End</label>
                                    <input type="date" class="form-control" id="end" name="end" required>
                                </div>
								<div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" id="status" required name="status">
                                        <option value="Active">Active</option>
                                        <option value="Inactive">Inactive</option>
                                    </select>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="off_id" name="id">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
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
</body>
</html>