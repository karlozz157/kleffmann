<?php

namespace DevTag\KleffmannBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="DevTag\KleffmannBundle\Repository\ProjectSubfilterRepository")
 * @ORM\Table(name="project_subfilters")
 */
class ProjectSubfilter
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="ProjectFilter")
     * @ORM\JoinColumn(name="filter_id", referencedColumnName="id")
     */
    protected $filter;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $value;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return ProjectSubfilter
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return ProjectSubfilter
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set filter
     *
     * @param \DevTag\KleffmannBundle\Entity\ProjectFilter $filter
     * @return ProjectSubfilter
     */
    public function setFilter(\DevTag\KleffmannBundle\Entity\ProjectFilter $filter = null)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * Get filter
     *
     * @return \DevTag\KleffmannBundle\Entity\ProjectFilter 
     */
    public function getFilter()
    {
        return $this->filter;
    }
}
