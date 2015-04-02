<?php

namespace DevTag\KleffmannBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ManagerRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function findAll()
    {
        $queryBuilder = $this->getEntityManager()
            ->createQueryBuilder();

        $queryBuilder
            ->select('m')
            ->from('DevTag\KleffmannBundle\Entity\Manager', 'm')
            ->orderBy('m.id', 'DESC')
        ;

        return $queryBuilder->getQuery()->getResult();
    }
}
