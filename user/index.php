<?php 
	// session_start();
	include "../koneksi.php";
	include "../function.php";
	check_session();
?>
<!DOCTYPE html>
<html>
<head>
	<?php include "layout/user-css-script.php"; ?>
</head>

<body>
	<!-- Sidenav -->
	<?php include "layout/user-sidebar.php"; ?>
	<!-- Main content -->
	<div class="main-content" id="panel">
		<!-- Topnav -->
		<?php include "layout/user-navbar.php"; ?>
		
		<div class="container-fluid mt-3">
			<!-- Card stats -->
			<div class="row">
				<!-- <div class="col-lg-4 col-md-12 text-center">
					<div class="card mb-1">
						<div class="card-body p-0">
							<div id="myChart" style="height: 200px"></div>
						</div>
					</div>
					<div class="d-flex justify-content-between" style="height: 100px">
						<div class="card w-100 bg-danger m-1">
							<div class="card-body">
								<h3 class="card-title">21</h3>
							</div>
						</div>
						<div class="card w-100 bg-warning m-1">
							<div class="card-body">
								<h3 class="card-title">11</h3>
							</div>
						</div>
					</div>
					<div class="d-flex justify-content-between" style="height: 100px;">
						<div class="card w-100 bg-warning m-1">
							<div class="card-body">
								<h3 class="card-title">11</h3>
							</div>
						</div>
						<div class="card w-100 bg-danger m-1">
							<div class="card-body">
								<h3 class="card-title">13</h3>
							</div>
						</div>
					</div>
				</div> -->
				<div class="col-lg-9 col-md-12">
					<div class="row">
						<div class="col-lg-6 col-md-12 mb-3">
							<div id="lineChart" style="height: 200px"></div>
						</div>
						<div class="col-lg-6 col-md-12 mb-3">
							<div class="d-flex h-100 justify-content-around align-items-center">
								<div class="">
									<img src="../admin/img/theme/team-4.jpg" class="avatar rounded-circle" />
									<p>User 1</p>
								</div>
								<div class="">
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
								</div>
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
								<tr>
									<td>1.</td>
									<td>User A</td>
									<td>100</td>
								</tr>
								<tr>
									<td>1.</td>
									<td>User A</td>
									<td>100</td>
								</tr>
								<tr>
									<td>1.</td>
									<td>User A</td>
									<td>100</td>
								</tr>
								<tr>
									<td>1.</td>
									<td>User A</td>
									<td>100</td>
								</tr>
							</tbody>
						</table>
					</div>
					</div>
				</div>
			</div>
			<?php include "layout/user-footer.php"; ?>
		</div>
	</div>
	
	<?php include "layout/user-js-script.php"; ?>
	<script src="https://cdn.zingchart.com/zingchart.min.js"></script>
	<script>
	$(document).ready(function() {
		var myConfig = {
			type: "bar",
			"scale-r": {
				aperture: 200,
			},
			"plotarea":{
				"margin":"0"
			},
			series: [{
				values: [33, 30, 25, 20, 15]
				}
			]
		};
			
		zingchart.render({
			id: 'lineChart',
			data: myConfig,
			height: "280px",
			width: "100%"
		});
		var myConfig6 = {
			"type": "gauge",
			// "style": { "padding": "-1px" },
			"scale-r": {
				"aperture": 200,
				"values": "0:100:20",
				"center": {
					"size": 5,
					"background-color": "#66CCFF #FFCCFF",
					"border-color": "none"
				},
				"ring": { //Ring with Rules
					"size": 10,
					"rules": [{
							"rule": "%v >= 0 && %v <= 20",
							"background-color": "red"
						},
						{
							"rule": "%v >= 20 && %v <= 40",
							"background-color": "orange"
						},
						{
							"rule": "%v >= 40 && %v <= 60",
							"background-color": "yellow"
						},
						{
							"rule": "%v >= 60 && %v <= 80",
							"background-color": "green"
						},
						{
							"rule": "%v >= 80 && %v <=100",
							"background-color": "blue"
						}
					]
				}
			},
			/* "plotarea": {
				// "margin": "40px 0px 0px 0px",
				// "backgroundColor": '#fff'
			}, */
			"plot": {
				"csize": "5%",
				"size": "100%",
				"background-color": "#000000",
			},
			"series": [{
				"values": [87]
			}]
		};
		// ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
		zingchart.render({
		// $('#myChart').zingchart({
			id: 'myChart',
			data: myConfig6,
			// height: "100%",
			height: "280px",
			width: "100%"
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