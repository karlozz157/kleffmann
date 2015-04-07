<?php

namespace DevTag\KleffmannBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;

class InvoiceType extends AbstractType
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
                'empty_value' => '-- Choose a Project --',
                'required' => true,
            ])
            ->add('interviewer', 'entity', [
                'class' => 'DevTag\KleffmannBundle\Entity\Interviewer',
                'property' => 'name',
                'empty_value' => '-- Choose an Interviewer --',
                'required' => true,
            ])
            ->add('date', 'date', [
                'widget' => 'single_text',
                'required' => true,
            ])
            ->add('file', 'text', [
                'required' => true,
            ])
            ->add('amount', 'money', [
                'required' => true,
            ])
            ->add('status', 'choice', [
                'empty_value' => '-- Choose a Status --',
                'choices' => [
                    'pagada' => 'Pagada',
                    'pendiente' => 'Pendiente'
                ],
                'required' => true,
            ])
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'invoice_type';
    }
}
