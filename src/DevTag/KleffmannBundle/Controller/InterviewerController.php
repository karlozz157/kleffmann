<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Service\Aware\InterviewerAware;
use DevTag\KleffmannBundle\Form\InterviewerType;
use DevTag\KleffmannBundle\Entity\Interviewer;

/**
 * @Route("/encuestadores", service="kleffmann.interviewer.controller")
 */
class InterviewerController extends BaseController
{
    use InterviewerAware;

    /**
     * @Route("/", name="interviewers")
     * @Template()
     *
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $page = $request->query->get('page', 1);
        $interviewers = $this->interviewerRepository->findAll($page);

        return ['interviewers' => $interviewers];
    }

    /**
     * @Route("/nuevo", name="interviewers_new")
     * @Template()
     *
     * @param Request $request
     *
     * @return array
     */
    public function newAction(Request $request)
    {
        $interviewer = new Interviewer();
        $form = $this->createForm(new InterviewerType(), $interviewer);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->interviewerService->save($interviewer);
            $this->interviewerService->flush();

            return $this->redirectToRoute('interviewers');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/editar/{id}", name="interviewers_edit")
     * @ParamConverter()
     * @Template()
     *
     * @param Interviewer $interviewer
     * @param Request $request
     *
     * @return array
     */
    public function editAction(Interviewer $interviewer, Request $request)
    {
        $form = $this->createForm(new InterviewerType(), $interviewer);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->interviewerService->save($interviewer);
            $this->interviewerService->flush();

            return $this->redirectToRoute('interviewers');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/eliminar/{id}", name="interviewers_delete")
     * @ParamConverter()
     *
     * @param Interviewer $interviewer
     *
     * @return array
     */
    public function deleteAction(Interviewer $interviewer)
    {
        $this->interviewerService->remove($interviewer);
        $this->interviewerService->flush();

        return $this->redirectToRoute('interviewers');
    }
}
