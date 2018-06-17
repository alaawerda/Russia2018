<?php
/**
 * Created by PhpStorm.
 * User: Alaa Werda
 * Date: 07/06/2018
 * Time: 23:02
 */

namespace WorldCup\RussiaBundle\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use WorldCup\RussiaBundle\Entity\Equipe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TestController extends Controller
{

        public function listAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $matches = $em->getRepository('WorldCupRussiaBundle:Equipe')->findAll();
        if ($request->isXmlHttpRequest()){
            $id = $request->get('id');
           //dump($id);
            $serliazer = new Serializer(array(new ObjectNormalizer()));
            $matches = $em->getRepository('WorldCupRussiaBundle:Equipe')->findBy(
                ['groupe' => $id]
            );
            $data = $serliazer->normalize($matches);
            return new JsonResponse($data);
        }
        return $this->render('matche/test.html.twig', array(
            'matches' => $matches,
        ));
    }

}