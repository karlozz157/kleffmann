<?php

namespace DevTag\KleffmannBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class InterviewerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('state', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\State',
                'property' => 'name',
                'empty_value' => '-- Choose a State --',
                'required' => true,
            ])
            ->add('city', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\City',
                'property' => 'name',
                'empty_value' => '-- Choose a City --',
                'required' => true,
            ])
            ->add('email', 'email', [
                'required' => true
            ])
            ->add('name', 'text', [
                'required' => true,
            ])
            ->add('first_name', 'text', [
                'required' => true,
            ])
            ->add('second_name', 'text', [
                'required' => true,
            ])
            ->add('birthday', 'date', [
                'widget' => 'single_text',
                'required' => true,
            ])
            ->add('home_area_code', 'integer', [
                'required' => true,
            ])
            ->add('home_phone', 'integer', [
                'required' => true,
            ])
            ->add('office_area_code', 'integer', [
                'required' => true,
            ])
            ->add('office_phone', 'integer', [
                'required' => true,
            ])
            ->add('cell_area_code', 'integer', [
                'required' => true,
            ])
            ->add('cell_phone', 'integer', [
                'required' => true,
            ])
            ->add('bank', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\Bank',
                'property' => 'name',
                'empty_value' => '-- Choose a Bank --',
                'required' => true,
            ])
            ->add('clabe', 'integer', [
                'required' => true,
            ])
            ->add('debit_card', 'integer', [
                'required' => true,
            ])
            ->add('observation', 'textarea', [
                'required' => true,
            ])
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'interviewer_type';
    }
}
