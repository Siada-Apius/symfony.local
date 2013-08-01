<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/admin')) {
            // admin
            if ($pathinfo === '/admin') {
                return array (  '_controller' => 'Acme\\AdminBundle\\Controller\\IndexController::indexAction',  '_route' => 'admin',);
            }

            // adminUsers
            if ($pathinfo === '/admin/users') {
                return array (  '_controller' => 'Acme\\AdminBundle\\Controller\\IndexController::userAction',  '_route' => 'adminUsers',);
            }

        }

        // SearchEngineBundle_search
        if ($pathinfo === '/search') {
            return array (  '_controller' => 'TutorialSF2\\SearchEngineBundle\\Controller\\SearchEngineController::searchAction',  '_route' => 'SearchEngineBundle_search',);
        }

        // SearchEngineBundle_ajax
        if ($pathinfo === '/ajax') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_SearchEngineBundle_ajax;
            }

            return array (  '_controller' => 'TutorialSF2\\SearchEngineBundle\\Controller\\SearchEngineController::getAjaxResultsAction',  '_route' => 'SearchEngineBundle_ajax',);
        }
        not_SearchEngineBundle_ajax:

        if (0 === strpos($pathinfo, '/log')) {
            // logout
            if ($pathinfo === '/logout') {
                return array('_route' => 'logout');
            }

            if (0 === strpos($pathinfo, '/login')) {
                // login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'Acme\\RegistrationBundle\\Controller\\RegistrationController::loginAction',  '_route' => 'login',);
                }

                // login_check
                if ($pathinfo === '/login_check') {
                    return array('_route' => 'login_check');
                }

            }

        }

        // registration
        if ($pathinfo === '/registration') {
            return array (  '_controller' => 'Acme\\RegistrationBundle\\Controller\\RegistrationController::registrationAction',  '_route' => 'registration',);
        }

        // acme_task_default_index
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'acme_task_default_index')), array (  '_controller' => 'Acme\\TaskBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/playlist')) {
            // task
            if (rtrim($pathinfo, '/') === '/playlist') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_task;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'task');
                }

                return array (  '_controller' => 'Acme\\TaskBundle\\Controller\\TaskController::indexAction',  '_route' => 'task',);
            }
            not_task:

            // task_create
            if ($pathinfo === '/playlist/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_task_create;
                }

                return array (  '_controller' => 'Acme\\TaskBundle\\Controller\\TaskController::createAction',  '_route' => 'task_create',);
            }
            not_task_create:

            // task_new
            if ($pathinfo === '/playlist/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_task_new;
                }

                return array (  '_controller' => 'Acme\\TaskBundle\\Controller\\TaskController::newAction',  '_route' => 'task_new',);
            }
            not_task_new:

            // task_show
            if (preg_match('#^/playlist/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_task_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_show')), array (  '_controller' => 'Acme\\TaskBundle\\Controller\\TaskController::showAction',));
            }
            not_task_show:

            // task_edit
            if (preg_match('#^/playlist/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_task_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_edit')), array (  '_controller' => 'Acme\\TaskBundle\\Controller\\TaskController::editAction',));
            }
            not_task_edit:

            // task_update
            if (preg_match('#^/playlist/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_task_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_update')), array (  '_controller' => 'Acme\\TaskBundle\\Controller\\TaskController::updateAction',));
            }
            not_task_update:

            // task_delete
            if (preg_match('#^/playlist/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_task_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'task_delete')), array (  '_controller' => 'Acme\\TaskBundle\\Controller\\TaskController::deleteAction',));
            }
            not_task_delete:

        }

        // acme_index_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'acme_index_homepage');
            }

            return array (  '_controller' => 'Acme\\IndexBundle\\Controller\\IndexController::indexAction',  '_route' => 'acme_index_homepage',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
