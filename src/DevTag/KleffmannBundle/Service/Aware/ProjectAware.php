<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Repository\ProjectRepository;
use DevTag\KleffmannBundle\Service\ProjectService;

trait ProjectAware
{
    /**
     * @var ProjectService $projectService
     */
    protected $projectService;

    /**
     * @var ProjectRepository $projectRepository
     */
    protected $projectRepository;

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

    /**
     * @param ProjectRepository $projectRepository
     */
    public function setProjectRepository(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    /**
     * @return ProjectRepository
     */
    public function getProjectRepository()
    {
        return $this->projectRepository;
    }
}
