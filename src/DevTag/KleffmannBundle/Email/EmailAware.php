<?php

namespace DevTag\KleffmannBundle\Email;

trait EmailAware
{
    /**
     * @var Email
     */
    protected $emailAdapter;

    /**
     * @param Email $emailAdapter
     */
    public function setEmailAdapter(Email $emailAdapter)
    {
        $this->emailAdapter = $emailAdapter;
    }

    /**
     * @return Email
     */
    public function getEmailAdapter()
    {
        return $this->emailAdapter;
    }
}
