<?php 
	session_start();
	include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'user-css-script.php'; ?>
</head>

<body>
	<!-- Sidenav -->
	<?php include "user-sidebar.php"; ?>
	<!-- Main content -->
	<div class="main-content" id="panel">
		<!-- Topnav -->
		<?php include "user-navbar.php"; ?>
		
		<div class="container-fluid mt-3">
			<!-- Card stats -->
			<div class="row">
				<div class="col-lg-4 col-md-12">
					<div class="card bg-success mb-1">
						<div class="card-body">
							<h5 class="card-title">Card title</h5>
							<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
					<div class="d-flex justify-content-between">
						<div class="card bg-danger mb-1">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some </p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
						<div class="card bg-warning mb-1">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick </p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div>
					<div class="d-flex justify-content-between">
						<div class="card bg-warning mb-1">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some </p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
						<div class="card bg-danger mb-1">
							<div class="card-body">
								<h5 class="card-title">Card title</h5>
								<p class="card-text">Some quick </p>
								<a href="#" class="btn btn-primary">Go somewhere</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-8 col-md-12">

				</div>
			</div>
			<?php include "user-footer.php"; ?>
		</div>
	</div>
	
	<?php include 'user-js-script.php'; ?>
	<script>
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
	</script>
</body>

</html>