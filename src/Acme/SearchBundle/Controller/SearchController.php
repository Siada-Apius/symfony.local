<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Siada-Apius
 * Date: 31.07.13
 * Time: 17:47
 * To change this template use File | Settings | File Templates.
 */

namespace Acme\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Acme\SearchBundle\Entity\Playlist;
use Acme\SearchBundle\Form\FilmType;
use Acme\SearchBundle\Form\FilmHandler;


class SearchController extends Controller
{

    public function searchAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUsername();
        $form = $this->container->get('form.factory')->createBuilder(new FilmType())->getForm();
        $request = $this->container->get('request');

        if ($request->getMethod() == 'POST') {

            $formHandler = new FilmHandler($form, $request, $this->getDoctrine()->getManager());

            if($formHandler->process()){

                $title = $form['title']->getData();

                $repository = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('AcmeSearchBundle:Playlist');

                $films_list = $repository->searchFilm($title );

                if(empty($films_list)){
                    $repository = $this->getDoctrine()
                        ->getManager()
                        ->getRepository('AcmeSearchBundle:Category');

                    $films_list = $repository->searchFilm($title );

                    foreach ($films_list as $val){


                        $em = $this->getDoctrine()->getManager();
                        $query = $em->createQuery(
                            'SELECT p
                            FROM AcmeSearchBundle:Playlist p
                            WHERE p.category = :category'
                        )->setParameter('category', $val->getId());

                        $products = $query->getResult();


                        $title = array();

                        foreach ($products as $asd){

                            $title[$asd->getId()] = $asd->getTitle();

                        }

                        $array = array('title' => $title);

                    }

                    if ($user != 'anon.'){

                        $a = 1;
                        return $this->render('AcmeSearchBundle:Search:results.html.twig', array(
                            'array' => $array,
                            'form' => $form->createView(),
                            'session' => $a
                        ));
                    } else {

                        $a = '';
                        return $this->render('AcmeSearchBundle:Search:results.html.twig', array(
                            'array' => $array,
                            'form' => $form->createView(),
                            'session' => $a
                        ));
                    }
                }

                if ($user != 'anon.'){

                    $a = 1;
                    return $this->render('AcmeSearchBundle:Search:results.html.twig', array(
                        'films' => $films_list,
                        'form' => $form->createView(),
                        'session' => $a
                    ));
                } else {

                    $a = '';
                    return $this->render('AcmeSearchBundle:Search:results.html.twig', array(
                        'films' => $films_list,
                        'form' => $form->createView(),
                        'session' => $a
                    ));
                }
            }

        } else {

            if ($user != 'anon.'){

                $a = 1;

                $menu = array(

                    'All songs' =>'',
                    'All Category' => $this->generateUrl('SearchBundle_category'),
                    'All Artist' => $this->generateUrl('SearchBundle_artists'),
                    'Create playlist' => $this->generateUrl('task_new'),
                    'Logout' => $this->generateUrl('logout'),

                );

                return $this->render('AcmeSearchBundle:Search:index.html.twig', array('form' => $form->createView(), 'session' => $a, 'menu' => $menu));

            } else {

                $a = '';

                $menu = array(

                    'All songs' => '',
                    'Registration' => $this->generateUrl('registration'),
                    'Login' => $this->generateUrl('login'),

                );

                return $this->render('AcmeSearchBundle:Search:index.html.twig', array(
                    'form' => $form->createView(), 'session' => $a,'menu'=>$menu
                ));

            }

        }

    }

    public function getAjaxResultsAction()
    {
        $request = $this->container->get('request');

        if($request->isXmlHttpRequest())
        {
            $term = $request->query->get('term');

            $repository = $this->getDoctrine()
                ->getManager()
                ->getRepository('AcmeSearchBundle:Playlist');

            $films_list = $repository->searchFilm($term);

            $film_titles = array();

            foreach ($films_list as $film) {
                $film_titles[] = $film->getTitle();
            }

            return new JsonResponse($film_titles);
        }
    }
}