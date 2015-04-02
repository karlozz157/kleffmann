<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Service\InvoiceService;
use DevTag\KleffmannBundle\Repository\InvoiceRepository;

trait InvoiceAware
{
    /**
     * @var InvoiceService $invoiceService
     */
    protected $invoiceService;

    /**
     * @var InvoiceRepository $invoiceRepository
     */
    protected $invoiceRepository;

    /**
     * @param InvoiceService $invoiceService
     */
    public function setInvoiceService(InvoiceService $invoiceService)
    {
        $this->invoiceService = $invoiceService;
    }

    /**
     * @return InvoiceService
     */
    public function getInvoiceService()
    {
        return $this->invoiceService;
    }

    /**
     * @param InvoiceRepository $invoiceRepository
     */
    public function setInvoiceRepository(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    /**
     * @return InvoiceRepository
     */
    public function getInvoiceRepository()
    {
        return $this->invoiceRepository;
    }
}
