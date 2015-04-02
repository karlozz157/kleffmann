<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Service\Aware\ManagerAware;
use DevTag\KleffmannBundle\Form\ManagerType;
use DevTag\KleffmannBundle\Entity\Manager;

/**
 * @Route("/manager", service="kleffmann.manager.controller")
 */
class ManagerController extends BaseController
{
    use ManagerAware;

    /**
     * @Route("/list", name="manager_list")
     * @Template()
     *
     * @return array
     */
    public function indexAction()
    {
        $managers = $this->managerRepository->findAll();

        return ['managers' => $managers];
    }

    /**
     * @Route("/new", name="new_manager")
     * @Template()
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function newAction(Request $request)
    {
        $manager = new Manager();
        $form = $this->createForm(new ManagerType(), $manager);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->managerService->save($manager);
            $this->managerService->flush();

            return $this->redirectToRoute('manager_list');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/edit/{id}", name="edit_manager")
     * @ParamConverter()
     * @Template()
     *
     * @param Manager $manager
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function editAction(Manager $manager, Request $request)
    {
        $form = $this->createForm(new ManagerType(), $manager);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->managerService->save($manager);
            $this->managerService->flush();

            return $this->redirectToRoute('manager_list');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/delete/{id}", name="delete_manager")
     * @ParamConverter()
     *
     * @param Manager $manager
     *
     * @return RedirectResponse
     */
    public function deleteAction(Manager $manager)
    {
        $this->managerService->remove($manager);
        $this->managerService->flush();

        return $this->redirectToRoute('manager_list');
    }
}
