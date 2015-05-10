<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
USE Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Controller\Mapped\NotifyActionInterface;
use DevTag\KleffmannBundle\Controller\Mapped\CrudController;
use DevTag\KleffmannBundle\Entity\Invoice;

/**
 * @Route("/facturas", service="kleffmann.invoice.controller")
 */
class InvoiceController extends CrudController implements NotifyActionInterface
{
    /**
     * @Route("/nuevo")
     * @Template()
     *
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function newAction(Request $request)
    {
        /** @var Invoice $entity */
        $entity = new $this->entityName();
        $formClass = new $this->formName();
        $form = $this->createForm($formClass, $entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            /** @var UploadedFile $file */
            $file = $form['file']->getData();
            $newFileName = $this->service->generateFileNameVersion($file->getClientOriginalName());
            $file->move('invoices', $newFileName);
            $entity->setFile($newFileName);
            $this->service->save($entity);
            $this->service->flush();
            $this->notifyAction($entity, __FUNCTION__);

            return $this->redirectToRoute(
                sprintf(self::REDIRECT_ROUTE, strtolower($this->module))
            );
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/editar/{id}")
     * @Template()
     *
     * @param int $id
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function editAction($id, Request $request)
    {
        $entity = $this->repository->find($id);
        $formClass = new $this->formName();
        $form = $this->createForm($formClass, $entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->service->save($entity);
            $this->service->flush();

            return $this->redirectToRoute(
                sprintf(self::REDIRECT_ROUTE, strtolower($this->module))
            );
        }

        return ['form' => $form->createView()];
    }

    /**
     * @param Object $entity
     * @param string $action
     */
    public function notifyAction($entity = null, $action = '')
    {
        if (!$entity instanceof Invoice) {
            return;
        }

        $this->service->notifyInvoice($entity);
    }
}
