<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/interviewers")
 */
class InterviewerController extends BaseController
{
    /**
     * @Route("/")
     * @Template()
     * @return array
     */
    public function indexAction()
    {
        return [];
    }

    /**
     * @Route("/new")
     * @Template()
     * @return array
     */
    public function newAction()
    {
        return [];
    }

    /**
     * @Route("/edit/{interviewer}")
     * @Template()
     * @return array
     */
    public function editAction()
    {
        return [];
    }

    /**
     * @Route("/delete/{interviewer}")
     * @return array
     */
    public function deleteAction()
    {
        return [];
    }
}
