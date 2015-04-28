<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Service\Aware\ProjectTypeUprisingAware;
use DevTag\KleffmannBundle\Controller\Mapped\AbstractController;
use DevTag\KleffmannBundle\Form\ProjectTypeUprisingType;
use DevTag\KleffmannBundle\Entity\ProjectTypeUprising;

/**
 * @Route("/proyectos/tipos-de-levantamientos", service="kleffmann.project_type_uprising.controller")
 */
class ProjectTypeUprisingController extends AbstractController
{
    use ProjectTypeUprisingAware;

    /**
     * @var array $roles
     */
    protected $roles = ['ROLE_PROJECT_MANAGER'];

    /**
     * @Route("/", name="project_type_uprisings")
     * @Template()
     *
     * @return array
     */
    public function indexAction()
    {
        $projectTypeUprisings = $this->projectTypeUprisingRepository->findAll();

        return ['projectTypeUprisings' => $projectTypeUprisings];
    }

    /**
     * @Route("/nuevo", name="project_type_uprisings_new")
     * @Template()
     *
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function newAction(Request $request)
    {
        $projectTypeUprising = new ProjectTypeUprising();
        $form = $this->createForm(new ProjectTypeUprisingType(), $projectTypeUprising);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->projectTypeUprisingService->save($projectTypeUprising);
            $this->projectTypeUprisingService->flush();

            return $this->redirectToRoute('project_type_uprisings');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/editar/{id}", name="project_type_uprisings_edit")
     * @ParamConverter()
     * @Template()
     *
     * @param ProjectTypeUprising $projectTypeUprising
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function editAction(ProjectTypeUprising $projectTypeUprising, Request $request)
    {
        $form = $this->createForm(new ProjectTypeUprisingType(), $projectTypeUprising);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->projectTypeUprisingService->save($projectTypeUprising);
            $this->projectTypeUprisingService->flush();

            return $this->redirectToRoute('project_type_uprisings');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/eliminar/{id}", name="project_type_uprisings_delete")
     * @ParamConverter()
     *
     * @param ProjectTypeUprising $projectTypeUprising
     *
     * @return RedirectResponse
     */
    public function deleteAction(ProjectTypeUprising $projectTypeUprising)
    {
        $this->projectTypeUprisingService->remove($projectTypeUprising);
        $this->projectTypeUprisingService->flush();

        return $this->redirectToRoute('project_type_uprisings');
    }
}
