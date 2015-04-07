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
            ->add('name', 'text', [
                'required' => true,
            ])
            ->add('description', 'textarea', [
                'required' => true,
            ])
            ->add('customer', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\Customer',
                'property' => 'name',
                'empty_value' => '-- Choose a Customer --',
                'required' => true,
            ])
            ->add('methodology', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\Methodology',
                'property' => 'name',
                'empty_value' => '-- Choose a Methodology --',
                'required' => true,
            ])
            ->add('fee', 'money', [
                'required' => true,
            ])
            ->add('status', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\Status',
                'property' => 'name',
                'empty_value' => '-- Choose a Status --',
                'required' => true,
            ])
            ->add('manager', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\Manager',
                'property' => 'name',
                'empty_value' => '-- Choose a Manager --',
                'required' => true,
            ])
            ->add('projectType', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\ProjectType',
                'property' => 'name',
                'empty_value' => '-- Choose a Project Type --',
                'required' => true,
            ])
            ->add('startDate', 'date', [
                'widget' => 'single_text',
                'required' => true,
            ])
            ->add('estimateDate', 'date', [
                'widget' => 'single_text',
                'required' => true,
            ])
            ->add('endDate', 'date', [
                'widget' => 'single_text',
                'required' => true,
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