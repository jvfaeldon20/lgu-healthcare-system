<?php include 'server/server.php' ?>
<?php 
	if(isset($_SESSION['role'])){
		if($_SESSION['role'] =='staff'){
			$off_q = "SELECT *,tblofficials.id as id, tblposition.id as pos_id,tblchairmanship.id as chair_id FROM tblofficials JOIN tblposition ON tblposition.id=tblofficials.position JOIN tblchairmanship ON tblchairmanship.id=tblofficials.chairmanship WHERE `status`='Active' ORDER BY tblposition.order ASC ";
		}else{
			$off_q = "SELECT *,tblofficials.id as id, tblposition.id as pos_id,tblchairmanship.id as chair_id FROM tblofficials JOIN tblposition ON tblposition.id=tblofficials.position JOIN tblchairmanship ON tblchairmanship.id=tblofficials.chairmanship ORDER BY tblposition.order ASC, `status` ASC ";
		}
	}else{
		$off_q = "SELECT *,tblofficials.id as id, tblposition.id as pos_id,tblchairmanship.id as chair_id FROM tblofficials JOIN tblposition ON tblposition.id=tblofficials.position JOIN tblchairmanship ON tblchairmanship.id=tblofficials.chairmanship WHERE `status`='Active' ORDER BY tblposition.order ASC ";
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
	<title>Brg Officials and Staff -  Barangay Management System</title>
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
											<h1>STAFF AND OFFICIALS</h1>
										</div>
										<?php if($_SESSION['role']=='administrator'):?>
											<div class="card-tools">
												<a href="#add" data-toggle="modal" class="btn btn-info btn-border btn-round btn-sm">
													<i class="fa fa-plus"></i>
													Official
												</a>
											</div>
										<?php endif?>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped">
											<thead>
												<tr class="text-primary">
													<th scope="col">Fullname</th>
													<th scope="col">Chairmanship</th>
													<th scope="col">Position</th>
													<?php if(isset($_SESSION['username'])):?>
														<?php if($_SESSION['role']=='administrator'):?>
															<th>Status</th>
															<th>Action</th>
														<?php endif ?>
														
													<?php endif?>
												</tr>
											</thead>
											<tbody>
												<?php if(!empty($official)): ?>
													<?php foreach($official as $row): ?>
														<tr>
															<td class="text-uppercase"><?= $row['name'] ?></td>
															<td><?= $row['title'] ?></td>
															<td><?= $row['position'] ?></td>
															<?php if(isset($_SESSION['username'])):?>
																<?php if($_SESSION['role']=='administrator'):?>
																	<td><?= $row['status']=='Active' ? '<span class="badge badge-primary">Active</span>' :'<span class="badge badge-danger">Inactive</span>' ?></td>
																<?php endif ?>
																<?php if($_SESSION['role']=='administrator'):?>
																<td>
																	<a type="button" href="#edit" data-toggle="modal" class="btn btn-link btn-primary" 
																		title="Edit Position" onclick="editOfficial(this)" data-id="<?= $row['id'] ?>" data-name="<?= $row['name'] ?>" 
																		data-chair="<?= $row['chair_id'] ?>" data-pos="<?= $row['pos_id'] ?>" data-start="<?= $row['termstart'] ?>" 
																		data-end="<?= $row['termend'] ?>" data-status="<?= $row['status'] ?>" >
																		<i class="fa fa-edit"></i>
																	</a>
																	<?php if($_SESSION['role']=='administrator'):?>
																	<a type="button" data-toggle="tooltip" href="model/remove_official.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this official?');" class="btn btn-link btn-danger" data-original-title="Remove">
																		<i class="fa fa-times"></i>
																	</a>
																	<?php endif ?>
																</td>
																<?php endif ?>
															<?php endif?>
														</tr>
													<?php endforeach ?>
												<?php else: ?>
													<tr>
														<td colspan="3" class="text-center">No Available Data</td>
													</tr>
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