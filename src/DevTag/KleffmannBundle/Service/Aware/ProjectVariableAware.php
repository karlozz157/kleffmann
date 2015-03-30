<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Service\ProjectVariableService;

trait ProjectVariableAware
{
    /**
     * @var ProjectVariableService $projectVariableService
     */
    protected $projectVariableService;

    /**
     * @param ProjectVariableService $projectVariableService
     */
    public function setProjectVariableService(ProjectVariableService $projectVariableService)
    {
        $this->projectVariableService = $projectVariableService;
    }

    /**
     * @return ProjectVariableService
     */
    public function getProjectVariableService()
    {
        return $this->projectVariableService;
    }
}
