<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DevTag\KleffmannBundle\Controller\Mapped\CrudController;

/**
 * @Route("/gerentes", service="kleffmann.manager.controller")
 */
class ManagerController extends CrudController
{

}
