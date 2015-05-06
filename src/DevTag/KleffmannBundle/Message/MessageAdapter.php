<?php

namespace DevTag\KleffmannBundle\Message;

use DevTag\KleffmannBundle\Entity\Message;

interface MessageAdapter
{
    /**
     * @param Message $message
     */
    public function send(Message $message);
}
