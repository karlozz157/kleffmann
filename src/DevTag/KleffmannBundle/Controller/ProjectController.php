<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Service\Aware\ProjectAware;
use DevTag\KleffmannBundle\Form\ProjectType;
use DevTag\KleffmannBundle\Entity\Project;

/**
 * @Route("/project", service="kleffmann.project.controller")
 */
class ProjectController extends BaseController
{
    use ProjectAware;

    /**
     * @Route("/list", name="projects")
     * @Template()
     *
     * @return array
     */
    public function indexAction()
    {
        $projects = $this->projectRepository->findAll();

        return ['projects' => $projects];
    }

    /**
     * @Route("/new", name="new_project")
     * @ParamConverter()
     * @Template()
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function newAction(Request $request)
    {
        $project = new Project();
        $form = $this->createForm(new ProjectType(), $project);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->projectService->save($project);
            $this->projectService->flush();

            return $this->redirectToRoute('projects');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/edit/{id}", name="edit_project")
     * @ParamConverter()
     * @Template()
     *
     * @param Project $project
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function editAction(Project $project, Request $request)
    {
        $form = $this->createForm(new ProjectType(), $project);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->projectService->save($project);
            $this->projectService->flush();

            return $this->redirectToRoute('projects');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/delete/{id}", name="delete_project")
     * @ParamConverter()
     *
     * @param Project $project
     *
     * @return RedirectResponse
     */
    public function deleteAction(Project $project)
    {
        $this->projectService->remove($project);
        $this->projectService->flush();

        return $this->redirectToRoute('projects');
    }
}
