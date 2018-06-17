<?php

namespace WorldCup\RussiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pronostique
 *
 * @ORM\Table(name="pronostique")
 * @ORM\Entity(repositoryClass="WorldCup\RussiaBundle\Repository\PronostiqueRepository")
 */
class Pronostique
{


    /**
     * @ORM\ManyToOne(targetEntity="WorldCup\RussiaBundle\Entity\Matche", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     * @ORM\Id
     */
    private $matche;

    /**
     * @ORM\ManyToOne(targetEntity="WorldCup\RussiaBundle\Entity\Feuil", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     * @ORM\Id
     */
    private $Feuil;

    /**
     * @ORM\ManyToOne(targetEntity="WorldCup\RussiaBundle\Entity\User", inversedBy="id" , cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     * @ORM\Id
     */
    private $User;

    /**
     * @var string
     *
     * @ORM\Column(name="resulta", type="string", length=255)
     */
    private $resulta;

    /**
     * @var string
     *
     * @ORM\Column(name="dateInsertion", type="date")
     */
    private $dateInsertion;

    /**
     * @return mixed
     */
    public function getMatche()
    {
        return $this->matche;
    }

    /**
     * @param mixed $matche
     */
    public function setMatche($matche)
    {
        $this->matche = $matche;
    }

    /**
     * @return mixed
     */
    public function getFeuil()
    {
        return $this->Feuil;
    }

    /**
     * @param mixed $Feuil
     */
    public function setFeuil($Feuil)
    {
        $this->Feuil = $Feuil;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->User;
    }

    /**
     * @param mixed $User
     */
    public function setUser($User)
    {
        $this->User = $User;
    }

    /**
     * @return string
     */
    public function getResulta()
    {
        return $this->resulta;
    }

    /**
     * @param string $resulta
     */
    public function setResulta($resulta)
    {
        $this->resulta = $resulta;
    }

    /**
     * @return string
     */
    public function getDateInsertion()
    {
        return $this->dateInsertion;
    }

    /**
     * @param string $dateInsertion
     */
    public function setDateInsertion($dateInsertion)
    {
        $this->dateInsertion = $dateInsertion;
    }






}

