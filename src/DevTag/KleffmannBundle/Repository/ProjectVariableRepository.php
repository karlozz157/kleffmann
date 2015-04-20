<?php

namespace DevTag\KleffmannBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ProjectVariableRepository extends EntityRepository
{
    use PaginatorAware;

    /**
     * @param int $page
     * @param array $options
     *
     * @return array
     */
    public function findAll($page = null, array $options = null)
    {
        $queryBuilder = $this->getEntityManager()
            ->createQueryBuilder();

        $queryBuilder
            ->select('pv')
            ->from('DevTagKleffmannBundle:ProjectVariable', 'pv')
            ->where('pv.project = :project')
            ->setParameter('project', $options['project'])
            ->orderBy('pv.id', 'DESC');

        if (is_null($page)) {
            return $queryBuilder
                ->getQuery()->getResult();
        }

        return $this->paginator->paginate($queryBuilder, $page, $this->recordsPerPage);
    }
}
