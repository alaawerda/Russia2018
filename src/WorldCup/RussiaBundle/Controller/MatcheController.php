<?php

namespace WorldCup\RussiaBundle\Controller;

use WorldCup\RussiaBundle\Entity\Matche;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Matche controller.
 *
 */
class MatcheController extends Controller
{
    /**
     * Lists all matche entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $matches = $em->getRepository('WorldCupRussiaBundle:Matche')->findAll();

        return $this->render('matche/index.html.twig', array(
            'matches' => $matches,
        ));
    }

    /**
     * Creates a new matche entity.
     *
     */
    public function newAction(Request $request)
    {
        $matche = new Matche();
        $form = $this->createForm('WorldCup\RussiaBundle\Form\MatcheType', $matche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($matche);
            $em->flush();

            return $this->redirectToRoute('matche_show', array('id' => $matche->getId()));
        }

        return $this->render('matche/new.html.twig', array(
            'matche' => $matche,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a matche entity.
     *
     */
    public function showAction(Matche $matche)
    {
        $deleteForm = $this->createDeleteForm($matche);

        return $this->render('matche/show.html.twig', array(
            'matche' => $matche,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing matche entity.
     *
     */
    public function editAction(Request $request, Matche $matche)
    {
        $deleteForm = $this->createDeleteForm($matche);
        $editForm = $this->createForm('WorldCup\RussiaBundle\Form\MatcheType', $matche);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('matche_edit', array('id' => $matche->getId()));
        }

        return $this->render('matche/edit.html.twig', array(
            'matche' => $matche,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a matche entity.
     *
     */
    public function deleteAction(Request $request, Matche $matche)
    {
        $form = $this->createDeleteForm($matche);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($matche);
            $em->flush();
        }

        return $this->redirectToRoute('matche_index');
    }

    /**
     * Creates a form to delete a matche entity.
     *
     * @param Matche $matche The matche entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Matche $matche)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('matche_delete', array('id' => $matche->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
