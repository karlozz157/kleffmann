<?php

namespace DevTag\KleffmannBundle\Repository;

use Doctrine\ORM\EntityRepository;
use DevTag\KleffmannBundle\Entity\State;

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
            ->from('DevTag\KleffmannBundle\Entity\City', 'c')
            ->where('c.state = :state')
            ->setParameter('state', $state->getId());

        return $queryBuilder->getQuery()->getArrayResult();
    }
}
