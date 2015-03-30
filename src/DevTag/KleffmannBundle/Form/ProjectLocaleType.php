<?php

namespace DevTag\KleffmannBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class ProjectLocaleType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('project', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\Project',
                'property' => 'name',
            ])
            ->add('state', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\State',
                'property' => 'name',
            ])
            ->add('city', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\City',
                'property' => 'name',
            ])
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'project_locale_type';
    }
}
