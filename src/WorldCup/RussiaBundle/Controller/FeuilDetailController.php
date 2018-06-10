<?php
/**
 * Created by PhpStorm.
 * User: Mirak
 * Date: 24/04/2018
 * Time: 19:25
 */

namespace WorldCup\RussiaBundle\Controller;

use WorldCup\RussiaBundle\Entity\FeuilDetail;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class FeuilDetailController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $feuildetail = $em->getRepository('WorldCupRussiaBundle:FeuilDetail')->findAll();

        return $this->render('feuildetail/index.html.twig', array(
            'feuildetails' => $feuildetail,
        ));
    }

    /**
     * Creates a new feuil entity.
     *
     */
    public function newAction(Request $request)
    {
        $feuildetail = new FeuilDetail();
        $form = $this->createForm('WorldCup\RussiaBundle\Form\FeuilDetailType', $feuildetail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($feuildetail);
            $em->flush();

            return $this->redirectToRoute('feuildetail_show', array('id' => $feuildetail->getMatche()->getId(),'id2' => $feuildetail->getFeuil()->getId()));
        }

        return $this->render('feuildetail/new.html.twig', array(
            'feuildetail' => $feuildetail,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a feuil entity.
     *
     */
    public function showAction(FeuilDetail $feuildetail)
    {
        $deleteForm = $this->createDeleteForm($feuildetail);

        return $this->render('feuildetail/show.html.twig', array(
            'feuildetail' => $feuildetail,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing feuil entity.
     *
     */
    public function editAction(Request $request, FeuilDetail $feuildetail)
    {
        $deleteForm = $this->createDeleteForm($feuildetail);
        $editForm = $this->createForm('WorldCup\RussiaBundle\Form\FeuilDetailType', $feuildetail);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('feuildetail_edit', array('id' => $feuildetail->getMatche()->getId(),'id2' => $feuildetail->getFeuil()->getId()));
        }

        return $this->render('feuildetail/edit.html.twig', array(
            'feuildetail' => $feuildetail,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a feuil entity.
     *
     */
    public function deleteAction(Request $request, FeuilDetail $feuildetail)
    {
        $form = $this->createDeleteForm($feuildetail);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($feuildetail);
            $em->flush();
        }

        return $this->redirectToRoute('feuildetail_index');
    }

    /**
     * Creates a form to delete a feuil entity.
     *
     * @param Feuil $feuil The feuil entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(FeuilDetail $feuildetail)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('feuildetail_delete', array('id' => $feuildetail->getMatche()->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }



    public function affichefeuildetailAction(Request $request)
    {
        $idfeuil = $request->get('id');
        $em = $this->getDoctrine()->getManager();
        $feuildetail = $em->getRepository('WorldCupRussiaBundle:FeuilDetail')->SelectParFeuil($idfeuil);
        return $this->render('WorldCupRussiaBundle:FeuilDetail:affiche.html.twig',array(

            "feuildetail"=>$feuildetail,
            "idfeuil"=>$idfeuil
        ));

    }

    public function supprimerfeuildetailAction(Request $request)
    {

        $idmatch = $request->get('id');
        $idfeuil = $request->get('id2');
        $em = $this->getDoctrine()->getManager();

        $feuildetail = $em->getRepository('WorldCupRussiaBundle:FeuilDetail')->Select($idmatch,$idfeuil);

        $em->remove($feuildetail);
        $em->flush();
        return $this->redirectToRoute('affichefeuildetail', array('id' => $idfeuil));

    }
    public function ajouterfeuildetailAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();
        if($request->getMethod()=="POST")
        {
            $em2 = $this->getDoctrine()->getManager();
            $feuildetail = new FeuilDetail();
            $id1=$request->get('idfeuil');
            $id2=$request->get('idmatche');
            $feuil = $em->getRepository('WorldCupRussiaBundle:Feuil')->find($id1);
            $matche = $em->getRepository('WorldCupRussiaBundle:Matche')->find($id2);
            $feuildetail->setFeuil($feuil);
            $feuildetail->setMatche($matche);
            $feuildetail->setTotal(0);
            $feuildetail->setVotea(0);
            $feuildetail->setVoteab(0);
            $feuildetail->setVoteb(0);
            $em2->persist($feuildetail);
            $em2->flush();
            return $this->redirectToRoute('affichefeuildetail', array('id' => $id1));
        }
        $idfeuil = $request->get('id');


        $feuil = $em->getRepository('WorldCupRussiaBundle:Feuil')->find($idfeuil);
        $matche = $em->getRepository('WorldCupRussiaBundle:Matche')->findAll();
        return $this->render('WorldCupRussiaBundle:FeuilDetail:ajoutermatch.html.twig',array(

            "feuil"=>$feuil,
            "matche"=>$matche
        ));

    }


}