<?php

namespace Acme\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TracksController extends Controller
{
    public function indexAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUsername();
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

        return $this->render('AcmeSearchBundle:Tracks:index.html.twig', array('pagination' => $pagination,'user'=>$user));

    }



    public function viewAction($dId,$aId,$title)
    {

        $user = $this->container->get('security.context')->getToken()->getUsername();
        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();

        #Select 'Track Title'
        $qb->add('select', 't')->add('from', 'AcmeSearchBundle:Tracks t')->add('where', 't.ttitle = :identifier')->setParameter('identifier',$title)->setMaxResults(1);
        $query = $qb->getQuery();
        $trackData  = $query->getArrayResult();

        #print_r($trackData);die;
       # $trackT = $trackData[0]['ttitle'];
        $trackId = $trackData[0]['discsDid'];
        $artistId = $trackData[0]['artistsAid'];
        #print_r($artistId);die;

        #Select 'Track Minutes'
        $qb->add('select', 't.tseconds')->add('from', 'AcmeSearchBundle:Tracks t')->add('where', 't.ttitle = :identifier')->setParameter('identifier',$title)->setMaxResults(1);
        $query = $qb->getQuery();
        $trackS  = $query->getArrayResult();
        $trackS = $trackS['0']['tseconds'] / 60;
        $trackM = substr((string)$trackS,0,3);


        #Select 'Disc Title'
        $qb->add('select', 'd.dtitle')->add('from', 'AcmeSearchBundle:Discs d')->add('where', 'd.did = :identifier')->setParameter('identifier',$dId)->setMaxResults(5);
        $query = $qb->getQuery();
        $DiscT = $query->getResult();

        #Select 'Artist Name'
        $qb->add('select', 'a.aname')->add('from', 'AcmeSearchBundle:Artists a')->add('where', 'a.aid = :identifier')->setParameter('identifier',$aId)->setMaxResults(5);
        $query = $qb->getQuery();
        $ArtistName = $query->getResult();


        $data = array(
            'trackTitle'=>$trackData[0]['ttitle'],
            'discTitle'=> $DiscT['0']['dtitle'],
            'artistName'=> $ArtistName['0']['aname'],
            'trackMinutes'=>$trackM.' minutes',
            'DiskId'=>$trackData[0]['discsDid'],
            'artistId'=>$trackData[0]['artistsAid'],
        );


        $menu = array(
            'track' => 'Track',
            'album'=>'Album',
            'artist'=> 'Artist',
            'trackMinutes' => ' Track time');


        return $this->render('AcmeSearchBundle:Tracks:view.html.twig', array('data'=>$data,'menu'=>$menu,'user'=>$user));

    }



}
