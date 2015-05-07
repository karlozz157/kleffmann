<?php

namespace DevTag\KleffmannBundle\Service;

use DevTag\KleffmannBundle\Message\MessageAdapterAware;
use DevTag\KleffmannBundle\Entity\Interviewer;
use DevTag\KleffmannBundle\Entity\Training;
use DevTag\KleffmannBundle\Entity\Message;

class TrainingService extends AbstractService
{
    use MessageAdapterAware;

    /**
     * @param Training $training
     */
    public function notifyTraining($action, Training $training)
    {
        $action  = str_replace('Action' , '', $action);
        $action  = ('new' == $action) ? 'generado' : 'editado';
        $content = 'Se ha %s la capacitacion %s para el proyecto %s. Revisar la plataforma para mas informacion.';
        $content = sprintf(
            $content,
            $action,
            $training->getName(),
            $training->getProject()->getName()
        );

        /** @var Interviewer $interviewer */
        foreach ($training->getInterviewer() as $interviewer) {
            $message = new Message();
            $message->setTo($interviewer->getCellPhone());
            $message->setContent($content);

            try {
                $this->messageAdapter->send($message);
            } catch (\Exception $ex) {
                // log the exception
            }
        }
    }
}
