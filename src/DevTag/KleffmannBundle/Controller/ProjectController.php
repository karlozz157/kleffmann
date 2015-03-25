<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/projects")
 */
class ProjectController extends BaseController
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
     * @Route("/edit/{project}")
     * @Template()
     * @return array
     */
    public function editAction()
    {
        return [];
    }

    /**
     * @Route("/delete/{project}")
     * @return array
     */
    public function deleteAction()
    {
        return [];
    }
}
