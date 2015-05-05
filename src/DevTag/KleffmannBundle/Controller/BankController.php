<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use DevTag\KleffmannBundle\Controller\Mapped\CrudController;

/**
 * @Route("/bancos", service="kleffmann.bank.controller")
 */
class BankController extends CrudController
{

}
