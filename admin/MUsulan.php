<?php 
	$filename = basename(__FILE__);
	$dir = basename(__DIR__);
	include "../koneksi.php";
	include "../function.php";
	check_session($dir."/".$filename);

	// proses edit
	if(isset($_POST['edit'])){
		$id = $_POST['id_usulan'];
		$judul = $_POST['judul_buku'];
		$pengarang = $_POST['pengarang'];
		$penerbit = $_POST['penerbit'];
		$tahun = $_POST['tahun'];
		$status = $_POST['status_usulan'];
		//echo "UPDATE usulan SET kegiatan_usulan='$kegiatan',kelas='$kelas',alamat='$alamat',status='$status' WHERE id_usulan='$id'";
		$query = mysqli_query($conn, "UPDATE usulan SET judul_buku='$judul', pengarang = '$pengarang', penerbit='$penerbit', tahun = '$tahun', status_usulan = '$status' WHERE id_usulan='$id'");
	}
	if(isset($_POST['hapus'])){
		$id = $_POST['id_usulan'];
		//echo "UPDATE usulan SET status = 'Tidak Aktif' WHERE id_usulan = '".$id."'";
		$query = mysqli_query($conn, "DELETE from usulan WHERE id_usulan = '".$id."'");
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
		<div class="header bg-primary" style="background-color: #B0C4DE !important">
			<div class="container-fluid">
				<div class="header-body">
					<div class="row align-items-center py-4">
						<div class="col-lg-6 col-7">
							<h6 class="h2 text-white d-inline-block mb-0">USULAN</h6>
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
									<th>Id usulan</th>
									<th>Pengguna</th>
                                    <th>Judul Buku</th>
									<th>Pengarang</th>
									<th>Penerbit</th>
									<th>Tahun</th>
									<th>Status</th>
									<th>Action</th>
								</tr>

							</thead>
							<tbody>

								<?php
								//querynya belum okeh
                  $query = mysqli_query($conn, "SELECT u.id_usulan, p.username, u.judul_buku, u.pengarang, u.penerbit, u.tahun, u.status_usulan from usulan u join pengguna p on u.id_pengguna = p.id_pengguna");
                  //for($row = 0; $row < 10; $row++)) {
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
								<tr>
									<td><?php echo $row['id_usulan'] ?></td>
									<td><?php echo $row['username'] ?></td>
									<td><?php echo $row['judul_buku'] ?></td>
									<td><?php echo $row['pengarang'] ?></td>
									<td><?php echo $row['penerbit'] ?></td>
									<td><?php echo $row['tahun'] ?></td>
									<td><?php echo $row['status_usulan'] ?></td>
									<td><button class="btn btn-success btnEdit" data-toggle="modal"
											data-target="#ModalEdit"
											data-id="<?php echo $row['id_usulan'] ?>">Edit</button>
											<button class="btn btn-danger btnEdit" data-toggle="modal"
											data-target="#ModalHapus"
											data-id="<?php echo $row['id_usulan'] ?>">Hapus</button></td>
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
							<label for="id">ID usulan</label>
							<input type="text" name="id_usulan" id="id_usulan" class="form-control form-control-sm" readonly>
						</div>
						<div class="form-group">
							<label for="nama">Nama Pengguna</label>
							<input type="text" name="nama_pengguna" id="nama_pengguna" class="form-control form-control-sm" readonly>
						</div>
                        <div class="form-group">
							<label for="judul">Judul Buku</label>
							<input type="text" name="judul_buku" id="judul_buku" class="form-control form-control-sm" placeholder="Judul Buku">
						</div>
						<div class="form-group">
							<label for="pengarang">Pengarang</label>
							<input type="text" name="pengarang" id="pengarang" class="form-control form-control-sm" placeholder="Pengarang">
						</div>
						<div class="form-group">
							<label for="penerbit">Penerbit</label>
							<input type="text" name="penerbit" id="penerbit" class="form-control form-control-sm" placeholder="Penerbit">
						</div>
						<div class="form-group">
							<label for="tahun">Tahun</label>
							<input type="text" name="tahun" id="tahun" class="form-control form-control-sm" placeholder="Tahun">
						</div>
						<div class="form-group">
							<label for="status">Status</label>
							<select name="status_usulan" id="status_usulan" class="form-control form-control-sm">
								<option value="Proses">Proses</option>
								<option value="Selesai">Selesai</option>
							</select>
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
					$("#nama_pengguna").val(result.username);
					$("#judul_buku").val(result.judul_buku);
                    $("#pengarang").val(result.pengarang);
					$("#penerbit").val(result.penerbit);
					$("#tahun").val(result.tahun);
					$("#status").val(result.status_usulan);
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