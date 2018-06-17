<?php

namespace WorldCup\RussiaBundle\Controller;

use WorldCup\RussiaBundle\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WorldCup\RussiaBundle\Entity\User;
use WorldCup\RussiaBundle\WorldCupRussiaBundle;

/**
 * Article controller.
 *
 */
class ArticleController extends Controller
{
    /**
     * Lists all article entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('WorldCupRussiaBundle:Article')->triArticleParDateDesc();

        return $this->render('article/testaff.html.twig', array(
            'articles' => $articles,
        ));
    }


    public function indexbackAction()
    {
        $em = $this->getDoctrine()->getManager();

        $articles = $em->getRepository('WorldCupRussiaBundle:Article')->findAll();

        return $this->render('article/indexback.html.twig', array(
            'articles' => $articles,
        ));
    }

    /**
     * Creates a new article entity.
     *
     */
    public function newAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm('WorldCup\RussiaBundle\Form\ArticleType', $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $user = new User();
            $user->setId(1);
            $user = $em->getRepository('WorldCupRussiaBundle:User')->find($user);
            $article->setUser($user);
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('article_showback', array('id' => $article->getId()));
        }

        return $this->render('article/new.html.twig', array(
            'article' => $article,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a article entity.
     *
     */
    public function showAction(Article $article)
    {
        $deleteForm = $this->createDeleteForm($article);
        $nbcom= $article->getCommmentaires()->count();
        return $this->render('article/show.html.twig', array(
            'article' => $article,'count'=>$nbcom,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function showbackAction(Article $article)
    {
        $deleteForm = $this->createDeleteForm($article);

        return $this->render('article/showback.html.twig', array(
            'article' => $article,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    public function GetTopRatedTopic()
    {
        $em = $this->getDoctrine()->getManager();

    }
    public function GetTopCommentedTopicAction()
    {
        $em = $this->getDoctrine()->getManager();
        $topics= $em->getRepository('WorldCupRussiaBundle:Article')->getMaxcommentedArticles();
        return $this->render('article/toptranding.html.twig',array('topics'=>$topics));



    }

    /**
     * Displays a form to edit an existing article entity.
     *
     */
    public function editAction(Request $request, Article $article)
    {
        $deleteForm = $this->createDeleteForm($article);
        $editForm = $this->createForm('WorldCup\RussiaBundle\Form\ArticleType', $article);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('article_edit', array('id' => $article->getId()));
        }

        return $this->render('article/edit.html.twig', array(
            'article' => $article,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a article entity.
     *
     */
    public function deleteAction(Request $request, Article $article)
    {
        $form = $this->createDeleteForm($article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($article);
            $em->flush();
        }

        return $this->redirectToRoute('article_index');
    }

    /**
     * Creates a form to delete a article entity.
     *
     * @param Article $article The article entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Article $article)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('article_delete', array('id' => $article->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


}
