<?php

namespace DevTag\KleffmannBundle\Repository;

use Doctrine\ORM\EntityRepository;
use DevTag\KleffmannBundle\Entity\Project;

class ProjectFilterRepository extends EntityRepository
{
    use PaginatorAware;

    /**
     * @var Project $project
     */
    protected $project;

    /**
     * @param int $page
     * @param array $options
     *
     * @return array
     */
    public function findAll($page = null, array $options = [])
    {
        $queryBuilder = $this->getEntityManager()
            ->createQueryBuilder();

        $queryBuilder
            ->select('pf')
            ->from('DevTagKleffmannBundle:ProjectFilter', 'pf')
            ->where('pf.projectVariable = :project_variable')
            ->setParameter('project_variable', $options['project_variable'])
            ->orderBy('pf.id', 'DESC');

        if (is_null($page)) {
            return $queryBuilder
                ->getQuery()->getResult();
        }

        return $this->paginator->paginate($queryBuilder, $page, $this->recordsPerPage);
    }
}
