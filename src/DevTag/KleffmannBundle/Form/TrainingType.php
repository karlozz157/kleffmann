<?php

namespace DevTag\KleffmannBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TrainingType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('project', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\Project',
                'property' => 'name',
                'empty_value' => '-- Choose a Project --',
                'required' => true,
            ])
            ->add('date', 'date', [
                'widget' => 'single_text',
                'required' => true,
            ])
            ->add('interviewer', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\Interviewer',
                'property' => 'name',
                'empty_value' => '-- Choose an Interviewer --',
                'multiple' => true,
                'required' => true,
            ])
            ->add('name', 'text', [
                'label' => 'Plaza de Capacitación',
                'required' => true,
            ])
            ->add('address', 'textarea', [
                'label' => 'Dirección / Hora',
                'required' => true,
            ])
            ->add('comments', 'textarea', [
                'required' => true,
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'training_type';
    }
}
