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
 * @Route("/managers", service="kleffmann.manager.controller")
 */
class ManagerController extends BaseController
{
    use ManagerAware;

    /**
     * @Route("/", name="managers")
     * @Template()
     *
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $page = $request->query->get('page', 1);
        $managers = $this->managerRepository->findAll($page);

        return ['managers' => $managers];
    }

    /**
     * @Route("/new", name="managers_new")
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

            return $this->redirectToRoute('managers');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/edit/{id}", name="managers_edit")
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

            return $this->redirectToRoute('managers');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/delete/{id}", name="managers_delete")
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

        return $this->redirectToRoute('managers');
    }
}
