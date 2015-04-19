<?php

namespace DevTag\KleffmannBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use DevTag\KleffmannBundle\Repository\CityRepository;
use DevTag\KleffmannBundle\Entity\State;

/**
 * @Route("/cities", service="kleffmann.city.controller")
 */
class CityController
{
    /**
     * @var CityRepository $cityRepository
     */
    protected $cityRepository;

    /**
     * @Route("/webservice/find-by-state/{state}")
     * @ParamConverter()
     *
     * @param State $state
     *
     * @return JsonResponse
     */
    public function findByStateAction(State $state)
    {
        $cities = $this->cityRepository->findAllByStateAsArray($state);

        return new JsonResponse($cities);
    }

    /**
     * @param CityRepository $cityRepository
     */
    public function setCityRepository(CityRepository $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    /**
     * @return CityRepository
     */
    public function getCityRepository()
    {
        return $this->cityRepository;
    }
}
