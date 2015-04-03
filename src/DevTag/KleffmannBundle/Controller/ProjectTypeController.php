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
 * @Route("/project-type", service="kleffmann.project_type.controller")
 */
class ProjectTypeController extends BaseController
{
    use ProjectTypeAware;

    /**
     * @Route("/list", name="project_type_list")
     * @Template()
     *
     * @return array
     */
    public function indexAction()
    {
        $projectTypes = $this->projectTypeRepository->findAll();

        return ['projectTypes' => $projectTypes];
    }

    /**
     * @Route("/new", name="new_project_type")
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

            return $this->redirectToRoute('project_type_list');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/edit/{id}", name="edit_project_type")
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

            return $this->redirectToRoute('project_type_list');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/delete/{id}", name="delete_project_type")
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

        return $this->redirectToRoute('project_type_list');
    }
}
