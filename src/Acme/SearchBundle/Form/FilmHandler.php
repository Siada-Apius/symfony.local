<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Siada-Apius
 * Date: 31.07.13
 * Time: 17:50
 * To change this template use File | Settings | File Templates.
 */

namespace Acme\SearchBundle\Form;

use Symfony\Component\Form\Form;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;

use Acme\SearchBundle\Entity\Playlist;

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