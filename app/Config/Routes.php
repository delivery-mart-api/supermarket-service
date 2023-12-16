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
$routes->delete('products/(:num)', 'Products::delete/$1');
$routes->put('products/(:num)', 'Products::update/$1');
$routes->resource('api/products');
