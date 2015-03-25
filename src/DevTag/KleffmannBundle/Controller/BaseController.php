<?php

namespace DevTag\KleffmannBundle\Controller;

use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormFactory;

abstract class BaseController
{
    /**
     * @var FormFactory
     */
    protected $formFactory;

    /**
     * @return FormFactory
     */
    public function getFormFactory()
    {
        return $this->formFactory;
    }

    /**
     * @param FormFactory $formFactory
     */
    public function setFormFactory(FormFactory $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    public function createForm($type, $data = null, array $options = [])
    {
        return $this->formFactory->create($type, $data, $options);
    }
}
