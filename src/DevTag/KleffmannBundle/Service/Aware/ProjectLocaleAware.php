<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Service\ProjectLocaleService;

trait ProjectLocaleAware
{
    /**
     * @var ProjectLocaleService $projectLocaleService
     */
    protected $projectLocaleService;

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
}
