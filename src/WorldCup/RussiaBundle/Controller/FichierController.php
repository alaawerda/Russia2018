<?php

namespace WorldCup\RussiaBundle\Controller;

use WorldCup\RussiaBundle\Entity\Fichier;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Fichier controller.
 *
 */
class FichierController extends Controller
{
    /**
     * Lists all fichier entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $fichiers = $em->getRepository('WorldCupRussiaBundle:Fichier')->findAll();

        return $this->render('fichier/index.html.twig', array(
            'fichiers' => $fichiers,
        ));
    }

    /**
     * Creates a new fichier entity.
     *
     */
    public function newAction(Request $request)
    {
        $fichier = new Fichier();
        $form = $this->createForm('WorldCup\RussiaBundle\Form\FichierType', $fichier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fichier);
            $em->flush();

            return $this->redirectToRoute('fichier_show', array('id' => $fichier->getId()));
        }

        return $this->render('fichier/new.html.twig', array(
            'fichier' => $fichier,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a fichier entity.
     *
     */
    public function showAction(Fichier $fichier)
    {
        $deleteForm = $this->createDeleteForm($fichier);

        return $this->render('fichier/show.html.twig', array(
            'fichier' => $fichier,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing fichier entity.
     *
     */
    public function editAction(Request $request, Fichier $fichier)
    {
        $deleteForm = $this->createDeleteForm($fichier);
        $editForm = $this->createForm('WorldCup\RussiaBundle\Form\FichierType', $fichier);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fichier_edit', array('id' => $fichier->getId()));
        }

        return $this->render('fichier/edit.html.twig', array(
            'fichier' => $fichier,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a fichier entity.
     *
     */
    public function deleteAction(Request $request, Fichier $fichier)
    {
        $form = $this->createDeleteForm($fichier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($fichier);
            $em->flush();
        }

        return $this->redirectToRoute('fichier_index');
    }

    /**
     * Creates a form to delete a fichier entity.
     *
     * @param Fichier $fichier The fichier entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Fichier $fichier)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('fichier_delete', array('id' => $fichier->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
