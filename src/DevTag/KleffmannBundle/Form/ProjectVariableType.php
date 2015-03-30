<?php

namespace DevTag\KleffmannBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class ProjectVariableType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'project_variable_type';
    }
}
