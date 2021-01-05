<?php include "koneksi.php"; ?>
<?php 
// poses tambah
	if(isset($_POST['tambah'])){
		$id = $_POST['id_baru'];
        $kegiatan = $_POST['kegiatan_baru'];
        $angka = $_POST['usulan_baru'];
		$query = mysqli_query($conn, "INSERT INTO usulans VALUES ('$id','$kegiatan','$angka')");
		echo "string";
	}
	// proses edit
	if(isset($_POST['edit'])){
		$id = $_POST['id_usulan'];
        $kegiatan = $_POST['jenis_kegiatan'];
        $usulan = $_POST['usulan'];
		//echo "UPDATE usulan SET kegiatan_usulan='$kegiatan',kelas='$kelas',alamat='$alamat',status='$status' WHERE id_usulan='$id'";
		$query = mysqli_query($conn, "UPDATE usulans SET jenis_kegiatan='$kegiatan', usulan='$angka' WHERE id_usulan='$id'");
	}
	if(isset($_POST['hapus'])){
		$id = $_POST['id_usulan'];
		//echo "UPDATE usulan SET status = 'Tidak Aktif' WHERE id_usulan = '".$id."'";
		$query = mysqli_query($conn, "DELETE from usulans WHERE id_usulan = '".$id."'");
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
		<!-- Header -->
		<div class="header bg-primary" style="background-color: green !important">
			<div class="container-fluid">
				<div class="header-body">
					<div class="row align-items-center py-4">
						<div class="col-lg-6 col-7">
							<h6 class="h2 text-white d-inline-block mb-0">usulan</h6>
						</div>
						<div class="col-lg-6 col-5 text-right">
							<h6 class="h2 text-white d-inline-block mb-0">usulan</h6>
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
									<th>Id usulan</th>
									<th>Jenis Kegiatan</th>
                                    <th>usulan</th>
								</tr>

							</thead>
							<tbody>

								<?php
                  $query = mysqli_query($conn, "SELECT * from usulans");
                  //for($row = 0; $row < 10; $row++)) {
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
								<tr>
									<td><?php echo $row['id_usulan'] ?></td>
									<td><?php echo $row['jenis_kegiatan'] ?></td>
									<td><?php echo $row['usulan'] ?></td>
									<td><button class="btn btn-success btnEdit" data-toggle="modal"
											data-target="#ModalEdit"
											data-id="<?php echo $row['id_usulan'] ?>">Edit</button>
											<button class="btn btn-success btnEdit" data-toggle="modal"
											data-target="#ModalHapus"
											data-id="<?php echo $row['id_usulan'] ?>">Hapus</button></td>
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
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data usulan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="kegiatan">ID usulan</label>
							<input type="text" name="id_baru" id="id_baru" class="form-control form-control-sm" placeholder="kegiatan Anda">
						</div>
						<div class="form-group">
							<label for="kegiatan">Jenis Kegiatan</label>
							<input type="text" name="kegiatan_baru" id="kegiatan_baru" class="form-control form-control-sm" placeholder="kegiatan Anda">
						</div>
                        <div class="form-group">
							<label for="usulan">usulan</label>
							<input type="text" name="usulan_baru" id="usulan_baru" class="form-control form-control-sm" placeholder="usulan Baru">
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
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Data usulan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="kegiatan">ID usulan</label>
							<input type="text" name="id_usulan" id="id_usulan" class="form-control form-control-sm" readonly>
						</div>
						<div class="form-group">
							<label for="kegiatan">Jenis Kegiatan</label>
							<input type="text" name="kegiatan" id="kegiatan" class="form-control form-control-sm" placeholder="kegiatan Anda">
						</div>
                        <div class="form-group">
							<label for="usulan">usulan</label>
							<input type="number" name="usulan" id="usulan" class="form-control form-control-sm" placeholder="usulan Kegiatan">
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
					<h5 class="modal-title" id="exampleModalLongTitle">Hapus Data usulan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
					Apakah anda akan menghapus data usulan ini?
					<input type="hidden" name="id_usulan" id="id_usulan_hapus" class="form-control form-control-sm" readonly>
						
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
			var idusulan = $(this).attr('data-id');
			$.ajax({
				url: 'ajax.php',
				type: 'post',
				data: {
					editusulan: true,
					id_usulan: idusulan
				},
				dataType: 'json',
				success: function (result) {
					console.log(result);
					$("#id_usulan").val(idusulan);
					$("#kegiatan").val(result.kegiatan);
                    $("#usulan").val(result.usulan);
				}
			});
		});
		$('#myTable tbody').on('click', '.btnHapus', function () {
			var idusulan = $(this).attr('data-id');
			$("#id_usulan_hapus").val(idusulan);
		});
	</script>
</body>
</html>