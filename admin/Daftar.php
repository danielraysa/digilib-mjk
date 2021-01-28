<?php
$filename = basename(__FILE__);
$dir = basename(__DIR__);
include "../koneksi.php";
include "../function.php";
check_session($dir."/".$filename);


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
	<!--Kelas-->
	<div class="main-content" id="panel">
		<!-- Topnav -->
		<?php include "navbar.php"; ?>
		<!-- Header -->

		<!-- Header -->
		<div class="header " style="background-color: #B0C4DE !important">
			<div class="container-fluid">
				<div class="header-body">
					<div class="row align-items-center py-4">
						<div class="col-lg-6 col-7">
							<h6 class="h2 text-white d-inline-block mb-0">Daftar Lomba</h6>
						</div>
						<!-- <div class="col-lg-6 col-5 text-right">
							<h6 class="h2 text-white d-inline-block mb-0">Kelas</h6>
							<a href="#" class="btn btn-sm btn-neutral" data-toggle="modal"
								data-target="#ModalTambahKelas">Tambah</a>
						</div> -->
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
										<th>ID Daftar</th>
										<th>Judul Lomba</th>					
										<th>Nama</th>
										<th>Judul Karya</th>					
										<th>File</th>					
									</tr>

								</thead>
								<tbody>

									<?php
					$query = mysqli_query($conn, "SELECT * from daftar d join pengguna p on d.id_pengguna=p.id_pengguna 
					join lomba l on d.id_lomba=l.id_lomba ");
					//for($row = 0; $row < 10; $row++)) {
					while ($row = mysqli_fetch_array($query)) {
					?>
									<tr>
										<td><?php echo $row['id_daftar'] ?></td>
										<td><?php echo $row['judul_lomba'] ?></td>
										<td><?php echo $row['username'] ?></td>
										<td><?php echo $row['judul_lomba'] ?></td>
										<td>
										<?php if($row['file']!= "") { ?>
											<a href="<?php echo $row['file'] ?>" target="_blank">File</a>
										<?php } ?>
										</td>
										
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
	<!-- Modal Kelas -->
	<!-- Modal Tambah Kelas-->
	<div class="modal fade" id="ModalTambahKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Kelas</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="id">ID Kelas</label>
						<input type="text" name="id_baru" id="id_baru" class="form-control form-control-sm" placeholder="Id" value ="<?php //echo $kode?>" readonly>
					</div>

					<div class="form-group">
						<label for="nama">Nama Kelas</label>
						<input type="text" name="nama_baru" id="nama_baru" class="form-control form-control-sm" placeholder="Nama Anda">
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="tambah_kelas" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Edit Kelas -->
	<div class="modal fade" id="ModalEditKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Data Kelas</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="id">ID Kelas</label>
							<input type="text" name="id_kelas" id="id_kelas" class="form-control form-control-sm" readonly>
						</div>
						<div class="form-group">
							<label for="nama">Nama Kelas</label>
							<input type="text" name="nama_kelas" id="nama_kelas" class="form-control form-control-sm" placeholder="Nama Anda">
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="edit_kelas" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
		<!-- modal hapus -->
	<div class="modal fade" id="ModalHapusKelas" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Kelas</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
				<div class="modal-body">
					Apakah anda akan menghapus data kelas ini?
					<input type="hidden" name="id_kelas" id="id_kelas_hapus" class="form-control form-control-sm" readonly>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="hapus_kelas" class="btn btn-primary">Save</button>
				</div>
				</form>	
			</div>
		</div>
	</div>
	<?php include "js-script.php"; ?>
	<script>
		
		$('#Tabel2').DataTable();
		$('#Tabel2 tbody').on('click', '.btnEditKat', function () {
			var idKelas = $(this).attr('data-id');
			$.ajax({
				url: 'ajax.php',
				type: 'post',
				data: {
					editKelas: true,
					id_kelas: idKelas
				},
				dataType: 'json',
				success: function (result) {
					console.log(result);
					$("#id_kelas").val(idKelas);
					$("#nama_kelas").val(result.nama_kelas);
				}
			});
		});
		$('.btnHapusKat').on('click', function () {
			var idKelas = $(this).attr('data-id');
			$("#id_kelas_hapus").val(idKelas);
		});
		
	</script>

</body>
</html>