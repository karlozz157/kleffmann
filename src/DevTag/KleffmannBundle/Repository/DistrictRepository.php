<?php

namespace DevTag\KleffmannBundle\Repository;

use Doctrine\ORM\EntityRepository;
use DevTag\KleffmannBundle\Entity\State;

class DistrictRepository extends EntityRepository
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
            ->select('d')
            ->from('DevTagKleffmannBundle:District', 'd')
            ->where('d.state = :state')
            ->setParameter('state', $state);

        return $queryBuilder->getQuery()->getArrayResult();
    }
}
