<?php

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$collection = new RouteCollection();

$collection->add('acme_index_homepage', new Route('/', array(
    '_controller' => 'AcmeIndexBundle:Index:index',
)));

return $collection;
