<?php
include "../koneksi.php";
ob_start();
require 'hello-world.php'; // tampilan laporan 
$html = ob_get_clean();
require_once '../dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$tes = $dompdf->getOptions()->getChroot();
$dompdf->getOptions()->setChroot('/var/www/html/digilib-mjk');

$dompdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
// $dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("export.pdf", ["Attachment" => 0]);

?>