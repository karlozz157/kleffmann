<?php

namespace DevTag\KleffmannBundle\Repository;

use Doctrine\ORM\EntityRepository;

class InterviewerRepository extends EntityRepository
{
    use PaginatorAware;

    /**
     * @param int $page
     *
     * @return array
     */
    public function findAll($page = null)
    {
        $queryBuilder = $this->getEntityManager()
            ->createQueryBuilder();

        $queryBuilder
            ->select('i')
            ->from('DevTagKleffmannBundle:Interviewer', 'i')
            ->orderBy('i.id', 'DESC');

        if (is_null($page)) {
            return $queryBuilder
                ->getQuery()->getResult();
        }

        return $this->paginator->paginate($queryBuilder, $page, $this->recordsPerPage);
    }
}
