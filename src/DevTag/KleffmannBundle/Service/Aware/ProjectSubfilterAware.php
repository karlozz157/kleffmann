<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Repository\ProjectSubfilterRepository;
use DevTag\KleffmannBundle\Service\ProjectSubfilterService;

trait ProjectSubfilterAware
{
    /**
     * @var ProjectSubfilterService $projectSubfilterService
     */
    protected $projectSubfilterService;

    /**
     * @var ProjectSubfilterRepository $projectSubfilterRepository
     */
    protected $projectSubfilterRepository;

    /**
     * @param ProjectSubfilterService $projectSubfilterService
     */
    public function setProjectSubfilterService(ProjectSubfilterService $projectSubfilterService)
    {
        $this->projectSubfilterService = $projectSubfilterService;
    }

    /**
     * @return ProjectSubfilterService
     */
    public function getProjectSubfilterService()
    {
        return $this->projectSubfilterService;
    }

    /**
     * @param ProjectSubfilterRepository $projectSubfilterRepository
     */
    public function setProjectSubfilterRepository(ProjectSubfilterRepository $projectSubfilterRepository)
    {
        $this->projectSubfilterRepository = $projectSubfilterRepository;
    }

    /**
     * @return ProjectSubfilterRepository
     */
    public function getProjectSubfilterRepository()
    {
        return $this->projectSubfilterRepository;
    }
}
