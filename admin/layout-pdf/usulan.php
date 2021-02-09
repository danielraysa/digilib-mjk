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
                    <h2>Daftar Usulan</h2>
                    <table id="myTable5" class="table table-bordered">
							<thead>
								<tr>
									<th>Id usulan</th>
									<th>Pengguna</th>
                                    <th>Judul Buku</th>
									<th>Pengarang</th>
									<th>Penerbit</th>
									<th>Tahun</th>
									<th>Status</th>
									<th>Action</th>
								</tr>

							</thead>
							<tbody>

								<?php
								//querynya belum okeh
                  $query = mysqli_query($conn, "SELECT u.id_usulan, p.username, u.judul_buku, u.pengarang, u.penerbit, u.tahun, u.status_usulan from usulan u join pengguna p on u.id_pengguna = p.id_pengguna");
                  //for($row = 0; $row < 10; $row++)) {
                  while ($row = mysqli_fetch_array($query)) {
                  ?>
								<tr>
									<td><?php echo $row['id_usulan'] ?></td>
									<td><?php echo $row['username'] ?></td>
									<td><?php echo $row['judul_buku'] ?></td>
									<td><?php echo $row['pengarang'] ?></td>
									<td><?php echo $row['penerbit'] ?></td>
									<td><?php echo $row['tahun'] ?></td>
									<td><?php echo $row['status_usulan'] ?></td>
									<td><button class="btn btn-success btnEdit" data-toggle="modal"
											data-target="#ModalEdit"
											data-id="<?php echo $row['id_usulan'] ?>">Edit</button>
											</td>
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