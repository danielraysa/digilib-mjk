
<?php 
// include "../../koneksi.php";
$query1= mysqli_query($conn, "SELECT count(id_siswa)idSiswa FROM siswa");
$data1= mysqli_fetch_array($query1);
$siswa = $data1['idSiswa'];

$query2= mysqli_query($conn, "SELECT count(id_karyawan)idKaryawan FROM karyawan");
$data2= mysqli_fetch_array($query2);
$karya = $data2['idKaryawan'];

$query3= mysqli_query($conn, "SELECT kategori.nama_kategori as namaKat, count(koleksi.id_koleksi) as id FROM kategori 
join koleksi where kategori.id_kategori=koleksi.id_kategori");
$data3= mysqli_fetch_array($query3);
$kat = $data3['namaKat'];
$id=$data3['id'];

$query4= mysqli_query($conn, "SELECT count(id_ses_kunjungan)idSiswa FROM siswa join pengguna on siswa.id_pengguna=pengguna.id_pengguna 
join session_kunjungan ON pengguna.id_pengguna=session_kunjungan.id_pengguna ");
$data4= mysqli_fetch_array($query4);
$siswa1 = $data4['idSiswa'];

$query5= mysqli_query($conn, "SELECT count(id_ses_kunjungan)idKaryawan FROM karyawan join pengguna on karyawan.id_pengguna=pengguna.id_pengguna 
join session_kunjungan ON pengguna.id_pengguna=session_kunjungan.id_pengguna");
$data5= mysqli_fetch_array($query5);
$karya2 = $data5['idKaryawan'];

?>

<!DOCTYPE html>
<html>
<head>
<?php //include "css-script.php"; ?>
<link rel="stylesheet" href="css/bootstrap/bootstrap.css" type="text/css">
</head>

<body>
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card card-stats">
                <div class="card-body table-responsive">
                    <!-- Card body -->
                    <table style="width: 100%; text-align: center">
                        <tr>
                            <td style="width: 30%"><img src="img/brand/logo.png" height="100" /></td>
                            <td style="width: 70%">
                                <h2 style="margin: 0">LAPORAN PERPUSTAKAAN MAN 2 MOJOKERTO</h2>
                            </td>
                        </tr>
                    </table>
                    <br></br>
                    <h4>Anggota</h4>
                    <table id="Tabel1" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Jenis Anggota</th>
                                <th>Jumlah</th>						
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Siswa</td>
                                <td><?php echo $siswa?></td>
                            </tr>
                            <tr>
                                <td>Karyawan</td>
                                <td><?php echo $karya?></td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                    <h4>Koleksi</h4>
                    <table id="Tabel2" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Jenis Koleksi</th>
                                <th>Jumlah Judul</th>						
                            </tr>

                        </thead>
                        <tbody>

                            <tr>
                                <td><?php echo $kat?></td>
                                <td><?php echo $id?></td>
                            </tr>
                            
                        </tbody>
                    </table>
                    <br>
                    <h4>Kunjungan</h4>
                    <table id="Tabel3" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Jenis Anggota</th>
                                <th>Jumlah Kunjungan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Siswa</td>
                                <td><?php echo $siswa1?></td>
                            </tr>
                            <tr>
                                <td>Karyawan</td>
                                <td><?php echo $karya2?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>