<?php include 'server/server.php' ?>
<?php 
	$query = "SELECT * FROM tbl_officials";
    $result = $conn->query($query);

    $officials = array();
	while($row = $result->fetch_assoc()){
		$officials[] = $row; 
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
											<h1>BARANGAY OFFICIALS</h1>
										</div>
										<?php if(isset($_SESSION['username']) && $_SESSION['role']!='resident'): ?>
										<div class="card-tools">
											<button onclick="Export()" class="btn btn-default btn-default">
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
														<th scope="col">Brgy Official</th>
														<th scope="col">Chairmanship</th>
														<th scope="col">Position</th>
														<th scope="col">Status</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($medicine as $row): ?>
														<tr>
															<td><?= ucwords($row['generic_name']) ?></td>
															<td><?= ucwords($row['description']) ?></td>
															<td><?= ucwords($row['category']) ?></td>
															<td><?= ucwords($row['quantity']) ?></td>
															<td><?= ucwords($row['dosage']) ?></td>
															<td><?= ucwords($row['unit']) ?></td>
															<td class="text-center">
																<span style="width:90px;" class="badge rounded-pill <?= $row['quantity']>0?'bg-success':'bg-danger' ?> text-white"><?= ucwords($row['quantity']>0?"Available":"Out of Stock") ?></span></td>
															<?php if(isset($_SESSION['username']) && $_SESSION['role']!='resident'): ?>
																<td>
																	<a href="medicine_update_form.php?id=<?= $row['id'] ?>" class="btn btn-link btn-primary" data-toggle="tooltip" data-placement="top" title="Update">
																		<i class="fa fa-edit mr-2"></i>
																	</a>
																	<a href="remove_item.php?id=<?= $row['id'] ?>&tbl=tbl_medicine&page=medicine" class="btn btn-link btn-danger" onclick="return confirm('Are you sure you want to delete this item?');" data-toggle="tooltip" data-placement="top" title="Remove">
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
			var conf = confirm("Export medicine to CSV?");
			var stmt = "SELECT *, IF(quantity > 0,'available', 'out of stock') AS STATUS FROM tbl_medicine";
			var tblHeader = 'No,Generic Name,Description,Category,Quantity,Dosage, Unit, Status';
			var fileName = "medicine";
			if(conf){
				window.open(`export.php?query=${stmt}&tblHeader=${tblHeader}&fileName=${fileName}`, '_blank');
			}
		}
    </script>
</body>
</html>