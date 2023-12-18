<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Products::index');
$routes->get('/products', 'Products::index');

$routes->get('/edit/(:segment)', 'Products::edit/$1');

$routes->get('/orders', 'Orders::index');

$routes->get('/register', 'Register::index');
$routes->post('/register', 'User::create');

$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::login');

$routes->post('products/save', 'Products::save');
$routes->delete('products/(:num)', 'Products::delete/$1');
// $routes->resource('api/products');
$routes->get('/api/products/(:any)/(:any)', 'Api\Products::index/$1/$2');

$routes->get('/api/share/(:any)', 'Core::index/$1');
$routes->get('/rekomendasi', 'Core::rekomendasi');
$routes->put('products/update/(:num)', 'Products::update/$1');