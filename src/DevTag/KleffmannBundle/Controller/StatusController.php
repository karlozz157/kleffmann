<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Controller\Mapped\AbstractController;
use DevTag\KleffmannBundle\Service\Aware\StatusAware;
use DevTag\KleffmannBundle\Form\StatusType;
use DevTag\KleffmannBundle\Entity\Status;

/**
 * @Route("/proyectos/tipos-de-estatus", service="kleffmann.status.controller")
 */
class StatusController extends AbstractController
{
    use StatusAware;

    /**
     * @Route("/", name="status_list")
     * @Template()
     *
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $page = $request->query->get('page', 1);
        $statusList = $this->statusRepository->findAll($page);

        return ['statusList' => $statusList];
    }

    /**
     * @Route("/nuevo", name="new_status")
     * @Template()
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function newAction(Request $request)
    {
        $status = new Status();
        $form = $this->createForm(new StatusType(), $status);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->statusService->save($status);
            $this->statusService->flush();

            return $this->redirectToRoute('status_list');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/editar/{id}", name="edit_status")
     * @ParamConverter()
     * @Template()
     *
     * @param Status $status
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function editAction(Status $status, Request $request)
    {
        $form = $this->createForm(new StatusType(), $status);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->statusService->save($status);
            $this->statusService->flush();

            return $this->redirectToRoute('status_list');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/eliminar/{id}", name="delete_status")
     * @ParamConverter()
     *
     * @param Status $status
     *
     * @return RedirectResponse
     */
    public function deleteAction(Status $status)
    {
        $this->statusService->remove($status);
        $this->statusService->flush();

        return $this->redirectToRoute('status_list');
    }
}
