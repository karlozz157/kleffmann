<?php

namespace DevTag\KleffmannBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="DevTag\KleffmannBundle\Repository\TrainingRepository")
 * @ORM\Table(name="trainings")
 */
class Training
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
     * @ORM\ManyToMany(targetEntity="Interviewer")
     * @ORM\JoinTable(name="trainings_interviewers",
     *     joinColumns={@ORM\JoinColumn(name="training_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="interviewer_id", referencedColumnName="id")}
     * )
     */
    protected $interviewer;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="date")
     */
    protected $date;

    /**
     * @ORM\Column(type="text")
     */
    protected $address;

    /**
     * @ORM\Column(type="text")
     */
    protected $comments;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->interviewer = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Training
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
     * Set date
     *
     * @param \DateTime $date
     * @return Training
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set address
     *
     * @param string $address
     * @return Training
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set project
     *
     * @param \DevTag\KleffmannBundle\Entity\Project $project
     * @return Training
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
     * Set comments
     *
     * @param string $comments
     * @return Training
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add interviewer
     *
     * @param \DevTag\KleffmannBundle\Entity\Interviewer $interviewer
     * @return Training
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
