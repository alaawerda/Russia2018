<?php

namespace WorldCup\RussiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WorldCupRussiaBundle::layout.html.twig');
    }

    public function backAction()
    {
        return $this->render('WorldCupRussiaBundle::back.html.twig');
    }
}
