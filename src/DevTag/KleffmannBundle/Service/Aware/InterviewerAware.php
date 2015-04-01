<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Repository\InterviewerRepository;
use DevTag\KleffmannBundle\Service\InterviewerService;

trait InterviewerAware
{
    /**
     * @var InterviewerService $interviewerService
     */
    protected $interviewerService;

    /**
     * @var InterviewerRepository $interviewerRepository
     */
    protected $interviewerRepository;

    /**
     * @param InterviewerService $interviewerService
     */
    public function setInterviewerService(InterviewerService $interviewerService)
    {
        $this->interviewerService = $interviewerService;
    }

    /**
     * @return InterviewerService
     */
    public function getInterviewerService()
    {
        return $this->interviewerService;
    }

    /**
     * @param InterviewerRepository $interviewerRepository
     */
    public function setInterviewerRepository(InterviewerRepository $interviewerRepository)
    {
        $this->interviewerRepository = $interviewerRepository;
    }

    /**
     * @return InterviewerRepository
     */
    public function getInterviewerRepository()
    {
        return $this->interviewerRepository;
    }
}
