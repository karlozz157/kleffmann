<?php

namespace DevTag\KleffmannBundle\Controller;

use DevTag\KleffmannBundle\Entity\Message;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DevTag\KleffmannBundle\Controller\Mapped\NotifyActionInterface;
use DevTag\KleffmannBundle\Controller\Mapped\CrudController;
use DevTag\KleffmannBundle\Email\EmailAware;

/**
 * @Route("/test-email", service="kleffmann.test_email.controller")
 */
class TestEmailController
{
    use EmailAware;

    /**
     * @Route("/")
     */
    public function indexAction()
    {
        $message = new Message();

        $message->setFrom('karlozz157@gmail.com');
        $message->setTo('karlozz157@gmail.com');
        $message->setSubject('karlozz157@gmail.com');
        $message->setContent('aaaaaaaaaaaaaa');

        var_dump($this->emailAdapter->send($message));

        exit;
    }
}
