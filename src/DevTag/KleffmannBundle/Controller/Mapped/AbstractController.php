<?php

namespace DevTag\KleffmannBundle\Controller\Mapped;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\Form;
use DevTag\KleffmannBundle\Controller\Mapped\InitializableControllerInterface;

abstract class AbstractController implements InitializableControllerInterface
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
     * @var SecurityContextInterface
     */
    protected $securityContext;

    /**
     * @param Request $request
     * @param SecurityContextInterface $securityContext
     */
    public function initialize(Request $request, SecurityContextInterface $securityContext)
    {
        $this->securityContext = $securityContext;

        if (!$this->hasAccess()) {
            throw new AccessDeniedException();
        }
    }

    /**
     * @return bool
     */
    protected function hasAccess()
    {
        $notAccess = false;

        foreach ($this->roles as $role) {
            if (false == $this->securityContext->isGranted($role)) {
                $notAccess = true;
                break;
            }
        }

        return (!$notAccess);
    }

    /**
     * @param AbstractType $type
     * @param Object $data
     * @param array $options
     *
     * @return Form
     */
    public function createForm(AbstractType $type, $data = null, array $options = [])
    {
        return $this->formFactory->create($type, $data, $options);
    }

    /**
     * @param FormFactory $formFactory
     */
    public function setFormFactory(FormFactory $formFactory)
    {
        $this->formFactory = $formFactory;
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

    /**
     * @param RouterInterface $router
     */
    public function setRouter(RouterInterface $router)
    {
        $this->router = $router;
    }
}
