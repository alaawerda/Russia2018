<?php

namespace WorldCup\RussiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StaffeArbitre
 *
 * @ORM\Table(name="staffe_arbitre")
 * @ORM\Entity(repositoryClass="WorldCup\RussiaBundle\Repository\StaffeArbitreRepository")
 */
class StaffeArbitre
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
     * @ORM\ManyToOne(targetEntity="WorldCup\RussiaBundle\Entity\Arbitre", inversedBy="id")
     * @ORM\JoinColumn(nullable=false)
     */
    private $arbitre;


    /**
     * @var string
     *
     * @ORM\Column(name="typeArbitre", type="string", length=255)
     */
    private $typeArbitre;


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
     * Set typeArbitre
     *
     * @param string $typeArbitre
     *
     * @return StaffeArbitre
     */
    public function setTypeArbitre($typeArbitre)
    {
        $this->typeArbitre = $typeArbitre;
    
        return $this;
    }

    /**
     * Get typeArbitre
     *
     * @return string
     */
    public function getTypeArbitre()
    {
        return $this->typeArbitre;
    }

    /**
     * @return mixed
     */
    public function getArbitre()
    {
        return $this->arbitre;
    }

    /**
     * @param mixed $arbitre
     */
    public function setArbitre($arbitre)
    {
        $this->arbitre = $arbitre;
    }


    public function __toString(){
        // to show the name of the Category in the select
        return $this->typeArbitre;
        // to show the id of the Category in the select
        // return $this->id;
    }

}

