<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Controller\Mapped\AbstractController;
use DevTag\KleffmannBundle\Service\Aware\BankAware;
use DevTag\KleffmannBundle\Form\BankType;
use DevTag\KleffmannBundle\Entity\Bank;

/**
 * @Route("/bancos", service="kleffmann.bank.controller")
 */
class BankController extends AbstractController
{
    use BankAware;

    /**
     * @var array $roles
     */
    protected $roles = ['ROLE_ADMIN'];

    /**
     * @Route("/", name="banks")
     * @Template()
     *
     * @param Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $page = $request->query->get('page', 1);
        $banks = $this->bankRepository->findAll($page);

        return ['banks' => $banks];
    }

    /**
     * @Route("/nuevo", name="banks_new")
     * @Template()
     *
     * @param Request $request
     *
     * @return array
     */
    public function newAction(Request $request)
    {
        $bank = new Bank();
        $form = $this->createForm(new BankType(), $bank);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->bankService->save($bank);
            $this->bankService->flush();

            return $this->redirectToRoute('banks');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/editar/{id}", name="banks_edit")
     * @Template()
     *
     * @param Bank $bank
     * @param Request $request
     *
     * @return array
     */
    public function editAction(Bank $bank, Request $request)
    {
        $form = $this->createForm(new BankType(), $bank);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->bankService->save($bank);
            $this->bankService->flush();

            return $this->redirectToRoute('banks');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/eliminar/{id}", name="banks_delete")
     * @ParamConverter()
     *
     * @param Bank $bank
     *
     * @return array
     */
    public function deleteAction(Bank $bank)
    {
        $this->bankService->remove($bank);
        $this->bankService->flush();

        return $this->redirectToRoute('banks');
    }
}
