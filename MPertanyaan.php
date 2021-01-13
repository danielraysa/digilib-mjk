<?php include "../koneksi.php"; ?>
<?php
$query = mysqli_query($conn, "SELECT MAX(id_pertanyaan) as idpertanyaan FROM pertanyaan"); // ganti tabel koleksi
$data = mysqli_fetch_array($query);
$kode = $data['idpertanyaan'];

$urut = (int) substr($kode,2,3);
$urut++;
$huruf = "PT";
$kode = $huruf.sprintf("%03s", $urut);
?>
<?php
	function generateRandomString($length = 10) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
// poses tambah

	if(isset($_POST['tambah'])){
		$id_pertanyaan = $_POST['id_pertanyaan'];
		$koleksi = $_POST['koleksi'];
		$pertanyaan = $_POST['pertanyaan'];
		$jawaban = $_POST['jawaban'];
		$query = mysqli_query($conn, "INSERT INTO pertanyaan VALUES ('$id_pertanyaan','$koleksi','$pertanyaan','$jawaban','Aktif')");
		if(!$query){
			echo mysqli_error($conn);
		}
	}
	// proses edit
	if(isset($_POST['edit'])){
		$id_pertanyaan = $_POST['id_pertanyaan'];
		$koleksi = $_POST['koleksi'];
		$pertanyaan = $_POST['pertanyaan'];
		$jawaban = $_POST['jawaban'];
		$query = mysqli_query($conn, "UPDATE pertanyaan SET id_koleksi = '$koleksi', pertanyaan = '$pertanyaan', jawaban = '$jawaban' WHERE id_pertanyaan = '$id_pertanyaan'");
		if(!$query){
			echo mysqli_error($conn);
		}
	}
?>
<!DOCTYPE html>
<html>
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
		<div class="header bg-primary" style="background-color: #B0C4DE !important">
			<div class="container-fluid">
				<div class="header-body">
					<div class="row align-items-center py-4">
						<div class="col-lg-6 col-7">
							<h6 class="h2 text-white d-inline-block mb-0">Pertanyaan</h6>
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
						<div class="card-body table-responsive">
						<!-- Card body -->
							<table id="myTable" class="table table-bordered">
								<thead>
									<tr>
										<th>Judul</th>
										<th>Pertanyaan</th>
										<th>Jawaban</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$query = mysqli_query($conn, "SELECT * FROM pertanyaan p join koleksi k ON p.id_koleksi = k.id_koleksi");
									while ($row = mysqli_fetch_array($query)) {
									?>
									<tr>
										<td><?php echo $row['judul'] ?></td>
										<td><?php echo $row['pertanyaan'] ?></td>
										<td><?php echo $row['jawaban'] ?></td>
										<td>
											<button class="btn btn-success btnEdit" data-toggle="modal"
												data-target="#ModalEdit"
												data-id="<?php echo $row['id_pertanyaan'] ?>">Edit</button>
											<button class="btn btn-danger btnHapus" data-toggle="modal" data-target="#ModalHapus" data-id="<?php echo $row['id_pertanyaan'] ?>">Hapus</button>
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
	<!-- Modal Tambah -->
	<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Pertanyaan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="id">ID Pertanyaan</label>
						<input type="text" name="id_pertanyaan" id="id_baru" class="form-control form-control-sm"
							placeholder="ID Pertanyaan" value="<?php echo $kode?>"  readonly/>
					</div>
					<div class="form-group">
						<label for="kategori">Koleksi</label>
						<select name="koleksi" id="koleksi_baru" class="form-control form-control-sm">
							<option value="">Pilih Koleksi</option>
							<?php 
								$query_kat = mysqli_query($conn, "SELECT * FROM koleksi");
								while ($row = mysqli_fetch_array($query_kat)) {
							?>
								<option value="<?php echo $row['id_koleksi']; ?>"><?php echo $row['judul'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="pertanyaan">Pertanyaan</label>
						<input type="text" name="pertanyaan" id="pertanyaan_baru" class="form-control form-control-sm"
							placeholder="Pertanyaan" />
					</div>
					<div class="form-group">
						<label for="judul">Jawaban</label>
						<input type="text" name="jawaban" id="jawaban_baru" class="form-control form-control-sm"
							placeholder="Jawaban" />
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="Submit" name="tambah"class="btn btn-primary">Save</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	<!-- Modal Edit -->
	<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Data Pertanyaan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="judul">ID Pertanyaan</label>
						<input type="text" name="id_pertanyaan" id="id_pertanyaan" class="form-control form-control-sm"
							placeholder="ID Pertanyaan" required readonly />
					</div>
					<div class="form-group">
						<label for="kategori">Koleksi</label>
						<select name="koleksi" id="koleksi" class="form-control form-control-sm">
							<option value="">Pilih Koleksi</option>
							<?php 
								$query_kat = mysqli_query($conn, "SELECT * FROM koleksi");
								while ($row = mysqli_fetch_array($query_kat)) {
							?>
								<option value="<?php echo $row['id_koleksi']; ?>"><?php echo $row['judul'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="judul">Pertanyaan</label>
						<input type="text" name="pertanyaan" id="pertanyaan" class="form-control form-control-sm"
							placeholder="Pertanyaan" />
					</div>
					<div class="form-group">
						<label for="judul">Jawaban</label>
						<input type="text" name="jawaban" id="jawaban" class="form-control form-control-sm"
							placeholder="Jawaban" />
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="Submit" name="edit" class="btn btn-primary">Save</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	
	<?php include "js-script.php"; ?>
	<script>
		$('#myTable').DataTable();
		$('#myTable tbody').on('click', '.btnEdit', function () {
			var id_tanya = $(this).attr('data-id');
			$.ajax({
				url: 'ajax.php',
				type: 'post',
				data: {
					editpertanyaan: true,
					id_pertanyaan: id_tanya
				},
				dataType: 'json',
				success: function (result) {
					console.log(result);
					$("#id_pertanyaan").val(id_tanya);
					$("#koleksi").val(result.id_koleksi);
					$("#pertanyaan").val(result.pertanyaan);
					$("#jawaban").val(result.jawaban);
				}
			})
		})
	</script>
</body>

</html>