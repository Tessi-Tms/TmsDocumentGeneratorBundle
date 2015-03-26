<?php

/**
 * @license MIT
 */

namespace Tms\Bundle\DocumentGeneratorBundle\DataFetcher;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\OptionsResolver\Options;
use Tms\Bundle\DocumentGeneratorBundle\Handler\JsonHandler;

class DefaultDataFetcher extends AbstractDataFetcher
{
    /**
     * {@inheritDoc}
     */
    protected function configureParameters(OptionsResolverInterface $resolver)
    {
        parent::configureParameters($resolver);
        $resolver
            ->setDefaults(array(
                '_identifier_' => function (Options $options) {
                    return $options['_'];
                }
            ))
            ->setRequired(array('_identifier_'))
        ;
    }

    /**
     * {@inheritDoc}
     */
    public function doFetch(array $parameters)
    {
        $rawfetchedData = $parameters;
        return JsonHandler::is_json($rawfetchedData['_identifier_'], true, true)
            ?
            : $rawfetchedData['_identifier_']
        ;
    }
}