<?php

namespace Acme\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeIndexBundle:Default:index.html.twig', array('name' => $name));
    }
}
