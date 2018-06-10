<?php

namespace WorldCup\RussiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Billet
 *
 * @ORM\Table(name="billet")
 * @ORM\Entity(repositoryClass="WorldCup\RussiaBundle\Repository\BilletRepository")
 */
class Billet
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
     * @ORM\ManyToOne(targetEntity="WorldCup\RussiaBundle\Entity\Matche", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $matche;

    /**
     * @ORM\ManyToOne(targetEntity="WorldCup\RussiaBundle\Entity\User", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="WorldCup\RussiaBundle\Entity\CategorieBillet", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $CategorieBillet;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float")
     */
    private $prix;


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
     * Set prix
     *
     * @param float $prix
     *
     * @return Billet
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    
        return $this;
    }

    /**
     * Get prix
     *
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
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

    /**
     * @return mixed
     */
    public function getCategorieBillet()
    {
        return $this->CategorieBillet;
    }

    /**
     * @param mixed $CategorieBillet
     */
    public function setCategorieBillet($CategorieBillet)
    {
        $this->CategorieBillet = $CategorieBillet;
    }


}

