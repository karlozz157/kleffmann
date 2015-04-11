<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Service\Aware\ProjectTypeUprisingAware;
use DevTag\KleffmannBundle\Form\ProjectTypeUprisingType;
use DevTag\KleffmannBundle\Entity\ProjectTypeUprising;

/**
 * @Route("/project-type-uprisings", service="kleffmann.project_type_uprising.controller")
 */
class ProjectTypeUprisingController extends BaseController
{
    use ProjectTypeUprisingAware;

    /**
     * @Route("/", name="project_type_uprisings")
     * @Template()
     *
     * @return array
     */
    public function indexAction()
    {
        $projectTypeUprisings = $this->projectTypeUprisingRepository->findAll();

        return ['projectTypeUprisings' => $projectTypeUprisings];
    }

    /**
     * @Route("/new", name="project_type_uprisings_new")
     * @Template()
     *
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function newAction(Request $request)
    {
        $projectTypeUprising = new ProjectTypeUprising();
        $form = $this->createForm(new ProjectTypeUprisingType(), $projectTypeUprising);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->projectTypeUprisingService->save($projectTypeUprising);
            $this->projectTypeUprisingService->flush();

            return $this->redirectToRoute('project_type_uprisings');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/edit/{id}", name="project_type_uprisings_edit")
     * @ParamConverter()
     * @Template()
     *
     * @param ProjectTypeUprising $projectTypeUprising
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function editAction(ProjectTypeUprising $projectTypeUprising, Request $request)
    {
        $form = $this->createForm(new ProjectTypeUprisingType(), $projectTypeUprising);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->projectTypeUprisingService->save($projectTypeUprising);
            $this->projectTypeUprisingService->flush();

            return $this->redirectToRoute('project_type_uprisings');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/delete/{id}", name="project_type_uprisings_delete")
     * @ParamConverter()
     *
     * @param ProjectTypeUprising $projectTypeUprising
     *
     * @return RedirectResponse
     */
    public function deleteAction(ProjectTypeUprising $projectTypeUprising)
    {
        $this->projectTypeUprisingService->remove($projectTypeUprising);
        $this->projectTypeUprisingService->flush();

        return $this->redirectToRoute('project_type_uprisings');
    }
}
