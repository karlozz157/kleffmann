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
            ->add('description', 'textarea', [
                'required' => false
            ])
            ->add('customer', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\Customer',
                'property' => 'name',
            ])
            ->add('methodology', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\Methodology',
                'property' => 'name',
            ])
            ->add('fee')
            ->add('status', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\Status',
                'property' => 'name',
            ])
            ->add('manager', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\Manager',
                'property' => 'name',
            ])
            ->add('projectType', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\ProjectType',
                'property' => 'name',
            ])
            ->add('startDate', 'date', [
                'widget' => 'single_text'
            ])
            ->add('estimateDate', 'date', [
                'widget' => 'single_text'
            ])
            ->add('endDate', 'date', [
                'widget' => 'single_text'
            ])
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