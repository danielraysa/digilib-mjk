<?php include 'koneksi.php'; ?>
<?php include 'function.php'; ?>
<?php $filename = basename(__FILE__); ?>
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
					<h1 class="mb-0 bread">Events</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section">
      <div class="container">
        <div class="row d-flex">
		<?php 
					$query_event1 = mysqli_query($conn, "SELECT * FROM event");
					while ($row = mysqli_fetch_array($query_event1)) {
				?>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
			 
              <div class="text text-center">
              	<a href="event_fact.php?id=<?php echo $row['id_event']?>" class="block-20 img" style="background-image: url('<?php echo substr($row['gambar'],3) ?>');">
	              </a>
	              <div class="meta text-center mb-2 d-flex align-items-center justify-content-center">
                	<div>
                		<span class="day"><?php echo date('d', strtotime($row['tanggal'])); ?></span>
                		<span class="mos"><?php echo date('M', strtotime($row['tanggal'])); ?></span> 
                		<span class="yr"><?php echo date('Y', strtotime($row['tanggal'])); ?></span>
                	</div>
                </div>
                <h3 class="heading mb-3"><a href="event_fact.php?id=<?php echo $row['id_event']?>"><?php echo $row['judul_event'] ?></a></h3>
                
              </div>
			  
            </div>
          </div>
		  <?php } ?>
        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
			
            </div>
          </div>
        </div>
      </div>
    </section>
	<!-- <footer class="ftco-footer"> -->
		
		<?php include "footer.php"; ?>
	<!-- </footer> -->

	<?php include "js-script.php"; ?>

</body>

</html>