<?php

namespace WorldCup\RussiaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WorldCupRussiaBundle::layout.html.twig');
    }
}
