<?php

namespace DevTag\KleffmannBundle\Sms;

trait SmsAdapterAware
{
    /**
     * @var SmsAdapter $smsAdapter
     */
    protected $smsAdapter;

    /**
     * @param SmsAdapter $smsAdapter
     */
    public function setSmsAdapter(SmsAdapter $smsAdapter)
    {
        $this->smsAdapter = $smsAdapter;
    }

    /**
     * @return SmsAdapter
     */
    public function getSmsAdapter()
    {
        return $this->$smsAdapter;
    }
}
