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
        $qb->add('select', 't')->add('from', 'AcmeSearchBundle:Discs t')->add('where', 't.genresGid = :identifier')->setParameter('identifier',$id)->setMaxResults(5000);
        $query = $qb->getQuery();
        $discData  = $query->getArrayResult();

        $artisData = array();

        foreach($discData as $k => $v){

            $userId[] = $v['artistsAid'];

            $qb->add('select', 'a')->add('from', 'AcmeSearchBundle:Artists a')->add('where', 'a.aid = :identifier')->setParameter('identifier',$userId[$k])->setMaxResults(5000);
            $query = $qb->getQuery();
            $artisData[]  = $query->getArrayResult();

        }

            $array = array($discData,$artisData);

            #var_dump($array);die;

        $Discpaginator  = $this->get('knp_paginator');
        $Discpaginator = $Discpaginator->paginate(
            $discData,
            $this->get('request')->query->get('page', 1)/*page number*/,
            25/*limit per page*/
        );


        $Artistpaginator  = $this->get('knp_paginator');
        $Artistpaginator = $Artistpaginator->paginate(
            $artisData,
            $this->get('request')->query->get('page', 1)/*page number*/,
            25/*limit per page*/
        );


        // parameters to template
        return $this->render('AcmeSearchBundle:Category:view.html.twig', array('categoryName'=>$name, 'dataData'=>$discData,'artisData'=>$artisData,'discpaginator' => $Discpaginator,'artistpaginator' => $Artistpaginator));

    }

}
