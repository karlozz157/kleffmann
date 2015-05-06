<?php

namespace DevTag\KleffmannBundle\Message;

trait MessageAdapterAware
{
    /**
     * @var MessageAdapter $messageAdapter
     */
    protected $messageAdapter;

    /**
     * @param MessageAdapter $messageAdapter
     */
    public function setMessageAdapter(MessageAdapter $messageAdapter)
    {
        $this->messageAdapter = $messageAdapter;
    }

    /**
     * @return MessageAdapter
     */
    public function getMessageAdapter()
    {
        return $this->messageAdapter;
    }
}
