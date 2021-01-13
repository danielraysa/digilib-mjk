<?php include "../koneksi.php"; ?>
<?php 
$query = mysqli_query($conn, "SELECT MAX(id_point) as idpoint FROM points");
$data = mysqli_fetch_array($query);
$kode = $data['idpoint'];

$urut = (int) substr($kode,2,3);
$urut++;
$huruf = "PO";
$kode = $huruf.sprintf("%03s", $urut);
?>
<?php 
// poses tambah
	if(isset($_POST['tambah'])){
		$id = $_POST['id_baru'];
        $kegiatan = $_POST['kegiatan_baru'];
        $angka = $_POST['point_baru'];
		$query = mysqli_query($conn, "INSERT INTO points VALUES ('$id','$kegiatan','$angka','Aktif')");
		//echo "string";
	}
	// proses edit
	if(isset($_POST['edit'])){
		$id = $_POST['id_point'];
        $kegiatan = $_POST['jenis_kegiatan'];
        $point = $_POST['point'];
		//echo "UPDATE point SET kegiatan_point='$kegiatan',kelas='$kelas',alamat='$alamat',status='$status' WHERE id_point='$id'";
		$query = mysqli_query($conn, "UPDATE points SET jenis_kegiatan = '$kegiatan', point = '$point' WHERE id_point = '$id'");
	}
	if(isset($_POST['hapus'])){
		$id = $_POST['id_point'];
		// echo "UPDATE point SET status = 'Tidak Aktif' WHERE id_point = '".$id."'";
		$query = mysqli_query($conn, "DELETE from points WHERE id_point = '".$id."'");
	}
?>
<!DOCTYPE html>
<html>
<!-- form asli -->
<head>
	<?php include 'css-script.php'; ?>
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
							<h6 class="h2 text-white d-inline-block mb-0">Point</h6>
						</div>
						<div class="col-lg-6 col-5 text-right">
							<h6 class="h2 text-white d-inline-block mb-0">Point</h6>
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
						<div class="card-body table-responsive">
							<table id="myTable" class="table table-bordered">
								<thead>
									<tr>
										<th>Id point</th>
										<th>Jenis Kegiatan</th>
										<th>Point</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
					$query = mysqli_query($conn, "SELECT * from points");
					//for($row = 0; $row < 10; $row++)) {
					while ($row = mysqli_fetch_array($query)) {
					?>
									<tr>
										<td><?php echo $row['id_point'] ?></td>
										<td><?php echo $row['jenis_kegiatan'] ?></td>
										<td><?php echo $row['point'] ?></td>
										<td><button class="btn btn-success btnEdit" data-toggle="modal"
												data-target="#ModalEdit"
												data-id="<?php echo $row['id_point'] ?>">Edit</button>
												<button class="btn btn-danger btnHapus" data-toggle="modal"
												data-target="#ModalHapus"
												data-id="<?php echo $row['id_point'] ?>">Hapus</button></td>
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
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data point</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="kegiatan">ID Point</label>
							<input type="text" name="id_baru" id="id_baru" class="form-control form-control-sm" placeholder="kegiatan Anda" value="<?php echo $kode?>" readonly>
						</div>
						<div class="form-group">
							<label for="kegiatan">Jenis Kegiatan</label>
							<input type="text" name="kegiatan_baru" id="kegiatan_baru" class="form-control form-control-sm" placeholder="kegiatan Anda">
						</div>
                        <div class="form-group">
							<label for="point">Point</label>
							<input type="number" name="point_baru" id="point_baru" class="form-control form-control-sm" placeholder="Point Baru">
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
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Data point</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="id">ID Point</label>
							<input type="text" name="id_point" id="id_point" class="form-control form-control-sm" readonly>
						</div>
						<div class="form-group">
							<label for="kegiatan">Jenis Kegiatan</label>
							<input type="text" name="jenis_kegiatan" id="kegiatan" class="form-control form-control-sm" placeholder="kegiatan Anda">
						</div>
                        <div class="form-group">
							<label for="point">Point</label>
							<input type="number" name="point" id="point" class="form-control form-control-sm" placeholder="Point Kegiatan">
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
					<h5 class="modal-title" id="exampleModalLongTitle">Hapus Data point</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
					Apakah anda akan menghapus data point ini?
					<input type="hidden" name="id_point" id="id_point_hapus" class="form-control form-control-sm" readonly>
						
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="hapus" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<?php include 'js-script.php'; ?>
	<script>
		$('#myTable').DataTable();
		$('#myTable tbody').on('click', '.btnEdit', function () {
			var idpoint = $(this).attr('data-id');
			$.ajax({
				url: 'ajax.php',
				type: 'post',
				data: {
					editpoint: true,
					id_point: idpoint
				},
				dataType: 'json',
				success: function (result) {
					console.log(result);
					$("#id_point").val(idpoint);
					$("#kegiatan").val(result.jenis_kegiatan);
                    $("#point").val(result.point);
				}
			});
		});
		$('#myTable tbody').on('click', '.btnHapus', function () {
			var idpoint = $(this).attr('data-id');
			$("#id_point_hapus").val(idpoint);
		});
	</script>
</body>

</html>