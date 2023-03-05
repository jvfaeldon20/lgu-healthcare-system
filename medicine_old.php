<?php include 'server/server.php' ?>
<?php 
	$query = "SELECT * FROM medicine";
    $result = $conn->query($query);

    $medicine = array();
	while($row = $result->fetch_assoc()){
		$medicine[] = $row; 
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Medicine Information -  Barangay Management System</title>
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
								<h2 class="text-white fw-bold">Medicine</h2>
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
										<div class="card-title">Medicine Inventory</div>
                                        <?php if(isset($_SESSION['username']) && $_SESSION['role'] =='administrator'):?>
										<div class="card-tools">
											<a href="#add" data-toggle="modal" class="btn btn-info btn-border btn-round btn-sm">
												<i class="fa fa-plus"></i>
												Medicine
											</a>
                                            <a href="model/export_resident_csv.php" class="btn btn-danger btn-border btn-round btn-sm">
												<i class="fa fa-file"></i>
												Export CSV
											</a>
										</div>
                                        <?php endif ?>
									</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="residenttable" class="display table table-striped">
											<thead>
												<tr>
                                                <?php if(isset($_SESSION['username'])):?>
                                                        <?php if($_SESSION['role']=='administrator'):?>
													<th scope="col">Medicine type</th>
                                                    <th scope="col">Medicine</th>
													<th scope="col">Availability</th>
													<th scope="col">Date stocked</th>
													<th scope="col">Expiration Date</th>
													<th scope="col">Instock</th>
                                                    <th scope="col">Action</th>
                                                    <?php endif ?>
                                                    <?php endif ?>
                                            <?php if(isset($_SESSION['username'])):?>
                                                        <?php if($_SESSION['role']=='resident'):?>
                                                            <th scope="col">Available Medicine</th>
                                                            <th scope="col">Medicine Type</th>
                                                    <?php endif ?>
                                                    <?php endif ?>
												</tr>
											</thead>
											<tbody>
												<?php if(!empty($medicine)): ?>
													<?php $no=1; foreach($medicine as $row): ?>
													<tr>
                                                    <?php if(isset($_SESSION['username'])):?>
                                                        <?php if($_SESSION['role']=='administrator'):?>
                                                        <td><?= $row['medtype'] ?></td>
                                                        <td><?= $row['medname'] ?></td>
														<td><?= $row['avail'] ?></td>
														<td><?= $row['date1'] ?></td>
														<td><?= $row['date2'] ?></td>
                                                        <td><?= $row['stock'] ?></td>
                                                        

                                                    <?php endif ?>
                                                    <?php endif ?>

                                                    <?php if(isset($_SESSION['username'])):?>
                                                        <?php if($_SESSION['role']=='resident'):?>
                                                    <td><?= $row['medname'] ?></td>
                                                    <td><?= $row['medtype'] ?></td>
                                                    <?php endif ?>
                                                    <?php endif ?>


                                                        <?php if(isset($_SESSION['username'])):?>
                                                        <?php if(isset($_SESSION['username']) && $_SESSION['role'] =='administrator'):?>
														<td>
															<div class="form-button-action">
                                                                
                                                                <?php if(isset($_SESSION['username']) && $_SESSION['role']=='administrator'):?>
																
                                                                <a type="button" data-toggle="tooltip" href="model/remove_medicine.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-link btn-danger" data-original-title="Remove">
																	<i class="fa fa-times"></i>
																</a>
                                                                <?php endif ?>
															</div>
														</td>
                                                        <?php endif ?>
                                                        <?php endif ?>
														
													</tr>
													<?php $no++; endforeach ?>
												<?php endif ?>
											</tbody>
											<tfoot>
                                            <tr>
                                            <?php if(isset($_SESSION['username'])):?>
                                                        <?php if($_SESSION['role']=='administrator'):?>
													<th scope="col">Medicine type</th>
                                                    <th scope="col">Medicine</th>
													<th scope="col">Availability</th>
													<th scope="col">Date stocked</th>
													<th scope="col">Expiration Date</th>
													<th scope="col">Instock</th>
                                                    <th scope="col">Action</th>
                                                    <?php endif ?>
                                                    <?php endif ?>
                                            <?php if(isset($_SESSION['username'])):?>
                                                        <?php if($_SESSION['role']=='resident'):?>
                                                            <th scope="col">Available Medicine</th>
                                                            <th scope="col">Medicine Type</th>
                                                    <?php endif ?>
                                                    <?php endif ?>
												</tr>
											</tfoot>
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
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Medicine</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="model/save_medicine.php" enctype="multipart/form-data">
                            <input type="hidden" name="size" value="1000000">
                            <div class="row">
                                
                                    
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Medicine Type</label>
                                                <input type="text" class="form-control" placeholder="Medicine Type" name="medtype" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Medicine name</label>
                                                <input type="text" class="form-control" placeholder="Medicine name" name="medname" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Availability</label>
                                                <select class="form-control" name="avail">
                                                    <option disabled selected>Select Availability</option>
                                                    <option value=" Available">Available</option>
                                                    <option value="Not Available">Not Available</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Date Stocked</label>
                                                <input type="date" class="form-control" placeholder="Enter Alias" name="date1">
                                            </div>
                                        </div>
                                       
                                        
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Expiry Date</label>
                                                <input type="date" class="form-control" placeholder="Enter Alias" name="date2">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>In Stock</label>
                                                <input type="number" class="form-control" placeholder="Qty" min="1" name="stock">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                   
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="model/edit_medicine.php" enctype="multipart/form-data">
                            <input type="hidden" name="size" value="1000000">
                            <div class="row">

                                    <div class="col-md-8">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Medicine Type</label>
                                                <input type="text" class="form-control" placeholder="Medicine Type" name="medtype" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Medicine name</label>
                                                <input type="text" class="form-control" placeholder="Medicine name" name="medname" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Availability</label>
                                                <select class="form-control" name="avail">
                                                    <option disabled selected>Select Availability</option>
                                                    <option value=" Available">Available</option>
                                                    <option value="Not Available">Not Available</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Date Stocked</label>
                                                <input type="date" class="form-control" placeholder="Enter Alias" name="date1">
                                            </div>
                                        </div>
                                       
                                        
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Expiry Date</label>
                                                <input type="date" class="form-control" placeholder="Enter Alias" name="date2">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label>In Stock</label>
                                                <input type="number" class="form-control" placeholder="Qty" name="stock">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                   
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
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
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#residenttable').DataTable();
        });
    </script>
</body>
</html>