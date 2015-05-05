<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DevTag\KleffmannBundle\Controller\Mapped\CrudController;

/**
 * @Route("/proyectos/tipos", service="kleffmann.project_type.controller")
 */
class ProjectTypeController extends CrudController
{

}
