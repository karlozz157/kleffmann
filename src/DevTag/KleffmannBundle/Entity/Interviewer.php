<?php

namespace DevTag\KleffmannBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="interviewers")
 */
class Interviewer
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="State")
     * @ORM\JoinColumn(name="state_id")
     */
    protected $state;

    /**
     * @ORM\ManyToOne(targetEntity="City")
     * @ORM\JoinColumn(name="city_id")
     */
    protected $city;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string")
     */
    protected $secondName;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $birthday;

    /**
     * @ORM\Column(type="integer", length=3)
     */
    protected $homeAreaCode;

    /**
     * @ORM\Column(type="integer")
     */
    protected $homePhone;

    /**
     * @ORM\Column(type="integer", length=3)
     */
    protected $officeAreaCode;

    /**
     * @ORM\Column(type="integer")
     */
    protected $officePhone;

    /**
     * @ORM\ManyToOne(targetEntity="Bank")
     * @ORM\JoinColumn(name="bank_id", referencedColumnName="id")
     */
    protected $bank;

    /**
     * @ORM\Column(type="integer")
     */
    protected $clabe;

    /**
     * @ORM\Column(type="integer")
     */
    protected $debitCard;

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
     * Set state
     *
     * @param \DevTag\KleffmannBundle\Entity\State $state
     * @return Interviewer
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
     * @return Interviewer
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
     * Set name
     *
     * @param string $name
     * @return Interviewer
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
     * Set firstName
     *
     * @param string $firstName
     * @return Interviewer
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set secondName
     *
     * @param string $secondName
     * @return Interviewer
     */
    public function setSecondName($secondName)
    {
        $this->secondName = $secondName;

        return $this;
    }

    /**
     * Get secondName
     *
     * @return string 
     */
    public function getSecondName()
    {
        return $this->secondName;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return Interviewer
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set homeAreaCode
     *
     * @param integer $homeAreaCode
     * @return Interviewer
     */
    public function setHomeAreaCode($homeAreaCode)
    {
        $this->homeAreaCode = $homeAreaCode;

        return $this;
    }

    /**
     * Get homeAreaCode
     *
     * @return integer 
     */
    public function getHomeAreaCode()
    {
        return $this->homeAreaCode;
    }

    /**
     * Set homePhone
     *
     * @param integer $homePhone
     * @return Interviewer
     */
    public function setHomePhone($homePhone)
    {
        $this->homePhone = $homePhone;

        return $this;
    }

    /**
     * Get homePhone
     *
     * @return integer 
     */
    public function getHomePhone()
    {
        return $this->homePhone;
    }

    /**
     * Set officeAreaCode
     *
     * @param integer $officeAreaCode
     * @return Interviewer
     */
    public function setOfficeAreaCode($officeAreaCode)
    {
        $this->officeAreaCode = $officeAreaCode;

        return $this;
    }

    /**
     * Get officeAreaCode
     *
     * @return integer 
     */
    public function getOfficeAreaCode()
    {
        return $this->officeAreaCode;
    }

    /**
     * Set officePhone
     *
     * @param integer $officePhone
     * @return Interviewer
     */
    public function setOfficePhone($officePhone)
    {
        $this->officePhone = $officePhone;

        return $this;
    }

    /**
     * Get officePhone
     *
     * @return integer
     */
    public function getOfficePhone()
    {
        return $this->officePhone;
    }

    /**
     * Set clabe
     *
     * @param integer $clabe
     * @return Interviewer
     */
    public function setClabe($clabe)
    {
        $this->clabe = $clabe;

        return $this;
    }

    /**
     * Get clabe
     *
     * @return integer 
     */
    public function getClabe()
    {
        return $this->clabe;
    }

    /**
     * Set debitCard
     *
     * @param integer $debitCard
     * @return Interviewer
     */
    public function setDebitCard($debitCard)
    {
        $this->debitCard = $debitCard;

        return $this;
    }

    /**
     * Get debitCard
     *
     * @return integer 
     */
    public function getDebitCard()
    {
        return $this->debitCard;
    }

    /**
     * Set bank
     *
     * @param \DevTag\KleffmannBundle\Entity\Bank $bank
     * @return Interviewer
     */
    public function setBank(\DevTag\KleffmannBundle\Entity\Bank $bank = null)
    {
        $this->bank = $bank;

        return $this;
    }

    /**
     * Get bank
     *
     * @return \DevTag\KleffmannBundle\Entity\Bank 
     */
    public function getBank()
    {
        return $this->bank;
    }
}
