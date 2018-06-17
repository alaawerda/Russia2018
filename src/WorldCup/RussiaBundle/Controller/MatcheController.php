<?php

namespace WorldCup\RussiaBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use WorldCup\RussiaBundle\Entity\Matche;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;


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
            dump($matche);
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


    public function hatachayAction(Request $req)
    {
        if ($req->isXmlHttpRequest()){
            $idgroupe = $req->get('fkidgroupe');
            //$em = $this->getDoctrine()->getManager();
            $conn = $this->get('database_connection');
            $query = "select * from equipe WHERE groupe =".$idgroupe;
            //$matches = $em->getRepository('WorldCupRussiaBundle:Groupe')->findAll();
            $rows = $conn->fetchAll($query);
            return new JsonResponse (array('data'=> json_encode($rows)));

            $repository = $this->getDoctrine()->getRepository('WorldCupRussiaBundle:Matche');
            $products = $repository->findBy($idgroupe);

        };
        return new  Response("dzezaez",400);
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



    public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $matches = $em->getRepository('WorldCupRussiaBundle:Equipe')->findAll();
        if ($request->isXmlHttpRequest()){
            $id = $request->get('id');
            $phase = $request->get('phase');
           /* $id = '1';
            $phase = 'poule';*/
            //dump($id);
            $serliazer = new Serializer(array(new ObjectNormalizer()));
            $matches = $em->getRepository('WorldCupRussiaBundle:Equipe')->Selects(
                $id,$phase
            );
            $data = $serliazer->normalize($matches);
            return new JsonResponse($data);
        }
        return $this->render('matche/test.html.twig', array(
            'matches' => $matches,
        ));
    }

    public function listtAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $matches = $em->getRepository('WorldCupRussiaBundle:Equipe')->findAll();
        if ($request->isXmlHttpRequest()){
            $id = $request->get('id');
            $equipeA = $request->get('equipeA');
            $phase = $request->get('phase');
            /* $id = '1';
             $phase = 'poule';*/
            //dump($id);
            $serliazer = new Serializer(array(new ObjectNormalizer()));
            $matches = $em->getRepository('WorldCupRussiaBundle:Equipe')->Selects3(
                $id,$equipeA,$phase
            );
            $data = $serliazer->normalize($matches);
            return new JsonResponse($data);
        }
        return $this->render('matche/test.html.twig', array(
            'matches' => $matches,
        ));
    }




}
