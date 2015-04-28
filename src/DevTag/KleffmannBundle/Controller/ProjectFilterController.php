<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Controller\Mapped\AbstractController;
use DevTag\KleffmannBundle\Service\Aware\ProjectFilterAware;
use DevTag\KleffmannBundle\Form\ProjectFilterType;
use DevTag\KleffmannBundle\Entity\ProjectFilter;
use DevTag\KleffmannBundle\Entity\Project;

/**
 * @Route("/proyectos/filtros", service="kleffmann.project_filter.controller")
 */
class ProjectFilterController extends AbstractController
{
    use ProjectFilterAware;

    /**
     * @var array $roles
     */
    protected $roles = ['ROLE_PROJECT_MANAGER'];

    /**
     * @Route("/{project}", name="project_filters")
     * @ParamConverter()
     * @Template()
     *
     * @param Project $project
     *
     * @return array
     */
    public function indexAction(Project $project)
    {
        $this->projectFilterRepository->setProject($project);
        $projectFilterList = $this->projectFilterRepository->findAll();

        return ['projectFilterList' => $projectFilterList, 'project' => $project];
    }

    /**
     * @Route("/nuevo/{project}", name="project_filters_new")
     * @ParamConverter()
     * @Template()
     *
     * @param Project $project
     * @param Request $request
     *
     * @return array
     */
    public function newAction(Project $project, Request $request)
    {
        $projectFilter = new ProjectFilter();
        $projectFilter->setProject($project);
        $form = $this->createForm(new ProjectFilterType(), $projectFilter);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->projectFilterService->save($projectFilter);
            $this->projectFilterService->flush();

            return $this->redirectToRoute('project_filters', [
                'project' => $project->getId(),
            ]);
        }

        return ['form' => $form->createView(), 'project' => $project];
    }

    /**
     * @Route("/editar/{id}", name="project_filters_edit")
     * @ParamConverter()
     * @Template()
     *
     * @param ProjectFilter $projectFilter
     * @param Request $request
     *
     * @return array
     */
    public function editAction(ProjectFilter $projectFilter, Request $request)
    {
        $form = $this->createForm(new ProjectFilterType(), $projectFilter);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->projectFilterService->save($projectFilter);
            $this->projectFilterService->flush();

            return $this->redirectToRoute('project_filters', [
                'project' => $projectFilter->getProject()->getId(),
            ]);
        }

        return ['form' => $form->createView(), 'project' => $projectFilter->getProject()];
    }

    /**
     * @Route("/eliminar/{id}", name="project_filters_delete")
     * @ParamConverter()
     *
     * @param ProjectFilter $projectFilter
     *
     * @return array
     */
    public function deleteAction(ProjectFilter $projectFilter)
    {
        $this->projectFilterService->remove($projectFilter);
        $this->projectFilterService->flush();

        return $this->redirectToRoute('project_filters', [
            'project' => $projectFilter->getProject()->getId()
        ]);
    }
}
