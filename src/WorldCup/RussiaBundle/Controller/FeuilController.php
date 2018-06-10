<?php

namespace WorldCup\RussiaBundle\Controller;

use WorldCup\RussiaBundle\Entity\Feuil;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Feuil controller.
 *
 */
class FeuilController extends Controller
{
    /**
     * Lists all feuil entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $feuils = $em->getRepository('WorldCupRussiaBundle:Feuil')->findAll();

        return $this->render('feuil/index.html.twig', array(
            'feuils' => $feuils,
        ));
    }

    /**
     * Creates a new feuil entity.
     *
     */
    public function newAction(Request $request)
    {
        $feuil = new Feuil();
        $form = $this->createForm('WorldCup\RussiaBundle\Form\FeuilType', $feuil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($feuil);
            $em->flush();

            return $this->redirectToRoute('feuil_show', array('id' => $feuil->getId()));
        }

        return $this->render('feuil/new.html.twig', array(
            'feuil' => $feuil,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a feuil entity.
     *
     */
    public function showAction(Feuil $feuil)
    {
        $deleteForm = $this->createDeleteForm($feuil);

        return $this->render('feuil/show.html.twig', array(
            'feuil' => $feuil,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing feuil entity.
     *
     */
    public function editAction(Request $request, Feuil $feuil)
    {
        $deleteForm = $this->createDeleteForm($feuil);
        $editForm = $this->createForm('WorldCup\RussiaBundle\Form\FeuilType', $feuil);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('feuil_edit', array('id' => $feuil->getId()));
        }

        return $this->render('feuil/edit.html.twig', array(
            'feuil' => $feuil,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a feuil entity.
     *
     */
    public function deleteAction(Request $request, Feuil $feuil)
    {
        $form = $this->createDeleteForm($feuil);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($feuil);
            $em->flush();
        }

        return $this->redirectToRoute('feuil_index');
    }

    /**
     * Creates a form to delete a feuil entity.
     *
     * @param Feuil $feuil The feuil entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Feuil $feuil)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('feuil_delete', array('id' => $feuil->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
