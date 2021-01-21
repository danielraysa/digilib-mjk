<?php
include '../koneksi.php';
if(isset($_POST['update_bacaan'])){
    /* $id_koleksi = $_POST['id_koleksi'];
    $id_pengguna = $_SESION['user_id'];
    $no_halaman = $_POST['halaman'];
    $tgl = date('Y-m-d');
    $check = mysqli_query("SELECT * FROM log_baca WHERE id_koleksi = '$id_koleksi' AND id_pengguna = '$id_pengguna' ORDER BY tanggal_baca DESC LIMIT 1");
    if(mysqli_num_rows($check) != 0){
        $fetch = mysqli_fetch_assoc($check);
        $query = mysqli_query($conn, "UPDATE log_baca SET halaman_bacatg = $no_halaman, tanggal_baca = '$tgl' WHERE id_koleksi = '$id_koleksi' AND id_pengguna = '$id_pengguna' AND id_logbaca = '".$fetch['id_logbaca']."'");
    }else{
        $query = mysqli_query($conn, "INSERT INTO log_baca(id_logbaca, id_koleksi, id_pengguna, halaman_bacatg, tanggal_baca) SELECT MAX(id_logbaca)+1, '$id_koleksi','$id_pengguna','$no_halaman','$tgl' FROM log_baca");
    } */
    $id_log = $_POST['id_log'];
    $no_halaman = $_POST['halaman'];
    $query = mysqli_query($conn, "UPDATE log_baca SET halaman_bacatg = $no_halaman WHERE id_logbaca = '$id_log'");
    if(!$query)
    echo mysqli_error($conn);
    else
    echo "success";
}

?>