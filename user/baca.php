<?php 
    $filename = basename(__FILE__);
	$dir = basename(__DIR__);
	include "../koneksi.php";
	include "../function.php";
    if(!isset($_GET['id'])){
        header('location:../');
        exit;
    }else{
        $id = $_GET['id'];
    }
    check_session($dir."/".$filename."?id=".$id);
    $get_koleksi = mysqli_query($conn, "SELECT * FROM koleksi WHERE id_koleksi = '$id'");
    if(mysqli_num_rows($get_koleksi) == 0){
        header('location:../');
        exit;
    }
    $row = mysqli_fetch_assoc($get_koleksi);
    $tgl = date('Y-m-d');
    $user_id = $_SESSION['user_id'];
    $cek_histori = mysqli_query($conn, "SELECT * FROM log_baca WHERE id_koleksi = '$id' AND id_pengguna = '".$user_id."' ORDER BY tanggal_baca DESC");
    $fet = mysqli_fetch_assoc($cek_histori);
    $kode_point = 'PO001';
    if(mysqli_num_rows($cek_histori) == 0){
        $query = mysqli_query($conn, "INSERT INTO log_baca SELECT IFNULL(MAX(id_logbaca)+1,1), '$id', '".$user_id."', 1, '$tgl' FROM log_baca") or die(mysqli_error($conn));
        $query = mysqli_query($conn, "INSERT INTO point_pengguna(id_ppengguna, id_pengguna, id_point, tgl_perolehan) SELECT IFNULL(MAX(id_ppengguna)+1,1),'".$user_id."', '".$kode_point."', '".date('Y-m-d H:i:s')."' FROM point_pengguna") or die(mysqli_error($conn));
    }else if($fet['tanggal_baca'] != $tgl){
        $query = mysqli_query($conn, "INSERT INTO log_baca SELECT IFNULL(MAX(id_logbaca)+1,1), '$id', '".$user_id."', ".$fet['halaman_bacatg'].", '$tgl' FROM log_baca") or die(mysqli_error($conn));
    }
    $data_baca = mysqli_query($conn, "SELECT * FROM log_baca WHERE id_koleksi = '$id' AND id_pengguna = '$user_id' ORDER BY tanggal_baca DESC LIMIT 1");
    $row_baca = mysqli_fetch_assoc($data_baca);
    $id_log = $row_baca['id_logbaca'];
    $halaman = $row_baca['halaman_bacatg'];
    
    $cek_pertanyaan = mysqli_query($conn, "SELECT * FROM pertanyaan WHERE id_koleksi = '$id' AND status = 'Aktif'");
    $cek_log_quiz = mysqli_query($conn, "SELECT * FROM log_quiz WHERE id_pengguna = '$user_id' AND id_pertanyaan IN (SELECT id_pertanyaan FROM pertanyaan WHERE id_koleksi = '$id' AND status = 'Aktif')")
?>
<!DOCTYPE html>
<html>
<head>
	<?php include "layout/user-css-script.php"; ?>
</head>

<body>
	<!-- Sidenav -->
	<?php include "layout/user-sidebar.php"; ?>
	<!-- Main content -->
	<div class="main-content" id="panel">
		<!-- Topnav -->
		<?php include "layout/user-navbar.php"; ?>
		
		<div class="container-fluid mt-3">
			<!-- Card stats -->
			<div class="row justify-content-center mb-2">
                <!-- <div class="col-lg-12"> -->
                    <button type="button" class="btn btn-sm btn-primary mx-1" id="prev"><i class="fas fa-chevron-left"></i> Previous</button>
                    <span>Page: <span id="page_num"></span> / <span id="page_count"></span></span>
                    <button type="button" class="btn btn-sm btn-primary mx-1" id="next">Next <i class="fas fa-chevron-right"></i> </button>
                <!-- </div> -->
            </div>
            <div class="row justify-content-center mb-3">
                <!-- <div class="col-lg-12"> -->
                    <div id="pdf-box" class="text-center" style="max-width: 600px;">
                        <canvas id="the-canvas" style="width:100%"></canvas>
                    </div>
                    <input type="hidden" id="page_number" name="page_number" value="1" />
                <!-- </div> -->
            </div>
			<?php include "layout/user-footer.php"; ?>
		</div>
	</div>
	
	<?php include "layout/user-js-script.php"; ?>
    
    <script src="js/pdf.js"></script>
	<script>
    function updateBacaan(page){
        var id_log = '<?php echo $id_log; ?>';
        var page_count = $('#page_count').text();
        $.ajax({
            url: "ajax.php",
            type: "post",
            data: {update_bacaan: true, id_log: id_log, halaman: page},
            success: function(result){
                console.log(result);
                
            },
            error: function(error){
                console.log(error);
            }
        });
    }

    function redirectQuiz(){
        // alert(adaQuiz);
        if(!adaQuiz){
            window.location.href = "../book.php";
        }else{
            window.location.href = "quiz.php?id=<?php echo $id; ?>";
        }
    }

	$(document).keydown(function(e) {
        // console.log(e.keyCode);
        // left
        if(e.keyCode == 37 || e.keyCode == 38){
            $('#prev').click();
            e.preventDefault();
        }
        // right
        if(e.keyCode == 39 || e.keyCode == 40){
            $('#next').click();
            e.preventDefault();
        }
    });
    
    var url = "<?php echo $row['file'] ?>";
    var adaQuiz = <?php if (mysqli_num_rows($cek_pertanyaan) != 0 && mysqli_num_rows($cek_log_quiz) == 0) echo "1"; else echo "0"; ?>;
    var halaman = <?php echo $halaman ?>;
    var pdfDoc = null,
        pageNum = halaman,
        pageRendering = false,
        pageNumPending = null,
        scale = 1,
        pdf_box = document.getElementById('pdf-box'),
        canvas = document.getElementById('the-canvas'),
        ctx = canvas.getContext('2d');
    var rect = canvas.getBoundingClientRect();


    /**
    * Get page info from document, resize canvas accordingly, and render page.
    * @param num Page number.
    */
    function renderPage(num) {
        pageRendering = true;
        // Using promise to fetch the page
        pdfDoc.getPage(num).then(function(page) {
            var viewport = page.getViewport({scale: scale});
            
            canvas.height = viewport.height;
            canvas.width = viewport.width;
            
            // Render PDF page into canvas context
            var renderContext = {
                canvasContext: ctx,
                viewport: viewport
            };
            var renderTask = page.render(renderContext);

            // Wait for rendering to finish
            renderTask.promise.then(function() {
            pageRendering = false;
            if (pageNumPending !== null) {
                // New page rendering is pending
                renderPage(pageNumPending);
                pageNumPending = null;
            }
            });
        });

        // Update page counters
        document.getElementById('page_num').textContent = num;
        document.getElementById('page_number').value = num;
        if(num == pdfDoc.numPages && adaQuiz){
            alert('Bacaan selesai. Klik next/tombol kanan untuk melanjutkan ke pertanyaan/quiz');
        }
    }

    /**
    * If another page rendering in progress, waits until the rendering is
    * finised. Otherwise, executes rendering immediately.
    */
    function queueRenderPage(num) {
        if (pageRendering) {
            pageNumPending = num;
        } else {
            renderPage(num);
            updateBacaan(num);
        }
    }

    /**
    * Displays previous page.
    */
    function onPrevPage() {
        if (pageNum <= 1) {
            return;
        }
        pageNum--;
        queueRenderPage(pageNum);
    }
    document.getElementById('prev').addEventListener('click', onPrevPage);

    /**
    * Displays next page.
    */
    function onNextPage() {
        if (pageNum >= pdfDoc.numPages) {
            redirectQuiz();
            return;
        }
        pageNum++;
        queueRenderPage(pageNum);
    }
    document.getElementById('next').addEventListener('click', onNextPage);

    /**
    * Asynchronously downloads PDF.
    */
    pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
        pdfDoc = pdfDoc_;
        document.getElementById('page_count').textContent = pdfDoc.numPages;

        // Initial/first page rendering
        renderPage(pageNum);
    });

	</script>
</body>

</html>