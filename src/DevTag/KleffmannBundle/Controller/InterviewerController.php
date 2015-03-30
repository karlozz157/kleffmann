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
 * @Route("/interviewer", service="kleffmann.interviewer.controller")
 */
class InterviewerController extends BaseController
{
    use InterviewerAware;

    /**
     * @Route("/list", name="interviewer_list")
     * @Template()
     *
     * @return array
     */
    public function indexAction()
    {
        return [];
    }

    /**
     * @Route("/new")
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

            return $this->redirectToRoute('interviewer_list');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/edit/{id}")
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

            return $this->redirectToRoute('interviewer_list');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/delete/{id}")
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

        return $this->redirectToRoute('interviewer_list');
    }
}
