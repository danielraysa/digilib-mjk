<?php
    include "koneksi.php";
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $check = mysqli_query($conn, "SELECT * FROM pengguna p JOIN siswa s ON p.id_pengguna = s.id_pengguna WHERE p.username = '$user' AND p.password = '$pass'");
    $check_kar = mysqli_query($conn, "SELECT * FROM pengguna p JOIN karyawan k ON p.id_pengguna = k.id_pengguna WHERE p.username = '$user' AND p.password = '$pass'");
    $get_point = mysqli_query($conn, "SELECT * FROM points WHERE jenis_kegiatan = 'Login'");
    $point = 0;
    if(mysqli_num_rows($get_point) != 0){
        $data_point = mysqli_fetch_assoc($get_point);
        $point = $data_point['point'];
    }
    if(mysqli_num_rows($check) == 1 || mysqli_num_rows($check_kar) == 1){
        if(mysqli_num_rows($check) == 1){
            $data = mysqli_fetch_assoc($check);
            $_SESSION['user_id'] = $data['id_pengguna'];
            $_SESSION['nama'] = $data['nama_siswa'];
            if($point != 0){
                $insert_point = mysqli_query($conn, "INSERT INTO point_pengguna (id_ppengguna, id_pengguna, id_point) SELECT IFNULL(MAX(id_ppengguna)+1,1), '".$data['id_pengguna']."', ".$point." FROM point_pengguna") or die(mysqli_error($conn));
            }
            if(isset($_POST['redirect'])){
                header('location:'.$_POST['redirect']);
                exit;
            }
            header('location:index.php');
            exit;
        }
        else if(mysqli_num_rows($check_kar) == 1){
            $data = mysqli_fetch_assoc($check_kar);
            $_SESSION['user_id'] = $data['id_pengguna'];
            $_SESSION['nama'] = $data['nama_karyawan'];
            if($point != 0){
                $insert_point = mysqli_query($conn, "INSERT INTO point_pengguna (id_ppengguna, id_pengguna, id_point) SELECT IFNULL(MAX(id_ppengguna)+1,1), '".$data['id_pengguna']."', ".$point." FROM point_pengguna") or die(mysqli_error($conn));
            }
            if(isset($_POST['redirect'])){
                header('location:'.$_POST['redirect']);
                exit;
            }
            header('location:index.php');
            exit;
        }else{
            header('location:login.php?error');
            exit;
        }
    }else if($user == 'admin' && $pass == 'admin'){
        $_SESSION['user_id'] = 'admin';
        $_SESSION['nama'] = 'Admin';
        if(isset($_POST['redirect'])){
            header('location:'.$_POST['redirect']);
            exit;
        }
        header('location:admin/');
        exit;
    }else {
        header('location:login.php?not-found');
        exit;
    }
?>