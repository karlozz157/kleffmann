<?php

namespace DevTag\KleffmannBundle\Controller\Mapped;

use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\HttpFoundation\Request;

interface InitializableControllerInterface
{
    /**
     * @param Request $request
     * @param SecurityContextInterface $securityContext
     */
    public function initialize(Request $request, SecurityContextInterface $securityContext);
}
