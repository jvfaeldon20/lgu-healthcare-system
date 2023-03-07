<?php include 'server/server.php' ?>
<?php 
	$user = $_SESSION['username'];
	$query = "SELECT * FROM tbl_users WHERE NOT username='$user' ORDER BY `created_at` DESC";
    $result = $conn->query($query);

    $users = array();
	while($row = $result->fetch_assoc()){
		$users[] = $row; 
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Manage User - Masili Health Service System</title>
</head>
<body>
<?php include 'templates/loading_screen.php' ?>
	<div class="wrapper">
		<?php include 'templates/main-header.php' ?>
		<?php include 'templates/sidebar.php' ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row mt--2">
						<div class="col-md-12">
                            <div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title text-primary">
											<h1>MANAGE USER</h1>
										</div>
										<div class="card-tools">
											<a href="#add" data-toggle="modal" class="btn btn-info btn-border btn-round btn-sm">
												<i class="fa fa-plus"></i>
												User
											</a>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-striped ">
											<thead>
												<tr class="text-primary">
													<th scope="col">No.</th>
													<th scope="col">Username</th>
													<th scope="col">User Type</th>
													<th scope="col">Created At</th>
													<th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>
												<?php if(!empty($users)): ?>
													<?php $no=1; foreach($users as $row): ?>
													<tr>
														<td><?= $no ?></td>
														<td>
															<div class="avatar avatar-xs">
                                                                <img src="<?= preg_match('/data:image/i', $row['avatar']) ? $row['avatar'] : 'assets/uploads/avatar/'.$row['avatar'] ?>" alt="User Profile" class="avatar-img rounded-circle">
                                                            </div>
                                                            <?= ucwords($row['username']) ?>
														</td>
														<td><?= $row['user_type'] ?></td>
														<td><?= $row['created_at'] ?></td>
														<td>
															<div class="form-button-action">
																<a type="button" data-toggle="tooltip" href="model/remove_user.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this user?');" class="btn btn-link btn-danger" data-original-title="Remove">
																	<i class="fa fa-times"></i>
																</a>
															</div>
														</td>
														
													</tr>
													<?php $no++; endforeach ?>
												<?php else: ?>
													<tr>
														<td colspan="5" class="text-center">No Available Data</td>
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
                            <h5 class="modal-title" id="exampleModalLabel">Create System User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="model/save_user.php" enctype="multipart/form-data">
							<input type="hidden" name="size" value="1000000">
								<div class="text-center">
                                    <div id="my_camera" style="height: 250;" class="text-center">
                                        <img src="assets/img/person.png" alt="..." class="img img-fluid" width="250" >
                                    </div>
                                    <div class="form-group d-flex justify-content-center">
                                        <button type="button" class="btn btn-danger btn-sm mr-2" id="open_cam">Open Camera</button>
                                        <button type="button" class="btn btn-secondary btn-sm ml-2" onclick="save_photo()">Capture</button>   
                                    </div>
                                    <div id="profileImage">
                                        <input type="hidden" name="profileimg">
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="img" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="Enter Username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" placeholder="Enter Password" name="pass" required>
                                </div>
                                <div class="form-group">
                                    <label>User Type</label>
                                    <select class="form-control" id="pillSelect" required name="user_type">
                                        <option disabled selected>Select User Type</option>
                                        <option value="administrator">Administrator</option>
										<option value="resident">Resident</option>
                                    </select>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
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