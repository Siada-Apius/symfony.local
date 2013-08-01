<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/css/12be9e0')) {
            // _assetic_12be9e0
            if ($pathinfo === '/css/12be9e0.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '12be9e0',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_12be9e0',);
            }

            // _assetic_12be9e0_0
            if ($pathinfo === '/css/12be9e0_part_1_bootstrap_1.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '12be9e0',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_12be9e0_0',);
            }

        }

        if (0 === strpos($pathinfo, '/js/1db8630')) {
            // _assetic_1db8630
            if ($pathinfo === '/js/1db8630.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '1db8630',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_1db8630',);
            }

            if (0 === strpos($pathinfo, '/js/1db8630_')) {
                if (0 === strpos($pathinfo, '/js/1db8630_jquery')) {
                    // _assetic_1db8630_0
                    if ($pathinfo === '/js/1db8630_jquery_1.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '1db8630',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_1db8630_0',);
                    }

                    // _assetic_1db8630_1
                    if ($pathinfo === '/js/1db8630_jquery-ui_2.js') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '1db8630',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_1db8630_1',);
                    }

                }

                // _assetic_1db8630_2
                if ($pathinfo === '/js/1db8630_main_3.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '1db8630',  'pos' => 2,  '_format' => 'js',  '_route' => '_assetic_1db8630_2',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

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

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/demo/secured/log')) {
            if (0 === strpos($pathinfo, '/demo/secured/login')) {
                // _demo_login
                if ($pathinfo === '/demo/secured/login') {
                    return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                }

                // _security_check
                if ($pathinfo === '/demo/secured/login_check') {
                    return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
                }

            }

            // _demo_logout
            if ($pathinfo === '/demo/secured/logout') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
