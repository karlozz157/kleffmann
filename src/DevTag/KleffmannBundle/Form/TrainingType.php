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
            ->add('name', 'text', [
                'required' => true,
            ])
            ->add('date', 'date', [
                'widget' => 'single_text',
                'required' => true,
            ])
            ->add('address', 'textarea', [
                'required' => true,
            ])
            ->add('note', 'textarea', [
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
