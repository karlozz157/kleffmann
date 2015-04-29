<?php

namespace DevTag\KleffmannBundle\Form;

use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\Form\FormBuilderInterface;

class UserType extends BaseType
{
    public function __construct()
    {
        parent::__construct('DevTag\KleffmannBundle\Entity\User');
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder
            ->add('roles', 'choice', [
                'choices' => [
                    'ROLE_PROJECT_MANAGER' => 'ROLE_PROJECT_MANAGER',
                    'ROLE_INTERVIEWER'     => 'ROLE_INTERVIEWER',
                    'ROLE_ADMINISTRATION'  => 'ROLE_ADMINISTRATION',
                    'ROLE_ADMIN'           => 'ROLE_ADMIN',
                ],
                'multiple' => true,
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'user_type';
    }
}
