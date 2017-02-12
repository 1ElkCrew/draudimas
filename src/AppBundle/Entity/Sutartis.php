<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;

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
    private $termin; //TODO: >=5

    // TODO: STATUS

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
     * @return \DateTime
     */
    public function getTermin()
    {
        return $this->termin;
    }
}
