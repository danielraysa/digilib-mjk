<?php 
	session_start();
	include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'css-script.php'; ?>
</head>

<body>
	<!-- Sidenav -->
	<?php include "sidebar.php"; ?>
	<!-- Main content -->
	<div class="main-content" id="panel">
		<!-- Topnav -->
		<?php include "navbar.php"; ?>
		<!-- Header -->
		<div class="header bg-primary" style="background-color: green !important">
			<div class="container-fluid">
				<div class="header-body">
					<div class="row align-items-center py-4">
						<div class="col-lg-6 col-7">
							<h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid mt-3">
			<!-- Card stats -->
			<div class="row">
				<div class="col-xl-12 col-md-12">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body table-responsive">
							
						</div>
					</div>
				</div>
			</div>
			<?php include "footer.php"; ?>
		</div>
	</div>
	
	<?php include 'js-script.php'; ?>
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