<?php

namespace DevTag\KleffmannBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class ProjectZoneType extends AbstractType
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
            ->add('district', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\District',
                'property' => 'name',
                'empty_value' => '-- Choose a District --',
                'required' => true,
            ])
            ->add('city', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\City',
                'property' => 'name',
                'empty_value' => '-- Choose a City --',
                'required' => true,
            ])
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'project_zone_type';
    }
}
