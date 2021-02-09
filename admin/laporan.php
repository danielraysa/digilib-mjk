
<?php include "../koneksi.php"; ?>

<?php
$query1= mysqli_query($conn, "SELECT count(id_siswa)idSiswa FROM siswa");
$data1= mysqli_fetch_array($query1);
$siswa = $data1['idSiswa'];

$query2= mysqli_query($conn, "SELECT count(id_karyawan)idKaryawan FROM karyawan");
$data2= mysqli_fetch_array($query2);
$karya = $data2['idKaryawan'];

$query3= mysqli_query($conn, "SELECT kategori.nama_kategori as namaKat, count(koleksi.id_koleksi) as id FROM kategori 
join koleksi where kategori.id_kategori=koleksi.id_kategori");
$data3= mysqli_fetch_array($query3);
$kat = $data3['namaKat'];
$id=$data3['id'];

$query4= mysqli_query($conn, "SELECT count(id_ses_kunjungan)idSiswa FROM siswa join pengguna on siswa.id_pengguna=pengguna.id_pengguna 
join session_kunjungan ON pengguna.id_pengguna=session_kunjungan.id_pengguna ");
$data4= mysqli_fetch_array($query4);
$siswa1 = $data4['idSiswa'];

$query5= mysqli_query($conn, "SELECT count(id_ses_kunjungan)idKaryawan FROM karyawan join pengguna on karyawan.id_pengguna=pengguna.id_pengguna 
join session_kunjungan ON pengguna.id_pengguna=session_kunjungan.id_pengguna");
$data5= mysqli_fetch_array($query5);
$karya2 = $data5['idKaryawan'];

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
							<h6 class="h2 text-white d-inline-block mb-0">Laporan</h6>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid mt-3">

			<!-- Card stats -->
			<form action="">
			<div class="row">
				<div class="col-lg-3">
				<div class="form-group">
					<label for="laporan">Laporan</label>
					<select name="laporan" id="laporan" class="form-control form-control-sm">
						<option value="0">Pilih Laporan</option>
						<option value="1">Pengguna</option>
						<option value="2">Daftar Donasi</option>
						<option value="3">Daftar Kunjungan</option>
						<option value="4">Daftar point Pengguna</option>
						<option value="5">Daftar Usulan</option>
						<option value="6">Daftar Pengunjung</option>
					</select>
				</div>
				</div>
				<div class="col-lg-3">
					<button type="Submit" name="tambah"class="btn btn-primary">Tampilkan</button>
				</div>
			</div>
			</form>
			<?php
			if(isset($_GET['laporan']) && !empty($_GET['laporan'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
				$laporan = $_GET['laporan']; // Ambil data filder yang dipilih user
				if($laporan == '1'){
					?>
				<a href="export.php?cetak=pengguna" target="_blank" class="btn btn-secondary btnprint">Cetak</a>
				<div class="col-xl-12 col-md-12">
					<div class="card card-stats">
						<div class="card-body table-responsive">
							<!-- Card body -->
							
							<div class ="row">
							<div class="col-md-5"><right>
							<a class="navbar-brand" href="javascript:void(0)" style="padding: 0.5rem !important">
							<img src="img/brand/logo.png" class="navbar-brand-img" alt="..." style="max-height: 5rem !important">
							</a></right>
							</div>
							<div class = "col-md-7">
							<br>
							<left><h1>LAPORAN PERPUSTAKAAN MAN 2 MOJOKERTO</h1></left>
							</div>
							</div>
							
							<br></br>
							<h3>Anggota</h3>
							<table id="Tabel1" class="table table-bordered">
								<thead>
									<tr>
										<th>Jenis Anggota</th>
										<th>Jumlah</th>						
									</tr>

								</thead>
								<tbody>

									<tr>
										<td>Siswa</td>
										<td><?php echo $siswa?></td>
									</tr>
									<tr>
										<td>Staff/Guru</td>
										<td><?php echo $karya?></td>
									</tr>
								</tbody>
							</table>
							<br>
							<h3>Koleksi</h3>
							<table id="Tabel2" class="table table-bordered">
								<thead>
									<tr>
										<th>Jenis Koleksi</th>
										<th>Jumlah Judul</th>						
									</tr>

								</thead>
								<tbody>

									<tr>
										<td><?php echo $kat?></td>
										<td><?php echo $id?></td>
									</tr>
									
								</tbody>
							</table>
							<br>
							<h3>Kunjungan</h3>
							<table id="Tabel3" class="table table-bordered">
								<thead>
									<tr>
										<th>Jenis Anggota</th>
										<th>Jumlah Kunjungan</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Siswa</td>
										<td><?php echo $siswa1?></td>
									</tr>
									<tr>
										<td>Karyawan</td>
										<td><?php echo $karya2?></td>
									</tr>
								</tbody>
							</table>
							<!-- <button class="btn btn-secondary btnprint" data-toggle="modal" data-target="#cetak">Cetak</button> -->
						
			<?php
				}else if($laporan == '2'){
					
			?>
			<a href="export.php?cetak=donasi" target="_blank" class="btn btn-secondary btnprint">Cetak</a>
			<h2>Daftar Donasi</h2>
			<table id="myTable1" class="table table-bordered">
							<thead>
								<tr>
									<th>Judul Buku</th>
									<th>Pengarang</th>
                                    <th>Penerbit</th>
									<th>tahun</th>
									<th>jumlah</th>
								</tr>

							</thead>
							<?php
							$query = mysqli_query($conn, "SELECT * from donasi");
							//for($row = 0; $row < 10; $row++)) {
							while ($row = mysqli_fetch_array($query)) {
							?>
							<tbody>

								<tr>
									<td><?php echo $row['judul_buku'] ?></td>
									<td><?php echo $row['pengarang'] ?></td>
									<td><?php echo $row['penerbit'] ?></td>
									<td><?php echo $row['tahun'] ?></td>
									<td><?php echo $row['jumlah'] ?></td>									
								</tr>
								<?php } ?>
							</tbody>
							
						</table>
			<?php
			
					}else if($laporan == '3'){
						
					?>
					<h2>Daftar Kunjungan</h2>
			<table id="myTable2" class="table table-bordered">
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
							<?php
							$query = mysqli_query($conn, "SELECT * from kunjungan");
							//for($row = 0; $row < 10; $row++)) {
							while ($row = mysqli_fetch_array($query)) {
							?>
							<tbody>
								<tr>
									<td><?php echo $row['tgl'] ?></td>
									<td><?php echo $row['nama'] ?></td>
									<td><?php echo $row['instansi'] ?></td>
									<td><?php echo $row['status'] ?></td>
									<td><?php echo $row['keterangan'] ?></td>
									
								</tr>
								<?php } ?>
							</tbody>
							<a href="export.php?cetak=laporan-all" target="_blank" class="btn btn-secondary btnprint">Cetak</a>
						</table>
				<?php
				}else if($laporan == '4'){
					
				?>
				<h2>Daftar Point Pengguna</h2>
				<table id="myTable3" class="table table-bordered" >
						<thead>
							<tr>
								
								<th>Pengguna</th>
								<th>Jenis Kegiatan</th>
								<th>Point</th>
							</tr>

						</thead>
						<?php
							$query = mysqli_query($conn, "SELECT id_ppengguna, username, jenis_kegiatan, point from pengguna p join point_pengguna pp on p.id_pengguna=pp.id_pengguna join points pt on pp.id_point=pt.id_point");
							//for($row = 0; $row < 10; $row++)) {
							while ($row = mysqli_fetch_array($query)) {
							?>
						<tbody>
							<tr>
								<td><?php echo $row['username'] ?></td>
								<td><?php echo $row['jenis_kegiatan'] ?></td>
								<td><?php echo $row['point'] ?></td>
								
							</tr>
							<?php } ?>
						</tbody>
						<a href="export.php?cetak=laporan-all" target="_blank" class="btn btn-secondary btnprint">Cetak</a>
					</table>
					<?php }else if($laporan == '4'){?>
						<table id="myTable4" class="table table-bordered">
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
											</td>
								</tr>
								<?php } ?>
							</tbody>
							<a href="export.php?cetak=laporan-all" target="_blank" class="btn btn-secondary btnprint">Cetak</a>
						</table>
						<?php 
						}else if($laporan == '5'){?>
						<table id="myTable5" class="table table-bordered">
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
											</td>
								</tr>
								<?php } ?>
							</tbody>
							<a href="export.php?cetak=laporan-all" target="_blank" class="btn btn-secondary btnprint">Cetak</a>
						</table>
						<?php 
						}else if($laporan == '6'){?>
						<table id="myTable6" class="table table-bordered">
							<thead>
								<tr>
									<!-- <th>Id Kunjungan</th> -->
									<th>tanggal</th>
									<th>nama</th>
									<th>status</th>
									<th>keterangan</th>

								</tr>

							</thead>
							<?php
							$query = mysqli_query($conn, "SELECT * from kunjungan");
							//for($row = 0; $row < 10; $row++)) {
							while ($row = mysqli_fetch_array($query)) {
							?>
							<tbody>
								<tr>
									<td><?php echo $row['tgl'] ?></td>
									<td><?php echo $row['nama'] ?></td>
									<td><?php echo $row['instansi'] ?></td>
									<td><?php echo $row['status'] ?></td>
									<td><?php echo $row['keterangan'] ?></td>
									
								</tr>
								<?php } ?>
							</tbody>
							<a href="export.php?cetak=laporan-all" target="_blank" class="btn btn-secondary btnprint">Cetak</a>
						</table>
						<?php }?>
				</div>
			<?php include "footer.php"; ?>
		</div>
	</div>
	<!-- Modal lomba -->
	
	<?php include "js-script.php"; ?>
	<!-- <script>
		
		$('#Tabel2').DataTable();
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
		
	</script> -->
<?php
}
?>
</body>
</html>