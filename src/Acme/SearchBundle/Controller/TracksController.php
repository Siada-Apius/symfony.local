<?php

namespace Acme\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TracksController extends Controller
{
    public function indexAction()
    {



        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();

        $qb->add('select', 'c')
            ->add('from', 'AcmeSearchBundle:Tracks c')
            ->setMaxResults(50000);
        $query = $qb->getQuery();
        $array = $query->getArrayResult();






        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $array,
            $this->get('request')->query->get('page', 1)/*page number*/,
            25/*limit per page*/
        );

        // parameters to template

        return $this->render('AcmeSearchBundle:Tracks:index.html.twig', array('pagination' => $pagination,));

    }



    public function viewAction($page,$title)
    {
      #var_dump($page);
        #var_dump($title);

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();

        $qb->add('select', 't')
            ->add('from', 'AcmeSearchBundle:Tracks t')
            ->add('where', 't.ttitle = :identifier')
            ->setParameter('identifier',$title)
            ->setMaxResults(1);

        $query = $qb->getQuery();
        $array = $query->getResult();

        return $this->render('AcmeSearchBundle:Tracks:view.html.twig', array('data'=>$array));

    }



}
