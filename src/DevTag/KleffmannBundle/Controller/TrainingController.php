<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Controller\Mapped\AbstractController;
use DevTag\KleffmannBundle\Service\Aware\TrainingAware;
use DevTag\KleffmannBundle\Form\TrainingType;
use DevTag\KleffmannBundle\Entity\Training;

/**
 * @Route("/capacitaciones", service="kleffmann.training.controller")
 */
class TrainingController extends AbstractController
{
    use TrainingAware;

    /**
     * @var array $roles
     */
    protected $roles = ['ROLE_ADMIN'];

    /**
     * @Route("/", name="trainings")
     * @Template()
     *
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $page = $request->query->get('page', 1);
        $trainings = $this->trainingRepository->findAll($page);

        return ['trainings' => $trainings];
    }

    /**
     * @Route("/nuevo", name="trainings_new")
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

            return $this->redirectToRoute('trainings');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/editar/{id}", name="trainings_edit")
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

            return $this->redirectToRoute('trainings');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/eliminar/{id}", name="trainings_delete")
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

        return $this->redirectToRoute('trainings');
    }
}
