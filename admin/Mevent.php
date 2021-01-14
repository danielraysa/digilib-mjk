
<?php include "../koneksi.php"; ?>
<?php
$query = mysqli_query($conn, "SELECT MAX(id_event) as idevent FROM event");
$data = mysqli_fetch_array($query);
$kode = $data['idevent'];

$urut = (int) substr($kode,2,3);
$urut++;
$huruf = "T";
$kode = $huruf.sprintf("%03s", $urut);
?>

<?php 
// proses tambah
	if(isset($_POST['tambah_event'])){
		$id = $_POST['id_baru'];
		$judul = $_POST['judul_baru'];
		$gambar= $_POST['gambar_baru'];
		$keterangan= $_POST['ket_baru'];
		$tanggal = $_POST['tanggal_baru'];
		$query = mysqli_query($conn, "INSERT INTO event VALUES ('$id','$judul','$gambar','$keterangan','$tanggal')");
		if(!$query){
			echo mysqli_error($conn);
		}
	}
	// proses edit
	if(isset($_POST['edit_event'])){
		$id = $_POST['id_event'];
		$judul = $_POST['judul'];
		$gambar= $_POST['gambar'];
		$keterangan= $_POST['ket'];
		$tanggal = $_POST['tanggal'];
		$query = mysqli_query($conn, "UPDATE event SET judul_event='$judul', gambar='$gambar', keterangan='$keterangan', tanggal='$tanggal' WHERE id_event='$id'");
	}
	if(isset($_POST['hapus_event'])){
		$id = $_POST['id_event'];
		// echo "UPDATE event SET status = 'Tidak Aktif' WHERE id_event = '".$id."'";
		// $query = mysqli_query($conn, "UPDATE event SET status = 'Tidak Aktif' WHERE id_event = '".$id."'");
		$query = mysqli_query($conn, "DELETE from event WHERE id_event = '".$id."'");
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
	<!--event-->
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
							<h6 class="h2 text-white d-inline-block mb-0">event</h6>
						</div>
						<div class="col-lg-6 col-5 text-right">
							<h6 class="h2 text-white d-inline-block mb-0">event Koleksi</h6>
							<a href="#" class="btn btn-sm btn-neutral" data-toggle="modal"
								data-target="#ModalTambahevent">Tambah</a>
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
										<th>Judul</th>
										<th>gambar</th>					
										<th>Keterangan</th>
										<th>Tanggal</th>					
									</tr>

								</thead>
								<tbody>

									<?php
					$query = mysqli_query($conn, "SELECT * from event ");
					//for($row = 0; $row < 10; $row++)) {
					while ($row = mysqli_fetch_array($query)) {
					?>
									<tr>
										<td><?php echo $row['judul_event'] ?></td>
										<td><?php echo $row['gambar'] ?></td>
										<td><?php echo $row['keterangan'] ?></td>
										<td><?php echo $row['tanggal'] ?></td>
										<td><button class="btn btn-success btnEditKat" data-toggle="modal"
												data-target="#ModalEditevent"
												data-id="<?php echo $row['id_event'] ?>">Edit</button>
												<button class="btn btn-danger btnHapusKat" data-toggle="modal"
												data-target="#ModalHapusevent"
												data-id="<?php echo $row['id_event'] ?>">Hapus</button></td>
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
	<!-- Modal event -->
	<!-- Modal Tambah event-->
	<div class="modal fade" id="ModalTambahevent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data event</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="id">ID event</label>
						<input type="text" name="id_baru" id="id_baru" class="form-control form-control-sm" placeholder="Id" value ="<?php echo $kode?>" readonly>
					</div>

					<div class="form-group">
						<label for="judul">Judul event</label>
						<input type="text" name="judul_baru" id="judul_baru" class="form-control form-control-sm" placeholder="Judul event">
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
					<button type="submit" name="tambah_event" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Edit event -->
	<div class="modal fade" id="ModalEditevent" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Data event</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
						<label for="id">ID event</label>
						<input type="text" name="id_event" id="id_event" class="form-control form-control-sm" placeholder="Id"  readonly>
					</div>

					<div class="form-group">
						<label for="judul">Judul event</label>
						<input type="text" name="judul_event" id="judul_event" class="form-control form-control-sm" placeholder="Judul event">
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
					<button type="submit" name="edit_event" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
		<!-- modal hapus -->
	<div class="modal fade" id="ModalHapusevent" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Hapus Data event</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
				<div class="modal-body">
					Apakah anda akan menghapus data event ini?
					<input type="hidden" name="id_event" id="id_event_hapus" class="form-control form-control-sm" readonly>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="hapus_event" class="btn btn-primary">Save</button>
				</div>
				</form>	
			</div>
		</div>
	</div>
	<?php include "js-script.php"; ?>
	<script>
		
		$('#Tabel2').DataTable();
		$('#Tabel2 tbody').on('click', '.btnEditKat', function () {
			var idevent = $(this).attr('data-id');
			$.ajax({
				url: 'ajax.php',
				type: 'post',
				data: {
					editevent: true,
					id_event: idevent
				},
				dataType: 'json',
				success: function (result) {
					console.log(result);
					$("#id_event").val(idevent);
					$("#judul_event").val(result.judul_event);
					$("#gambar").val(result.gambar);
					$("#keterangan").val(result.ket);
					$("#tanggal").val(result.tanggal);
				}
			});
		});
		$('.btnHapusKat').on('click', function () {
			var idevent = $(this).attr('data-id');
			$("#id_event_hapus").val(idevent);
		});
		
	</script>

</body>
</html>