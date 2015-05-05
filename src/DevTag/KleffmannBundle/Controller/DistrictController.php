<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use DevTag\KleffmannBundle\Repository\DistrictRepository;
use DevTag\KleffmannBundle\Entity\State;

/**
 * @Route("/distritos", service="kleffmann.district.controller")
 */
class DistrictController
{
    /**
     * @var DistrictRepository $districtRepository
     */
    protected $districtRepository;

    /**
     * @Route("/webservice/buscar-por-estado/{state}")
     * @ParamConverter()
     *
     * @param State $state
     *
     * @return array
     */
    public function findByStateAction(State $state)
    {
        $districts = $this->districtRepository->findAllByStateAsArray($state);

        return new JsonResponse($districts);
    }

    /**
     * @param DistrictRepository $districtRepository
     */
    public function setDistrictRepository(DistrictRepository $districtRepository)
    {
        $this->districtRepository = $districtRepository;
    }
}
