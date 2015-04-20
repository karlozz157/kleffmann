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
 * @Route("/proyectos/variables", service="kleffmann.project_variable.controller")
 */
class ProjectVariableController extends BaseController
{
    use ProjectVariableAware;

    /**
     * @Route("/{project}", name="project_variable_list")
     * @ParamConverter()
     * @Template()
     *
     * @param Project $project
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(Project $project, Request $request)
    {
        $page = $request->query->get('page', 1);
        $options = ['project' => $project];
        $projectVariables = $this->projectVariableRepository->findAll($page, $options);

        return ['projectVariables' => $projectVariables];
    }

    /**
     * @Route("/nuevo/{project}")
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
     * @Route("/editar/{id}")
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
     * @Route("/eliminar/{id}")
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
