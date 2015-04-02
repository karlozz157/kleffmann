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
            ])
            ->add('city', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\City',
                'property' => 'name',
            ])
            ->add('district', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\District',
                'property' => 'name'
            ])
            ->add('email', 'email')
            ->add('name', 'text')
            ->add('first_name', 'text')
            ->add('second_name', 'text')
            ->add('birthday', 'date', [
                'widget' => 'single_text'
            ])
            ->add('home_area_code', 'integer')
            ->add('home_phone', 'integer')
            ->add('office_area_code', 'integer')
            ->add('office_phone', 'integer')
            ->add('cell_area_code', 'integer')
            ->add('cell_phone', 'integer')
            ->add('bank', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\Bank',
                'property' => 'name',
            ])
            ->add('clabe', 'integer')
            ->add('debit_card', 'integer')
            ->add('bank_account', 'integer')
            ->add('observation', 'textarea')
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
