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
     * @Route("/list/{project_id}", name="project_filter_list")
     * @ParamConverter()
     * @Template()
     *
     * @param Project $project
     *
     * @return array
     */
    public function indexAction(Project $project)
    {
        return [];
    }

    /**
     * @Route("/new/{project_id}")
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

            return $this->redirectToRoute('project_filter_list', [
                'project_id' => $project,
            ]);
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/edit/{project_filter_id}")
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

            return $this->redirectToRoute('project_filter_list', [
                'project_id' => $projectFilter->getProject(),
            ]);
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/delete/{project_filter_id}")
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

        return $this->redirectToRoute('');
    }
}
