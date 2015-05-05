<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DevTag\KleffmannBundle\Controller\Mapped\CrudController;
/**
 * @Route("/proyectos", service="kleffmann.project.controller")
 */
class ProjectController extends CrudController
{

}
