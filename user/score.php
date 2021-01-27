<?php 
    $filename = basename(__FILE__);
	$dir = basename(__DIR__);
	include "../koneksi.php";
	include "../function.php";
    check_session($dir."/".$filename);
    
    $user_id = $_SESSION['user_id'];
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $count_query = mysqli_query($conn, "SELECT * FROM log_quiz WHERE id_pengguna = '$user_id' AND id_pertanyaan IN (SELECT id_pertanyaan FROM pertanyaan WHERE id_koleksi = '$id')");
    $total_pertanyaan = mysqli_num_rows($count_query);
    $count_benar = mysqli_query($conn, "SELECT * FROM log_quiz WHERE id_pengguna = '$user_id' AND id_pertanyaan IN (SELECT id_pertanyaan FROM pertanyaan WHERE id_koleksi = '$id') AND benar_salah = 'benar'");
    $total_benar = mysqli_num_rows($count_benar);
    
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
                    <div class="card">
                    <form action="" method="POST">
                        <div class="card-header">
                            <h3>Hasil Jawaban</h3>
                        </div>
                        <div class="card-body">
                            <p>Kamu menjawab <b><?php echo $total_benar; ?></b> dari <?php echo $total_pertanyaan; ?> pertanyaan yang ada </p>
                            <a class="btn btn-primary" href="../book.php">Baca buku lainnya</a>
                        </div>
                        <div class="card-footer">
                        
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            
			<?php include "layout/user-footer.php"; ?>
		</div>
	</div>
	
	<?php include "layout/user-js-script.php"; ?>
    
</body>

</html>