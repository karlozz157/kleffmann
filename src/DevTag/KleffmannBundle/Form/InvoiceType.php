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
                'property' => 'name'
            ])
            ->add('file')
            ->add('date')
            ->add('amount')
            ->add('status', 'choice', [
                'choices' => [
                    'pagada' => 'Pagada',
                    'pendiente' => 'Pendiente'
                ]
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
