<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(true);
$routes->get('/', 'Home::index');
$routes->get('/produk', 'Home::index');
$routes->get('/login', 'Dashboard::login');
$routes->get('/register', 'Dashboard::register');
