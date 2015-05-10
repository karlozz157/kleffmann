<?php

namespace DevTag\KleffmannBundle\Service;

use DevTag\KleffmannBundle\Sms\SmsAdapterAware;
use DevTag\KleffmannBundle\Entity\Interviewer;
use DevTag\KleffmannBundle\Entity\Training;
use DevTag\KleffmannBundle\Entity\Message;

class TrainingService extends AbstractService
{
    use SmsAdapterAware;

    /**
     * @param Training $training
     * @param string $action
     */
    public function notifyTraining(Training $training, $action)
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
            $message->setContent(strtoupper($content));

            try {
                $this->smsAdapter->send($message);
            } catch (\Exception $ex) {
                // log the exception
            }
        }
    }
}
