<?php 
    $filename = basename(__FILE__);
	$dir = basename(__DIR__);
	include "../koneksi.php";
	include "../function.php";
    check_session($dir."/".$filename);
    /* if(isset($_GET['koleksi'])){
        header('location:../');
        exit;
    }else{
        $id = $_GET['koleksi'];
    } */
    $id = $_GET['koleksi'] ? $_GET['koleksi'] : '';
    if($id != ''){
        $user_id = $_SESSION['user_id'];
        $get_quiz = mysqli_query($conn, "SELECT * from log_quiz lq WHERE id_pengguna = '".$user_id."' AND id_pertanyaan IN (SELECT id_pertanyaan FROM pertanyaan p WHERE id_koleksi = '".$id."')");
        if(mysqli_num_rows($get_quiz) == 0){
            $_quiz = mysqli_query($conn, "SELECT * from pertanyaan WHERE id_koleksi = '".$id."'");
            while($_row = mysqli_fetch_assoc($_quiz)){
                $insert = mysqli_query($conn, "INSERT INTO log_quiz (id_logquiz, id_pertanyaan, id_pengguna) SELECT IFNULL(MAX(id_logquiz)+1,1), '".$_row['id_pertanyaan']."', '".$user_id."'");
            }
        }
    }
    $get_point = mysqli_query($conn, "SELECT * FROM point_pengguna pp JOIN points p ON p.id_point = pp.id_point WHERE pp.id_pengguna = '".$_SESSION['user_id']."'");
    
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
                                        <th>Buku</th>
                                        <th>Point</th>
                                        <th>Tanggal Peroleh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $i = 1;
                                while($row = mysqli_fetch_assoc($get_point)) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row['jenis_kegiatan']; ?></td>
                                        <td><?php echo $row['point']; ?></td>
                                        <td><?php echo $row['tgl_perolehan']; ?></td>
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