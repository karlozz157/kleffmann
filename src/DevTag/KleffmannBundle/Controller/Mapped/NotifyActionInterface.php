<?php

namespace DevTag\KleffmannBundle\Controller\Mapped;

interface NotifyActionInterface
{
    /**
     * @param string $action
     * @param Object $entity
     */
    public function notifyAction($action, $entity);
}
