<?php

namespace WorldCup\RussiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Statistique
 *
 * @ORM\Table(name="statistique")
 * @ORM\Entity(repositoryClass="WorldCup\RussiaBundle\Repository\StatistiqueRepository")
 */
class Statistique
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
     * @ORM\OneToOne(targetEntity="WorldCup\RussiaBundle\Entity\Matche", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matche;

    /**
     * @var string
     *
     * @ORM\Column(name="tirs", type="string", length=255)
     */
    private $tirs;

    /**
     * @var string
     *
     * @ORM\Column(name="corners", type="string", length=255)
     */
    private $corners;

    /**
     * @var string
     *
     * @ORM\Column(name="cartonsJaunes", type="string", length=255)
     */
    private $cartonsJaunes;

    /**
     * @var string
     *
     * @ORM\Column(name="cartonsRouges", type="string", length=255)
     */
    private $cartonsRouges;

    /**
     * @var string
     *
     * @ORM\Column(name="possessionsDeBalleEquipeA", type="string", length=255)
     */
    private $possessionsDeBalleEquipeA;

    /**
     * @var string
     *
     * @ORM\Column(name="possessionsDeBalleEquipeB", type="string", length=255)
     */
    private $possessionsDeBalleEquipeB;

    /**
     * @var string
     *
     * @ORM\Column(name="saves", type="string", length=255)
     */
    private $saves;


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
     * Set tirs
     *
     * @param string $tirs
     *
     * @return Statistique
     */
    public function setTirs($tirs)
    {
        $this->tirs = $tirs;
    
        return $this;
    }

    /**
     * Get tirs
     *
     * @return string
     */
    public function getTirs()
    {
        return $this->tirs;
    }

    /**
     * Set corners
     *
     * @param string $corners
     *
     * @return Statistique
     */
    public function setCorners($corners)
    {
        $this->corners = $corners;
    
        return $this;
    }

    /**
     * Get corners
     *
     * @return string
     */
    public function getCorners()
    {
        return $this->corners;
    }

    /**
     * Set cartonsJaunes
     *
     * @param string $cartonsJaunes
     *
     * @return Statistique
     */
    public function setCartonsJaunes($cartonsJaunes)
    {
        $this->cartonsJaunes = $cartonsJaunes;
    
        return $this;
    }

    /**
     * Get cartonsJaunes
     *
     * @return string
     */
    public function getCartonsJaunes()
    {
        return $this->cartonsJaunes;
    }

    /**
     * Set cartonsRouges
     *
     * @param string $cartonsRouges
     *
     * @return Statistique
     */
    public function setCartonsRouges($cartonsRouges)
    {
        $this->cartonsRouges = $cartonsRouges;
    
        return $this;
    }

    /**
     * Get cartonsRouges
     *
     * @return string
     */
    public function getCartonsRouges()
    {
        return $this->cartonsRouges;
    }

    /**
     * Set possessionsDeBalleEquipeA
     *
     * @param string $possessionsDeBalleEquipeA
     *
     * @return Statistique
     */
    public function setPossessionsDeBalleEquipeA($possessionsDeBalleEquipeA)
    {
        $this->possessionsDeBalleEquipeA = $possessionsDeBalleEquipeA;
    
        return $this;
    }

    /**
     * Get possessionsDeBalleEquipeA
     *
     * @return string
     */
    public function getPossessionsDeBalleEquipeA()
    {
        return $this->possessionsDeBalleEquipeA;
    }

    /**
     * Set possessionsDeBalleEquipeB
     *
     * @param string $possessionsDeBalleEquipeB
     *
     * @return Statistique
     */
    public function setPossessionsDeBalleEquipeB($possessionsDeBalleEquipeB)
    {
        $this->possessionsDeBalleEquipeB = $possessionsDeBalleEquipeB;
    
        return $this;
    }

    /**
     * Get possessionsDeBalleEquipeB
     *
     * @return string
     */
    public function getPossessionsDeBalleEquipeB()
    {
        return $this->possessionsDeBalleEquipeB;
    }

    /**
     * Set saves
     *
     * @param string $saves
     *
     * @return Statistique
     */
    public function setSaves($saves)
    {
        $this->saves = $saves;
    
        return $this;
    }

    /**
     * Get saves
     *
     * @return string
     */
    public function getSaves()
    {
        return $this->saves;
    }

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


}

