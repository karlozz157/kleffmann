<?php

namespace DevTag\KleffmannBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProjectRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function findAll()
    {
        $queryBuilder = $this->getEntityManager()
            ->createQueryBuilder();

        $queryBuilder
            ->select('p')
            ->from('DevTag\KleffmannBundle\Entity\Project', 'p')
            ->orderBy('p.id', 'DESC')
        ;

        return $queryBuilder->getQuery()->getResult();
    }
}
