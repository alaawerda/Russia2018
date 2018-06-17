<?php

namespace WorldCup\RussiaBundle\Repository;

/**
 * MatcheRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 *
 */

use Doctrine\ORM\EntityRepository;




class MatcheRepository extends EntityRepository
{
    public function selectEquipe($idmatch)
    {
        $q = $this->getEntityManager()
            ->createQuery("SELECT u FROM
      WorldCupRussiaBundle:Matche u
          JOIN u.equipeA  a  WHERE a.id =:id ")->setParameter('id',$idmatch);
        return $q->getResult();

        //SELECT u FROM User u JOIN u.address a WHERE a.city = 'Berlin'"


    }

}
