<?php 
	$filename = basename(__FILE__);
	$dir = basename(__DIR__);
	include "../koneksi.php";
	include "../function.php";
	check_session($dir."/".$filename);
	function createIdJawaban() {
		global $conn;
		$query = mysqli_query($conn, "SELECT MAX(id_jawaban) as idjawaban FROM jawaban"); // ganti tabel jawaban
		$data = mysqli_fetch_array($query);
		$id_jawaban = $data['idjawaban'];

		$urut = (int) substr($id_jawaban,2,3);
		$urut++;
		$huruf = "JW";
		$id_jawaban = $huruf.sprintf("%03s", $urut);
		return $id_jawaban;
	}
	// proses tambah
	if(isset($_POST['tambah'])){
		$id_pertanyaan = $_POST['id_pertanyaan'];
		$koleksi = $_POST['koleksi'];
		$pertanyaan = $_POST['pertanyaan'];
		$query = mysqli_query($conn, "INSERT INTO pertanyaan (id_pertanyaan, id_koleksi, pertanyaan, status) VALUES ('$id_pertanyaan','$koleksi','$pertanyaan','Aktif')");
		$jawaban_a = $_POST['jawaban1'];
		$jawaban_b = $_POST['jawaban2'];
		$jawaban_c = $_POST['jawaban3'];
		$jawaban_d = $_POST['jawaban4'];
		$jawaban_benar = $_POST['jawaban_benar'];
		$id_jawaban_1 = createIdJawaban();
		$jawaban1 = mysqli_query($conn, "INSERT INTO jawaban(id_jawaban, id_pertanyaan, pilihan, jawaban) VALUES ('$id_jawaban_1', '$id_pertanyaan','A','$jawaban_a')");
		$id_jawaban_2 = createIdJawaban();
		$jawaban2 = mysqli_query($conn, "INSERT INTO jawaban(id_jawaban, id_pertanyaan, pilihan, jawaban) VALUES ('$id_jawaban_2', '$id_pertanyaan','B','$jawaban_b')");
		$id_jawaban_3 = createIdJawaban();
		$jawaban3 = mysqli_query($conn, "INSERT INTO jawaban(id_jawaban, id_pertanyaan, pilihan, jawaban) VALUES ('$id_jawaban_3', '$id_pertanyaan','C','$jawaban_c')");
		$id_jawaban_4 = createIdJawaban();
		$jawaban4 = mysqli_query($conn, "INSERT INTO jawaban(id_jawaban, id_pertanyaan, pilihan, jawaban) VALUES ('$id_jawaban_4', '$id_pertanyaan','D','$jawaban_d')");
		$id_jawaban_benar = "";
		switch ($jawaban_benar) {
			case 'A':
				$id_jawaban_benar = $id_jawaban_1;
				break;
			case 'B':
				$id_jawaban_benar = $id_jawaban_2;
				break;
			case 'C':
				$id_jawaban_benar = $id_jawaban_3;
				break;
			case 'D':
				$id_jawaban_benar = $id_jawaban_4;
				break;
			
			default:
			$id_jawaban_benar = null;
				break;
		}
		$update = mysqli_query($conn, "UPDATE pertanyaan SET jawaban = '$id_jawaban_benar' WHERE id_pertanyaan = '$id_pertanyaan'") or die(mysqli_error($conn));

		if(!$query){
			echo mysqli_error($conn);
		}
	}
	// proses edit
	if(isset($_POST['edit'])){
		$id_pertanyaan = $_POST['id_pertanyaan'];
		$koleksi = $_POST['koleksi'];
		$pertanyaan = $_POST['pertanyaan'];
		$idjawaban = $_POST['idjawaban'];
		$jawaban = $_POST['jawaban'];

		$jawaban_benar = $_POST['jawaban_benar'];
		$id_jawaban_benar = "";
		switch ($jawaban_benar) {
			case 'A':
				$id_jawaban_benar = $idjawaban[0];
				break;
			case 'B':
				$id_jawaban_benar = $idjawaban[1];
				break;
			case 'C':
				$id_jawaban_benar = $idjawaban[2];
				break;
			case 'D':
				$id_jawaban_benar = $idjawaban[3];
				break;
			
			default:
			$id_jawaban_benar = null;
				break;
		}
		for($i = 0; $i < count($jawaban); $i++){
			$jawaban_query = mysqli_query($conn, "UPDATE jawaban SET jawaban = '".$jawaban[$i]."' WHERE id_jawaban = '".$idjawaban[$i]."'");
		}
		
		$query = mysqli_query($conn, "UPDATE pertanyaan SET id_koleksi = '$koleksi', pertanyaan = '$pertanyaan', jawaban = '$id_jawaban_benar' WHERE id_pertanyaan = '$id_pertanyaan'");
		if(!$query){
			echo mysqli_error($conn);
		}
	}

	if(isset($_POST['hapus_pertanyaan'])){
		$id_pertanyaan = $_POST['id_pertanyaan'];
		$query = mysqli_query($conn, "UPDATE pertanyaan SET status = 'Tidak Aktif' WHERE id_pertanyaan = '$id_pertanyaan'");
		if(!$query){
			echo mysqli_error($conn);
		}
	}
	// generate id
	$query = mysqli_query($conn, "SELECT MAX(id_pertanyaan) as idpertanyaan FROM pertanyaan"); // ganti tabel koleksi
	$data = mysqli_fetch_array($query);
	$kode = $data['idpertanyaan'];

	$urut = (int) substr($kode,2,3);
	$urut++;
	$huruf = "PT";
	$kode = $huruf.sprintf("%03s", $urut);
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
		<div class="header bg-primary" style="background-color: #B0C4DE !important">
			<div class="container-fluid">
				<div class="header-body">
					<div class="row align-items-center py-4">
						<div class="col-lg-6 col-7">
							<h6 class="h2 text-white d-inline-block mb-0">Pertanyaan</h6>
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
							<table id="myTable" class="table table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Judul</th>
										<th>Pertanyaan</th>
										<th>Jawaban</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$query = mysqli_query($conn, "SELECT * FROM pertanyaan p join koleksi k ON p.id_koleksi = k.id_koleksi JOIN jawaban j ON p.jawaban = j.id_jawaban WHERE p.status = 'Aktif'");
									while ($row = mysqli_fetch_array($query)) {
									?>
									<tr>
										<td style="width: 30%"><?php echo $row['judul'] ?></td>
										<td style="width: 30%"><?php echo $row['pertanyaan'] ?></td>
										<td><?php echo $row['jawaban'] ?></td>
										<td>
											<button class="btn btn-success btnEdit" data-toggle="modal"
												data-target="#ModalEdit"
												data-id="<?php echo $row['id_pertanyaan'] ?>">Edit</button>
											<button class="btn btn-danger btnHapus" data-toggle="modal" data-target="#ModalHapus" data-id="<?php echo $row['id_pertanyaan'] ?>">Hapus</button>
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
					<h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Pertanyaan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-6 col-md-12">
							<div class="form-group">
								<label for="judul">ID Pertanyaan</label>
								<input type="text" name="id_pertanyaan" id="id_baru" class="form-control form-control-sm"
									placeholder="ID Pertanyaan" value="<?php echo $kode ?>" required readonly />
							</div>
							<div class="form-group">
								<label for="kategori">Koleksi</label>
								<select name="koleksi" id="koleksi_baru" class="form-control form-control-sm">
									<option value="">Pilih Koleksi</option>
									<?php 
										$query_kat = mysqli_query($conn, "SELECT * FROM koleksi");
										while ($row = mysqli_fetch_array($query_kat)) {
									?>
										<option value="<?php echo $row['id_koleksi']; ?>"><?php echo $row['judul'] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="judul">Pertanyaan</label>
								<textarea name="pertanyaan" id="pertanyaan_baru" class="form-control form-control-sm" placeholder="Pertanyaan"></textarea>
							</div>
						</div>
						<div class="col-lg-6 col-md-12">
							<div class="form-group">
								<label for="judul">Jawaban</label>
								<input type="text" name="jawaban1" class="form-control form-control-sm" placeholder="Jawaban A" />
								<input type="text" name="jawaban2" class="form-control form-control-sm" placeholder="Jawaban B" />
								<input type="text" name="jawaban3" class="form-control form-control-sm" placeholder="Jawaban C" />
								<input type="text" name="jawaban4" class="form-control form-control-sm" placeholder="Jawaban D" />
							</div>
							<div class="form-group">
								<label for="judul">Jawaban yang Benar</label>
								<div class="form-check">
									<input type="radio" name="jawaban_benar" class="form-radio-input" value="A" /> A
								</div>
								<div class="form-check">
									<input type="radio" name="jawaban_benar" class="form-radio-input" value="B" /> B
								</div>
								<div class="form-check">
									<input type="radio" name="jawaban_benar" class="form-radio-input" value="C" /> C
								</div>
								<div class="form-check">
									<input type="radio" name="jawaban_benar" class="form-radio-input" value="D" /> D
								</div>
							</div>
						</div>
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
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
			<form action="" method="post" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Edit Data Pertanyaan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-6 col-md-12">
							<div class="form-group">
								<label for="judul">ID Pertanyaan</label>
								<input type="text" name="id_pertanyaan" id="id_pertanyaan" class="form-control form-control-sm"
									placeholder="ID Pertanyaan" required readonly />
							</div>
							<div class="form-group">
								<label for="kategori">Koleksi</label>
								<select name="koleksi" id="koleksi" class="form-control form-control-sm">
									<option value="">Pilih Koleksi</option>
									<?php 
										$query_kat = mysqli_query($conn, "SELECT * FROM koleksi");
										while ($row = mysqli_fetch_array($query_kat)) {
											?>
										<option value="<?php echo $row['id_koleksi']; ?>"><?php echo $row['judul'] ?></option>
									<?php } ?>
								</select>
							</div>
							<div class="form-group">
								<label for="judul">Pertanyaan</label>
								<textarea name="pertanyaan" id="pertanyaan" class="form-control form-control-sm"></textarea>
							</div>
						</div>
						<div class="col-lg-6 col-md-12">
							<div class="form-group" id="jawaban_text">
								<label for="judul">Jawaban</label>
								<!-- <input type="text" name="jawaban1" id="jawaban1" class="form-control form-control-sm" placeholder="Jawaban A" />
								<input type="text" name="jawaban2" id="jawaban2" class="form-control form-control-sm" placeholder="Jawaban B" />
								<input type="text" name="jawaban3" id="jawaban3" class="form-control form-control-sm" placeholder="Jawaban C" />
								<input type="text" name="jawaban4" id="jawaban4" class="form-control form-control-sm" placeholder="Jawaban D" /> -->
							</div>
							<div class="form-group" id="pilihan_text">
								<label for="judul">Jawaban yang Benar</label>
								<div class="form-check">
									<input type="radio" name="jawaban_benar" id="jawaban_benar1" class="form-radio-input" value="A" /> A
								</div>
								<div class="form-check">
									<input type="radio" name="jawaban_benar" id="jawaban_benar2" class="form-radio-input" value="B" /> B
								</div>
								<div class="form-check">
									<input type="radio" name="jawaban_benar" id="jawaban_benar3" class="form-radio-input" value="C" /> C
								</div>
								<div class="form-check">
									<input type="radio" name="jawaban_benar" id="jawaban_benar4" class="form-radio-input" value="D" /> D
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="Submit" name="edit" class="btn btn-primary">Save</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	<!-- modal hapus -->
	<div class="modal fade" id="ModalHapus" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Hapus Data Pertanyaan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="" method="post">
				<div class="modal-body">
					Apakah anda akan menghapus data pertanyaan ini?
					<input type="hidden" name="id_pertanyaan" id="id_pertanyaan_hapus" class="form-control form-control-sm" readonly>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" name="hapus_pertanyaan" class="btn btn-primary">Save</button>
				</div>
				</form>	
			</div>
		</div>
	</div>
	
	<?php include "js-script.php"; ?>
	<script>
		$('#myTable').DataTable({
			// autoWidth: false
		});
		$('#myTable tbody').on('click', '.btnEdit', function () {
			var id_tanya = $(this).attr('data-id');
			$.ajax({
				url: 'ajax.php',
				type: 'post',
				data: {
					editpertanyaan: true,
					id_pertanyaan: id_tanya
				},
				dataType: 'json',
				success: function (result) {
					console.log(result);
					var data1 = result.pertanyaan;
					var data2 = result.jawaban;
					$("#id_pertanyaan").val(id_tanya);
					$("#koleksi").val(data1.id_koleksi);
					$("#pertanyaan").val(data1.pertanyaan);
					$('#jawaban_text').html('<label for="judul">Jawaban</label>');
					for (let index = 0; index < data2.length; index++) {
						// const element = array[index];
						$('#jawaban_text').append('<input type="text" name="jawaban[]" class="form-control form-control-sm" value="'+(data2[index].jawaban)+'"/>')
						$('#jawaban_text').append('<input type="hidden" name="idjawaban[]" class="form-control form-control-sm" value="'+(data2[index].id_jawaban)+'"/>')
						if(data2[index].id_jawaban == data1.jawaban){
							$('#jawaban_benar'+(index+1)).attr('checked', true);
							// $('#jawaban_benar'+(index+1)).is(":checked");
						}
					}
					// $("#jawaban").val(result.jawaban);
				}
			})
		})
		$('#myTable tbody').on('click', '.btnHapus', function () {
			var id_tanya = $(this).attr('data-id');
			$('#id_pertanyaan_hapus').val(id_tanya);
		})
	</script>
</body>

</html>