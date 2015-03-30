<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Service\ProjectService;

trait ProjectAware
{
    /**
     * @var ProjectService $projectService
     */
    protected $projectService;

    /**
     * @param ProjectService $projectService
     */
    public function setProjectService(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    /**
     * @return ProjectService
     */
    public function getProjectService()
    {
        return $this->projectService;
    }
}
