<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Repository\ManagerRepository;
use DevTag\KleffmannBundle\Service\ManagerService;

trait ManagerAware
{
    /**
     * @var ManagerService $managerService
     */
    protected $managerService;

    /**
     * @var ManagerRepository $managerRepository
     */
    protected $managerRepository;

    /**
     * @param ManagerService $managerService
     */
    public function setManagerService(ManagerService $managerService)
    {
        $this->managerService = $managerService;
    }

    /**
     * @return ManagerService
     */
    public function getManagerService()
    {
        return $this->managerService;
    }

    /**
     * @param ManagerRepository $managerRepository
     */
    public function setManagerRepository(ManagerRepository $managerRepository)
    {
        $this->managerRepository = $managerRepository;
    }

    /**
     * @return ManagerRepository
     */
    public function getManagerRepository()
    {
        return $this->managerRepository;
    }
}
