<?php

namespace DevTag\KleffmannBundle\Tests\Email\Adapter;

use DevTag\KleffmannBundle\Email\Adapter\SwiftMailerAdapter;
use DevTag\KleffmannBundle\Entity\Message;

class SwiftMailerAdapterTest extends \PHPUnit_Framework_TestCase
{
    public function testSending()
    {
        $mockSwiftMailer = $this->getMockBuilder('\Swift_Mailer')
            ->disableOriginalConstructor()
            ->getMock();

        $mockSwiftMailer
            ->expects($this->once())
            ->method('send');

        $message = new Message();
        $message->setTo('karlozz157@gmail.com');
        $message->setFrom('noreply.kleffmann@gmail.com');
        $message->setSubject('Hallo Welt!');
        $message->setContent('Ich bin ein Test!');

        $swiftMailerAdapter = new SwiftMailerAdapter();
        $swiftMailerAdapter->setSwiftMailer($mockSwiftMailer);
        $swiftMailerAdapter->send($message);
    }
}
