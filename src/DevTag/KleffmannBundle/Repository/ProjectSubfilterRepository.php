<?php

namespace DevTag\KleffmannBundle\Repository;

use Doctrine\ORM\EntityRepository;
use DevTag\KleffmannBundle\Entity\ProjectFilter;

class ProjectSubfilterRepository extends EntityRepository
{
    use PaginatorAware;

    /**
     * @var ProjectFilter $projectFilter
     */
    protected $projectFilter;

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
            ->select('ps')
            ->from('DevTagKleffmannBundle:ProjectSubfilter', 'ps')
            ->where('ps.filter = :filter')
            ->setParameter('filter', $this->projectFilter->getId());

        if (is_null($page)) {
            return $queryBuilder
                ->getQuery()->getResult();
        }

        return $this->paginator->paginate($queryBuilder, $page, $this->recordsPerPage);
    }

    /**
     * @param ProjectFilter $projectFilter
     */
    public function setProjectFilter(ProjectFilter $projectFilter)
    {
        $this->projectFilter = $projectFilter;
    }

    /**
     * @return ProjectFilter
     */
    public function getProjectFilter()
    {
        return $this->projectFilter;
    }
}
