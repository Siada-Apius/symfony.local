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


        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUsername();

        $query = $em->createQuery("SELECT u.status FROM Acme\RegistrationBundle\Entity\User u WHERE u.username = '".$user."'");
        $userStatusArray = $query->getResult();


        if($user != 'anon.' AND $userStatusArray['0']['status'] == 'lock'){
            throw $this->createNotFoundException('Your account is blocked.');
        }else{

        // Generation of the form
        $form = $this->container->get('form.factory')->createBuilder(new FilmType())->getForm();

        // We recover the user request
        $request = $this->container->get('request');

        if ($request->getMethod() == 'POST') {

            $formHandler = new FilmHandler($form, $request, $this->getDoctrine()->getManager());

            // this variable contains a boolean which indicate if there are errors or not
            if($formHandler->process()){

                // title sent
                $title = $form['title']->getData();

                // On récupère le repository
                $repository = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('AcmeSearchBundle:Playlist');

                // we get the movies thank to our custom query (cf repository)
                $films_list = $repository->searchFilm($title );

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
        }

        if ($user != 'anon.'){
            $a = 1;
            return $this->render('AcmeSearchBundle:Search:index.html.twig', array('form' => $form->createView(), 'session' => $a));
        } else {
            $a = '';
            return $this->render('AcmeSearchBundle:Search:index.html.twig', array(
                'form' => $form->createView(), 'session' => $a
            ));
        }


        }
    }

    public function getAjaxResultsAction()
    {
        $request = $this->container->get('request');

        if($request->isXmlHttpRequest())
        {
            // get title sent ($_GET)
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