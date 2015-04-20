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
     *
     * @return array
     */
    public function findAll($page = null)
    {
        $queryBuilder = $this->getEntityManager()
            ->createQueryBuilder();

        $queryBuilder
            ->select('pf')
            ->from('DevTagKleffmannBundle:ProjectFilter', 'pf')
            ->where('pf.project = :id_project')
            ->setParameter('id_project', $this->project->getId())
            ->orderBy('pf.id', 'DESC');

        if (is_null($page)) {
            return $queryBuilder
                ->getQuery()->getResult();
        }

        return $this->paginator->paginate($queryBuilder, $page, $this->recordsPerPage);
    }

    /**
     * @param Project $project
     */
    public function setProject(Project $project)
    {
        $this->project = $project;
    }

    /**
     * @return Project
     */
    public function getProject()
    {
        return $this->project;
    }
}
