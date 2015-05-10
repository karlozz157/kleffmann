<?php

namespace DevTag\KleffmannBundle\Controller\Mapped;

interface NotifyActionInterface
{
    /**
     * @param Object $entity
     * @param string $method
     */
    public function notifyAction($entity = null, $method = '');
}
