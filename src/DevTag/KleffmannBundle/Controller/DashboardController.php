<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DashboardController
{
    /**
     * @Route("/", name="dashboard")
     * @Template()
     *
     * @return array
     */
    public function indexAction()
    {
        return [];
    }
}
