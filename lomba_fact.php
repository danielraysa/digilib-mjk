<?php $filename = basename(__FILE__); ?>
<?php include 'koneksi.php'; ?>
<?php include 'function.php'; ?>
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
		
		<section class="ftco-section ">
    <?php 
					$query_lomba = mysqli_query($conn, "SELECT * FROM lomba");
					while ($row = mysqli_fetch_array($query_lomba)) {
				?>
      <div class="container">
        <div class="row">
        
          <div class="col-lg-8 ftco-animate">
          	<p>
              <img src="<?php echo substr($row['poster'],3) ?>" alt="" class="img-fluid">
            </p>
            <h2 class="mb-3"><?php echo $row['judul_lomba'] ?></h2>
            <p><?php echo $row['keterangan']?></p>
            </div>
            </div>
            </div>
      <?php }?>
      
      </section>

    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>
  <footer class="ftco-footer">
		
		<?php include "footer.php"; ?>
	</footer>



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