<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Worker
 *
 * @ORM\Table(name="worker")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WorkerRepository")
 */
class Worker
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
     * @ORM\Column(name="worker", type="string", length=255)
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Sutartis")
     */
    private $worker;


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
     * Set worker
     *
     * @param string $worker
     *
     * @return Worker
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

    public function __toString(){
        return $this->worker;
    }
}
