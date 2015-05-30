<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Controller\Mapped\AbstractController;
use DevTag\KleffmannBundle\Service\Aware\ProjectFilterAware;
use DevTag\KleffmannBundle\Form\ProjectFilterType;
use DevTag\KleffmannBundle\Entity\ProjectVariable;
use DevTag\KleffmannBundle\Entity\ProjectFilter;

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
     * @Route("/{id}", name="project_filters")
     * @ParamConverter()
     * @Template()
     *
     * @param ProjectVariable $projectVariable
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(ProjectVariable $projectVariable, Request $request)
    {
        $page = $request->query->get('page', 1);
        $options = ['project_variable' => $projectVariable];
        $projectFilterList = $this->projectFilterRepository->findAll($page, $options);

        return ['projectFilterList' => $projectFilterList, 'projectVariable' => $projectVariable];
    }

    /**
     * @Route("/nuevo/{id}", name="project_filters_new")
     * @ParamConverter()
     * @Template()
     *
     * @param ProjectVariable $projectVariable
     * @param Request $request
     *
     * @return array
     */
    public function newAction(ProjectVariable $projectVariable, Request $request)
    {
        $projectFilter = new ProjectFilter();
        $projectFilter->setProjectVariable($projectVariable);
        $form = $this->createForm(new ProjectFilterType(), $projectFilter);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->projectFilterService->save($projectFilter);
            $this->projectFilterService->flush();

            return $this->redirectToRoute('project_filters', [
                'id' => $projectVariable->getId(),
            ]);
        }

        return ['form' => $form->createView(), 'projectVariable' => $projectVariable];
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
                'id' => $projectFilter->getProjectVariable()->getId(),
            ]);
        }

        return ['form' => $form->createView(), 'projectVariable' => $projectFilter->getProjectVariable()];
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
            'id' => $projectFilter->getProjectVariable()->getId()
        ]);
    }
}
