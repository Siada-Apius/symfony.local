<?php

namespace Acme\RegistrationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AcmeRegistrationBundle:Default:index.html.twig', array('name' => $name));
    }
}
