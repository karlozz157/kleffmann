<?php

namespace DevTag\KleffmannBundle\Repository;

use Doctrine\ORM\EntityRepository;

class InvoiceRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function findAll()
    {
        $queryBuilder = $this->getEntityManager()
            ->createQueryBuilder();

        $queryBuilder
            ->select('invoice')
            ->from('DevTag\KleffmannBundle\Entity\Invoice', 'invoice')
            ->orderBy('invoice.id', 'DESC')
        ;

        return $queryBuilder->getQuery()->getResult();
    }
}
