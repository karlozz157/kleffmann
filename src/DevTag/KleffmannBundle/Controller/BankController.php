<?php

namespace DevTag\KleffmannBundle\Controller;

use DevTag\KleffmannBundle\Entity\Bank;
use DevTag\KleffmannBundle\Form\BankType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use DevTag\KleffmannBundle\Service\Aware\BankAware;
/**
 * @Route("/bank", service="kleffmann.bank.controller")
 */
class BankController extends BaseController
{
    use BankAware;

    /**
     * @Route("/list", name="bank_list")
     * @Template()
     *
     * @return array
     */
    public function indexAction()
    {
        $bankList = $this->bankRepository->findAll();

        return ['bankList' => $bankList];
    }

    /**
     * @Route("/new", name="new_bank")
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

            return $this->redirectToRoute('bank_list');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/edit/{id}", name="edit_bank")
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

            return $this->redirectToRoute('bank_list');
        }

        return ['form' => $form->createView()];
    }

    /**
     * @Route("/delete/{id}", name="delete_bank")
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

        return $this->redirectToRoute('bank_list');
    }
}
