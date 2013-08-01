<?php

namespace Acme\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    public function indexAction()
    {

        if(isset($_SESSION['_sf2_attributes']['_security_secured_area']));
            $hello = 'Hello ADMIN';

        return $this->render('AcmeAdminBundle:Index:index.html.php', array('hello' => $hello));


    }

    public function userAction(){

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeRegistrationBundle:User')->findAll();

        return $this->render('AcmeAdminBundle:Index:user.html.twig', array('entities' => $entities));

    }
}
