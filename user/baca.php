<?php 
    $filename = basename(__FILE__);
	$dir = basename(__DIR__);
	include "../koneksi.php";
	include "../function.php";
    if(!isset($_GET['koleksi'])){
        header('location:../');
        exit;
    }else{
        $id = $_GET['koleksi'];
    }
    check_session($dir."/".$filename."?koleksi=".$_GET['koleksi']);
    $get_koleksi = mysqli_query($conn, "SELECT * FROM koleksi WHERE id_koleksi = '$id'");
    $row = mysqli_fetch_assoc($get_koleksi);
    $tgl = date('Y-m-d');
    $cek_histori = mysqli_query($conn, "SELECT * FROM log_baca WHERE id_koleksi = '$id' AND id_pengguna = '".$_SESSION['user_id']."' ORDER BY tanggal_baca DESC");
    $fet = mysqli_fetch_assoc($cek_histori);
    if(mysqli_num_rows($cek_histori) == 0){
        $query = mysqli_query($conn, "INSERT INTO log_baca SELECT IFNULL(MAX(id_logbaca)+1,1), '$id', '".$_SESSION['user_id'].", 1, '$tgl'");
        $query = mysqli_query($conn, "INSERT INTO point_pengguna(id_ppengguna, id_pengguna, id_point, tgl_perolehan) SELECT IFNULL(MAX(id_ppengguna)+1,1),'".$_SESSION['user_id'].", '".$kode_point."', '".date('Y-m-d H:i:s')."'");
    }else if($fet['tanggal_baca'] != $tgl){
        $query = mysqli_query($conn, "INSERT INTO log_baca SELECT IFNULL(MAX(id_logbaca)+1,1), '$id', '".$_SESSION['user_id'].", ".$fet['halaman_bacatg'].", '$tgl'");
    }
    if(!$fet){
        $halaman = 1;
    }else{
        $halaman = $fet['halaman_bacatg'];
    }
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
	$(document).keydown(function(e) {
        console.log(e.keyCode);
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
    var halaman = <?php echo $halaman ?>;
    var pdfDoc = null,
        pageNum = 1,
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