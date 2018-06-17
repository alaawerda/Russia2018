<?php

namespace WorldCup\RussiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipe
 *
 * @ORM\Table(name="equipe")
 * @ORM\Entity(repositoryClass="WorldCup\RussiaBundle\Repository\EquipeRepository")
 */
class Equipe
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
     * @ORM\Column(name="entraineur", type="string", length=255)
     */
    private $entraineur;

    /**
     * @ORM\ManyToOne(targetEntity="WorldCup\RussiaBundle\Entity\Groupe", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
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
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;




    /**
     * @return string
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * @param string $logo
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255)
     */
    private $logo;

    /**
     * @return int
     */
    public function getPhase()
    {
        return $this->phase;
    }

    /**
     * @param int $phase
     */
    public function setPhase($phase)
    {
        $this->phase = $phase;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="point", type="integer")
     */
    private $point;


    /**
     * @var int
     *
     * @ORM\Column(name="phase", type="string"  , length=255)
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
     * Set nom
     *
     * @param string $nom
     *
     * @return Equipe
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set point
     *
     * @param integer $point
     *
     * @return Equipe
     */
    public function setPoint($point)
    {
        $this->point = $point;
    
        return $this;
    }

    /**
     * Get point
     *
     * @return integer
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * @return mixed
     */
    public function getEntraineur()
    {
        return $this->entraineur;
    }

    /**
     * @param mixed $entraineur
     */
    public function setEntraineur($entraineur)
    {
        $this->entraineur = $entraineur;
    }



    public function __toString(){
        // to show the name of the Category in the select
        return $this->nom;
        // to show the id of the Category in the select
        // return $this->id;
    }



}

