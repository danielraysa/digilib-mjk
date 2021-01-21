
<?php
	$filename = basename(__FILE__);
	$dir = basename(__DIR__);
	include "../koneksi.php";
	include "../function.php";
	check_session($dir."/".$filename);
	$target_dir = "../uploads/lomba/";

// proses tambah
	if(isset($_POST['tambah_lomba'])){
		$id = $_POST['id_baru'];
		$judul = $_POST['judul_baru'];
		$poster= '';
		
		$keterangan= $_POST['ket_baru'];
		$tgl = $_POST['tgl_baru'];
		if(file_exists($_FILES['poster']['tmp_name'])){
			$target_poster = $target_dir . basename($_FILES['poster']['name']);
			$imageCoverType = strtolower(pathinfo($target_poster,PATHINFO_EXTENSION));
			if (file_exists($target_poster) || strlen(basename($_FILES['poster']['name'])) >= 100) {
				$target_poster = $target_dir . generateRandomString() .".". $imageCoverType;
			}
			if (move_uploaded_file($_FILES['poster']['tmp_name'], $target_poster)) {
				// echo "The file ". htmlspecialchars(basename( $_FILES['poster']['name'])). " has been uploaded.";
			} else {
				var_dump($_FILES['poster']['error']);
				echo "Sorry, there was an error uploading your file.";
				exit;
			}
			$poster = $target_poster;
		}
		$query = mysqli_query($conn, "INSERT INTO lomba VALUES ('$id','$judul','$poster','$keterangan','$tgl')");
		if(!$query){
			echo mysqli_error($conn);
		}
	}
	// proses edit
	if(isset($_POST['edit_lomba'])){
		$id = $_POST['id_lomba'];
		$judul = $_POST['judul'];
		$poster= "";
		$keterangan= $_POST['ket'];
		$tgl = $_POST['tgl'];
		if(file_exists($_FILES['poster']['tmp_name'])){
			$target_poster = $target_dir . basename($_FILES['poster']['name']);
			$imageCoverType = strtolower(pathinfo($target_poster,PATHINFO_EXTENSION));
			if (file_exists($target_poster) || strlen(basename($_FILES['poster']['name'])) >= 100) {
				$target_poster = $target_dir . generateRandomString() .".". $imageCoverType;
			}
			if (move_uploaded_file($_FILES['poster']['tmp_name'], $target_poster)) {
				// echo "The file ". htmlspecialchars(basename( $_FILES['poster']['name'])). " has been uploaded.";
			} else {
				var_dump($_FILES['poster']['error']);
				echo "Sorry, there was an error uploading your file.";
				exit;
			}
			$poster = $target_poster;
		}
		$query = mysqli_query($conn, "UPDATE lomba SET judul_lomba='$judul', poster='$poster', keterangan='$keterangan', tgl='$tgl' WHERE id_lomba='$id'");
	}
	if(isset($_POST['hapus_lomba'])){
		$id = $_POST['id_lomba'];
		// echo "UPDATE lomba SET status = 'Tidak Aktif' WHERE id_lomba = '".$id."'";
		// $query = mysqli_query($conn, "UPDATE lomba SET status = 'Tidak Aktif' WHERE id_lomba = '".$id."'");
		$query = mysqli_query($conn, "DELETE from lomba WHERE id_lomba = '".$id."'");
	}

	$query = mysqli_query($conn, "SELECT MAX(id_lomba) as idlomba FROM lomba");
	$data = mysqli_fetch_array($query);
	$kode = $data['idlomba'];

	$urut = (int) substr($kode,2,3);
	$urut++;
	$huruf = "LO";
	$kode = $huruf.sprintf("%03s", $urut);
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
	<!--lomba-->
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
							<h6 class="h2 text-white d-inline-block mb-0">lomba</h6>
						</div>
						<div class="col-lg-6 col-5 text-right">
							<a href="#" class="btn btn-sm btn-neutral" data-toggle="modal"
								data-target="#ModalTambahlomba">Tambah</a>
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
										<th style="width: 20%">Judul</th>
										<th>Poster</th>					
										<th style="width: 30%">Keterangan</th>
										<th>Tanggal</th>
										<th>Action</th>						
									</tr>

								</thead>
								<tbody>

									<?php
					$query = mysqli_query($conn, "SELECT * from lomba ");
					//for($row = 0; $row < 10; $row++)) {
					while ($row = mysqli_fetch_array($query)) {
						
					?>
									<tr>
										<td style="white-space: break-spaces"><?php echo $row['judul_lomba'] ?></td>
										<td><?php if($row['poster']!= "") { ?>
											<img src="<?php echo $row['poster'] ?>" width="100" />
										<?php } ?></td>
										<td style="white-space: break-spaces"><?php echo $row['keterangan'] ?></td>
										<td><?php echo $row['tgl'] ?></td>
										<td><button class="btn btn-success btnEditKat" data-toggle="modal"
												data-target="#ModalEditlomba"
												data-id="<?php echo $row['id_lomba'] ?>">Edit</button>
												<button class="btn btn-danger btnHapusKat" data-toggle="modal"
												data-target="#ModalHapuslomba"
												data-id="<?php echo $row['id_lomba'] ?>">Hapus</button></td>
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
	<!-- Modal lomba -->
	<!-- Modal Tambah lomba-->
	<div class="modal fade" id="ModalTambahlomba" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data lomba</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="id">ID Lomba</label>
						<input type="text" name="id_baru" id="id_baru" class="form-control form-control-sm" placeholder="Id" value ="<?php echo $kode?>" readonly>
					</div>

					<div class="form-group">
						<label for="judul">Judul Lomba</label>
						<input type="text" name="judul_baru" id="judul_baru" class="form-control form-control-sm" placeholder="Judul Lomba">
					</div>
					<div class="form-group">
						<label for="poster">Poster</label>
						<input type="file" accept=".jpg,.jpeg,.png" name="poster" id="poster_baru" class="form-control form-control-sm" placeholder="Cover" />
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<textarea type="text" name="ket_baru" id="ket_baru" class="form-control form-control-sm" rows="4" placeholder="Keterangan"></textarea>
					</div>
					<div class="form-group">
						<label for="tgl">Tanggal</label>
						<input type="date" name="tgl_baru" id="tgl_baru" class="form-control form-control-sm" placeholder="Tanggal">
					</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="tambah_lomba" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Edit lomba -->
	<div class="modal fade" id="ModalEditlomba" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Data lomba</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group">
						<label for="id">ID Lomba</label>
						<input type="text" name="id_lomba" id="id_lomba" class="form-control form-control-sm" placeholder="Id"  readonly>
					</div>

					<div class="form-group">
						<label for="judul">Judul Lomba</label>
						<input type="text" name="judul_lomba" id="judul_lomba" class="form-control form-control-sm" placeholder="Judul Lomba">
					</div>
					<div class="form-group">
						<label for="poster">Poster</label>
						<input type="file" accept=".jpg,.jpeg,.png" name="poster" id="poster" class="form-control form-control-sm" placeholder="Cover">
					</div>
					<div class="form-group">
						<label for="keterangan">Keterangan</label>
						<textarea name="ket" id="ket" class="form-control form-control-sm"  rows="4"placeholder="Keterangan"></textarea>
					</div>
					<div class="form-group">
						<label for="tgl">Tanggal</label>
						<input type="date" name="tgl" id="tgl" class="form-control form-control-sm" placeholder="Tanggal">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="edit_lomba" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
		<!-- modal hapus -->
	<div class="modal fade" id="ModalHapuslomba" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Hapus Data lomba</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
				<div class="modal-body">
					Apakah anda akan menghapus data lomba ini?
					<input type="hidden" name="id_lomba" id="id_lomba_hapus" class="form-control form-control-sm" readonly>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="hapus_lomba" class="btn btn-primary">Save</button>
				</div>
				</form>	
			</div>
		</div>
	</div>
	<?php include "js-script.php"; ?>
	<script>
		
		$('#Tabel2').DataTable({

		});
		$('#Tabel2 tbody').on('click', '.btnEditKat', function () {
			var idlomba = $(this).attr('data-id');
			$.ajax({
				url: 'ajax.php',
				type: 'post',
				data: {
					editlomba: true,
					id_lomba: idlomba
				},
				dataType: 'json',
				success: function (result) {
					console.log(result);
					$("#id_lomba").val(idlomba);
					$("#judul_lomba").val(result.judul_lomba);
					$("#poster").val(result.poster);
					$("#keterangan").val(result.ket);
					$("#tgl").val(result.tgl);
				}
			});
		});
		$('.btnHapusKat').on('click', function () {
			var idlomba = $(this).attr('data-id');
			$("#id_lomba_hapus").val(idlomba);
		});
		
	</script>

</body>
</html>