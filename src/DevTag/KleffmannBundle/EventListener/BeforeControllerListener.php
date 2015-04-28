<?php

namespace DevTag\KleffmannBundle\EventListener;

use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Bundle\TwigBundle\Controller\ExceptionController;
use DevTag\KleffmannBundle\Controller\Mapped\InitializableControllerInterface;

class BeforeControllerListener
{
    /**
     * @var SecurityContextInterface $security
     */
    private $security;

    /**
     * @param SecurityContextInterface $security
     */
    public function __construct(SecurityContextInterface $security)
    {
        $this->security = $security;
    }

    /**
     * @param FilterControllerEvent $event
     */
    public function onKernelController(FilterControllerEvent $event)
    {
        $controller = $event->getController();
        if (!is_array($controller)) {
            return;
        }

        $controllerObject = $controller[0];

        if ($controllerObject instanceof ExceptionController) {
            return;
        }

        if ($controllerObject instanceof InitializableControllerInterface) {
            $controllerObject->initialize($event->getRequest(), $this->security);
        }
    }
}
