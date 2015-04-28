<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Controller\Mapped\AbstractController;
use DevTag\KleffmannBundle\Service\Aware\ManagerAware;
use DevTag\KleffmannBundle\Form\ManagerType;
use DevTag\KleffmannBundle\Entity\Manager;

/**
 * @Route("/gerentes", service="kleffmann.manager.controller")
 */
class ManagerController extends AbstractController
{
    use ManagerAware;

    /**
     * @var array $roles
     */
    protected $roles = ['ROLE_ADMIN'];

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
     * @Route("/nuevo", name="managers_new")
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
     * @Route("/editar/{id}", name="managers_edit")
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
     * @Route("/eliminar/{id}", name="managers_delete")
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
