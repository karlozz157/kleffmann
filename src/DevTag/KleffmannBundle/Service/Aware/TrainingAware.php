<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Repository\TrainingRepository;
use DevTag\KleffmannBundle\Service\TrainingService;

trait TrainingAware
{
    /**
     * @var TrainingService $trainingService
     */
    protected $trainingService;

    /**
     * @var TrainingRepository $trainingRepository
     */
    protected $trainingRepository;

    /**
     * @param TrainingService $trainingService
     */
    public function setTrainingService(TrainingService $trainingService)
    {
        $this->trainingService = $trainingService;
    }

    /**
     * @return TrainingService
     */
    public function getTrainingService()
    {
        return $this->trainingService;
    }

    /**
     * @param TrainingRepository $trainingRepository
     */
    public function setTrainingRepository(TrainingRepository $trainingRepository)
    {
        $this->trainingRepository = $trainingRepository;
    }

    /**
     * @return TrainingRepository
     */
    public function getTrainingRepository()
    {
        return $this->trainingRepository;
    }
}
