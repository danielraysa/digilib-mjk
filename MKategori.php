<?php include "koneksi.php"; ?>
<?php 
// poses tambah
	if(isset($_POST['tambah'])){
		$id = $_POST['id_baru'];
		$nama = $_POST['nama_baru'];
		$query = mysqli_query($conn, "INSERT INTO kategori VALUES ('$id','$nama')");
	}
	// proses edit
	if(isset($_POST['edit'])){
		$id = $_POST['id_kategori'];
		$nama = $_POST['nama'];
		//echo "UPDATE kategori SET nama_kategori='$nama',kelas='$kelas',alamat='$alamat',status='$status' WHERE id_kategori='$id'";
		$query = mysqli_query($conn, "UPDATE kategori SET nama_kategori='$nama' WHERE id_kategori='$id'");
	}
	// if(isset($_POST['hapus'])){
	// 	$id = $_POST['id_kategori'];
	// 	echo "UPDATE kategori SET status = 'Tidak Aktif' WHERE id_kategori = '".$id."'";
	// 	$query = mysqli_query($conn, "UPDATE kategori SET status = 'Tidak Aktif' WHERE id_kategori = '".$id."'");
	// }
?>
<!DOCTYPE html>
<html>
<!-- form asli -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
	<meta name="author" content="Creative Tim">
	<title>MAN 2 Mojokerto</title>
	<!-- Favicon -->
	<link rel="icon" href="admin/img/brand/favicon.png" type="image/png">
	<!-- Fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
	<!-- Icons -->
	<link rel="stylesheet" href="admin/vendor/nucleo/css/nucleo.css" type="text/css">
	<link rel="stylesheet" href="admin/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
	<!-- Page plugins -->
	<!-- Argon CSS -->
	<link rel="stylesheet" href="admin/css/argon.css?v=1.2.0" type="text/css">
	<link rel="stylesheet" type="text/css" href="DataTable/css/dataTables.bootstrap4.min.css">
</head>

<body>
	<!-- Sidenav -->
	<?php include "sidebar.php"; ?>
	<!-- Main content -->
	<div class="main-content" id="panel">
		<!-- Topnav -->
		<?php include "navbar.php"; ?>
		<!-- Header -->
		<!-- Header -->
		<div class="header bg-primary" style="background-color: green !important">
			<div class="container-fluid">
				<div class="header-body">
					<div class="row align-items-center py-4">
						<div class="col-lg-6 col-7">
							<h6 class="h2 text-white d-inline-block mb-0">Kategori</h6>
						</div>
						<div class="col-lg-6 col-5 text-right">
							<h6 class="h2 text-white d-inline-block mb-0">Kategori Koleksi</h6>
							<a href="#" class="btn btn-sm btn-neutral" data-toggle="modal"
								data-target="#ModalTambah">Tambah</a>
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
						<table id="myTable" class="table table-bordered">
							<thead>
								<tr>
									<th>ID kategori</th>
									<th>Nama</th>
								</tr>

							</thead>
							<tbody>

								<?php
                  $query = mysqli_query($conn, "SELECT * from kategori");
                  //for($row = 0; $row < 10; $row++)) {
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
								<tr>
									<td><?php echo $row['id_kategori'] ?></td>
									<td><?php echo $row['nama_kategori'] ?></td>
									<td><button class="btn btn-success btnEdit" data-toggle="modal"
											data-target="#ModalEdit"
											data-id="<?php echo $row['id_kategori'] ?>">Edit</button>
											<button class="btn btn-success btnEdit" data-toggle="modal"
											data-target="#ModalHapus"
											data-id="<?php echo $row['id_kategori'] ?>">Hapus</button></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<?php include "footer.php"; ?>
		</div>
	</div>
	<!-- Modal Tambah -->
	<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data kategori</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="nama">ID kategori</label>
							<input type="text" name="id_baru" id="id_baru" class="form-control form-control-sm" placeholder="Nama Anda">
						</div>
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" name="nama_baru" id="nama_baru" class="form-control form-control-sm" placeholder="Nama Anda">
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="tambah" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Edit -->
	<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Data kategori</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="nama">ID kategori</label>
							<input type="text" name="id_kategori" id="id_kategori" class="form-control form-control-sm" readonly>
						</div>
						<div class="form-group">
							<label for="nama">Nama Kategori</label>
							<input type="text" name="nama" id="nama" class="form-control form-control-sm" placeholder="Nama Anda">
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="edit" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
		<!-- modal hapus -->
		<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Hapus Data kategori</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
					Apakah anda akan menghapus data kategori ini?
					<input type="hidden" name="id_kategori" id="id_kategori_hapus" class="form-control form-control-sm" readonly>
						
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="hapus" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Argon Scripts -->
	<!-- Core -->
	<script src="admin/vendor/jquery/dist/jquery.min.js"></script>
	<script src="admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="admin/vendor/js-cookie/js.cookie.js"></script>
	<script src="admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
	<script src="admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
	<script src="hadir/js/bootstrap.min.js"></script>
	<!-- Optional JS -->
	<script src="admin/vendor/chart.js/dist/Chart.min.js"></script>
	<script src="admin/vendor/chart.js/dist/Chart.extension.js"></script>
	<!-- Argon JS -->
	<script src="admin/js/argon.js?v=1.2.0"></script>
	<!-- DataTable -->
	<script src="DataTable/js/jquery.dataTables.min.js"></script>
	<script src="DataTable/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$('#myTable').DataTable();
		$('.btnEdit').on('click', function () {
			var idkategori = $(this).attr('data-id');
			$.ajax({
				url: 'ajax.php',
				type: 'post',
				data: {
					edituser: true,
					id_kategori: idkategori
				},
				dataType: 'json',
				success: function (result) {
					console.log(result);
					$("#id_kategori").val(idkategori);
					$("#nama").val(result.nama_kategori);
				}
			});
		});
		$('.btnHapus').on('click', function () {
			var idkategori = $(this).attr('data-id');
			$("#id_kategori_hapus").val(idkategori);
		});
	</script>
</body>

</html>