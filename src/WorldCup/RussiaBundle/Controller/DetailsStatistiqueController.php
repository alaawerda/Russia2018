<?php

namespace WorldCup\RussiaBundle\Controller;

use WorldCup\RussiaBundle\Entity\DetailsStatistique;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;



/**
 * Detailsstatistique controller.
 *
 */
class DetailsStatistiqueController extends Controller
{
    /**
     * Lists all detailsStatistique entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $detailsStatistiques = $em->getRepository('WorldCupRussiaBundle:DetailsStatistique')->findAll();

        return $this->render('detailsstatistique/index.html.twig', array(
            'detailsStatistiques' => $detailsStatistiques,
        ));
    }


    /**
     * Creates a new detailsStatistique entity.
     *
     */
    public function newAction(Request $request)
    {
        $idMatch = $request->get('idmatch');
        $detailsStatistique = new Detailsstatistique();
        $detailsStatistique2 = new Detailsstatistique();
        $em = $this->getDoctrine()->getManager();
        $matche = $em->getRepository('WorldCupRussiaBundle:Matche')->findOneBy(array('id' => $idMatch));
        //$equipeMatch = $em->getRepository('WorldCupRussiaBundle:Matche')->selectEquipe($idMatch);
        //$equipeA = $matche->getEquipeA();
        $equipeA   = $matche->getEquipeA();
        $equipeB   = $matche->getEquipeB();
        $idequipeA = $equipeA->getId();
        $idequipeB = $equipeB->getId();
        $equipe1 = $em->getRepository('WorldCupRussiaBundle:Equipe')->findOneBy(array('id' => $idequipeA));
        $equipe2 = $em->getRepository('WorldCupRussiaBundle:Equipe')->findOneBy(array('id' => $idequipeB));
        $joueursb = $em->getRepository('WorldCupRussiaBundle:Joueur')->findByEquipe($idequipeB);
        dump($equipe2);
        dump($joueursb);
        $detailsStatistique2->setMatche($matche);
        $detailsStatistique2->setEquipe($equipeA);

        $detailsStatistique2->setJoueur($joueursb);
        dump($detailsStatistique2);

        //dump($equipeMatch);

       $form = $this->createForm('WorldCup\RussiaBundle\Form\DetailsStatistiqueType', $detailsStatistique2);


     /* $form = $this->createForm(DetailsStatistiqueType::class, $detailsStatistique, array(
          'joueur_id' => '7',
      ));*/
       //$form = $this->createForm(new DetailsStatistiqueType($this->getUser()), $detailsStatistique);


        //$task = new Task();

        /*$form = $this->createFormBuilder($detailsStatistique)
            ->add('temps')->add('type')->add('description')->add('matche')->add('equipe')
            ->add('joueur', DetailsStatistiqueType::class, array(

                'query_builder' => function(EntityRepository $repo) use($equipeA) {
                    return $repo->createQueryBuilder('u')->where('u.equipe =:id')->setParameter('id', $equipeA)
                        ;
                },

            ))
            ->getForm();*/

        $form2 = $this->createForm('WorldCup\RussiaBundle\Form\DetailStatistique2Type', $detailsStatistique);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($detailsStatistique2);
            $em->flush();
            return $this->redirectToRoute('detailsstatistique_show', array('id' => $detailsStatistique2->getId()));
        }
        return $this->render('detailsstatistique/new.html.twig', array(
            'detailsStatistique' => $detailsStatistique,
            'detailsStatistique2' => $detailsStatistique2,
            'form' => $form->createView(),
            'form2' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a detailsStatistique entity.
     *
     */
    public function showAction(DetailsStatistique $detailsStatistique2)
    {
        $deleteForm = $this->createDeleteForm($detailsStatistique2);

        return $this->render('detailsstatistique/show.html.twig', array(
            'detailsStatistique2' => $detailsStatistique2,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing detailsStatistique entity.
     *
     */
    public function editAction(Request $request, DetailsStatistique $detailsStatistique)
    {
        $deleteForm = $this->createDeleteForm($detailsStatistique);
        $editForm = $this->createForm('WorldCup\RussiaBundle\Form\DetailsStatistiqueType', $detailsStatistique);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('detailsstatistique_edit', array('id' => $detailsStatistique->getId()));
        }

        return $this->render('detailsstatistique/edit.html.twig', array(
            'detailsStatistique' => $detailsStatistique,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a detailsStatistique entity.
     *
     */
    public function deleteAction(Request $request, DetailsStatistique $detailsStatistique)
    {
        $form = $this->createDeleteForm($detailsStatistique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($detailsStatistique);
            $em->flush();
        }

        return $this->redirectToRoute('detailsstatistique_index');
    }

    /**
     * Creates a form to delete a detailsStatistique entity.
     *
     * @param DetailsStatistique $detailsStatistique The detailsStatistique entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(DetailsStatistique $detailsStatistique)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('detailsstatistique_delete', array('id' => $detailsStatistique->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    public function listeMatchsAction (){
        $em = $this->getDoctrine()->getManager();

        $matches = $em->getRepository('WorldCupRussiaBundle:Matche')->findAll();

        return $this->render('detailsstatistique/index.html.twig', array(
            'matches' => $matches,
        ));
    }


}
