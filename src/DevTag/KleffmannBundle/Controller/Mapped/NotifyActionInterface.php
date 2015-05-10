<?php

namespace DevTag\KleffmannBundle\Controller\Mapped;

interface NotifyActionInterface
{
    /**
     * @param Object $entity
     * @param string $action
     */
    public function notifyAction($entity = null, $action = '');
}
