<?php
/**
 * Created by PhpStorm.
 * User: Mirak
 * Date: 23/04/2018
 * Time: 20:18
 */

namespace WorldCup\RussiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Feuil
 *
 * @ORM\Table(name="FeuilDetail")
 * @ORM\Entity(repositoryClass="WorldCup\RussiaBundle\Repository\FeuilDetailRepository")
 */
class FeuilDetail
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
     * @var int
     *
     * @ORM\Column(name="Total", type="integer")
     */
    private $Total;

    /**
     * @var int
     *
     * @ORM\Column(name="votea", type="integer")
     */
    private $votea;

    /**
     * @var int
     *
     * @ORM\Column(name="voteb", type="integer")
     */
    private $voteb;

    /**
     * @var int
     *
     * @ORM\Column(name="voteab", type="integer")
     */
    private $voteab;

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
     * @return int
     */
    public function getTotal()
    {
        return $this->Total;
    }

    /**
     * @param int $Total
     */
    public function setTotal($Total)
    {
        $this->Total = $Total;
    }

    /**
     * @return int
     */
    public function getVotea()
    {
        return $this->votea;
    }

    /**
     * @param int $votea
     */
    public function setVotea($votea)
    {
        $this->votea = $votea;
    }

    /**
     * @return int
     */
    public function getVoteb()
    {
        return $this->voteb;
    }

    /**
     * @param int $voteb
     */
    public function setVoteb($voteb)
    {
        $this->voteb = $voteb;
    }

    /**
     * @return int
     */
    public function getVoteab()
    {
        return $this->voteab;
    }

    /**
     * @param int $voteab
     */
    public function setVoteab($voteab)
    {
        $this->voteab = $voteab;
    }



}