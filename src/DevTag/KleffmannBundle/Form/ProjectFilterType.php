<?php

namespace DevTag\KleffmannBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class ProjectFilterType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('value')
            ->add('subFilterName')
            ->add('subValueName')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'project_filter_type';
    }
}
