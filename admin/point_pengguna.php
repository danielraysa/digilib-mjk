<?php include "../koneksi.php"; ?>

<?php 

	// proses edit
	// if(isset($_POST['edit'])){
	// 	$id = $_POST['Point Pengguna'];
 //        $id_pengguna = $_POST['id_pengguna'];
	// 	$judul = $_POST['judul_buku'];
	// 	$pengarang = $_POST['pengarang'];
	// 	$penerbit = $_POST['penerbit'];
	// 	$tahun = $_POST['tahun'];
	// 	//echo "UPDATE Point Pengguna SET Point Pengguna='$kegiatan',kelas='$kelas',alamat='$alamat',status='$status' WHERE Point Pengguna='$id'";
	// 	$query = mysqli_query($conn, "UPDATE Point Pengguna SET judul_buku='$judul', pengarang = '$pengarang', penerbit='$penerbit', tahun '$tahun' WHERE Point Pengguna='$id'");
	// }
	if(isset($_POST['hapus'])){
		$id = $_POST['Point Pengguna'];
		//echo "UPDATE Point Pengguna SET status = 'Tidak Aktif' WHERE Point Pengguna = '".$id."'";
		$query = mysqli_query($conn, "DELETE from Point Pengguna WHERE Point Pengguna = '".$id."'");
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
							<h6 class="h2 text-white d-inline-block mb-0">Point Pengguna</h6>
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
									
									<th>Pengguna</th>
                                    <!-- <th>Jenis Kegiatan</th> -->
									<th>Point</th>
									<th>Jumlah Point</th>
									<th>Action</th>
								</tr>

							</thead>
							<tbody>

								<?php
								//querynya belum okeh
                  $query = mysqli_query($conn, "SELECT p.username, pp.id_point, pp.tgl_peroleh from pengguna p join point_pengguna pp on p.id_pengguna=pp.id_pengguna join points pt on pp.id_point=pt.id_point");
                  //for($row = 0; $row < 10; $row++)) {
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
								<tr>
									<td><?php echo $row['username'] ?></td>
									<!-- <td><?php //echo $row['jenis_kegiatan'] ?></td> -->
									<td><?php echo $row['id_point'] ?></td>
									<td><?php echo $row['tgl_peroleh'] ?></td>
									<td><!-- <button class="btn btn-success btnEdit" data-toggle="modal"
											data-target="#ModalEdit"
											data-id="<?php echo $row['Point Pengguna'] ?>">Edit</button> -->
											<button class="btn btn-danger btnEdit" data-toggle="modal"
											data-target="#ModalHapus"
											data-id="<?php echo $row['Point Pengguna'] ?>">Hapus</button></td>
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
	
	<!-- Modal Edit -->
	<!-- <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Data Point Pengguna</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="id">ID Point Pengguna</label>
							<input type="text" name="Point Pengguna" id="Point Pengguna" class="form-control form-control-sm" readonly>
						</div>
						<div class="form-group">
							<label for="nama">Pengguna</label>
							<input type="text" name="nama" id="nama" class="form-control form-control-sm" readonly>
						</div>
                        <div class="form-group">
							<label for="jk">Jenis Kegiatan</label>
							<input type="text" name="jenis_kegiatan" id="jenis_kegiatan" class="form-control form-control-sm" placeholder="Jenis Kegiatan">
						</div>
						<div class="form-group">
							<label for="point">Point</label>
							<input type="text" name="point" id="point" class="form-control form-control-sm" placeholder="Point">
						</div>
						<div class="form-group">
							<label for="penerbit">Penerbit</label>
							<input type="text" name="penerbit" id="penerbit" class="form-control form-control-sm" placeholder="Penerbit">
						</div>
						<div class="form-group">
							<label for="tahun">Tahun</label>
							<input type="text" name="tahun" id="tahun" class="form-control form-control-sm" placeholder="Tahun">
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="edit" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div> -->
		<!-- modal hapus -->
		<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Point Pengguna</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
					Apakah anda akan menghapus data Point Pengguna ini?
					<input type="hidden" name="Point Pengguna" id="Point Pengguna_hapus" class="form-control form-control-sm" readonly>
						
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
		// $('#myTable tbody').on('click', '.btnEdit', function () {
		// 	var Point_Pengguna = $(this).attr('data-id');
		// 	$.ajax({
		// 		url: 'ajax.php',
		// 		type: 'post',
		// 		data: {
		// 			Point_Pengguna: true,
		// 			Point_Pengguna: Point Pengguna
		// 		},
		// 		dataType: 'json',
		// 		success: function (result) {
		// 			console.log(result);
		// 			$("#Point Pengguna").val(Point Pengguna);
		// 			$("#").val(result.kegiatan);
		// 			$("#judul").val(result.judul_buku);
  //                   $("#pengarang").val(result.pengarang);
		// 			$("#penerbit").val(result.penerbit);
		// 			$("#tahun").val(result.tahun);
		// 		}
		// 	});
		// });
		$('#myTable tbody').on('click', '.btnHapus', function () {
			var Point_Pengguna = $(this).attr('data-id');
			$("#Point Pengguna_hapus").val(Point_Pengguna);
		});
	</script>
</body>
</html>