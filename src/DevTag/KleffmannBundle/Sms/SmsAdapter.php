<?php

namespace DevTag\KleffmannBundle\Sms;

use DevTag\KleffmannBundle\Entity\Message;

interface SmsAdapter
{
    /**
     * @param Message $message
     */
    public function send(Message $message);
}
