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
 * @Route("/banks", service="kleffmann.bank.controller")
 */
class BankController extends BaseController
{
    use BankAware;

    /**
     * @Route("/", name="banks")
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
     * @Route("/new", name="banks_new")
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
     * @Route("/edit/{id}", name="banks_edit")
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
     * @Route("/delete/{id}", name="banks_delete")
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
