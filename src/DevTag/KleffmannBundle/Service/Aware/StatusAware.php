<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Repository\StatusRepository;
use DevTag\KleffmannBundle\Service\StatusService;

trait StatusAware
{
    /**
     * @var StatusService $statusService
     */
    protected $statusService;

    /**
     * @var StatusRepository $statusRepository
     */
    protected $statusRepository;

    /**
     * @param StatusService $statusService
     */
    public function setStatusService(StatusService $statusService)
    {
        $this->statusService = $statusService;
    }

    /**
     * @return StatusService
     */
    public function getStatusService()
    {
        return $this->statusService;
    }

    /**
     * @param StatusRepository $statusRepository
     */
    public function setStatusRepository(StatusRepository $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }

    /**
     * @return StatusRepository
     */
    public function getStatusRepository()
    {
        return $this->statusRepository;
    }
}
