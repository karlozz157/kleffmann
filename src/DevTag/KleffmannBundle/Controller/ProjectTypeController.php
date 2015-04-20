<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Service\Aware\ProjectTypeAware;
use DevTag\KleffmannBundle\Form\ProjectTypeType;
use DevTag\KleffmannBundle\Entity\ProjectType;

/**
 * @Route("/proyectos/tipos", service="kleffmann.project_type.controller")
 */
class ProjectTypeController extends BaseController
{
    use ProjectTypeAware;

    /**
     * @Route("/", name="project_types")
     * @Template()
     *
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $page = $request->query->get('page', 1);
        $projectTypes = $this->projectTypeRepository->findAll($page);

        return ['projectTypes' => $projectTypes];
    }

    /**
     * @Route("/nuevo", name="project_types_new")
     * @Template()
     *
     * @param Request $request
     *
     * @return array
     */
    public function newAction(Request $request)
    {
        $projectType = new ProjectType();
        $form = $this->createForm(new ProjectTypeType(), $projectType);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->projectTypeService->save($projectType);
            $this->projectTypeService->flush();

            return $this->redirectToRoute('project_types');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/editar/{id}", name="project_types_edit")
     * @Template()
     * @ParamConverter()
     *
     * @param ProjectType $projectType
     * @param Request $request
     *
     * @return array
     */
    public function editAction(ProjectType $projectType, Request $request)
    {
        $form = $this->createForm(new ProjectTypeType(), $projectType);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->projectTypeService->save($projectType);
            $this->projectTypeService->flush();

            return $this->redirectToRoute('project_types');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/eliminar/{id}", name="project_types_delete")
     * @ParamConverter()
     *
     * @param ProjectType $projectType
     *
     * @return array
     */
    public function deleteAction(ProjectType $projectType)
    {
        $this->projectTypeService->remove($projectType);
        $this->projectTypeService->flush();

        return $this->redirectToRoute('project_types');
    }
}
