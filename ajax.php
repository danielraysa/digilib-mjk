<?php
	include 'koneksi.php';
	if(isset($_POST['edituser'])){
		$id = $_POST['id_siswa'];
		$query = mysqli_query($conn, "SELECT * FROM siswa WHERE id_siswa = '".$id."'");
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}
	if(isset($_POST['editkaryawan'])){
		$id = $_POST['id_karyawan'];
		$query = mysqli_query($conn, "SELECT * FROM karyawan WHERE id_karyawan = '".$id."'");
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}

	if(isset($_POST['hapususer'])){
		$id = $_POST['id_siswa'];
		$query = mysqli_query($conn, "UPDATE siswa SET status = 'Tidak Aktif' WHERE id_siswa = '".$id."'");
		if($query){
			echo true;
		}else{
			echo false;
		}
	}
	if(isset($_POST['editKategori'])){
		$id = $_POST['id_kategori'];
		$query = mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori = '".$id."'");
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}
	if(isset($_POST['editpoint'])){
		$id = $_POST['id_point'];
		$query = mysqli_query($conn, "SELECT * FROM points WHERE id_point = '".$id."'");
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}
	if(isset($_POST['editpertanyaan'])){
		$id = $_POST['id_pertanyaan'];
		$query = mysqli_query($conn, "SELECT * FROM pertanyaan WHERE id_pertanyaan = '".$id."'");
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}
	if(isset($_POST['editkoleksi'])){
		$id = $_POST['id_koleksi'];
		$query = mysqli_query($conn, "SELECT * FROM koleksi WHERE id_koleksi = '".$id."'");
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}
	if(isset($_POST['editusulan'])){
		$id = $_POST['id_usulan'];
		$query = mysqli_query($conn, "SELECT * FROM usulan WHERE id_usulan = '".$id."'");
		$row = mysqli_fetch_array($query);
		echo json_encode($row);
	}
?>