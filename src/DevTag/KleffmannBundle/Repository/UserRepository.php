<?php

namespace DevTag\KleffmannBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    use PaginatorAware;

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
            ->select('u')
            ->from('DevTagKleffmannBundle:User', 'u')
            ->orderBy('u.id', 'DESC');

        if (is_null($page)) {
            return $queryBuilder
                ->getQuery()->getResult();
        }

        return $this->paginator->paginate($queryBuilder, $page, $this->recordsPerPage);
    }

    /**
     * @return array
     */
    public function findAllByRoleAdmin()
    {
        $queryBuilder = $this->getEntityManager()
            ->createQueryBuilder();

        $queryBuilder
            ->select('u')
            ->from('DevTagKleffmannBundle:User', 'u')
            ->where('u.roles LIKE :roles')
            ->setParameter('roles', '%admin%');

        return $queryBuilder->getQuery()->getResult();
    }
}
