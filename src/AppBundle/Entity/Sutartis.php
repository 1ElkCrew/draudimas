<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Sutartis
 *
 * @ORM\Table(name="sutartis")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SutartisRepository")
 */
class Sutartis
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firmName", type="string", length=255)
     */
    private $firmName;

    /**
     * @var string
     *
     * @ORM\Column(name="money", type="decimal", precision=19, scale=4)
     */
    private $money;

    /**
     * @ORM\Column(name="inputDate", type="date")
     */
    private $inputDate;

    /**
     * @ORM\Column(name="termin", type="integer")
     */
    private $termin;

    /**
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     */
    private $user;

    /**
     * @ORM\Column(name="city", type="string", nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(name="contractnum", type="string", nullable=true) //ONLY NUMBERS AND DASHES, integer?
     */
    private $contractnum;

    /**
     * @ORM\Column(name="worker", type="string")
     */
    private $worker;

    /// Sets current date in $inputDate field on adding a new object.
    public function __construct(){
        $this->inputDate = new \DateTime();
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set firmName
     *
     * @param string $firmName
     *
     * @return Sutartis
     */
    public function setFirmName($firmName)
    {
        $this->firmName = $firmName;

        return $this;
    }

    /**
     * Get firmName
     *
     * @return string
     */
    public function getFirmName()
    {
        return $this->firmName;
    }

    /**
     * Set money
     *
     * @param string $money
     *
     * @return Sutartis
     */
    public function setMoney($money)
    {
        $this->money = $money;

        return $this;
    }

    /**
     * Get money
     *
     * @return string
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * Set inputDate
     *
     * @param \DateTime $inputDate
     *
     * @return Sutartis
     */
    public function setInputDate($inputDate)
    {
        $this->inputDate = $inputDate;

        return $this;
    }

    /**
     * Get inputDate
     *
     * @return \DateTime
     */
    public function getInputDate()
    {
        return $this->inputDate;
    }

    /**
     * Set termin
     *
     * @param \DateTime $termin
     *
     * @return Sutartis
     */
    public function setTermin($termin)
    {
        $this->termin = $termin;

        return $this;
    }

    /**
     * Get termin
     *
     * @return int
     */
    public function getTermin()
    {
        return $this->termin;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Sutartis
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Sutartis
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Sutartis
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set contractnum
     *
     * @param string $contractnum
     *
     * @return Sutartis
     */
    public function setContractnum($contractnum)
    {
        $this->contractnum = $contractnum;

        return $this;
    }

    /**
     * Get contractnum
     *
     * @return string
     */
    public function getContractnum()
    {
        return $this->contractnum;
    }

    public function getEndDate(){
        $interval = new \DateInterval('P'.$this->termin.'Y');
        $currdate = clone $this->inputDate;
        return $currdate->add($interval);
    }

    /**
     * Set worker
     *
     * @param string $worker
     *
     * @return Sutartis
     */
    public function setWorker($worker)
    {
        $this->worker = $worker;

        return $this;
    }

    /**
     * Get worker
     *
     * @return string
     */
    public function getWorker()
    {
        return $this->worker;
    }
}
