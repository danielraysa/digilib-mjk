<?php
    include "koneksi.php";
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $check = mysqli_query($conn, "SELECT * FROM pengguna p JOIN siswa s ON p.id_pengguna = s.id_pengguna WHERE p.username = '$user' AND p.password = '$pass'");
    $check_kar = mysqli_query($conn, "SELECT * FROM pengguna p JOIN karyawan k ON p.id_pengguna = k.id_pengguna WHERE p.username = '$user' AND p.password = '$pass'");
    if(mysqli_num_rows($check) == 1 || mysqli_num_rows($check_kar) == 1){
        if(mysqli_num_rows($check) == 1){
            $data = mysqli_fetch_assoc($check);
            $sel_point = mysqli_query($conn, "SELECT * FROM points WHERE jenis_kegiatan = 'Login'");
            $row_point = mysqli_fetch_assoc($sel_point);
            $_SESSION['user_id'] = $data['id_pengguna'];
            $_SESSION['nama'] = $data['nama_siswa'];
            // $insert_point = mysqli_query($conn, "INSERT INTO point_pengguna (id_ppengguna, id_pengguna, id_point) SELECT MAX(id_ppengguna)+1, '".$_SESSION['user_id']."', ".$row_point['point']." FROM point_pengguna") or die(mysqli_error($conn));
            header('location:index.php');
            exit;
        }
        else if(mysqli_num_rows($check_kar) == 1){
            $data = mysqli_fetch_assoc($check_kar);
            $_SESSION['user_id'] = $data['id_pengguna'];
            $_SESSION['nama'] = $data['nama_karyawan'];
            // $insert_point = mysqli_query($conn, "INSERT INTO point_pengguna (id_ppengguna, id_pengguna, id_point) SELECT MAX(id_ppengguna)+1, '".$_SESSION['user_id']."', ".$row_point['point']." FROM point_pengguna") or die(mysqli_error($conn));
            header('location:index.php');
            exit;
        }else{
            header('location:login.php?error');
            exit;
        }
    }else if($user == 'admin' && $pass == 'admin'){
        header('location:admin/');
        exit;
    }else {
        header('location:login.php?not-found');
        exit;
    }
?>