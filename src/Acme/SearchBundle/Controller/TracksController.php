<?php

namespace Acme\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TracksController extends Controller
{
    public function indexAction()
    {
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a FROM AcmeSearchBundle:Tracks a";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1)/*page number*/,
            100/*limit per page*/
        );

        // parameters to template
        return $this->render('AcmeSearchBundle:Artists:index.html.twig', array('pagination' => $pagination));
    }

}
