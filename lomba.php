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

	<section class="ftco-section">
      <div class="container">
        <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
			  <?php 
					$query_lomba1 = mysqli_query($conn, "SELECT poster, judul_lomba, keterangan, YEAR(tgl) as thn, 
					DAY(tgl) as d, MONTHNAME(tgl) as m FROM lomba");
					while ($row = mysqli_fetch_array($query_lomba1)) 
					
					{
				?>
              <div class="text text-center">
              	<a href="lomba_fact.php" class="block-20 img" style="background-image: url(<?php echo substr($row['poster'],3) ?>);">
	              </a>
	              <div class="meta text-center mb-2 d-flex align-items-center justify-content-center">
                	<div>
                		<span class="day"><?echo substr($row['d'],3)?></span>
                		<span class="mos"><?echo substr($row['m'],3)?></span> 
                		<span class="yr"><?echo substr($row['thn'],3)?></span>
                	</div>
                </div>
                <h3 class="heading mb-3"><a href="#"><?php echo $row['judul_lomba'] ?></a></h3>
                <!-- <p><?php echo $row['keterangan']?></p> -->
              </div>
			  <?php } ?>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
			
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