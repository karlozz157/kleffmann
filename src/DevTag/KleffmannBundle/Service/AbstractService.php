<?php

namespace DevTag\KleffmannBundle\Service;

use Doctrine\ORM\EntityManager

abstract class AbstractService
{
    /**
     * @var EntityManager $entityManager
     */
    protected $entityManager;

    /**
     * @return void
     */
    public function flush()
    {
        $this->entityManager->flush();
    }

    /**
     * @param Object $entity
     */
    public function save($entity)
    {
        $this->entityManager->persist($entity);
    }

    /**
     * @param Object $entity
     */
    public function remove($entity)
    {
        $this->entityManager->remove($entity);
    }

    /**
     * @param EntityManager $entityManager
     */
    public function setEntityManager(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }
}
