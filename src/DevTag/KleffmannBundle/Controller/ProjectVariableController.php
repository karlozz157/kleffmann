<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Service\Aware\ProjectVariableAware;
use DevTag\KleffmannBundle\Form\ProjectVariableType;
use DevTag\KleffmannBundle\Entity\ProjectVariable;
use DevTag\KleffmannBundle\Entity\Project;

/**
 * @Route("/project-variable", service="kleffmann.project_variable.controller")
 */
class ProjectVariableController extends BaseController
{
    use ProjectVariableAware;

    /**
     * @Route("/list/{project_id}", name="project_variable_list")
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
     * @param Request $request
     *
     * @return array
     */
    public function newAction(Request $request)
    {
        $projectVariable = new ProjectVariable();
        $form = $this->createForm(new ProjectVariableType(), $projectVariable);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->projectVariableService->save($projectVariable);
            $this->projectVariableService->flush();

            return $this->redirectToRoute('project_variable_list');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/edit/{id}")
     * @ParamConverter()
     * @Template()
     *
     * @param ProjectVariable $projectVariable
     * @param Request $request
     *
     * @return array
     */
    public function editAction(ProjectVariable $projectVariable, Request $request)
    {
        $form = $this->createForm(new ProjectVariableType(), $projectVariable);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->projectVariableService->save($projectVariable);
            $this->projectVariableService->flush();

            return $this->redirectToRoute('project_variable_list');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/delete/{id}")
     * @ParamConverter()
     *
     * @param ProjectVariable $projectVariable
     *
     * @return array
     */
    public function deleteAction(ProjectVariable $projectVariable)
    {
        $this->projectVariableService->remove($projectVariable);
        $this->projectVariableService->flush();

        return $this->redirectToRoute('project_variable_list');
    }
}
