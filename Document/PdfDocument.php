<?php

/**
 * @author Jean-Philippe Chateau <jp.chateau@trepia.fr>
 * @licence MIT
 */

namespace Tms\Bundle\DocumentGeneratorBundle\Document;

class PdfDocument extends AbstractDomDocument
{
    public function __construct($source, $generator)
    {
        parent::__construct($source, $generator);
    }

    /**
     * {@inheritDoc}
     */
    public function render(array $parameters)
    {
        $html = $this->renderDom($parameters);
        $this->generator->generateFromHtml($html);

        return $this->generator->render();
    }

    /**
     *
     * @param array $parameters
     * @param string $filename
     */
    public function download(array $parameters, $filename)
    {
        $html = $this->renderDom($parameters);
        $this->generator->generateFromHtml($html);
        $this->generator->download($filename);
    }
}
