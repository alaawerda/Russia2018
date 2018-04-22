<?php

namespace WorldCup\RussiaBundle\Controller;

use WorldCup\RussiaBundle\Entity\CommentaireArticle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Commentairearticle controller.
 *
 */
class CommentaireArticleController extends Controller
{
    /**
     * Lists all commentaireArticle entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $commentaireArticles = $em->getRepository('WorldCupRussiaBundle:CommentaireArticle')->findAll();

        return $this->render('commentairearticle/index.html.twig', array(
            'commentaireArticles' => $commentaireArticles,
        ));
    }

    /**
     * Creates a new commentaireArticle entity.
     *
     */
    public function newAction(Request $request)
    {
        $commentaireArticle = new Commentairearticle();
        $form = $this->createForm('WorldCup\RussiaBundle\Form\CommentaireArticleType', $commentaireArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commentaireArticle);
            $em->flush();

            return $this->redirectToRoute('commentairearticle_show', array('id' => $commentaireArticle->getId()));
        }

        return $this->render('commentairearticle/new.html.twig', array(
            'commentaireArticle' => $commentaireArticle,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a commentaireArticle entity.
     *
     */
    public function showAction(CommentaireArticle $commentaireArticle)
    {
        $deleteForm = $this->createDeleteForm($commentaireArticle);

        return $this->render('commentairearticle/show.html.twig', array(
            'commentaireArticle' => $commentaireArticle,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing commentaireArticle entity.
     *
     */
    public function editAction(Request $request, CommentaireArticle $commentaireArticle)
    {
        $deleteForm = $this->createDeleteForm($commentaireArticle);
        $editForm = $this->createForm('WorldCup\RussiaBundle\Form\CommentaireArticleType', $commentaireArticle);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commentairearticle_edit', array('id' => $commentaireArticle->getId()));
        }

        return $this->render('commentairearticle/edit.html.twig', array(
            'commentaireArticle' => $commentaireArticle,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a commentaireArticle entity.
     *
     */
    public function deleteAction(Request $request, CommentaireArticle $commentaireArticle)
    {
        $form = $this->createDeleteForm($commentaireArticle);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($commentaireArticle);
            $em->flush();
        }

        return $this->redirectToRoute('commentairearticle_index');
    }

    /**
     * Creates a form to delete a commentaireArticle entity.
     *
     * @param CommentaireArticle $commentaireArticle The commentaireArticle entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CommentaireArticle $commentaireArticle)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commentairearticle_delete', array('id' => $commentaireArticle->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
