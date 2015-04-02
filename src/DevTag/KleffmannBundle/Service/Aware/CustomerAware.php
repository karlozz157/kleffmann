<?php

namespace DevTag\KleffmannBundle\Service\Aware;

use DevTag\KleffmannBundle\Repository\CustomerRepository;
use DevTag\KleffmannBundle\Service\CustomerService;

trait CustomerAware
{
    /**
     * @var CustomerService $customerService
     */
    protected $customerService;

    /**
     * @var CustomerRepository $customerRepository
     */
    protected $customerRepository;

    /**
     * @param CustomerService $customerService
     */
    public function setCustomerService(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    /**
     * @return CustomerService
     */
    public function getCustomerService()
    {
        return $this->customerService;
    }

    /**
     * @param CustomerRepository $customerRepository
     */
    public function setCustomerRepository(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * @return CustomerRepository
     */
    public function getCustomerRepository()
    {
        return $this->customerRepository;
    }
}
