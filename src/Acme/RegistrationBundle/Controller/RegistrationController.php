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
        #$task->setDueDate(new \DateTime('today'));

        $form = $this->createFormBuilder($task)
            ->add('name', 'text')
            ->add('email', 'text')
            ->add('pass', 'password')
            ->add('role', 'choice', array(
                'choices'   => array('ROLE_USER' => 'User', 'ROLE_ADMIN' => 'Admin'),
                'required'  => true,
            ))

            #->add('dueDate', 'date')
            ->add('save', 'submit')
            ->getForm();


        $form->handleRequest($request);

        if ($form->isValid()) {

            $name = $form['name']->getData();
            $email = $form['email']->getData();
            $pass = sha1($form['pass']->getData());
            $saveRole = ($form['role']->getData());





################################################

        $user = new User();
        $user->setUsername($name);
        $user->setPassword($pass);
        $user->setEmail($email);


        $role = new Role();
        $role->setName($saveRole);
        $user->addRole($role);

        $em = $this->getDoctrine()->getManager();
        $em->persist($role);
        $em->persist($user);

        $em->flush();

        }
        return $this->render('AcmeRegistrationBundle:Registration:registration.html.php', array(
           'form' => $form->createView(),
        ));



    }


    public function loginAction()
    {
        $request = $this->getRequest();
        $session = $request->getSession();

        // получить ошибки логина, если таковые имеются
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


    /*public function LogoutAction()
    {
        $name = 'Registration/Logout';
        return $this->render('AcmeRegistrationBundle:Registration:logout.html.php', array('name' => $name));
    }*/
}

