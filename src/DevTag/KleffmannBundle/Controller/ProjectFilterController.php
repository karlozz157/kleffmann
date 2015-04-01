<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Service\Aware\ProjectFilterAware;
use DevTag\KleffmannBundle\Form\ProjectFilterType;
use DevTag\KleffmannBundle\Entity\ProjectFilter;
use DevTag\KleffmannBundle\Entity\Project;

/**
 * @Route("/project-filter", service="kleffmann.project_filter.controller")
 */
class ProjectFilterController extends BaseController
{
    use ProjectFilterAware;

    /**
     * @Route("/list/{id}", name="list_project_filter")
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
     * @Route("/new/{id}", name="new_project_filter")
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

            return $this->redirectToRoute('list_project_filter', [
                'id' => $project->getId(),
            ]);
        }

        return ['form' => $form->createView(), 'project' => $project];
    }

    /**
     * @Route("/edit/{id}", name="edit_project_filter")
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

            return $this->redirectToRoute('list_project_filter', [
                'id' => $projectFilter->getProject()->getId(),
            ]);
        }

        return ['form' => $form->createView(), 'project' => $projectFilter->getProject()];
    }

    /**
     * @Route("/delete/{id}", name="delete_project_filter")
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

        return $this->redirectToRoute('list_project_filter', [
            'id' => $projectFilter->getProject()->getId()
        ]);
    }
}
