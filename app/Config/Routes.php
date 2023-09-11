<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::index');

// ROUTES AUTENTIKASI AKUN
$routes->get('/masuk', 'Login::index');
$routes->post('/masuk/login', 'Login::login');
$routes->get('/daftar', 'Registrasi::index');
$routes->post('/daftar/save', 'Registrasi::register');
$routes->get('/keluar', 'Logout::index');

// ROUTES HUTANG PIUTANG
$routes->get('/hutang', 'Hutang::index');
