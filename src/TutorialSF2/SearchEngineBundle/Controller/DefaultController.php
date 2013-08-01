<?php

namespace TutorialSF2\SearchEngineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TutorialSF2SearchEngineBundle:Default:index.html.twig', array('name' => $name));
    }
}
