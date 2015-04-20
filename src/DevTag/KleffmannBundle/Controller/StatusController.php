<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Service\Aware\StatusAware;
use DevTag\KleffmannBundle\Form\StatusType;
use DevTag\KleffmannBundle\Entity\Status;

/**
 * @Route("/status", service="kleffmann.status.controller")
 */
class StatusController extends BaseController
{
    use StatusAware;

    /**
     * @Route("/list", name="status_list")
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
     * @Route("/new", name="new_status")
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
     * @Route("/edit/{id}", name="edit_status")
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
     * @Route("/delete/{id}", name="delete_status")
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
