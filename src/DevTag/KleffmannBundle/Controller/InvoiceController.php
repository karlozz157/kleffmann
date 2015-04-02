<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Form\InvoiceType;
use DevTag\KleffmannBundle\Entity\Invoice;
use DevTag\KleffmannBundle\Service\Aware\InvoiceAware;

/**
 * @Route("/invoice", service="kleffmann.invoice.controller")
 */
class InvoiceController extends BaseController
{
    use InvoiceAware;

    /**
     * @Route("/list", name="invoice_list")
     * @Template()
     *
     * @return array
     */
    public function indexAction()
    {
        $invoices = $this->invoiceRepository->findAll();

        return ['invoices' => $invoices];
    }

    /**
     * @Route("/new", name="new_invoice")
     * @Template()
     *
     * @param Request $request
     *
     * @return array
     */
    public function newAction(Request $request)
    {
        $invoice = new Invoice();
        $form = $this->createForm(new InvoiceType(), $invoice);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->invoiceService->save($invoice);
            $this->invoiceService->flush();

            return $this->redirectToRoute('invoice_list');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/edit/{id}")
     * @ParamConverter()
     * @Template()
     *
     * @param Invoice $invoice
     * @param Request $request
     *
     * @return array
     */
    public function editAction(Invoice $invoice, Request $request)
    {
        $form = $this->createForm(new InvoiceType(), $invoice);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->invoiceService->save($invoice);
            $this->invoiceService->flush();

            return $this->redirectToRoute('invoice_list');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/delete/{id}")
     * @ParamConverter()
     *
     * @param Invoice $invoice
     *
     * @return array
     */
    public function deleteAction(Invoice $invoice)
    {
        $this->invoiceService->remove($invoice);
        $this->invoiceService->flush();

        return $this->redirectToRoute('invoice_list');
    }
}
