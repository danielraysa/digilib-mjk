<?php 
	include "../koneksi.php"; 

	function generateRandomString($length = 20) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
	// proses tambah
	$target_dir = "../uploads/koleksi/";
	$target_dir_file = "../uploads/file/";

	if(isset($_POST['tambah'])){
		$id = $_POST['id_koleksi'];
		$id_kategori = $_POST['kategori'];
		$judul = $_POST['judul'];
		$pengarang = $_POST['pengarang'];
		$penerbit = $_POST['penerbit'];
		$tahun = $_POST['tahun'];
		$cover = "";
		$file = "";
		if(file_exists($_FILES['cover']['tmp_name'])){
			$target_cover = $target_dir . basename($_FILES['cover']['name']);
			$imageFileType = strtolower(pathinfo($target_cover,PATHINFO_EXTENSION));
			if (file_exists($target_cover)) {
				$target_cover = $target_dir . generateRandomString() .".". $imageFileType;
			}
			if (move_uploaded_file($_FILES['cover']['tmp_name'], $target_cover)) {
				// echo "The file ". htmlspecialchars(basename( $_FILES['cover']['name'])). " has been uploaded.";
			} else {
				var_dump($_FILES['cover']['error']);
				echo "Sorry, there was an error uploading your file.";
			}
			$cover = $target_cover;
		}
		if(file_exists($_FILES['file']['tmp_name'])){
			$target_file = $target_dir_file . basename($_FILES['file']['name']);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if file already exists
			if (file_exists($target_file)) {
				$target_file = $target_dir_file . generateRandomString() . $imageFileType;
			}
			if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
				// echo "The file ". htmlspecialchars(basename($_FILES['file']['name'])). " has been uploaded.";
			} else {
				var_dump($_FILES['file']['error']);
				echo "Sorry, there was an error uploading your file.";
			}
			$file = $target_file;
		}
		$query = mysqli_query($conn, "INSERT INTO koleksi VALUES ('$id','$id_kategori','$judul','$pengarang','$penerbit','$tahun','$cover','$file')");
		if(!$query){
			echo mysqli_error($conn);
		}
	}
	// proses edit
	if(isset($_POST['edit'])){
		$id = $_POST['id_koleksi'];
		$id_kategori = $_POST['kategori'];
		$judul = $_POST['judul'];
		$pengarang = $_POST['pengarang'];
		$penerbit = $_POST['penerbit'];
		$tahun = $_POST['tahun'];
		$cover = "";
		$file = "";
		if(file_exists($_FILES['cover']['tmp_name'])){
			$target_cover = $target_dir . basename($_FILES['cover']['name']);
			$imageFileType = strtolower(pathinfo($target_cover,PATHINFO_EXTENSION));
			if (file_exists($target_cover)) {
				$target_cover = $target_dir . generateRandomString() .".". $imageFileType;
			}
			if (move_uploaded_file($_FILES['cover']['tmp_name'], $target_cover)) {
				// echo "The file ". htmlspecialchars(basename( $_FILES['cover']['name'])). " has been uploaded.";
			} else {
				var_dump($_FILES['cover']['error']);
				echo "Sorry, there was an error uploading your file.";
			}
			$cover = $target_cover;
		}
		if(file_exists($_FILES['file']['tmp_name'])){
			$target_file = $target_dir_file . basename($_FILES['file']['name']);
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			// Check if file already exists
			if (file_exists($target_file)) {
				$target_file = $target_dir_file . generateRandomString() .".". $imageFileType;
			}
			if (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
				// echo "The file ". htmlspecialchars(basename($_FILES['file']['name'])). " has been uploaded.";
			} else {
				var_dump($_FILES['file']['error']);
				echo "Sorry, there was an error uploading your file.";
			}
			$file = $target_file;
		}
		//echo "UPDATE siswa SET nama_siswa='$nama',kelas='$kelas',alamat='$alamat',status='$status' WHERE id_siswa='$id'";
		$query = mysqli_query($conn, "UPDATE koleksi SET id_kategori = '$id_kategori', judul = '$judul', nama_pengarang = '$pengarang', penerbit = '$penerbit', tahun_terbit = '$tahun', cover = '$cover', file = '$file' WHERE id_koleksi = '$id'");
		if(!$query){
			echo mysqli_error($conn);
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<?php include "css-script.php"; ?>
</head>

<body>
	<!-- Sidenav -->
	<?php include "sidebar.php"; ?>
	<!-- Main content -->
	<div class="main-content" id="panel">
		<!-- Topnav -->
		<?php include "navbar.php"; ?>
		<!-- Header -->
		<div class="header bg-primary" style="background-color: green !important">
			<div class="container-fluid">
				<div class="header-body">
					<div class="row align-items-center py-4">
						<div class="col-lg-6 col-7">
							<h6 class="h2 text-white d-inline-block mb-0">Koleksi</h6>
						</div>
						<div class="col-lg-6 col-5 text-right">
							<a href="#" class="btn btn-sm btn-neutral" data-toggle="modal"
								data-target="#ModalTambah">Tambah</a>
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
							<table id="myTable" class="table table-bordered">
								<thead>
									<tr>
										<th>Judul</th>
										<th>Nama Pengarang</th>
										<th>Penerbit</th>
										<th>Tgl Terbit</th>
										<th>Kategori</th>
										<th>Cover</th>
										<th>File</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$query = mysqli_query($conn, "SELECT * FROM koleksi join kategori ON koleksi.id_kategori = kategori.id_kategori");
									//for($row = 0; $row < 10; $row++)) {
									while ($row = mysqli_fetch_array($query)) {
									?>
									<tr>
										<td><?php echo $row['judul'] ?></td>
										<td><?php echo $row['nama_pengarang'] ?></td>
										<td><?php echo $row['penerbit'] ?></td>
										<td><?php echo $row['tahun_terbit'] ?></td>
										<td><?php echo $row['nama_kategori'] ?></td>
										<td>
										<?php if($row['cover']!= "") { ?>
											<img src="<?php echo $row['cover'] ?>" width="100" />
										<?php } ?>
										</td>
										<td>
										<?php if($row['file']!= "") { ?>
											<a href="<?php echo $row['file'] ?>" target="_blank">File</a>
										<?php } ?>
										</td>
										<td>
											<button class="btn btn-success btnEdit" data-toggle="modal"
												data-target="#ModalEdit"
												data-id="<?php echo $row['id_koleksi'] ?>">Edit</button>
											<button class="btn btn-danger btnHapus" data-toggle="modal" data-target="#ModalHapus" data-id="<?php echo $row['id_koleksi'] ?>">Hapus</button>
										</td>
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
	<!-- Modal Tambah -->
	<div class="modal fade" id="ModalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Koleksi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="judul">ID Koleksi</label>
						<input type="text" name="id_koleksi" id="id_baru" class="form-control form-control-sm"
							placeholder="ID Koleksi" required />
					</div>
					<div class="form-group">
						<label for="judul">Judul</label>
						<input type="text" name="judul" id="judul_baru" class="form-control form-control-sm"
							placeholder="Judul Koleksi" />
					</div>
					<div class="form-group">
						<label for="pengarang">Nama Pengarang</label>
						<input type="text" name="pengarang" id="pengarang_baru" class="form-control form-control-sm"
							placeholder="Nama Pengarang" />
					</div>
					<div class="form-group">
						<label for="penerbit">Penerbit</label>
						<input type="text" name="penerbit" id="penerbit_baru" class="form-control form-control-sm"
							placeholder="Penerbit" />
					</div>
					<div class="form-group">
						<label for="tahun">Tahun Tenerbit</label>
						<input type="date" name="tahun" id="tahun_baru" class="form-control form-control-sm"
							placeholder="Tahun Tenerbit" />
					</div>
					<div class="form-group">
						<label for="kategori">Kategori</label>
						<select name="kategori" id="kategori_baru" class="form-control form-control-sm">
							<option value="">Pilih Kategori</option>
							<?php 
								$query_kat = mysqli_query($conn, "SELECT * FROM kategori");
								while ($row = mysqli_fetch_array($query_kat)) {
							?>
								<option value="<?php echo $row['id_kategori']; ?>">Kategori : <?php echo $row['nama_kategori'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="cover">Cover</label>
						<input type="file" accept=".jpg,.jpeg,.png" name="cover" id="cover_baru" class="form-control form-control-sm" placeholder="Cover" />
					</div>
					<div class="form-group">
						<label for="file">File</label>
						<input type="file" accept=".pdf" name="file" id="file_baru" class="form-control form-control-sm" placeholder="File Koleksi" />
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="Submit" name="tambah"class="btn btn-primary">Save</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	<!-- Modal Edit -->
	<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
		aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Data Koleksi</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
				<div class="form-group">
						<label for="judul">ID Koleksi</label>
						<input type="text" name="id_koleksi" id="id_koleksi" class="form-control form-control-sm"
							placeholder="ID Koleksi" required readonly />
					</div>
					<div class="form-group">
						<label for="judul">Judul</label>
						<input type="text" name="judul" id="judul" class="form-control form-control-sm"
							placeholder="Judul Koleksi">
					</div>
					<div class="form-group">
						<label for="pengarang">Nama Pengarang</label>
						<input type="text" name="pengarang" id="pengarang" class="form-control form-control-sm"
							placeholder="Nama Pengarang">
					</div>
					<div class="form-group">
						<label for="penerbit">Penerbit</label>
						<input type="text" name="penerbit" id="penerbit" class="form-control form-control-sm" placeholder="Penerbit">
					</div>
					<div class="form-group">
						<label for="tahun">Tahun Tenerbit</label>
						<input type="date" name="tahun" id="tahun" class="form-control form-control-sm" placeholder="Tahun Tenerbit">
					</div>
					<div class="form-group">
						<label for="kategori">Kategori</label>
						<select name="kategori" id="kategori" class="form-control form-control-sm">
							<option value="">Pilih Kategori</option>
							<?php 
								$query_kat = mysqli_query($conn, "SELECT * FROM kategori");
								while ($row = mysqli_fetch_array($query_kat)) {
							?>
								<option value="<?php echo $row['id_kategori']; ?>"><?php echo $row['nama_kategori'] ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group">
						<label for="cover">Cover</label>
						<input type="file" accept=".jpg,.jpeg,.png" name="cover" id="cover" class="form-control form-control-sm" placeholder="Cover">
					</div>
					<div class="form-group">
						<label for="file">File</label>
						<input type="file" accept=".pdf" name="file" id="file" class="form-control form-control-sm" placeholder="File Koleksi">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="edit" class="btn btn-primary">Save</button>
				</div>
			</form>
			</div>
		</div>
	</div>
	<?php include "js-script.php"; ?>
	<script>
		$('#myTable').DataTable();
		$('#myTable tbody').on('click', '.btnEdit', function () {
			var id = $(this).attr('data-id');
			$.ajax({
				url: 'ajax.php',
				type: 'post',
				data: {
					editkoleksi: true,
					id_koleksi: id
				},
				dataType: 'json',
				success: function (result) {
					console.log(result);
					$("#id_koleksi").val(id);
					$("#judul").val(result.judul);
					$("#pengarang").val(result.nama_pengarang);
					$("#penerbit").val(result.penerbit);
					$("#tahun").val(result.tahun_terbit);
					$("#kategori").val(result.id_kategori);
					$("#cover").val(result.cover);
					$("#file").val(result.file);
				}
			})
		})
	</script>
</body>

</html>