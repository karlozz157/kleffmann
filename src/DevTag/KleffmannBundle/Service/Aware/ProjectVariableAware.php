<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Repository\ProjectVariableRepository;
use DevTag\KleffmannBundle\Service\ProjectVariableService;

trait ProjectVariableAware
{
    /**
     * @var ProjectVariableService $projectVariableService
     */
    protected $projectVariableService;

    /**
     * @var ProjectVariableRepository $projectVariableRepository
     */
    protected $projectVariableRepository;

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

    /**
     * @param ProjectVariableRepository $projectVariableRepository
     */
    public function setProjectVariableRepository(ProjectVariableRepository $projectVariableRepository)
    {
        $this->projectVariableRepository = $projectVariableRepository;
    }

    /**
     * @return ProjectVariableRepository
     */
    public function getProjectVariableRepository()
    {
        return $this->projectVariableRepository;
    }
}
