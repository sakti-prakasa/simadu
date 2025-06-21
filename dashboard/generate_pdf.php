<?php
require_once '../vendor/autoload.php'; // Adjust the path based on your project's structure

use Dompdf\Dompdf;

if (isset($_POST['htmlContent'])) {
    $htmlContent = urldecode($_POST['htmlContent']);

    // Create a new Dompdf instance
    $dompdf = new Dompdf();

    // Load HTML content
    $dompdf->loadHtml($htmlContent);

    // Set paper size and orientation
    $dompdf->setPaper('A4', 'portrait');

    // Render PDF
    $dompdf->render();

    // Output PDF for download
    $pdfContent = $dompdf->output();
    header('Content-Type: application/pdf');
    header('Content-Disposition: inline; filename="generated.pdf"');
    echo $pdfContent;
    exit;
}
