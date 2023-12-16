<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Products::index');
$routes->get('/pages', 'Products::index');

$routes->get('/register', 'Register::index');
$routes->post('/register', 'User::create');

$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::login');

$routes->post('products/save', 'Products::save');
$routes->delete('products/(:num)', 'Products::delete/$1');
$routes->put('products/(:num)', 'Products::update/$1');
$routes->resource('api/products');
