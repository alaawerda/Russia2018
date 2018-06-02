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

    /**
     * @var string
     *
     * @ORM\Column(name="Etat", type="string", length=255)
     */
    private $Etat;

    /**
     * @var string
     *
     * @ORM\Column(name="Titre", type="string", length=255)
     */
    private $Titre;

    /**
     * @var string
     *
     * @ORM\Column(name="DateF", type="date")
     */
    private $DateF;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getEtat()
    {
        return $this->Etat;
    }

    /**
     * @param string $Etat
     */
    public function setEtat($Etat)
    {
        $this->Etat = $Etat;
    }

    /**
     * @return string
     */
    public function getTitre()
    {
        return $this->Titre;
    }

    /**
     * @param string $Titre
     */
    public function setTitre($Titre)
    {
        $this->Titre = $Titre;
    }

    /**
     * @return string
     */
    public function getDateF()
    {
        return $this->DateF;
    }

    /**
     * @param string $DateF
     */
    public function setDateF($DateF)
    {
        $this->DateF = $DateF;
    }




}

