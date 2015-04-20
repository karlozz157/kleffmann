<?php

namespace DevTag\KleffmannBundle\Repository;

use Doctrine\ORM\EntityRepository;
use DevTag\KleffmannBundle\Entity\Interviewer;

class InterviewerZoneRepository extends EntityRepository
{
    use PaginatorAware;

    /**
     * @var Interviewer $interviewer
     */
    protected $interviewer;

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
            ->select('iz')
            ->from('DevTagKleffmannBundle:InterviewerZone', 'iz')
            ->where('iz.interviewer = :interviewer')
            ->setParameter('interviewer', $this->interviewer->getId())
            ->orderBy('iz.id', 'DESC');

        if (is_null($page)) {
            return $queryBuilder
                ->getQuery()->getResult();
        }

        return $this->paginator->paginate($queryBuilder, $page, $this->recordsPerPage);
    }

    /**
     * @param Interviewer $interviewer
     */
    public function setInterviewer(Interviewer $interviewer)
    {
        $this->interviewer = $interviewer;
    }
}
