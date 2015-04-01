<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Service\ProjectLocaleService;
use DevTag\KleffmannBundle\Repository\ProjectLocaleRepository;

trait ProjectLocaleAware
{
    /**
     * @var ProjectLocaleService $projectLocaleService
     */
    protected $projectLocaleService;

    /**
     * @var ProjectLocaleRepository
     */
    protected $projectLocaleRepository;

    /**
     * @param ProjectLocaleService $projectLocaleService
     */
    public function setProjectLocaleService(ProjectLocaleService $projectLocaleService)
    {
        $this->projectLocaleService = $projectLocaleService;
    }

    /**
     * @return ProjectLocaleService
     */
    public function getProjectLocaleService()
    {
        return $this->projectLocaleService;
    }

    /**
     * @param ProjectLocaleRepository $projectLocaleRepository
     */
    public function setProjectLocaleRepository(ProjectLocaleRepository $projectLocaleRepository)
    {
        $this->projectLocaleRepository = $projectLocaleRepository;
    }

    /**
     * @return ProjectLocaleRepository
     */
    public function getProjectLocaleRepository()
    {
        return $this->projectLocaleRepository;
    }
}
