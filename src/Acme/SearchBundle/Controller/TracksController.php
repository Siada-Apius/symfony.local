<?php

namespace Acme\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TracksController extends Controller
{
    public function indexAction()
    {
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql = $em->createQuery("SELECT a.ttitle FROM AcmeSearchBundle:Tracks a WHERE a.artistsAid < (100)");
        $query = $dql->getArrayResult();


        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1)/*page number*/,
            100/*limit per page*/
        );

        // parameters to template
        return $this->render('AcmeSearchBundle:Tracks:index.html.twig', array('pagination' => $pagination));
    }

}
