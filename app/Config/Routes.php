<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Products::index');
$routes->get('/pages', 'Products::index');
$routes->get('/pages/login', 'Pages::login');
$routes->get('/pages/register', 'Pages::register');
$routes->get('/pages/users', 'Pages::users');
$routes->post('products/save', 'Products::save');
$routes->resource('api/products');
