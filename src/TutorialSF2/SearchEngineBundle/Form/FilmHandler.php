<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Siada-Apius
 * Date: 17.07.13
 * Time: 21:13
 * To change this template use File | Settings | File Templates.
 */

namespace TutorialSF2\SearchEngineBundle\Form;

use Symfony\Component\Form\Form;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;

use TutorialSF2\SearchEngineBundle\Entity\Film;

class FilmHandler
{
    protected $form;
    protected $request;
    protected $em;

    public function __construct(Form $form, Request $request, EntityManager $em){
        $this->form = $form;
        $this->request = $request;
        $this->em = $em;
    }

    public function process(){
        if( $this->request->getMethod() == 'POST' ){
            $this->form->handleRequest($this->request);
            if ($this->form->isValid()) {
                return true;
            }
            else {
                return false;
            }
        }
        return false;
    }
}