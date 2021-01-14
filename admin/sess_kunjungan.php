
<?php include "../koneksi.php"; ?>
<!-- <?php
$query = mysqli_query($conn, "SELECT MAX(id_ses_kunjungan) as idses_kunjungan FROM session_kunjungan");
$data = mysqli_fetch_array($query);
$kode = $data['idses_kunjungan'];

$urut = (int) substr($kode,2,3);
$urut++;
$huruf = "T";
$kode = $huruf.sprintf("%03s", $urut);
?> -->

<?php 
// proses tambah
	// if(isset($_POST['tambah_ses_kunjungan'])){
	// 	$id = $_POST['id_baru'];
	// 	$pengguna = $_POST['pengguna_baru'];
	// 	$tanggal = $_POST['tanggal_baru'];
	// 	$query = mysqli_query($conn, "INSERT INTO ses_kunjungan VALUES ('$id','$pengguna','$gambar','$keterangan','$tanggal')");
	// 	if(!$query){
	// 		echo mysqli_error($conn);
	// 	}
	// }
	// // proses edit
	// if(isset($_POST['edit_ses_kunjungan'])){
	// 	$id = $_POST['id_ses_kunjungan'];
	// 	$pengguna = $_POST['pengguna'];
	// 	$tanggal = $_POST['tanggal'];
	// 	$query = mysqli_query($conn, "UPDATE session_kunjungan SET id_pengguna='$pengguna', gambar='$gambar', keterangan='$keterangan', tanggal='$tanggal' WHERE id_ses_kunjungan='$id'");
	// }
	if(isset($_POST['hapus_ses_kunjungan'])){
		$id = $_POST['id_ses_kunjungan'];
		// echo "UPDATE ses_kunjungan SET status = 'Tidak Aktif' WHERE id_ses_kunjungan = '".$id."'";
		// $query = mysqli_query($conn, "UPDATE ses_kunjungan SET status = 'Tidak Aktif' WHERE id_ses_kunjungan = '".$id."'");
		$query = mysqli_query($conn, "DELETE from session_kunjungan WHERE id_ses_kunjungan = '".$id."'");
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
	<!--ses_kunjungan-->
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
							<h6 class="h2 text-white d-inline-block mb-0">Session Kunjungan</h6>
						</div>
						<div class="col-lg-6 col-5 text-right">
							<h6 class="h2 text-white d-inline-block mb-0">Session Kunjungan</h6>
							<a href="#" class="btn btn-sm btn-neutral" data-toggle="modal"
								data-target="#ModalTambahses_kunjungan">Tambah</a>
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
										<th>pengguna</th>
										<th>Tanggal</th>					
									</tr>

								</thead>
								<tbody>

									<?php
					$query = mysqli_query($conn, "SELECT username, tanggal_kunjungan from session_kunjungan ss join pengguna p on ss.id_pengguna=p.id_pengguna ");
					//for($row = 0; $row < 10; $row++)) {
					while ($row = mysqli_fetch_array($query)) {
					?>
									<tr>
										<td><?php echo $row['username'] ?></td>
										<td><?php echo $row['tanggal_kunjungan'] ?></td>
										<td><!-- <button class="btn btn-success btnEditKat" data-toggle="modal"
												data-target="#ModalEditses_kunjungan"
												data-id="<?php echo $row['id_ses_kunjungan'] ?>">Edit</button> -->
												<button class="btn btn-danger btnHapusKat" data-toggle="modal"
												data-target="#ModalHapusses_kunjungan"
												data-id="<?php echo $row['id_ses_kunjungan'] ?>">Hapus</button></td>
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
	<!-- Modal ses_kunjungan -->
	<!-- <!-- <!-- <!-- Modal Tambah ses_kunjungan-->
	<!-- <div class="modal fade" id="ModalTambahses_kunjungan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data ses_kunjungan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="id">ID ses_kunjungan</label>
						<input type="text" name="id_baru" id="id_baru" class="form-control form-control-sm" placeholder="Id" value ="<?php echo $kode?>" readonly>
					</div>

					<div class="form-group">
						<label for="pengguna">pengguna ses_kunjungan</label>
						<input type="text" name="pengguna_baru" id="pengguna_baru" class="form-control form-control-sm" placeholder="pengguna ses_kunjungan">
					</div>
					<div class="form-group">
						<label for="gambar">gambar</label>
						<input type="text" name="gambar_baru" id="gambar_baru" class="form-control form-control-sm" placeholder="gambar">
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<input type="text" name="ket_baru" id="ket_baru" class="form-control form-control-sm" placeholder="Keterangan">
					</div>
					<div class="form-group">
						<label for="tanggal">Tanggal</label>
						<input type="text" name="tanggal_baru" id="tanggal_baru" class="form-control form-control-sm" placeholder="Tanggal">
					</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="tambah_ses_kunjungan" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div> -->
	<!-- Modal Edit ses_kunjungan -->
	<!-- <div class="modal fade" id="ModalEditses_kunjungan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Data ses_kunjungan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
						<label for="id">ID ses_kunjungan</label>
						<input type="text" name="id_ses_kunjungan" id="id_ses_kunjungan" class="form-control form-control-sm" placeholder="Id"  readonly>
					</div>

					<div class="form-group">
						<label for="pengguna">pengguna ses_kunjungan</label>
						<input type="text" name="pengguna_ses_kunjungan" id="pengguna_ses_kunjungan" class="form-control form-control-sm" placeholder="pengguna ses_kunjungan">
					</div>
					<div class="form-group">
						<label for="gambar">gambar</label>
						<input type="text" name="gambar" id="gambar" class="form-control form-control-sm" placeholder="gambar">
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<input type="text" name="ket" id="ket" class="form-control form-control-sm" placeholder="Keterangan">
					</div>
					<div class="form-group">
						<label for="tanggal">Tanggal</label>
						<input type="text" name="tanggal" id="tanggal" class="form-control form-control-sm" placeholder="Tanggal">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="edit_ses_kunjungan" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div> --> --> --> -->
		<!-- modal hapus -->
	<div class="modal fade" id="ModalHapusses_kunjungan" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Hapus Data ses_kunjungan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
				<div class="modal-body">
					Apakah anda akan menghapus data ses_kunjungan ini?
					<input type="hidden" name="id_ses_kunjungan" id="id_ses_kunjungan_hapus" class="form-control form-control-sm" readonly>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="hapus_ses_kunjungan" class="btn btn-primary">Save</button>
				</div>
				</form>	
			</div>
		</div>
	</div>
	<?php include "js-script.php"; ?>
	<script>
		
		$('#Tabel2').DataTable();
		// $('#Tabel2 tbody').on('click', '.btnEditKat', function () {
		// 	var idses_kunjungan = $(this).attr('data-id');
		// 	$.ajax({
		// 		url: 'ajax.php',
		// 		type: 'post',
		// 		data: {
		// 			editses_kunjungan: true,
		// 			id_ses_kunjungan: idses_kunjungan
		// 		},
		// 		dataType: 'json',
		// 		success: function (result) {
		// 			console.log(result);
		// 			$("#id_ses_kunjungan").val(idses_kunjungan);
		// 			$("#pengguna_ses_kunjungan").val(result.pengguna_ses_kunjungan);
		// 			$("#gambar").val(result.gambar);
		// 			$("#keterangan").val(result.ket);
		// 			$("#tanggal").val(result.tanggal);
		// 		}
		// 	});
		// });
		$('.btnHapusKat').on('click', function () {
			var idses_kunjungan = $(this).attr('data-id');
			$("#id_ses_kunjungan_hapus").val(idses_kunjungan);
		});
		
	</script>

</body>
</html>