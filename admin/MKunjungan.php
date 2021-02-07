<?php 
$filename = basename(__FILE__);
$dir = basename(__DIR__);
include "../koneksi.php";
include "../function.php";
check_session($dir."/".$filename);
//tanggal auto
$tgl = date('Y-m-d');
// poses tambah
	// if(isset($_POST['tambah'])){
	// 	$id = $_POST['id_kunjungan'];
    //     $kegiatan = $_POST['kegiatan_baru'];
    //     $angka = $_POST['kunjungan_baru'];
	// 	$query = mysqli_query($conn, "INSERT INTO kunjungans VALUES ('$id','$kegiatan','$angka')");
	// 	echo "string";
	// }
	// proses edit
	if(isset($_POST['edit'])){
		$id = $_POST['id_kunjungan'];
        $nama = $_POST['nama'];
		$instansi = $_POST['instansi'];
		$status = $_POST['status'];
		$keterangan = $_POST['keterangan'];
		//echo "UPDATE kunjungan SET kegiatan_kunjungan='$kegiatan',kelas='$kelas',alamat='$alamat',status='$status' WHERE id_kunjungan='$id'";
		$query = mysqli_query($conn, "UPDATE kunjungans SET id_kunjungan='$id', nama='$nama', instansi='$instansi', status ='$status', keterangan='$keterangan', tgl=$tgl WHERE id_kunjungan='$id'");
	}
	if(isset($_POST['hapus'])){
		$id = $_POST['id_kunjungan'];
		//echo "UPDATE kunjungan SET status = 'Tidak Aktif' WHERE id_kunjungan = '".$id."'";
		$query = mysqli_query($conn, "DELETE from kunjungan WHERE id_kunjungan = '".$id."'");
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
							<h6 class="h2 text-white d-inline-block mb-0">Kunjungan</h6>
						</div>
						<div class="col-lg-6 col-5 text-right">
							<h6 class="h2 text-white d-inline-block mb-0">Kunjungan</h6>
							
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
									<!-- <th>Id Kunjungan</th> -->
									<th>tanggal</th>
									<th>nama</th>
									<th>instansi</th>
									<th>status</th>
									<th>keterangan</th>

								</tr>

							</thead>
							<tbody>

								<?php
                  $query = mysqli_query($conn, "SELECT * from kunjungan");
                  //for($row = 0; $row < 10; $row++)) {
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
								<tr>
									<td><?php echo $row['tgl'] ?></td>
									<td><?php echo $row['nama'] ?></td>
									<td><?php echo $row['instansi'] ?></td>
									<td><?php echo $row['status'] ?></td>
									<td><?php echo $row['keterangan'] ?></td>
									
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
	<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Data kunjungan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="kegiatan">ID kunjungan</label>
							<input type="text" name="id_kunjungan" id="id_kunjungan" class="form-control form-control-sm" readonly>
						</div>
						<div class="form-group">
							<label for="nama">Nama</label>
							<input type="text" name="nama" id="nama" class="form-control form-control-sm" placeholder="nama Anda">
						</div>
                        <div class="form-group">
							<label for="instansi">Instansi</label>
							<input type="text" name="instansi" id="instansi" class="form-control form-control-sm" placeholder="kunjungan Kegiatan">
						</div>
						<div class="form-group">
							<label for="status">Status</label>
							<select id="status" name="status" class="form-control form-control-sm">
								<option value="">-- Pilih Status --</option>
								<option value="Siswa">Siswa</option>
								<option value="Guru/Staff">Guru/Staff</option>
								<option value="Alumni">Alumni</option>
								<option value="Pengunjung Luar">Pengunjung Luar</option>
							</select>
						</div>
						<div class="form-group">
							<label for="keterangan">Keterangan</label>
							<select class="form-control form-control-sm" id="keterangan" name="keterangan" rows="3" placeholder="Keterangan Kunjungan">
								<option value="">-- Pilih Keterangan --</option>
								<option value="Kunjungan">Kunjungan</option>
								<option value="Membaca Buku">Membaca Buku</option>
								<option value="Peminjaman Buku">Peminjaman Buku</option>
								<option value="Belajar Bersama">Belajar Bersama</option>
								<option value="Lain-lain">Lain-lain</option>
							</select>
						</div>
                        <!-- <div class="form-group">
							<label for="tanggal">Tanggal</label>
							<input type="date" name="tanggal" id="tanggal" class="form-control form-control-sm" placeholder="kunjungan Kegiatan" readonly>
						</div> -->
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
					<h5 class="modal-title" id="exampleModalLongTitle">Hapus Data kunjungan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
					Apakah anda akan menghapus data kunjungan ini?
					<input type="hidden" name="id_kunjungan" id="id_kunjungan_hapus" class="form-control form-control-sm" readonly>
						
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
			var idkunjungan = $(this).attr('data-id');
			$.ajax({
				url: 'ajax.php',
				type: 'post',
				data: {
					editkunjungan: true,
					id_kunjungan: idkunjungan
				},
				dataType: 'json',
				success: function (result) {
					console.log(result);
					$("#id_kunjungan").val(idkunjungan);
					$("#nama").val(result.nama);
                    $("#instansi").val(result.instansi);
					$("#status").val(result.status);
					$("#keterangan").val(result.keterangan);
					// $("#tgl").val(result.);
				}
			});
		});
		$('#myTable tbody').on('click', '.btnHapus', function () {
			var idkunjungan = $(this).attr('data-id');
			$("#id_kunjungan_hapus").val(idkunjungan);
		});
	</script>
</body>

</html>