<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('/products', 'Products::index');

$routes->get('admin/edit/(:segment)', 'Products::edit/$1');

$routes->get('/orders', 'Orders::index');

$routes->get('/register', 'Register::index');
$routes->post('/register', 'User::create');

$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::login');

$routes->get('/admin/create', 'Products::create');
$routes->post('admin/products/save', 'Products::save');
$routes->delete('products/(:num)', 'Products::delete/$1');
// $routes->resource('api/products');
$routes->get('/api/products/(:any)/(:any)', 'Api\Products::index/$1/$2');

$routes->get('/api/share/(:any)', 'Core::index/$1');
$routes->get('/rekomendasi/(:any)/(:any)', 'Core::rekomendasi/$1/$2');
$routes->put('admin/products/(:num)', 'Products::update/$1');
$routes->put('branch/products/(:num)', 'Products::update/$1');

$routes->post('/logout', 'Login::logout');