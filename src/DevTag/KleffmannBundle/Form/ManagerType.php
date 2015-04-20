<?php

namespace DevTag\KleffmannBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class ManagerType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('position', 'choice', [
                'empty_value' => '-- Choose a Position --',
                'choices' => [
                    'AMIS' => 'AMIS',
                    'AD-HOCS' => 'AD-HOCS',
                ]
            ])
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'manager_type';
    }
}
