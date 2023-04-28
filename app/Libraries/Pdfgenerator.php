<?php

namespace App\Libraries;

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdfgenerator
{
    public function generate($html, $filename = '', $paper = '', $orientation = '', $stream = true)
    {
        $options = new Options();
        // $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper($paper, $orientation);
        $dompdf->render();

        // $dompdf->setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => false, 'chroot' => [realpath(base_path()) . '/public/images', realpath(base_path()) . '/public/media']])->loadView('my.view.path');
        if ($stream) {
            $dompdf->stream($filename . ".pdf", array("Attachment" => 0));
        } else {
            return $dompdf->output();
        }
    }
}
