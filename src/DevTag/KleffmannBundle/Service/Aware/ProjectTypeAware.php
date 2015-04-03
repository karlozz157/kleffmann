<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Repository\ProjectTypeRepository;
use DevTag\KleffmannBundle\Service\ProjectTypeService;

trait ProjectTypeAware
{
    /**
     * @var ProjectTypeService $projectTypeService
     */
    protected $projectTypeService;

    /**
     * @var ProjectTypeRepository $projectTypeRepository
     */
    protected $projectTypeRepository;

    /**
     * @param ProjectTypeService $projectTypeService
     */
    public function setProjectTypeService(ProjectTypeService $projectTypeService)
    {
        $this->projectTypeService = $projectTypeService;
    }

    /**
     * @return ProjectTypeService
     */
    public function getProjectTypeService()
    {
        return $this->projectTypeService;
    }

    /**
     * @param ProjectTypeRepository $projectTypeRepository
     */
    public function setProjectTypeRepository(ProjectTypeRepository $projectTypeRepository)
    {
        $this->projectTypeRepository = $projectTypeRepository;
    }

    /**
     * @return ProjectTypeRepository
     */
    public function getProjectTypeRepository()
    {
        return $this->projectTypeRepository;
    }
}
