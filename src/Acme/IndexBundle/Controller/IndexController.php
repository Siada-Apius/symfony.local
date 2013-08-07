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

class IndexController extends Controller
{
    public function indexAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUsername();

        if ($user != 'anon.'){
            $a = 1;


            return $this->render('AcmeIndexBundle:Index:index.html.php', array('name' => $user, 'session' => $a));
        }

        return $this->render('AcmeIndexBundle:Index:index.html.php', array('name' => 'index/index'));
    }

}