<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Volodya
 * Date: 07.07.13
 * Time: 12:37
 * To change this template use File | Settings | File Templates.
 */

namespace Acme\IndexBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Acme\SearchBundle\Entity\Playlist;
use Acme\SearchBundle\Form\FilmType;
use Acme\SearchBundle\Form\FilmHandler;

class IndexController extends Controller
{
    public function indexAction()
    {

        $user = $this->container->get('security.context')->getToken()->getUsername();

        if ($user != 'anon.'){
            $a = 1;

            $menu = array(

                'All Tracks' => $this->generateUrl('SearchBundle_tracks'),
                'All Category' => $this->generateUrl('SearchBundle_category'),
                'All Artist' => $this->generateUrl('SearchBundle_artists'),
                'All Albums' => $this->generateUrl('SearchBundle_discs'),
                'Create playlist' => $this->generateUrl('task_new'),
                'Admin' => $this->generateUrl('admin'),
                'Logout' => $this->generateUrl('logout'),

            );


            return $this->render('AcmeIndexBundle:Index:index.html.twig', array('name' => $user, 'session' => $a,'menu' => $menu));
        } else {

            $a = '';

            $menu = array(

                'All Tracks' => '/tracks/',
                'Registration' => $this->generateUrl('registration'),
                'Login' => $this->generateUrl('login'),

            );

            return $this->render('AcmeIndexBundle:Index:index.html.twig', array(
                 'session' => $a,'menu'=>$menu
            ));





    }

}

}