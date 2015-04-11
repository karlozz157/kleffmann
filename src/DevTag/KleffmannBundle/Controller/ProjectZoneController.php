<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Service\Aware\ProjectZoneAware;
use DevTag\KleffmannBundle\Form\ProjectZoneType;
use DevTag\KleffmannBundle\Entity\ProjectZone;
use DevTag\KleffmannBundle\Entity\Project;

/**
 * @Route("/project-zones", service="kleffmann.project_zone.controller")
 */
class ProjectZoneController extends BaseController
{
    use ProjectZoneAware;

    /**
     * @Route("/{project}", name="project_zones")
     * @ParamConverter()
     * @Template()
     *
     * @param Project $project
     *
     * @return array
     */
    public function indexAction(Project $project)
    {
        $projectZones = $this->projectZoneRepository->findAll();

        return ['projectZones' => $projectZones, 'project' => $project];
    }

    /**
     * @Route("/new/{project}", name="project_zones_new")
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
        $projectZone = new ProjectZone();
        $projectZone->setProject($project);
        $form = $this->createForm(new ProjectZoneType(), $projectZone);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->projectZoneService->save($projectZone);
            $this->projectZoneService->flush();

            return $this->redirectToRoute('project_zones', ['project' => $project->getId()]);
        }

        return ['form' => $form->createView(), 'project' => $project];
    }

    /**
     * @Route("/edit/{id}", name="project_zones_edit")
     * @ParamConverter()
     * @Template()
     *
     * @param ProjectZone $projectZone
     * @param Request $request
     *
     * @return array
     */
    public function editAction(ProjectZone $projectZone, Request $request)
    {
        $form = $this->createForm(new ProjectZoneType(), $projectZone);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->projectZoneService->save($projectZone);
            $this->projectZoneService->flush();

            return $this->redirectToRoute('project_zones', [
                'project' => $projectZone->getProject()->getId()
            ]);
        }

        return ['form' => $form->createView(), 'project' => $projectZone->getProject()];
    }

    /**
     * @Route("/delete/{id}", name="project_zones_delete")
     * @ParamConverter()
     *
     * @param ProjectZone $projectZone
     *
     * @return array
     */
    public function deleteAction(ProjectZone $projectZone)
    {
        $this->projectZoneService->remove($projectZone);
        $this->projectZoneService->flush();

        return $this->redirectToRoute('project_zones', [
            'project' => $projectZone->getProject()->getId()
        ]);
    }
}
