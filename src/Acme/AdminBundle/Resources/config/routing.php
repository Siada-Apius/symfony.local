<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('admin', new Route('/admin', array(
    '_controller' => 'AcmeAdminBundle:Index:index',
)));


$collection->add('adminUsers', new Route('/admin/users', array(
    '_controller' => 'AcmeAdminBundle:Index:user',
)));


$collection->add('editUsers', new Route('/admin/users/edit/{userId}/{status}', array(
    '_controller' => 'AcmeAdminBundle:Index:edit',
)));

return $collection;

