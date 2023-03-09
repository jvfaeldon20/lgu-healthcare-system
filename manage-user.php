<?php include 'server/server.php' ?>
<?php 
	$user = $_SESSION['username'];
	$query = "SELECT * FROM tbl_users WHERE (username !='$user' AND username !='resident') ORDER BY `created_at` DESC";
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
	<div class="wrapper">
		<?php include 'templates/main-header.php' ?>
		<?php include 'templates/sidebar.php' ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="row mt--2">
						<div class="col-md-12">
							<!-- action alert -->
							<?php if(isset($_SESSION['message'])): ?>
								<div class="alert alert-<?= $_SESSION['success']; ?> <?= $_SESSION['success']=='danger' ? 'bg-danger text-light' : null ?>" role="alert">
									<?php echo $_SESSION['message']; ?>
								</div>
							<?php unset($_SESSION['message']); ?>
							<?php endif ?>
							<!-- end of action alert -->
							<?php include 'templates/loading_screen.php' ?>
                            <div class="card">
								<div class="card-header">
									<div class="card-head-row">
										<div class="card-title text-primary">
											<h1>MANAGE USER</h1>
										</div>
										<div class="card-tools">
											<a href="manage_user_add_form.php" class="btn btn-primary mr-1">
												<i class="fa fa-plus mr-2"></i>
												User
											</a>
											<button onclick="Export()" class="btn btn-default btn-default">
												<i class="fa fa-download mr-2"></i>
												Export to CSV
											</button>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr class="text-primary">
													<th scope="col">Account Name</th>
													<th scope="col">Username</th>
													<th scope="col">User Type</th>
													<th scope="col">Set Action</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($users as $row): ?>
													<tr>
														<td>
															<div class="avatar avatar-sm">
																<span class="avatar-title rounded-circle border border-white" style="background-color: lightseagreen"><?= ucwords($row['display_name'][0]) ?></span>
															</div>
															<?= $row['display_name'] ?>
														</td>
														<td><?= $row['username'] ?></td>
														<td><?= $row['user_type'] ?></td>
														<td>
															<div class="input-group mr-1" style="width:60%">
																<select class="form-control" id="formGroupDefaultSelect">
																	<option value="1" <?=$row['status'] == 1 ? 'selected="selected"' : '';?>">ACTIVE</option>
																	<option value="0" <?=$row['status'] == 0 ? 'selected="selected"' : '';?>">INACTIVE</option>
																</select>
																<div class="input-group-append">
																	<a href="manage_user_update_status.php?id=<?= $row['id'] ?>&status=<?= $row['status']==1?0:1 ?>" onclick="return confirm('Do you want to changes?');" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Update user status">
																	<i class="fa fa-edit"></i>
																	</a>
																</div>
															</div>
														</td>
													</tr>
												<?php endforeach ?>
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
	<script>
		function Export(){
			var conf = confirm("Export users to CSV?");
			var stmt = "SELECT username, user_type, status FROM tbl_users";
			var tblHeader = 'Username,User Type,Status';
			var fileName = "users";
			if(conf){
				window.open(`export.php?query=${stmt}&tblHeader=${tblHeader}&fileName=${fileName}`, '_blank');
			}
		}
	</script>
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