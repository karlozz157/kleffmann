<?php

namespace DevTag\KleffmannBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class ProjectType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('customer')
            ->add('method')
            ->add('total')
            ->add('year')
            ->add('manager')
            ->add('status')
            ->add('region')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'project_type';
    }
}