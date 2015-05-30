<?php

namespace DevTag\KleffmannBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="DevTag\KleffmannBundle\Repository\InterviewerZoneRepository")
 * @ORM\Table(name="interviewer_zones")
 */
class InterviewerZone
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Interviewer")
     * @ORM\JoinColumn(name="interviewer_id", referencedColumnName="id")
     */
    protected $interviewer;

    /**
     * @ORM\ManyToOne(targetEntity="State")
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     */
    protected $state;

    /**
     * @ORM\ManyToMany(targetEntity="City")
     * @ORM\JoinTable(name="interviewer_zones_cities",
     *     joinColumns={@ORM\JoinColumn(name="interviewer_zone_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="cities_id", referencedColumnName="id")}
     * )
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
     * Set interviewer
     *
     * @param \DevTag\KleffmannBundle\Entity\Interviewer $interviewer
     * @return InterviewerZone
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
     * @return InterviewerZone
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
     * Constructor
     */
    public function __construct()
    {
        $this->city = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add city
     *
     * @param \DevTag\KleffmannBundle\Entity\City $city
     * @return InterviewerZone
     */
    public function addCity(\DevTag\KleffmannBundle\Entity\City $city)
    {
        $this->city[] = $city;

        return $this;
    }

    /**
     * Remove city
     *
     * @param \DevTag\KleffmannBundle\Entity\City $city
     */
    public function removeCity(\DevTag\KleffmannBundle\Entity\City $city)
    {
        $this->city->removeElement($city);
    }

    /**
     * Get city
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCity()
    {
        return $this->city;
    }
}
