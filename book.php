<?php 
	include "koneksi.php";
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
					<p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i
									class="fa fa-chevron-right"></i></a></span> <span>Book Store <i
								class="fa fa-chevron-right"></i></span></p>
					<h1 class="mb-0 bread">Book Store</h1>
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
							<h4 class="product-select">Select Types of Products</h4>
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
		<div class="container-fluid px-md-5">
			<div class="row">
				<div class="col-md-6 col-lg-4 d-flex">
					<div class="book-wrap d-lg-flex">
						<div class="img d-flex justify-content-end"
							style="background-image: url(pengguna/images/book-1.jpg);">
							<div class="in-text">
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Add to cart">
									<span class="flaticon-shopping-cart"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Add to Wishlist">
									<span class="flaticon-heart-1"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Quick View">
									<span class="flaticon-search"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Compare">
									<span class="flaticon-visibility"></span>
								</a>
							</div>
						</div>
						<div class="text p-4">
							<p class="mb-2"><span class="price">$12.00</span></p>
							<h2><a href="#">You Are Your Only Limit</a></h2>
							<span class="position">By John Nathan Muller</span>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 d-flex">
					<div class="book-wrap d-lg-flex">
						<div class="img d-flex justify-content-end"
							style="background-image: url(pengguna/images/book-2.jpg);">
							<div class="in-text">
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Add to cart">
									<span class="flaticon-shopping-cart"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Add to Wishlist">
									<span class="flaticon-heart-1"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Quick View">
									<span class="flaticon-search"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Compare">
									<span class="flaticon-visibility"></span>
								</a>
							</div>
						</div>
						<div class="text p-4">
							<p class="mb-2"><span class="price sale">$12.00</span> <span class="price">$8.00</span></p>
							<h2><a href="#">101 Essays That Will Change The Way Your Thinks</a></h2>
							<span class="position">By John Nathan Muller</span>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 d-flex">
					<div class="book-wrap d-lg-flex">
						<div class="img d-flex justify-content-end"
							style="background-image: url(pengguna/images/book-3.jpg);">
							<div class="in-text">
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Add to cart">
									<span class="flaticon-shopping-cart"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Add to Wishlist">
									<span class="flaticon-heart-1"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Quick View">
									<span class="flaticon-search"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Compare">
									<span class="flaticon-visibility"></span>
								</a>
							</div>
						</div>
						<div class="text p-4">
							<p class="mb-2"><span class="price">$12.00</span></p>
							<h2><a href="#">Your Soul Is A River</a></h2>
							<span class="position">By John Nathan Muller</span>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-4 d-flex">
					<div class="book-wrap d-lg-flex">
						<div class="img d-flex justify-content-end"
							style="background-image: url(pengguna/images/book-4.jpg);">
							<div class="in-text">
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Add to cart">
									<span class="flaticon-shopping-cart"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Add to Wishlist">
									<span class="flaticon-heart-1"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Quick View">
									<span class="flaticon-search"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Compare">
									<span class="flaticon-visibility"></span>
								</a>
							</div>
						</div>
						<div class="text p-4 order-md-first">
							<p class="mb-2"><span class="price">$9.00</span></p>
							<h2><a href="#">All The Letters I Should Have Sent</a></h2>
							<span class="position">By John Nathan Muller</span>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 d-flex">
					<div class="book-wrap d-lg-flex">
						<div class="img d-flex justify-content-end"
							style="background-image: url(pengguna/images/book-5.jpg);">
							<div class="in-text">
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Add to cart">
									<span class="flaticon-shopping-cart"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Add to Wishlist">
									<span class="flaticon-heart-1"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Quick View">
									<span class="flaticon-search"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Compare">
									<span class="flaticon-visibility"></span>
								</a>
							</div>
						</div>
						<div class="text p-4 order-md-first">
							<p class="mb-2"><span class="price">$20.00</span></p>
							<h2><a href="#">Happy</a></h2>
							<span class="position">By John Nathan Muller</span>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 d-flex">
					<div class="book-wrap d-lg-flex">
						<div class="img d-flex justify-content-end"
							style="background-image: url(pengguna/images/book-6.jpg);">
							<div class="in-text">
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Add to cart">
									<span class="flaticon-shopping-cart"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Add to Wishlist">
									<span class="flaticon-heart-1"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Quick View">
									<span class="flaticon-search"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Compare">
									<span class="flaticon-visibility"></span>
								</a>
							</div>
						</div>
						<div class="text p-4 order-md-first">
							<p class="mb-2"><span class="price">$12.00</span></p>
							<h2><a href="#">Milk &amp; Honey</a></h2>
							<span class="position">By John Nathan Muller</span>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-4 d-flex">
					<div class="book-wrap d-lg-flex">
						<div class="img d-flex justify-content-end"
							style="background-image: url(pengguna/images/book-7.jpg);">
							<div class="in-text">
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Add to cart">
									<span class="flaticon-shopping-cart"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Add to Wishlist">
									<span class="flaticon-heart-1"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Quick View">
									<span class="flaticon-search"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Compare">
									<span class="flaticon-visibility"></span>
								</a>
							</div>
						</div>
						<div class="text p-4">
							<p class="mb-2"><span class="price">$9.00</span></p>
							<h2><a href="#">Take The Risk</a></h2>
							<span class="position">By John Nathan Muller</span>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 d-flex">
					<div class="book-wrap d-lg-flex">
						<div class="img d-flex justify-content-end"
							style="background-image: url(pengguna/images/book-8.jpg);">
							<div class="in-text">
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Add to cart">
									<span class="flaticon-shopping-cart"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Add to Wishlist">
									<span class="flaticon-heart-1"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Quick View">
									<span class="flaticon-search"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Compare">
									<span class="flaticon-visibility"></span>
								</a>
							</div>
						</div>
						<div class="text p-4">
							<p class="mb-2"><span class="price">$20.00</span></p>
							<h2><a href="#">Happy</a></h2>
							<span class="position">By John Nathan Muller</span>
						</div>
					</div>
				</div>
				<div class="col-md-6 col-lg-4 d-flex">
					<div class="book-wrap d-lg-flex">
						<div class="img d-flex justify-content-end"
							style="background-image: url(pengguna/images/book-9.jpg);">
							<div class="in-text">
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Add to cart">
									<span class="flaticon-shopping-cart"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Add to Wishlist">
									<span class="flaticon-heart-1"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Quick View">
									<span class="flaticon-search"></span>
								</a>
								<a href="#" class="icon d-flex align-items-center justify-content-center"
									data-toggle="tooltip" data-placement="left" title="Compare">
									<span class="flaticon-visibility"></span>
								</a>
							</div>
						</div>
						<div class="text p-4">
							<p class="mb-2"><span class="price">$12.00</span></p>
							<h2><a href="#">Jerusalem A CookBook</a></h2>
							<span class="position">By John Nathan Muller</span>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-5">
				<div class="col text-center">
					<div class="block-27">
						<ul>
							<li><a href="#">&lt;</a></li>
							<li class="active"><span>1</span></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">&gt;</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>

	<footer class="ftco-footer">
		<div class="container">
			<div class="row mb-5">
				<div class="col-sm-12 col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2 logo"><a href="#">Connect</a></h2>
						<p>Far far away, behind the word mountains, far from the countries.</p>
						<ul class="ftco-footer-social list-unstyled mt-2">
							<li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
							<li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md">
					<div class="ftco-footer-widget mb-4 ml-md-4">
						<h2 class="ftco-heading-2">Extra Links</h2>
						<ul class="list-unstyled">
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Affiliate Program</a></li>
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Business Services</a></li>
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Education Services</a></li>
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Gift Cards</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md">
					<div class="ftco-footer-widget mb-4 ml-md-4">
						<h2 class="ftco-heading-2">Legal</h2>
						<ul class="list-unstyled">
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Join us</a></li>
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Blog</a></li>
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Privacy &amp; Policy</a></li>
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Term &amp; Conditions</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Company</h2>
						<ul class="list-unstyled">
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>About Us</a></li>
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Blog</a></li>
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Contact</a></li>
							<li><a href="#"><span class="fa fa-chevron-right mr-2"></span>Careers</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md">
					<div class="ftco-footer-widget mb-4">
						<h2 class="ftco-heading-2">Have a Questions?</h2>
						<div class="block-23 mb-3">
							<ul>
								<li><span class="icon fa fa-map marker"></span><span class="text">203 Fake St. Mountain
										View, San Francisco, California, USA</span></li>
								<li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929
											210</span></a></li>
								<li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span
											class="text">info@yourdomain.com</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php include "footer.php"; ?>
	</footer>

	<?php include "js-script.php"; ?>

</body>

</html>