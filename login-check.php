<?php
    include "koneksi.php";
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);

    $check = mysqli_query($conn, "SELECT * FROM pengguna p JOIN siswa s ON p.id_pengguna = s.id_pengguna WHERE p.username = '$user' AND p.password = '$pass'");
    $check_kar = mysqli_query($conn, "SELECT * FROM pengguna p JOIN karyawan k ON p.id_pengguna = k.id_pengguna WHERE p.username = '$user' AND p.password = '$pass'");
    if(mysqli_num_rows($check) == 1 || mysqli_num_rows($check_kar) == 1){
        if(mysqli_num_rows($check) == 1){
            $data = mysqli_fetch_assoc($check);
            $_SESSION['user_id'] = $data['id_pengguna'];
            $_SESSION['nama'] = $data['nama_siswa'];
            header('location:user/');
            exit;
        }
        else if(mysqli_num_rows($check_kar) == 1){
            $data = mysqli_fetch_assoc($check_kar);
            $_SESSION['user_id'] = $data['id_pengguna'];
            $_SESSION['nama'] = $data['nama_karyawan'];
            header('location:user/');
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