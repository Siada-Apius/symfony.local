<?php

namespace Acme\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\TaskBundle\Helpers\Paginator;

class ArtistsController extends Controller
{
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();


        $qb->add('select', 'a')
            ->add('from', 'AcmeSearchBundle:Artists a')
            ->setMaxResults( 50000 );
        $query = $qb->getQuery();
        $array = $query->getArrayResult();
        #print_r($array);die;




        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $array,
            $this->get('request')->query->get('page', 1)/*page number*/,
            25/*limit per page*/
        );


        // parameters to template
        return $this->render('AcmeSearchBundle:Artists:index.html.twig', array('pagination' => $pagination,));
    }




    public function viewAction($name,$id)
    {

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();

        $qb->add('select', 'd')
            ->add('from', 'AcmeSearchBundle:Discs d')->add('where', 'd.artistsAid = :identifier')->setParameter('identifier',$id)
            ->setMaxResults( 50000 );
        $query = $qb->getQuery();
        $discsData = $query->getResult();
        #print_r($discsData);die;


        #print_r($array);die;







        // parameters to template
        return $this->render('AcmeSearchBundle:Artists:view.html.twig', array('artistName'=>$name,'discsData'=>$discsData));
    }

}
