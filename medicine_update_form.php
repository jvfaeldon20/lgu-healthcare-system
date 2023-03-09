<?php include 'server/server.php' ?>
<?php 
    $id = $_GET["id"];
	$query = "SELECT * FROM tbl_medicine WHERE id='$id'";
    $result = $conn->query($query);

    $medicine = array();
	while($row = $result->fetch_assoc()){
		$medicine[] = $row; 
	}

    // category
	$query = "SELECT * FROM tbl_med_category ORDER BY category ASC";
    $result = $conn->query($query);

    $categories = array();
	while($row = $result->fetch_assoc()){
		$categories[] = $row; 
	}

    // unit
    $query = "SELECT * FROM tbl_med_unit ORDER BY unit ASC";
    $result = $conn->query($query);

    $units = array();
	while($row = $result->fetch_assoc()){
		$units[] = $row; 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Medicine - Masili Health Service System</title>
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
                                            <a href="medicine.php" class="text-primary">MEDICINE</a> > <strong class="text-default">UPDATE</strong></h1>
										</div>
									</div>
								</div>
								<div class="card-body">
                                    <?php foreach($medicine as $row): ?>
                                        <form method="POST" action="medicine_update_record.php">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputGenericName">Generic Name</label>
                                                        <input type="text" class="form-control" id="inputGenericName" value="<?php echo $row['generic_name'] ?>" name="generic_name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputDescription">Description</label>
                                                        <textarea class="form-control" id="inputDescription" rows="3" name="description"><?php echo $row['description'] ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Category</label>
                                                        <select class="form-control" id="exampleFormControlSelect1" name="category">
                                                            <?php foreach($categories as $data): ?>
                                                                <option value="<?= $data['category'] ?>" <?=$data['category'] == $row['category'] ? ' selected="selected"' : '';?>><?= $data['category'] ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputQuantity">Quantity</label>
                                                        <input type="text" class="form-control" id="inputQuantity" name="quantity" value="<?php echo $row['quantity'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputDosage">Dosage</label>
                                                        <input type="text" class="form-control" id="inputDosage" name="dosage" value="<?php echo $row['dosage'] ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleFormControlSelect1">Unit</label>
                                                        <select class="form-control" id="exampleFormControlSelect1" name="unit">
                                                            <?php foreach($units as $data): ?>
                                                                <option value="<?= $data['unit'] ?>" <?=$data['unit'] == $row['unit'] ? ' selected="selected"' : '';?>><?= $data['unit'] ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-primary mt-2 mb-2">Update</button>
                                                    </div>
                                                    <input type="hidden" value="<?php echo $id ?>" name="id">
                                                </div>
                                                <div class="col-md-6"></div>
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