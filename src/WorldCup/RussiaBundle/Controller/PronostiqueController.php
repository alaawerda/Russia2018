<?php
/**
 * Created by PhpStorm.
 * User: Mirak
 * Date: 08/05/2018
 * Time: 19:03
 */

namespace WorldCup\RussiaBundle\Controller;

use WorldCup\RussiaBundle\Entity\Pronostique;
use WorldCup\RussiaBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
class PronostiqueController extends Controller
{
    public function ajouterPronostiqueAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        if($request->getMethod()=="POST")
        {
            $feuil1 = $em->getRepository('WorldCupRussiaBundle:Feuil')->Select("actif");
            $user = $em->getRepository('WorldCupRussiaBundle:User')->find(1);

            $feuildetail1 = $em->getRepository('WorldCupRussiaBundle:FeuilDetail')->SelectParFeuil($feuil1);
            foreach($feuildetail1 as $fd) {
                $id = $fd->getMatche()->getID();
                $id1 = $request->get($id);
                $pronos = new Pronostique();

                $pronos->setMatche($fd->getMatche());
                $pronos->setFeuil($fd->getFeuil());
                $pronos->setResulta($id1);
                if($id1 == 0)
                {
                    $fd->setTotal($fd->getTotal()+1);
                    $fd->setVoteab($fd->getVoteab()+1);
                }
                if($id1 == 1)
                {
                    $fd->setTotal($fd->getTotal()+1);
                    $fd->setVotea($fd->getVotea()+1);
                }
                if($id1 == 2)
                {
                    $fd->setTotal($fd->getTotal()+1);
                    $fd->setVoteb($fd->getVoteb()+1);
                }

                $pronos->setDateInsertion(new \DateTime());
                $pronos->setUser($user);
                $em->persist($pronos);
                $em->persist($fd);
                $em->flush();
            }
        }
        $feuil = $em->getRepository('WorldCupRussiaBundle:Feuil')->Select("actif");
        $feuildetail = $em->getRepository('WorldCupRussiaBundle:FeuilDetail')->SelectParFeuil($feuil);
        return $this->render('WorldCupRussiaBundle:Pronostique:ajouterpronostique.html.twig',array(
            "feuildetail"=>$feuildetail
        ));

    }
}