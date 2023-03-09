<?php include 'server/server.php' ?>
<?php 
	$query = "SELECT * FROM tbl_medical_supply ORDER BY id DESC";
    $result = $conn->query($query);

    $medical_supply = array();
	while($row = $result->fetch_assoc()){
		$medical_supply[] = $row; 
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header.php' ?>
	<title>Medical Supplies - Masili Health Service System</title>
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
											<h1>MEDICAL SUPPLIES</h1>
										</div>
										<?php if(isset($_SESSION['username']) && $_SESSION['role']!='resident'): ?>
										<div class="card-tools">
											<a href="supplies_add_form.php" class="btn btn-primary mr-1">
												<i class="fa fa-plus mr-2"></i>
												Supply
											</a>
											<button onclick="Export()" class="btn btn-default">
												<i class="fa fa-download mr-2"></i>
												Export to CSV
											</button>
										</div>
										<?php endif?>
									</div>
								</div>
								<div class="card-body">
									<!-- medicine table -->
									<div class="table-responsive">
										<table id="blottertable" class="display table">
											<thead>
												<tr class="text-primary">
														<th scope="col">Supply Item</th>
														<th scope="col">Description</th>
														<th scope="col">Category</th>
														<th scope="col">Quantity</th>
														<th scope="col">Status</th>
														<?php if(isset($_SESSION['username']) && $_SESSION['role']!='resident'): ?>
															<th scope="col">Action</th>
														<?php endif ?>
												</tr>
											</thead>
											<tbody>
												<?php foreach($medical_supply as $row): ?>
														<tr>
															<td><?= ucwords($row['supply_name']) ?></td>
															<td><?= ucwords($row['description']) ?></td>
															<td><?= ucwords($row['category']) ?></td>
															<td><?= ucwords($row['quantity']) ?></td>
															<td class="text-center">
																<span style="width:90px;" class="badge rounded-pill <?= $row['quantity']>0?'bg-success':'bg-danger' ?> text-white"><?= ucwords($row['quantity']>0?"Available":"Out of Stock") ?></span></td>
															<?php if(isset($_SESSION['username']) && $_SESSION['role']!='resident'): ?>
																<td>
																	<a href="supplies_update_form.php?id=<?= $row['id'] ?>" class="btn btn-link" data-toggle="tooltip" data-placement="top" title="Update">
																		<i class="fa fa-edit mr-2"></i>
																	</a>
																	<a href="remove_item.php?id=<?= $row['id'] ?>&tbl=tbl_medical_supply&page=supplies" class="btn btn-link btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" data-toggle="tooltip" data-placement="top" title="Remove">
																		<i class="fa fa-trash"></i>
																	</a>
																</td>
															<?php endif ?>
														</tr>
												<?php endforeach ?>
											</tbody>
										</table>
									</div>
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
    <script>
        $(document).ready(function() {
            var oTable = $('#blottertable').DataTable({
				"order": [[ 4, "asc" ]]
            });

			$("#activeCase").click(function(){
				var textSelected = 'Active';
				oTable.columns(4).search(textSelected).draw();
			});
			$("#settledCase").click(function(){
				var textSelected = 'Settled';
				oTable.columns(4).search(textSelected).draw();
			});
			$("#scheduledCase").click(function(){
				var textSelected = 'Scheduled';
				oTable.columns(4).search(textSelected).draw();
			});
        });

		function Export(){
			var conf = confirm("Export medical supply to CSV?");
			var stmt = "SELECT *, IF(quantity > 0,'available', 'out of stock') AS STATUS FROM tbl_medical_supply";
			var tblHeader = 'No,Supply Name,Description,Category,Quantity,Status';
			var fileName = "medical_supply";
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