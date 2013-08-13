<?php

namespace Acme\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\TaskBundle\Helpers\Paginator;

class ArtistsController extends Controller
{
    public function indexAction($num)
    {
        $em = $this->getDoctrine()->getManager();
        $records_count = $em->createQuery(
            "SELECT COUNT (u) FROM Acme\SearchBundle\Entity\Artists u"
        )
            ->getSingleResult();


        $records_count = $records_count[1];

        $param = 69;

        $query = $em->createQuery(
            "SELECT u FROM Acme\SearchBundle\Entity\Artists u"
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
            return $this->render('AcmeSearchBundle:Artists:index.html.twig', array(

                'session' => $a,
                'records'=> $records,
                'paginator'=>$paginator,
                'pageNum'=>$arr,
            ));
        } else {
            $a = '';
            return $this->render('AcmeSearchBundle:Artists:index.html.twig', array(

                'session' => $a,
                'records'=> $records,
                'paginator'=>$paginator,
                'pageNum'=>$arr,
            ));
        }
    }

}
