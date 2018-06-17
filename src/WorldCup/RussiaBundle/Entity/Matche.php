<?php

namespace WorldCup\RussiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matche
 *
 * @ORM\Table(name="matche")
 * @ORM\Entity(repositoryClass="WorldCup\RussiaBundle\Repository\MatcheRepository")
 */
class Matche
{
    /**
     * @ORM\ManyToOne(targetEntity="WorldCup\RussiaBundle\Entity\Groupe", inversedBy="id" )
     * @ORM\JoinColumn(nullable=true)
     */
    private $groupe;

    /**
     * @return mixed
     */
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * @param mixed $groupe
     */
    public function setGroupe($groupe)
    {
        $this->groupe = $groupe;
    }
    /**
     * @return mixed
     */
    public function getEquipeA()
    {
        return $this->equipeA;
    }

    /**
     * @param mixed $equipeA
     */
    public function setEquipeA($equipeA)
    {
        $this->equipeA = $equipeA;
    }

    /**
     * @return mixed
     */
    public function getEquipeB()
    {
        return $this->equipeB;
    }

    /**
     * @param mixed $equipeB
     */
    public function setEquipeB($equipeB)
    {
        $this->equipeB = $equipeB;
    }
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="WorldCup\RussiaBundle\Entity\Stade", inversedBy="id")
     * @ORM\JoinColumn(nullable=true)
     */
    private $stade;

    /**
     * @ORM\ManyToOne(targetEntity="WorldCup\RussiaBundle\Entity\Equipe", inversedBy="id")
     * @ORM\JoinColumn(nullable=true)
     */
    private $equipeA;

    /**
     * @ORM\ManyToOne(targetEntity="WorldCup\RussiaBundle\Entity\Equipe", inversedBy="id")
     * @ORM\JoinColumn(nullable=true)
     */
    private $equipeB;
    /**
     * @ORM\OneToOne(targetEntity=StaffeArbitre::class, cascade={"persist", "remove"})
     */
    private $staffe_arbitre;

    /**
     * @return mixed
     */
    public function getStaffeArbitre()
    {
        return $this->staffe_arbitre;
    }

    /**
     * @param mixed $staffe_arbitre
     */
    public function setStaffeArbitre($staffe_arbitre)
    {
        $this->staffe_arbitre = $staffe_arbitre;
    }
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="phase", type="string", length=255)
     */
    private $phase;


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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Matche
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
     * Set etat
     *
     * @param string $etat
     *
     * @return Matche
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    
        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set phase
     *
     * @param string $phase
     *
     * @return Matche
     */
    public function setPhase($phase)
    {
        $this->phase = $phase;
    
        return $this;
    }

    /**
     * Get phase
     *
     * @return string
     */
    public function getPhase()
    {
        return $this->phase;
    }

    /**
     * @return mixed
     */
    public function getStade()
    {
        return $this->stade;
    }

    /**
     * @param mixed $stade
     */
    public function setStade($stade)
    {
        $this->stade = $stade;
    }

    public function __toString(){
        // to show the name of the Category in the select
        return $this->equipeA." vs ".$this->equipeB;
        // to show the id of the Category in the select
        // return $this->id;
    }
}

