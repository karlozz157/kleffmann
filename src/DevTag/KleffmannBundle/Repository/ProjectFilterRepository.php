<?php

namespace DevTag\KleffmannBundle\Repository;

use Doctrine\ORM\EntityRepository;
use DevTag\KleffmannBundle\Entity\Project;

class ProjectFilterRepository extends EntityRepository
{
    /**
     * @var Project $project
     */
    protected $project;

    /**
     * @return array
     */
    public function findAll()
    {
        $queryBuilder = $this->getEntityManager()
            ->createQueryBuilder();

        $queryBuilder
            ->select('pf')
            ->from('DevTag\KleffmannBundle\Entity\ProjectFilter', 'pf')
            ->where('pf.project = :id_project')
            ->setParameter('id_project', $this->project->getId())
            ->orderBy('pf.id', 'DESC')
        ;

        return $queryBuilder->getQuery()->getResult();
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
