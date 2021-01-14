
<?php include "../koneksi.php"; ?>
<?php
$query = mysqli_query($conn, "SELECT MAX(id_event) as idevent FROM event");
$data = mysqli_fetch_array($query);
$kode = $data['idevent'];

$urut = (int) substr($kode,2,3);
$urut++;
$huruf = "T";
$kode = $huruf.sprintf("%03s", $urut);
?>

<?php 
// proses tambah
	if(isset($_POST['tambah_event'])){
		$id = $_POST['id_baru'];
		$judul = $_POST['judul_baru'];
		$gambar= $_POST['gambar_baru'];
		$keterangan= $_POST['ket_baru'];
		$tanggal = $_POST['tanggal_baru'];
		$query = mysqli_query($conn, "INSERT INTO event VALUES ('$id','$judul','$gambar','$keterangan','$tanggal')");
		if(!$query){
			echo mysqli_error($conn);
		}
	}
	// proses edit
	if(isset($_POST['edit_event'])){
		$id = $_POST['id_event'];
		$judul = $_POST['judul_event'];
		$gambar= $_POST['gambar'];
		$keterangan= $_POST['ket'];
		$tanggal = $_POST['tanggal'];
		$query = mysqli_query($conn, "UPDATE event SET judul_event='$judul', gambar='$gambar', keterangan='$keterangan', tanggal='$tanggal' WHERE id_event='$id'") or die (mysqli_error($conn));
	}
	if(isset($_POST['hapus_event'])){
		$id = $_POST['id_event'];
		// echo "UPDATE event SET status = 'Tidak Aktif' WHERE id_event = '".$id."'";
		// $query = mysqli_query($conn, "UPDATE event SET status = 'Tidak Aktif' WHERE id_event = '".$id."'");
		$query = mysqli_query($conn, "DELETE from event WHERE id_event = '".$id."'")  or die (mysqli_error($conn));
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
	<!--event-->
	<div class="main-content" id="panel">
		<!-- Topnav -->
		<?php include "navbar.php"; ?>

		<div class="container-fluid mt-3">

			<!-- Card stats -->
			<div class="row">
				<div class="col-xl-12 col-md-12">
					<div class="card card-stats">
						<div class="card-body table-responsive">
							<h2>Welcome!</h2>
						</div>
					</div>
				</div>
			</div>
			<?php include "footer.php"; ?>
		</div>
	</div>
    
	<?php include "js-script.php"; ?>

</body>
</html>