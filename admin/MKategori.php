<!-- <<<<<<< HEAD:MKategori.php -->
<?php include "../koneksi.php"; ?>
<?php
$query = mysqli_query($conn, "SELECT MAX(id_kategori) as idkategori FROM kategori");
$data = mysqli_fetch_array($query);
$kode = $data['idkategori'];

$urut = (int) substr($kode,2,3);
$urut++;
$huruf = "T";
$kode = $huruf.sprintf("%03s", $urut);
?>
<!-- //>>>>>>> 3209f70519a5535bab0d5729d80efad7f294d59d:admin/MKategori.php -->
<?php 
// proses tambah
	if(isset($_POST['tambah_kategori'])){
		$id = $_POST['id_baru'];
		$nama = $_POST['nama_baru'];
		$query = mysqli_query($conn, "INSERT INTO kategori VALUES ('$id','$nama')");
		if(!$query){
			echo mysqli_error($conn);
		}
	}
	// proses edit
	if(isset($_POST['edit_kategori'])){
		$id = $_POST['id_kategori'];
		$nama = $_POST['nama_kategori'];
		$query = mysqli_query($conn, "UPDATE kategori SET nama_kategori='$nama' WHERE id_kategori='$id'");
	}
	if(isset($_POST['hapus_kategori'])){
		$id = $_POST['id_kategori'];
		// echo "UPDATE Kategori SET status = 'Tidak Aktif' WHERE id_Kategori = '".$id."'";
		// $query = mysqli_query($conn, "UPDATE Kategori SET status = 'Tidak Aktif' WHERE id_Kategori = '".$id."'");
		$query = mysqli_query($conn, "DELETE from kategori WHERE id_kategori = '".$id."'");
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
	<!--Kategori-->
	<div class="main-content" id="panel" style = >
		<!-- Topnav -->
		<?php include "navbar.php"; ?>
		<!-- Header -->

		<!-- Header -->
		<div class="header " style="background-color: #B0C4DE !important">
			<div class="container-fluid">
				<div class="header-body">
					<div class="row align-items-center py-4">
						<div class="col-lg-6 col-7">
							<h6 class="h2 text-white d-inline-block mb-0">Kategori</h6>
						</div>
						<div class="col-lg-6 col-5 text-right">
							<h6 class="h2 text-white d-inline-block mb-0">Kategori Koleksi</h6>
							<a href="#" class="btn btn-sm btn-neutral" data-toggle="modal"
								data-target="#ModalTambahKategori">Tambah</a>
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
										<th>ID Kategori</th>
										<th>Nama</th>					
										<th></th>					
									</tr>

								</thead>
								<tbody>

									<?php
					$query = mysqli_query($conn, "SELECT * from kategori ");
					//for($row = 0; $row < 10; $row++)) {
					while ($row = mysqli_fetch_array($query)) {
					?>
									<tr>
										<td><?php echo $row['id_kategori'] ?></td>
										<td><?php echo $row['nama_kategori'] ?></td>
										<td><button class="btn btn-success btnEditKat" data-toggle="modal"
												data-target="#ModalEditKategori"
												data-id="<?php echo $row['id_kategori'] ?>">Edit</button>
												<button class="btn btn-danger btnHapusKat" data-toggle="modal"
												data-target="#ModalHapusKategori"
												data-id="<?php echo $row['id_kategori'] ?>">Hapus</button></td>
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
	<!-- Modal Kategori -->
	<!-- Modal Tambah Kategori-->
	<div class="modal fade" id="ModalTambahKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Kategori</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
				<div class="modal-body">
					<div class="form-group">
						<label for="id">ID Kategori</label>
						<input type="text" name="id_baru" id="id_baru" class="form-control form-control-sm" placeholder="Id" value ="<?php echo $kode?>" readonly>
					</div>

					<div class="form-group">
						<label for="nama">Nama Kategori</label>
						<input type="text" name="nama_baru" id="nama_baru" class="form-control form-control-sm" placeholder="Nama Anda">
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="tambah_kategori" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Modal Edit Kategori -->
	<div class="modal fade" id="ModalEditKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Data Kategori</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="id">ID Kategori</label>
							<input type="text" name="id_kategori" id="id_kategori" class="form-control form-control-sm" readonly>
						</div>
						<div class="form-group">
							<label for="nama">Nama Kategori</label>
							<input type="text" name="nama_kategori" id="nama_kategori" class="form-control form-control-sm" placeholder="Nama Anda">
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="edit_kategori" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
		<!-- modal hapus -->
	<div class="modal fade" id="ModalHapusKategori" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Kategori</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
				<div class="modal-body">
					Apakah anda akan menghapus data kategori ini?
					<input type="hidden" name="id_kategori" id="id_kategori_hapus" class="form-control form-control-sm" readonly>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="hapus_kategori" class="btn btn-primary">Save</button>
				</div>
				</form>	
			</div>
		</div>
	</div>
	<?php include "js-script.php"; ?>
	<script>
		
		$('#Tabel2').DataTable();
		$('#Tabel2 tbody').on('click', '.btnEditKat', function () {
			var idKategori = $(this).attr('data-id');
			$.ajax({
				url: 'ajax.php',
				type: 'post',
				data: {
					editKategori: true,
					id_kategori: idKategori
				},
				dataType: 'json',
				success: function (result) {
					console.log(result);
					$("#id_kategori").val(idKategori);
					$("#nama_kategori").val(result.nama_kategori);
				}
			});
		});
		$('.btnHapusKat').on('click', function () {
			var idKategori = $(this).attr('data-id');
			$("#id_kategori_hapus").val(idKategori);
		});
		
	</script>

</body>
</html>