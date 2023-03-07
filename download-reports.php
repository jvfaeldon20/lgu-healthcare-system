<?php include 'server/server.php' ?>
<?php
    $query = "SELECT * FROM tblpurok ORDER BY `name`";
    $result = $conn->query($query);

    $purok = array();
	while($row = $result->fetch_assoc()){
		$purok[] = $row; 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Reports - Masili Health Service System</title>
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
                                            <h1>REPORTS</h1>
                                        </div>
									</div>
								</div>
								<div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Purok</th>
                                                    <th scope="col">Details</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(!empty($purok)): ?>
                                                    <?php $no=1; foreach($purok as $row): ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= $row['name'] ?></td>
                                                        <td><?= $row['details'] ?></td>
                                                        <td>
                                                            <div class="form-button-action">
                                                                <a type="button" href="#edit" data-toggle="modal" class="btn btn-link btn-primary" title="Edit Purok" onclick="editPurok(this)" 
                                                                    data-name="<?= $row['name'] ?>" data-details="<?= $row['details'] ?>" data-id="<?= $row['id'] ?>">
                                                                    <i class="fa fa-edit"></i>
                                                                </a>
                                                                <a type="button" data-toggle="tooltip" href="model/remove_purok.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this purok?');" class="btn btn-link btn-danger" data-original-title="Remove">
                                                                    <i class="fa fa-times"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $no++; endforeach ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="4" class="text-center">No Available Data</td>
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
                            <h5 class="modal-title" id="exampleModalLabel">Create Purok</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="model/save_purok.php" >
                                <div class="form-group">
                                    <label>Purok Name</label>
                                    <input type="text" class="form-control" placeholder="Enter Purok Name" name="purok" required>
                                </div>
                                <div class="form-group">
                                    <label>Purok Details</label>
                                    <textarea class="form-control" placeholder="Set Bounderies for each Purok" name="details"></textarea>
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

            <!-- Modal -->
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Purok</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="model/edit_purok.php" >
                                <div class="form-group">
                                    <label>Purok Name</label>
                                    <input type="text" class="form-control" id="purok" placeholder="Enter Purok Name" name="purok" required>
                                </div>
                                <div class="form-group">
                                    <label>Purok Details</label>
                                    <textarea class="form-control" id="details" placeholder="Set Bounderies for each Purok" name="details"></textarea>
                                </div>
                            
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" id="purok_id" name="id">
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