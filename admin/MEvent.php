
<?php include "../koneksi.php"; ?>
<?php
$query = mysqli_query($conn, "SELECT MAX(id_event) as idevent FROM event");
$data = mysqli_fetch_array($query);
$kode = $data['idevent'];

$urut = (int) substr($kode,2,3);
$urut++;
$huruf = "EV";
$kode = $huruf.sprintf("%03s", $urut);
?>

<?php 
$target_dir = "../uploads/event/";
// proses tambah
	if(isset($_POST['tambah_event'])){
		$id = $_POST['id_baru'];
		$judul = $_POST['judul_baru'];
		$gambar= '';
		$keterangan= $_POST['ket_baru'];
		$tanggal = $_POST['tanggal_baru'];
		if(file_exists($_FILES['gambar']['tmp_name'])){
			$target_gambar = $target_dir . basename($_FILES['gambar']['name']);
			$imageCoverType = strtolower(pathinfo($target_gambar,PATHINFO_EXTENSION));
			if (file_exists($target_gambar) || strlen(basename($_FILES['gambar']['name'])) >= 100) {
				$target_gambar = $target_dir . generateRandomString() .".". $imageCoverType;
			}
			if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_gambar)) {
				// echo "The file ". htmlspecialchars(basename( $_FILES['gambar']['name'])). " has been uploaded.";
			} else {
				var_dump($_FILES['gambar']['error']);
				echo "Sorry, there was an error uploading your file.";
				exit;
			}
			$gambar = $target_gambar;
		}
		$query = mysqli_query($conn, "INSERT INTO event VALUES ('$id','$judul','$gambar','$keterangan','$tanggal')");
		if(!$query){
			echo mysqli_error($conn);
		}
	}
	// proses edit
	if(isset($_POST['edit_event'])){
		$id = $_POST['id_event'];
		$judul = $_POST['judul_event'];
		$gambar= '';
		$keterangan= $_POST['ket'];
		$tanggal = $_POST['tanggal'];
		if(file_exists($_FILES['gambar']['tmp_name'])){
			$target_gambar = $target_dir . basename($_FILES['gambar']['name']);
			$imageCoverType = strtolower(pathinfo($target_gambar,PATHINFO_EXTENSION));
			if (file_exists($target_gambar) || strlen(basename($_FILES['gambar']['name'])) >= 100) {
				$target_gambar = $target_dir . generateRandomString() .".". $imageCoverType;
			}
			if (move_uploaded_file($_FILES['gambar']['tmp_name'], $target_gambar)) {
				// echo "The file ". htmlspecialchars(basename( $_FILES['gambar']['name'])). " has been uploaded.";
			} else {
				var_dump($_FILES['gambar']['error']);
				echo "Sorry, there was an error uploading your file.";
				exit;
			}
			$gambar = $target_gambar;
		}
		$query = mysqli_query($conn, "UPDATE event SET judul_event='$judul', gambar='$gambar', keterangan='$keterangan', tanggal='$tanggal' WHERE id_event='$id'") or die (mysqli_error($conn));
	}
	if(isset($_POST['hapus_event'])){
		$id = $_POST['id_event'];
		// echo "UPDATE event SET status = 'Tidak Aktif' WHERE id_event = '".$id."'";
		// $query = mysqli_query($conn, "UPDATE event SET status = 'Tidak Aktif' WHERE id_event = '".$id."'");
		$query = mysqli_query($conn, "DELETE from event WHERE id_event = '".$id."'")  or die (mysqli_error($conn));
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
										<th>Action</th>
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
										<td><?php if($row['gambar']!= "") { ?>
											<img src="<?php echo $row['gambar'] ?>" width="100" />
										<?php } ?></td>
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
				<form action="" method="post" enctype="multipart/form-data">
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
						<input type="file" accept=".jpg,.jpeg,.png" name="gambar" id="gambar_baru" class="form-control form-control-sm" placeholder="Cover" />
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<textarea type="text" name="ket_baru" id="ket_baru" class="form-control form-control-sm" placeholder="Keterangan"></textarea>
					</div>
					<div class="form-group">
						<label for="tanggal">Tanggal</label>
						<input type="date" name="tanggal_baru" id="tanggal_baru" class="form-control form-control-sm" placeholder="Tanggal">
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
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group">
						<label for="id">ID event</label>
						<input type="text" name="id_event" id="id_event" class="form-control form-control-sm" placeholder="Id"  readonly>
					</div>

					<div class="form-group">
						<label for="judul">Judul event</label>
						<input type="text" name="judul_event" id="judul_event" class="form-control form-control-sm" placeholder="gambar">
					</div>
					<div class="form-group">
						<label for="gambar">gambar</label>
						<input type="file" accept=".jpg,.jpeg,.png" name="gambar" id="gambar_baru" class="form-control form-control-sm" placeholder="Cover" />
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<textarea type="text" name="ket" id="ket" class="form-control form-control-sm" placeholder="Keterangan"></textarea>
					</div>
					<div class="form-group">
						<label for="tanggal">Tanggal</label>
						<input type="date" name="tanggal" id="tanggal" class="form-control form-control-sm" placeholder="Tanggal">
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
			var idEvent = $(this).attr('data-id');
			$.ajax({
				url: 'ajax.php',
				type: 'post',
				data: {
					editevent: true,
					id_event: idEvent
				},
				dataType: 'json',
				success: function (result) {
					console.log(result);
					$("#id_event").val(idEvent);
					$("#judul_event").val(result.judul_event);
					$("#gambar").val(result.gambar);
					$("#ket").val(result.keterangan);
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