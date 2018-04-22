<?php
/**
 * Created by PhpStorm.
 * User: Alaa Werda
 * Date: 16/04/2018
 * Time: 21:30
 */

namespace WorldCup\RussiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as FosUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity
 */
class User extends FosUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

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
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->idtest = new \Doctrine\Common\Collections\ArrayCollection();

    }



}
