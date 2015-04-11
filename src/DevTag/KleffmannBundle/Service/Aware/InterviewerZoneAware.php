<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Repository\InterviewerZoneRepository;
use DevTag\KleffmannBundle\Service\InterviewerZoneService;

trait InterviewerZoneAware
{
    /**
     * @var InterviewerZoneService $interviewerZoneService
     */
    protected $interviewerZoneService;

    /**
     * @var InterviewerZoneRepository $interviewerZoneRepository
     */
    protected $interviewerZoneRepository;

    /**
     * @param InterviewerZoneService $interviewerZoneService
     */
    public function setInterviewerZoneService(InterviewerZoneService $interviewerZoneService)
    {
        $this->interviewerZoneService = $interviewerZoneService;
    }

    /**
     * @return InterviewerZoneService
     */
    public function getInterviewerZoneService()
    {
        return $this->interviewerZoneService;
    }

    /**
     * @param InterviewerZoneRepository $interviewerZoneRepository
     */
    public function setInterviewerZoneRepository(InterviewerZoneRepository $interviewerZoneRepository)
    {
        $this->interviewerZoneRepository = $interviewerZoneRepository;
    }

    /**
     * @return InterviewerZoneRepository
     */
    public function getInterviewerZoneRepository()
    {
        return $this->interviewerZoneRepository;
    }
}
