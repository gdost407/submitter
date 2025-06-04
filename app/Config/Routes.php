<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Web::index');
$routes->get('/docs', 'Web::docs');
$routes->get('/examples', 'Web::examples');
