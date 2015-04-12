<?php

namespace DevTag\KleffmannBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="DevTag\KleffmannBundle\Repository\ProjectFilterRepository")
 * @ORM\Table(name="project_filters")
 */
class ProjectFilter
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Project")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    protected $project;

    /**
     * @ORM\ManyToOne(targetEntity="Interviewer")
     * @ORM\JoinColumn(name="interviewer_id", referencedColumnName="id")
     */
    protected $interviewer;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $value;

    /**
     * @ORM\ManyToOne(targetEntity="State")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     */
    protected $state;

    /**
     * @ORM\ManyToOne(targetEntity="District")
     * @ORM\JoinColumn(name="district_id", referencedColumnName="id")
     */
    protected $district;

    /**
     * @ORM\ManyToOne(targetEntity="City")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     */
    protected $city;

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
     * @return ProjectFilter
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
     * @return ProjectFilter
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
     * Set project
     *
     * @param \DevTag\KleffmannBundle\Entity\Project $project
     * @return ProjectFilter
     */
    public function setProject(\DevTag\KleffmannBundle\Entity\Project $project = null)
    {
        $this->project = $project;

        return $this;
    }

    /**
     * Get project
     *
     * @return \DevTag\KleffmannBundle\Entity\Project 
     */
    public function getProject()
    {
        return $this->project;
    }

    /**
     * Set interviewer
     *
     * @param \DevTag\KleffmannBundle\Entity\Interviewer $interviewer
     * @return ProjectFilter
     */
    public function setInterviewer(\DevTag\KleffmannBundle\Entity\Interviewer $interviewer = null)
    {
        $this->interviewer = $interviewer;

        return $this;
    }

    /**
     * Get interviewer
     *
     * @return \DevTag\KleffmannBundle\Entity\Interviewer 
     */
    public function getInterviewer()
    {
        return $this->interviewer;
    }

    /**
     * Set state
     *
     * @param \DevTag\KleffmannBundle\Entity\State $state
     * @return ProjectFilter
     */
    public function setState(\DevTag\KleffmannBundle\Entity\State $state = null)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return \DevTag\KleffmannBundle\Entity\State 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set city
     *
     * @param \DevTag\KleffmannBundle\Entity\City $city
     * @return ProjectFilter
     */
    public function setCity(\DevTag\KleffmannBundle\Entity\City $city = null)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return \DevTag\KleffmannBundle\Entity\City 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set district
     *
     * @param \DevTag\KleffmannBundle\Entity\District $district
     * @return ProjectFilter
     */
    public function setDistrict(\DevTag\KleffmannBundle\Entity\District $district = null)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get district
     *
     * @return \DevTag\KleffmannBundle\Entity\District 
     */
    public function getDistrict()
    {
        return $this->district;
    }
}
