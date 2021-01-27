<?php
    include "koneksi.php";
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $tgl = date('Y-m-d');
    $check = mysqli_query($conn, "SELECT * FROM pengguna p JOIN siswa s ON p.id_pengguna = s.id_pengguna WHERE p.username = '$user' AND p.password = '$pass'");
    $check_kar = mysqli_query($conn, "SELECT * FROM pengguna p JOIN karyawan k ON p.id_pengguna = k.id_pengguna WHERE p.username = '$user' AND p.password = '$pass'");
    $kode_point = 'PO003';
    
    if(mysqli_num_rows($check) == 1 || mysqli_num_rows($check_kar) == 1){
        $insert_sess = mysqli_query($conn, "INSERT INTO session_kunjungan (id_ses_kunjungan, id_pengguna, tanggal_kunjungan) SELECT IFNULL(MAX(id_ses_kunjungan)+1,1), '".$data['id_pengguna']."', '".date('Y-m-d H:i:s')."' FROM session_kunjungan") or die(mysqli_error($conn));
        if(mysqli_num_rows($check) == 1){
            $data = mysqli_fetch_assoc($check);
            $_SESSION['user_id'] = $data['id_pengguna'];
            $_SESSION['nama'] = $data['nama_siswa'];
            $get_point = mysqli_query($conn, "SELECT * from point_pengguna pp WHERE id_point = '".$kode_point."' AND id_pengguna = '".$_SESSION['user_id']."' AND date(tgl_perolehan) = '".$tgl."'");
            if(mysqli_num_rows($get_point) != 0){
                $insert_point = mysqli_query($conn, "INSERT INTO point_pengguna (id_ppengguna, id_pengguna, id_point, tgl_perolehan) SELECT IFNULL(MAX(id_ppengguna)+1,1), '".$data['id_pengguna']."', '".$kode_point."','".date('Y-m-d H:i:s')."' FROM point_pengguna") or die(mysqli_error($conn));
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
            $get_point = mysqli_query($conn, "SELECT * from point_pengguna pp WHERE id_point = '".$kode_point."' AND id_pengguna = '".$_SESSION['user_id']."' AND date(tgl_perolehan) = '".$tgl."'");
            if(mysqli_num_rows($get_point) != 0){
                $insert_point = mysqli_query($conn, "INSERT INTO point_pengguna (id_ppengguna, id_pengguna, id_point, tgl_perolehan) SELECT IFNULL(MAX(id_ppengguna)+1,1), '".$data['id_pengguna']."', '".$kode_point."','".date('Y-m-d H:i:s')."' FROM point_pengguna") or die(mysqli_error($conn));
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
        header('location:admin/admin.php');
        exit;
    }else {
        header('location:login.php?not-found');
        exit;
    }
?>