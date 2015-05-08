<?php

namespace DevTag\KleffmannBundle\Email;

use DevTag\KleffmannBundle\Entity\Message;

interface Email
{
    /**
     * @param Message $message
     *
     * @return bool
     */
    public function send(Message $message);
}
