<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Repository\ProjectFilterRepository;
use DevTag\KleffmannBundle\Service\ProjectFilterService;

trait ProjectFilterAware
{
    /**
     * @var ProjectFilterService $projectFilterService
     */
    protected $projectFilterService;

    /**
     * @var ProjectFilterRepository $projectFilterRepository
     */
    protected $projectFilterRepository;

    /**
     * @param ProjectFilterService $projectFilterService
     */
    public function setProjectFilterService(ProjectFilterService $projectFilterService)
    {
        $this->projectFilterService = $projectFilterService;
    }

    /**
     * @return ProjectFilterService
     */
    public function getProjectFilterService()
    {
        return $this->projectFilterService;
    }

    /**
     * @param ProjectFilterRepository $projectFilterRepository
     */
    public function setProjectFilterRepository(ProjectFilterRepository $projectFilterRepository)
    {
        $this->projectFilterRepository = $projectFilterRepository;
    }

    /**
     * @return ProjectFilterRepository
     */
    public function getProjectFilterRepository()
    {
        return $this->projectFilterRepository;
    }
}
