<?php

namespace DevTag\KleffmannBundle\Controller;

use DevTag\KleffmannBundle\Entity\Customer;
use DevTag\KleffmannBundle\Form\CustomerType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Service\Aware\CustomerAware;


/**
 * @Route("/customer", service="kleffmann.customer.controller")
 */
class CustomerController extends BaseController
{
    use CustomerAware;

    /**
     * @Route("/list", name="customer_list")
     * @Template()
     *
     * @return array
     */
    public function indexAction()
    {
        $customers = $this->customerRepository->findAll();

        return ['customers' => $customers];
    }

    /**
     * @Route("/new", name="new_customer")
     * @Template()
     *
     * @param Request $request
     *
     * @return array
     */
    public function newAction(Request $request)
    {
        $customer = new Customer();
        $form = $this->createForm(new CustomerType(), $customer);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->customerService->save($customer);
            $this->customerService->flush();

            return $this->redirectToRoute('customer_list');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/edit/{id}", name="edit_customer")
     * @ParamConverter()
     * @Template()
     *
     * @param Customer $customer
     * @param Request $request
     *
     * @return array
     */
    public function editAction(Customer $customer, Request $request)
    {
        $form = $this->createForm(new CustomerType(), $customer);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->customerService->save($customer);
            $this->customerService->flush();

            return $this->redirectToRoute('customer_list');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/delete/{id}", name="delete_customer")
     * @ParamConverter()
     *
     * @param Customer $customer
     *
     * @return array
     */
    public function deleteAction(Customer $customer)
    {
        $this->customerService->remove($customer);
        $this->customerService->flush();

        return $this->redirectToRoute('customer_list');
    }
}
