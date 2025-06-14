<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'Web::index');
$routes->get('/docs', 'Web::docs');
$routes->get('/docs-ajax', 'Web::docsAjax');
$routes->get('/docs-template', 'Web::docsTemplate');
$routes->get('/examples', 'Web::examples');
$routes->get('/contact', 'Web::contact');

$routes->post('v1/(:any)', 'V1::submit/$1');

$routes->get('v2', 'V2::index');
$routes->get('v2/test/(:any)', 'V2::sendTestEmail/$1');
