<?php

namespace Acme\AdminBundle\Controller;

use Acme\RegistrationBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Acme\TaskBundle\Form\TaskType;



class IndexController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.context')->getToken()->getUsername();

        $query = $em->createQuery("SELECT u.status FROM Acme\RegistrationBundle\Entity\User u WHERE u.username = '".$user."'");
        $userStatusArray = $query->getResult();


        if($user != 'anon.' AND $userStatusArray['0']['status'] == 'lock'){
            throw $this->createNotFoundException('Your account is blocked.');
        }else{
            return $this->render('AcmeAdminBundle:Index:index.html.php', array());
        }

    }

    public function userAction(){

        define('STATUS_LOCK','lock');
        define('STATUS_UNLOCK','unlock');
        define('STATUS_DELETE','delete');

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();


         $qb->add('select', 'u')
            ->add('from', 'Acme\RegistrationBundle\Entity\User u')
            ->setMaxResults(50000 );
        $query = $qb->getQuery();
        $array = $query->getArrayResult();



        return $this->render('AcmeAdminBundle:Index:user.html.twig', array('entities' => $array,'lock' => STATUS_LOCK ,'unlock'=> STATUS_UNLOCK , 'delete'=> STATUS_DELETE ));

    }
                    #edit user status(lock,unlock,delete)
    public function editAction($userId,$status){

        $em = $this->getDoctrine()->getManager();

        if($status == 'delete'){
            $entity = $em->getRepository('AcmeRegistrationBundle:User')->find($userId);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Task entity.');
            }

            $em->remove($entity);
            $em->flush();

        }else{

            $query = $em->createQuery("UPDATE Acme\RegistrationBundle\Entity\User a SET a.status='".$status ."' WHERE a.id = '".$userId."'");
            $users = $query->getResult();
        }

        return $this->redirect($this->generateUrl('adminUsers'));

    }


}
