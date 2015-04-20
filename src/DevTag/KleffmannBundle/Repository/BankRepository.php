<?php

namespace DevTag\KleffmannBundle\Repository;

use Doctrine\ORM\EntityRepository;

class BankRepository extends EntityRepository
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
            ->select('b')
            ->from('DevTagKleffmannBundle:Bank', 'b')
            ->orderBy('b.id', 'DESC');

        if (is_null($page)) {
            return $queryBuilder
                ->getQuery()->getResult();
        }

        return $this->paginator->paginate($queryBuilder, $page, $this->recordsPerPage);
    }
}
