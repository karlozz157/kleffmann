<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DevTag\KleffmannBundle\Controller\Mapped\CrudController;

/**
 * @Route("/encuestadores", service="kleffmann.interviewer.controller")
 */
class InterviewerController extends CrudController
{

}
