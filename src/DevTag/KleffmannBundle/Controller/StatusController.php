<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DevTag\KleffmannBundle\Controller\Mapped\CrudController;

/**
 * @Route("/proyectos/tipos-de-estatus", service="kleffmann.status.controller")
 */
class StatusController extends CrudController
{

}
