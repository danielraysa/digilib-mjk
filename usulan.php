<?php include "koneksi.php"; ?>
<?php $filename = basename(__FILE__); ?>
<?php
$query = mysqli_query($conn, "SELECT MAX(id_usulan) as idusulan FROM usulan");
$data = mysqli_fetch_array($query);
$kode = $data['idusulan'];

$urut = (int) substr($kode,2,3);
$urut++;
$huruf = "US";
$kode = $huruf.sprintf("%03s", $urut);
?>

<?php 
//proses tambah
if(isset($_POST['tambah_usulan'])){
	// $id = $_POST['id_baru'];
	$judul = $_POST['judul_buku'];
	$gambar= $_POST['pengarang'];
	$keterangan= $_POST['penerbit'];
	$tanggal = $_POST['tanggal'];
	$query = mysqli_query($conn, "INSERT INTO usulan VALUES ('$kode','$judul','$gambar','$keterangan','$tanggal')");
	if(!$query){
		echo mysqli_error($conn);
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php include "css-script.php"; ?>
</head>

<body>

	<?php include "navbar.php"; ?>

	<section class="hero-wrap hero-wrap-2" style="background-image: url('pengguna/images/bg_5.jpg');"
		data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-center justify-content-center">
				<div class="col-md-9 ftco-animate mb-0 text-center">
					<h1 class="mb-0 bread">Usulan</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="wrapper px-md-4">
						<!-- <div class="row mb-5">
							<div class="col-md-3">
								<div class="dbox w-100 text-center">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-map-marker"></span>
							</div>
							<div class="text">
							<p><span>Address:</span> 198 West 21th Street, Suite 721 New York NY 10016</p>
							</div>
						</div>
							</div>
							<div class="col-md-3">
								<div class="dbox w-100 text-center">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-phone"></span>
							</div>
							<div class="text">
							<p><span>Phone:</span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
							</div>
						</div>
							</div>
							<div class="col-md-3">
								<div class="dbox w-100 text-center">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-paper-plane"></span>
							</div>
							<div class="text">
							<p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
							</div>
						</div>
							</div>
							<div class="col-md-3">
								<div class="dbox w-100 text-center">
							<div class="icon d-flex align-items-center justify-content-center">
								<span class="fa fa-globe"></span>
							</div>
							<div class="text">
							<p><span>Website</span> <a href="#">yoursite.com</a></p>
							</div>
						</div>
							</div>
						</div> -->
						<div class="row no-gutters">
						<div class="card card-stats">
						<div class="card-body table-responsive">
							</div>
						</div>
							<div class="col-md-7">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Form Usulan</h3>
									<form method="POST" id="contactForm" name="contactForm" class="contactForm">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label class="label" for="judul">Judul Buku</label>
													<input type="text" class="form-control" name="judul" id="judul" placeholder="Judul Buku">
												</div>
											</div>
											<div class="col-md-6"> 
												<div class="form-group">
													<label class="label" for="pengarang">Pengarang</label>
													<input type="text" class="form-control" name="pengarang" id="pengarang" placeholder="Pengarang">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="penerbit">Penerbit</label>
													<input type="text" class="form-control" name="penerbit" id="penerbit" placeholder="Penerbit">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<label class="label" for="tahun">Tahun Terbit</label>
													<input type="text" name="tahun" class="form-control" id="tahun" placeholder="Tahun Terbit"></input>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="submit" name ="tambah_usulan" value="Send" class="btn btn-primary">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
							
							<div class="col-md-5 order-md-first d-flex align-items-stretch">
								<div id="map" class="map"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer class="ftco-footer">
		
		<?php include "footer.php"; ?>
	</footer>

	<?php include "js-script.php"; ?>

</body>

</html>