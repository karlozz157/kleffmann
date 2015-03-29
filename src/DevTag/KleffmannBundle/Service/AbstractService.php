<?php

namespace DevTag\KleffmannBundle\Service;

use Doctrine\ORM\EntityManager;

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
     * @param $entity
     */
    public function save($entity)
    {
        $this->entityManager->persist($entity);
    }

    /**
     * @param $entity
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

    /**
     * @return EntityManager
     */
    public function getEntityManager()
    {
        return $this->entityManager;
    }
}
