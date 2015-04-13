<?php

namespace DevTag\KleffmannBundle\Repository;

use Doctrine\ORM\EntityRepository;
use DevTag\KleffmannBundle\Entity\State;

class CityRepository extends EntityRepository
{
    /**
     * @var State $state
     */
    protected $state;

    /**
     * @return array
     */
    public function findByState()
    {
        $queryBuilder = $this->getEntityManager()
            ->createQueryBuilder();

        $queryBuilder
            ->select('c.id', 'c.name')
            ->from('DevTag\KleffmannBundle\Entity\City', 'c')
            ->where('c.state = :state')
            ->setParameter('state', $this->state->getId())
        ;

        return $queryBuilder->getQuery()->getArrayResult();
    }

    /**
     * @param State $state
     */
    public function setState(State $state)
    {
        $this->state = $state;
    }

    /**
     * @return State
     */
    public function getState()
    {
        return $this->state;
    }
}
