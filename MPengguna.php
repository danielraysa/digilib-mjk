<?php include "koneksi.php"; ?>
<?php 
// poses tambah
	if(isset($_POST['tambah_siswa'])){
		$id = $_POST['id_baru'];
		$nama = $_POST['nama_baru'];
		$kelas = $_POST['kelas_baru'];
		$jkelamin = $_POST['jkelamin_baru'];
		$alamat = $_POST['alamat_baru'];
		$status = $_POST['status_baru'];
		// echo "INSERT INTO siswa VALUES ('$id','$nama','$kelas','$jkelamin','$alamat','$status')";
		$query = mysqli_query($conn, "INSERT INTO siswa VALUES ('$id','$nama','$kelas','$jkelamin','$alamat','$status')");
		if(!$query){
			echo mysqli_error($conn);
		}
	}
	// proses edit
	if(isset($_POST['edit_siswa'])){
		$id = $_POST['id_siswa'];
		$nama = $_POST['nama'];
		$kelas = $_POST['kelas'];
		$jkelamin = $_POST['jkelamin'];
		$alamat = $_POST['alamat'];
		$status = $_POST['status'];
		//echo "UPDATE siswa SET nama_siswa='$nama',kelas='$kelas',alamat='$alamat',status='$status' WHERE id_siswa='$id'";
		$query = mysqli_query($conn, "UPDATE siswa SET nama_siswa='$nama',kelas='$kelas',jenis_kelamin='$jkelamin',alamat='$alamat',status='$status' WHERE id_siswa='$id'");
	}
	if(isset($_POST['hapus_siswa'])){
		$id = $_POST['id_siswa'];
		// echo "UPDATE siswa SET status = 'Tidak Aktif' WHERE id_siswa = '".$id."'";
		$query = mysqli_query($conn, "UPDATE siswa SET status = 'Tidak Aktif' WHERE id_siswa = '".$id."'");
	}
?>
<?php 
// poses tambah
	if(isset($_POST['tambah_karyawan'])){
		$id = $_POST['id_baru'];
		$nama = $_POST['nama_baru'];
		$jabatan = $_POST['jabatan_baru'];
		$alamat = $_POST['alamat_baru'];
		$jkelamin = $_POST['jkelamin'];
		$status = $_POST['status'];
		$query = mysqli_query($conn, "INSERT INTO karyawan (id_karyawan,nama,jabatan,alamat,jenis_kelamin,status) VALUES ('$id','$nama','$jabatan','$alamat','$jkelamin','$status')");
		if(!$query){
			echo mysqli_error($conn);
		}
	}
	// proses edit
	if(isset($_POST['edit_karyawan'])){
		$id = $_POST['id_karyawan'];
		$nama = $_POST['nama_karyawan'];
		$jabatan = $_POST['jabatan'];
		$alamat = $_POST['alamat'];
		$jkelamin = $_POST['jkelamin'];
		$status = $_POST['status'];
		$query = mysqli_query($conn, "UPDATE karyawan SET nama='$nama',jabatan='$jabatan',alamat='$alamat',jenis_kelamin='$jkelamin',status='$status' WHERE id_karyawan='$id'");
	}
	if(isset($_POST['hapus_karyawan'])){
		$id = $_POST['id_karyawan'];
		// echo "UPDATE karyawan SET status = 'Tidak Aktif' WHERE id_karyawan = '".$id."'";
		$query = mysqli_query($conn, "UPDATE karyawan SET status = 'Tidak Aktif' WHERE id_siswa = '".$id."'");
	}
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
							<h6 class="h2 text-white d-inline-block mb-0">Pengguna</h6>
						</div>
						<div class="col-lg-6 col-5 text-right">
							<h6 class="h2 text-white d-inline-block mb-0">Siswa</h6>
							<a href="#" class="btn btn-sm btn-neutral" data-toggle="modal"
								data-target="#ModalTambahSiswa">Tambah</a>
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
						<div class="card-body table-responsive">
							<!-- Card body -->
							<table id="Tabel1" class="table table-bordered">
								<thead>
									<tr>
										<th>ID Siswa</th>
										<th>Nama</th>
										<th>Kelas</th>
										<th>Jenis Kelamin</th>
										<th>Alamat</th>
										<th>Status</th>
										<th>Action</th>
									</tr>

								</thead>
								<tbody>

									<?php
					$query = mysqli_query($conn, "SELECT * from siswa where status = 'Aktif'");
					//for($row = 0; $row < 10; $row++)) {
					while ($row = mysqli_fetch_array($query)) {
					?>
									<tr>
										<td><?php echo $row['id_siswa'] ?></td>
										<td><?php echo $row['nama_siswa'] ?></td>
										<td><?php echo $row['kelas'] ?></td>
										<td><?php // echo $row['jenis_kelamin'] ?></td>
										<td><?php echo $row['alamat'] ?></td>
										<td><?php echo $row['status'] ?></td>
										<td><button class="btn btn-success btnEdit" data-toggle="modal"
												data-target="#ModalEditSiswa"
												data-id="<?php echo $row['id_siswa'] ?>">Edit</button>
												<button class="btn btn-danger btnHapus" data-toggle="modal"
												data-target="#ModalHapusSiswa"
												data-id="<?php echo $row['id_siswa'] ?>">Hapus</button></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<!--Karyawan-->
	<div class="main-content" id="panel" style="margin-left: 250px">
		<!-- Header -->

		<!-- Header -->
		<div class="header bg-primary" style="background-color: green !important">
			<div class="container-fluid">
				<div class="header-body">
					<div class="row align-items-center py-4">
						<div class="col-lg-6 col-7">
						</div>
						<div class="col-lg-6 col-5 text-right">
							<h6 class="h2 text-white d-inline-block mb-0">Karyawan</h6>
							<a href="#" class="btn btn-sm btn-neutral" data-toggle="modal"
								data-target="#ModalTambahKaryawan">Tambah</a>
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
						<div class="card-body table-responsive">
							<!-- Card body -->
							<table id="Tabel2" class="table table-bordered">
								<thead>
									<tr>
										<th>ID Karyawan</th>
										<th>Nama</th>
										<th>Jabatan</th>
										<th>Alamat</th>
										<th>Jenis Kelamin</th>
										<th>Status</th>
										<th>Action</th>
										
									</tr>

								</thead>
								<tbody>

									<?php
					$query = mysqli_query($conn, "SELECT * from karyawan WHERE status = 'Aktif'");
					//for($row = 0; $row < 10; $row++)) {
					while ($row = mysqli_fetch_array($query)) {
					?>
									<tr>
										<td><?php echo $row['id_karyawan'] ?></td>
										<td><?php echo $row['nama'] ?></td>
										<td><?php echo $row['jabatan'] ?></td>
										<td><?php echo $row['alamat'] ?></td>
										<td><?php echo $row['jenis_kelamin'] ?></td>
										<td><?php echo $row['status'] ?></td>
										<td><button class="btn btn-success btnEditKar" data-toggle="modal"
												data-target="#ModalEditKaryawan"
												data-id="<?php echo $row['id_karyawan'] ?>">Edit</button>
												<button class="btn btn-danger btnHapusKar" data-toggle="modal"
												data-target="#ModalHapusKaryawan"
												data-id="<?php echo $row['id_karyawan'] ?>">Hapus</button></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php include "footer.php"; ?>
		</div>
	</div>
	<!-- Modal Tambah Siswa-->
	<div class="modal fade" id="ModalTambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Pengguna</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="id_siswa">ID Siswa</label>
							<input type="text" name="id_baru" id="id_baru" class="form-control form-control-sm" maxlength="10" placeholder="Nama Anda">
						</div>
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" name="nama_baru" id="nama_baru" class="form-control form-control-sm" placeholder="Nama Anda">
						</div>
						<div class="form-group">
							<label for="kelas">Kelas</label>
							<input type="text" name="kelas_baru" id="kelas_baru" class="form-control form-control-sm" placeholder="Kelas">
						</div>
					
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" name="alamat_baru" id="alamat_baru" class="form-control form-control-sm" placeholder="Alamat">
					</div>

					<div class="form-group">
						<label for="jkelamin_baru">Jenis Kelamin</label>
						<select name="jkelamin_baru" id="jkelamin_baru" class="form-control form-control-sm">
							<option value="Perempuan">Perempuan</option>
							<option value="Laki-laki">Laki-laki</option>
						</select>
					</div>

					<div class="form-group">
						<label for="status">Status</label>
						<select name="status_baru" id="status_baru" class="form-control form-control-sm">
							<option value="Aktif" selected>Aktif</option>
							<option value="Tidak Aktif">Tidak Aktif</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="tambah_siswa" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Edit -->
	<div class="modal fade" id="ModalEditSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Data Pengguna</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="id_siswa">ID Siswa</label>
							<input type="text" name="id_siswa" id="id_siswa" class="form-control form-control-sm" readonly>
						</div>
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" name="nama" id="nama" class="form-control form-control-sm" placeholder="Nama Anda">
						</div>

						<div class="form-group">
							<label for="kelas">Kelas</label>
							<input type="text" name="kelas" id="kelas" class="form-control form-control-sm" placeholder="Kelas">
						</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" name="alamat" id="alamat" class="form-control form-control-sm" placeholder="Alamat">
					</div>

					<div class="form-group">
						<label for="jkelamin">Jenis Kelamin</label>
						<select name="jkelamin" id="jkelamin" class="form-control form-control-sm">
							<option value="Perempuan">Perempuan</option>
							<option value="Laki-laki">Laki-laki</option>
						</select>
					</div>

					<div class="form-group">
						<label for="status">Status</label>
						<select name="status" id="status" class="form-control form-control-sm">
							<option value="Aktif">Aktif</option>
							<option value="Tidak Aktif">Tidak Aktif</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="edit_siswa" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
		<!-- modal hapus -->
	<div class="modal fade" id="ModalHapusSiswa" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Pengguna</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
				<div class="modal-body">
					Apakah anda akan menghapus data siswa ini?
					<input type="hidden" name="id_siswa" id="id_siswa_hapus" class="form-control form-control-sm" readonly>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="hapus_siswa" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Karyawan -->
	<!-- Modal Tambah Karyawan-->
	<div class="modal fade" id="ModalTambahKaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Pengguna</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="id_karyawan">ID Karyawan</label>
						<input type="text" name="id_baru" id="id_baru" class="form-control form-control-sm" placeholder="Nama Anda">
					</div>

					<div class="form-group">
						<label for="nama">Nama Karyawan</label>
						<input type="text" name="nama_baru" id="nama_baru" class="form-control form-control-sm" placeholder="Nama Anda">
					</div>

					<div class="form-group">
						<label for="jabatan">Jabatan</label>
						<input type="text" name="jabatan_baru" id="jabatan_baru" class="form-control form-control-sm" placeholder="Jabatan">
					</div>
				
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" name="alamat_baru" id="alamat_baru" class="form-control form-control-sm" placeholder="Alamat">
					</div>

					<div class="form-group">
						<label for="status">Jenis Kelamin</label>
						<select name="jkelamin" id="jkelamin" class="form-control form-control-sm">
							<option value="Perempuan">Perempuan</option>
							<option value="Laki-laki">Laki-laki</option>
						</select>
					</div>

					<div class="form-group">
						<label for="status">Status</label>
						<select name="status" id="status" class="form-control form-control-sm">
							<option value="Aktif">Aktif</option>
							<option value="Tidak Aktif">Tidak Aktif</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="tambah_karyawan" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Edit Karyawan -->
	<div class="modal fade" id="ModalEditKaryawan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Data Pengguna</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="id">ID Karyawan</label>
							<input type="text" name="id_karyawan" id="id_karyawan" class="form-control form-control-sm" readonly>
						</div>
						<div class="form-group">
							<label for="nama">Nama Karyawan</label>
							<input type="text" name="nama_karyawan" id="nama_karyawan" class="form-control form-control-sm" placeholder="Nama Anda">
						</div>

						<div class="form-group">
							<label for="jabatan">Jabatan</label>
							<input type="text" name="jabatan" id="jabatan_karyawan" class="form-control form-control-sm" placeholder="Jabatan">
						</div>
					<div class="form-group">
						<label for="alamat">Alamat</label>
						<input type="text" name="alamat" id="alamat_karyawan" class="form-control form-control-sm" placeholder="Alamat">
					</div>
					
					<div class="form-group">
						<label for="jkelamin">Jenis Kelamin</label>
						<select name="jkelamin" id="jkelamin_karyawan" class="form-control form-control-sm">
							<option value="Perempuan">Perempuan</option>
							<option value="Laki-laki">Laki-laki</option>
						</select>
					</div>
					<div class="form-group">
						<label for="status">Status</label>
						<select name="status" id="status_karyawan" class="form-control form-control-sm">
							<option value="Aktif">Aktif</option>
							<option value="Tidak Aktif">Tidak Aktif</option>
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="edit_karyawan" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
		<!-- modal hapus -->
	<div class="modal fade" id="ModalHapusKaryawan" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Pengguna</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
				<div class="modal-body">
					Apakah anda akan menghapus data siswa ini?
					<input type="hidden" name="id_karyawan" id="id_karyawan_hapus" class="form-control form-control-sm" readonly>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="hapus_karyawan" class="btn btn-primary">Save</button>
				</div>
				</form>	
			</div>
		</div>
	</div>
	<?php include "js-script.php"; ?>
	<script>
		$('#Tabel1').DataTable();
		$('#Tabel1 tbody').on('click', '.btnEdit', function () {
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
					$("#jkelamin").val(result.jenis_kelamin);
					$("#alamat").val(result.alamat);
					$("#status").val(result.status);
				}
			});
		});
		$('#Tabel1 tbody').on('click', '.btnHapus', function () {
			var idsiswa = $(this).attr('data-id');
			$("#id_siswa_hapus").val(idsiswa);
		});
		$('#Tabel2').DataTable();
		$('#Tabel2 tbody').on('click', '.btnEditKar', function () {
			var idkaryawan = $(this).attr('data-id');
			$.ajax({
				url: 'ajax.php',
				type: 'post',
				data: {
					editkaryawan: true,
					id_karyawan: idkaryawan
				},
				dataType: 'json',
				success: function (result) {
					console.log(result);
					$("#id_karyawan").val(idkaryawan);
					$("#nama_karyawan").val(result.nama);
					$("#jabatan_karyawan").val(result.jabatan);					
					$("#alamat_karyawan").val(result.alamat);
					$("#jkelamin_karyawan").val(result.jenis_kelamin);
					$("#status_karyawan").val(result.status);
				}
			});
		});
		$('#Tabel2 tbody').on('click', '.btnHapusKar', function () {
			var idkaryawan = $(this).attr('data-id');
			$("#id_karyawan_hapus").val(idkaryawan);
		});
		
	</script>

</body>
</html>