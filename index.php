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

	<!-- Informasi About -->
	<section class="ftco-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 img img-3 d-flex justify-content-center align-items-center"
					style="background-image: url(pengguna/images/gambar.jpg);">
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
	<!-- <section class="ftco-counter ftco-section ftco-no-pt ftco-no-pb img bg-light" id="section-counter"> -->
	<section class="ftco-section ftco-no-pt ftco-no-pb img bg-light" id="section-counter">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-4 justify-content-center counter-wrap ftco-animate">
					<div class="block-18 py-4 mb-4">
						<div class="text" data-toggle="modal"
							data-target="#LeaderBoard">
							<!-- <div id="lineChart1"></div> -->
							<!-- <br> -->
							<h3>Point Pengguna</h3>
							<ol>
							<?php
							$query = mysqli_query($conn, "SELECT pengguna.username, SUM(points.point) AS jumlah FROM pengguna JOIN point_pengguna ON pengguna.id_pengguna = point_pengguna.id_pengguna JOIN points ON point_pengguna.id_point = points.id_point WHERE point_pengguna.id_point=points.id_point GROUP BY pengguna.username ORDER BY jumlah DESC LIMIT 10");
							while ($row = mysqli_fetch_assoc($query)){
								echo "<li>".$row['username']. "(".$row['jumlah'].")</li>";
							}
							?>
							</ol>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-4 justify-content-center counter-wrap ftco-animate">
					<div class="block-18 py-4 mb-4">
						<div class="text align-items-center" data-toggle="modal"
							data-target="#LeaderBoard">
							<!-- <div id="lineChart2"></div> -->
							<h3>Koleksi</h3>
							<ol>
							<?php
							$query = mysqli_query($conn, "SELECT
							lb.id_koleksi,
							k.judul,
							COUNT(lb.id_koleksi) as jumlah
							FROM
								log_baca lb
							JOIN koleksi k ON
								lb.id_koleksi = k.id_koleksi
							GROUP BY 
								lb.id_koleksi 
							ORDER BY jumlah DESC LIMIT 10");
							while ($row = mysqli_fetch_assoc($query)){
								echo "<li><a href='user/baca.php?id=".$row['id_koleksi']."'>".$row['judul']."</a></li>";
							}
							?>
							</ol>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-4 justify-content-center counter-wrap ftco-animate">
					<div class="block-18 py-4 mb-4">
						<div class="text align-items-center">
							<!-- <div id="lineChart3" style="height: 200px"></div> -->
							<h3>Kelas</h3>
							<ol>
							<?php
							$query = mysqli_query($conn, "SELECT s.kelas, sum(pt.point) AS jumlah FROM point_pengguna pp JOIN pengguna p ON pp.id_pengguna=p.id_pengguna 
							JOIN siswa s ON p.id_pengguna=s.id_pengguna join points pt ON pp.id_point=pt.id_point GROUP BY s.kelas");
							while ($row = mysqli_fetch_assoc($query)){
								echo "<li>".$row['kelas']."</li>";
							}
							?>
							</ol>
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
			$poster = mysqli_query($conn, "SELECT id_lomba,judul_lomba, keterangan, poster FROM lomba");
			$i = 1;
			while($row = mysqli_fetch_array($poster)){ ?>
				<div class="carousel-item <?php if($i == 1) echo 'active'; ?>">
					<img class="d-block w-100" src="<?php echo substr($row['poster'],3) ?>" alt="lomba slide" style="cursor: pointer" onclick="location.href = 'lomba_fact.php?id=<?php echo $row['id_lomba'] ?>'">
					<div class="carousel-caption">
						<h5><?php echo substr($row['judul_lomba'],0,20) ?></h5>
						<p><?php echo substr($row['keterangan'],0,20) ?></p>
					</div>
				</div>
			<?php 
			$i++;
			} 
			$event = mysqli_query($conn, "SELECT * FROM event");
			while($row = mysqli_fetch_array($event)){ ?>
				<div class="carousel-item">
					<div class="carousel-caption">
						<h5><?php echo substr($row['judul_event'],0,20) ?></h5>
						<p><?php echo substr($row['keterangan'],0,20) ?></p>
					</div>
					<img class="d-block w-100" src="<?php echo substr($row['gambar'],3) ?>" alt="event slide" style="cursor: pointer" onclick="location.href = 'event_fact.php?id=<?php echo $row['id_event'] ?>'">
				</div>
			<?php } ?>
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