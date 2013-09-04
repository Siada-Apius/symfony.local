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

        $qb ->add('select', 'd')
            ->add('from', 'AcmeSearchBundle:Discs d')
            ->setMaxResults(50000)
        ;

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

    public function viewAction($name,$id,$artistId)
    {
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();

        #Select 'Disc Author'
        $qb ->add('select', 'a')
            ->add('from', 'AcmeSearchBundle:Artists a')
            ->add('where', 'a.aid = :identifier')
            ->setParameter('identifier',$artistId)
            ->setMaxResults(50000)
        ;

        $query = $qb->getQuery();
        $artist = $query->getArrayResult();

        #Select 'Disc Tracks'
        $qb ->add('select', 't.ttitle')
            ->add('from', 'AcmeSearchBundle:Tracks t')
            ->add('where', 't.discsDid = :identifier')
            ->setParameter('identifier',$id)
            ->setMaxResults(50000)
        ;

        $query = $qb->getQuery();
        $tracks = $query->getArrayResult();

        #Select 'Genres id'
        $qb ->add('select', 'g.genresGid')
            ->add('from', 'AcmeSearchBundle:Discs g')
            ->add('where',
                $qb->expr()->andX(
                $qb->expr()->eq('g.dtitle', ':identifier'),
                $qb->expr()->like('g.did',':identifierKrasota'))
                )
            ->setParameter('identifier',$name)
            ->setParameter('identifierKrasota',$id)
        ;

        $query = $qb->getQuery();
        $genresId = $query->getArrayResult();

        $idcrasota = $genresId[0]['genresGid'];     // --- ????


        $menu = array(
            'Artist',
        );

        return $this->render('AcmeSearchBundle:Discs:view.html.twig', array('artist'=>$artist,'menu'=>$menu ,'tracks'=>$tracks ,'diskName'=>$name));
    }

}
