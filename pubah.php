<?php include "koneksi.php"; ?>
<?php include "auth.php"; ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <!-- Csrf Token -->
<meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
  <title>MAN 2 Mojokerto</title>
  <!-- Favicon -->
  <!-- <link rel="icon" href="admin/img/brand/favicon.png" type="image/png"> -->
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="admin/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="admin/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="admin/css/argon.css?v=1.2.0" type="text/css">
  

</head>

<body>
  <!-- Sidenav -->
  <?php include "sidebar.php"; ?>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <?php include "navbar.php"; ?>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary" style="background-color: green !important">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h6 class="h2 text-white d-inline-block mb-0">Pengguna</h6>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-12 col-md-12">
              <div class="card card-stats">
                <!-- Card body -->
                <table class="table table-bordered">
                  <tr>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  <?php
                  $query = mysqli_query($conn, "select nama, kelas, alamat, status from siswa");
                  //for($row = 0; $row < 10; $row++)) {
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
                  <tr>
                    <td><?php echo $row['nama'] ?></td>
                    <td><?php echo $row['kelas'] ?></td>
                    <td><?php echo $row['alamat'] ?></td>
                    <td><?php echo $row['status'] ?></td>
                    <td><button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">Edit</button><button class="btn btn-danger">Hapus</button></td>
                  </tr>
                  <?php } ?>
                </table>
              </div>
            </div>
      </div>
    </div>
      </div>
      <?php include "footer.php"; ?>
    </div>
    <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Data Pengguna</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               <form>
            <div class="form-group"> 
              <label for="nama">Nama</label>
              <input type="text" id="nama" class="form-control form-control-sm" placeholder="Nama Anda">
            </div>
           
            <div class="form-group">
              <label for="kelas">Kelas</label>
              <input type="text" id="kelas" class="form-control form-control-sm" placeholder="Kelas">
            </div>
          </form>
           <div class="form-group"> 
              <label for="alamat">Alamat</label>
              <input type="text" id="alamat" class="form-control form-control-sm" placeholder="Alamat">
            </div>
           
            <div class="form-group">
              <label for="status">Status</label>
              <select id="status" class="form-control form-control-sm">
                <option value="">Aktif</option>
                <option value="">Tidak Aktif</option>
              </select>
            </div>
          </form>
            </div>
        </div>
    </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
  </div>

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="admin/vendor/jquery/dist/jquery.min.js"></script>
  <script src="admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="admin/vendor/js-cookie/js.cookie.js"></script>
  <script src="admin/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="admin/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="hadir/js/bootstrap.min.js"></script>
  <!-- Optional JS -->
  <script src="admin/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="admin/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="admin/js/argon.js?v=1.2.0"></script>
  <!-- DataTable -->
<script src="DataTable/js/jquery.dataTables.min.js"></script>
<script src="DataTable/js/dataTables.bootstrap4.min.js"></script>
<script src="DataTable/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
            //Mengirimkan Token Keamanan
            $.ajaxSetup({
               headers : {
                'Csrf-Token': $('meta[name="csrf-token"]').attr('content')
               }
            });
 
	    $('.data').load("data.php");
	});
	$('#btnEdit').click(function(){
		$.ajax({
			url: 'ajax.php',
			type: 'post',
			data: {},
			success: function(){

			}
		})
	})
</script>
</body>

</html>