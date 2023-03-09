<?php include 'server/server.php' ?>
<?php 
	$query = "SELECT o.name     AS 'official',
					c.title     AS 'chairmanship',
					p.position  AS 'position',
					o.termstart AS 'term_start',
					o.status 	AS 'status',
					p.order 	AS 'rank_order'
FROM tbl_officials o LEFT JOIN tbl_chairmanship c 
				   		    ON o.chairmanship = c.id
		  			 LEFT JOIN tbl_position p
			  			    ON o.position = p.id";
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
	<title>Officials - Masili Health Service System</title>
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
									<!-- officials table -->
									<div class="table-responsive">
										<table id="officials" class="display table">
											<thead>
												<tr class="text-primary">
														<th scope="col">Brgy Official</th>
														<th scope="col">Chairmanship</th>
														<th scope="col">Position</th>
														<th scope="col">Term Start</th>
														<th scope="col">Status</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($officials as $row): ?>
													<tr>
														<td>
															<div class="avatar avatar-sm">
																<span class="avatar-title rounded-circle border border-white" style="background-color: lightseagreen"><?= ucwords($row['official'][0]) ?></span>
															</div>
															<?= ucwords($row['official']) ?>
														</td>
														<td><?= ucwords($row['chairmanship']) ?></td>
														<td><?= ucwords($row['position']) ?></td>
														<td><?= ucwords($row['term_start']) ?></td>
														<td>
															<?php if($row['status']=='Active'): ?>
																<span class="badge badge-success" style="width:90px;">Active</span>
															<?php else: ?>
																<span class="badge badge-danger" style="width:90px;">Inactive</span>
															<?php endif ?>
														</td>
													</tr>
												<?php endforeach ?>
											</tbody>
										</table>
									</div>
									<!-- end of officials table -->
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
	<script src="assets/js/plugin/datatables/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            var oTable = $('#officials').DataTable({
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
			var conf = confirm("Export officials to CSV?");
			var stmt = "SELECT o.name AS 'official',c.title AS 'chairmanship',p.position  AS 'position',o.termstart AS 'term_start',o.status AS 'status',p.order AS 'rank_order' FROM tbl_officials o LEFT JOIN tbl_chairmanship c ON o.chairmanship = c.id LEFT JOIN tbl_position p ON o.position = p.id";
			var tblHeader = 'Brgy Official,Chairmanship,Position,Term Start,Status';
			var fileName = "officials";
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