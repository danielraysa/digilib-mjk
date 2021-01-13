<<<<<<< HEAD:MDonasi.php
<?php include "../koneksi.php"; ?>
<?php
$query = mysqli_query($conn, "SELECT MAX(id_donasi) as iddonasi FROM donasi");
$data = mysqli_fetch_array($query);
$kode = $data['iddonasi'];

$urut = (int) substr($kode,2,3);
$urut++;
$huruf = "DN";
$kode = $huruf.sprintf("%03s", $urut);
?>
=======
<?php include "../koneksi.php"; ?>
>>>>>>> 3209f70519a5535bab0d5729d80efad7f294d59d:admin/MDonasi.php
<?php 
//tanggal auto
$tgl = date('Y-m-d');
// poses tambah
	if(isset($_POST['tambah'])){
		$id = $_POST['id_baru'];
        $judul = $_POST['kegiatan_baru'];
        $angka = $_POST['donasi_baru'];
		$query = mysqli_query($conn, "INSERT INTO donasis VALUES ('$id','$kegiatan','$angka')");
		echo "string";
	}
	// proses edit
	if(isset($_POST['edit'])){
		$id = $_POST['id_donasi'];
        $kegiatan = $_POST['jenis_kegiatan'];
        $donasi = $_POST['donasi'];
		//echo "UPDATE donasi SET kegiatan_donasi='$kegiatan',kelas='$kelas',alamat='$alamat',status='$status' WHERE id_donasi='$id'";
		$query = mysqli_query($conn, "UPDATE donasis SET jenis_kegiatan='$kegiatan', donasi='$angka' WHERE id_donasi='$id'");
	}
	if(isset($_POST['hapus'])){
		$id = $_POST['id_donasi'];
		//echo "UPDATE donasi SET status = 'Tidak Aktif' WHERE id_donasi = '".$id."'";
		$query = mysqli_query($conn, "DELETE from donasis WHERE id_donasi = '".$id."'");
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
		<div class="header bg-primary" style="background-color: #B0C4DE !important">
			<div class="container-fluid">
				<div class="header-body">
					<div class="row align-items-center py-4">
						<div class="col-lg-6 col-7">
							<h6 class="h2 text-white d-inline-block mb-0">donasi</h6>
						</div>
						<div class="col-lg-6 col-5 text-right">
							<h6 class="h2 text-white d-inline-block mb-0">donasi</h6>
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
									<th>Id donasi</th>
									<th>Jenis Kegiatan</th>
                                    <th>donasi</th>
								</tr>

							</thead>
							<tbody>

								<?php
                  $query = mysqli_query($conn, "SELECT * from donasis");
                  //for($row = 0; $row < 10; $row++)) {
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
								<tr>
									<td><?php echo $row['id_donasi'] ?></td>
									<td><?php echo $row['jenis_kegiatan'] ?></td>
									<td><?php echo $row['donasi'] ?></td>
									<td><button class="btn btn-success btnEdit" data-toggle="modal"
											data-target="#ModalEdit"
											data-id="<?php echo $row['id_donasi'] ?>">Edit</button>
											<button class="btn btn-success btnEdit" data-toggle="modal"
											data-target="#ModalHapus"
											data-id="<?php echo $row['id_donasi'] ?>">Hapus</button></td>
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
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data donasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="kegiatan">ID donasi</label>
							<input type="text" name="id_baru" id="id_baru" class="form-control form-control-sm" placeholder="kegiatan Anda">
						</div>
						<div class="form-group">
							<label for="kegiatan">Jenis Kegiatan</label>
							<input type="text" name="kegiatan_baru" id="kegiatan_baru" class="form-control form-control-sm" placeholder="kegiatan Anda">
						</div>
                        <div class="form-group">
							<label for="donasi">donasi</label>
							<input type="text" name="donasi_baru" id="donasi_baru" class="form-control form-control-sm" placeholder="donasi Baru">
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
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Data donasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="kegiatan">ID donasi</label>
							<input type="text" name="id_donasi" id="id_donasi" class="form-control form-control-sm" readonly>
						</div>
						<div class="form-group">
							<label for="kegiatan">Jenis Kegiatan</label>
							<input type="text" name="kegiatan" id="kegiatan" class="form-control form-control-sm" placeholder="kegiatan Anda">
						</div>
                        <div class="form-group">
							<label for="donasi">donasi</label>
							<input type="number" name="donasi" id="donasi" class="form-control form-control-sm" placeholder="donasi Kegiatan">
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
					<h5 class="modal-title" id="exampleModalLongTitle">Hapus Data donasi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
					Apakah anda akan menghapus data donasi ini?
					<input type="hidden" name="id_donasi" id="id_donasi_hapus" class="form-control form-control-sm" readonly>
						
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="hapus" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<?php include "js-script.php"; ?>
	<script>
		$('#myTable').DataTable();
		$('#myTable tbody').on('click', '.btnEdit', function () {
			var iddonasi = $(this).attr('data-id');
			$.ajax({
				url: 'ajax.php',
				type: 'post',
				data: {
					editdonasi: true,
					id_donasi: iddonasi
				},
				dataType: 'json',
				success: function (result) {
					console.log(result);
					$("#id_donasi").val(iddonasi);
					$("#kegiatan").val(result.kegiatan);
                    $("#donasi").val(result.donasi);
				}
			});
		});
		$('#myTable tbody').on('click', '.btnHapus', function () {
			var iddonasi = $(this).attr('data-id');
			$("#id_donasi_hapus").val(iddonasi);
		});
	</script>
</body>

</html>