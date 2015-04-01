<?php

namespace DevTag\KleffmannBundle\Repository;

use Doctrine\ORM\EntityRepository;

class InterviewerRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function findAll()
    {
        $queryBuilder = $this->getEntityManager()
            ->createQueryBuilder();

        $queryBuilder
            ->select('i')
            ->from('DevTag\KleffmannBundle\Entity\Interviewer', 'i')
            ->orderBy('i.id', 'DESC')
        ;

        return $queryBuilder->getQuery()->getResult();
    }
}
