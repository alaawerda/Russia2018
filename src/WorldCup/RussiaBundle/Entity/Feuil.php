<?php

namespace WorldCup\RussiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feuil
 *
 * @ORM\Table(name="feuil")
 * @ORM\Entity(repositoryClass="WorldCup\RussiaBundle\Repository\FeuilRepository")
 */
class Feuil
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

  /*  /**
     * @ORM\ManyToOne(targetEntity="WorldCup\RussiaBundle\Entity\User", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
  /*  private $user; */

    /**
     * @ORM\ManyToOne(targetEntity="WorldCup\RussiaBundle\Entity\Pronostique", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pronostique;

    /**
     * @var string
     *
     * @ORM\Column(name="resultat", type="string", length=255)
     */
    private $resultat;


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
     * @return mixed
     */
    public function getPronostique()
    {
        return $this->pronostique;
    }

    /**
     * @param mixed $pronostique
     */
    public function setPronostique($pronostique)
    {
        $this->pronostique = $pronostique;
    }

    /**
     * @return string
     */
    public function getResultat()
    {
        return $this->resultat;
    }

    /**
     * @param string $resultat
     */
    public function setResultat($resultat)
    {
        $this->resultat = $resultat;
    }


}

