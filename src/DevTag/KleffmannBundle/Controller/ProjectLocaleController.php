<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Service\Aware\ProjectLocaleAware;
use DevTag\KleffmannBundle\Form\ProjectLocaleType;
use DevTag\KleffmannBundle\Entity\ProjectLocale;
use DevTag\KleffmannBundle\Entity\Project;

/**
 * @Route("/project-locale", service="kleffmann.project_locale.controller")
 */
class ProjectLocaleController extends BaseController
{
    use ProjectLocaleAware;

    /**
     * @Route("/list/{id}", name="project_locale_list")
     * @Template()
     * @ParamConverter()
     *
     * @param Project $project
     *
     * @return array
     */
    public function indexAction(Project $project)
    {
        $this->projectLocaleRepository->setProject($project);
        $projectLocaleList = $this->projectLocaleRepository->findAll();

        return ['projectLocaleList' => $projectLocaleList, 'project' => $project];
    }

    /**
     * @Route("/new/{id}", name="project_locale_new")
     * @Template()
     * @ParamConverter()
     *
     * @param Project $project
     * @param Request $request
     *
     * @return array
     */
    public function newAction(Project $project, Request $request)
    {
        $projectLocale = new ProjectLocale();
        $projectLocale->setProject($project);
        $form = $this->createForm(new ProjectLocaleType(), $projectLocale);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->projectLocaleService->save($projectLocale);
            $this->projectLocaleService->flush();

            return $this->redirectToRoute('project_locale_list', [
                'id' => $project->getId()
            ]);
        }

        return ['form' => $form->createView(), 'project' => $project];
    }

    /**
     * @Route("/edit/{id}", name="project_locale_edit")
     * @Template()
     * @ParamConverter()
     *
     * @param ProjectLocale $projectLocale
     * @param Request $request
     *
     * @return array
     */
    public function editAction(ProjectLocale $projectLocale, Request $request)
    {
        $form = $this->createForm(new ProjectLocaleType(), $projectLocale);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->projectLocaleService->save($projectLocale);
            $this->projectLocaleService->flush();

            return $this->redirectToRoute('project_locale_list', [
                'id' => $projectLocale->getProject()->getId()
            ]);
        }

        return ['form' => $form->createView(), 'project' => $projectLocale->getProject()];
    }

    /**
     * @Route("/delete/{id}", name="project_locale_delete")
     * @ParamConverter()
     *
     * @param ProjectLocale $projectLocale
     *
     * @return array
     */
    public function deleteAction(ProjectLocale $projectLocale)
    {
        $this->projectLocaleService->remove($projectLocale);
        $this->projectLocaleService->flush();

        return $this->redirectToRoute('project_locale_list', [
            'id' => $projectLocale->getProject()->getId()
        ]);
    }
}
