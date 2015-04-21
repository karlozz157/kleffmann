<?php

namespace DevTag\KleffmannBundle\Repository;

use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\EntityRepository;
use DevTag\KleffmannBundle\Entity\State;
use DevTag\KleffmannBundle\Entity\City;

class CityRepository extends EntityRepository
{
    /**
     * @param State $state
     *
     * @return array
     */
    public function findAllByStateAsArray(State $state)
    {
        $queryBuilder = $this->getEntityManager()
            ->createQueryBuilder();

        $queryBuilder
            ->select('c.id', 'c.name')
            ->from('DevTagKleffmannBundle:City', 'c')
            ->where('c.state = :state')
            ->setParameter('state', $state);

        return $queryBuilder->getQuery()->getArrayResult();
    }

    /**
     * @param string $cityName
     * @param string $stateName
     *
     * @return City
     *
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function findOneByCityAndState($cityName, $stateName)
    {
        $queryBuilder = $this->getEntityManager()
            ->createQueryBuilder();

        $queryBuilder
            ->select('c, s')
            ->from('DevTagKleffmannBundle:City', 'c')
            ->join('c.state', 's')
            ->where('c.name = :city_name')
            ->andWhere('s.name = :state_name')
            ->setParameters([
                'city_name' => $cityName,
                'state_name' => $stateName,
            ]);

        return $queryBuilder->getQuery()->getSingleResult();
    }
}
