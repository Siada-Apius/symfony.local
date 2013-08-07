<?php

namespace Acme\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AcmeSearchBundle:Category')->findAll();


        $user = $this->container->get('security.context')->getToken()->getUsername();
        if ($user != 'anon.'){
            $a = 1;
            return $this->render('AcmeSearchBundle:Category:index.html.twig', array(
                'entities' => $entities,
                'session' => $a
            ));
        } else {
            $a = '';
            return $this->render('AcmeSearchBundle:Category:index.html.twig', array(
                'entities' => $entities,
                'session' => $a
            ));
        }
    }

    public function resultAction($param){

        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AcmeSearchBundle:Playlist')->findByCategory($param);


        $user = $this->container->get('security.context')->getToken()->getUsername();
        if ($user != 'anon.'){
            $a = 1;
            return $this->render('AcmeSearchBundle:Category:result.html.twig', array(
                'res' => $entities,
                'session' => $a
            ));
        } else {
            $a = '';
            return $this->render('AcmeSearchBundle:Category:result.html.twig', array(
                'res' => $entities,
                'session' => $a
            ));
        }

    }

}
