<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Service\Aware\TrainingAware;
use DevTag\KleffmannBundle\Form\TrainingType;
use DevTag\KleffmannBundle\Entity\Training;

/**
 * @Route("/training", service="kleffmann.training.controller")
 */
class TrainingController extends BaseController
{
    use TrainingAware;

    /**
     * @Route("/list", name="training_list")
     * @Template()
     *
     * @return array
     */
    public function indexAction()
    {
        $trainingList = $this->trainingRepository->findAll();

        return ['trainingList' => $trainingList];
    }

    /**
     * @Route("/new", name="new_training")
     * @Template()
     *
     * @param Request $request
     *
     * @return array
     */
    public function newAction(Request $request)
    {
        $training = new Training();
        $form = $this->createForm(new TrainingType(), $training);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->trainingService->save($training);
            $this->trainingService->flush();

            return $this->redirectToRoute('training_list');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/edit/{id}", name="edit_training")
     * @ParamConverter()
     * @Template()
     *
     * @param Training $training
     * @param Request $request
     *
     * @return array
     */
    public function editAction(Training $training, Request $request)
    {
        $form = $this->createForm(new TrainingType(), $training);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->trainingService->save($training);
            $this->trainingService->flush();

            return $this->redirectToRoute('training_list');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/delete/{id}", name="delete_training")
     * @ParamConverter()
     *
     * @param Training $training
     *
     * @return array
     */
    public function deleteAction(Training $training)
    {
        $this->trainingService->remove($training);
        $this->trainingService->flush();

        return $this->redirectToRoute('training_list');
    }
}
