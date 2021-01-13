<!doctype html>
<?php include "../koneksi.php"; ?>
<?php
$query = mysqli_query($conn, "SELECT MAX(id_kunjungan) as idkunjungan FROM kunjungan");
$data = mysqli_fetch_array($query);
$kode = $data['idkunjungan'];

$urut = (int) substr($kode,2,3);
$urut++;
$huruf = "KUN";
$kode = $huruf.sprintf("%03s", $urut);
?>
<?php 
//tanggal auto
$tgl = date('Y-m-d');
// poses tambah
	if(isset($_POST['tambah'])){
		// $id = $_POST['id_baru'];
    $nama = $_POST['kegiatan_baru'];
    $instansi = $_POST['donasi_baru'];
    $status = $_POST['kegiatan_baru'];
    $keterangan = $_POST['donasi_baru'];
		$query = mysqli_query($conn, "INSERT INTO kunjungan VALUES ('$kode','$nama','$instansi','$status','$tgl')");
		 echo "string";
	}?>
<html lang="en">

  <head>
    <title>Digital Library MAN 2 Mojokerto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- <link href="https://fonts.googleapis.com/css?family=DM+Sans:300,400,700&display=swap" rel="stylesheet"> -->

    <link rel="stylesheet" href="../hadir/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../hadir/css/bootstrap.min.css">
    <link rel="stylesheet" href="../hadir/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../hadir/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../hadir/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../hadir/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../hadir/fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="../hadir/css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../hadir/css/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <a href="hadir.php">DIGILIB</a>
              </div>
            </div>

            <div class="col-9  text-right">
              

              <!-- <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span> -->

              

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li><a href="login.php" class="btn btn-primary text-black px-4 py-3">Login</a></li>
                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>

    <div class="ftco-blocks-cover-1">
      <div class="site-section-cover overlay" data-stellar-background-ratio="0.3" style="background-image: url('hadir/images/img_5.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-7">
               <h1 class="mb-2">Welcome To Library</h1>
    <div class="card" style="position: center">
      <div class="card-header">
        <center>DAFTAR HADIR TAMU</center>
      </div>
     
      <div class="card-body">
      <form>
        <div class="form-group"> 
          <label for="nama">Nama</label>
          <input type="text" name="nama" id="nama" class="form-control form-control-sm" placeholder="Nama Anda">
        </div>
       
        <div class="form-group">
          <label for="instansi">Kelas/Instansi/Lembaga</label>
          <input type="text" name="instansi" id="instansi" class="form-control form-control-sm" placeholder="Kelas/Instansi/Lembaga">
        </div>
       
        <div class="form-group">
          <label for="status">Status</label>
          <select id="status" name="status" class="form-control form-control-sm">
            <option value="">-- Pilih Status --</option>
            <option value="">Siswa</option>
            <option value="">Karyawan</option>
            <option value="">Alumni</option>
            <option value="">Pengunjung Luar</option>
          </select>
        </div>
       
        <div class="form-group">
          <label for="keterangan">Keterangan</label>
          <select class="form-control form-control-sm" id="keterangan" name="keterangan" rows="3" placeholder="Keterangan Kunjungan">
            <option value="">-- Pilih Keterangan --</option>
            <option value="">Kunjungan</option>
            <option value="">Membaca Buku</option>
            <option value="">Peminjaman Buku</option>
            <option value="">Belajar Bersama</option>
            <option value="">Lain-lain</option>
          </select>
        </div>
       
        <button type="submit" name="tambah" class="btn btn-primary">Submit</button>
      </form>
      </div>
    </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
              <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>

        </div>
      </div>
    </footer>

    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

  </body>

</html>

