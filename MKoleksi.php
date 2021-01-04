<?php include "koneksi.php"; ?>
<?php 
// poses tambah
	if(isset($_POST['tambah'])){
		$id = $_POST['id_baru'];
		$id_kategori = $_POST['kategori'];
		$judul = $_POST['judul'];
		$pengarang = $_POST['pengarang'];
		$penerbit = $_POST['penerbit'];
		$tahun = $_POST['tahun'];
		$cover = $_POST['cover'];
		$file = $_POST['file'];
		$query = mysqli_query($conn, "INSERT INTO koleksi VALUES ('$id','$id_kategori','$judul','$pengarang','$penerbit','$tahun','$cover','$file')");
	}
	// proses edit
	if(isset($_POST['edit'])){
		$id = $_POST['id_siswa'];
		$nama = $_POST['nama'];
		$kelas = $_POST['kelas'];
		$alamat = $_POST['alamat'];
		$status = $_POST['status'];
		//echo "UPDATE siswa SET nama_siswa='$nama',kelas='$kelas',alamat='$alamat',status='$status' WHERE id_siswa='$id'";
		$query = mysqli_query($conn, "UPDATE siswa SET nama_siswa='$nama',kelas='$kelas',alamat='$alamat',status='$status' WHERE id_siswa='$id'");
	}
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
							<h6 class="h2 text-white d-inline-block mb-0">Koleksi</h6>
						</div>
						<div class="col-lg-6 col-5 text-right">
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
											<th>judul</th>
											<th>Nama Pengarang</th>
											<th>penerbit</th>
											<th>penerbit</th>
											<th>penerbit</th>
											<th>Status</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
                  $query = mysqli_query($conn, "SELECT * FROM koleksi join kategori ON koleksi.id_kategori = kategori.id_kategori");
                  //for($row = 0; $row < 10; $row++)) {
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
										<tr>
											<td><?php echo $row['judul'] ?></td>
											<td><?php echo $row['nama_pengarang'] ?></td>
											<td><?php echo $row['penerbit'] ?></td>
											<td><?php echo $row['tahun_terbit'] ?></td>
											<td><?php echo $row['judul_kategori'] ?></td>
											<td><?php echo $row['cover'] ?></td>
											<td><?php echo $row['file'] ?></td>
											<td><button class="btn btn-success btnEdit" data-toggle="modal"
													data-target="#ModalEdit"
													data-id="<?php echo $row['id_siswa'] ?>">Edit</button><button
													class="btn btn-danger">Hapus</button></td>
										</tr>
										<?php } ?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				<!-- </div> -->
			<?php include "footer.php"; ?>
		</div>
		</div>
		<!-- Modal Tambah -->
		<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
			aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Koleksi</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label for="judul">Judul</label>
								<input type="text" name="judul"id="judul" class="form-control form-control-sm"
									placeholder="Judul Koleksi">
							</div>

							<div class="form-group">
								<label for="pengarang">Nama Pengarang</label>
								<input type="text" name="pengarang" id="pengarang" class="form-control form-control-sm"
									placeholder="Nama Pengarang">
							</div>
						<div class="form-group">
							<label for="penerbit">Penerbit</label>
							<input type="text" name="penerbit" id="penerbit" class="form-control form-control-sm"
								placeholder="Penerbit">
						</div>
						<div class="form-group">
							<label for="tahun">Tahun Tenerbit</label>
							<input type="date" name="tahun" id="tahun" class="form-control form-control-sm"
								placeholder="Tahun Tenerbit">
						</div>
						<label for="kategori">Kategori</label>
						<select name="kategori" id="kategori" class="form-control form-control-sm">
							<option value="">Pilih Kategori</option>
							<?php 
								$query_kat = mysqli_query($conn, "SELECT * FROM kategori");
								while ($row = mysqli_fetch_array($query_kat)) {
							?>
							<option value="<?php echo $row['id_kategori']; ?>"><?php echo $row['nama_kategori'] ?>
							</option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="cover">Cover</label>
						<input type="file" id="cover" class="form-control form-control-sm" placeholder="Cover">
					</div>
					<div class="form-group">
						<label for="file">File</label>
						<input type="file" id="file" class="form-control form-control-sm" placeholder="File Koleksi">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="Submit" name="tambah"class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	<!-- Modal Edit -->
	<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Data Koleksi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label for="judul">Judul</label>
							<input type="text" name="judul id="judul" class="form-control form-control-sm"
								placeholder="Judul Koleksi">
						</div>

						<div class="form-group">
							<label for="pengarang">Nama Pengarang</label>
							<input type="text" name="pengarang" id="pengarang" class="form-control form-control-sm"
								placeholder="Nama Pengarang">
						</div>
					<div class="form-group">
						<label for="penerbit">Penerbit</label>
						<input type="text" name="penerbit" id="penerbit" class="form-control form-control-sm" placeholder="Penerbit">
					</div>
					<div class="form-group">
						<label for="tahun">Tahun Tenerbit</label>
						<input type="date" name="tahun" id="tahun" class="form-control form-control-sm" placeholder="Tahun Tenerbit">
					</div>
				</div>
				<label for="kategori">Kategori</label>
				<select name="kategori" id="kategori" class="form-control form-control-sm">
					<option value="">Aktif</option>
					<option value="">Tidak Aktif</option>
				</select>
			</div>
			<div class="form-group">
				<label for="cover">Cover</label>
				<input type="file" name="cover" id="cover" class="form-control form-control-sm" placeholder="Cover">
			</div>
			<div class="form-group">
				<label for="file">File</label>
				<input type="file" name="file" id="file" class="form-control form-control-sm" placeholder="File Koleksi">
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" name="edit" class="btn btn-primary">Save</button>
		</div>
		</form>
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
			var idsiswa = $(this).attr('data-id');
			$.ajax({
				url: 'ajax.php',
				type: 'post',
				data: {
					edituser: true,
					id_siswa: idsiswa
				},
				dataType: 'json',
				success: function (result) {
					console.log(result);
					$("#id_siswa").val(idsiswa);
					$("#nama").val(result.nama_siswa);
					$("#kelas").val(result.kelas);
					$("#alamat").val(result.alamat);
					$("#status").val(result.status);
				}
			})
		})
	</script>
</body>

</html>