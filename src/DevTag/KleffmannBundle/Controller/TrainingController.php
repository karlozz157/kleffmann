<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DevTag\KleffmannBundle\Controller\Mapped\NotifyActionInterface;
use DevTag\KleffmannBundle\Controller\Mapped\CrudController;
use DevTag\KleffmannBundle\Entity\Training;

/**
 * @Route("/capacitaciones", service="kleffmann.training.controller")
 */
class TrainingController extends CrudController implements NotifyActionInterface
{
    /**
     * @param Object $entity
     * @param string $action
     */
    public function notifyAction($entity = null, $action = '')
    {
        if (!$entity instanceof Training) {
            return;
        }
        /** @var Training $training */
        $training = $entity;
        $this->service->notifyTraining($training, $action);
    }
}
