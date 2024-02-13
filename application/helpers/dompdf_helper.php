<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

if (!function_exists('generate_pdf')) {
    function generate_pdf($html, $filename = 'document.pdf', $stream = TRUE) {
        // Create new Dompdf instance
        $options = new Options();
        $options->set('defaultFont', 'Helvetica');
        $dompdf = new Dompdf($options);

        // Load HTML content
        $dompdf->loadHtml($html);

        // Render PDF (optional)
        $dompdf->render();

        // Output PDF to browser or file
        if ($stream) {
            // Output PDF to browser
            $dompdf->stream($filename, array("Attachment" => false));
        } else {
            // Save PDF to file
            $dompdf->output($filename, 'F');
        }
    }
}