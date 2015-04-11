<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Repository\ProjectZoneRepository;
use DevTag\KleffmannBundle\Service\ProjectZoneService;

trait ProjectZoneAware
{
    /**
     * @var ProjectZoneService $projectZoneService
     */
    protected $projectZoneService;

    /**
     * @var ProjectZoneRepository $projectZoneRepository
     */
    protected $projectZoneRepository;

    /**
     * @param ProjectZoneService $projectZoneService
     */
    public function setProjectZoneService(ProjectZoneService $projectZoneService)
    {
        $this->projectZoneService = $projectZoneService;
    }

    /**
     * @return ProjectZoneService
     */
    public function getProjectZoneService()
    {
        return $this->projectZoneService;
    }

    /**
     * @param ProjectZoneRepository $projectZoneRepository
     */
    public function setProjectZoneRepository(ProjectZoneRepository $projectZoneRepository)
    {
        $this->projectZoneRepository = $projectZoneRepository;
    }

    /**
     * @return ProjectZoneRepository
     */
    public function getProjectZoneRepository()
    {
        return $this->projectZoneRepository;
    }
}
