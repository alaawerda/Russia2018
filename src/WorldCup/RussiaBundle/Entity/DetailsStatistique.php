<?php

namespace WorldCup\RussiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetailsStatistique
 *
 * @ORM\Table(name="details_statistique")
 * @ORM\Entity(repositoryClass="WorldCup\RussiaBundle\Repository\DetailsStatistiqueRepository")
 */
class DetailsStatistique
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")http://www.tunisietravail.net/attijari-bank-recherche-plusieurs-profils-63376/
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
     * @var string
     *
     * @ORM\Column(name="temps", type="integer", )
     */
    private $temps;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=999999)
     */
    private $description;


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
     * Set temps
     *
     * @param string $temps
     *
     * @return DetailsStatistique
     */
    public function setTemps($temps)
    {
        $this->temps = $temps;
    
        return $this;
    }

    /**
     * Get temps
     *
     * @return string
     */
    public function getTemps()
    {
        return $this->temps;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return DetailsStatistique
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return mixed
     */
    public function getMatche()
    {
        return $this->matche;
    }

    /**
     * @return string
     */
    public function getEquipe()
    {
        return $this->equipe;
    }

    /**
     * @param string $equipe
     */
    public function setEquipe($equipe)
    {
        $this->equipe = $equipe;
    }

    /**
     * @param mixed $matche
     */
    public function setMatche($matche)
    {
        $this->matche = $matche;
    }

    /**
     * @ORM\ManyToOne(targetEntity="WorldCup\RussiaBundle\Entity\Equipe", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     * */

    private $equipe;
    /**
     * @ORM\ManyToOne(targetEntity="WorldCup\RussiaBundle\Entity\Joueur", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     * */

    private $joueur;

    /**
     * @return mixed
     */
    public function getJoueur()
    {
        return $this->joueur;
    }

    /**
     * @param mixed $joueur
     */
    public function setJoueur($joueur)
    {
        $this->joueur = $joueur;
    }
}

