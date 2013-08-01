<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Siada-Apius
 * Date: 17.07.13
 * Time: 21:12
 * To change this template use File | Settings | File Templates.
 */

namespace TutorialSF2\SearchEngineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use TutorialSF2\SearchEngineBundle\Entity\Film;
use TutorialSF2\SearchEngineBundle\Form\FilmType;
use TutorialSF2\SearchEngineBundle\Form\FilmHandler;

class SearchEngineController extends Controller
{

    public function searchAction()
    {

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
                    ->getRepository('TutorialSF2SearchEngineBundle:Film');

                // we get the movies thank to our custom query (cf repository)
                $films_list = $repository->searchFilm( $title );

                // return the results view
                return $this->render('TutorialSF2SearchEngineBundle:SearchEngine:results.html.twig', array(
                    'films' => $films_list
                ));
            }
        }

        // return the form view
        return $this->render('TutorialSF2SearchEngineBundle:SearchEngine:index.html.twig', array(
            'form' => $form->createView(),
        ));
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
                ->getRepository('TutorialSF2SearchEngineBundle:Film');
            $films_list = $repository->searchFilm( $term );

            $film_titles = array();
            foreach ($films_list as $film) {
                $film_titles[] = $film->getTitle();
            }

            return new JsonResponse($film_titles);
        }
    }
}