<?php

namespace Acme\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\TaskBundle\Helpers\Paginator;

class DiscsController extends Controller
{
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();


        $qb->add('select', 'd')
            ->add('from', 'AcmeSearchBundle:Discs d')
            ->setMaxResults(50000);
        $query = $qb->getQuery();
        $array = $query->getResult();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $array,
            $this->get('request')->query->get('page', 1)/*page number*/,
            25/*limit per page*/
        );

        // parameters to template
        return $this->render('AcmeSearchBundle:Discs:index.html.twig', array('pagination' => $pagination,));
    }

    public function viewAction($name,$id)

    {


        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();

        #Select 'Disc Author'
        $qb->add('select', 'a.artistsAid')->add('from', 'AcmeSearchBundle:Discs a')->add('where', 'a.artistsAid = :identifier')->setParameter('identifier',$id)->setMaxResults(50000);
        $query = $qb->getQuery();
        $artistId = $query->getArrayResult();
        print_r($artistId);die;



        return $this->render('AcmeSearchBundle:Discs:view.html.twig', array());
    }

}
