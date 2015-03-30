<?php

namespace DevTag\KleffmannBundle\Controller;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\Form;

abstract class BaseController
{
    /**
     * @var FormFactory
     */
    protected $formFactory;

    /**
     * @var RouterInterface
     */
    protected $router;

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

    /**
     * @param AbstractType $type
     * @param $data
     * @param array $options
     * @return Form
    */
    public function createForm(AbstractType $type, $data = null, array $options = [])
    {
        return $this->formFactory->create($type, $data, $options);
    }

    /**
     * @return RouterInterface
     */
    public function getRouter()
    {
        return $this->router;
    }

    /**
     * @param RouterInterface $router
     */
    public function setRouter(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * @param string $route
     * @param mixed $parameters
     * @param bool|string
     *
     * @return string The generated URL
     */
    public function generateUrl($route, $parameters = [], $referenceType = UrlGeneratorInterface::ABSOLUTE_PATH)
    {
        return $this->router->generate($route, $parameters, $referenceType);
    }

    /**
     * @param string $url
     * @param int $status
     *
     * @return RedirectResponse
     */
    public function redirect($url, $status = 302)
    {
        return new RedirectResponse($url, $status);
    }

    /**
     * @param string $route
     * @param array $parameters
     * @param int $status
     *
     * @return RedirectResponse
     */
    protected function redirectToRoute($route, array $parameters = [], $status = 302)
    {
        return $this->redirect($this->generateUrl($route, $parameters), $status);
    }
}
