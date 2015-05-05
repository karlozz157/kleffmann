<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DevTag\KleffmannBundle\Controller\Mapped\CrudController;

/**
 * @Route("/clientes", service="kleffmann.customer.controller")
 */
class CustomerController extends CrudController
{

}
