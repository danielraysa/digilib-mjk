<?php 
    $filename = basename(__FILE__);
	$dir = basename(__DIR__);
	include "../koneksi.php";
	include "../function.php";
    check_session($dir."/".$filename);
    $get_log = mysqli_query($conn, "SELECT * FROM log_baca lb JOIN koleksi k ON lb.id_koleksi = k.id_koleksi WHERE lb.id_pengguna = '".$_SESSION['user_id']."'");
    
?>
<!DOCTYPE html>
<html>
<head>
	<?php include "layout/user-css-script.php"; ?>
</head>

<body>
	<!-- Sidenav -->
	<?php include "layout/user-sidebar.php"; ?>
	<!-- Main content -->
	<div class="main-content" id="panel">
		<!-- Topnav -->
		<?php include "layout/user-navbar.php"; ?>
		
		<div class="container-fluid mt-3">
			<!-- Card stats -->
			<div class="row justify-content-center mb-2">
			    <div class="col-lg-12">
                    <div class="card table-responsive">
						<div class="card-body p-1">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th style="width:10%">No.</th>
                                        <th>Judul Buku</th>
                                        <th>Halaman</th>
                                        <th>Tanggal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $i = 1;
                                while($row = mysqli_fetch_assoc($get_log)) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row['judul']; ?></td>
                                        <td><?php echo $row['halaman_bacatg']; ?></td>
                                        <td><?php echo $row['tanggal_baca']; ?></td>
                                        <td><a href="baca.php?id=<?php echo $row['id_koleksi']; ?>" class="btn btn-success">Baca</a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
			<?php include "layout/user-footer.php"; ?>
		</div>
	</div>
	
	<?php include "layout/user-js-script.php"; ?>
    
</body>

</html>