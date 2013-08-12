<?php

namespace Acme\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\TaskBundle\Helpers\Paginator;
class CategoryController extends Controller
{
    public function indexAction($num)
    {

//        $em = $this->getDoctrine()->getManager();
//        $user = $this->container->get('security.context')->getToken()->getUsername();
//
//        $query = $em->createQuery("SELECT u FROM Acme\SearchBundle\Entity\Genres u WHERE u.gid in (1,2,3,4,5,6,7,8,9,20)");
//        $userStatusArray = $query->getResult();
//
//        $seperArray = array();
//
//        foreach ($userStatusArray as $value){
//
//            $seperArray[$value->getId()] = $value->getTitle();
//        }
//
//
//        $user = $this->container->get('security.context')->getToken()->getUsername();
//        if ($user != 'anon.'){
//            $a = 1;
//            return $this->render('AcmeSearchBundle:Category:index.html.twig', array(
//                'array' => $seperArray,
//                'session' => $a,
        //  'records'=> $records,
        //paginator'=>$paginator,
        // 'pageNum'=>$arr,
//            ));
//        } else {
//            $a = '';
//            return $this->render('AcmeSearchBundle:Category:index.html.twig', array(
//                'array' => $seperArray,
//                'session' => $a
//            ));
//        }

        $em = $this->getDoctrine()->getManager();
        $records_count = $em->createQuery(
            "SELECT COUNT (u) FROM Acme\SearchBundle\Entity\Genres u"
        )
            ->getSingleResult();


        $records_count = $records_count[1];

        $param = 69;

        $query = $em->createQuery(
            "SELECT u FROM Acme\SearchBundle\Entity\Genres u"
        );

        $paginator = new Paginator( //подключаем хелпер
            $query, //запрос
            $records_count, //количество записей
            "/news/pages", //шаблон для генерации ссылок
            $num, //id странички, наш параметр {page}
            69,
            $param
        );

        #print_r($records_count);die

        $records = $paginator->getItems(); //выдёргиваем результат

        $arr = array();
        for($i = 1;$i <=  ($records_count/$param);$i++){

            array_push($arr,$i);
        }

        $user = $this->container->get('security.context')->getToken()->getUsername();
        if ($user != 'anon.'){
            $a = 1;
            return $this->render('AcmeSearchBundle:Category:index.html.twig', array(

                'session' => $a,
                'records'=> $records,
                'paginator'=>$paginator,
                'pageNum'=>$arr,
            ));
        } else {
            $a = '';
            return $this->render('AcmeSearchBundle:Category:index.html.twig', array(

                'session' => $a,
                'records'=> $records,
                'paginator'=>$paginator,
                'pageNum'=>$arr,
            ));
        }

        #return new Response('Hello world!');

    }

    public function resultAction($param){

        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('AcmeSearchBundle:Playlist')->findByCategory($param);


        $user = $this->container->get('security.context')->getToken()->getUsername();
        if ($user != 'anon.'){
            $a = 1;
            return $this->render('AcmeSearchBundle:Category:result.html.twig', array(
                'res' => $entities,
                'session' => $a
            ));
        } else {
            $a = '';
            return $this->render('AcmeSearchBundle:Category:result.html.twig', array(
                'res' => $entities,
                'session' => $a
            ));
        }

    }

}
