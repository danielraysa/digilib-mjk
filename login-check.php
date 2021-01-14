<?php
    include "koneksi.php";
    $user = mysqli_real_escape_string($koneksi, $_POST['user']);
    $pass = mysqli_real_escape_string($koneksi, $_POST['pass']);

    $check = mysqli_query("SELECT * FROM pengguna WHERE username = '$user'");
    if(mysqli_num_rows($check) == 1){
        $data = mysqli_fetch_assoc($check);
        if($pass == $data['password']){
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