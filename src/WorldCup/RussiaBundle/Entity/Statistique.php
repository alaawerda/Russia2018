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
     * @var integer
     *
     * @ORM\Column(name="tirs", type="integer")
     */
    private $tirs;

    /**
     * @var integer
     *
     * @ORM\Column(name="corners", type="integer")
     */
    private $corners;

    /**
     * @var integer
     *
     * @ORM\Column(name="cartonsJaunes", type="integer")
     */
    private $cartonsJaunes;

    /**
     * @var integer
     *
     * @ORM\Column(name="cartonsRouges", type="integer")
     */
    private $cartonsRouges;

    /**
     * @var integer
     *
     * @ORM\Column(name="possessionsDeBalle", type="integer")
     */
    private $possessionsDeBalle;

    /**
     * @var integer
     *
     * @ORM\Column(name="buts", type="integer")
     */
    private $buts;

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
     * @return int
     */
    public function getTirs()
    {
        return $this->tirs;
    }

    /**
     * @param int $tirs
     */
    public function setTirs($tirs)
    {
        $this->tirs = $tirs;
    }

    /**
     * @return int
     */
    public function getCorners()
    {
        return $this->corners;
    }

    /**
     * @param int $corners
     */
    public function setCorners($corners)
    {
        $this->corners = $corners;
    }

    /**
     * @return int
     */
    public function getCartonsJaunes()
    {
        return $this->cartonsJaunes;
    }

    /**
     * @param int $cartonsJaunes
     */
    public function setCartonsJaunes($cartonsJaunes)
    {
        $this->cartonsJaunes = $cartonsJaunes;
    }

    /**
     * @return int
     */
    public function getCartonsRouges()
    {
        return $this->cartonsRouges;
    }

    /**
     * @param int $cartonsRouges
     */
    public function setCartonsRouges($cartonsRouges)
    {
        $this->cartonsRouges = $cartonsRouges;
    }

    /**
     * @return int
     */
    public function getPossessionsDeBalle()
    {
        return $this->possessionsDeBalle;
    }

    /**
     * @param int $possessionsDeBalle
     */
    public function setPossessionsDeBalle($possessionsDeBalle)
    {
        $this->possessionsDeBalle = $possessionsDeBalle;
    }

    /**
     * @return int
     */
    public function getButs()
    {
        return $this->buts;
    }

    /**
     * @param int $buts
     */
    public function setButs($buts)
    {
        $this->buts = $buts;
    }

    /**
     * @return int
     */
    public function getSaves()
    {
        return $this->saves;
    }

    /**
     * @param int $saves
     */
    public function setSaves($saves)
    {
        $this->saves = $saves;
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
     * @var integer
     *
     * @ORM\Column(name="saves", type="integer")
     */
    private $saves;


    /**
     * @ORM\ManyToOne(targetEntity="WorldCup\RussiaBundle\Entity\Equipe", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     * */

    private $equipe;


}