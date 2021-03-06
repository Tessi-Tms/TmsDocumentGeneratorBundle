<?php

namespace Tms\Bundle\DocumentGeneratorBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MergeTagType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array('required' => true))
            ->add('required', 'checkbox', array('required' => false))
            ->add('identifier', 'text', array('required' => true))
            ->add('template')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Tms\Bundle\DocumentGeneratorBundle\Entity\MergeTag'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'tms_bundle_documentgeneratorbundle_mergetagtype';
    }
}
