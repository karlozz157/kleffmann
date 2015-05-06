<?php

namespace DevTag\KleffmannBundle\Message\SMS;

use DevTag\KleffmannBundle\Message\MessageAdapter;
use DevTag\KleffmannBundle\Entity\Message;

class TwilioAdapter implements MessageAdapter
{
    /**
     * @const string
     */
    const ACCOUNT_SID = 'AC190161d0e4f7b7a85c277e02d56a7351';

    /**
     * @const string
     */
    const AUTH_TOKEN = '0055a36b5c2c62b3cc701c3e9bf0f171';

    /**
     * @const string
     */
    const FROM = '13344080259';

    /**
     * @const string
     */
    const PREFIX_MEX = '+521';

    /**
     * @var \Services_Twilio $twilio
     */
    protected $twilio;

    public function __construct()
    {
        $this->twilio = new \Services_Twilio(self::ACCOUNT_SID, self::AUTH_TOKEN);
    }

    /**
     * @param Message $message
     */
    public function send(Message $message)
    {
        $data = [
            'From' => self::FROM,
            'To'   => self::PREFIX_MEX . $message->getTo(),
            'Body' => $message->getContent(),
        ];

        $this->twilio->account->messages->create($data);
    }
}
