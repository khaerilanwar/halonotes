<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/daftar', 'Registrasi::index');
$routes->get('/masuk', 'Login::index');
