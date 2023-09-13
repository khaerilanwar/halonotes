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
$routes->get('/hutang/riwayat', 'Hutang::riwayatHutang');
$routes->put('/hutang/lunas/(:num)', 'Hutang::lunaskan/$1');
$routes->post('/hutang/tambah-hutang', 'Hutang::tambahDataHutang');
$routes->get('/piutang', 'Piutang::index');
$routes->get('/piutang/riwayat', 'Piutang::riwayatPiutang');
$routes->put('/piutang/lunas/(:num)', 'Piutang::lunaskan/$1');
$routes->post('/piutang/tambah-piutang', 'Piutang::tambahDataPiutang');
