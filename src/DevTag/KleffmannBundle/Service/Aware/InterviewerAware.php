<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Service\InterviewerService;

trait InterviewerAware
{
    /**
     * @var InterviewerService $interviewerService
     */
    protected $interviewerService;

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
}
