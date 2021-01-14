<!DOCTYPE html>
<html>

<head>
<?php include "css-script.php"; ?>
<?php include "../koneksi.php"; ?>
</head>

<body>
	<!-- Sidenav -->
	<?php include "sidebar.php"; ?>
	<!-- Main content -->
	<div class="main-content" id="panel">
		<!-- Topnav -->
		<?php include "navbar.php"; ?>
		<!-- Header -->
		<div class="header bg-primary" style="background-color: #B0C4DE !important">
			<div class="container-fluid">
				<div class="header-body">
					<div class="row align-items-center py-4">
						<div class="col-lg-6 col-7">
							<h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Content -->
		<div class="container-fluid mt-3">
			<!-- Card stats -->
			<div class="row">
				<div class="col-xl-3 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<?php 
						$query2= mysqli_query($conn, "SELECT count(id_siswa)siswa FROM siswa");
								$data2= mysqli_fetch_array($query2);
								?>
						<div class="card-body">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Siswa</h5>
									<span class="h2 font-weight-bold mb-0"><?php echo $data2['siswa']?> Siswa</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
										<i class="ni ni-active-40"></i>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<div class="card-body">
							<div class="row">
								<div class="col">
								<?php
								$query1= mysqli_query($conn, "SELECT count(id_pengguna)idPengguna FROM pengguna");
								$data1= mysqli_fetch_array($query1);
								$peng = $data1['idPengguna'];

								
								?>
									<h5 class="card-title text-uppercase text-muted mb-0">Pengguna</h5>
									<span class="h2 font-weight-bold mb-0"><?php echo $peng?> Pengguna</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
										<i class="ni ni-chart-pie-35"></i>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<?php 
							$query3= mysqli_query($conn, "SELECT count(id_koleksi)koleksi FROM koleksi");
							$data3= mysqli_fetch_array($query3);
						?>
						<div class="card-body" >
							<div class="row" >
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0" href="MKoleksi.php">Koleksi</h5>
									<span class="h2 font-weight-bold mb-0"><?php echo $data3['koleksi']?> Koleksi</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-#B0C4DE text-white rounded-circle shadow">
										<i class="ni ni-money-coins"></i>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-md-6">
					<div class="card card-stats">
						<!-- Card body -->
						<?php
						$query4= mysqli_query($conn, "SELECT count(id_ses_kunjungan)kunjungan FROM session_kunjungan");
								$data4= mysqli_fetch_array($query4);
								?>
						<div class="card-body" href="Mkunjungan.php">
							<div class="row">
								<div class="col">
									<h5 class="card-title text-uppercase text-muted mb-0">Kunjungan</h5>
									<span class="h2 font-weight-bold mb-0"><?php echo $data4['kunjungan'] ?> Pengunjung</span>
								</div>
								<div class="col-auto">
									<div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
										<i class="ni ni-chart-bar-32"></i>
									</div>
								</div>
							</div>
							<!-- <p class="mt-3 mb-0 text-sm">
								<span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
								<span class="text-nowrap">Since last month</span>
							</p> -->
						</div>
					</div>
				</div>
			</div>
			<?php include "footer.php"; ?>
		</div>
	</div>
	<!-- Argon Scripts -->
	<?php include "js-script.php"; ?>
	<!-- Core -->
	<script src="admin/vendor/jquery/dist/jquery.min.js"></script>
	<script src="admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script src="admin/vendor/js-cookie/js.cookie.js"></script>
	<script src="admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
	<script src="admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
	<!-- Optional JS -->
	<script src="admin/vendor/chart.js/dist/Chart.min.js"></script>
	<script src="admin/vendor/chart.js/dist/Chart.extension.js"></script>
	<!-- Argon JS -->
	<script src="admin/js/argon.js?v=1.2.0"></script>
</body>

</html>