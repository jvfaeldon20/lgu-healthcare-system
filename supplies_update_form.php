<?php include 'server/server.php' ?>
<?php 
    $id = $_GET["id"];
	$query = "SELECT * FROM tbl_medical_supply WHERE id='$id'";
    $result = $conn->query($query);

    $medical_supply = array();
	while($row = $result->fetch_assoc()){
		$medical_supply[] = $row; 
	}

	// category
	$query = "SELECT * FROM tbl_med_supply_category ORDER BY id DESC";
    $result = $conn->query($query);

    $med_supp_category = array();
	while($row = $result->fetch_assoc()){
		$med_supp_category[] = $row; 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Supplies - Masili Health Service System</title>
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
                                            <a href="supplies.php" class="text-primary">MEDICAL SUPPLY</a> > <strong class="text-default">UPDATE</strong></h1>
										</div>
									</div>
								</div>
								<div class="card-body">
                                    <?php foreach($medical_supply as $row): ?>
                                        <form method="POST" action="supplies_update_record.php">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputSupplyName">Supply Name</label>
                                                        <input type="text" class="form-control" id="inputSupplyName" value="<?php echo $row['supply_name'] ?>" name="supply_name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputDescription">Description</label>
                                                        <textarea class="form-control" id="inputDescription" rows="3" name="description"><?php echo $row['description'] ?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputCategory">Category</label>
                                                        <select class="form-control" id="inputCategory" name="category">
															<?php foreach($med_supp_category as $data): ?>
																<option value="<?= ucwords($data['category']) ?>" <?=$data['category'] == $row['category'] ? ' selected="selected"' : '';?>><?= ucwords($data['category']) ?></option>
															<?php endforeach ?>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inputQuantity">Quantity</label>
                                                        <input type="text" class="form-control" id="inputQuantity" name="quantity" value="<?php echo $row['quantity'] ?>">
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