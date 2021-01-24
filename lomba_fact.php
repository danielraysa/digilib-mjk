<?php $filename = basename(__FILE__); ?>
<?php include 'koneksi.php'; ?>
<?php include 'function.php'; ?>
<?php
if(isset($_POST['tambah_lomba'])){
		$id = $_POST['id_baru'];
		$judul = $_POST['judul_baru'];
		$poster= '';
		
		$keterangan= $_POST['ket_baru'];
		$tgl = $_POST['tgl_baru'];
		if(file_exists($_FILES['poster']['tmp_name'])){
			$target_poster = $target_dir . basename($_FILES['poster']['name']);
			$imageCoverType = strtolower(pathinfo($target_poster,PATHINFO_EXTENSION));
			if (file_exists($target_poster) || strlen(basename($_FILES['poster']['name'])) >= 100) {
				$target_poster = $target_dir . generateRandomString() .".". $imageCoverType;
			}
			if (move_uploaded_file($_FILES['poster']['tmp_name'], $target_poster)) {
				// echo "The file ". htmlspecialchars(basename( $_FILES['poster']['name'])). " has been uploaded.";
			} else {
				var_dump($_FILES['poster']['error']);
				echo "Sorry, there was an error uploading your file.";
				exit;
			}
			$poster = $target_poster;
		}
		$query = mysqli_query($conn, "INSERT INTO lomba VALUES ('$id','$judul','$poster','$keterangan','$tgl')");
		if(!$query){
			echo mysqli_error($conn);
		}
  }?>
  <?php 
$query = mysqli_query($conn, "SELECT MAX(id_daftar) as iddaftar FROM daftar");
$data = mysqli_fetch_array($query);
$kode = $data['iddaftar'];

$urut = (int) substr($kode,2,3);
$urut++;
$huruf = "LD";
$kode = $huruf.sprintf("%03s", $urut);
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
					<h1 class="mb-0 bread">LOMBA</h1>
				</div>
			</div>
		</div>
	</section>


    <section class="ftco-section ftco-degree-bg">
    <?php 
    //  $lomba_id = $_SESSION['lomba_id'];
					$query_lomba1 = mysqli_query($conn, "SELECT * FROM lomba ");
					while ($row = mysqli_fetch_array($query_lomba1)) {
				?>
      <div class="container">

        <div class="row">
          <div class="ftco-animate">
          	<p><center>
              <img src="<?php echo substr($row['poster'],3) ?>" alt="" class="img-fluid"></center>
            </p>
            <h2 class="mb-3"><center><?php echo $row['judul_lomba'] ?></center></h2>
            <p><?php echo $row['keterangan'] ?></p>
            </div>
            <div class="col-lg-6 col-5 text-right">
							<a href="#" class="btn btn-sm btn-neutral" data-toggle="modal"
								data-target="#ModalTambahlomba">Daftar</a>
						</div>
            




          </div> <!-- .col-md-8 -->
          

           
          </div>
          <?php }?>
    </section>
    <!-- Modal Tambah lomba-->
	<div class="modal fade" id="ModalTambahlomba" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Daftar Lomba</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post" enctype="multipart/form-data">
				<div class="modal-body">
					<div class="form-group">
						<label for="id">ID Lomba</label>
						<input type="text" name="id_baru" id="id_baru" class="form-control form-control-sm" placeholder="Id" value ="<?php echo $kode?>" readonly>
					</div>

					<div class="form-group">
						<label for="judul">Nama</label>
						<input type="text" name="judul_baru" id="judul_baru" class="form-control form-control-sm" placeholder="Nama Lengkap">
					</div>
					<div class="form-group">
							<label for="kelas">Kelas</label>
							<select name="kategori" id="kategori_baru" class="form-control form-control-sm">
							<option value="">Pilih Kelas</option>
							<?php 
								$query_kat = mysqli_query($conn, "SELECT * FROM kelas");
								while ($row = mysqli_fetch_array($query_kat)) {
							?>
								<option value="<?php echo $row['id_kelas']; ?>"><?php echo $row['nama_kelas'] ?></option>
							<?php } ?>
						</select>
						</div>
					<div class="form-group">
						<label for="keterangan">Judul Karya</label>
						<input type="text" name="ket_baru" id="ket_baru" class="form-control form-control-sm" rows="4" placeholder="Keterangan"></textarea>
					</div>
					<div class="form-group">
						<label for="file">File</label>
						<input type="file" accept=".pdf" name="file" id="file_baru" class="form-control form-control-sm" placeholder="File Koleksi" />
					</div>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="tambah_lomba" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>

	<footer class="ftco-footer">
		
		<?php include "footer.php"; ?>
	</footer>

  <?php include "js-script.php"; ?>
  div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
  <script src="js/main.js"></script>

</body>
</html>