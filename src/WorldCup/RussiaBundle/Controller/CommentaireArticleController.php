<?php

namespace WorldCup\RussiaBundle\Controller;

use Symfony\Component\Validator\Constraints\DateTime;
use WorldCup\RussiaBundle\Entity\Article;
use WorldCup\RussiaBundle\Entity\CommentaireArticle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WorldCup\RussiaBundle\Entity\User;
use WorldCup\RussiaBundle\WorldCupRussiaBundle;

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
    public function indexAction($id)
    {

        $em = $this->getDoctrine()->getManager();

        $article=$em->getRepository('WorldCupRussiaBundle:Article')->find($id);

        return $this->render('commentairearticle/Commentaires.html.twig',array("commentaireArticles"=>$article->getCommmentaires()));


    }

    /**
     * Creates a new commentaireArticle entity.
     *
     */
    public function newAction(Request $request)
    {   $em = $this->getDoctrine()->getManager();

        $commentaireArticle = new Commentairearticle();
        $user = $em->getRepository('WorldCupRussiaBundle:User')->find('1');

       // $form = $this->createForm('WorldCup\RussiaBundle\Form\CommentaireArticleType', $commentaireArticle);
       // $form->handleRequest($request);

        if ($request->isMethod('POST')){
            $date = new \DateTime();
            $idarticle = $request->get('idd');
        $article = $em->getRepository('WorldCupRussiaBundle:Article')->find($idarticle);
        $commentaireArticle->setArticle($article);
        $commentaireArticle->setContenu($request->get('textarea-comment'));
        $commentaireArticle->setUser($user);
        $commentaireArticle->setDate($date);
            $em->persist($commentaireArticle);
            $em->flush();

            return $this->render('commentairearticle/Commentaires.html.twig', array("commentaireArticles"=>$article->getCommmentaires()));
        }

        return $this->render('WorldCupRussiaBundle:article/show.html.twig',array());
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
