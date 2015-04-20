<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Service\Aware\InterviewerZoneAware;
use DevTag\KleffmannBundle\Form\InterviewerZoneType;
use DevTag\KleffmannBundle\Entity\InterviewerZone;
use DevTag\KleffmannBundle\Entity\Interviewer;

/**
 * @Route("/interviewer-zones", service="kleffmann.interviewer_zone.controller")
 */
class InterviewerZoneController extends BaseController
{
    use InterviewerZoneAware;

    /**
     * @Route("/{interviewer}", name="interviewer_zones")
     * @ParamConverter()
     * @Template()
     *
     * @param Interviewer $interviewer
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(Interviewer $interviewer, Request $request)
    {
        $page = $request->query->get('page', 1);
        $this->interviewerZoneRepository->setInterviewer($interviewer);
        $interviewerZones = $this->interviewerZoneRepository->findAll($page);

        return ['interviewerZones' => $interviewerZones, 'interviewer' => $interviewer];
    }

    /**
     * @Route("/new/{interviewer}", name="interviewer_zones_add")
     * @ParamConverter()
     * @Template()
     *
     * @param Interviewer $interviewer
     * @param Request $request
     *
     * @return array
     */
    public function newAction(Interviewer $interviewer, Request $request)
    {
        $interviewerZone = new InterviewerZone();
        $interviewerZone->setInterviewer($interviewer);
        $form = $this->createForm(new InterviewerZoneType(), $interviewerZone);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->interviewerZoneService->save($interviewerZone);
            $this->interviewerZoneService->flush();

            return $this->redirectToRoute('interviewer_zones', ['interviewer' => $interviewer->getId()]);
        }

        return ['form' => $form->createView(), 'interviewer' => $interviewer];
    }

    /**
     * @Route("/edit/{id}", name="interviewer_zones_edit")
     * @ParamConverter()
     * @Template()
     *
     * @param InterviewerZone $interviewerZone
     * @param Request $request
     *
     * @return array
     */
    public function editAction(InterviewerZone $interviewerZone, Request $request)
    {
        $form = $this->createForm(new InterviewerZoneType(), $interviewerZone);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->interviewerZoneService->save($interviewerZone);
            $this->interviewerZoneService->flush();

            return $this->redirectToRoute('interviewer_zones', [
                'interviewer' => $interviewerZone->getInterviewer()->getId()
            ]);
        }

        return ['form' => $form->createView(), 'interviewer' => $interviewerZone->getInterviewer()];
    }

    /**
     * @Route("/delete/{id}", name="interviewer_zones_delete")
     * @ParamConverter()
     * @Template()
     *
     * @param InterviewerZone $interviewerZone
     *
     * @return array
     */
    public function deleteAction(InterviewerZone $interviewerZone)
    {
        $this->interviewerZoneService->remove($interviewerZone);
        $this->interviewerZoneService->flush();

        return $this->redirectToRoute('interviewer_zones', [
            'interviewer' => $interviewerZone->getInterviewer()->getId()
        ]);
    }
}