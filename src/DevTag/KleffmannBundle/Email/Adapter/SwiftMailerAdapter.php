<?php

namespace DevTag\KleffmannBundle\Email\Adapter;

use DevTag\KleffmannBundle\Entity\Message;
use DevTag\KleffmannBundle\Email\Email;

class SwiftMailerAdapter implements Email
{
    /**
     * @var \Swift_Mailer $swiftMailer
     */
    protected $swiftMailer;

    /**
     * @param Message $message
     *
     * @return bool
     */
    public function send(Message $message)
    {
        $createMessage = $this->swiftMailer
            ->createMessage()
            ->setTo($message->getTo())
            ->setSubject($message->getSubject())
            ->setBody($message->getContent());

        return (bool) $this->swiftMailer->send($createMessage);
    }

    /**
     * @param \Swift_Mailer $swiftMailer
     */
    public function setSwiftMailer(\Swift_Mailer $swiftMailer)
    {
        $this->swiftMailer = $swiftMailer;
    }
}
