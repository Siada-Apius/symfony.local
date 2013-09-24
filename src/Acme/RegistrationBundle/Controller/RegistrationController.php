<?php
namespace Acme\RegistrationBundle\Controller;



use Acme\RegistrationBundle\Entity\Role;
use Acme\RegistrationBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\RegistrationBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;


class RegistrationController extends Controller
{
    public function registrationAction(Request $request)
    {

        $task = new Task();
        $task->setName('Enter Name');

        $form = $this->createFormBuilder($task)
            ->add('name', 'text')
            ->add('email', 'text')
            ->add('password', 'password')
            ->add('role', 'choice', array(
                'choices'   => array('ROLE_USER' => 'User', 'ROLE_ADMIN' => 'Admin'),
                'required'  => true,
            ))

            ->add('save', 'submit')
            ->getForm();


        $form->handleRequest($request);


        if ($_SERVER['REQUEST_METHOD'] == 'POST'){

            if ($form->isValid()) {

                define('STATUS_UNLOCK','unlock');

                #save in database

                $user = new User();
                $user->setUsername($form['name']->getData());
                $user->setPassword(sha1($form['password']->getData()));
                $user->setEmail($form['email']->getData());
                $user->setStatus(STATUS_UNLOCK);

                $role = new Role();
                $role->setName($form['role']->getData());
                $user->addRole($role);

                $em = $this->getDoctrine()->getManager();
                $em->persist($role);
                $em->persist($user);

                $em->flush();

                header("Location:".$_SERVER['PHP_SELF']);
                die;

            }
        }

        return $this->render('AcmeRegistrationBundle:Registration:registration.html.php', array(
           'form' => $form->createView(),
        ));



    }


    public function loginAction()
    {

        $request = $this->getRequest();
        $session = $request->getSession();

        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render(
            'AcmeRegistrationBundle:Registration:login.html.php',
            array(
                // last username entered by the user
                'last_username' => $session->get(SecurityContext::LAST_USERNAME),
                'error'         => $error,
            )
        );
    }

}

