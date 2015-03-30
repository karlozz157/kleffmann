<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Service\ProjectFilterService;

trait ProjectFilterAware
{
    /**
     * @var ProjectFilterService $projectFilterService
     */
    protected $projectFilterService;

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
}
