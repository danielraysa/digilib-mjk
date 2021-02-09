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
                    <!-- edit bagian bawah -->
                    <h2>Daftar Point Pengguna</h2>
				<table id="myTable3" class="table table-bordered" >
						<thead>
							<tr>
								
								<th>Pengguna</th>
								<th>Jenis Kegiatan</th>
								<th>Point</th>
							</tr>

						</thead>
						<?php
							$query = mysqli_query($conn, "SELECT id_ppengguna, username, jenis_kegiatan, point from pengguna p join point_pengguna pp on p.id_pengguna=pp.id_pengguna join points pt on pp.id_point=pt.id_point");
							//for($row = 0; $row < 10; $row++)) {
							while ($row = mysqli_fetch_array($query)) {
							?>
						<tbody>
							<tr>
								<td><?php echo $row['username'] ?></td>
								<td><?php echo $row['jenis_kegiatan'] ?></td>
								<td><?php echo $row['point'] ?></td>
								
							</tr>
							<?php } ?>
						</tbody>
						
					</table>
                    <!-- sampai sini -->
                </div>
            </div>
        </div>
    </div>

</body>
</html>