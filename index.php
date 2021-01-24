<?php include 'koneksi.php'; ?>
<?php include 'function.php'; ?>
<?php $filename = basename(__FILE__); ?>
<?php 
$jumlah = mysqli_query($conn, "SELECT pengguna.username, SUM(points.point) AS jumlah FROM pengguna JOIN point_pengguna ON pengguna.id_pengguna = point_pengguna.id_pengguna JOIN points ON point_pengguna.id_point = points.id_point WHERE point_pengguna.id_point=points.id_point GROUP BY pengguna.username ORDER BY jumlah DESC");
while($row = mysqli_fetch_array($jumlah)){
	$jumlah_rangking[] = $row['jumlah'];
}	

$koleksi = mysqli_query($conn, "SELECT k.judul, count(lb.id_koleksi) as jumlah FROM log_baca lb join koleksi k ON lb.id_koleksi = k.id_koleksi GROUP BY k.judul ORDER BY jumlah DESC");
while($row = mysqli_fetch_array($koleksi)){
	$jumlahRangkingKoleksi[] = $row['jumlah'];
	$judulKoleksi[] = $row['judul'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php include "css-script.php"; ?>
</head>

<body>
	<?php include "navbar.php"; ?>

	<section class="hero-wrap" style="background-image: url('https://man2mojokerto.sch.id/wp-content/uploads/2020/02/20200103_065117-scaled.jpg');" data-stellar-background-ratio="0.5">
		<div class="overlay"></div>
		<div class="container">
			<div class="row no-gutters slider-text align-items-center">
				<div class="col-md-8 ftco-animate d-flex align-items-end">
					<div class="text w-100">
						<!-- <h1 class="mb-4" colour="white">Good books don't give up all their secrets at once</h1>
						<p class="mb-4">A small river named Duden flows by their place and supplies it with the
							necessary regelialia.</p>
						<p><a href="book.php" class="btn btn-primary py-3 px-4">View All Books</a>  -->
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- 		<section class="ftco-section ftco-no-pt mt-5 mt-md-0">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-3 d-flex align-items-stretch ftco-animate">
    				<div class="services-2 text-center">
    					<div class="icon-wrap">
	    					<div class="icon d-flex align-items-center justify-content-center">
	    						<span class="flaticon-fantasy"></span>
	    					</div>
    					</div>
    					<h2><a href="#">Children's Book</a></h2>
    					<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
    				</div>
    			</div>
    			<div class="col-md-3 d-flex align-items-stretch ftco-animate">
    				<div class="services-2 text-center">
    					<div class="icon-wrap">
	    					<div class="icon d-flex align-items-center justify-content-center">
	    						<span class="flaticon-heart"></span>
	    					</div>
    					</div>
    					<h2><a href="#">Romance</a></h2>
  						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
    				</div>
    			</div>
    			<div class="col-md-3 d-flex align-items-stretch ftco-animate">
    				<div class="services-2 text-center">
    					<div class="icon-wrap">
	    					<div class="icon d-flex align-items-center justify-content-center">
	    						<span class="flaticon-model"></span>
	    					</div>
    					</div>
    					<h2><a href="#">Art &amp; Architecture</a></h2>
  						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
    				</div>
    			</div>
    			<div class="col-md-3 d-flex align-items-stretch ftco-animate">
    				<div class="services-2 text-center">
    					<div class="icon-wrap">
	    					<div class="icon d-flex align-items-center justify-content-center">
	    						<span class="flaticon-history"></span>
	    					</div>
    					</div>
    					<h2><a href="#">History</a></h2>
  						<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
    				</div>
    			</div>
    		</div>
    	</div>
	</section> -->
	<!-- Informasi About -->
	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 img img-3 d-flex justify-content-center align-items-center"
					style="background-image: url(pengguna/images/about-1.jpg);">
				</div>
				<div class="col-md-6 wrap-about pl-md-5 ftco-animate py-5">
					<div class="heading-section">
						<span class="subheading">Welcome To MAN 2 Mojokerto Library</span>
						<h2 class="mb-4">Man 2 Mojokerto</h2>

						<p></p>
						<p>Perpustakaan MAN 2 Mojokerto merupakan perpustakaan yang berlokasi di 
						gedung baru sebelah kanan gedung Pusat Sumber Belajar dilantai dua. 
						Fasilitas pendukung yang tersedia di perpustakaan disesuaikan dengan kondisi dan kebutuhan layanan informasi, seperti meja dan kursi baca. Tersedia rak koleksi buku paket dan koleksi umum juga almari untuk koleksi referensi. 
						Disediakan juga satu perangkat komputer sebagai sarana menelusur informasi bagi para pemustaka.  
						Jam buka layanan perpustakaan dimulai sejak masuk sekolah yaitu pukul 06.45 WIB 
						sampai pukul 15.30 WIB, kecuali untuk hari Jumat sampai pukul 16.00 WIB.</p>
						<p></p>

						
					</div>

				</div>
			</div>
		</div>
	</section>
	<!--LeaderBoard -->
	<section class="ftco-counter ftco-section ftco-no-pt ftco-no-pb img bg-light" id="section-counter">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
					<div class="block-18 py-4 mb-4">
						<div class="text align-items-center" data-toggle="modal"
							data-target="#LeaderBoard">
							<div id="lineChart1"></div>
							<br>
							<h3>Point Pengguna</h3>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
					<div class="block-18 py-4 mb-4">
						<div class="text align-items-center" data-toggle="modal"
							data-target="#LeaderBoard">
							<div id="lineChart2"></div>
							<br>
							<h3>Koleksi</h3>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
					<div class="block-18 py-4 mb-4">
						<div class="text align-items-center">
							<div id="lineChart3" style="height: 200px"></div>
							
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
	
	<div class="modal fade" id="LeaderBoard" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">LeaderBoard</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<div class="row">
				<div class="col-xl-12 col-md-12">
				<h1><center>Top 10</center></h1>
					<div class="card card-stats">
					<div class="card-body table-responsive">
						<!-- Card body -->
						<table id="myTable" class="table table-bordered">
							<thead>
								<tr>
									
									<th>Username</th>
									<th>Point</th>
								</tr>

							</thead>
							<tbody>

								<?php
								//querynya belum okeh
                  $query = mysqli_query($conn, "SELECT pengguna.username, SUM(points.point) AS jumlah FROM pengguna JOIN point_pengguna ON pengguna.id_pengguna = point_pengguna.id_pengguna JOIN points ON point_pengguna.id_point = points.id_point WHERE point_pengguna.id_point=points.id_point GROUP BY pengguna.username ORDER BY jumlah DESC");
                  //for($row = 0; $row < 10; $row++)) {
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
								<tr>
									<td><?php echo $row['username'] ?></td>
									<td><?php echo $row['jumlah'] ?></td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
		</div>
			</div>
		</div>
	</div>
	
	</div>
  
    <div id="carouselLomba" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
		<?php 
		$poster = mysqli_query($conn, "SELECT judul_lomba, keterangan, poster FROM lomba ");
		$i = 0;
		while($row = mysqli_fetch_array($poster)){ ?>
			<li data-target="#carouselLomba" data-slide-to="<?php echo $i; ?>" class="<?php if($i == 0) echo 'active'; ?>"></li>
		<?php 
		$i++;
		} ?>
		</ol>
		<div class="carousel-inner" style="max-height: 580px">
			<?php 
			$poster = mysqli_query($conn, "SELECT judul_lomba, keterangan, poster FROM lomba ");
			$i = 1;
			while($row = mysqli_fetch_array($poster)){ ?>
				<div class="carousel-item <?php if($i == 1) echo 'active'; ?>">
					<div class="carousel-caption">
						<h5><?php echo substr($row['judul_lomba'],0,20) ?></h5>
						<p><?php echo substr($row['keterangan'],0,20) ?></p>
					</div>
					<img class="d-block w-100" src="<?php echo substr($row['poster'],3) ?>" alt="First slide">
				</div>
			<?php 
			$i++;
			} ?>
			</div>
		<a class="carousel-control-prev" href="#carouselLomba" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselLomba" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

<!-- 

		<section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row justify-content-center pb-5 mb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Price &amp; Plans</span>
            <h2>Affordable Packages</h2>
          </div>
        </div>
    		<div class="row">
    			<div class="col-md-4 ftco-animate d-flex">
	          <div class="block-7 w-100">
	            <div class="text-center">
		            <span class="price"><sup>$</sup> <span class="number">49</span> <sub>/mo</sub></span>
		            <span class="excerpt d-block">For Adults</span>
		            <ul class="pricing-text mb-5">
		              <li><span class="fa fa-check mr-2"></span>Individual Counseling</li>
		              <li><span class="fa fa-check mr-2"></span>Couples Therapy</li>
		              <li><span class="fa fa-check mr-2"></span>Family Therapy</li>
		            </ul>

		            <a href="#" class="btn btn-primary d-block px-2 py-3">Get Started</a>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-4 ftco-animate d-flex">
	          <div class="block-7 w-100">
	            <div class="text-center">
		            <span class="price"><sup>$</sup> <span class="number">79</span> <sub>/mo</sub></span>
		            <span class="excerpt d-block">For Children</span>
		            <ul class="pricing-text mb-5">
		              <li><span class="fa fa-check mr-2"></span>Counseling for Children</li>
		              <li><span class="fa fa-check mr-2"></span>Behavioral Management</li>
		              <li><span class="fa fa-check mr-2"></span>Educational Counseling</li>
		            </ul>

		            <a href="#" class="btn btn-primary d-block px-2 py-3">Get Started</a>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-4 ftco-animate d-flex">
	          <div class="block-7 w-100">
	            <div class="text-center">
		            <span class="price"><sup>$</sup> <span class="number">109</span> <sub>/mo</sub></span>
		            <span class="excerpt d-block">For Business</span>
		            <ul class="pricing-text mb-5">
		              <li><span class="fa fa-check mr-2"></span>Consultancy Services</li>
		              <li><span class="fa fa-check mr-2"></span>Employee Counseling</li>
		              <li><span class="fa fa-check mr-2"></span>Psychological Assessment</li>
		            </ul>

		            <a href="#" class="btn btn-primary d-block px-2 py-3">Get Started</a>
	            </div>
	          </div>
	        </div>
	      </div>
    	</div>
    </section>
		
		<section class="ftco-appointment ftco-section img" style="background-image: url(pengguna/images/bg_2.jpg);">
			<div class="overlay"></div>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6 half ftco-animate">
    				<h2 class="mb-4">Send a Message &amp; Get in touch!</h2>
    				<form action="#" class="appointment">
    					<div class="row">
								<div class="col-md-6">
									<div class="form-group">
			              <input type="text" class="form-control" placeholder="Your Name">
			            </div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
			              <input type="text" class="form-control" placeholder="Email">
			            </div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
			    					<div class="form-field">
	          					<div class="select-wrap">
	                      <div class="icon"><span class="fa fa-chevron-down"></span></div>
	                      <select name="" id="" class="form-control">
	                      	<option value="">Services</option>
	                        <option value="">Relation Problem</option>
	                        <option value="">Couple Counseling</option>
	                        <option value="">Depression Treatment</option>
	                        <option value="">Family Problem</option>
	                        <option value="">Personal Problem</option>
	                        <option value="">Business Problem</option>
	                      </select>
	                    </div>
			              </div>
			    				</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
			              <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
			            </div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
			              <input type="submit" value="Send message" class="btn btn-primary py-3 px-4">
			            </div>
								</div>
    					</div>
	          </form>
    			</div>
    		</div>
    	</div>
    </section> -->
	<!-- 
    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Blog</span>
            <h2>Recent Blog</h2>
          </div>
        </div>
        <div class="row d-flex">
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <div class="text text-center">
              	<a href="blog-single.html" class="block-20 img" style="background-image: url('images/image_1.jpg');">
	              </a>
	              <div class="meta text-center mb-2 d-flex align-items-center justify-content-center">
                	<div>
                		<span class="day">02</span>
                		<span class="mos">May</span>
                		<span class="yr">2020</span>
                	</div>
                </div>
                <h3 class="heading mb-3"><a href="#">New Friends With Books</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <div class="text text-center">
              	<a href="blog-single.html" class="block-20 img" style="background-image: url('images/image_2.jpg');">
	              </a>
	              <div class="meta text-center mb-2 d-flex align-items-center justify-content-center">
                	<div>
                		<span class="day">02</span>
                		<span class="mos">May</span>
                		<span class="yr">2020</span>
                	</div>
                </div>
                <h3 class="heading mb-3"><a href="#">New Friends With Books</a></h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 d-flex ftco-animate">
          	<div class="blog-entry justify-content-end">
              <div class="text text-center">
              	<a href="blog-single.html" class="block-20 img" style="background-image: url('images/image_3.jpg');">
	              </a>
	              <div class="meta text-center mb-2 d-flex align-items-center justify-content-center">
                	<div>
                		<span class="day">02</span>
                		<span class="mos">May</span>
                		<span class="yr">2020</span>
                	</div>
                </div>
                <h3 class="heading mb-3"><a href="#">New Friends With Books</a></h3>
								<p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>              
							</div>
            </div>
          </div>
        </div>
      </div>
    </section>	-->

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
	                <li><span class="icon fa fa-map marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon fa fa-paper-plane pr-4"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
		
      </div>
	 
	<?php include "footer.php"; ?>
	<!-- </footer> -->
	
	<?php include "js-script.php"; ?>

	<script src="https://cdn.zingchart.com/zingchart.min.js"></script>

	<script>
	$(document).ready(function() {
		var myConfig = {
			type: "bar",
			"scale-r": {
				aperture: 200,
			},
			"plotarea":{
				"margin":"0"
			},
			series: [{
				values: [40,40,10]
				}
			]
		};
			
		zingchart.render({
			id: 'lineChart1',
			data: myConfig,
			height: "280px",
			width: "100%"
		});

		zingchart.render({
			id: 'lineChart2',
			data: myConfig,
			height: "280px",
			width: "100%"
		});

		zingchart.render({
			id: 'lineChart3',
			data: myConfig,
			height: "280px",
			width: "100%"
		});


		})
	</script>

</body>

</html>