<?php

namespace DevTag\KleffmannBundle\Repository;

use Doctrine\ORM\EntityRepository;

class InvoiceRepository extends EntityRepository
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
            ->select('invoice')
            ->from('DevTagKleffmannBundle:Invoice', 'invoice')
            ->orderBy('invoice.id', 'DESC');

        if (is_null($page)) {
            return $queryBuilder
                ->getQuery()->getResult();
        }

        return $this->paginator->paginate($queryBuilder, $page, $this->recordsPerPage);
    }

    /**
     * @param string $fileName
     *
     * @return array
     */
    public function getLastInvoiceByFileName($fileName)
    {
        $queryBuilder = $this->getEntityManager()
            ->createQueryBuilder();

        $queryBuilder
            ->select('i')
            ->from('DevTagKleffmannBundle:Invoice', 'i')
            ->where('i.file LIKE :filename')
            ->setParameter('filename', "$fileName%")
            ->orderBy('i.id', 'DESC');

        return $queryBuilder->getQuery()->setMaxResults(1)->getArrayResult();
    }
}
