<?php
$filename = basename(__FILE__);
$dir = basename(__DIR__);
include "../koneksi.php";
include "../function.php";
check_session($dir."/".$filename);
// proses tambah
	
	// proses edit
	if(isset($_POST['edit_pengguna'])){
		$id = $_POST['id_pengguna'];
        $user = $_POST['username'];
        $pass = $_POST['password'];
		$query = mysqli_query($conn, "UPDATE pengguna SET username='$user', password='$pass' WHERE id_pengguna='$id'");
	}
	if(isset($_POST['hapus_pengguna'])){
		$id = $_POST['id_pengguna'];
		// echo "UPDATE Pengguna SET status = 'Tidak Aktif' WHERE id_Pengguna = '".$id."'";
		// $query = mysqli_query($conn, "UPDATE Pengguna SET status = 'Tidak Aktif' WHERE id_Pengguna = '".$id."'");
		$query = mysqli_query($conn, "DELETE from pengguna WHERE id_pengguna = '".$id."'");
	}
	
	
?>
<!DOCTYPE html>
<html>
<!-- form asli -->
<head>
<?php include "css-script.php"; ?>
</head>

<body>
	<!-- Sidenav -->
	<?php include "sidebar.php"; ?>
	<!-- Main content -->
	<!--Pengguna-->
	<div class="main-content" id="panel">
		<!-- Topnav -->
		<?php include "navbar.php"; ?>
		<!-- Header -->

		<!-- Header -->
		<div class="header " style="background-color: #B0C4DE !important">
			<div class="container-fluid">
				<div class="header-body">
					<div class="row align-items-center py-4">
						<div class="col-lg-6 col-7">
							<h6 class="h2 text-white d-inline-block mb-0">Pengguna</h6>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid mt-3">

			<!-- Card stats -->
			<div class="row">
				<div class="col-xl-12 col-md-12">
					<div class="card card-stats">
						<div class="card-body table-responsive">
							<!-- Card body -->
							<table id="Tabel2" class="table table-bordered">
								<thead>
									<tr>
										<th>ID Pengguna</th>
										<th>Username</th>	
                                        <th>Password</th>				
										<th>Action</th>					
									</tr>

								</thead>
								<tbody>

									<?php
					$query = mysqli_query($conn, "SELECT * from pengguna ");
					//for($row = 0; $row < 10; $row++)) {
					while ($row = mysqli_fetch_array($query)) {
					?>
									<tr>
										<td><?php echo $row['id_pengguna'] ?></td>
										<td><?php echo $row['username'] ?></td>
                                        <td><?php echo $row['password'] ?></td>
										<td><button class="btn btn-success btnEditKat" data-toggle="modal"
												data-target="#ModalEditPengguna"
												data-id="<?php echo $row['id_pengguna'] ?>">Edit</button>
												<button class="btn btn-danger btnHapusKat" data-toggle="modal"
												data-target="#ModalHapusPengguna"
												data-id="<?php echo $row['id_pengguna'] ?>">Hapus</button></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php include "footer.php"; ?>
		</div>
	</div>
	<!-- Modal Pengguna -->
	<!-- Modal Tambah Pengguna-->
	<!-- Modal Edit Pengguna -->
	<div class="modal fade" id="ModalEditPengguna" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Data Pengguna</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post">
						<div class="form-group">
							<label for="id">ID Pengguna</label>
							<input type="text" name="id_pengguna" id="id_pengguna" class="form-control form-control-sm" readonly>
						</div>
						<div class="form-group">
							<label for="user">Username</label>
							<input type="text" name="username" id="username" class="form-control form-control-sm" placeholder="Username Anda">
						</div>
                        <div class="form-group">
							<label for="pass">Password</label>
							<input type="text" name="password" id="password" class="form-control form-control-sm" placeholder="Username Anda">
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="edit_pengguna" class="btn btn-primary">Save</button>
				</div>
				</form>
			</div>
		</div>
	</div>
		<!-- modal hapus -->
	<div class="modal fade" id="ModalHapusPengguna" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Pengguna</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
				<div class="modal-body">
					Apakah anda akan menghapus data pengguna ini?
					<input type="hidden" name="id_pengguna" id="id_pengguna_hapus" class="form-control form-control-sm" readonly>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="hapus_pengguna" class="btn btn-primary">Save</button>
				</div>
				</form>	
			</div>
		</div>
	</div>
	<?php include "js-script.php"; ?>
	<script>
		
		$('#Tabel2').DataTable();
		$('#Tabel2 tbody').on('click', '.btnEditKat', function () {
			var idPengguna = $(this).attr('data-id');
			$.ajax({
				url: 'ajax.php',
				type: 'post',
				data: {
					editPengguna: true,
					id_pengguna: idPengguna
				},
				dataType: 'json',
				success: function (result) {
					console.log(result);
					$("#id_pengguna").val(idPengguna);
					$("#username").val(result.username);
                    $("#password").val(result.password);
				}
			});
		});
		$('.btnHapusKat').on('click', function () {
			var idPengguna = $(this).attr('data-id');
			$("#id_pengguna_hapus").val(idPengguna);
		});
		
	</script>

</body>
</html>