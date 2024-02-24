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

// ROUTES HAJATAN PERNIKAHAN
$routes->get('/kondangan', 'Kondangan::index');
$routes->get('/kondangan/riwayat', 'Kondangan::riwayatKondangan');
$routes->post('/kondangan/tambah-kondangan', 'Kondangan::tambahDataKondangan');
$routes->post('/kondangan/lunaskan', 'Kondangan::lunaskan');
$routes->get('/nikahan', 'Nikahan::index');

// ROUTES CATATAN PENGGUNAAN DANA
$routes->get('/catatan', 'Catatan::index');
$routes->get('/catatan/tambah', 'Catatan::tambah');
$routes->post('/catatan/store', 'Catatan::storeNote');
$routes->get('/catatan/(:any)', 'Catatan::detail/$1');
$routes->delete('/catatan/hapus/(:num)', 'Catatan::hapus/$1');

// ROUTES KATEGORI PRODUK BELI
// UNTUK MENAMBAHKAN JENIS KATEGORI KE DALAM FITUR CATATAN
$routes->get('/kategori', 'KategoriProdukBeli::index');
$routes->post('/kategori/tambah', 'KategoriProdukBeli::storeKategori');
$routes->delete('/kategori/hapus/(:num)', 'KategoriProdukBeli::hapus/$1');
