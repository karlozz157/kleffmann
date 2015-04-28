<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Controller\Mapped\AbstractController;
use DevTag\KleffmannBundle\Service\Aware\InvoiceAware;
use DevTag\KleffmannBundle\Form\InvoiceType;
use DevTag\KleffmannBundle\Entity\Invoice;

/**
 * @Route("/facturas", service="kleffmann.invoice.controller")
 */
class InvoiceController extends AbstractController
{
    use InvoiceAware;

    /**
     * @var array $roles
     */
    protected $roles = ['ROLE_ADMINISTRATION'];

    /**
     * @Route("/", name="invoices")
     * @Template()
     *
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $page = $request->query->get('page', 1);
        $invoices = $this->invoiceRepository->findAll($page);

        return ['invoices' => $invoices];
    }

    /**
     * @Route("/nuevo", name="invoices_new")
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

            return $this->redirectToRoute('invoices');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/editar/{id}", name="invoices_edit")
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

            return $this->redirectToRoute('invoices');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/eliminar/{id}", name="invoices_delete")
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

        return $this->redirectToRoute('invoices');
    }
}
