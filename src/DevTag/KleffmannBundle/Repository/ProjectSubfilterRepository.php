<?php

namespace DevTag\KleffmannBundle\Repository;

use Doctrine\ORM\EntityRepository;
use DevTag\KleffmannBundle\Entity\ProjectFilter;

class ProjectSubfilterRepository extends EntityRepository
{
    /**
     * @var ProjectFilter $projectFilter
     */
    protected $projectFilter;

    /**
     * @return array
     */
    public function findAll()
    {
        $queryBuilder = $this->getEntityManager()
            ->createQueryBuilder();

        $queryBuilder
            ->select('ps')
            ->from('DevTag\KleffmannBundle\Entity\ProjectSubfilter', 'ps')
            ->where('ps.filter = :filter')
            ->setParameter('filter', $this->projectFilter->getId())
        ;

        return $queryBuilder->getQuery()->getResult();
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
