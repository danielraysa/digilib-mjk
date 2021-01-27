<?php 
    $filename = basename(__FILE__);
	$dir = basename(__DIR__);
	include "../koneksi.php";
	include "../function.php";
    check_session($dir."/".$filename);
    
    $user_id = $_SESSION['user_id'];
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    if($id != ''){
        $get_quiz = mysqli_query($conn, "SELECT * from log_quiz lq WHERE id_pengguna = '".$user_id."' AND id_pertanyaan IN (SELECT id_pertanyaan FROM pertanyaan p WHERE id_koleksi = '".$id."')") or die(mysqli_error($conn));
        if(mysqli_num_rows($get_quiz) == 0){
            $_quiz = mysqli_query($conn, "SELECT * from pertanyaan WHERE id_koleksi = '".$id."'") or die(mysqli_error($conn));
            while($_row = mysqli_fetch_assoc($_quiz)){
                $insert = mysqli_query($conn, "INSERT INTO log_quiz (id_logquiz, id_pertanyaan, id_pengguna) SELECT IFNULL(MAX(id_logquiz)+1,1), '".$_row['id_pertanyaan']."', '".$user_id."' FROM log_quiz") or die(mysqli_error($conn));
            }
        }
    }
    // $get_point = mysqli_query($conn, "SELECT * FROM point_pengguna pp JOIN points p ON p.id_point = pp.id_point WHERE pp.id_pengguna = '".$_SESSION['user_id']."'");
    $tgl = date('Y-m-d');
    if(isset($_POST['simpan_jawaban'])){
        $data_pertanyaan = mysqli_query($conn, "SELECT * FROM pertanyaan WHERE id_koleksi = '$id'");
        while($row = mysqli_fetch_assoc($data_pertanyaan)) {
            $id_arr = 'jawaban_'.$row['id_pertanyaan'];
            $jawab = $_POST[$id_arr];
            $hasil = 'salah';
            if($jawab == $row['jawaban']){
                $hasil = 'benar';
            }
            $upd = mysqli_query($conn, "UPDATE log_quiz SET jawaban = '$jawab', tanggal_jawab = '$tgl', benar_salah = '$hasil' WHERE id_pengguna = '$user_id' AND id_pertanyaan = '".$row['id_pertanyaan']."'") or die(mysqli_error($conn));
        }
        unset($_POST);
        header('location:index.php');
        exit;
    }
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
            <?php if($id != "") { ?>
			<div class="row justify-content-center mb-2">
			    <div class="col-lg-12">
                    <div class="card">
                    <form action="" method="POST">
                        <div class="card-header">
                            <b>Quiz</b>
                        </div>
                        <div class="card-body">
                            <?php
                            $i = 1;
                            $data_pertanyaan = mysqli_query($conn, "SELECT * FROM pertanyaan WHERE id_koleksi = '$id'");
                            while($row = mysqli_fetch_assoc($data_pertanyaan)) {
                            ?>
                            <div class="form-group">
                                <label for="judul"><?= $i++; ?>. <?= $row['pertanyaan'] ?></label>
                                <?php
                                $data_jawaban = mysqli_query($conn, "SELECT * FROM jawaban WHERE id_pertanyaan = '".$row['id_pertanyaan']."'");
                                while($_row = mysqli_fetch_assoc($data_jawaban)) {
                                ?>
                                <div class="form-check">
                                    <input type="radio" name="jawaban_<?= $_row['id_pertanyaan'] ?>" class="form-radio-input" value="<?= $_row['id_jawaban'] ?>" /> <?= $_row['jawaban'] ?>
                                </div>
                                <?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="card-footer">
                        <button type="submit" name="simpan_jawaban" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <?php }else { ?>
                <div class="row justify-content-center mb-2">
			    <div class="col-lg-12">
                    <div class="card table-responsive">
						<div class="card-body p-1">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr class="bg-primary text-white">
                                        <th style="width:10%">No.</th>
                                        <th>Judul Buku</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                $i = 1;
                                $query = mysqli_query($conn, "SELECT k.id_koleksi, k.judul from log_quiz lq JOIN pertanyaan p ON p.id_pertanyaan = lq.id_pertanyaan JOIN koleksi k ON k.id_koleksi = p.id_koleksi WHERE lq.id_pengguna = '$user_id' GROUP BY k.id_koleksi");
                                while($row = mysqli_fetch_assoc($query)) { ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $row['judul']; ?></td>
                                        <td><a href="?id=<?php echo $row['id_koleksi']; ?>" class="btn btn-success">Jawab Quiz</a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <?php } ?>
			<?php include "layout/user-footer.php"; ?>
		</div>
	</div>
	
	<?php include "layout/user-js-script.php"; ?>
    
</body>

</html>