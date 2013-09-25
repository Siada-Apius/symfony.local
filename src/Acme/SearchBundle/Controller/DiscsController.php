<?php

namespace Acme\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\TaskBundle\Helpers\Paginator;

class DiscsController extends Controller
{

    public function indexAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUsername();
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();

        $qb ->add('select', 'd')
            ->add('from', 'AcmeSearchBundle:Discs d')
            ->setMaxResults(5000)
        ;

        $query = $qb->getQuery();
        $array = $query->getResult();

        $form = $this->createFormBuilder()
            ->add('task', 'text')
            ->add('Search', 'submit')
            ->getForm();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $array,
            $this->get('request')->query->get('page', 1)/*page number*/,
            25/*limit per page*/
        );

        return $this->render('AcmeSearchBundle:Discs:index.html.twig', array('pagination' => $pagination,'user'=>$user,'form'=>$form->createView()));
    }




    public function viewAction($name,$id,$artistId)
    {
        $user = $this->container->get('security.context')->getToken()->getUsername();
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();

        $form = $this->createFormBuilder()
            ->add('task', 'text')
            ->add('Search', 'submit')
            ->getForm();

        #Select 'Disc Author'
        $qb ->add('select', 'a')
            ->add('from', 'AcmeSearchBundle:Artists a')
            ->add('where', 'a.aid = :identifier')
            ->setParameter('identifier',$artistId)
            ->setMaxResults(5000)
        ;

        $query = $qb->getQuery();
        $artist = $query->getArrayResult();

        #Select 'Disc Tracks'
        $qb ->add('select', 't.ttitle')
            ->add('from', 'AcmeSearchBundle:Tracks t')
            ->add('where', 't.discsDid = :identifier')
            ->setParameter('identifier',$id)
            ->setMaxResults(5000)
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

        #$idcrasota = $genresId[0]['genresGid'];     // --- ????


        $menu = array(
            'Artist',
        );

        return $this->render('AcmeSearchBundle:Discs:view.html.twig', array('artist'=>$artist,'menu'=>$menu ,'tracks'=>$tracks ,'diskName'=>$name,'user'=> $user,'form'=>$form->createView()));
    }

}
