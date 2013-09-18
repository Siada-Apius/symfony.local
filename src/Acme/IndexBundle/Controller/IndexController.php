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


        //search form
        $form = $this->createFormBuilder()
            ->add('task', 'text')
            ->add('Search', 'submit')
            ->getForm();





            return $this->render('AcmeIndexBundle:Index:index.html.twig', array(
                 'user'=>$user, 'form' => $form->createView()
            ));


    }


}