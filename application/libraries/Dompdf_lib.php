<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Dompdf\Dompdf;
use Dompdf\Options;

class Dompdf_lib {
    
    public function generatePdf($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = 'portrait')
    {
        // Load dompdf library
       require_once FCPATH . 'vendor/autoload.php'; // Sesuaikan dengan lokasi autoload Composer di proyek Anda

        // Create an instance of Dompdf
        $options = new Options();
		        $options->set('isRemoteEnabled', TRUE);

        $options->set('defaultFont', 'Helvetica');
        $dompdf = new Dompdf($options);

        // Load HTML content
        $dompdf->loadHtml($html);

        // Set paper size and orientation
        $dompdf->setPaper($paper, $orientation);

        // Render PDF (optional)
        $dompdf->render();

        // Set filename for the PDF file (optional)
        if (!empty($filename)) {
            $filename = $filename . '.pdf';
        } else {
            $filename = 'document.pdf';
        }

        // Output PDF to browser
        if ($stream) {
            $dompdf->stream($filename, array('Attachment' => 0));
        } else {
            return $dompdf->output();
        }
    }
}