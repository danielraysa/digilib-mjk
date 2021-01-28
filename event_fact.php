<?php 
	$filename = basename(__FILE__);
	include 'koneksi.php'; 
	include 'function.php'; 
	
	
	if(!isset($_GET['id'])){
		header('location:index.php');
		exit;
	}else{
		$id_event = $_GET['id'];
	}
	$file_url = $filename."?id=".$id_event;
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
					<h1 class="mb-0 bread">event</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-degree-bg">
		<?php 
    //  $event_id = $_SESSION['event_id'];
			$query_event1 = mysqli_query($conn, "SELECT * FROM event where id_event = '$id_event'");
			while ($row = mysqli_fetch_array($query_event1)) {
		?>
		<div class="container">
			<div class="row">
				<div class="ftco-animate">
					<p>
						<center>
							<img src="<?php echo substr($row['gambar'],3) ?>" alt="" class="img-fluid"></center>
					</p>
					<h2 class="mb-3">
						<center><?php echo $row['judul_event'] ?></center>
					</h2>
					<p><?php echo $row['keterangan'] ?></p>
				</div>
				
			</div> <!-- .col-md-8 -->
		</div>
		<?php }?>
	</section>


	<footer class="ftco-footer">
		<?php include "footer.php"; ?>
	</footer>

	<?php include "js-script.php"; ?>
	<!-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
			<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
			<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
				stroke="#F96D00" /></svg></div> -->

	<script src="pengguna/js/jquery.min.js"></script>
	<script src="pengguna/js/jquery-migrate-3.0.1.min.js"></script>
	<script src="pengguna/js/popper.min.js"></script>
	<script src="pengguna/js/bootstrap.min.js"></script>
	<script src="pengguna/js/jquery.easing.1.3.js"></script>
	<script src="pengguna/js/jquery.waypoints.min.js"></script>
	<script src="pengguna/js/jquery.stellar.min.js"></script>
	<script src="pengguna/js/owl.carousel.min.js"></script>
	<script src="pengguna/js/jquery.magnific-popup.min.js"></script>
	<script src="pengguna/js/jquery.animateNumber.min.js"></script>
	<script src="pengguna/js/scrollax.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
	<script src="pengguna/js/main.js"></script>
	<script>
	var sessionId = <?php if(isset($_SESSION['user_id'])) echo "1"; else echo "0"; ?>;
	var nama = "<?php if(isset($_SESSION['nama'])) echo $_SESSION['nama']; else echo "0"; ?>";
	$("#daftarevent").click(function(e){
		// alert('test');
		if(!sessionId){
			location.href = "login.php?redirect=<?php echo $file_url; ?>";
		}
		$('#nama').val(nama);
	});
	</script>
</body>
</html>