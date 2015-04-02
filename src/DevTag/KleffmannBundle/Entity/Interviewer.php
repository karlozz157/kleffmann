<?php

namespace DevTag\KleffmannBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="DevTag\KleffmannBundle\Repository\InterviewerRepository")
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
     * @ORM\JoinColumn(name="state_id", referencedColumnName="id")
     */
    protected $state;

    /**
     * @ORM\ManyToOne(targetEntity="City")
     * @ORM\JoinColumn(name="city_id", referencedColumnName="id")
     */
    protected $city;

    /**
     * @ORM\ManyToOne(targetEntity="District")
     * @ORM\JoinColumn(name="district_id", referencedColumnName="id")
     */
    protected $district;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $name;

    /**
     * @ORM\Column(type="string", name="first_name", length=45)
     */
    protected $firstName;

    /**
     * @ORM\Column(type="string", name="second_name", length=45)
     */
    protected $secondName;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $birthday;

    /**
     * @ORM\Column(type="string", name="home_area_code", length=4)
     */
    protected $homeAreaCode;

    /**
     * @ORM\Column(type="string", name="home_phone", length=10)
     */
    protected $homePhone;

    /**
     * @ORM\Column(type="string", name="office_area_code", length=4)
     */
    protected $officeAreaCode;

    /**
     * @ORM\Column(type="string", name="office_phone", length=10)
     */
    protected $officePhone;

    /**
     * @ORM\Column(type="string", name="cell_area_code", length=4)
     */
    protected $cellAreaCode;

    /**
     * @ORM\Column(type="string", name="cell_phone", length=10)
     */
    protected $cellPhone;

    /**
     * @ORM\ManyToOne(targetEntity="Bank")
     * @ORM\JoinColumn(name="bank_id", referencedColumnName="id")
     */
    protected $bank;

    /**
     * @ORM\Column(type="string", length=18)
     */
    protected $clabe;

    /**
     * @ORM\Column(type="integer", name="debit_card", length=16)
     */
    protected $debitCard;

    /**
     * @ORM\Column(type="integer", name="   bank_account", length=12)
     */
    protected $bankAccount;

    /**
     * @ORM\Column(type="string", length=45)
     */
    protected $email;

    /**
     * @ORM\Column(type="text")
     */
    protected $observation;

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

    /**
     * Set cellAreaCode
     *
     * @param string $cellAreaCode
     * @return Interviewer
     */
    public function setCellAreaCode($cellAreaCode)
    {
        $this->cellAreaCode = $cellAreaCode;

        return $this;
    }

    /**
     * Get cellAreaCode
     *
     * @return string
     */
    public function getCellAreaCode()
    {
        return $this->cellAreaCode;
    }

    /**
     * Set cellPhone
     *
     * @param string $cellPhone
     * @return Interviewer
     */
    public function setCellPhone($cellPhone)
    {
        $this->cellPhone = $cellPhone;

        return $this;
    }

    /**
     * Get cellPhone
     *
     * @return string
     */
    public function getCellPhone()
    {
        return $this->cellPhone;
    }

    /**
     * Set bankAccount
     *
     * @param integer $bankAccount
     * @return Interviewer
     */
    public function setBankAccount($bankAccount)
    {
        $this->bankAccount = $bankAccount;

        return $this;
    }

    /**
     * Get bankAccount
     *
     * @return integer
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Interviewer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set observation
     *
     * @param string $observation
     * @return Interviewer
     */
    public function setObservation($observation)
    {
        $this->observation = $observation;

        return $this;
    }

    /**
     * Get observation
     *
     * @return string
     */
    public function getObservation()
    {
        return $this->observation;
    }

    /**
     * Set district
     *
     * @param \DevTag\KleffmannBundle\Entity\District $district
     * @return Interviewer
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
