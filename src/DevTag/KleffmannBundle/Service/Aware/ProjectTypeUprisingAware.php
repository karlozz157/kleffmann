<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Repository\ProjectTypeUprisingRepository;
use DevTag\KleffmannBundle\Service\ProjectTypeUprisingService;

trait ProjectTypeUprisingAware
{
    /**
     * @var ProjectTypeUprisingService $projectTypeUprisingService
     */
    protected $projectTypeUprisingService;

    /**
     * @var ProjectTypeUprisingRepository $projectTypeUprisingRepository
     */
    protected $projectTypeUprisingRepository;

    /**
     * @param ProjectTypeUprisingService $projectTypeUprisingService
     */
    public function setProjectTypeUprisingService(ProjectTypeUprisingService $projectTypeUprisingService)
    {
        $this->projectTypeUprisingService = $projectTypeUprisingService;
    }

    /**
     * @return ProjectTypeUprisingService
     */
    public function getProjectTypeUprisingService()
    {
        return $this->projectTypeUprisingService;
    }

    /**
     * @param ProjectTypeUprisingRepository $projectTypeUprisingRepository
     */
    public function setProjectTypeUprisingRepository(ProjectTypeUprisingRepository $projectTypeUprisingRepository)
    {
        $this->projectTypeUprisingRepository = $projectTypeUprisingRepository;
    }

    /**
     * @return ProjectTypeUprisingRepository
     */
    public function getProjectTypeUprisingRepository()
    {
        return $this->$projectTypeUprisingRepository;
    }
}
