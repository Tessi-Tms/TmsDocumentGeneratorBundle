<?php

/**
 * @author Jean-Philippe Chateau <jp.chateau@trepia.fr>
 * @license MIT
 */

namespace Tms\Bundle\DocumentGeneratorBundle\Generator;

class DompdfGenerator implements GeneratorInterface
{
    private $dompdf;

    /**
     * {@inheritDoc}
     */
    public function generate($html)
    {
        $this->dompdf = new \DOMPDF();
        $this->dompdf->set_paper("a4", "pt");
        $this->dompdf->load_html($html);
        $this->dompdf->render();

        return $this->dompdf->output();
    }

    /**
     * {@inheritDoc}
     */
    public function getMimeType()
    {
        return 'application/pdf';
    }
}