<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('/pages/login', 'Pages::login');
$routes->get('/pages/register', 'Pages::register');
$routes->get('/pages/users', 'Pages::users');
$routes->resource('products');
