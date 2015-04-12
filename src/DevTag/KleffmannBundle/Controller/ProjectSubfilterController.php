<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Service\Aware\ProjectSubfilterAware;
use DevTag\KleffmannBundle\Form\ProjectSubfilterType;
use DevTag\KleffmannBundle\Entity\ProjectSubfilter;
use DevTag\KleffmannBundle\Entity\ProjectFilter;

/**
 * @Route("/project-subfilters", service="kleffmann.project_subfilter.controller")
 */
class ProjectSubfilterController extends BaseController
{
    use ProjectSubfilterAware;

    /**
     * @Route("/{projectFilter}", name="project_subfilters")
     * @ParamConverter()
     * @Template()
     *
     * @param ProjectFilter $projectFilter
     *
     * @return array
     */
    public function indexAction(ProjectFilter $projectFilter)
    {
        $this->projectSubfilterRepository->setProjectFilter($projectFilter);
        $projectSubfilters = $this->projectSubfilterRepository->findAll();

        return ['projectSubfilters' => $projectSubfilters, 'project_filter' => $projectFilter];
    }

    /**
     * @Route("/new/{projectFilter}", name="project_subfilters_new")
     * @ParamConverter()
     * @Template()
     *
     * @param ProjectFilter $projectFilter
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function newAction(ProjectFilter $projectFilter, Request $request)
    {
        $projectSubfilter = new ProjectSubfilter();
        $projectSubfilter->setFilter($projectFilter);
        $form = $this->createForm(new ProjectSubfilterType(), $projectSubfilter);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->projectSubfilterService->save($projectSubfilter);
            $this->projectSubfilterService->flush();

            return $this->redirectToRoute('project_subfilters', [
                'project_filter' => $projectFilter->getId()
            ]);
        }

        return ['form' => $form->createView(), 'project_filter' => $projectFilter];
    }

    /**
     * @Route("/edit/{id}", name="project_subfilters_edit")
     * @ParamConverter()
     * @Template()
     *
     * @param ProjectSubfilter $projectSubfilter
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function editAction(ProjectSubfilter $projectSubfilter, Request $request)
    {
        $form = $this->createForm(new ProjectSubfilterType(), $projectSubfilter);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->projectSubfilterService->save($projectSubfilter);
            $this->projectSubfilterService->flush();

            return $this->redirectToRoute('project_subfilters', [
                'project_filter' => $projectSubfilter->getFilter()->getId()
            ]);
        }

        return ['form' => $form->createView(), 'project_filter' => $projectSubfilter->getFilter()];
    }

    /**
     * @Route("/delete/{id}", name="project_subfilters_delete")
     * @ParamConverter()
     *
     * @param ProjectSubfilter $projectSubfilter
     *
     * @return RedirectResponse
     */
    public function deleteAction(ProjectSubfilter $projectSubfilter)
    {
        $this->projectSubfilterService->remove($projectSubfilter);
        $this->projectSubfilterService->flush();

        return $this->redirectToRoute('project_subfilters', [
            'project_filter' => $projectSubfilter->getFilter()->getId()
        ]);
    }
}
