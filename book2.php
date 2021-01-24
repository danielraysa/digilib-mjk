<?php 
	include "koneksi.php";
	include "function.php";
	$filename = basename(__FILE__); 
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
					<h1 class="mb-0 bread">Katalog Buku</h1>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-4">
				<div class="col-md-10">
					<div class="row mb-4">
						<div class="col-md-12 d-flex justify-content-between align-items-center">
							<h4 class="product-select">Pilih Kategori</h4>
							<select class="selectpicker" multiple>
							<?php 
								$query_kat = mysqli_query($conn, "SELECT * FROM kategori");
								while ($row = mysqli_fetch_array($query_kat)) {
							?>
								<option value="<?php echo $row['id_kategori']; ?>"><?php echo $row['nama_kategori'] ?></option>
							<?php } ?>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
		<div class="col-lg-9 ftco-animate fadeInUp ftco-animated">
			<div class="row">
				<?php 
					$query_koleksi = mysqli_query($conn, "SELECT * FROM koleksi");
					while ($row = mysqli_fetch_array($query_koleksi)) {
				?>
				<div class="col-md-6 col-lg-4 d-flex">
					<div class="book-wrap d-lg-flex">
						<div class="img d-flex justify-content-end"
							style="background-image: url('<?php echo substr($row['cover'],3)?>');" onclick="">
							<div class="in-text">
								<!-- <a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Add to cart">
									<span class="flaticon-shopping-cart"></span>
								</a> -->
								<!-- <a href="<?echo $row['file']?>" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Add to Wishlist">
									<span class="flaticon-heart-1"></span>
								</a> -->
								<a href="<?php echo 'user/baca.php?id='.$row['id_koleksi']; ?>" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Quick View">
									<span class="flaticon-search"></span>
								</a>
								<!-- <a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Compare">
									<span class="flaticon-visibility"></span>
								</a> -->
							</div>
						</div>
						<div class="text p-4">
							<!-- <p class="mb-2"><span class="price">$12.00</span></p> -->
							<h2><a href="<?php echo 'user/baca.php?koleksi='.$row['id_koleksi']; ?>"><?php echo $row['judul'] ?></a></h2>
							<span class="position"><?php echo $row['nama_pengarang'] ?></span>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			
		</div>
		<?php if(isset($_SESSION['user_id'])){ ?>
		<div class="col-lg-3 sidebar pl-lg-3 ftco-animate fadeInUp ftco-animated">
			<div class="sidebar-box ftco-animate">
              <div class="categories">
			  <h3>Histori</h3>
			  <ul>
				<?php
				$user_id = $_SESSION['user_id'];
				$query = mysqli_query($conn, "SELECT k.id_koleksi, k.judul from log_baca lb JOIN koleksi k ON k.id_koleksi = lb.id_koleksi WHERE lb.id_pengguna = '$user_id' GROUP BY k.id_koleksi");
				while($row = mysqli_fetch_assoc($query)) { ?>
				<li><a href="baca.php?id=<?php echo $row['id_koleksi'] ?>"><span class="fa fa-chevron-right"></span><?php echo $row['judul']?></a></li>
				<?php } ?>
				</ul>
              </div>
            </div>
		</div> 
		</div>
		<?php } ?>
	</section>

	<footer class="ftco-footer">
		
		<?php include "footer.php"; ?>
	</footer>

	<?php include "js-script.php"; ?>

</body>

</html>