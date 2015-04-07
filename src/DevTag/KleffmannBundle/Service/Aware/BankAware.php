<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Repository\BankRepository;
use DevTag\KleffmannBundle\Service\BankService;

trait BankAware
{
    /**
     * @var BankService $bankService
     */
    protected $bankService;

    /**
     * @var BankRepository $bankRepository
     */
    protected $bankRepository;

    /**
     * @param BankService $bankService
     */
    public function setBankService(BankService $bankService)
    {
        $this->bankService = $bankService;
    }

    /**
     * @return BankService
     */
    public function getBankService()
    {
        return $this->bankService;
    }

    /**
     * @param BankRepository $bankRepository
     */
    public function setBankRepository(BankRepository $bankRepository)
    {
        $this->bankRepository = $bankRepository;
    }

    /**
     * @return BankRepository
     */
    public function getBankRepository()
    {
        return $this->bankRepository;
    }
}
