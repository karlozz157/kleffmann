<?php

namespace DevTag\KleffmannBundle\Repository;

use Doctrine\ORM\EntityRepository;
use DevTag\KleffmannBundle\Entity\Interviewer;

class InterviewerZoneRepository extends EntityRepository
{
    /**
     * @var Interviewer $interviewer
     */
    protected $interviewer;

    /**
     * @return array
     */
    public function findAll()
    {
        $queryBuilder = $this->getEntityManager()
            ->createQueryBuilder();

        $queryBuilder
            ->select('iz')
            ->from('DevTag\KleffmannBundle\Entity\InterviewerZone', 'iz')
            ->where('iz.interviewer = :interviewer')
            ->setParameter('interviewer', $this->interviewer->getId())
            ->orderBy('iz.id', 'DESC')
        ;

        return $queryBuilder->getQuery()->getResult();
    }

    /**
     * @param Interviewer $interviewer
     */
    public function setInterviewer(Interviewer $interviewer)
    {
        $this->interviewer = $interviewer;
    }
}
