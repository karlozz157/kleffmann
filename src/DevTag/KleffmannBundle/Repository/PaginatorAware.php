<?php

namespace DevTag\KleffmannBundle\Repository;

use Knp\Component\Pager\Paginator;

trait PaginatorAware
{
    /**
     * @var Paginator $paginator
     */
    protected $paginator;

    /**
     * @var int $recordsPerPage
     */
    protected $recordsPerPage;

    /**
     * @param Paginator $paginator
     */
    public function setPaginator(Paginator $paginator)
    {
        $this->paginator = $paginator;
    }

    /**
     * @return Paginator
     */
    public function getPaginator()
    {
        return $this->paginator;
    }

    /**
     * @param int $recordsPerPage
     */
    public function setRecordsPerPage($recordsPerPage)
    {
        $this->recordsPerPage = $recordsPerPage;
    }

    /**
     * @return int
     */
    public function getRecordsPerPage()
    {
        return $this->recordsPerPage;
    }
}
