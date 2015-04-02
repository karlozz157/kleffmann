<?php

namespace DevTag\KleffmannBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CustomerRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function findAll()
    {
        $queryBuilder = $this->getEntityManager()
            ->createQueryBuilder();

        $queryBuilder
            ->select('c')
            ->from('DevTag\KleffmannBundle\Entity\Customer', 'c')
            ->orderBy('c.id', 'DESC')
        ;

        return $queryBuilder->getQuery()->getResult();
    }
}
