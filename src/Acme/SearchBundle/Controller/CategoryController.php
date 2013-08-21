<?php

namespace Acme\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\TaskBundle\Helpers\Paginator;

class CategoryController extends Controller
{
    public function indexAction()
    {

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();


        $qb->add('select', 'c')->add('from', 'AcmeSearchBundle:Genres c')->setMaxResults(50000);
        $query = $qb->getQuery();
        $array = $query->getResult();


        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $array,
            $this->get('request')->query->get('page', 1)/*page number*/,
            25/*limit per page*/
        );

        // parameters to template
        return $this->render('AcmeSearchBundle:Category:index.html.twig', array('pagination' => $pagination,));

    }


    public function viewAction($name,$id)
    {

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();


        #Select ''
        $qb->add('select', 't.dtitle')->add('from', 'AcmeSearchBundle:Discs t')->add('where', 't.genresGid = :identifier')->setParameter('identifier',$id)->setMaxResults(50000);
        $query = $qb->getQuery();
        $discTitle  = $query->getArrayResult();



        $menu = array(
            'Albums in this category',
            'Artists',

        );


        $data = array(
            $discTitle,
            'Artist'

        );



        // parameters to template
        return $this->render('AcmeSearchBundle:Category:view.html.twig', array('categoryName'=>$name,'menu'=>$menu, 'data'=>$data));

    }

}
