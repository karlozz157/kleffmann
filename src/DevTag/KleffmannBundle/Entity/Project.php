<?php

namespace DevTag\KleffmannBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use DevTag\KleffmannBundle\Entity\Methodology;

/**
 * @ORM\Entity(repositoryClass="DevTag\KleffmannBundle\Repository\ProjectRepository")
 * @ORM\Table(name="projects")
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $name;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\ManyToMany(targetEntity="Interviewer")
     * @ORM\JoinTable(name="projects_interviewers",
     *     joinColumns={@ORM\JoinColumn(name="project_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="interviewer_id", referencedColumnName="id")}
     * )
     */
    protected $interviewer;

    /**
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    protected $customer;

    /**
     * @ORM\ManyToMany(targetEntity="Methodology")
     * @ORM\JoinTable(name="projects_methodologies",
     *     joinColumns={@ORM\JoinColumn(name="project_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="methodology_id", referencedColumnName="id")}
     * )
     */
    protected $methodologies;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $fee;

    /**
     * @ORM\ManyToOne(targetEntity="Status")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    protected $status;

    /**
     * @ORM\ManyToOne(targetEntity="Manager")
     * @ORM\JoinColumn(name="manager_id", referencedColumnName="id")
     */
    protected $manager;

    /**
     * @ORM\ManyToOne(targetEntity="ProjectType")
     * @ORM\JoinColumn(name="project_type_id", referencedColumnName="id")
     */
    protected $projectType;

    /**
     * @ORM\ManyToOne(targetEntity="ProjectTypeUprising")
     * @ORM\JoinColumn(name="project_type_uprising", referencedColumnName="id")
     */
    protected $projectTypeUprising;

    /**
     * @ORM\Column(type="date", name="start_date")
     */
    protected $startDate;

    /**
     * @ORM\Column(type="date", name="estimate_date")
     */
    protected $estimateDate;

    /**
     * @ORM\Column(type="date", name="end_date")
     */
    protected $endDate;

    /**
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;

    public function __construct()
    {
        $this->setCreatedAt(new \DateTime('now'));
        $this->methodologies = new ArrayCollection();
    }

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
     * @return Project
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
     * Set description
     *
     * @param string $description
     * @return Project
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set fee
     *
     * @param string $fee
     * @return Project
     */
    public function setFee($fee)
    {
        $this->fee = $fee;

        return $this;
    }

    /**
     * Get fee
     *
     * @return string 
     */
    public function getFee()
    {
        return $this->fee;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return Project
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set estimateDate
     *
     * @param \DateTime $estimateDate
     * @return Project
     */
    public function setEstimateDate($estimateDate)
    {
        $this->estimateDate = $estimateDate;

        return $this;
    }

    /**
     * Get estimateDate
     *
     * @return \DateTime 
     */
    public function getEstimateDate()
    {
        return $this->estimateDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return Project
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Project
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set customer
     *
     * @param \DevTag\KleffmannBundle\Entity\Customer $customer
     * @return Project
     */
    public function setCustomer(\DevTag\KleffmannBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \DevTag\KleffmannBundle\Entity\Customer 
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set status
     *
     * @param \DevTag\KleffmannBundle\Entity\Status $status
     * @return Project
     */
    public function setStatus(\DevTag\KleffmannBundle\Entity\Status $status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return \DevTag\KleffmannBundle\Entity\Status 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set manager
     *
     * @param \DevTag\KleffmannBundle\Entity\Manager $manager
     * @return Project
     */
    public function setManager(\DevTag\KleffmannBundle\Entity\Manager $manager = null)
    {
        $this->manager = $manager;

        return $this;
    }

    /**
     * Get manager
     *
     * @return \DevTag\KleffmannBundle\Entity\Manager 
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * Set projectType
     *
     * @param \DevTag\KleffmannBundle\Entity\ProjectType $projectType
     * @return Project
     */
    public function setProjectType(\DevTag\KleffmannBundle\Entity\ProjectType $projectType = null)
    {
        $this->projectType = $projectType;

        return $this;
    }

    /**
     * Get projectType
     *
     * @return \DevTag\KleffmannBundle\Entity\ProjectType 
     */
    public function getProjectType()
    {
        return $this->projectType;
    }

    /**
     * Add methodologies
     *
     * @param \DevTag\KleffmannBundle\Entity\Methodology $methodologies
     * @return Project
     */
    public function addMethodology(\DevTag\KleffmannBundle\Entity\Methodology $methodologies)
    {
        $this->methodologies[] = $methodologies;

        return $this;
    }

    /**
     * Remove methodologies
     *
     * @param \DevTag\KleffmannBundle\Entity\Methodology $methodologies
     */
    public function removeMethodology(\DevTag\KleffmannBundle\Entity\Methodology $methodologies)
    {
        $this->methodologies->removeElement($methodologies);
    }

    /**
     * Get methodologies
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMethodologies()
    {
        return $this->methodologies;
    }

    /**
     * Set projectTypeUprising
     *
     * @param \DevTag\KleffmannBundle\Entity\ProjectTypeUprising $projectTypeUprising
     * @return Project
     */
    public function setProjectTypeUprising(\DevTag\KleffmannBundle\Entity\ProjectTypeUprising $projectTypeUprising = null)
    {
        $this->projectTypeUprising = $projectTypeUprising;

        return $this;
    }

    /**
     * Get projectTypeUprising
     *
     * @return \DevTag\KleffmannBundle\Entity\ProjectTypeUprising
     */
    public function getProjectTypeUprising()
    {
        return $this->projectTypeUprising;
    }

    /**
     * Add interviewer
     *
     * @param \DevTag\KleffmannBundle\Entity\Interviewer $interviewer
     * @return Project
     */
    public function addInterviewer(\DevTag\KleffmannBundle\Entity\Interviewer $interviewer)
    {
        $this->interviewer[] = $interviewer;

        return $this;
    }

    /**
     * Remove interviewer
     *
     * @param \DevTag\KleffmannBundle\Entity\Interviewer $interviewer
     */
    public function removeInterviewer(\DevTag\KleffmannBundle\Entity\Interviewer $interviewer)
    {
        $this->interviewer->removeElement($interviewer);
    }

    /**
     * Get interviewer
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getInterviewer()
    {
        return $this->interviewer;
    }
}
