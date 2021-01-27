
<?php
	$filename = basename(__FILE__);
	$dir = basename(__DIR__);
	include "../koneksi.php";
	include "../function.php";
	check_session($dir);
?>
<!DOCTYPE html>
<html>
<!-- form asli -->
<head>
<?php include "css-script.php"; ?>
</head>

<body>
	<!-- Sidenav -->
	<?php include "sidebar.php"; ?>
	<!-- Main content -->
	<!--event-->
	<div class="main-content" id="panel">
		<!-- Topnav -->
		<?php include "navbar.php"; ?>

		<div class="container-fluid mt-3">
			<!-- Card stats -->
			<div class="row">
				
				<div class="col-lg-9 col-md-12">
					<div class="row">
						<div class="col-lg-6 col-md-12 mb-3">
							<!-- <div id="lineChart" style="height: 200px"></div> -->
							<canvas id="lineChart"></canvas>
						</div>
						<div class="col-lg-6 col-md-12 mb-3">
							<div class="d-flex h-100 justify-content-around align-items-center">
							<?php 
								$skor_json = [];
								$nama_json = [];
								$i = 1;
								while($_row = mysqli_fetch_assoc($query_leader)){
									array_push($skor_json, (int) $_row['jumlah']);
									array_push($nama_json,  $_row['nama']);
								?>
								<div class="">
									<img src="../admin/img/theme/team-<?= $i++ ?>.jpg" class="avatar rounded-circle" />
									<p><?= $_row['nama'] ?></p>
								</div>
							<?php } ?>
								<!-- <div class="">
									<img src="../admin/img/theme/team-1.jpg" class="avatar rounded-circle" />
									<p>User 5</p>
								</div>
								<div class="">
									<img src="../admin/img/theme/team-2.jpg" class="avatar rounded-circle" />
									<p>User 4</p>
								</div>
								<div class="">
									<img src="../admin/img/theme/team-3.jpg" class="avatar rounded-circle" />
									<p>User 3</p>
								</div>
								<div class="">
									<img src="../admin/img/theme/team-5.jpg" class="avatar rounded-circle" />
									<p>User 2</p>
								</div> -->
							</div>
						</div>
					</div>
					<div class="card table-responsive">
						<div class="card-body p-1">
						<table class="table table-bordered table-striped">
							<thead>

								<tr class="bg-primary text-white">
									<th style="width:10%">No.</th>
									<th>User</th>
									<th>Point</th>
								</tr>
							</thead>
							<tbody>
							<?php
								//querynya belum okeh
								$query = mysqli_query($conn, "SELECT pengguna.username as nama, SUM(points.point) AS jumlah FROM `pengguna` JOIN point_pengguna ON pengguna.id_pengguna = point_pengguna.id_pengguna 
								JOIN points ON point_pengguna.id_point = points.id_point WHERE point_pengguna.id_point=points.id_point GROUP BY pengguna.username ORDER BY jumlah DESC 
								");
								//for($row = 0; $row < 10; $row++)) {
								while ($row = mysqli_fetch_array($query)) {
								?>
								<tr>
									<td>--</td>
									<td><?php echo $row['nama']?></td>
									<td><?php echo $row['jumlah']?></td>
								</tr>
								<?php }?>
							</tbody>
						</table>
					</div>
					</div>
				</div>
			</div>
			<?php include "layout/user-footer.php"; ?>
		</div>
	</div>
    
	<?php include "js-script.php"; ?>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<script>
	$(document).ready(function() {
		var myConfig = {
			type: "bar",
			series: [{
				values: <?php echo json_encode($skor_json) ?>
				}
			]
		};
			
		var ctx = $('#lineChart');
		var chart = new Chart(ctx, {
			// The type of chart we want to create
			type: 'bar',

			// The data for our dataset
			data: {
				labels: <?php echo json_encode($nama_json) ?>,
				datasets: [{
					label: 'Skor',
					backgroundColor: 'rgb(255, 99, 132)',
					borderColor: 'rgb(255, 99, 132)',
					data: <?php echo json_encode($skor_json) ?>
				}]
			},

			// Configuration options go here
			options: {}
		});
		
		$('#myTable').DataTable();
		$('#myTable tbody').on('click', '.btnEdit', function () {
			var idpoint = $(this).attr('data-id');
			$.ajax({
				url: 'ajax.php',
				type: 'post',
				data: {
					editpoint: true,
					id_point: idpoint
				},
				dataType: 'json',
				success: function (result) {
					console.log(result);
					$("#id_point").val(idpoint);
					$("#kegiatan").val(result.jenis_kegiatan);
                    $("#point").val(result.point);
				}
			});
		});
		$('#myTable tbody').on('click', '.btnHapus', function () {
			var idpoint = $(this).attr('data-id');
			$("#id_point_hapus").val(idpoint);
		});
	})
	</script>
</body>
</html>